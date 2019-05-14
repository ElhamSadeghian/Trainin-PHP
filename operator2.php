<?php

//////////////Comparison Operators////////////////

var_dump(0 == "a");echo "<br>"; // 0 == 0 -> true
var_dump("1" == "01");echo "<br>"; // 1 == 1 -> true
var_dump("10" == "1e1");echo "<br>"; // 10 == 10 -> true
var_dump(100 == "1e2");echo "<br>"; // 100 == 100 -> true

switch ("a") {
case 0:
    echo "0";echo "<br>";
    break;
case "a": // never reached because "a" is already matched with 0
    echo "a";echo "<br>";
    break;
}


// Integers
echo 1 <=> 1;echo "<br>"; // 0
echo 1 <=> 2;echo "<br>"; // -1
echo 2 <=> 1;echo "<br>"; // 1

// Floats
echo 1.5 <=> 1.5;echo "<br>"; // 0
echo 1.5 <=> 2.5;echo "<br>"; // -1
echo 2.5 <=> 1.5;echo "<br>"; // 1

// Strings
echo "a" <=> "a";echo "<br>"; // 0
echo "a" <=> "b";echo "<br>"; // -1
echo "b" <=> "a";echo "<br>"; // 1

echo "a" <=> "aa";echo "<br>"; // -1
echo "zz" <=> "aa";echo "<br>"; // 1

// Arrays
echo [] <=> [];echo "<br>"; // 0
echo [1, 2, 3] <=> [1, 2, 3];echo "<br>"; // 0
echo [1, 2, 3] <=> [];echo "<br>"; // 1
echo [1, 2, 3] <=> [1, 2, 1];echo "<br>"; // 1
echo [1, 2, 3] <=> [1, 2, 4];echo "<br>"; // -1

// Objects
$a = (object) ["a" => "b"];
$b = (object) ["a" => "b"];
echo $a <=> $b;echo "<br>"; // 0

$a = (object) ["a" => "b"];
$b = (object) ["a" => "c"];
echo $a <=> $b;echo "<br>"; // -1

$a = (object) ["a" => "c"];
$b = (object) ["a" => "b"];
echo $a <=> $b;echo "<br>"; // 1

// not only values are compared; keys must match
$a = (object) ["a" => "b"];
$b = (object) ["b" => "b"];
echo $a <=> $b;echo "<br>"; // 1


// var_dump('a' < TRUE);
// $user = [];
// if($user){
//   echo 'hi';
// }

// Bool and null are compared as bool always
var_dump(1 == TRUE);echo "<br>";  // TRUE - same as (bool)1 == TRUE
var_dump(0 == FALSE);echo "<br>"; // TRUE - same as (bool)0 == FALSE
var_dump(100 < TRUE);echo "<br>"; // FALSE - same as (bool)100 < TRUE
var_dump(-10 < FALSE);echo "<br>";// FALSE - same as (bool)-10 < FALSE
var_dump(min(-100, -10, NULL, 10, 100));echo "<br>"; // NULL - (bool)NULL < (bool)-100 is FALSE < TRUE


// Arrays are compared like this with standard comparison operators
$op1 = [1, 2, 3];
$op2 = [3, 2, 1];
function standard_array_compare($op1, $op2)
{
    if (count($op1) < count($op2)) {
        return -1; // $op1 < $op2
    } elseif (count($op1) > count($op2)) {
        return 1; // $op1 > $op2
    }
    foreach ($op1 as $key => $val) {
        if (!array_key_exists($key, $op2)) {
            return null; // uncomparable
        } elseif ($val < $op2[$key]) {
            return -1;
        } elseif ($val > $op2[$key]) {
            return 1;
        }
    }
    return 0; // $op1 == $op2
}

echo standard_array_compare($op1, $op2);echo "<br>";

///////////////////Ternary Operator////////////////////

// Example usage for: Ternary Operator
$action = (empty($_POST['action'])) ? 'default' : $_POST['action'];
echo $action;echo "<br>";

// The above is identical to this if/else statement
if (empty($_POST['action'])) {
    $action = 'default';
} else {
    $action = $_POST['action'];
}

echo $action;echo "<br>";

// on first glance, the following appears to output 'true'
echo (true?'true':false?'t':'f');echo "<br>";

// however, the actual output of the above is 't'
// this is because ternary expressions are evaluated from left to right

// the following is a more obvious version of the same code as above
echo ((true ? 'true' : false) ? '1' : '0');echo "<br>";

// here, you can see that the first expression is evaluated to 'true', which
// in turn evaluates to (bool)true, thus returning the true branch of the
// second ternary expression.

////////////////////////////////////Null Coalescing Operator///////////////////

// Example usage for: Null Coalesce Operator
$action = $_POST['action'] ?? 'default';
echo $action;echo "<br>";

// The above is identical to this if/else statement
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'default';
}
echo $action;echo "<br>";


$foo = null;
$bar = null;
$baz = 1;
$qux = 2;

echo $foo ?? $bar ?? $baz ?? $qux;echo "<br>"; // outputs 1

//////////////Error Control Operators//////////////


/* Intentional file error */
$my_file = @file ('non_existent_file') or
    ("Failed opening file: error was '$my_file'");

// this works for any expression, not just functions:
$value = @$cache[$key];
// will not issue a notice if the index $key doesn't exist.

//////////////Execution Operators/////////////////////////////
$output = `ls -al`;
echo "<pre>$output</pre>";echo "<br>";

$host = 'www.wuxiancheng.cn';
   echo `ping -n 3 {$host}`;echo "<br>";

$output = `date`;
   echo "Current date of your system: $output";echo "<br>";


////////////////Incrementing/Decrementing Operators////////////////////

echo "<h3>Postincrement</h3>";
$a = 5;
echo "Should be 5: " . $a++ . "<br />\n";
echo "Should be 6: " . $a . "<br />\n";

echo "<h3>Preincrement</h3>";
$a = 5;
echo "Should be 6: " . ++$a . "<br />\n";
echo "Should be 6: " . $a . "<br />\n";

echo "<h3>Postdecrement</h3>";
$a = 5;
echo "Should be 5: " . $a-- . "<br />\n";
echo "Should be 4: " . $a . "<br />\n";

echo "<h3>Predecrement</h3>";
$a = 5;
echo "Should be 4: " . --$a . "<br />\n";
echo "Should be 4: " . $a . "<br />\n";


echo '== Alphabets ==' . PHP_EOL;echo "<br>";
$s = 'W';
for ($n=0; $n<6; $n++) {
    echo ++$s . PHP_EOL;echo "<br>";
}
// Digit characters behave differently
echo '== Digits ==' . PHP_EOL;echo "<br>";
$d = 'A8';
for ($n=0; $n<6; $n++) {
    echo ++$d . PHP_EOL;echo "<br>";
}
$d = 'A08';
for ($n=0; $n<6; $n++) {
    echo ++$d . PHP_EOL;echo "<br>";
}


$n = 3;
           echo $n-- + --$n;
           echo "<br/>";
           echo $n;echo "<br>";
