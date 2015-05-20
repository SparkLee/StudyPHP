<?php
//i love it
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