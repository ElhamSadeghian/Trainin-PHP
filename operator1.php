<?php
$a = 3 * 3 % 5; // (3 * 3) % 5 = 4
echo $a;echo "<br>";

// ternary operator associativity differs from C/C++
$a = true ? 0 : true ? 1 : 2; // (true ? 0 : true) ? 1 : 2 = 2
echo $a;echo "<br>";

$a = 1;
$b = 2;
$a = $b += 3; // $a = ($b += 3) -> $a = 5, $b = 5
echo $a;echo "<br>";
echo $b;echo "<br>";

//PHP does not specify in which order an expression is evaluated and
//code that assumes a specific order of evaluation should be avoided.
$a = 1;
echo $a + $a++;echo "<br>"; // may print either 2 or 3

$i = 1;
$array[$i] = $i++; // may set either index 1 or 2
echo $array[$i];echo "<br>";

$x = 4;
// this line might result in unexpected output:
echo "x minus one equals " . $x-1 . ", or so I hope\n";echo "<br>";
// because it is evaluated like this line:
echo (("x minus one equals " . $x) - 1) . ", or so I hope\n";echo "<br>";
// the desired precedence can be enforced by using parentheses:
echo "x minus one equals " . ($x-1) . ", or so I hope\n";echo "<br>";

//////////////////////Arithmetic Operators//////////
echo (5 % 3);echo "<br>";           // prints 2
echo (5 % -3);echo "<br>";          // prints 2
echo (-5 % 3);echo "<br>";          // prints -2
echo (-5 % -3);echo "<br>";         // prints -2


if (($a % 2) == 1)
  { echo "$a is odd." ;echo "<br>";}
  if (($a % 2) == 0)
  { echo "$a is even." ;echo "<br>";}


  for ($i = 1; $i <= 10; $i++) {
      if(($i % 2) == 1)  //odd
        {echo "<div class=\"dark\">$i</div>";echo "<br>";}
      else   //even
        {echo "<div class=\"light\">$i</div>";echo "<br>";}
     }

////////////////////////Bitwise Operators////////////
/*
 * Ignore the top section,
 * it is just formatting to make output clearer.
 */

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
        . ' %3$s (%4$2d = %4$04b)' . "\n";

echo <<<EOH
 ---------     ---------  -- ---------
 result        value      op test
 ---------     ---------  -- ---------
EOH;
echo "<br>";

/*
 * Here are the examples.
 */

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "\n Bitwise AND \n";echo "<br>";
foreach ($values as $value) {
    $result = $value & $test;
    printf($format, $result, $value, '&', $test);
}
echo "<br>";
echo "\n Bitwise Inclusive OR \n";echo "<br>";
foreach ($values as $value) {
    $result = $value | $test;
    printf($format, $result, $value, '|', $test);
}
echo "<br>";
echo "\n Bitwise Exclusive OR (XOR) \n";echo "<br>";
foreach ($values as $value) {
    $result = $value ^ $test;
    printf($format, $result, $value, '^', $test);
}
echo "<br>";



echo 12 ^ 9;echo "<br>"; // Outputs '5'

echo "12" ^ "9";echo "<br>"; // Outputs the Backspace character (ascii 8)
                 // ('1' (ascii 49)) ^ ('9' (ascii 57)) = #8

echo "hallo" ^ "hello";echo "<br>"; // Outputs the ascii values #0 #4 #0 #0 #0
                        // 'a' ^ 'e' = #4

echo 2 ^ "3";echo "<br>"; // Outputs 1
              // 2 ^ ((int)"3") == 1

echo "2" ^ 3;echo "<br>"; // Outputs 1
              // ((int)"2") ^ 3 == 1




/*
 * Here are the examples.
 */

echo "\n--- BIT SHIFT RIGHT ON POSITIVE INTEGERS ---\n";echo "<br>";

$val = 4;
$places = 1;
$res = $val >> $places;
p($res, $val, '>>', $places, 'copy of sign bit shifted into left side');echo "<br>";

$val = 4;
$places = 2;
$res = $val >> $places;
p($res, $val, '>>', $places);echo "<br>";

$val = 4;
$places = 3;
$res = $val >> $places;
p($res, $val, '>>', $places, 'bits shift out right side');echo "<br>";

$val = 4;
$places = 4;
$res = $val >> $places;
p($res, $val, '>>', $places, 'same result as above; can not shift beyond 0');echo "<br>";


echo "\n--- BIT SHIFT RIGHT ON NEGATIVE INTEGERS ---\n";echo "<br>";

$val = -4;
$places = 1;
$res = $val >> $places;
p($res, $val, '>>', $places, 'copy of sign bit shifted into left side');echo "<br>";

$val = -4;
$places = 2;
$res = $val >> $places;
p($res, $val, '>>', $places, 'bits shift out right side');echo "<br>";

$val = -4;
$places = 3;
$res = $val >> $places;
p($res, $val, '>>', $places, 'same result as above; can not shift beyond -1');echo "<br>";


echo "\n--- BIT SHIFT LEFT ON POSITIVE INTEGERS ---\n";echo "<br>";

$val = 4;
$places = 1;
$res = $val << $places;
p($res, $val, '<<', $places, 'zeros fill in right side');echo "<br>";

$val = 4;
$places = (PHP_INT_SIZE * 8) - 4;
$res = $val << $places;
p($res, $val, '<<', $places);echo "<br>";

$val = 4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
p($res, $val, '<<', $places, 'sign bits get shifted out');echo "<br>";

$val = 4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
p($res, $val, '<<', $places, 'bits shift out left side');echo "<br>";


echo "\n--- BIT SHIFT LEFT ON NEGATIVE INTEGERS ---\n";echo "<br>";

$val = -4;
$places = 1;
$res = $val << $places;
p($res, $val, '<<', $places, 'zeros fill in right side');echo "<br>";

$val = -4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
p($res, $val, '<<', $places);echo "<br>";

$val = -4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
p($res, $val, '<<', $places, 'bits shift out left side, including sign bit');echo "<br>";


/*
 * Ignore this bottom section,
 * it is just formatting to make output clearer.
 */

function p($res, $val, $op, $places, $note = '') {
    $format = '%0' . (PHP_INT_SIZE * 8) . "b\n";echo "<br>";

    printf("Expression: %d = %d %s %d\n", $res, $val, $op, $places);echo "<br>";

    echo " Decimal:\n";echo "<br>";
    printf("  val=%d\n", $val);echo "<br>";
    printf("  res=%d\n", $res);echo "<br>";

    echo " Binary:\n";echo "<br>";
    printf('  val=' . $format, $val);echo "<br>";
    printf('  res=' . $format, $res);echo "<br>";

    if ($note) {
        echo " NOTE: $note\n";echo "<br>";
    }

    echo "\n";echo "<br>";
}
