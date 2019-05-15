<?php
///////////////////////AutoLoad Example/////////

//allows you to register multiple functions 
//(or static methods from your own Autoload class)
// that PHP will put into a stack/queue and call sequentially when a "new Class" is declared.

spl_autoload_register(function ($class_name) {
    // include $class_name . '.php';
});


///MyClass1 & MyClass2 have a seperate file
// $obj  = new MyClass1(); 
// echo $obj;echo "<br>";

// $obj2 = new MyClass2(); 
// echo $obj2;echo "<br>";

/////This example throws an exception and demonstrates the try/catch block.

spl_autoload_register(function ($name) {
    echo "Want to load $name";echo "<br>";
    throw new Exception("Unable to load $name.");
});

try {
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage();echo "<br>";
}


//////////Constructors////////////////
class BaseClass {
    function __construct() {
        print "In BaseClass constructor";echo "<br>";
    }
}

class SubClass extends BaseClass {
    function __construct() {
        parent::__construct();
        print "In SubClass constructor";echo "<br>";
    }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();


//////////////////////////////Dstructor/////////////////
class MyDestructableClass 
{
    function __construct() {
        print "In constructor";echo "<br>";
    }

    function __destruct() {
        print "Destroying " . __CLASS__ ;echo "<br>";
    }
}

$obj = new MyDestructableClass();