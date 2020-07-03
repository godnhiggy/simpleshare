<?php
session_start();
ob_start();
$short = $_GET["short"];
if(!isset($short)){

    $short=$_SESSION["realid"];
}
$myDB = "aleph";
//connect to DB
//login into DB


$customerEmailed = $_POST["customers"];
$msg = "www.coachhiggy.com/$myDB/resend.php?short=$short";
//echo $msg;
//echo "this is the customer ".$customer;
//print_r($customer);


//$servername = "localhost";
//$username = "bjekqemy_higgy";
//$password = "Brett73085";
//$dbname = "bjekqemy_sleekfinish";

 //Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
 //Check connection
// ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} else{
//    echo "";
//    }

//select all emails signed up for vids and sends short url
//$sql = "SELECT phone FROM customers ";
//$result = $conn->query($sql);
//if ($result->num_rows > 0) {

    // output data of each row

$arrlength = count($customerEmailed);

for($x = 0; $x < $arrlength; $x++) {
    //echo $customer[$x];
    //echo "<br>";


        $useremail = $customerEmailed[$x];

//echo $useremail."<br>";
//$from = $_POST['from'];
$to = $useremail;
$message = $msg;
$from = 'admin@coachhiggy.com';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();



if ((empty($to)) || (empty($message))) {
echo "to ".$to;
echo "<br>";
echo "message ".$message;
echo "<br>";
}

mail("$to", "Hitting the Highlights", "$message", "$headers");
//$formatted_number = $to."@vtext.com";
//mail("$formatted_number", "Hitting the Highlights!", "$message", "$headers");
// Currently, the subject is set to "SMS". Feel free to change this.

//$formatted_number = $to."@tomomail.net";
//mail("$formatted_number", "Hitting the Highlights!", "$message", "$headers");

//$formatted_number = $to."@messaging.sprintpcs.com";
//mail("$formatted_number", "Hitting the Highlights!", "$message", "$headers");

//$formatted_number = $to."@txt.att.net";
//mail("$formatted_number", "Hitting the Highlights!", "$message", "$headers");


//$formatted_number = $to."@vmobl.com";
//mail("$formatted_number", "Hitting the Highlights!", "$message", "$headers");
     //}

//end send email to all carriers


//$to = '6787946711@txt.att.net';
//$subject = 'Marriage Proposal';
//$from = 'godnhiggy@gmail.com';

// To send HTML mail, the Content-type header must be set
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
//$headers .= 'From: '.$from."\r\n".
 //   'Reply-To: '.$from."\r\n" .
 //   'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
//$message = '<html><body>';
//$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
//$message .= '<p style="color:#080;font-size:18px;">Will you marry me?</p>';
//$message .='<p> <a href="https://www.w3schools.com/html/">Visit our HTML tutorial</a> </p>';
//$message .= '</body></html>';

// Sending email
//if(mail($to, $subject, $message, $headers)){
  //  echo 'Your mail has been sent successfully.';
  //  echo "<br>";
   // echo $message;
//} else{
    //echo 'Unable to send email. Please try again.';
//}
}



?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>


<?php

ob_flush();

?>
<script>
window.location.href = "video_input.php";
</script>
</body>
</html>
