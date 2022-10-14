
<?php

session_start();
require_once "dbconnection.php";
header('Content-Type: application/json');



if(isset($_POST['doctor_name'])){

$stmt = $con->prepare("SELECT * FROM doctor_specialist WHERE doctor_name = ?  ");
$stmt->bind_param("s",$_POST['doctor_name']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {

  $doctor_name = $row['doctor_name'];
  $user_id = $row['user_id'];
  $specilization = $row['specilization'];


  //  check the time slots whether it is available
  $stmt1 = $con->prepare("SELECT * FROM doctor_schedule WHERE user_id = ?  AND DATE_FORMAT(end_time,'%Y-%m-%d')  = ? ");
  $stmt1->bind_param("ss",$user_id,$_POST['date']);
   $stmt1->execute();
   $result1 = $stmt1->get_result();
   if($result1->num_rows > 0){
     while($row = $result1->fetch_assoc()) {

      $end_times_doctor = date('H:i:s', strtotime($row['end_time']));



    //  check the time slots whether it is available
    $stmt2 = $con->prepare("SELECT * FROM patient_schedule WHERE user_id = ?  AND  DATE_FORMAT(end_time,'%Y-%m-%d')  = ? order by end_time DESC LIMIT 1 ");
    $stmt2->bind_param("ss",$user_id,$_POST['date']);
     $stmt2->execute();
     $result2 = $stmt2->get_result();
     if($result2->num_rows > 0){
       while($row = $result2->fetch_assoc()) {
  
        $end_times_patient = date('H:i:s', strtotime($row['end_time']));

     }
  
    }else{

      $end_times_patient = "Not Registered Patients";


    }

    $end_times_doctor = date('h:i:s a', strtotime($end_times_doctor));
    $end_times_patient = date('h:i:s a', strtotime($end_times_patient));


    $data = [];
    $data["doctor_name"]=$doctor_name;
    $data["specilization"]=$specilization;
    $data["end_times_doctor"]=$end_times_doctor;
    $data["end_times_patient"]=$end_times_patient;
  





}

}else {
    $not = "Doctor Not Available";
    $data["doctor"]=$not;


}




}
}

echo json_encode($data);
}

?>
