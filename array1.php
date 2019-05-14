<?php

$array = array('fruit' => 'apple', 'cloths'=> 'T-shirt');
print_r($array);echo "<br>";

$newArray = ['fruit' => 'apple', 'cloths'=> 'T-shirt'];
var_dump($newArray);echo "<br>";

$test = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);
var_dump($test);echo "<br>";
print_r($test);echo "<br>";

$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);
var_dump($array);echo "<br>";

$array = array("foo", "bar", "hello", "world");
var_dump($array);echo "<br>"; //آرایه بدون اسم فیلد به طور خودکار از صفر شماره میگیرد.

$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);echo "<br>";//It is possible to specify the key only for some elements and leave it out for others

$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array["foo"]);echo "<br>";
var_dump($array[42]);echo "<br>";
var_dump($array["multi"]["dimensional"]["array"]);echo "<br>";

//برای دسترسی به یک فیلد خاص از روش فوق استفاده می‌کنیم.

function getArray() {
    return array(1, 2, 3);
}

// on PHP 5.4
$secondElement = getArray()[1];
var_dump($secondElement);echo "<br>";//اسم فیلد رو برمیگردونه

// previously
$tmp = getArray();
$secondElement1 = $tmp[2];
var_dump($secondElement1);echo "<br>";//اسم فیلد رو برمیگردونه

// or
list(, $secondElement) = getArray();//???????????

$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // This is the same as $arr[13] = 56;
                // at this point of the script
var_dump($arr);echo "<br>";

$arr["x"] = 42; // This adds a new element to
                // the array with key "x"
var_dump($arr);echo "<br>";

unset($arr[5]); // This removes the element from the array
var_dump($arr);echo "<br>";

unset($arr);    // This deletes the whole array
var_dump($arr);echo "<br>";

// Create a simple array.
$array = array(1, 2, 3, 4, 5);
print_r($array);echo "<br>";

// Now delete every item, but leave the array itself intact:
foreach ($array as $i => $value) {
    unset($array[$i]);
}
print_r($array);echo "<br>";

// Append an item (note that the new key is 5, instead of 0).
$array[] = 6;
print_r($array);echo "<br>";

// Re-index:
$array = array_values($array);
$array[] = 7;
print_r($array);echo "<br>";

$a = array(1 => 'one', 2 => 'two', 3 => 'three');
print_r($a);echo "<br>";
unset($a[2]);
print_r($a);echo "<br>";
/* will produce an array that would have been defined as
   $a = array(1 => 'one', 3 => 'three');
   and NOT
   $a = array(1 => 'one', 2 =>'three');
*/

$b = array_values($a);
print_r($b);echo "<br>";
// Now $b is array(0 => 'one', 1 =>'three')
