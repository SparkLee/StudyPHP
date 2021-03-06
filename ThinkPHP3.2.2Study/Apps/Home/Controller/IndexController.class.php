<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util\AuthOrg\Util\Auth;
Vendor('Zend.Filter.Dir');
import('Vendor.Zend.Filter.Dir2'); //手动加载类库文件Dir2.class.php
import('testhome.testhome', dirname(__FILE__), ".php");
class dir_test {
    public function __construct() {
        echo '我的位置：D:\www\spk\GitHub-SparkLee\StudyPHP\ThinkPHP3.2.2Study\Apps\Home\Controller\IndexController.class.php';    
    }
}
class IndexController extends Controller {
    //空操作
    public function _empty($action_name) {
        header("content-type:text/html; charset=utf-8");
        echo "没有定义操作方法：" . $action_name;
    }
    
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
    
    //前置操作方法
    public function _before_t() {
        echo "<hr>我是前置操作方法<hr>";
    }
    
    //后置操作方法
    public function _after_t() {
        echo "<hr>我是后置操作方法<hr>";
    }
    
    public function t($param) {
        header("Content-type: text/html; charset=utf-8");
        
        echo "<hr>Action参数值：$param<hr>"; //
         
        echo "<hr>动态生成URL：" . U('home/index/t#comment@blog.thinkphp.com?name=zhangsan') . "<hr>";
        
        //echo I('name', 'liwei');
        echo "i am test" . "<br>";
        echo "姓名：" . I("get.name", "default name", "htmlspecialchars") . "<br>";
        echo "年龄：" . $_GET['age'] . "<br>";
        echo "年份：" . $_GET['year'] . "<br>";
        echo "月份：" . $_GET['month'] . "<br>";
        echo I("path.2") . "<br>";
        var_dump(I("get."));
        //$user_model = D('User'); //D('User') //实例化UserModel
        //$user_logic = D('User','Logic'); //实例化UserLogic
        //echo $user_logic->test();
        
        //tag('dosomeinghere');// 添加dosomeinghere标签侦听
        
        //B('Home\Behavior\Test'); //单独执行行为
        
        //$test1 = new \Test\Test001\Index();
        //$test1->index();
        //$t = new \Org\Util\Auth();
        
        //$http = new Http();
        //$dir_test = new \dir_test(); //Vendor('Zend.Filter.Dir'); 手动加载第三方类库
        //$dir_test2 = new \dir_test2(); //import('Vendor.Zend.Filter.Dir2'); 手动加载第三方类库
        //$testhome = new \testhome();//import('testhome.testhome', dirname(__FILE__), ".php"); 手动加载第三方类库
        
        //\Think\Think::addMap('testhome22', APP_PATH . 'Home/Controller/testhome/testhome2.php');
        //$testhome2 = new \testhome22\testhome2();
        
        //$userevent = new \Home\Event\UserEvent();
        $userevent = A("Home/User", "Event");
        $userevent->login();
    }
    
    public function t1Action() {
        header("content-type:text/html; charset=utf-8");
        echo "操作方法名带操作方法后缀";
    }
    
    public function ajaxtest() {
        echo "hello world.<br>";
        header("content-type:text/html; charset=utf-8");
        //$data = 'ok';
        $data['name'] = 'sparklee';
        $data['age'] = 26;
        //$this->ajaxReturn($data, 'json');
        //$this->success('新增成功', '/home/index', 100);
        //$this->error('新增失败');
        
        $this->redirect('New/category', array('cate_id' => 2), 5, '页面跳转中...');
    }
    
    public function modeltest() {
        header("content-type:text/html; charset=utf-8");
        $user = M("user");
        //$user->where("id=12")->delete();
        
        $where["name"] = array("EQ", "tie");
        $where["gender"] = 1;
        $results = $user->field(array("name", "gender"), true) //字段排除：获取除name和gender两个字段以外的所有字段
                        //->table(array("user" => "a", "user_detail" => "b"))
                        //->where($where) //数组条件
                        //->where("name = '%s' AND gender = %d", array('tie', 1)) //字符串条件：如果使用3.1以上版本的话，使用字符串条件的时候，建议配合预处理机制，确保更加安全
                        ->order("id DESC")
                        //->limit(20)
                        ->page(3,1)
                        ->select();
        
        //$results = $user->data(); //除了写操作外，data方法还可以用于读取当前的数据对象
        
        //$fields = $user->getDbFie
        //$user->add(array("name" => "tie", "age" => 10, "gender" => 1)); //新增记录
        //$user->data(array("name" => "tie001", "age" => 20, "gender" => 0))->where("id = 23")->save(); //更新记录
        //var_dump($fields);
        
        //$results = $user->db(1, "mysql://super:vw1301@211.149.209.33:3306/test")->query("select * from fruit"); //切换数据库
        //$results = $user->db(1, "mysql://super:vw1301@211.149.209.33:3306/test")->table("fruit")->select(); //如果切换数据库之后，数据表和当前不一致的话，可以使用table方法指定要操作的数据表
        //$results = $user->db(1, "mysql://super:vw1301@211.149.209.33:3306/test")->table("fruit")->find();
        var_dump($results);
        
        //$user->db(0)->add(array("name" => "tie", "age" => 10, "gender" => 1));
        exit;
        
        //$action = M("action", "onethink_", "mysql://root:@localhost:3306/onethink"); //M方法也可以支持跨库操作。操作onethink库中的onethink_action表。
        $action = M("addons", "onethink_", DB_CONFIG_ONETHINK);
        $results = $action->select();
        //var_dump($results);
        
        $model = M(); //实例化空模型类，使用自定义的SQL语句
        $results = $model->query("SELECT * FROM user");
        //var_dump($results);
        
        $model = D("User");
        //var_dump($model);
        //$model->getUserName();
    }
    
}