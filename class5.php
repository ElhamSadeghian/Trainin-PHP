<?php
///////////////////Object Interfaces/////////////////////

//Object interfaces allow you to create code which specifies which methods a class must implement,
//without having to define how these methods are implemented.

// Declare the interface 'iTemplate'
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implement the interface
// This will work
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

// This will not work
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (iTemplate::getHtml)

/*
class BadTemplate implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}
*/

//Extendable Interfaces

interface a
{
    public function foo();
}

interface b extends a
{
    public function baz(Baz $baz);
}

// This will work
class c implements b
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}

// This will not work and result in a fatal error
/*
class d implements b
{
    public function foo()
    {
    }

    public function baz(Foo $foo)
    {
    }
}
*/

/////Interfaces with constants

interface d
{
    const e = 'Interface constant';
}

// Prints: Interface constant
echo d::e;echo "<br>";


// This will however not work because it's not allowed to 
// override constants.
/*
class e implements d
{
    const e = 'Class constant';
}
*/

///////////////////////////Traits /////////////////////////////

///Precedence

class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();echo "<br>";

///Alternate Precedence Order Example

trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!';
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello();echo "<br>";

///Multiple Traits Usage

trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld1 {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld1();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();echo "<br>";


///Conflict Resolution

trait F {
    public function smallTalk() {
        echo 'f';
    }
    public function bigTalk() {
        echo 'F';
    }
}

trait G {
    public function smallTalk() {
        echo 'g';
    }
    public function bigTalk() {
        echo 'G';
    }
}

class Talker {
    use F, G {
        G::smallTalk insteadof F;
        F::bigTalk insteadof G;
    }
}

class Aliased_Talker {
    use F, G {
        G::smallTalk insteadof F;
        F::bigTalk insteadof G;
        G::bigTalk as talk;
    }
}

///////////////////////////Anonymous classes /////////////////////

class SomeClass {}
    interface SomeInterface {}
    trait SomeTrait {}
    
    var_dump(new class(10) extends SomeClass implements SomeInterface {
        private $num;
    
        public function __construct($num)
        {
            $this->num = $num;echo "<br>";
        }
    
        use SomeTrait;
    });echo "<br>";



    class Outer
{
    private $prop = 1;
    protected $prop2 = 2;

    protected function func1()
    {
        return 3;
    }

    public function func2()
    {
        return new class($this->prop) extends Outer {
            private $prop3;

            public function __construct($prop)
            {
                $this->prop3 = $prop;
            }

            public function func3()
            {
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }
}

echo (new Outer)->func2()->func3();echo "<br>";




function anonymous_class()
{
    return new class {};
}

if (get_class(anonymous_class()) === get_class(anonymous_class())) {
    echo 'same class';echo "<br>";
} else {
    echo 'different class';echo "<br>";
}



echo get_class(new class {});