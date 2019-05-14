<?php

$foo[bar] = 'enemy';
echo $foo['bar'];echo "<br>";//اشتباه است

$foo['bar'] = 'enemy';
echo $foo['bar'];echo "<br>";

// Show all errors
error_reporting(E_ALL);

$arr = array('fruit' => 'apple', 'veggie' => 'carrot');

// Correct
print $arr['fruit'];echo "<br>";  // apple
print $arr['veggie'];echo "<br>"; // carrot

// Incorrect.  This works but also throws a PHP error of level E_NOTICE because
// of an undefined constant named fruit
//
// Notice: Use of undefined constant fruit - assumed 'fruit' in...
print $arr[fruit];echo "<br>";    // apple

// This defines a constant to demonstrate what's going on.  The value 'veggie'
// is assigned to a constant named fruit.
define('fruit', 'veggie');

// Notice the difference now
print $arr['fruit'];echo "<br>";  // apple
print $arr[fruit];echo "<br>";    // carrot

// The following is okay, as it's inside a string. Constants are not looked for
// within strings, so no E_NOTICE occurs here
print "Hello $arr[fruit]";echo "<br>";      // Hello apple

// With one exception: braces surrounding arrays within strings allows constants
// to be interpreted
print "Hello {$arr[fruit]}";echo "<br>";    // Hello carrot
print "Hello {$arr['fruit']}";echo "<br>";  // Hello apple

// This will not work, and will result in a parse error, such as:
// Parse error: parse error, expecting T_STRING' or T_VARIABLE' or T_NUM_STRING'
// This of course applies to using superglobals in strings as well
// print "Hello $arr['fruit']";echo "<br>";
// print "Hello $_GET['foo']";echo "<br>";

// Concatenation is another option
print "Hello " . $arr['fruit'];echo "<br>"; // Hello apple

// echo $arr[somefunc($bar)];echo "<br>";

$error_descriptions[1]   = "A fatal error has occurred";
var_dump($error_descriptions[1]);echo "<br>";

$error_descriptions[2] = "PHP issued a warning";
var_dump($error_descriptions[2]);echo "<br>";

$error_descriptions[8]  = "This is just an informal notice";
var_dump($error_descriptions[8]);echo "<br>";

// This:
$a = array( 'color' => 'red',
            'taste' => 'sweet',
            'shape' => 'round',
            'name'  => 'apple',
            4        // key will be 0
          );
print_r($a);echo "<br>";

$b = array('a', 'b', 'c');
print_r($b);echo "<br>";

// . . .is completely equivalent with this:
$a = array();
$a['color'] = 'red';
$a['taste'] = 'sweet';
$a['shape'] = 'round';
$a['name']  = 'apple';
$a[]        = 4;        // key will be 0
print_r($a);echo "<br>";

$b = array();
$b[] = 'a';
$b[] = 'b';
$b[] = 'c';
print_r($b);echo "<br>";

// After the above code is executed, $a will be the array
// array('color' => 'red', 'taste' => 'sweet', 'shape' => 'round',
// 'name' => 'apple', 0 => 4), and $b will be the array
// array(0 => 'a', 1 => 'b', 2 => 'c'), or simply array('a', 'b', 'c').

// Array as (property-)map
$map = array( 'version'    => 4,
              'OS'         => 'Linux',
              'lang'       => 'english',
              'short_tags' => true
            );
print_r($map);echo "<br>";

// strictly numerical keys
$array = array( 7,
                8,
                0,
                156,
                -10
              );
print_r($array);echo "<br>";
// this is the same as array(0 => 7, 1 => 8, ...)

$switching = array(         10, // key = 0
                    5    =>  6,
                    3    =>  7,
                    'a'  =>  4,
                            11, // key = 6 (maximum of integer-indices was 5)
                    '8'  =>  2, // key = 8 (integer!)
                    '02' => 77, // key = '02'
                    0    => 12  // the value 10 will be overwritten by 12
                  );
print_r($switching);echo "<br>";

// empty array
$empty = array();
print_r($empty);echo "<br>";

$colors = array('red', 'blue', 'green', 'yellow');

foreach ($colors as $color) {
    echo "Do you like $color?\n";echo "<br>";
}

foreach ($colors as &$color) {
    $color = strtoupper($color);
}
unset($color); /* ensure that following writes to
$color will not modify the last array element */

print_r($colors);echo "<br>";
