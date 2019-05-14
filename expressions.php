<?php

//In PHP, almost anything you write is an expression.

function foo ()
{
    return 5;
}

echo foo();echo "<br>"; ///Functions are expressions with the value of their return value.

//  increment and decrement operators,  comparison, functions,
//PHP supports four scalar value types: integer values, floating point values (float), string values and boolean values
//(scalar values are values that you can't 'break' into smaller pieces, unlike arrays, for instance)

$first ? $second : $third; /////???????


function double($i)
{
    return $i*2;
}

echo double($i);echo "<br>";
$b = $a = 5;        /* assign the value five into the variable $a and $b */
echo $b;echo "<br>";
$c = $a++;          /* post-increment, assign original value of $a
                       (5) to $c */
echo $c;echo "<br>";
$e = $d = ++$b;     /* pre-increment, assign the incremented value of
                       $b (6) to $d and $e */
echo $e;echo "<br>";

/* at this point, both $d and $e are equal to 6 */

$f = double($d++);  /* assign twice the value of $d before
                       the increment, 2*6 = 12 to $f */
echo $f;echo "<br>";
$g = double(++$e);  /* assign twice the value of $e after
                       the increment, 2*7 = 14 to $g */
echo $g;echo "<br>";
$h = $g += 10;      /* first, $g is incremented by 10 and ends with the
                       value of 24. the value of the assignment (24) is
                       then assigned into $h, and $h ends with the value
                       of 24 as well. */
echo $h;echo "<br>";                       
