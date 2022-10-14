<?php


include "../phpquery/dbconnection.php";

if (isset($_POST['passcode1'])) {

$passcode1=$_POST['passcode1']; // new password
$mail=$_POST['mail']; // new password
$person=$_POST['person']; 


//i dont see your password colom name, so i guess it password
$stmt = $con->prepare("SELECT * FROM patients WHERE p_id =? AND email =? ");
$stmt->bind_param("ss",$person,$mail);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0);
while($row = $result->fetch_assoc()) {
$actual_email = $row['email'];
$p_id = $row['p_id'];

}

//  check whether email is match
if(  $mail == $actual_email )
{

    $new_password = md5($passcode1); // current password md5

    try {
        $stmt1 = $con->prepare("UPDATE patients SET password = ? WHERE p_id= ?");
        $stmt1->bind_param("ss", $new_password, $p_id );
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



}



?>