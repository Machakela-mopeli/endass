<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>maluti pharmacy</title>
    <link rel="stylesheet" href="css.css">
</head>
<body class="bodyportal">
     <center>
        <fieldset>
        <form action="enteradminpas.php" method="post">
        <legend> ENTER ADMIN'S PASSWORD </legend><br> <br>
            <input type="password" name="adminlogin" > <br> <br>
            <input type="submit" name="me">
        </form>
        </fieldset>
     </center>
</body>
</html>
<?php


if(isset($_POST['me'])){
     
    $adminpassword = $_POST['adminlogin'];
    $password1 = "malutiadmin@123";
   
    if($adminpassword != $password1){
       
        echo "you have entered an incorrect password please try again" . "<br/>";
    }
    else{
        session_start();
        $_SESSION['adminlogin'] = $adminpassword;
        header("location:AdminPortal.html");

        echo "login successfully"."<br/>";
        
    }


}
?>
