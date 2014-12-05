<?php
header("content-type:text/html;charset=utf-8");
//error_reporting(E_ALL); //覆盖php.ini中的error_reporting指令值
//ini_set('display_errors', 'On'); //尽管 display_errors 也可以在运行时设置 (使用 ini_set())， 但是脚本出现致命错误时任何运行时的设置都是无效的。 因为在这种情况下预期运行的操作不会被执行。

echo $i; //使用未定义的变量会报Notice错误: Undefined variable

if (1 / 0) {  //运行时警告 (非致命错误)。仅给出提示信息，但是脚本不会终止运行。
    
}

//trigger_error("来一个用户自定义错误，错误级别为：E_USER_ERROR", E_USER_ERROR);
trigger_error("来一个用户自定义错误，错误级别为：E_USER_WARNING", E_USER_WARNING);
trigger_error("来一个用户自定义错误，错误级别为：E_USER_ERROR", E_USER_NOTICE);

//if //Parse error: syntax error

echo "<p>The End</p>";