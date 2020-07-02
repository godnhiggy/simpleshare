<?php
include('server.php');
ob_start();
  session_start();


/* if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: video_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: video_login.php");
  }
*/
//set variables
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $telcarrier = $_POST["telcarrier"];
    $phone = $_POST["phone"];
    $item1 = $_POST["item1"];
    $item2 = $_POST["item2"];
    $myDB = $_SESSION["username"];
    //echo $myDB;
$db = mysqli_connect('localhost', 'bjekqemy_higgy', 'Brett73085', $myDB);
if (isset($_POST["firstName"])) {
//connect to db
$phone =  preg_replace("/[^0-9]/","", $phone);
//connect_db($myDB);


//insert customer info into db

  	$query = "INSERT INTO customers (firstName, lastName, email, telcarrier, phone, item1, item2)
  			  VALUES('$firstName', '$lastName', '$email', '$telcarrier', '$phone', '$item1', '$item2')";
  	mysqli_query($db, $query);

  	header('location: cust_input.php');
}
?>
<html>
<head>
  <title>Hitting the Highlights</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Hitting the Highlights - Customer Input</h2>
    <?php echo $myDB ?>
  </div>

  <form method="post" action="">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>First Name</label>
  		<input type="text" name="firstName" >
  	</div>
  	<div class="input-group">
  		<label>Last Name</label>
  		<input type="text" name="lastName">
  	</div>
  		<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email">
  	</div>
  		<div class="input-group">
  		<label>Phone Carrier</label>
  		<select name="telcarrier">
    <option value="@txt.att.net">AT&T</option>
    <option value="@vtext.com">Verizon</option>
    <option value="@messaging.sprintpcs.com">Sprint</option>
    <option value="tmomail.net">T-Mobile</option>
    <option value="@metropcs.sms.us">Metro</option>
    <option value="@mms.cricketwireless.net">Cricket</option>
  </select>
  	</div>
  		<div class="input-group">
  		<label>Phone Number</label>
  		<input type="tel" name="phone">
  	</div>
  		<div class="input-group">
  		<label>Item One</label>
  		<input type="text" name="item1">
  	</div>
  		<div class="input-group">
  		<label>Item Two</label>
  		<input type="text" name="item2">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Submit Customer Info</button>
  	</div>
  	 </form>
     <form action="customer_email.php" method="POST">
  	<div>

      <h3>Customer Email List</h3>

      <?php

      echo "<select id='customers' name='customers[]' multiple>";
      $sql = "SELECT *
      FROM customers ORDER BY lastName";
      //$result = $conn->query($sql);

      $result=mysqli_query($db, $sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {
  $firstName = $row["firstName"];
  $lastName = $row["lastName"];
  //$phone= $row["phone"];
  $email = $row["email"];


                echo "<option value='$email'>".$firstName." ".$lastName."--".$email."</option>";
                //echo "<option value='$phone'>".$firstName." ".$lastName."--".$phone."</option>";

   }
  }

    ?>
      </select>
    </div>
    <div>
      <h3>Customer Text List</h3>
      <?php
      echo "<select id='customers' name='customers[]' multiple>";
      $sql = "SELECT *
      FROM customers ORDER BY lastName";
      //$result = $conn->query($sql);

      $result=mysqli_query($db, $sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {
      $firstName = $row["firstName"];
      $lastName = $row["lastName"];
      $phone = $row["phone"];
      $telcarrier = $row["telcarrier"];
      $text = $phone.$telcarrier;


                echo "<option value='$text'>".$firstName." ".$lastName."--".$text."</option>";
                //echo "<option value='$phone'>".$firstName." ".$lastName."--".$phone."</option>";

      }
      }
      ?>
      </select>
    </div>

  <div>

  <input type='submit' name='submit' value='select'/>


</div>
</form>


</body>
</html>
