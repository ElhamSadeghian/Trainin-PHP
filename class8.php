<?php

////////////////////////Late Static Bindings/////////////////////////////

////self:: usage

class A {
    public static function who() {
        echo __CLASS__;echo "<br>";
    }
    public static function test() {
        self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;echo "<br>";
    }
}

B::test();


////static:: simple usage

class C {
    public static function who() {
        echo __CLASS__;echo "<br>";
    }
    public static function test() {
        static::who(); // Here comes Late Static Bindings
    }
}

class D extends C {
    public static function who() {
        echo __CLASS__;echo "<br>";
    }
}

D::test();

////static:: usage in a non-static context

class E {
    private function foo() {
        echo "success!<br>";
    }
    public function test() {
        $this->foo();echo "<br>";
        static::foo();
    }
}

class F extends E {
   /* foo() will be copied to F, hence its scope will still be E and
    * the call be successful */
}

class G extends E {
    private function foo() {
        /* original method is replaced; the scope of the new one is G */
    }
}

$b = new F();
$b->test();echo "<br>";
$c = new G();
$c->test();   //fails