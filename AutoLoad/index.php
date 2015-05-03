<?php
/**
 * Tip：spl_autoload_register() 提供了一种更加灵活的方式来实现类的自动加载。
 * 因此，不再建议使用 __autoload() 函数，在以后的版本中它可能被弃用。
 * 
 */
// function __autoload($class_name) {
// //echo "I am autoload method.";
// require_once $class_name . '.php';
// //throw new Exception("Unable to load $class_name");
// }

/**
 * 使用spl_autoload_xxx
 */
// spl_autoload_register(); // 如果没有提供任何参数，则自动注册autoload的默认实现函数spl_autoload()。
spl_autoload_register("my_autoload");

function my_autoload($class_name)
{
    require_once "{$class_name}.php";
}
// spl_autoload_unregister("my_autoload");

echo spl_autoload_extensions() . "\n\n"; // 当不使用任何参数调用此函数时，它返回当前的文件扩展名的列表，不同的扩展名用逗号分隔。要修改文件扩展名列表，用一个逗号分隔的新的扩展名列表字符串来调用本函数即可。中文注：默认的spl_autoload函数使用的扩展名是".inc,.php"。
var_dump(spl_autoload_functions());
echo "\n"; // 获取所有已注册的 __autoload() 函数。

try {
    $p = new Person();
} catch (Exception $e) {
    echo $e->getMessage();
}