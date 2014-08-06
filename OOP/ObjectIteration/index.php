<?php

/**
 * 遍历对象：PHP 5 提供了一种定义对象的方法使其可以通过单元列表来遍历，
 *          例如用 foreach 语句。默认情况下，所有可见属性都将被用于遍历。
 * 参考：http://php.net/manual/en/language.oop5.iterations.php
 */

/**
 * Example #1 简单的对象遍历
 *
 * @author admin
 *        
 */
class Person
{

    public $name = "spark lee";

    public $age = 26;

    public $gender = "female";

    private $nickname = "lei";

    protected $hobit = "pingpang";

    public function iterateVisible()
    {
        echo "Person::iterateVisible:\n";
        foreach ($this as $k => $v) {
            echo "$k => $v\n";
        }
    }
}

echo "Example #1 简单的对象遍历：\n";
$p = new Person();
$p->iterateVisible();
echo "-------------\n";
foreach ($p as $k => $v) {
    echo "$k => $v\n";
}

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
        echo "current:$var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "next:$var\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "key:$var\n";
        return $var;
    }

    public function valid()
    {
        $var = $this->current() !== false;
        echo "valid:$var\n";
        return $var;
    }

    public function rewind()
    {
        echo "rewinding\n";
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
    echo "$k: $v\n\n";
}
// var_dump($it);

/**
 * Example #3 通过实现 IteratorAggregate 来遍历对象
 *
 * @author admin
 *        
 */
class MyCollection implements IteratorAggregate
{

    private $items = array();

    private $count = 0;

    public function getIterator()
    {
        return new MyIterator($this->items);
    }

    public function add($value)
    {
        $this->items[$this->count ++] = $value;
    }
}

echo "\n<br>hExample #3 通过实现 IteratorAggregate 来遍历对象：\n";
$coll = new MyCollection();
$coll->add("value001");
$coll->add("value002");
$coll->add("value003");
foreach ($coll as $k => $v) {
    echo "$k: $v\n\n";
}