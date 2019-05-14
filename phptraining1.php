<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Training</title>
  </head>
  <body>
    <?php
      echo "<pre>";
      echo "I'm trying to learn php";
      echo "<p>hello</p>";
      echo $_SERVER['HTTP_USER_AGENT'];echo'<br/>';
      //phpinfo(); //useful information about your system and setup such as available predefined variables,....
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { //check for Internet Explorer
   ?>
      <p> You are using Internet Explorer.<br /> </p> ;
   <?php
      }else {
   ?>
    <p>You are not using Internet Explorer</p>
    <?php
    }
     ?>
    <p>Hello World!</p>
  </body>
</html>
