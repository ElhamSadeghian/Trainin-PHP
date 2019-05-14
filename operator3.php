<?php

/////////////////Logical Operators/////////////////////

// --------------------
// foo() will never get called as those operators are short-circuit

$a = (false && foo());
echo $a;echo "<br>";

$b = (true  || foo());
echo $b;echo "<br>";

$c = (false and foo());
echo $c;echo "<br>";

$d = (true  or  foo());
echo $d;echo "<br>";

// --------------------
// "||" has a greater precedence than "or"

// The result of the expression (false || true) is assigned to $e
// Acts like: ($e = (false || true))
$e = false || true;
echo $e;echo "<br>";

// The constant false is assigned to $f before the "or" operation occurs
// Acts like: (($f = false) or true)
$f = false or true;
echo $f;echo "<br>";

var_dump($e, $f);echo "<br>";

// --------------------
// "&&" has a greater precedence than "and"

// The result of the expression (true && false) is assigned to $g
// Acts like: ($g = (true && false))
$g = true && false;
echo $g;echo "<br>";
// The constant true is assigned to $h before the "and" operation occurs
// Acts like: (($h = true) and false)
$h = true and false;
echo $h;echo "<br>";

var_dump($g, $h);echo "<br>";

//////////////////////String Operators///////////////

$a = "Hello ";
$b = $a . "World!"; // now $b contains "Hello World!"
echo $b;echo "<br>";

$a = "Hello ";
echo $a;echo "<br>";
$a .= "World!";     // now $a contains "Hello World!"
echo $a;echo "<br>";


///////////////Array Operators/////////////////////

$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Union of $a and $b
echo "Union of \$a and \$b";echo "<br>";
var_dump($c);echo "<br>";

$c = $b + $a; // Union of $b and $a
echo "Union of \$b and \$a";echo "<br>";
var_dump($c);echo "<br>";

$a += $b; // Union of $a += $b is $a and $b
echo "Union of \$a += \$b";echo "<br>";
var_dump($a);echo "<br>";

$a = array("apple", "banana");
$b = array(1 => "banana", "0" => "apple");

var_dump($a == $b); echo "<br>";// bool(true)
var_dump($a === $b);echo "<br>"; // bool(false)


///////////////////////Type Operators////////////////////////////////

class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass);echo "<br>";
var_dump($a instanceof NotMyClass);echo "<br>";


class ParentClass
{
}

class MyClass1 extends ParentClass
{
}

$a = new MyClass1;

var_dump($a instanceof MyClass1);echo "<br>";
var_dump($a instanceof ParentClass);echo "<br>";


interface MyInterface
{
}

class MyClass2 implements MyInterface
{
}

$a = new MyClass2;
$b = new MyClass2;
$c = 'MyClass2';
$d = 'NotMyClass1';

var_dump($a instanceof $b);echo "<br>"; // $b is an object of class MyClass
var_dump($a instanceof $c);echo "<br>"; // $c is a string 'MyClass'
var_dump($a instanceof $d);echo "<br>"; // $d is a string 'NotMyClass'
?>
