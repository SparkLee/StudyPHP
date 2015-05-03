<?php

/**
 * 遍历对象：PHP 5 提供了一种定义对象的方法使其可以通过单元列表来遍历，
 *          例如用 foreach 语句。默认情况下，所有可见属性都将被用于遍历。
 * 参考：http://php.net/manual/en/language.oop5.iterations.php
 */

/**
 * Example #2 实现 Iterator 接口的对象遍历
 * 可以让对象自行决定如何遍历以及每次遍历时那些值可用。
 *
 * @author admin
 *        
 */
class MyIterator implements Iterator
{

    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function current()
    {
        $var = current($this->var);
        echo "当前元素值为:$var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "下个元素的值为:$var\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "当前元素指针为:$var\n";
        return $var;
    }

    public function valid()
    {
        $var = $this->current() !== false;
        echo "当前元素是否存在:$var\n";
        return $var;
    }

    public function rewind()
    {
        echo "将数组指针移到第一个元素处\n";
        reset($this->var);
    }
}

echo "\nExample #2 实现 Iterator 接口的对象遍历：\n";
$values = array(
    "spark",
    "lee",
    "tom"
);
$it = new MyIterator($values);
foreach ($it as $k => $v) {
    echo "$k->$v\n";
}
// var_dump($it);
