<?php
return array(
    'COOKIE_DOMAIN'         =>  'www.模块配置文件.com',      // Cookie有效域名
    'URL_ROUTER_ON'         => true, //开启路由
    'URL_ROUTE_RULES'       => array(
        //规则路由
        'test_router/:name'  => 'index/t', //每个参数中以“:”开头的参数都表示动态参数，并且会自动对应一个GET参数，例如:id表示该处匹配到的参数可以使用$_GET['id']方式获取，:year、 :month 、:day 则分别对应$_GET['year']、 $_GET['month'] 和 $_GET['day']。
        'test_router2/:age\d'  => 'index/t', //规则路由之数字约束：表示只会匹配数字参数，如果你需要更加多的变量类型检测，请使用正则表达式定义来解决。
        'test_router3/:age\d|md5'  => 'index/t', //规则路由之函数支持：表示对匹配到的id变量进行md5处理，也就是说，实际传入read操作方法的$_GET['id'] 其实是 md5($_GET['id'])。
        'test_router4/:year\d/[:month\d]'  => 'index/t', //规则路由之可选定义：[:month\d]变量用[ ]包含起来后就表示该变量是路由匹配的可选变量。
        'test_router5/:name^liwei-spark'  => 'index/t', //规则路由之规则排除：匹配除了liwei和spark之外的所有字符串
        
        //正则路由
        '/^test_router6\/(.*)$/' => 'index/t?name=:1', //对于正则表达式中的每个变量（即正则规则中的子模式）部分，如果需要在后面的路由地址中引用，可以采用:1、:2这样的方式，序号就是子模式的序号。
        
        //闭包支持：我们可以使用闭包的方式定义一些特殊需求的路由，而不需要执行控制器的操作方法了
        //-- 规则路由
        'test_router7/:name' => function ($name) {  
            echo "My name is:  " . $name;
        },
        //-- 正则路由
        '/^test_router8\/(\d{4})\/(\d{2})$/' => function ($year, $month) { 
            echo 'year='.$year.'&month='.$month;
        },
        //-- 继续执行
        'test_router9/:name' => function ($name) { //默认的情况下，使用闭包定义路由的话，一旦匹配到路由规则，执行完闭包方法之后，就会中止后续执行。如果希望闭包函数执行后，后续的程序继续执行，可以在闭包函数中使用布尔类型的返回值。
            echo "wo shi:  " . $name . "<hr>";
            $_SERVER['PATH_INFO'] = 'index/t';
            return false; //返回false，继续执行当前模块下index控制器中的t方法。
        },
        
        'test_router*/:id' => 'http://baike.baidu.com/subview/1689/:1.htm', //路由地址采用重定向地址的话，如果要引用动态变量，也是采用 :1、:2 的方式。
        'test_router*' => array('http://www.baidu.com', 302),//默认情况下，外部地址的重定向采用301重定向，如果希望采用其它的，可以使用：
        'test_router*' => '/admin', //如果路由地址以“/”或者“http”开头则会认为是一个重定向地址或者外部地址
    ),
    
    //静态路由
    'URL_MAP_RULES' => array(
        'test_router7/中国人' => 'index/t?name=我是中国人'
    ),
    
    // 操作方法后缀
    //'ACTION_SUFFIX'         =>  'Action', 
);