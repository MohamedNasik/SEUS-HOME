<?php


$apt_id="1";

$stmt2 = $con->prepare("SELECT apt_id FROM appointment WHERE user_id = ? AND apt_date=? order by apt_id DESC LIMIT 1");
$stmt2->bind_param("ss",$user_id,$date);
$stmt2->execute();
$result2 = $stmt2->get_result();
if($result2->num_rows > 0){
 while($row = $result2->fetch_assoc()) {

    $aptid= $row["apt_id"];


}


}
     
$time_interval = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($row['start_time'])));

$sql= "INSERT INTO appointment (apt_id,specilization,user_id,p_id,patient_name,apt_date,type,patient_status,admin_status,doctor_status) 
VALUES ('". $apt_id."','". $specilization."','". $user_id."','". $patient_id."','". $_SESSION['username']."',  '". $date."','". $type."','". $patient_status."','". $admin_status."','". $doctor_status."')  ";


if(mysqli_query($con,$sql) ){
 
//  $apt_id = $con->insert_id;

}
else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

// $title =  $patient_name   .' ( Dr. ' .$doctor_name. ' ' . $specilization.')' ;
$color= '#6453e9';
$text= '##ffffff';

$sqli= "INSERT INTO patient_schedule (apt_id,user_id,p_id,start_time,end_time,color,text_color) 
VALUES ('". $apt_id."','". $user_id."','". $patient_id."',  '".  $starts ."','". $time_interval."','". $color."','". $text."')  ";

if(mysqli_query($con,$sqli) ){
  echo'Admin added succesfully!!';

}
else {
  echo "ERROR: Could not able to execute $sqli. " . mysqli_error($con);
}


// sent email for APPOINTMENT
$token = 'http://localhost/Hospital/hospitalwebsite/admin-import-data.php';

$to      = $email;
$subject = 'Regarding the Appointment Request';
$message = '<p> Your Appointment requested for Dr.'.$doctor_name.' ('.$specilization.') on '.$date. ' has <b> been sent.</b> Please refer '.$token.' for the patient schedule and Doctor Consulting time . <br><br>Thank You. <br><br> Best Regards from </br> <br><b> <i>  SEUS Hospitals </i></b> </br>';

$headers = 'From: seus@gmail.com' . "\r\n" ;
$headers .= 'Reply-To: seus@gmail.com' . "\r\n" ;
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";


mail($to, $subject, $message, $headers);



?>