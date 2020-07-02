<?php
session_start();
$username = $_SESSION['username'];
echo "username = ".$username;

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="db.php" method="post">
      <button type="submit" name="button">Click to log into DataBase</button>
    </form>
  </body>
</html>
