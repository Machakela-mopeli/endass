<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Patient login </title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <fieldset>
        <legend><b>LOG IN AS A PATIENT</b></legend>
        <center>
            <form action="patientlogin.php" method="post" enctype="multipart/form-data">
                USERNAME <br>
                <input type="text" name="patientusername"> <br> <br>
                PASSWORD <br>
                <input type="password" name="patientpassword"> <br><br>
                <input type="submit" value="LOG IN" name="patientlogin">
                
            </form>
            

        </center>
      
    </fieldset>

</body>

</html>
<?php
//LOG  IN AS A PATIENT
if(isset($_POST['patientlogin'])){
    
    $conn= new mysqli('localhost','root','','maluti_pharmacy');

   if(!$conn){ 
      die($conn->connect_error);

      }
   else{
        
         $username = $_POST['patientusername'];
         $pass = $_POST['patientpassword'];
          
          $link1 = "patientorder.html";
          $link2 = "patientconsultation.html";
          $link3 = "patientmedicine.html";
          $link4 = "logout.php";
          $link5 = "viewnewmedicine.html";
          $link6 = "patientmedicalrecord.html";
          $text1 = "ORDER PORTAL";
          $text2 = "CONSULTATIONG PORTAL";
          $text3 = " MEDICINE PORTAL";
          $text5 = "WHAT'S NEW?";
          $text6 = "DISPLAY ALL MY MEDICAL RECORDS";
          $text4 = "LOG OUT";


           $sql = "SELECT *FROM patient WHERE password_ = '$pass' AND username = '$username' ";
              $results = $conn->query($sql);
              $rows = $results->num_rows;
  
               if(!$results){
               die($conn->connect_error);
               }
                  else{
                        session_start();
                        $_SESSION['patientpassword'] = $pass;
                        if ($rows == 0 ) {
                             echo "<script> alert('ACCESS DENIED') </script>";
                              
                           }
                              else{
                                      echo "<script> alert('ACCESS HAS BEEN GRANTED') </script>";
                                      echo"<h3><u>CHOOSE FROM THE BELOW OPTIONS</u></h3>";
                                      echo "<ul>
                                       <li><a href=\"$link1\">$text1</a></li>
                                       <li><a href=\"$link2\">$text2</a></li> 
                                       <li><a href=\"$link3\">$text3</a></li>
                                       <li><a href=\"$link5\">$text5</a></li>
                                       <li><a href=\"$link6\">$text6</a></li>
                                       <li><a href=\"$link4\">$text4</a></li>
                                       </ul>";
                                  }

                      }

            }

  
  }



?>