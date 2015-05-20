<?php
header("content-type:text/html; charset=utf-8");
echo "<p style='color:red'>测试示例：</p>";

function error_handler($error_code, $error) {
    //var_dump($error_code);
    //var_dump($error);
}

function exception_handler($exception) {
    echo "<pre>你个龟儿子，抓住你了吧：<br>";
    var_dump($exception);
    echo "</pre>";
}

function fatalerror_handler() {
    echo "出大事儿啦。";
}

register_shutdown_function('fatalerror_handler');
set_error_handler("error_handler");
set_exception_handler("exception_handler");

ssss();

//throw new Exception('抓不住我');

require_once dirname(__FILE__) . '/log4php/Logger.php';

define('DIR_CONFIG', dirname(__FILE__) . '/test/config/');

//==================== Properties格式配置文件 =============//
//此种格式的配置文件已弃用：http://logging.apache.org/log4php/docs/configuration.html
//Logger::configure(DIR_CONFIG . 'config.properties');

//==================== XML格式配置文件 ====================//
Logger::configure(DIR_CONFIG . 'config.xml');

//==================== PHP格式配置文件 ====================//
//Logger::configure(DIR_CONFIG . 'config.php');

$logger = Logger::getRootLogger();
$logger->trace("1、这是一条trace日志。");
$logger->debug("2、这是一条debug日志。");
$logger->info("3、这是一条info日志。");
$logger->warn("4、这是一条warn日志。");
$logger->error("5、这是一条error日志。");
$logger->fatal("6、这是一条fatal日志。");

try {
    throw new Exception("我是傻傻异常");
} catch (Exception $ex) {
    echo "<pre>出现异常啦，异常信息如下：<br>";
    echo "";
    var_dump($ex);
    echo "</pre>";
    
    $logger->error("这是出异常的节奏啊", $ex);
}