<?php
include('server.php');
//include('db_build.php');
  session_start();

$_SESSION["videotracker"] = "no";
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: dashboard.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  $myDB = "bjekqemy_aleph";
  $username = $_SESSION["username"];
  $pictureTable = $_SESSION["picture"];
?>
<html>
<head>
	<title>SimpleShare</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
.thumbnail {
    width: 100;
    height:100;
    border-radius: 10px;
    border: 2px solid black;
}
.button {
  background-color: #5F9EA0;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 40px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 20px;
  border: 2px;
}

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap: 10px;
  background-color: #5F9EA0;
  padding: 10px;

}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 5px 0;
  font-size: 20px;
}

.item1 {
    grid-area: 1/1/1/4;
    background-image: url("uploads/trialPic.jpeg");
    }
.item2 {
    grid-area: 2/1/2/2;
}
.item3 {
    grid-area: 2/2/2/3;
}
.item4 {
    grid-area: 2/3/2/4;
}
.item5 {
    grid-area: 3/1/3/4;
}





body {/*background-color: powderblue;*/
      background-image: url("IMG_1314.JPG");
      text-align: center ;}
h1   {color: #5F9EA0; text-align: center;}
h2   {color: #5F9EA0; text-align: center;}
p    {color: #5F9EA0; text-align: left;}
div1 {text-align: center;
        color: red;
}
form {
  width: 75%;
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 10px;
  text-align: center;
input {
  border: 2px solid red;
  border-radius: 4px;

}

</style>

</head>

<body>


<h1>SimpleShare</h1>
<div class="grid-container">
<?php echo "<h1>Let's send some videos ".$username."!</h1>";  ?>
    <div class="item1"> <form name="frm" action="upload.php" method="post" enctype="multipart/form-data">

<input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="document.getElementById('submit').click()">
<input type="submit" name="submit" style="display:none" id="submit" value="Click here to upload image">
</form>
  </div>




<div class="item2">
    <h2>Input Video Text</h1>
<form action="video_output.php" method="GET">
<p>Block 1:</p> <p><input  type="text" name="block1" size="30" maxlength="30" ></p><br>

<p>Block 2:</p> <p><input  type="text" name="block2"size="30" maxlength="30" ></p><br>

<p>Finish Block:</p> <p><input type="text" name="block3" size="30" maxlength="30"></p><br>
</div>
<?php
//delete image input
if (array_key_exists('delete_file', $_POST)) {
  $filename = $_POST['delete_file'];
  if (file_exists($filename)) {
    unlink($filename);
    //echo 'File '.$filename.' has been deleted';
  } else {
    //echo 'Could not delete '.$filename.', file does not exist';
  }
}
?>
<div class="item3">
    <h2>Choose first picture</h2>

<?php
//displayTwoFiles(picture_url);
find_image($pictureTable, picture_url);
?>


</div>
<div class="item4">
    <h2>Choose second picture</h2>
<?php
//displayTwoFiles(picture_url2);
find_image($pictureTable, picture_url2);
?>
</div>
<div class="item5">
<h2><input type="submit" class="button" value="Click here to Create Video!"></h2>
</form>
<?php


?>
</div>




</div>
<!--</form>-->
</body>
</html>
