<?php

////////////////Final Keyword////////////////////////
// final keyword, which prevents child classes from overriding a method by prefixing the definition with final.
//If the class itself is being defined final then it cannot be extended.
//Final methods example

// class BaseClass {
//     public function test() {
//         echo "BaseClass::test() called\n";
//     }
    
//     final public function moreTesting() {
//         echo "BaseClass::moreTesting() called\n";
//     }
//  }
 
//  class ChildClass extends BaseClass {
//     public function moreTesting() {
//         echo "ChildClass::moreTesting() called\n";
//     }
//  }
 // Results in Fatal error: Cannot override final method BaseClass::moreTesting()

/////////////////////////////////////Object Cloning //////////////////////////

class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Original Object:<br>");
print_r($obj);echo "<br>";

print("Cloned Object:<br>");
print_r($obj2);echo "<br>";


///Access member of freshly cloned object

$dateTime = new DateTime();
echo (clone $dateTime)->format('Y');

///////////////////////////////////////////////Comparing Objects///////////////////////////////////////

function bool2str($bool)
{
    if ($bool === false) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}

function compareObjects(&$o1, &$o2)
{
    echo 'o1 == o2 : ' . bool2str($o1 == $o2) . "<br>";
    echo 'o1 != o2 : ' . bool2str($o1 != $o2) . "<br>";
    echo 'o1 === o2 : ' . bool2str($o1 === $o2) . "<br>";
    echo 'o1 !== o2 : ' . bool2str($o1 !== $o2) . "<br>";
}

class Flag
{
    public $flag;

    function __construct($flag = true) {
        $this->flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function __construct($flag = true) {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class <br>";
compareObjects($o, $p);

echo "\nTwo references to the same instance <br>";
compareObjects($o, $q);

echo "\nInstances of two different classes <br>";
compareObjects($o, $r);
