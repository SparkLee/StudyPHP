<?php
$name = "sparklee";
$xingming = &$name;
var_dump($name);
var_dump($xingming);
//var_dump(&$name); //调用时，不用引用传值：Deprecated: Call-time pass-by-reference has been deprecated
//var_dump(&$xingming);
echo "PHP的引用与其相应的变量完全相同" . ($name === $xingming);

//error_reporting(E_ERROR);
echo "\n------------------------------------\n";
$string = "spark";
//@var_dump($string);
function doit(&$str) { //引用传值
  $str .= ", with me, fighting!";
}
doit($string);
var_dump($string);

echo "\n------------------------------------\n";
$var1 = "Example variable";
$var2 = "";
function global_references($use_globals)
{
    global $var1, $var2;
    if (!$use_globals) {
        $var2 =& $var1; // visible only inside the function
    } else {
        $GLOBALS["var2"] =& $var1; // visible also in global context
    }
}
global_references(false);
echo "var2 is set to '$var2'\n"; // var2 is set to ''
global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to 'Example variable'

echo "\n------------------------------------\n";
class person {
    public $name = "lily";
}
function foo() {
    return "i am foo.";
}
$a = "aaa";
$b = "bbb";
$c = &$a;
$c = &$b;
//$c = new person();
//$c = foo();
$c = array(1);
//unset($c);
//$c = 100;
var_dump($a);
var_dump($b);
var_dump($c);

echo "\n------------------------------------\n";
class foo {
    public $value = 42;

    public function &getValue() {
        return $this->value;
    }
}
$obj = new foo;
$myValue = &$obj->getValue(); // $myValue is a reference to $obj->value, which is 42.
$obj->value = 2;
echo $myValue;                // prints the new value of $obj->value, i.e. 2.

echo "\n------------------------------------\n";

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler("exception_error_handler");

//throw new Exception("测试异常");
$bar = array(1);
try {
    //throw new Exception("测试异常");
    //echo (1 / 0);
    //echo ($bar[2]);
    //test();
    strpos();
} catch (ErrorException $ee) {
    echo "出错误异常咯：\n";
    var_dump($ee);
} catch (Exception $e) {
    echo "出异常咯：\n";
    //var_dump($e);
    echo ($e->getMessage());
}




