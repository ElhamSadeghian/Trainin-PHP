<?php

///////////////////////////////////Basics//////////////////////////////////////
$var = 'Bob';
$Var = 'Joe';
echo "$var, $Var";echo "<br>";      // outputs "Bob, Joe"

// $4site = 'not yet';     // invalid; starts with a number
$_4site = 'not yet';    // valid; starts with an underscore
$täyte = 'mansikka';    // valid; 'ä' is (Extended) ASCII 228.
echo $_4site;echo "<br>";
echo $täyte;echo "<br>";

$foo = 'Bob';              // Assign the value 'Bob' to $foo
$bar = &$foo;              // Reference $foo via $bar.
$bar = "My name is $bar";  // Alter $bar...
echo $bar;echo "<br>";
echo $foo; echo "<br>";                // $foo is altered too.

// Unset AND unreferenced (no use context) variable; outputs NULL
var_dump($unset_var);echo "<br>";

// Boolean usage; outputs 'false' (See ternary operators for more on this syntax)
echo($unset_bool ? "true\n" : "false\n");echo "<br>";

// String usage; outputs 'string(3) "abc"'
$unset_str .= 'abc';
var_dump($unset_str);echo "<br>";

// Integer usage; outputs 'int(25)'
$unset_int += 25; // 0 + 25 => 25
var_dump($unset_int);echo "<br>";

// Float/double usage; outputs 'float(1.25)'
$unset_float += 1.25;
var_dump($unset_float);echo "<br>";

// Array usage; outputs array(1) {  [3]=>  string(3) "def" }
$unset_arr[3] = "def"; // array() + array(3 => "def") => array(3 => "def")
var_dump($unset_arr);echo "<br>";

// Object usage; creates new stdClass object (see http://www.php.net/manual/en/reserved.classes.php)
// Outputs: object(stdClass)#1 (1) {  ["foo"]=>  string(3) "bar" }
$unset_obj->foo = 'bar';
var_dump($unset_obj);echo "<br>";

/////////////////////////////////////Predefined Variables///////////////////////

//SuperGlobals are Predefined Variables.

if (!isset($_SERVER))
{
    $_GET     = &$HTTP_GET_VARS;
    $_POST    = &$HTTP_POST_VARS;
    $_ENV     = &$HTTP_ENV_VARS;
    $_SERVER  = &$HTTP_SERVER_VARS;
    $_COOKIE  = &$HTTP_COOKIE_VARS;
    $_REQUEST = array_merge($_GET, $_POST, $_COOKIE);
}

echo $PHP_SELF = $_SERVER['PHP_SELF'];echo "<br>";

//////////////////Variable Scope////////////////////////////////////////////////

$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
}

Sum();
echo $b;echo "<br>"; ///وقتی متغیر خارج تابع تعریف میشود، برای استفاده از آن ذر تابع از گلوبال استفاده میشود.

$a = 1;
$b = 2;

function Sum1()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Sum1();
echo $b;echo "<br>"; //Using $GLOBALS instead of global


function test_global()
{
    // Most predefined variables aren't "super" and require
    // 'global' to be available to the functions local scope.
    global $HTTP_POST_VARS;

    echo $HTTP_POST_VARS['name'];echo "<br>";

    // Superglobals are available in any scope and do
    // not require 'global'. Superglobals are available
    // as of PHP 4.1.0, and HTTP_POST_VARS is now
    // deemed deprecated.
    echo $_POST['name'];echo "<br>";
}

///////////////////////////////static variables ////////////////////////////////

function test()
{
    $a = 0;
    echo $a;echo "<br>";
    $a++;
}
test();

function test1()
{
    static $a = 0;
    $a++;
    echo $a;echo "<br>";

}
test1();

function test3()
{
    static $count = 0;

    $count++;
    echo $count;echo "<br>";
    if ($count < 10) {
        test3();
    }
    // $count--;
}


function foo(){
  global $int;
    static $int = 0;          // correct
    static $int = 1+2;        // correct (as of PHP 5.6)
    // static $int = sqrt(121);  // wrong  (as it is a function)

    $int++;
}
foo();
echo $int;echo "<br>";

////////////////////References with global and static variables/////////////////

function test_global_ref() {
    global $obj;
    $obj = new stdclass;
}

function test_global_noref() {
    global $obj;
    $obj = new stdclass;
}

test_global_ref();
var_dump($obj);echo "<br>";
test_global_noref();
var_dump($obj);echo "<br>";



function &get_instance_ref() {
    static $obj;

    echo 'Static object: ';echo "<br>";
    var_dump($obj);echo "<br>";
    if (!isset($obj)) {
        // Assign a reference to the static variable
        $obj = new stdclass;
    }
    $obj->property++;
    return $obj;
}

function &get_instance_noref() {
    static $obj;

    echo 'Static object: ';echo "<br>";
    var_dump($obj);echo "<br>";
    if (!isset($obj)) {
        // Assign the object to the static variable
        $obj = new stdclass;
    }
    $obj->property++;
    return $obj;
}

$obj1 = get_instance_ref();
$still_obj1 = get_instance_ref();
echo "\n";echo "<br>";
$obj2 = get_instance_noref();
$still_obj2 = get_instance_noref();
///This example demonstrates that when assigning a reference to a static variable, it's not remembered when you call the &get_instance_ref() function a second time.
