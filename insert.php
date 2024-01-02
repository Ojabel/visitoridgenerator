<?php
include('db.php');



    // Update the record
    $id_no = $_POST["id_no"];
      $name = $_POST["name"];
      $number = $_POST["number"];
      $address = $_POST["address"];
      $purpose = $_POST["purpose"];

      // Sql query to be executed
  $insert = mysqli_query($conn, "INSERT INTO `visitor`(`id_no`, `name`, `phone`, `address`,`purpose` ) 
  VALUES ('$id_no','$name','$number','$address','$purpose')"); 


  if ($insert) {
    # code...
    header('location:id-card.php');
  }
  else{
    echo'failed to generate id card';
  }




?>
