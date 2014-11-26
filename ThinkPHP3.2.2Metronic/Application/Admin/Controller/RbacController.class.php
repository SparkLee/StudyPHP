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
}