<?php
////////////////float/////////////////////

$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if(abs($a-$b) < $epsilon){
  echo "True";echo "</br>";
}

$x = 8-6.4;// برابر با 1.6
$y = 1.6;
//پی اچ پی فکر میکنه 1.6 متفاوت است از 8-6.4
var_dump($x == $y);echo "</br>";
//از  فانکشن زیر برای تشخیص درست پی اچ پی استفاده کنید
var_dump(round($x) == round($y));echo "</br>";

if((float)$a == (float)$b){
  echo 'true';echo "</br>";
}else{
  echo 'false';echo "</br>";
}

if(number_format((float)$a) == number_format((float)$b)){
  echo "true";echo "</br>";
}else {
  echo "false";echo "</br>";
}

////////////////string//////////////

echo 'This is a simple string';echo "</br>";
echo "This will not expand: \n a newline";echo "</br>";

class foo {
  public $bar = <<<EOT
bar
EOT;
}

var_dump(array(<<<EOD
foobar!
EOD
));

 ?>
