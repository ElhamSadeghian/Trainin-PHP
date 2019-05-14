<?php

$test = 'hello';
echo $test;echo "</br>";
print($test);print('</br>');
settype($test ,'string');

// Declare a simple class
class TestClass
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString()
    {
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class;echo "</br>";

print_r($test);echo "</br>";
print_r($class);echo "</br>";

var_dump($test);echo "</br>";
var_dump($class);echo "</br>";

serialize($test);echo "</br>";
serialize($class);echo "</br>";

$foo = 1 + "10.5";                // $foo is float (11.5)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = 1 + "-1.3e3";              // $foo is float (-1299)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = 1 + "bob-1.3e3";           // $foo is integer (1)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = 1 + "bob3";                // $foo is integer (1)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = 1 + "10 Small Pigs";       // $foo is integer (11)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = "10.0 pigs " + 1;          // $foo is float (11)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$foo = "10.0 pigs " + 1.0;        // $foo is float (11)
echo "\$foo==$foo; type is " . gettype ($foo) . "<br />\n";echo "</br>";

$str = "\n";
if (ord($str) == 10) {
    echo "The first character of \$str is a line feed.\n";echo "</br>";
}

echo chr(-159), chr(324), PHP_EOL;echo "</br>";

$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme); // Find the position of the first occurrence of a substring in a string

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
    echo "The string '$findme' was not found in the string '$mystring'";echo "</br>";
} else {
    echo "The string '$findme' was found in the string '$mystring'";echo "</br>";
    echo " and exists at position $pos";echo "</br>";
}


$str = 'abcdef';
echo strlen($str);echo "</br>"; // 6  Get string length

$str = ' ab cd ';
echo strlen($str);echo "</br>"; // 7


$var1 = "Hello";
$var2 = "hello";
if (strcmp($var1, $var2) !== 0) { //Binary safe string comparison
    echo '$var1 is not equal to $var2 in a case sensitive string comparison';echo "</br>";
}

$str = "A 'quote' is <b>bold</b>";

// Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
echo htmlspecialchars($str);echo "</br>"; //Convert all applicable characters to HTML entities

// Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str, ENT_QUOTES);echo "</br>";

$orig = "I'll \"walk\" the <b>dog</b> now";

$a = htmlentities($orig);

$b = html_entity_decode($a); //Convert HTML entities to their corresponding characters

echo $a;echo "</br>"; // I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now

echo $b;echo "</br>"; // I'll "walk" the <b>dog</b> now


/* Set locale to Dutch */
setlocale(LC_ALL, 'nld_nld');

/* Output: vrijdag 22 december 1978 */
echo strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978));

/* try different possible locale names for german */
$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'deu_deu'); //Set locale information
echo "Preferred locale for german on this system is '$loc_de'";echo "</br>";


$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtoupper($str); //Make a string uppercase
echo $str;echo "</br>"; // Prints MARY HAD A LITTLE LAMB AND SHE LOVED IT SO

$foo = 'hello world!';
$foo = ucfirst($foo); //Make a string's first character uppercase            // Hello world!
echo $foo;echo "</br>";


$bar = 'HELLO WORLD!';
$bar = ucfirst($bar);             // HELLO WORLD!
$bar = ucfirst(strtolower($bar)); // Hello world!
echo $bar;echo "</br>";

?>
