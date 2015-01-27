<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ERROR);

echo "<p style='color:red;'>测试示例：</p>";

require_once dirname(__FILE__) . '\log4php\Logger.php';

// ======== XML格式配置
//Logger::configure(dirname(__FILE__) . '\test\config\config.xml');

// ======== Properties格式配置
//Logger::configure(dirname(__FILE__) . '\examples\resources\appender_file.properties');

// ======== PHP格式配置
Logger::configure(dirname(__FILE__) . '\test\config\config.php');

$logger = Logger::getRootLogger();
$logger->trace("1、This is a trace log.");
$logger->debug("2、This is a debug log.");
$logger->info("3、This is a info log.");
$logger->warn("4、This is a warn log.");
$logger->error("5、This is a error log.");
$logger->fatal("6、This is a fatal log.");



