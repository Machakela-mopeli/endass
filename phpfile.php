
<?php


//establishing a connection 
    $conn = new mysqli('localhost', 'root','', 'maluti_pharmacy');
//check connection
if ($conn->connect_error){
    
    die("connection failed: " .$conn->connect_error);
}
else{
//echo "connected successfully";
//register a pharmacist
if(isset($_POST['register'])){
    session_start();
    $adminpassword = $_SESSION['adminlogin'];

   if(!isset($_SESSION['adminlogin']))
   {
    echo " you need to log in first";
    header("LOCATION: enteradminpas.php");
    die();
   }
   else{
    
    //accept data code from my form
$employee_id = $_POST['empid'];
$pharmacist_name = $_POST['fname'];
$pharmacist_surname = $_POST['lname'];
$town = $_POST['town'];
$District = $_POST['district'];
$Username = $_POST['username'];
$Password_ = $_POST['pass'];

 //INSERTING DATA INTO OUR TABLE
$sql = "INSERT INTO pharmacist VALUES ($employee_id, '$pharmacist_name', '$pharmacist_surname', '$town', '$District','$Username', '$Password_')";
 

//validate insertion of a new record

$results = $conn->query($sql);
if (!$results)
{
    echo "error creating a record";
}
else
 {
    echo "record has been successfully created";
    
}
}
}

 //search a pharmacist
elseif (isset($_POST['search_pharmacist'])) {
    session_start();
    $adminpassword = $_SESSION['adminlogin'];

   if(!isset($_SESSION['adminlogin']))
   {
    echo " you need to log in first";
    header("LOCATION: enteradminpas.php");
    die();
   }
    else{
     
    $ID = $_POST['enterid'];
$sql="select *from pharmacist where EMP_ID=$ID";
$results= $conn->query($sql);

if(!$results) die($conn->connect_error);

$rows = $results->num_rows;

if($rows == 0){
    echo " a pharmarcist was not found";
}
else{

    $rows=$results->fetch_array(MYSQLI_ASSOC);
    echo "<br>";
    echo "<pre>" ."EMPLOYEE ID: " .$rows['EMP_ID'] ."<br>";
    echo          "NAME       : " .$rows['FIRST_NAME'] ."<br>";
    echo          "SURNAME    : " .$rows['LAST_NAME'] ."<br>";
    echo          "HOME TOWN  : " .$rows['HOME_TOWN'] ."<br>";
    echo          "DISTRICT   : " .$rows['DSTRICT'] ."<br>";
    echo          "USERNAME   : " .$rows['USERNAME'] ."<br>";
    echo          "PASSWORD   : " .$rows['PASSWD'] ."<br>" ."</pre>";

}
}
}
//delete a pharmacist
elseif (isset($_POST['delete_pharmacist'])) {
    session_start();
    $adminpassword = $_SESSION['adminlogin'];

   if(!isset($_SESSION['adminlogin']))
   {
    echo " you need to log in first";
    header("LOCATION: enteradminpas.php");
    die();
   }
    else{
    
    $ID = $_POST['enterid'];
    $sql="select *from pharmacist where EMP_ID=$ID";
    $results= $conn->query($sql);
    
    if(!$results) die($conn->connect_error);
    
    $rows = $results->num_rows;
    
    if($rows == 0){
        echo " a pharmarcist was not found";
    }
    else{
    
        $rows=$results->fetch_array(MYSQLI_ASSOC);
        $sql= "delete from pharmacist where EMP_ID= $ID";
        $results= $conn->query($sql);
        if(!$results){
        die($conn->connect_error);
        }
        else{
            echo "A record has been deleted";
        }   
    }
}
    
}

//DISPLAYING ALL RECORDS

elseif(isset($_POST['Display_pharmacist'])) {

    session_start();
    $adminpassword = $_SESSION['adminlogin'];

   if(!isset($_SESSION['adminlogin']))
   {
    echo " you need to log in first";
    header("LOCATION: enteradminpas.php");
    die();
   }
    else{
     
    
    $sql= "select *from pharmacist";
    $results= $conn->query($sql);
    if(!$results) die($conn->connect_error);

    $rows = $results->num_rows;
    
    if($rows == 0){
        echo " no pharmarcist was found";
    }
     else{
    
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($results)){
            echo "<br>";
        echo " <pre>
                      EMPLOYEE ID: " .$rows['EMP_ID'] ."<br>
                      FIRST NAME : " .$rows['FIRST_NAME'] ."<br>
                      LAST NAME  : " .$rows['LAST_NAME'] ."<br>
                      HOME TOWN  : " .$rows['HOME_TOWN'] ."<br>
                      DISTRICT   : " .$rows['DSTRICT'] ."<br>
                      USERNAME   : " .$rows['USERNAME'] ."<br>
                      PASSWORD   : " .$rows['PASSWD'] ."</pre>";
       }
        }
    }
}
  
    
   
//SEARCH A MEDICINE AS A PHARMACIST
    elseif(isset($_POST['searchmedicinepharnacist'])){
        session_start();
        $pass = $_SESSION['pass'];
        if(!isset($_SESSION['pass'])){
         echo " you need to log in first";
         header("LOCATION: pharmacistlogin.php");
         die();
        }
        else{
         
        $id = $_POST['searchmed'];

        $sql = "SELECT *FROM medicine WHERE med_id = $id";
        $results = $conn->query($sql);

        if (!$results) die($conn->connect_error);

        $my_rows= $results->num_rows;

        if($my_rows == 0){
            echo "A record was not found";
        }
        else{
            for($i=0;$i < $my_rows; $i++){
                $my_rows = $results->fetch_array(MYSQLI_ASSOC); 
                echo "<br>";
                echo "<pre>" ."Medicine id: " .$rows['med_id'] ."<br>";
                echo          "Name       : " .$rows['med_name'] ."<br>";
                echo          "Quantity   : " .$rows['quantity'] ."<br>";
                echo          "cost      M: " .$rows['price_Maloti'] ."<br>" ."</pre>";
            
        }
    }
}
    }

//DELETE A MEDICINE AS PHARMACIST
elseif(isset($_POST['deletemedicinepharmacist'])){

    session_start();
        $pass = $_SESSION['pass'];
        if(!isset($_SESSION['pass'])){
         echo " you need to log in first";
         header("LOCATION: pharmacistlogin.php");
         die();
        }
        else{
         
    $id = $_POST['searchmed'];

    $sql = "SELECT *FROM medicine WHERE med_id = $id";
    $results = $conn->query($sql);

    if (!$results) die($conn->connect_error);

    $my_rows= $results->num_rows;

    if($my_rows == 0){
        echo "A record was not found";
    }
    else{
        
            $my_rows = $results->fetch_array(MYSQLI_ASSOC); 
           $query = "DELETE FROM medicine WHERE med_id = $id";
           $results = $conn->query($query);
           
           if(!$results){

            echo "<script> alert('a record was not found') </script>" .$conn->connect_error;
                        }
           else{
           echo "<script> alert('A deletion of a record has been phenomenal') </script>";
                }
         } 
}
}


//ADD MEDICINE AS PHARMACIST
elseif(isset($_POST['addmedicinepharmacist'])){
    session_start();
        $pass = $_SESSION['pass'];
        if(!isset($_SESSION['pass'])){
         echo " you need to log in first";
         header("LOCATION: pharmacistlogin.php");
         die();
        }
        else{
         
    $medicine_id = $_POST['medid'];
    $medicine_name = $_POST['medname'];
    $quantity = $_POST['medquantity'];
    $cost_price = $_POST['cost'];

$sql = "INSERT INTO medicine VALUES($medicine_id, '$medicine_name', $quantity, $cost_price)";


$results = $conn->query($sql);

if(!$results){
     
    echo "<script> alert('A record has failed to be recorded'); 
    </script>" .$conn->error ;
   
    }
    else{
    echo "<script> alert(' A record has been successfully recorded'); 

    </script>";
    
    }
    
        }
    }

 //SEARCH FOR A MEDICINE AS PHARMACIST
  elseif(isset($_POST['searchmedicinepharmacist'])){

    session_start();
    $pass = $_SESSION['pass'];
    if(!isset($_SESSION['pass'])){
     echo " you need to log in first";
     header("LOCATION: pharmacistlogin.php");
     die();
    }
        else{
         
            $medicine = $_POST['searchmed'];

 //searching for medicine
 $sql="SELECT *FROM medicine WHERE med_id= $medicine";
 
    $results = mysqli_query($conn, $sql);

    $rows = $results->num_rows;
    if( $rows == 0){

        echo " A RECORD IS NOT FOUND";
    }
    else{
    while ($rows = mysqli_fetch_array($results)){
     echo "<br>";
     echo "<pre>"
       ."Medicine id      : ".$rows['med_id'] ."<br>"
       ."Medicine name    : ".$rows['med_name'] ."<br>"
       ."Quantity         : " .$rows['quantity'] ."<br>"
       ."Price per tablet : ".$rows['price_maloti'] ."</pre>";
    }
    }
   
  }
  }

//UPDATE A MEDICINE AS A PHARMACIST
elseif(isset($_POST['updatemedicinepharmacist'])){

    session_start();
    $pass = $_SESSION['pass'];
    if(!isset($_SESSION['pass'])){
     echo " you need to log in first";
     header("LOCATION: pharmacistlogin.php");
     die();
    }
        else{
         
    $medicine_id = $_POST['medid'];
    $medicine_name = $_POST['medname'];
    $quantity = $_POST['medquantity'];
    $cost_price = $_POST['cost'];
  
$sql = "UPDATE medicine SET med_name ='$medicine_name', quantity = $quantity, price_maloti= $cost_price WHERE med_id = $medicine_id";

$results = $conn->query($sql);

if(!$results){
     
    echo "<script>" ." alert('A record has failed to be updated')" ."</script>" .$conn->error ;
   
    }
    else{
    echo "<script>". "alert(' A record has been successfully updated');" ."</script>";
    
    }
    
        }
    }



// PHARMACIST UPDATING AN ORDER STATUS and A MEDICAL RECORD
elseif(isset($_POST['pharmacistupdateorderstatus'])){
    session_start();
    $pass = $_SESSION['pass'];
    if(!isset($_SESSION['pass'])){
     echo " you need to log in first";
     header("LOCATION: pharmacistlogin.php");
     die();
    }
        else{
         
    $order_id = $_POST['orderid'];
    $status = $_POST['orderstatus'];
    $update = $_POST['orderupdate'];
    $pharmacist_id = $_POST['pharmacistid'];
    $issues = $_POST['issues'];
    $catid = $_POST['catid'];

$sql = "UPDATE patient_order SET Status_ = '$status', status_update_date = '$update', pharmacist_id = $pharmacist_id WHERE Order_id = $order_id";
$sql2 = "UPDATE medical_record SET pharmacist_id = $pharmacist_id, issues = '$issues' WHERE medical_record_id = $catid";
$sql3 = "UPDATE medicine JOIN patient_order ON medicine.med_id = patient_order.med_id SET medicine.quantity = medicine.quantity - patient_order.quantity_";
$results = $conn->query($sql);
$results2 = $conn->query($sql2);
$results3 = $conn->query($sql3);

if(!$results){
     
    echo "<script>" ." alert('Failed to update an order');" ."</script>" .$conn->error ;
   
    }
    else{
    echo "<script>". "alert(' A Order has been successfully updated');" ."</script>";
    echo "<br>";
    if(!$results2){

        echo " failed to update a medical record";

    }
    else{
        echo "A medical record has successfully been updated";
        echo "<br>";
        switch ($status) {
            case 'delivered':
                if(!$results3) {
                    echo "failed to update quantity";
                }
                else{
                    echo "quantity has been updated";
                }
                break;
            
            default:
            echo "wrong input detected";
                break;
        }
    }
       }
    
        }
    }


//PHARMACIST DISPLAY ALL Orders
elseif(isset($_POST['pharmacistdisplayorder'])){

  session_start();
  $pass = $_SESSION['pass'];
  if(!isset($_SESSION['pass'])){
   echo " you need to log in first";
   header("LOCATION: pharmacistlogin.php");
   die();
  }
        else{
         
$sql = " SELECT * FROM patient_order";

$results = $conn->query($sql);
$rows = $results->num_rows;
if(!$results){
     
    echo $conn->error ;
   
    }

    else{
        if($rows == 0){
        echo "A record was not found";
    }
    else{
           
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($results)){
            echo "<br>";
        echo " <pre>
                      Order ID      : " .$rows['Order_id'] ."<br>
                      ORDER DATE    : " .$rows['Ord_date'] ."<br>
                      PATIENT ID    : " .$rows['patient_id'] ."<br>
                      ORDER STATUS  : " .$rows['Status_'] ."<br>
                      COLLECTION    : " .$rows['Collection'] ."<br>
                      DISTANCE      : " .$rows['Distance'] ."<br>
                      MEDICINE id   : " .$rows['med_id'] ."<br>
                      DATE OF UPDATE: " .$rows['status_update_date'] ."<br>
                      PHARMACIST ID : " .$rows['pharmacist_id'] ."<br>
                      QUANTITY      : " .$rows['quantity_'] ."<br>
                      ORDER AMOUNT  : " .$rows['Totalamout'] ."<br>
                    PATIENT ADDRESS : " .$rows['patient_address']."</pre>";
                }
           
            } 

        }
    
    }
}


    //PHARMACIST VIEW ALL PATIENT'S ISSUES TO BE CONSULTED
    elseif(isset($_POST['clientissues'])){
        session_start();
        $pass = $_SESSION['pass'];
        if(!isset($_SESSION['pass'])){
         echo " you need to log in first";
         header("LOCATION: pharmacistlogin.php");
         die();
        }
        else{
         
        $sql = " SELECT * FROM consultaion";
        
        $results = $conn->query($sql);
        $rows = $results->num_rows;
        if(!$results){
             
            echo $conn->error ;
           
            }
        
            else{
                if($rows == 0){
                echo " NO CLIENT SEEKS CONSULT";
            }
            else{
                   
                $results = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($results)){
                    echo "<br>";
                echo " <pre>
                              PHARMACIST ID   : " .$rows['EMP_ID'] ."<br>
                              MESSAGE         : " .$rows['Patient message'] ."<br>
                              PATIENT ID      : " .$rows['patient_id'] ."<br>
                              PHARMACIST REPLY: " .$rows['pharmarcist_reply'] ."</pre>";
                        }
                   
                    } 
        
                }
            
            }
        }

        
 //PHARMACIST CONSULTATION
 elseif (isset($_POST['consultationsubmit'])) {
 session_start();
 $pass = $_SESSION['pass'];
 if(!isset($_SESSION['pass'])){
  echo " you need to log in first";
  header("LOCATION: pharmacistlogin.php");
  die();
 }
        else{
        
    $patient_id = $_POST['consultationid'];
    $pharmacist_id = $_POST['pharmacistid'];
    $message = $_POST['consultationmessage'];
   
  
$sql = "UPDATE consultaion SET EMP_ID = $pharmacist_id, pharmarcist_reply = '$message' WHERE patient_id = $patient_id";

$results = $conn->query($sql);

if(!$results){
     
    echo "<script>" ." alert('A record has failed to be updated')" ."</script>" .$conn->error ;
   
    }
    else{
    echo "<script>". "alert(' A record has been successfully updated');" ."</script>";
    
    }
    
        }
    }
      

//CONSULTATION ON PATIENT SIDE
elseif(isset($_POST['sendissue'])){
    session_start();
    $pass = $_SESSION['patientpassword'];
   if(!isset($_SESSION['patientpassword'])){

    echo " you need to log in first";
    header("LOCATION: patientlogin.php");
    die();
   }
       else{
       
    $patient_id = $_POST['patientid'];
    $message = $_POST['message'];
   
  
$sql = " INSERT INTO consultaion VALUES ($patient_id,'','$message','')";

$results = $conn->query($sql);

if(!$results){
     
    echo "<script>" ." alert('A record has failed to reflect')" ."</script>" .$conn->error ;
   
    }
    else{
    echo "<script>". "alert(' A record has been successful');" ."</script>";
    
    }
    
}
}


 //PATIENTS CREATING ORDERS
 elseif(isset($_POST['makeorder'])){
    session_start();
    $pass = $_SESSION['patientpassword'];
   if(!isset($_SESSION['patientpassword'])){

    echo " you need to log in first";
    header("LOCATION: patientlogin.php");
    die();
   }
       else{
       
    $patient_id = $_POST['patientid'];
    $order_date = $_POST['orderdate'];
    $collection = $_POST['collection'];
    $distance = $_POST['distance'];
    $quantity = $_POST['quantity'];
    $med_id = $_POST['medid'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $status ='pending';
    $date = '';
   
    
    $product = $price * $quantity;
 if($distance <= 10){
        $amount = $product;
 }
 elseif ($distance >= 11 && $distance < 12) {
    $amount = $product + 5;
 }
 elseif ($distance >= 12 && $distance < 13) {
    $amount = $product + 10;
 }
 elseif ($distance >= 13 && $distance < 14) {
    $amount = $product + 15;
 }
 elseif ($distance >= 14 && $distance < 15) {
    $amount = $product + 20;
 }
 elseif ($distance = 15) {
    $amount = $product + 25;
 }
 else{
        echo "we do not deliver over distaces greater than 15 kilometers";
 }
    

$sql = " INSERT INTO patient_order VALUES (null,'$order_date', $patient_id, '$status', '$collection', $distance, '$date',$med_id, null, $quantity, $amount, '$address' )";
$sql2 ="INSERT INTO medical_record VALUES ($patient_id, $med_id, null, null, null)";
$results = $conn->query($sql);
$results2 = $conn->query($sql2);

if(!$results){

     echo " failed to order a medicine" .$conn->error ;
    }
    else{
    echo " A medicine has been successfully ordered";
        echo "<br>";
    if(!$results2){
        echo " failed to create a medical record" .$conn->error ;
         } else{
            echo " a medical record has been created successfully";
         }
         
    
    }
    
        }
    }

//PATIENT VIEW NEW MEDICINE PICTURES
        elseif(isset($_POST['submitnew'])){
        
            session_start();
            $pass = $_SESSION['patientpassword'];
           if(!isset($_SESSION['patientpassword'])){
       
            echo " you need to log in first";
            header("LOCATION: patientlogin.php");
            die();
           }
               else{
                
 //searching for medicine
 $sql="SELECT *FROM new_";
 
    $results = mysqli_query($conn, $sql);

    $rows = $results->num_rows;
    if( $rows == 0){

        echo " there is no new medicine at the moment";
    }
    else{
    while ($rows = mysqli_fetch_array($results)){
     echo "<br>";
     echo "<pre>"
       ."<img src = \"uploads\\" .$rows['photo'] ."\"alt= \"image\" height=\"100px\" width=\"130px\"/>" ."<br>"
       ."medicine description : " .$rows['discription'] ."</pre>";
    }
    }
   
  }
 }

  //UPDATE NEW MEDICINE
  if(isset($_POST['updatenew'])){
    
    session_start();
 $pass = $_SESSION['pass'];
 if(!isset($_SESSION['pass'])){
  echo " you need to log in first";
  header("LOCATION: pharmacistlogin.php");
  die();
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
    $id = $_POST['id'];
       $conn = new mysqli('localhost','root','','maluti_pharmacy');
       if (!$conn) die($conn->connect_error);

        $query =" UPDATE new_ SET photo ='$filename', discription = '$decr', file_path ='$destination' WHERE catalogue_id= $id";

        $results = $conn->query($query);

        if(!$results){
            echo "failed to upload information";
        }
        else{
            echo "an upload has been a success";
        }

  }
  }

  //DELETE NEW MEDICINE
  elseif(isset($_POST['deletenew'])){
    session_start();
    $pass = $_SESSION['pass'];
    if(!isset($_SESSION['pass'])){
     echo " you need to log in first";
     header("LOCATION: pharmacistlogin.php");
     die();
    }
        else{
    
    $id = $_POST['id'];

    $sql = "SELECT *FROM new_ WHERE catalogue_id = $id";
    $results = $conn->query($sql);

    if (!$results) die($conn->connect_error);

    $my_rows= $results->num_rows;

    if($my_rows == 0){
        echo "A record was not found";
    }
    else{
        
            $my_rows = $results->fetch_array(MYSQLI_ASSOC); 
           $query = "DELETE FROM new_ WHERE catalogue_id = $id";
           $results = $conn->query($query);
           
           if(!$results){

            echo "<script> alert('a record was not found') </script>" .$conn->connect_error;
                        }
           else{
           echo "<script> alert('A deletion of a record has been phenomenal') </script>";
                }
         } 
}
  }
//PHARMACIST VIEW MEDICAL RECORDS
if(isset($_POST['viewmedics'])){
    session_start();
    $pass = $_SESSION['pass'];
    if(!isset($_SESSION['pass'])){
     echo " you need to log in first";
     header("LOCATION: pharmacistlogin.php");
     die();
    }
        else{
         
    $sql = "SELECT *FROM medical_record";
    $results = $conn->query($sql);
    $rows = $results->num_rows;
    if($rows == 0){
        echo "No record was found";
    }
    else{
        while ($rows = mysqli_fetch_array($results)){
            echo " <pre> <br>
            PATIENT ID        : " .$rows['patient_id'] ."<br>
            MEDICINE ID       : " .$rows['med_id'] ."<br>
            PHARMACIST ID     : " .$rows['pharmacist_id'] ."<br>
            MEDICAL RECORD ID : " .$rows['medical_record_id'] ."<br>
            ISSUES            : " .$rows['issues'] ."</pre>";
        }
    }

}
}

//PATIENT SEARCH FOR MY MEDICAL RECORD
if(isset($_POST['searchmedicalrecord'])){
 session_start();
     $pass = $_SESSION['patientpassword'];
    if(!isset($_SESSION['patientpassword'])){

     echo " you need to log in first";
     header("LOCATION: patientlogin.php");
     die();
    }
    else{
    
    $id = $_POST['id'];
    $sql = "SELECT *FROM medical_record WHERE patient_id = $id";
    $results = $conn->query($sql);
    $rows = $results->num_rows;
    if($rows == 0){
        echo "No record was found";
    }
    else{
        while ($rows = mysqli_fetch_array($results)){
            echo " <pre> <br>
            PATIENT ID        : " .$rows['patient_id'] ."<br>
            MEDICINE ID       : " .$rows['med_id'] ."<br>
            PHARMACIST ID     : " .$rows['pharmacist_id'] ."<br>
            MEDICAL RECORD ID : " .$rows['medical_record_id'] ."<br>
            ISSUES            : " .$rows['issues'] ."</pre>";
        }
    }

}
}

//PATIENT SEE ALL THE MEDICINE
elseif(isset($_POST['clicksee'])) {

    session_start();
    $pass = $_SESSION['patientpassword'];
           if(!isset($_SESSION['patientpassword'])){
       
            echo " you need to log in first";
            header("LOCATION: patientlogin.php");
            die();
    }
    else{
     
    
    $sql= "select *from medicine";
    $results= $conn->query($sql);
    if(!$results) die($conn->connect_error);

    $rows = $results->num_rows;
    
    if($rows == 0){
        echo " no medicine was found";
    }
     else{
    
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($results)){
            echo "<br>";
            echo "<pre>"
            ."Medicine id      : ".$rows['med_id'] ."<br>"
            ."Medicine name    : ".$rows['med_name'] ."<br>"
            ."Quantity         : " .$rows['quantity'] ."<br>"
            ."Price per tablet : ".$rows['price_maloti'] ."</pre>";
         
       }
        }
    }
}
//PHARMACIST SEE MEDICINE
elseif(isset($_POST['seeboy'])) {

    session_start();
        $pass = $_SESSION['pass'];
        if(!isset($_SESSION['pass'])){
         echo " you need to log in first";
         header("LOCATION: pharmacistlogin.php");
         die();
    }
    else{
     
    
    $sql= "select *from medicine";
    $results= $conn->query($sql);
    if(!$results) die($conn->connect_error);

    $rows = $results->num_rows;
    
    if($rows == 0){
        echo " no medicine was found";
    }
     else{
    
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($results)){
            echo "<br>";
            echo "<pre>"
            ."Medicine id      : ".$rows['med_id'] ."<br>"
            ."Medicine name    : ".$rows['med_name'] ."<br>"
            ."Quantity         : " .$rows['quantity'] ."<br>"
            ."Price per tablet : ".$rows['price_maloti'] ."</pre>";
         
       }
        }
    }
}

}

?>
