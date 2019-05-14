<?php
///////////////////////////object///////////////////////////////////////////////
class foo
{
    function do_foo()
    {
        echo "Doing foo.";echo "<br>";
    }
}

$bar = new foo;
$bar->do_foo();

$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'}));echo "<br>"; // outputs 'bool(true)' as of PHP 7.2.0; 'bool(false)' previously
var_dump(key($obj));echo "<br>"; // outputs 'string(1) "1"' as of PHP 7.2.0; 'int(1)' previously

$obj = (object) 'ciao';
echo $obj->scalar;echo "<br>";  // outputs 'ciao'

////////////////////////////resource////////////////////////////////////////////
// prints: mysql link
// $c = mysql_connect();
// echo get_resource_type($c) . "\n";echo "<br>";

// prints: stream
$fp = fopen("foo", "w");
echo get_resource_type($fp) . "\n";echo "<br>";

// prints: domxml document
// $doc = new_xmldoc("1.0");
// echo get_resource_type($doc->doc) . "\n";echo "<br>";

///////////////////////////////////null/////////////////////////////////////////
$var = NULL;
echo "$var";echo "<br>";
echo is_null($var);echo "<br>";
unset($var);
echo "$var";echo "<br>";
echo is_null($var);echo "<br>";

////////////////////////////////////callback////////////////////////////////////
// Our closure
$double = function($a) {
    return $a * 2;
};

// This is our range of numbers
$numbers = range(1, 5);

// Use the closure as a callback here to
// double the size of each element in our
// range
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);echo "<br>";


// An example callback function
function my_callback_function() {
    echo 'hello world!';echo "<br>";
}

// An example callback method
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!';echo "<br>";
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function');

// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod'));

// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

// Type 4: Static class method call (As of PHP 5.2.3)
call_user_func('MyClass::myCallbackMethod');

// Type 5: Relative static class method call (As of PHP 5.3.0)
class A {
    public static function who() {
        echo "A\n";echo "<br>";
    }
}

class B extends A {
    public static function who() {
        echo "B\n";echo "<br>";
    }
}

call_user_func(array('B', 'parent::who')); // A

// Type 6: Objects implementing __invoke can be used as callables (since PHP 5.3)
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";echo "<br>";
    }
}

$c = new C();
call_user_func($c, 'PHP!');


class MyClass1 {

    public $property = 'Hello World!';

    public function MyMethod()
    {
        call_user_func(array($this, 'myCallbackMethod'));
    }

    public function MyCallbackMethod()
    {
        echo $this->property;echo "<br>";
    }

}

///////////////////////type-juggling////////////////////////////////////////////

$foo = "1";  // $foo is string (ASCII 49)
echo $foo;echo "<br>";
$foo *= 2; // $foo is now an integer (2)
echo $foo;echo "<br>";
$foo = $foo * 1.3;  // $foo is now a float (2.6)
echo $foo;echo "<br>";
$foo = 5 * "10 Little Piggies"; // $foo is integer (50)
echo $foo;echo "<br>";
$foo = 5 * "10 Small Pigs";     // $foo is integer (50)
echo $foo;echo "<br>";

$a    = 'car'; // $a is a string
$a[0] = 'b';   // $a is still a string
echo $a;echo "<br>";       // bar

$foo = 10;   // $foo is an integer
$bar = (boolean) $foo;   // $bar is a boolean
echo $foo;echo "<br>";
echo $bar;echo "<br>";


$foo = 10;            // $foo is an integer
$str = "$foo";        // $str is a string
$fst = (string) $foo; // $fst is also a string

// This prints out that "they are the same"
if ($fst === $str) {
    echo "they are the same";echo "<br>";
}
