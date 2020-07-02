<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$_SESSION["confirmvideo"] = "no";
// connect to the database
$db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', 'bjekqemy_hth');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
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
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, phone, password)
  			  VALUES('$username', '$email', '$phone', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: exp_bus_front_page.php');
  }
}

// ...

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: video_input.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


function displayTwoFiles($picture){
$data = array();
//include('server1.php');
$dir = "uploads/";
//$pattern = '\.(html|php|php4)$';
$a=array();
$b=array();
$newstamp = 0;
$newname = "";
$dc = opendir($dir);

while ($fn = readdir($dc)) {
  if ($fn == "." or $fn == ".."){}else{
    $timedat = filemtime("$dir/$fn");
      if ($timedat) {
        $newstamp = $timedat;
        $newname = $fn;
        //echo $newstamp." -- ".$newname."<br>";
        array_push($a,$newstamp);
        array_push($b,$newname);
        $c=array_combine($a,$b);
      }
    }
  }

krsort($c);

$calpha = (array_slice($c,0,2));
$file1 = $calpha[0];
$file2 = $calpha[1];
//echo "file 1 is ".$file1."<br>";
//echo "file 2 is ".$file2."<br>";
//echo "file 1 - ".$file1."<br>";
//echo "file 2 - ".$file2."<br>";
//echo "<br>";


// Open a directory, and read its contents
//$a=array();
$dir = 'uploads/';

if (is_dir($dir)){
$hh = scandir($dir,1);

  if ($dh = opendir($dir)){
    if ($file = readdir($dh)){
    //while (($file = readdir($dh)) !== false){
          //if ($file == $file1 or $file == $file2) {


            //  $fileComplete = "uploads/".$file;
          //  $filetime = filemtime("$fileComplete");


            //echo "<br>";
            //echo "Content last changed: ".date("F d Y H:i:s.", filemtime("$fileComplete"));
            //array_push($data, array($filetime => $fileComplete));
            //echo "<br>This is the new array";
            //print_r($data);
            //echo "<br>";
            ?>

      <input type="radio" name="<?php echo $picture;?>" value="uploads/<?php echo $file1; ?>"uploads/><img src="uploads/<?php echo $file1; ?>" width="50" height="60" class="thumbnail" >

      <br><input type="radio" name="<?php echo $picture;?>" value="uploads/<?php echo $file2; ?>"uploads/><img src="uploads/<?php echo $file2; ?>" width="50" height="60" class="thumbnail" >

      <br>
      <?php
      //}
    }
    closedir($dh);
  }
}

}
?>
