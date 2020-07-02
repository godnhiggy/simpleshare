<?php
session_start();
include('db_build.php');
//$_POST['reg_user'] = "trial_post1";
//$_SESSION["username"] = $_POST["username"];
// initializing variables
$username = "";
$email    = "";
$_SESSION["confirmvideo"] = "no";
$errors = array();

// connect to the database


$db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_hth')or die("cannot connect");
// Check connection

if ($db->connect_error) {
  echo "db not working";
   //die("Connection failed: " . $db->connect_error);
}
//else {echo "connection made to test for registered user<br>";}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
   if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE userName='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['userName'] === $username) {
      array_push($errors, "Username already exists");
      echo "Username already exists";
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (userName, email, phone, password)
  			  VALUES('$username', '$email', '3455433454', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    build_tables($username);

    //echo "<br>Apparently registered and db built";
  	header('location: video_input.php');
  }


}

// ...

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
//echo "<br> this is inside the login script";
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE userName='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
    header('location: video_input.php');

  	}else {
  		echo "Wrong username/password combination";
  	}
  }
}
//db_login("bjekqemy_bus");

?>
