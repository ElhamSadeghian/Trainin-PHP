<?php
////assuming that error_reporting is disabled ...
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined ( <br>';
            echo get_class($this);echo "<br>";
            echo ") <br>";
        } else {
            echo "\$this is not defined. <br>";
        }
    }
}

class B
{
    function bar()
    {
        A::foo();
    }
}

$a = new A();
$a->foo();

A::foo();

$b = new B();
$b->bar();

B::bar();

class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}

$instance = new SimpleClass();

// This can also be done with a variable:
$className = 'SimpleClass';
$instance = new $className(); // new SimpleClass()

var_dump($instance);echo "<br>";

$instance = new SimpleClass();

$assigned   =  $instance;
$reference  =& $instance;

$instance->var = '$assigned will have this value';

$instance = null; // $instance and $reference become null

var_dump($instance);echo "<br>";
var_dump($reference);echo "<br>";
var_dump($assigned);echo "<br>";


class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);echo "<br>";

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);echo "<br>";

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);echo "<br>";


echo (new DateTime())->format('Y');echo "<br>";



class Foo1
{
    public $bar = 'property';
    
    public function bar() {
        return 'method';
    }
}

$obj = new Foo1();
echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;echo "<br>";

class Foo2
{
    public $bar;
    
    public function __construct() {
        $this->bar = function() {
            return 42;
        };
    }
}

$obj = new Foo2();

// as of PHP 5.3.0:
$func = $obj->bar;
echo $func(), PHP_EOL;echo "<br>";

// // alternatively, as of PHP 7.0.0:
// echo ($obj->bar)(), PHP_EOL;

////////////Extends/////////////
class ExtendClass extends SimpleClass
{
    // Redefine the parent method
    function displayVar()
    {
        echo "Extending class";echo "<br>";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar();


///////////////////////Class Constants//////////////////
class MyClass
{
    const CONSTANT = 'constant value';

    function showConstant() {
        echo  self::CONSTANT;echo "<br>";
    }
}

echo MyClass::CONSTANT;echo "<br>";

$classname = "MyClass";
echo $classname::CONSTANT;echo "<br>"; // As of PHP 5.3.0

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT;echo "<br>"; // As of PHP 5.3.0


class Foo3 {
    // As of PHP 7.1.0
    const BAR = 'bar';
    const BAZ = 'baz';
}
echo Foo3::BAR, PHP_EOL;echo "<br>";
echo Foo3::BAZ, PHP_EOL;echo "<br>";

//////////////////