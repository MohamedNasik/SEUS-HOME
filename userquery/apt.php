<?php

session_start();


require_once '../phpquery/dbconnection.php';

if (isset($_POST['testing_schedule_id'])) {

   $testing_schedule_id=$_POST['testing_schedule_id'];

$sql = "UPDATE testing_schedule SET patient_status ='0' ,payment_status='3'  WHERE testing_schedule_id= '$testing_schedule_id' AND p_id='".$_SESSION['p_id']."' ";
if($con->query($sql) === true){ 
    echo "Records was updated successfully."; 
} else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                        . $con->error; 
} 
$con->close(); 
}


if (isset($_POST['testing_schedule_id1'])) {

    $testing_schedule_id1=$_POST['testing_schedule_id1'];
 
 $sql = "UPDATE testing_schedule SET patient_status ='1' , payment_status='0'  WHERE testing_schedule_id= '$testing_schedule_id1' AND p_id='".$_SESSION['p_id']."' ";
 if($con->query($sql) === true){ 
     echo "Records was updated successfully."; 
 } else{ 
     echo "ERROR: Could not able to execute $sql. "  
                                         . $con->error; 
 } 
 $con->close(); 
 }



?> 