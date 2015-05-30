<?php
/**
 * 自 PHP 5.4.0 起，PHP 实现了代码复用的一个方法，称为 traits。
 * 
 * 官方参考：http://php.net/manual/zh/language.oop5.traits.php
 */
ini_set("display_errors", 1);
error_reporting(E_ALL);

/* ======================== 优先级 ============================== */
/* 从基类继承的成员被 trait 插入的成员所覆盖。优先顺序是来 自                  */
/* 当前类的成员覆盖了 trait 的 方法，而 trait 则覆盖了被继承的方法      */
/*=============================================================*/

class Base
{

    public function sayHello()
    {
        echo "Hello ";
    }
}

trait SayWorld
{

    public function sayHello()
    {
        parent::sayHello();
        echo "World!";
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;
    
    /*
     * public function sayHello() { echo "welcom to my world."; }
     */
}

// $obj = new MyHelloWorld();
// $obj->sayHello();

/* ======================== 多个 trait ============================== */
/* 通过逗号分隔，在 use 声明列出多个 trait，可以都插入到一个类中。                */
/*=================================================================*/

trait Hello
{

    public function sayHello()
    {
        echo "Hello ";
    }
}

trait World
{

    public function sayWorld()
    {
        echo "World";
    }
}

class HelloWorld
{
    use Hello, World;

    public function sayExclamationMark()
    {
        echo "!";
    }
}

// $obj = new HelloWorld();
// $obj->sayHello();
// $obj->sayWorld();
// $obj->sayExclamationMark();

/* ======================== 冲突的解决 ============================================ */
/* 如果两个 trait 都插入了一个同名的方法，如果没有明确解决冲突将会产生一个致命错误。       */
/* 为了解决多个 trait在同一个类中的命名冲突，需要使用 insteadof 操作符来明确指定使            */
/* 用冲突方法中的哪一个。以上方式仅允许排除掉其它方法，as 操作符可以将其中一个冲突           */
/* 的方法以另一个名称来引入。                                                                                                                                                */
/*===============================================================================*/

trait A
{

    public function smallTalk()
    {
        echo "a<br>";
    }

    public function bigTalk()
    {
        echo "A<br>";
    }
}

trait B
{

    public function smallTalk()
    {
        echo "b<br>";
    }

    public function bigTalk()
    {
        echo "B<br>";
    }
}

class Talker
{
    use A, B {
        B::smallTalk insteadof A; //B::smallTalk代替（覆盖）A::smallTalk
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker
{
    use A, B {
        B::smallTalk insteadof A; //B::smallTalk代替（覆盖）A::smallTalk
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}

// $obj = new Talker();
// $obj->smallTalk();
// $obj->bigTalk();
// echo "<hr>";
// $obj2 = new Aliased_Talker();
// $obj2->smallTalk();
// $obj2->bigTalk();
// $obj2->talk();

/* ======================== 修改方法的访问控制 ============= */
/* 使用 as 语法还可以用来调整方法的访问控制。                                         */
/*=======================================================*/

trait HiWorld
{

    public function sayHi()
    {
        echo "Hi.";
    }
}

// 修改 sayHi 的访问控制
class MyClass1
{
    use HiWorld {
        //sayHi as protected;
    }
}

// 给方法一个改变了访问控制的别名
// 原版 sayHello 的访问控制则没有发生变化
class MyClass2
{
    use HiWorld {
        sayHi as private myPrivateSayHi;
    }
}

// $obj = new MyClass1();
// $obj->sayHi();

// $obj = new MyClass2();
// $obj->sayHi();
// $obj->myPrivateSayHi();

/* ======================== 从 trait 来组成 trait ====================== */
/* 正如类能够使用 trait 一样，其它 trait 也能够使用 trait。在 trait 定           */
/* 义时通过使用一个或多个 trait，它能够组合其它 trait 中的部分或全部成员    */
/*==================================================================*/
trait Spark
{

    public function saySpark()
    {
        echo "Spark";
    }
}

trait Lee
{

    public function sayLee()
    {
        echo "Lee";
    }
}

trait SparkLee
{
    use Spark, Lee;
}

class SL
{
    use SparkLee;
}

// $obj = new SL();
// $obj->saySpark();
// $obj->sayLee();

/* ======================== Trait 的抽象成员 ============= */
/* 为了对使用的类施加强制要求，trait 支持抽象方法的使用。      */
/*======================================================*/

trait Wei
{

    abstract public function sayWei();
}

class WeiLee
{
    use Wei;

    public function sayWei()
    {
        echo "Lee Wei.";
    }
}

// $obj = new WeiLee();
// $obj->sayWei();

/* ======================== Trait 的静态成员 ============= */
/* Traits 支持静态成员和静态方法的定义。                                                      */
/*======================================================*/

trait StaticExample
{
    static $name = "spark lee";

    public static function sayName()
    {
        echo "My Name is SparkLee";
    }
}

class C
{
    use StaticExample;
}

// C::sayName();
// echo "<br>" . C::$name;

/* ======================== 属性 ============================================= */
/* 如果 trait 定义了一个属性，那类将不能定义同样名称的属性，否则会产生一个错误。        */
/* 如果该属性在类中的定义与在 trait 中的定义兼容（同样的可见性和初始值）则错误的        */
/* 级别是 E_STRICT，否则是一个致命错误。                                                                                                            */
/*=========================================================================== */

trait PropertiesTrait
{
    public $same = true;
    public $different = false;
}

class PropertiesExample
{
    use PropertiesTrait;
    public $same = true; // Strict Standards
    public $different = true; // 致命错误
}

