<?php
$a = 'hello';
$ $a = 'world';
echo "$a ${$a}";echo "<br>";
echo "$a $hello";echo "<br>";

class foo {
    var $bar = 'I am bar.';
    var $arr = array('I am A.', 'I am B.', 'I am C.');
    var $r   = 'I am r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->$bar . "\n";echo "<br>";
echo $foo->{$baz[1]} . "\n";echo "<br>";

$start = 'b';
$end   = 'ar';
echo $foo->{$start . $end} . "\n";echo "<br>";

$arr = 'arr';
echo $foo->{$arr[1]} . "\n";echo "<br>";


//You can even add more Dollar Signs

 $Bar = "a";
 $Foo = "Bar";
 $World = "Foo";
 $Hello = "World";
 $a = "Hello";

 $a; //Returns Hello
 echo "$a";echo "<br>";
 $$a; //Returns World
 echo "${$a}";echo "<br>";
 $$$a; //Returns Foo
 echo "${${$a}}";echo "<br>";
 $$$$a; //Returns Bar
 echo "${${${$a}}}";echo "<br>";
 $$$$$a; //Returns a
 echo "${${${${$a}}}}";echo "<br>";

 $$$$$$a; //Returns Hello
 echo "${${${${${$a}}}}}";echo "<br>";
 $$$$$$$a; //Returns World
  echo "${${${${${${$a}}}}}}";echo "<br>";

 //... and so on ...//
?>

 <form action="" method="post">
    Name:  <input type="text" name="personal[name]" /><br />
    Email: <input type="text" name="personal[email]" /><br />
    Beer: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
    <input type="submit" value="submit me!" />
</form>

<?php

echo $_POST['username'];echo "<br>";
echo $_REQUEST['username'];echo "<br>";

if ($_POST) {
    echo '<pre>';
    echo htmlspecialchars(print_r($_POST, true));
    echo '</pre>';
}

setcookie("MyCookie[foo]", 'Testing 1', time()+3600);
setcookie("MyCookie[bar]", 'Testing 2', time()+3600);


 if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count'] + 1;
} else {
    $count = 1;
}
setcookie('count', $count, time()+3600);
setcookie("Cart[$count]", $item, time()+3600);
 ?>
