<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <title>new medicine</title>
</head>
<body>
    <fieldset>
        <legend><b>INTRODUCE NEW MEDICINE TO THE PATIENTS</b></legend>
        <center>
            <form action="newmedicine.php" method="POST" enctype="multipart/form-data">

                ADD MEDICINE DESCRIPTION <br><br>
                <textarea  name="description" required></textarea><br><br><br>
                ADD PICTURE OF MEDICINE <br><br>
                <input type="file" name="image" required><br><br><br>
                <input type="submit" value="UPLOAD" name="upload">
            </form>
        </center>
    </fieldset>
</body>
</html>

<?php
//UPLOAD PICTURES TO THE SYSTEM
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    exit('post method required');
}
else{

if(empty($_FILES)){
    exit('$_FILES IS EMPTY');
}

if ($_FILES['image']['error'] !== UPLOAD_ERR_OK){
     switch ($_FILES["image"]["error"]){
    case UPLOAD_ERR_PARTIAL:
        exit("file only partialy uploades");
            break;

        case UPLOAD_ERR_NO_FILE:
            exit("no file was uploaded");
            break;

            case UPLOAD_ERR_EXTENSION:
                exit("file upload stopped by php  extension");
                break;

            case UPLOAD_ERR_INI_SIZE:
                exit("file exits maxium file size in PHP");
                break;

            case UPLOAD_ERR_NO_TMP_DIR:
               exit("temporary folder is not found");
               break;

               case UPLOAD_ERR_CANT_WRITE:
                exit("failed to write a file");
                break;

                default:
                exit("unknown upload error");
                break;
     }
}
session_start();
$pass = $_SESSION['pass'];
if(!isset($_SESSION['pass'])){

 echo " you need to log in first";
 header("LOCATION: pharmacistlogin.php");
}
else{


$pathinfo = pathinfo($_FILES['image']['name']);
$base = $pathinfo['filename'];
$base = preg_replace("/[^\-]/", "_", $base);
$filename = $base . "." . $pathinfo["extension"];

$filename = $_FILES['image']['name'];
$destination = __DIR__ ."/uploads/" . $filename;

if( ! move_uploaded_file($_FILES['image']['tmp_name'],$destination)){
    exit('cant move uploaded file');
}
//echo" file uploaded successfully";


    $decr = $_POST["description"];

       $conn = new mysqli('localhost','root','','maluti_pharmacy');
       if (!$conn) die($conn->connect_error);

        $query =" INSERT INTO new_ VALUES(null, '$filename', '$decr', '$destination')";

        $results = $conn->query($query);

        if(!$results){
            echo "failed to upload information";
        }
        else{
            echo "an upload has been a success";
        }
    }
}

?>