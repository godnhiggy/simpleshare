<?php

function build_tables($myUserName){
$servername = "localhost";
$username = "bjekqemy_higgy";
$password = "Brett73085";
$myDB = "bjekqemy_hth";


// Check connection to build tables for app
$conn = new mysqli($servername, $username, $password, $myDB);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$customer = $myUserName."_customer";
// sql to create CUSTOMERS table
$sql1 = "CREATE TABLE $customer (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstName VARCHAR(30) NOT NULL,
lastName VARCHAR(30) NOT NULL,
email VARCHAR(50),
telcarrier varchar(50),
phone varchar(11),
item1 varchar(50),
item2 varchar(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql1) === TRUE) {
  echo "Table customers created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}
$picture = $myUserName."_picture";
// sql to create PICTURES table
$sql2 = "CREATE TABLE $picture (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
picture VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql2) === TRUE) {
  //echo "Table pictures created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// sql to create URL table
$url = $myUserName."_url";
$sql3 = "CREATE TABLE $url (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
longURL text(3000),
shortURL VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql3) === TRUE) {
  //echo "Table url created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

}

function connect_db(){
$servername = "localhost";
$username = "bjekqemy_higgy";
$password = "Brett73085";
$myDB = "bjekqemy_hth";

// Create connection
$conn = new mysqli($servername, $username, $password, $myDB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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
