<?php

       // Initialize the session
 
       session_start();

       
       date_default_timezone_set('Asia/Colombo');
       
       include ('phpquery/dbconnection.php');
  

       if (isset($_POST['doctorname'])) {

         $doctorname=$_POST["doctorname"];
         $doctorspecilization=$_POST["doctorspecilization"];
         $date=$_POST["date"];

          $type=$_POST["type"];

          $cur_date = date('Y-m-d H:i:s', time());
          $cur_date = strtotime($cur_date);
          $cur_date = date('Y-m-d H:i:s', $cur_date); 


//  get the user id from the db
$stmt = $con->prepare("SELECT * FROM doctor_specialist WHERE doctor_name = ? ");
$stmt->bind_param("s",$_POST["doctorname"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
while($row = $result->fetch_assoc()) {

$user_id = $row['user_id'];

}}

   //  get the user id and date from the db
   $stmt1 = $con->prepare("SELECT * FROM doctor_schedule WHERE user_id = ? AND DATE_FORMAT(end_time,'%Y-%m-%d') = ? ");
   $stmt1->bind_param("ss",$user_id,$date);
   $stmt1->execute();
   $result1 = $stmt1->get_result();
   if($result1->num_rows > 0){
   while($row = $result1->fetch_assoc()) {
   
    $end_time = date('Y-m-d H:i:s', strtotime($row['end_time']));

    if($end_time > $cur_date) { 

      header("Location:phpquery/add_appointment.php?doctorname=$doctorname&doctorspecilization=$doctorspecilization&date=$date&type=$type"); 

   }else{

      echo 'Time Expired';


   }
 
        
        } 


      }else{

         echo 'This doctor does not available at this moment';
   
   
      }

   }
?>