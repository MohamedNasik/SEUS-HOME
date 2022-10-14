<?php
 
session_start();

require_once "dbconnection.php";

if (isset($_POST['type'])) {


   $type=$_POST["type"];

   $no=$_POST["no"];


  $stmt1 = $con->prepare("UPDATE appointment SET type =? WHERE No =?");
  $stmt1->bind_param('ss',$_POST["type"],$_POST["no"]);
  $status = $stmt1->execute();

  
  if ($status === true) {
 
echo 'Success';

  }
  else {
    echo "ERROR: Could not able to execute. " . mysqli_error($con);
  }

  }





 ?>
