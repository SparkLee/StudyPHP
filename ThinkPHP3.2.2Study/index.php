<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
//define('APP_PATH','./Application/');
define('APP_PATH','./Apps/'); //自定义项目目录-Added by SparkLee on 2014/10/09
//define('APP_PATH','D:/www/php/spk/thinkphp-3.2.2/Application/');//给APP_PATH定义绝对路径会提高系统的加载效率

// 定义ThinkPHP框架目录
define('THINK_PATH','D:/www/php/spk/thinkphp-3.2.2/ThinkPHP/');

// 定义应用运行时目录（可写）
//define('RUNTIME_PATH','./Data/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
//require "D:/www/php/spk/GitHub-StudyPHP/trunk/ThinkPHP3.2.2Study/ThinkPHP/ThinkPHP.php";//给THINK_PATH和APP_PATH定义绝对路径会提高系统的加载效率-Added by SparkLee on 2014/10/09
//require THINK_PATH . 'ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单