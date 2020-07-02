<?php
session_start();
$myDB = $_SESSION['username'];
include('server.php');
//echo "<a href='exp_bus_front_page.php'>Back to Business Page</a>";
//echo "<br>";
$target_dir = "uploads/";
$original = basename($_FILES["fileToUpload"]["name"]);
//echo $original."<br>";

$t=time();
$tTime = $t.".jpeg";
//echo $tTime;
//echo "<br>".$_FILES["fileToUpload"]["tmp_name"]."<br>";
//if (rename( $original, $tTime)){echo "well done";}else{echo "sorry";};
//echo "<br>".$original;




//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir.$original;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
//if (file_exists($target_file)) {
  //  echo "Sorry, file already exists.";
  //  $uploadOk = 0;
//}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 7500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$tTime)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //rename($target_file, $tTime);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//rotate image script

/**
 * Document   : EXIF Image Rotate Class
 * Author     : josephtinsley
 * Description: PHP class that detects a JPEG image current orientation and rotates a image using the images EXIF data.
 * http://twitter.com/josephtinsley
*/
class RotateImage {

    /*
     * @param string $setFilename - Set the original image filename
     * @param array $exifData - Set the original image filename
     * @param string $savedFilename - Set the rotated image filename
     */

    private $setFilename    = "";
    private $exifData       = "";
    private $degrees        = "";

    public function __construct($setFilename)
    {
        try{
            if(!file_exists($setFilename))
            {
              //echo "Inside __construct...".$setFilename;
                throw new Exception('File not found.');
            }
            $this->setFilename = $setFilename;
        } catch (Exception $e ) {
            die($e->getMessage());
        }
    }

    /*
     * EXTRACTS EXIF DATA FROM THE JPEG IMAGE
     */
    public function processExifData()
    {
        $orientation = 0;
        $this->exifData = exif_read_data($this->setFilename);
        foreach($this->exifData as $key => $val)
        {
            if(strtolower($key) == "orientation" )
            {
                $orientation = $val;
                break;
            }
        }
        if( $orientation == 0 )
        {
            $this->_setOrientationDegree(1);
        }

        $this->_setOrientationDegree($orientation);
    }

    /*
     * DETECTS AND SETS THE IMAGE ORIENTATION
     * Orientation flag info  http://www.impulseadventure.com/photo/exif-orientation.html
     */
    private function _setOrientationDegree($orientation)
    {
       switch($orientation):
           case 1:
               $this->degrees = 0;
               break;
           case 8:
               $this->degrees = 90;
               break;
           case 3:
               $this->degrees = 180;
               break;
           case 6:
               $this->degrees = 270;
               break;
       endswitch;

       $this->_rotateImage();
    }


    /*
     * ROTATE THE IMAGE BASED ON THE IMAGE ORIENTATION
     */
    private function _rotateImage()
    {
        if($this->degrees < 1 )
        {
            return FALSE;
        }
        $image_data = imagecreatefromjpeg($this->setFilename);
        return imagerotate($image_data, $this->degrees, 0);
    }


    /*
     * SAVE THE IMAGE WITH THE NEW FILENAME
     */
    public function savedFileName($savedFilename)
    {
        if($this->degrees < 1 )
        {
            return false;
        }

        $imageResource = $this->_rotateImage();
        if($imageResource == FALSE)
        {
            return false;
        }
        //echo $imageResource;
        //echo "Hello WOrld";
        imagejpeg($imageResource, $savedFilename);
    }

} //END CLASS
//echo $target_file;
$imageFile = $target_dir.$tTime;
//$imageFile = $target_file;
//echo "<br>.---".$imageFile;

$savedFile = "uploads/".$original;
$rotate = new RotateImage($imageFile);
$rotate->processExifData();
$rotate->savedFileName($savedFile);
//print '<img src="'.$imageFile.'" width="250"/>'."<br>";
//print '<img src="'.$savedFile.'" width="250"/>'."<br>";



 //end rotate image script

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
    }



        $sql = "INSERT INTO pictures (picture)
VALUES ('$target_file')";
$result = $conn->query($sql);


header('location: video_input.php');

?>
