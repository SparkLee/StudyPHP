<?php 
/**
 * 自定义的一个多入口文件[后台入口文件]。Added by SparkLee on 2014/10/12
 */

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

define('BIND_MODULE', 'Home'); // 绑定Home模块到当前入口文件
define('BIND_CONTROLLER','Index'); // 绑定Index控制器到当前入口文件

// 定义应用目录
define('APP_PATH','./Application/');
//define('APP_PATH','./Apps/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
?>