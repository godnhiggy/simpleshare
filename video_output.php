<?php
session_start();
ob_start();
include('db_build.php');
$myDB = "bjekqemy_aleph";
//$url = $_SESSION["url"];
$url = "url";
?>
<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  position: absolute;
  display: grid;
  grid-template-columns:auto auto auto auto auto auto;
  /*grid-gap: 10px;*/
  background-color: blue;
/*  padding: 10px;*/

}

.grid-container > div {

  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
/*padding: 5px 0;*/
  font-size: 20px;
}

.item1 {
    grid-area: 1/1/1/7;
    }
.item2 {
    grid-area: 2/6/2/7;
}
.item3 {
    grid-area: 2/1/2/2;
}
/*.item4 {
    grid-area: 3/2/3/3;
}
.item5 {
    grid-area: 2/3/4/5;
}
.item5a {
    grid-area: 2/5/4/7;
}

.item12 {
    grid-area: 5/3/5/5;
}*/

<?php $picture_url = $_GET["picture_url"];?>
<?php $picture_url2 = $_GET["picture_url2"];?>
#DIV1b {
  position: absolute;
  text-shadow: 5px 5px 10px black;
  font-size: 200%;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  width: 850px;
  height: 500px;
  background-color: hsla(120, 100%, 50%, 0);
  /*background-image: url("flowers.jpg");*/
  background-size: 100% 100%;
  border-radius: 50px;
  border: 0px solid black;
  /* color: white;*/
  animation-name: angry-animation1b;
  animation-duration: 5s;
  animation-timing-function: ease;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: normal;
  }
#DIVgolf {
  border: 5px black;
  border-radius: 50px;
  background-image: url("http://www.coachhiggy.com/videoproduction/exp_daily/uploads/42040550-3FFB-4EE8-8312-C0BA7BC14DC4.jpeg");
  background-size: 100% 100%;
  animation-name: angry-animationAd;
  animation-duration: 14s;
  animation-timing-function: ease;
  animation-delay: 9s;
  animation-iteration-count: 1;
  animation-direction: normal;
}




#DIV1 {
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  width: 850px;
  height: 500px;
  /*background-color: coral;*/
  background-image: url("<?php echo  $picture_url; ?>");
  background-size: 100% 100%;
  border: 10px solid black;
  border-radius: 50px;
   color: white;
  animation-name: angry-animation;
  animation-duration: 5s;
  animation-timing-function: ease;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: normal;
  }

#DIV2 {
  position: absolute;
  text-shadow: 5px 5px 10px black;
  font-size: 400%;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  width: 850px;
  height: 500px;
  /*background-color: red;*/
  background-image: url("<?php echo  $picture_url2; ?>");
  /*background-image: url("https://prelovac.com/vladimir/wp-content/uploads/2009/07/wave_004.jpg");*/
  background-size: 100% 100%;
  border: 0px solid black;
  border-radius: 35px;
  color: white;
  animation-name: angry-animation1;
  animation-duration: 10s;
  animation-timing-function: ease;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: normal;
  }

#DIV3 {
  position: absolute;
  text-shadow: 5px 5px 10px black;
  font-size: 200%;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  width: 850px;
  height: 500px;
  /*background-color: red;*/
  background-image: url("<?php echo $picture_url2; ?>");
  /*background-image: url("https://media-cdn.tripadvisor.com/media/photo-s/01/c4/77/ef/the-arches-provincial.jpg");*/
  background-size: 100% 100%;
  border: 0px solid black;
  border-radius: 35px;
  color: white;
  animation-name: angry-animation2;
  animation-duration: 14s;
  animation-timing-function: ease;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: normal;
}

  @keyframes angry-animation {
  0%{
    opacity: 1;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
  100%{
    opacity: 1;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }
}

  @keyframes angry-animation1b {
  0%{
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

    65%{
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  100%{
    opacity: 1;
    /*-webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);*/
  }
  /*{-webkit-transform: rotate(130deg); /* Safari prior 9.0
  transform: rotate(130deg); /* Standard syntax
  }*/

 }

 @keyframes angry-animationAd {
  0%{
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

    65%{
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  100%{
    opacity: 1;
    /*-webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);*/
  }
  /*{-webkit-transform: rotate(130deg); /* Safari prior 9.0
  transform: rotate(130deg); /* Standard syntax
  }*/

 }


 @keyframes angry-animation1 {
  0%{
    opacity:0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
  50%{
    opacity: 0;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }
   75%{
    opacity: 1;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }




  100%{
    opacity: 1;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }


}

 @keyframes angry-animation2 {
  0%{
    opacity:0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
  66%{
    opacity: 0;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }

  80%{
    opacity: 1;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }

  100%{
    opacity: 1;
    -webkit-transform: scale3d(1,1,1);
    transform: scale3d(1,1,1);
  }
}
</style>
</head>
<body>


<?php


$block1 = $_GET["block1"];
$block2 = $_GET["block2"];
$block3 = $_GET["block3"];

//$picture_url = $_GET["picture_url"];

?>

<div id="DIV1" class="grid_container">



 <div id=DIV1b class="grid-container">
    <div id=DIV1b>
     <br>
     <!--added breaks to move text down-->
     <br><br><br>
     <center><?php echo $block1; ?></center><br>
    </div>

     <!--<div id=DIVgolf class="item2"><br><br>Your Ad/Logo goes here!</div>
     </div>-->

  <!--<audio id="audio" controls src="https://www.computerhope.com/jargon/m/example.mp3" /> ></audio>
  <p>For sound click the start button above....</p>-->
</div>

<div id="DIV2">
    <br><br>
    <!--added breaks to move text down-->
    <br><br>

    <center><?php echo $block2; ?></center>


</div>

<div id="DIV3" class="grid-container">
<div id="DIV3" class="">
    <br><br><br>
    <!--added breaks to move text down-->
    <br>
<center><?php echo $block3; ?></center>




<?php

// the url
$uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


        //connect to DB
//login into DB
//connect_db($myDB);

$servername = "localhost";
$username = "bjekqemy_higgy";
$password = "Brett73085";
$dbname = "$myDB";

 //Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 //Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "";
  }




$session = $_SESSION["videotracker"];
//echo $dbInfo."<br>".$myDB."<br>";
//echo $session;
if ($session == "no") {

  //echo "we are inside the loop";


        //insert into DB
        $sql = "INSERT INTO $url (longURL) VALUES ('$uri')";
        if (mysqli_query($conn, $sql)) {
          //echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


//$sql = "INSERT INTO url (longURL) VALUES ('$uri')";
//$result = $conn->query($sql);


    //select new short url from DB
$sql = "SELECT id FROM $url WHERE longURL = '$uri' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

        $realid = $row["id"];}}

      //the message - my short url
$msg = "www.coachhiggy.com/hth/resend.php?short=$realid";
$_SESSION['realid']=$realid;
$sql = "UPDATE $url SET shortURL='$msg' WHERE longURL='$uri'";
$result = $conn->query($sql);
// send email - text with short url
//mail("godnhiggy@gmail.com","New Player",$msg);
//mail("6787946711@txt.att.net","New Player",$msg);


$_SESSION["videotracker"] = "yes";
$session = $_SESSION["videotracker"];

?>

	<form action="cust_input.php" method="GET">

 <input name="short" value="Click to Finalize Video!" type="submit" size="200">
<input type="hidden" name="short" value="<?php echo $realid; ?>">
</form>

<?php

}
else{ echo "";

    //select new short url from DB
$sql = "SELECT id FROM $url WHERE longURL = '$uri' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

        $short = $row["id"];}}



 //$short = $_GET["short"];
//$short=$_SESSION["realid"];
// Add correct path to your countlog.txt file.
$countpath = 'count.txt';
$listpath = '/list.txt';
// Opens countlog.txt to read the number of hits.
$file  = fopen( $countpath, 'r' );
$count = fgets( $file, 1000 );
fclose( $file );

// Update the count.
$count = abs( intval( $count ) ) + 1;

// Output the updated count.
//echo "{$count} hits\n";

$number = "\r\nthis is a variable";
//echo $short;

//$count = "\r\n".$count." - ".$short;
//echo $count;

// Opens countlog.txt to change new hit number.
$file = fopen( $countpath, 'w' );
fwrite( $file, $count );
fclose( $file );

// Opens countlog.txt to change new hit number.
//$file = fopen( $listpath, 'w' );

//file_put_contents($file, "somthing new");


//fclose( $file );

//file_put_contents('list.txt', "\r\ntry this\r\n", FILE_APPEND);
//file_put_contents('list.txt', "\r\nsecond line\r\n", FILE_APPEND);
file_put_contents('list.txt', "This is video ".$short."\r\n", FILE_APPEND);


}

//echo $id;
//session_unset ();

unset($_SESSION["videotracker"]);
ob_flush();

?>

</div>


</div>

</div>
<!--<script src="https://code.responsivevoice.org/responsivevoice.js?key=CHTxTmxw"></script>-->
</body>
</html>
