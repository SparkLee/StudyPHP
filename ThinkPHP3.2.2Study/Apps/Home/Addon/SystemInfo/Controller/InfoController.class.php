<?php
namespace Home\Addon\SystemInfo\Controller;
use Think\Controller;
class InfoController extends Controller {
    public function index() {
        header("content-type:text/html; charset=utf-8");
        echo "我是Home模板下的SystemInfo插件下的InfoController控制器下的index方法。";
    }
}