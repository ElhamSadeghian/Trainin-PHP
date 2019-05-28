<?php
///////////////////Overloading ///////////////////////////////

////Overloading properties via the __get(), __set(), __isset() and __unset() methods

class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value' ";echo "<br>";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name' ";echo "<br>";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        echo "Is '$name' set? ";echo "<br>";
        return isset($this->data[$name]);
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        echo "Unsetting '$name' ";echo "<br>";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}


echo "<pre>";echo "<br>";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a;echo "<br>";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "<br>";

echo $obj->declared ;echo "<br>";

echo "Let's experiment with the private property named 'hidden' ";echo "<br>";
echo "Privates are visible inside the class, so __get() not used...";echo "<br>";
echo $obj->getHidden();echo "<br>";
echo "Privates not visible outside of class, so __get() is used...";echo "<br>";
echo $obj->hidden;echo "<br>";


/////Overloading methods via the __call() and __callStatic() methods

class MethodTest
{
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling object method '$name' ". implode(', ', $arguments). "<br>" ;
    }

    /**  As of PHP 5.3.0  */
    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling static method '$name' " . implode(', ', $arguments). "<br>";
    }
}

$obj = new MethodTest;
$obj->runTest('in object context');

MethodTest::runTest('in static context');  // As of PHP 5.3.0


////////////////////////Object Iteration////////////////////////////

////Simple Object Iteration

class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
       echo "MyClass::iterateVisible:";echo "<br>";
       foreach ($this as $key => $value) {
           print "$key => $value";echo "<br>";
       }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value";echo "<br>";
}
echo "<br>";


$class->iterateVisible();


///Object Iteration implementing Iterator

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        echo "rewinding";echo "<br>";
        reset($this->var);
    }
  
    public function current()
    {
        $var = current($this->var);
        echo "current: $var";echo "<br>";
        return $var;
    }
  
    public function key() 
    {
        $var = key($this->var);
        echo "key: $var";echo "<br>";
        return $var;
    }
  
    public function next() 
    {
        $var = next($this->var);
        echo "next: $var";echo "<br>";
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        echo "valid: $var";echo "<br>";
        return $var;
    }

}

$values = array(1,2,3);
$it = new MyIterator($values);

foreach ($it as $a => $b) {
    print "$a: $b";echo "<br>";
}


///Object Iteration implementing IteratorAggregate

class MyCollection implements IteratorAggregate
{
    private $items = array();
    private $count = 0;

    // Required definition of interface IteratorAggregate
    public function getIterator() {
        return new MyIterator($this->items);
    }

    public function add($value) {
        $this->items[$this->count++] = $value;
    }
}

$coll = new MyCollection();
$coll->add('value 1');
$coll->add('value 2');
$coll->add('value 3');

foreach ($coll as $key => $val) {
    echo "key/value: [$key -> $val]";echo "<br>";
}



//////////////////////////////////////////////Magic Methods/////////////////////////////////////


///Sleep and wakeup

class Connection
{
    protected $link;
    private $dsn, $username, $password;
    
    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }
    
    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }
    
    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }
    
    public function __wakeup()
    {
        $this->connect();
    }
}

///Simple example

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
echo $class;echo "<br>";

///Using __invoke()

class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));echo "<br>";

/// Using __set_state()

class A
{
    public $var1;
    public $var2;

    public static function __set_state($an_array) // As of PHP 5.1.0
    {
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a->var1 = 5;
$a->var2 = 'foo';

eval('$b = ' . var_export($a, true) . ';'); // $b = A::__set_state(array(
                                            //    'var1' => 5,
                                            //    'var2' => 'foo',
                                            // ));
var_dump($b);echo "<br>";


///Using __debugInfo()

class C {
    private $prop;

    public function __construct($val) {
        $this->prop = $val;
    }

    public function __debugInfo() {
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }
}

var_dump(new C(42));echo "<br>";