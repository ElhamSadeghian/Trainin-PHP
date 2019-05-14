سلام
<?php
    echo htmlspecialchars($_POST['name']); //make sure any chars that are special in html are encoded so peeople can't inject  HTML tags or ....
 ?>
 . شما
 <?php
    echo (int)$_POST['age']; //$_POST contains all POST data.
  ?>
  سال سن دارید.
