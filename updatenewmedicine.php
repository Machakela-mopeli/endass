<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="css.css">
    <title>UPDATE MEDICINE</title>
    </head>
<body>
    <fieldset>
        <legend><b>INTRODUCE NEW MEDICINE TO THE PATIENTS</b></legend>
        <center>
            <form action="phpfile.php" method="POST" enctype="multipart/form-data">
                MEDICATION ID <br><br>
                <input type="number" name="id"required > <br> <br>
                ADD MEDICINE DESCRIPTION <br><br>
                <textarea  name="description"required></textarea><br><br><br>
                ADD PICTURE OF MEDICINE <br><br>
                <input type="file" name="image" required><br><br><br>
                <input type="submit" value="UPDATE" name="updatenew">
            </form>
            </center>
            </fieldset>
            <br><br>
            <fieldset>
                <legend><b>DELETE NEW MEDICINE</b></legend>
                <center>
            <form action="phpfile.php" method="POST" enctype="multipart/form-data">
                Enter id of new medicine you are eager to delete <br><br>
                <input type="number" name="id"><br><br>
                <input type="submit" value="DELETE" name="deletenew">
            </form>
            </center>
    </fieldset>

    
</body>
</html>