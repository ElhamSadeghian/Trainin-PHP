<?php

function test() {
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS["foo"];echo "<br>";///متغیر خارج از تابع رو نمایش میده
    echo '$foo in current scope: ' . $foo;echo "<br>";
}

$foo = "Example content";
test();


echo $_SERVER['SERVER_NAME'];echo "<br>";

echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';echo "<br>";

?>

<form action="" method="get">
   Name:  <input type="text" name="name" /><br />
   <input type="submit" value="submit me!" />
</form>

<?php echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';echo "<br>";

echo 'My username is ' .$_ENV["name"] . '!';echo "<br>"; //??????
?>

<form action="" method="post">
   Name:  <input type="text" name="name" /><br />
   <input type="submit" value="submit me!" />
</form>

<?php
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$value=[];
$_SESSION["newsession"]=$value;
echo $_SESSION['newsession'];echo "<br>";


function get_contents() {
  file_get_contents("http://google.com");
  var_dump($http_response_header);echo "<br>";
}
get_contents();
var_dump($http_response_header);echo "<br>";

//var_dump($argc);echo "<br>";

//var_dump($argv);echo "<br>";
