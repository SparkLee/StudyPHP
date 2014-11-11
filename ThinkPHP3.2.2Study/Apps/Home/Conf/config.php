<?php
return array(
	//'配置项'=>'配置值'
    'COOKIE_DOMAIN'         =>  'www.模块配置文件.com',      // Cookie有效域名
    'URL_ROUTER_ON'         => true, //开启路由
    'URL_ROUTE_RULES'       => array(
        //规则路由-
        'test_router/:name'  => 'index/t', //每个参数中以“:”开头的参数都表示动态参数，并且会自动对应一个GET参数，例如:id表示该处匹配到的参数可以使用$_GET['id']方式获取，:year、 :month 、:day 则分别对应$_GET['year']、 $_GET['month'] 和 $_GET['day']。
        'test_router2/:age\d'  => 'index/t', //表示只会匹配数字参数，如果你需要更加多的变量类型检测，请使用正则表达式定义来解决。
        'test_router3/:age\d|md5'  => 'index/t', //表示对匹配到的id变量进行md5处理，也就是说，实际传入read操作方法的$_GET['id'] 其实是 md5($_GET['id'])。
        'test_router4/:year\d/[:month\d]'  => 'index/t', //[:month\d]变量用[ ]包含起来后就表示该变量是路由匹配的可选变量。
         
        'test_router3/:id' => 'http://baike.baidu.com/subview/1689/:1.htm', //路由地址采用重定向地址的话，如果要引用动态变量，也是采用 :1、:2 的方式。
        'test_router4' => array('http://www.baidu.com', 302),//默认情况下，外部地址的重定向采用301重定向，如果希望采用其它的，可以使用：
        'test_router5' => '/admin', //如果路由地址以“/”或者“http”开头则会认为是一个重定向地址或者外部地址
    ),
);