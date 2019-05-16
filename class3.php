<?php
////////////////Visibility////////////////////////////

/**
 * Define MyClass
 */
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;echo "<br>";
        echo $this->protected;echo "<br>";
        echo $this->private;echo "<br>";
    }
}

$obj = new MyClass();
echo $obj->public;echo "<br>"; // Works
// echo $obj->protected;echo "<br>"; // Fatal Error
// echo $obj->private;echo "<br>"; // Fatal Error
$obj->printHello(); // Shows Public, Protected and Private


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
    // We can redeclare the public and protected properties, but not private
    public $public = 'Public2';
    protected $protected = 'Protected2';

    function printHello()
    {
        echo $this->public;echo "<br>";
        echo $this->protected;echo "<br>";
        // echo $this->private;echo "<br>"; // Undefined
    }
}

$obj2 = new MyClass2();
echo $obj2->public;echo "<br>"; // Works
// echo $obj2->protected;echo "<br>"; // Fatal Error
// echo $obj2->private;echo "<br>"; // Undefined
$obj2->printHello(); // Shows Public2, Protected2, Undefined



////////////////////////Object Inheritance //////////////////////////

class Foo
{
    public function ptintItem($string)
    {
        echo 'Foo: ' .$string . PHP_EOL;
    }

    public function PrintPHP()
    {
        echo 'PHP is great.' . PHP_EOL;
    }
}

class Bar extends Foo
{
    public function PrintItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new Foo();
$bar = new Bar();

// $foo->PrintItem('baz');echo "<br>";
$foo->PrintPHP();echo "<br>";

$bar->PrintItem('baz');echo "<br>";
$bar->PrintPHP();echo "<br>";