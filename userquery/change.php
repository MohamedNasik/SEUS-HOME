<?php

 // Initialize the session
 session_start();

require_once '../phpquery/dbconnection.php';

if (isset($_POST['contact'])) {

    $id = $_POST['id'];

    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $state = $_POST['state'];
    $nic = $_POST['nic'];

    $sql = "UPDATE patients SET p_fname='{$f_name}', p_lname='{$l_name}', p_address='{$address}', p_gender='{$gender}',dob='{$dob}', p_contact='{$contact}',p_state='{$state}', nic='{$nic}' WHERE p_id='".$id."'";

    if (mysqli_query($con, $sql)) {
    $id = mysqli_insert_id($con);



      echo 'saved_comment';
    }else {
      echo "Error: ". mysqli_error($con);
    }
    exit();
}




if (isset($_POST['newpass'])) {

    $new_pass=$_POST['newpass']; // new password
    $cur_pass=$_POST['curpass']; // current password

    $temp_password = md5($cur_pass); // current password md5

   //i dont see your password colom name, so i guess it password
   $stmt = $con->prepare("SELECT password FROM patients WHERE p_id =? ");
   $stmt->bind_param("s",$_SESSION['p_id'] );
   $stmt->execute();
   $result = $stmt->get_result();
   if($result->num_rows === 0);
   while($row = $result->fetch_assoc()) {
   $db = $row['password'];

   }

    if(  $temp_password == $db )
    {

        $new_password = md5($new_pass);

        try {
            $stmt1 = $con->prepare("UPDATE patients SET password = ? WHERE p_id= ?");
            $stmt1->bind_param("si", $new_password, $_SESSION['p_id']);
            $status = $stmt1->execute();
    
            
            if ($status === true) {
                echo 'Password Changed';
            } else {
                throw new Exception('cant change');
            }
        } catch (Exception $exc) {   
            //handle any errors in your code, including connection issues
            echo "ERROR: Could not prepare query: $stmt1. " . mysqli_error($con);
            //this will be your "flag" to handle on the client side
            //and if you want, can also log the error with 
            //$exc->getMessage() or $exc->getTraceAsString()
          
        }





    }
    else{
echo 'Password do not match';



    }
   

    // mysqli_stmt_close($stmt1);
    
    // $stmt->close();








}







?>