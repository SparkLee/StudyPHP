<?php

/**
 * 遍历对象：PHP 5 提供了一种定义对象的方法使其可以通过单元列表来遍历，
 *          例如用 foreach 语句。默认情况下，所有可见属性都将被用于遍历。
 * 参考：http://php.net/manual/en/language.oop5.iterations.php
 */

/**
 * Example #3 通过实现 IteratorAggregate 来遍历对象
 *
 * @author admin
 *        
 */

include('iteration2.php');
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

echo "\nExample #3 通过实现 IteratorAggregate 来遍历对象：\n";
$coll = new MyCollection();
$coll->add("value001");
$coll->add("value002");
$coll->add("value003");
foreach ($coll as $k => $v) {
    echo "$k: $v\n\n";
}