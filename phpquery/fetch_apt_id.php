<?php

// Initialize the session
 session_start();
 
include ('dbconnection.php');
$output='';

$sqli="SELECT user_id from users where username='".$_POST['apt_id']."'";
$result1=mysqli_query($con,$sqli);
while($row=mysqli_fetch_array($result1)){

$id=$row["user_id"];

$sql="SELECT * from prescription  where user_id='$id' AND p_id= '".$_SESSION['p_id']."' ";
$result=mysqli_query($con,$sql);
$output='<option value="">Select Prescription ID</option>';
while($row=mysqli_fetch_array($result)){

  $output.='<option value="'.$row["pres_id"].'">'.$row["pres_id"].'</option>';
}
echo $output;

}
?>


