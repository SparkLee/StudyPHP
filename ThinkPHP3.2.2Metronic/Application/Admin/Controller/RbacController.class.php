<?php
/**
 * Role-based Access Controll：基于角色的访问控制类
 * @author admin
 *
 */
namespace Admin\Controller;
use Think\Controller;
class RbacController extends Controller {
    /*=================== 角色操作 ===================*/
    /**
     * 添加角色模板展示
     */
    public function addRole(){
        $this->display();
    }
    
    /**
     * 添加角色表单处理
     */
    public function addRoleHandler(){
        if (M("role", "think_")->add($_POST)) {
            $this->success("角色添加成功", U("Rbac/addRole"));
        }
    }
    
    /**
     * 角色管理模板展示
     */
    public function roleList() {
        $this->roles = M("role", "think_")->select();
        $this->display();  
    }
    
    /**
     * 删除角色
     */
    public function delRole() {
        if (M("Role")->delete(I("get.roleid"))) {
            $this->success("角色删除成功", U("Rbac/roleList"));
        }
    }
    
    /*=================== 权限操作 ===================*/
    /**
     * 添加权限模板展示
     */
    public function addNode() {
        import("Org.Util.SpkTree");
        $spkTree = new \SpkTree();
        
        $nodes = M("Node")->where("level != 3")->order("level, sort")->select();
        $this->nodes = $spkTree->create($nodes);
        $this->display();
    }
    
    /**
     * 添加权限表单处理
     */
    public function addNodeHandler(){
        $node = M("Node");
        $node->create();
        if ($node->add()) {
            $this->success("权限添加成功", U("Rbac/addNode"));
        }
    }
    
    /**
     * 权限管理模板展示
     */
    public function nodeList() {
        import("Org.Util.SpkTree");
        $spkTree = new \SpkTree();
        
        $nodes = M("Node")->order("sort")->select();
        $this->nodes = $spkTree->create($nodes);
        $this->display();
    }
    
    /**
     * 删除权限
     */
    public function delNode() {
        $node = M("Node");
        if ($node->delete(I("get.nodeid"))) {
            $this->success("权限删除成功", U("Rbac/nodeList"));
        }
    }
    
    /*=================== 用户操作 ===================*/
    /**
     * 添加用户模板展示
     */
    public function addUser() {
        $this->roles = M("Role")->select();
        $this->display();
    }
    
    /**
     * 添加用户表单处理
     */
    public function addUserHandler() {
        $user = array(
            "username" => I("username"),
            "password" => I("password", "", md5),
            "logintime" => time(),
            "loginip" => get_client_ip(),
            "status" => 1
        );
        $uid = M("User")->add($user); // 如果主键是自动增长型 成功后返回值就是最新插入的值
    
        if ($uid) {
            //用户添加后，则添加用户-角色关系
            $user_role = array(
                "role_id" => I("role_id", "", int),
                "user_id" => $uid,
            );
            $urid = M("Role_user")->add($user_role);
            if ($urid) {
                $this->success("用户添加成功", U("Rbac/addUser"));
            }
        } else {
            $this->success("用户添加失败", U("Rbac/addUser"));
        }
    }
    
    /**
     * 用户管理模板展示
     */
    public function userList() {
        $this->users = D("User")->relation(true)->select();
        $this->display();
    }
    
    /**
     * 删除用户
     */
    public function delUser() {
        $result = D("User")->relation(true)->delete(I("get.roleid")); //使用关联模型：在删除用户数据的同时，把用户角色表中相应的记录也同步删除。
        var_dump($result);
        if ($result) {
            $this->success("用户删除成功", U("Rbac/userList"));
        }
    }
    
    /*=================== 权限配置（给角色分配权限）操作 ===================*/
    /**
     * 权限配置模板展示
     */
    public function access() {
        $Role = M("Role");
        $Node = M("Node");
        $Access = M("Access");
        
        $roleid = I("roleid", "", int);
        dump(I("checkbox"));
        $this->rolename = $Role->where( "id = " . $roleid)->getField("name");
        
        import("Org.Util.SpkTree");
        $spkTree = new \SpkTree();
        
        $nodes = $Node->order("sort")->select();
        $nodes = $spkTree->create($nodes);
        
        $nodes_with_access = array(); //新的权限列表，带有一个扩展栏目：某个角色是否拥有某个权限的标识位。
        foreach ($nodes as $node) {
            $cnt = $Access->where("role_id = {$roleid} AND node_id = {$node['id']}")->select();
            if ($cnt) {
                $node['access'] = 1;
            } else {
                $node['access'] = 0;
            }
            $nodes_with_access[] = $node;
        }
        $this->nodes_with_access = $nodes_with_access;
        $this->display();
    }
    
}