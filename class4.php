<?php

///////////Scope Resolution Operator (::)////////
//The Scope Resolution Operator (also called Paamayim Nekudotayim) or in simpler terms, the double colon,
// is a token that allows access to static, constant, and overridden properties or methods of a class.

// When referencing these items from outside the class definition, use the name of the class.

class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;echo "<br>"; // As of PHP 5.3.0

echo MyClass::CONST_VALUE;echo "<br>";


//Three special keywords self, parent and static are used to access properties or methods from inside the class definition.
class OtherClass extends MyClass
{
    public static $my_static = 'static var';

    public static function doubleColon() {
        echo parent::CONST_VALUE;echo "<br>";
        echo self::$my_static;echo "<br>";
    }
}

$classname = 'OtherClass';
$classname::doubleColon(); // As of PHP 5.3.0

OtherClass::doubleColon();


//When an extending class overrides the parents definition of a method,
//PHP will not call the parent's method. It's up to the extended class on whether or not the parent's method is called.
class MyClass1
{
    protected function myFunc() {
        echo "MyClass1::myFunc()";echo "<br>";
    }
}

class OtherClass1 extends MyClass1
{
    // Override parent's definition
    public function myFunc()
    {
        // But still call the parent function
        parent::myFunc();
        echo "OtherClass1::myFunc()";echo "<br>";
    }
}

$class = new OtherClass1();
$class->myFunc();


///////////////////Static Keyword//////////////////////////////////////////////////

//Because static methods are callable without an instance of the object created,
//the pseudo-variable $this is not available inside the method declared as static.

//Static properties cannot be accessed through the object using the arrow operator ->.

class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


print Foo::$my_static;echo "<br>";

$foo = new Foo();
print $foo->staticValue();echo "<br>";
print $foo->my_static;echo "<br>";      // Undefined "Property" my_static   //Accessing static property Foo::$my_static as non static

print $foo::$my_static;echo "<br>";
$classname = 'Foo';
print $classname::$my_static;echo "<br>"; // As of PHP 5.3.0

print Bar::$my_static;echo "<br>";
$bar = new Bar();
print $bar->fooStatic();echo "<br>";


///////////////////////Class Abstraction//////////////////////////////////////

abstract class AbstractClass
{
    // Force Extending class to define this method
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Common method
    public function printOut() {
        print $this->getValue();echo "<br>";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_');echo "<br>";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_');echo "<br>";



abstract class AbstractClass3
{
    // Our abstract method only needs to define the required arguments
    abstract protected function prefixName($name);

}

class ConcreteClass3 extends AbstractClass3
{

    // Our child class may define optional arguments not in the parent's signature
    public function prefixName($name, $separator = ".") {
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }
        return "{$prefix}{$separator} {$name}";
    }
}    

$class = new ConcreteClass3;
echo $class->prefixName("Pacman");echo "<br>";
echo $class->prefixName("Pacwoman");echo "<br>";
