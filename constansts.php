<?php
///A constant is an identifier (name) for a simple value.
//برای نامگذاری کانستنت ها از $ استفاده نمیشود
//Constant در لغت به معنای «ثابت» است و همچون متغیر، فضایی در حافظه است که مسئول ذخیره‌سازی چیزی است با
//این تفاوت که -همان‌طور که از نامش مشخص است- برخلاف متغیرها که مقادیر آنها قابل‌تغییر است، مقدار اولیهٔ
//کانستنت‌ها را نمی‌توان تغییر داد و به همین دلیل گفته می‌شود که کانستنت‌ها اصطلاحاً Immutable (تغییرناپذیر) هستند.

// Valid constant names
//horuf bozorg va underline
define("FOO",     "something");
echo FOO;echo "<br>";
define("FOO2",    "something else");
echo FOO2;echo "<br>";
define("FOO_BAR", "something more");
echo FOO_BAR;echo "<br>";

// Invalid constant names
define("2FOO",    "something");
// echo 2FOO;echo "<br>";

// This is valid, but should be avoided:
// PHP may one day provide a magical constant that will break your script
define("__FOO__", "something");
echo __FOO__;echo "<br>";
//Like superglobals, the scope of a constant is global. You can access constants anywhere in your script without regard to scope.

define('ANIMALS', array('dog','cat','bird'));
print_r(ANIMALS);echo "<br>"; // or var_dump(ANIMALS)

define("CONSTANT", "Hello world.");
echo CONSTANT;echo "<br>"; // outputs "Hello world."
// echo Constant;echo "<br>"; // outputs "Constant" and issues a notice.

// Works as of PHP 5.3.0
const CONSTANT = 'Hello World';

echo CONSTANT;echo "<br>";

// Works as of PHP 5.6.0
const ANOTHER_CONST = CONSTANT.'; Goodbye World';
echo ANOTHER_CONST;echo "<br>";

const ANIMALS = array('dog', 'cat', 'bird');
echo ANIMALS[1];echo "<br>"; // outputs "cat"

// Works as of PHP 7
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1];echo "<br>"; // outputs "cat"
