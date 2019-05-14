<?php
echo <<<"FOOBAR"
Hello World!
FOOBAR;
echo "</br>";
/////////////Nowdoc//////////////////

echo <<<'EOD'
یک مثال برای نوداک
Example of string spanning multiple lines
using nowdoc syntax. Backslashes are always treated literally,
e.g. \\ and \'.
EOD;
echo "</br>";

class foo
{
    public $foo;
    public $bar;

    function __construct()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'MyName';

echo <<<'EOT'
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
EOT;
echo "</br>";
////چرا مقدار متغیر اکو نمیشه؟
//// چطوری کامنت میشه؟

$sport = "ball";

echo "I have one $sport . ".PHP_EOL;echo "</br>";
// Invalid. "s" is a valid character for a variable name, but the variable is $juice.
echo "I have two $sports.";echo "</br>";
// Valid. Explicitly specify the end of the variable name by enclosing it in braces:
echo "I have two ${sport}s.";echo "</br>";

////////////////array/////////////////////////////////////////////////////////////////////


$juices = array("apple", "orange", "koolaid1" => "purple");

echo "He drank some $juices[0] juice.".PHP_EOL;echo "</br>";
echo "He drank some $juices[1] juice.".PHP_EOL;echo "</br>";
echo "He drank some $juices[koolaid1] juice.".PHP_EOL;echo "</br>";

class people {
    public $john = "John Smith";
    public $jane = "Jane Smith";
    public $robert = "Robert Paulsen";

    public $smith = "Smith";
}

$people = new people();

echo "$people->john drank some $juices[0] juice.".PHP_EOL;echo "</br>";
echo "$people->john then said hello to $people->jane.".PHP_EOL;echo "</br>";
echo "$people->john's wife greeted $people->robert.".PHP_EOL;echo "</br>";
echo "$people->robert greeted the two $people->smiths.";echo "</br>"; // Won't work

class faz {
    var $bar = 'I am bar.';
}

$foo = new faz();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo "{$foo->$bar}\n";echo "</br>";
echo "{$foo->{$baz[1]}}\n";echo "</br>";


// Get the first character of a string
$str = 'This is a test.';
$first = $str[0];
echo $first;echo "</br>";

// Get the third character of a string
$third = $str[2];
echo $third;echo "</br>";

// Get the last character of a string.
$str = 'This is still a test.';
$last = $str[strlen($str)-1];
echo $last;echo "</br>";

// Modify the last character of a string
$str = 'Look at the sea';
echo $str[strlen($str)-1] = 'e';echo "</br>";

 ?>
