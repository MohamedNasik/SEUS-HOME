<?php
 
session_start();

// Include config file




require_once "dbconnection.php";

if (isset($_GET['doctorname'])) {

  $doctor_name=$_GET["doctorname"];
  $specilization=$_GET["doctorspecilization"];
  $date=$_GET["date"];
   $patient_id= $_SESSION['p_id'];
   $patient_name= $_SESSION['username'];
   $patient_status="1";
   $admin_status="1";
   $doctor_status="3";
   $type=$_GET["type"];

   $stmt7 = $con->prepare("SELECT * FROM patients WHERE p_id = ? ");
   $stmt7->bind_param("s",$patient_id);
   $stmt7->execute();
   $result7 = $stmt7->get_result();
   if($result7->num_rows > 0){
     while($row = $result7->fetch_assoc()) {

      $email = $row['email'];

   }

  }




//  get the user id from the db
   $stmt = $con->prepare("SELECT * FROM doctor_specialist WHERE doctor_name = ? ");
   $stmt->bind_param("s",$doctor_name);
   $stmt->execute();
   $result = $stmt->get_result();
   if($result->num_rows > 0){
   while($row = $result->fetch_assoc()) {
   
   $user_id = $row['user_id'];





  //  check the time slots whether it is available
  $stmt9 = $con->prepare("SELECT * FROM doctor_schedule WHERE user_id = ?  AND DATE_FORMAT(end_time,'%Y-%m-%d')  = ? ");
  $stmt9->bind_param("ss",$user_id,$date);
   $stmt9->execute();
   $result9 = $stmt9->get_result();
   if($result9->num_rows > 0){
     while($row = $result9->fetch_assoc()) {

      $end_times_doctor = date('Y-m-d  H:i:s', strtotime($row['end_time']));
      $end_times_doctors = date('H:i:s', strtotime($row['end_time']));

   }

  }
  
  //  check the time slots whether it is available
  $stmt10 = $con->prepare("SELECT * FROM patient_schedule WHERE user_id = ?  AND  DATE_FORMAT(end_time,'%Y-%m-%d')  = ? order by end_time DESC LIMIT 1 ");
  $stmt10->bind_param("ss",$user_id,$date);
   $stmt10->execute();
   $result10 = $stmt10->get_result();
   if($result10->num_rows > 0){ 
     while($row = $result10->fetch_assoc()) {

      $end_times_patient = date('Y-m-d  H:i:s', strtotime($row['end_time']));
      $end_times_patients = date('H:i:s', strtotime($row['end_time']));
      $time_interval = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($row['end_time'])));

    }

    $diff = strtotime($end_times_doctors) - strtotime($end_times_patients);
    // $time = date('H:i:s', $diff);
    $times = $diff /60;

   if ($times <= 14 ) {
    echo 'Time passed';                                                                                                                                                                                    }else{   include 'add.php';  }
   } else {
                                                                     
// function call() {

   //  get the user id and date from the db
   $stmt1 = $con->prepare("SELECT * FROM doctor_schedule WHERE user_id = ? AND DATE_FORMAT(start_time,'%Y-%m-%d')  = ? ");
   $stmt1->bind_param("ss",$user_id,$date);
   $stmt1->execute();
   $result1 = $stmt1->get_result();
   if($result1->num_rows > 0){
   while($row = $result1->fetch_assoc()) {
   
    $startDate = date('Y-m-d', strtotime($row['start_time']));
    $starts = date('Y-m-d  H:i:s', strtotime($row['start_time']));

    $start_time = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($row['start_time'])));

    $stmt8 = $con->prepare("SELECT * FROM appointment WHERE user_id = ? AND p_id= ? AND apt_date=? AND patient_status= '1'");
    $stmt8->bind_param("sss",$user_id,$patient_id,$date);
    $stmt8->execute();
    $result8 = $stmt8->get_result();
    if($result8->num_rows > 0){
   
    echo 'You have already requested for this date with doctor';

    } else{


  if($startDate ==  $date) {  

    $stmt11 = $con->prepare("SELECT count(patient_status) AS patient_status FROM appointment WHERE user_id = ? AND apt_date=? AND patient_status = '0' ");
    $stmt11->bind_param("ss",$user_id,$date);
    $stmt11->execute();
    $result11 = $stmt11->get_result();
    if($result11->num_rows > 0){
      while($row = $result11->fetch_assoc()) {
    
        $rowss= $row['patient_status'];


        $sql= mysqli_query($con,"SELECT * FROM appointment WHERE user_id = '".$user_id."' AND  apt_date= '".$date ."' "); 
        $num_rows=mysqli_num_rows($sql);

    }
  }




$stmt2 = $con->prepare("SELECT * FROM appointment WHERE user_id = ? AND apt_date=? AND ($num_rows !=  $rowss)");
$stmt2->bind_param("ss",$user_id,$date);
$stmt2->execute();
$result2 = $stmt2->get_result();
if($result2->num_rows > 0){
  while($row = $result2->fetch_assoc()) {

}

$stmt3 = $con->prepare("SELECT * FROM patient_schedule WHERE user_id= ? AND DATE_FORMAT(end_time,'%Y-%m-%d')  = ? order by end_time DESC LIMIT 1");
$stmt3->bind_param("ss",$user_id,$date);
$stmt3->execute();
$result3 = $stmt3->get_result();
if($result3->num_rows > 0){
  while($row = $result3->fetch_assoc()) {

    $startings= $row['end_time'];
    $time_interval = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($row['end_time'])));
   

    $stmt222 = $con->prepare("SELECT apt_id FROM appointment WHERE user_id = ? AND apt_date=? ORDER BY apt_id DESC LIMIT 1");
    $stmt222->bind_param("ss",$user_id,$date);
    $stmt222->execute();
    $result222 = $stmt222->get_result();
    if($result222->num_rows > 0){
      while($row = $result222->fetch_assoc()) {
        $aptid= $row["apt_id"];
    
    

      }}

      // ADDING APPOINTMENT with there awere some appointments available
    $apt_id=$aptid+ 1;
  
    $sql= "INSERT INTO appointment (apt_id,specilization,user_id,p_id,patient_name,apt_date,type,patient_status,admin_status,doctor_status) 
    VALUES ('". $apt_id."','". $specilization."','". $user_id."','". $patient_id."','". $_SESSION['username']."',  '". $date."','". $type."','". $patient_status."','". $admin_status."','". $doctor_status."')  ";
    

    if(mysqli_query($con,$sql) ){

    }
    else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    $color= '#6453e9';
    $text= '##ffffff';
    

    $sqli= "INSERT INTO patient_schedule (apt_id,user_id,p_id,start_time,end_time,color,text_color) 
    VALUES ('". $apt_id."','". $user_id."','". $patient_id."',  '".  $startings ."','". $time_interval."','". $color."','". $text."')  ";
    
    if(mysqli_query($con,$sqli) ){
      echo'Admin added succesfully!!';
  
    }
    else {
      echo "ERROR: Could not able to execute $sqli. " . mysqli_error($con);
    }

}

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

$stmt2->close();
$stmt3->close();

// echo 'yes';

    }else {

// ADDING APPOINTMENT with there are no appointments available

      $apt_id="1";

      $stmt13 = $con->prepare("SELECT * FROM doctor_schedule WHERE user_id = ? AND DATE_FORMAT(start_time,'%Y-%m-%d')  = ? ");
      $stmt13->bind_param("ss",$user_id,$date);
      $stmt13->execute();
      $result14 = $stmt13->get_result();
      if($result14->num_rows > 0){
      while($row = $result14->fetch_assoc()) {
      
        $time_interval = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($row['start_time'])));
   
      $sql= "INSERT INTO appointment (apt_id,specilization,user_id,p_id,patient_name,apt_date,type,patient_status,admin_status,doctor_status) 
      VALUES ('". $apt_id."','". $specilization."','". $user_id."','". $patient_id."','". $_SESSION['username']."',  '". $date."','". $type."','". $patient_status."','". $admin_status."','". $doctor_status."')  ";
      

      if(mysqli_query($con,$sql) ){
       

      }
      else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
      }

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
     
    }}
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
   

    }


    }else{

      echo 'This Doctor does not available in this time';

    }



    
}

   }



}else{

  echo 'This doctor does not available at this moment';
}

  //  }



   
  }

// 

   }}


  }





 ?>
