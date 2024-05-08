<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>add medicine</title>
</head>
<body>
    
    <center>
        <fieldset>
            <legend><b>ADD MEDICINE</b></legend>
        <form action="phpfile.php" method="post" enctype="multipart/form-data">
            MEDICINE ID <br>
            <input type="number" name="medid" required> <br> <br>
            MEDICINE NAME <br>
            <input type="text" name="medname" required> <br> <br>
            QUANTITY<br>
            <input type="text" name="medquantity" required> <br> <br>
            COST PRICE per pill <br>
            <input type="number" name="cost" required><br><br>
            <input type="submit" value="ADD MEDICINE" name="addmedicinepharmacist">
        </form>
    </fieldset>
    <a href="logout.php"><b>LOG OUT</b></a>
    </center>
</body>

</html>