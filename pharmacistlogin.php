<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pharmacist login</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <pre>
 <center>
    
<form action="pharmacistlogin.php" method="post" name="my_form">

<fieldset>

<legend><b>LOGIN AS PHARMACIST</b></legend><br>
 
 Username      <input type="text" name="username"  required> <br>
 Password      <input type="password" maxlength="15" minlength="4" name="pass"  required> <br>
 <input type="submit" value="LOGIN" name="pharmacistlogin">

</fieldset>

</form>
 </center>  
    </pre> 
</body>


</html>
<?php 
  //log in as pharmacist
 if(isset($_POST['pharmacistlogin'])){
    
  
   
      $conn= new mysqli('localhost','root','','maluti_pharmacy');

     if(!$conn){ 
        die($conn->connect_error);

        }
     else{
      
           $username = $_POST['username'];
           $pass = $_POST['pass'];
            $link2 = "pharmacistduties.html";
            $link3 = "pharmacistorderportal.html";
            $link4 = "pharmacistconsultation.html";
            $link5 = "logout.php";
            $text  = "REGISTER A PATIENT AND ADD MEDICINE";
            $text1 = "ORDER PORTAL";
            $text2 = "CONSULTATIONG PORTAL";
            $text3 = "LOG OUT";

             $sql = "SELECT *FROM pharmacist WHERE PASSWD = '$pass' AND USERNAME = '$username' ";
                $results = $conn->query($sql);
                $rows = $results->num_rows;
    
                 if(!$results){
                 die($conn->connect_error);
                 }
                    else{
                     session_start();
                     $_SESSION['pass'] = $pass;
                        
                          if ($rows == 0 ) {
                               echo "<script> alert('ACCESS DENIED') </script>";
                                
                             }
                                else{
                                        echo "<script> alert('ACCESS HAS BEEN GRANTED') </script>";
                                        echo"<h3><u>CHOOSE FROM THE BELOW OPTIONS</u></h3>";
                                        echo "<ul>
                                         <li><a href=\"$link2\">$text</a></li>
                                         <li><a href=\"$link3\">$text1</a></li>
                                         <li><a href=\"$link4\">$text2</a></li> 
                                         <li><a href=\"$link5\">$text3</a></li> 
                                         </ul>";
                                    }
  
                        }

         }

    
}



?>

