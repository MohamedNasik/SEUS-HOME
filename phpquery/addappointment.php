
<?php
 
 session_start();
 
 // Include config file
 require_once "dbconnection.php";
 
 if (isset($_POST['doctorname'])) {
 
   $doctor_name=$_POST["doctorname"];
   $doctorspecilization=$_POST["doctorspecilization"];
   $date=$_POST["date"];
    $patient_id= $_SESSION['p_id'];
    $patient_name= $_SESSION['username'];
    $patient_status="3";
    $admin_status="3";
    $doctor_status="3";
    $type=$_POST["type"];
 
 //  get the user id from the db
    $stmt = $con->prepare("SELECT * FROM doctor_specialist WHERE username = ? ");
    $stmt->bind_param("s",$doctor_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    
    $user_id = $row['user_id'];
  
    //  get the user id and date from the db
    $stmt1 = $con->prepare("SELECT * FROM doctor_schedule WHERE user_id = ? ");
    $stmt1->bind_param("s",$user_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    if($result1->num_rows > 0){
    while($row = $result1->fetch_assoc()) {
    
 
     $startDate = date('Y-m-d', strtotime($row['start_time']));
 
     $start_time = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($row['start_time'])));
 
     // $start_time =  date('Y-m-d H:i:s', strtotime(str_replace('-','/',"+30 minutes",$starttime ))); // => 2013-02-16
 
     if($startDate ==  $date ) {  
 
 
   //  add appointment
    if($stmt2 = mysqli_prepare($con,"INSERT INTO appointment  (specilization,user_id,p_id,patient_name,apt_date,type,patient_status,admin_status,doctor_status) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?)")){
 
        mysqli_stmt_bind_param($stmt2, "sssssssss",$doctorspecilization,$user_id,$patient_id,$patient_name,$date,$type, $patient_status, $admin_status, $doctor_status);
 
        echo'<center>Successfully Delivered.<br> Pleaes wait for administration reply</center>';
   
      mysqli_stmt_execute($stmt2);
 
 } else{
 
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
 
 }
 
 
 
 
 
 
 
 
     }else{
 
       echo 'This Doctor does not available in this time. Check the schedule !!';
 
     }
 
 
 }
 
 
 }else{
 
   echo 'This doctor does not available at this moment !!';
 }
 
 }
 }
 
 
 
 
 
   }
 
  ?>
 