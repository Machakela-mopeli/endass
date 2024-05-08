<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>register patient</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <pre>
 <center>
    
<form action="registerpatient.php" method="post" name="my_form">

<fieldset>

<legend><b>REGISTER A PATIENT</b></legend><br>

Patient ID    <input type="number" name="patientid" required > <br>
Pharmacist ID <input type="number" name="pharmacistid" required><br>
Fisrt Name    <input type="text" name="patientname" required><br>
Last Name     <input type="text" name="patientsurname" required><br>
Home Town     <input type="text" name="patienttown" required><br>
District      <input type="text" name="patientdistrict" required> <br>
Username      <input type="text" name="username"  required> <br>
Password      <input type="password" name="pass" maxlength="15" minlength="4" id="passw" required> <br>
<input type="submit" value="Register" name="patientregister">

</fieldset>

</form>
 </center>  
 
</body>

</html>
<?php

//REGISTER A PATIENT
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $conn= new mysqli('localhost','root','','maluti_pharmacy');
    if(!$conn) die($conn->connect_error);
   
    session_start();
    $pass = $_SESSION['pass'];
   if(!isset($_SESSION['pass'])){
    echo " you need to log in first";
    header("LOCATION: pharmacistlogin.php");
     die();
   }
   else{
    $patient_id =$_POST['patientid'];
    $pharmacist_id =$_POST['pharmacistid'];
    $name =$_POST['patientname'];
    $surname =$_POST['patientsurname'];
    $town =$_POST['patienttown'];
    $district =$_POST['patientdistrict'];
    $username =$_POST['username'];
    $patient_pass =$_POST['pass'];

    $sql ="INSERT INTO patient VALUE($patient_id,'$name','$surname','$town','$district','$username','$patient_pass',$pharmacist_id)";
    $results = $conn->query($sql);
    if (!$results) {
        echo "<script> alert('Failled to create a record'); </script)";

    } else {
        echo " <script> alert('A record has been created successfully'); </script>";
    }
    
   }
}
?>