<?php

// 手动加载类文件。当然也可以在\composer.json文件中加入"autoload": { "classmap": [	"app/libraries"]},
//include(app_path() . '\libraries\classes\Test.php');

// 手动导入外部命令空间中的类。当然也可以在\app\config\app.php配置文件中的'aliases'字段中加入"'MyTest'=>'GuJiTech\Libraries\Classes\Test',"
//use GuJiTech\Libraries\Classes\Test as MyTest;

class HomeController extends BaseController {
    public function getIndex() {
        $data_test = array(
                'name' => 'li',
                'age' => 2,
        );
        $rules = array(
                'name' => 'required|min:2',
                'age' => 'required',
                'email' => 'required|email',
        );
        $validator = Validator::make($data_test, $rules);
        if ($validator->fails()) {
            $messages = $validator->message();
            var_dump($messages);
        }
        
        return "Hello World";
    }
    
    public function getTestNamespace() {
    	//$t = App::make('Test');
        $t = new Test();
    	$t->sayHello();
    }
    
    public function getTestIocAndFacade() {
    	//Foo::showApp(); // 通过Facade外观模式访问子系统接口
    	
    	App::make('foo')->showApp(); // 直接从IoC容器中访问子系统接口
    }
    
	public function showWelcome()
	{
		return View::make('hello');
	}
}
