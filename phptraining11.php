<?php
// function inverse($x) {
//     if (!$x) {
//         throw new Exception('Division by zero.');
//     }
//     return 1/$x;
// }
//
// try {
//     echo inverse(5);echo "<br>";
//     echo inverse(0);echo "<br>";
// } catch (Exception $e) {
//     echo 'Caught exception: ',  $e->getMessage();echo "<br>";
// }
//
// // Continue execution
// echo "Hello World";echo "<br>";


function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5);echo "<br>";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage();echo "<br>";
} finally {
    echo "First finally.";echo "<br>";
}

try {
    echo inverse(0);echo "<br>";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage();echo "<br>";
} finally {
    echo "Second finally.";echo "<br>";
}

// Continue execution
echo "Hello World";echo "<br>";


class MyException extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());echo "<br>";
        }
    }
}

$foo = new Test;
$foo->testing();



// class MyException1 extends Exception { }
//
// class MyOtherException extends Exception { }
//
// class Test1 {
//     public function testing() {
//         try {
//             throw new MyException1();
//         } catch (MyException1 | MyOtherException $e) {
//             var_dump(get_class($e));
//         }
//     }
// }
//
// $foo = new Test1;
// $foo->testing();
//
//
// //create function with an exception
// function checkNum($number) {
//   if($number-->1) {
//     throw new Exception("Value must be 1 or below");
//   }
//   return true;
// }
//
// //trigger exception
// checkNum(2);

/*برای جلوگیری از صدور پیام خطایی مثل کد فوق، بایستی یک ساختار لازم جهت مدیریت یک exception را ایجاد کنیم.
یک ساختار درست جهت مدیریت خطا یا exception بایستی شامل موارد زیر باشد :

 بخش Try : تابعی که از یک exception استفاده می کند، بایستی در بلوک کد “try” تعریف شود. اگر exception فعال نشود، فرآیند اجرای کد حالت نرمال خود را طی خواهد کرد. اما اگر یک exception فعال شود، در اصطلاح می گوییم که آن Exception صادر یا “trown” شده است.
 بخش Throw : بخش Throw مشخص کننده نحوه فعال سازی یک exception است. هر “throw” بایستی حداقل دارای یک بخش “catch” نیز باشد.
 بخش Catch : بلاک “Catch” استثناء یا exception رخ داده را دریافت نموده و یکی شی (object) حاوی اطلاعات مربوط به exception را ایجاد می کند.*/




//create function with an exception
function checkNum1($number) {
  if($number-->1) {
    throw new Exception("Value must be 1 or below");
  }
  return true;
}

//trigger exception in a "try" block
try {
  checkNum1(2);
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the number is 1 or below';echo "<br>";
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();echo "<br>";
}



class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

$email = "someone@example...com";

try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid
    throw new customException($email);
  }
}

catch (customException $e) {
  //display custom message
  echo $e->errorMessage();
}



try
{
    print "Executing try block BEFORE exception thrown." . PHP_EOL;echo "<br>";
    throw new Exception("This is my exception");
    print "Executing try block AFTER exception thrown." . PHP_EOL;echo "<br>";
}
catch (Exception $e)
{
    print "Executing the catch block." . PHP_EOL;echo "<br>";
}
finally
{
    print "Executing 'finally' block." . PHP_EOL;echo "<br>";
}

print "Executing code after finally." . PHP_EOL;echo "<br>";
