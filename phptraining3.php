<?php
$a_bool = TRUE; //a boolean
$a_str = 'foo'; //a string
$an_int = 12; //an integer
$foo = True;

echo gettype($a_bool);echo "</br>";
echo gettype($a_str);echo "</br>";

if(is_int($an_int)){
  echo $an_int += 4;echo "</br>";
}

if(!is_string($a_bool)){
  echo "string: $a_bool";echo "</br>";
}

if($foo == 'show_version'){
  echo "The version is 1.23";echo "</br>";
}

if($a_bool == TRUE){
  echo "<hr>\n";echo "</br>";
}

if($a_bool){
  echo "<hr>\n";echo "</br>";
}
////////////////////////////boolean///////////////////////

var_dump((bool) "");echo "</br>"; //bool(false)
var_dump((bool) 1);echo "</br>"; //bool(true)
var_dump((bool) -2);echo "</br>"; //bool(true)
var_dump((bool) "foo");echo "</br>"; //bool(true)
var_dump((bool) 2.3e5);echo "</br>"; //bool(true)
var_dump((bool) array(12));echo "</br>"; //bool(true)
var_dump((bool) array());echo "</br>"; //bool(false)
var_dump((bool) "false");echo "</br>"; //bool(true)
var_dump((bool) 0);echo "</br>"; //bool(false)

var_dump(0 == 1);echo "</br>"; //bool(false)
var_dump(0 == (bool)"all");echo "</br>"; //bool(false)
var_dump(0 == "all");echo "</br>"; //bool(true)
var_dump(0 === "all");echo "</br>"; //bool(false)
var_dump((string)0 == "all");echo "</br>"; //bool(false)

////////////////////////////integer/////////////////////////

$a = 1234; //دهدهی
$a = -123; //عدد منفی
$a = 0123; //عدد هستم برابر با دهدهی 83
$a = 0x1A; //عدد هگزادسیمال برابر با دهدهی 26
$a = 0b11111111; //عدد باینری برابر با دهدهی 255

$large_number = 2147483647;
var_dump($large_number);echo "</br>";

$large_number = 2147483648;
var_dump($large_number);echo "</br>";

$million = 1000000;
$large_number = 50000 * $million;
var_dump($large_number);echo "</br>";

var_dump(25/7);echo "</br>";
var_dump((int) (25/7));echo "</br>";
var_dump(round(25/7));echo "</br>";

 ?>
