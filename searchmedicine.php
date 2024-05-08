
<?php

if(isset($_POST['searchmedicine'])){
//establishing a connection 
    $conn = new mysqli('localhost', 'root','', 'maluti_pharmacy');

//check connection
 if($conn->connect_error){
     die("connection failed: " .$conn->connect_error);
    }

    else{
    
//accept data code from my form
$medicine = $_POST['medicine'];

 //searching for medicine
 $sql="SELECT *FROM medicine WHERE med_id= $medicine";
 $results = $conn->query($sql);

 if(!$results) die($conn->connect_error);

 $rows = $results->num_rows;
 
 if($rows == 0){
    echo " medicine is not available for now";
    }
 else{
 
    $results = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_array($results)){
     echo "<br>";
     echo "<table border=5 padding=1 cellspacing=1 border-color=black>" 
     ."<tr>"
     ."<td>" ."Medicine id" ."</td>"
     ."<td>" ."Medicine name" ."</td>"
     ."<td>" ."Quantity" ."</td>"
     ."<td>" ."Price per tablet" ."</td>"
     ."</tr>" 
     ."<tr>"
     ."<td>"  .$rows['med_id'] ."</td>"
     ."<td>"  .$rows['med_name'] ."</td>"
     ."<td>"  .$rows['quantity'] ."</td>"
     ."<td>"  .$rows['price_maloti'] ."</td>"
     ."</tr>"
     ."</table>";
    //echo "<img height=100 width=200 src='/images/" .$rows['med_photo']. "' >";
     
   
 }
}

    }
    
    }
?>