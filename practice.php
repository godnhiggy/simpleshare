<?php
session_start();
//include('db_build.php');
$userPictureTable = "higgy_picture";

function find_image($pictureTable, $pictureName){
  //connect to
  $servername = "localhost";
  $username = "bjekqemy_higgy";
  $password = "Brett73085";
  $myDB = "bjekqemy_aleph";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $myDB);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ////select last two images in table user_picture
  $sql = "SELECT picture FROM $pictureTable ORDER BY id DESC LIMIT 2";
  //$result = $conn->query($sql);

  $result=mysqli_query($conn, $sql);
  if ($result->num_rows > 0)
            {

      // output data of each row
      while($row = $result->fetch_assoc()) {
  $dbImage = $row["picture"];

            echo "This is the name of the picture file -- ".$dbImage."<br>";

              //in loop find images in folder uploads

  ?>
                    <input type="radio" name="<?php echo $pictureName;?>" value="uploads/<?php echo $dbImage; ?>"/><img src="uploads/<?php echo $dbImage; ?>" width="50" height="60" class="thumbnail" >

                    <br>
                    <?php
                    echo "This is the pictureName --- ".$pictureName."<br><br>";
}
  }
    }
find_image($userPictureTable, pictureUrl);
find_image($userPictureTable, pictureUrl2);
?>
