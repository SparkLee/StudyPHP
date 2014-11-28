<?php
/**
 * Role-based Access Controll：基于角色的访问控制类
 * @author admin
 *
 */
namespace Admin\Controller;
use Think\Controller;
class RbacController extends Controller {
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
     * 添加权限模板展示
     */
    public function addNode() {
        $this->nodes = M("Node")->where("level != 3")->order("level, sort")->select();
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
        $this->nodes = M("Node")->order("level, sort")->select();
        $this->display();
    }
}