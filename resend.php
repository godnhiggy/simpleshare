<?php
//include( 'counter.php' );
session_start();
ob_start();

$myDB = $_SESSION["username"];
$short = $_GET["short"];
$_SESSION["short"]=$short;
//connect to DB
//login into DB
$servername = "localhost";
$username = "bjekqemy_higgy";
$password = "Brett73085";
$dbname = $myDB;

 //Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 //Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "";
    }


     //insert into DB
//$sql = "INSERT INTO url (longURL) VALUES ('$uri')";
//$result = $conn->query($sql);

    //select new short url from DB
$sql = "SELECT longURL FROM url WHERE id = '$short'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

        $id = $row["longURL"];}}
//echo $id."this is working";




//$short = "http://www.coachhiggy.com";
header("Location: $id");

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>



<div class="container" id="main-content">

</div>

<?php
 //select all emails signed up for vids and sends short url
//$sql = "SELECT email FROM users ";
//$result = $conn->query($sql);
//if ($result->num_rows > 0) {

    // output data of each row
    //while($row = $result->fetch_assoc()) {
$userInfo = $_SERVER['REMOTE_ADDR']
       //$useremail = $row["email"];

mail("6787946711@txt.att.net"," Your Video just got viewed by ".$userInfo, "$short");
mail("$to", "Hitting the Highlights", "$message", "$headers");
    //}

//}
ob_flush();
?>

</body>
</html>
