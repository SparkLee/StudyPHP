<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    public function _empty($action_name) {
        header("content-type:text/html; charset=utf-8");
        echo "您访问的控制器【" . CONTROLLER_NAME . "】不存在，我是空控制器中的空操作。";
    }
    
}