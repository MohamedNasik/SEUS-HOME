<?php
// include('colour.css');
include('dbconnection.php');
session_start();

if (isset($_POST['email'])) {

  $first_name=$_POST["first_name"];

  $last_name=$_POST["last_name"];
  $address="";
  $gender=$_POST["gender"];
  $contact="";
  $state="";
  // $image="";
  $nic="";
  $prefix=$_POST["prefix"];

//$passcode="12345";

  
  // $username=$_POST["username"];
  $dob=$_POST["dob"];
  $email=$_POST["email"];
  $passwordnormal=$_POST["password"];
  $password = md5($passwordnormal);
  //$passcode = md5($passcode);

  $sql= "INSERT INTO patients (prefix,p_fname,p_lname,p_address,p_gender,dob,p_contact,p_state,email,password,nic) 
  VALUES ('". $prefix."','". $first_name."','". $last_name."','". $address."', '". $gender."','". $dob."','". $contact."', '". $state."','". $email."', '". $password."' ,'". $nic."')  ";
  
  if(mysqli_query($con,$sql) ){
    
    $stmt = $con->prepare("SELECT * FROM patients WHERE email=? ");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No Patient');
    while($row = $result->fetch_assoc()) {
    
      $patient_id = $row['p_id'];
      $p_fname = $row['p_fname'];
      $p_lname = $row['p_lname'];

     $username = $p_fname. ' ' .$p_lname;

     
       $_SESSION['p_id']=$patient_id;

       $_SESSION['username']=$username ;

    }
    echo'Successfully Saved';
  
  }
  else {
   echo mysqli_error($con);
  }
 
  
  }

?>