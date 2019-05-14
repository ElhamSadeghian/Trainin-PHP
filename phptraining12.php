<?php
////////////////Exception::getMessage/////////////////////////
try {
    throw new Exception("Some error message");
} catch(Exception $e) {
    echo $e->getMessage();echo "<br>";
}

/////////////////////Exception::getPrevious/////////////////////////
class MyCustomException extends Exception {}

function doStuff() {
    try {
        throw new InvalidArgumentException("You are doing it wrong!", 112);echo "<br>";
    } catch(Exception $e) {
        throw new MyCustomException("Something happened", 911, $e);echo "<br>";
    }
}


try {
    doStuff();
} catch(Exception $e) {
    do {
        printf("%s:%d %s (%d) [%s]\n", $e->getFile(), $e->getLine(), $e->getMessage(), $e->getCode(), get_class($e));echo "<br>";
    } while($e = $e->getPrevious());
}

/////////////////////Exception::getCode/////////////////////////
try {
    throw new Exception("Some error message", 30);
} catch(Exception $e) {
    echo "The exception code is: " . $e->getCode();echo "<br>";
}

/////////////////////Exception::getFile/////////////////////////
try {
    throw new Exception;
} catch(Exception $e) {
    echo $e->getFile();echo "<br>"; //اسم همین فایل رو برمیگردونه
}


/////////////////////Exception::getLine/////////////////////////
try {
    throw new Exception("Some error message");
} catch(Exception $e) {
    echo "The exception was created on line: " . $e->getLine();echo "<br>";
}

//////////////////Exception::getTrace///////////////////////////
function test() {
 throw new Exception;
}

try {
 test();
} catch(Exception $e) {
 var_dump($e->getTrace());echo "<br>";
}

//////////////////Exception::getTraceAsString///////////////////////////
function test1() {
    throw new Exception;
}

try {
    test1();
} catch(Exception $e) {
    echo $e->getTraceAsString();echo "<br>";
}

//////////////////Exception::toString///////////////////////////
try {
    throw new Exception("Some error message");
} catch(Exception $e) {
    echo $e;echo "<br>";
}
