<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\AuthOrg\Util\Auth;
class IndexController extends Controller {
    public function index(){
        echo I('name', 'liwei');
        var_dump(I('get.'));
        C('COOKIE_DOMAIN', 'www.temp.com'); //动态改变配置参数。动态配置赋值仅对当前请求有效，不会对以后的请求造成影响。
        echo C('COOKIE_DOMAIN') . '<br>';
        echo C('LOG_RECORD') . '<br>';
        echo C('SUPER_USER_NAME') . '<br>'; //扩展配置文件user.php中的配置参数
        
        $config = array('key001'=>'value001', 'key002'=>'value002');
        C($config); //批量配置
        echo C('key001') . '<br>';
        
        \Think\Build::buildController('Test','Role');//为Test模块创建Role控制器类文件
        \Think\Build::buildModel('Test', 'Role');//为Test模块创建Role模型类文件
        
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    
    public function test() {
        echo I('name', 'liwei');
        
        //$user_model = D('User'); //D('User') //实例化UserModel
        //$user_logic = D('User','Logic'); //实例化UserLogic
        //echo $user_logic->test();
        
        tag('dosomeinghere');// 添加dosomeinghere标签侦听
        
        B('Home\Behavior\Test'); //单独执行行为
        
        $test1 = new \Test\Test001\Index();
        $test1->index();
        $t = new \Org\Util\Auth();
    }
}