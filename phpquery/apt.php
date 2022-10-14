<?php
require_once 'dbconnection.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['data_id'])) {

    $id=$_POST['data_id'];
    $apt_date=$_POST['apt_date'];
    $user_id=$_POST['user_id'];
    $p_id=$_POST['p_id'];

    date_default_timezone_set('Asia/Colombo');

    $cur_date = date('Y-m-d H:i:s', time());
    $cur_date = strtotime($cur_date);
    $cur_date = date('Y-m-d H:i:s', $cur_date); 
   


    $stmts = $con->prepare("SELECT * FROM doctor_schedule WHERE DATE_FORMAT(start_time,'%Y-%m-%d')  = ? AND user_id=? ");
    $stmts->bind_param("ss",$_POST['apt_date'],$_POST['user_id']);
    $stmts->execute();
    $resultss = $stmts->get_result();
    if($resultss->num_rows > 0){
      while($row = $resultss->fetch_assoc()) {
    
        $start_times_doctor = date('Y-m-d H:i:s', strtotime($row['start_time']));
      }}

      if($start_times_doctor > $cur_date ){

//  search patient schedule
$stmt = $con->prepare("SELECT * FROM patient_schedule WHERE apt_id=? AND DATE_FORMAT(start_time,'%Y-%m-%d')  = ? AND user_id=? AND p_id=? ");
$stmt->bind_param("ssss",$_POST['data_id'],$_POST['apt_date'],$_POST['user_id'],$_POST['p_id']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) ;
while($row = $result->fetch_assoc()) {

$event_id = $row['id'];

$stmt2 = $con->prepare("SELECT * FROM patient_schedule WHERE DATE_FORMAT(start_time,'%Y-%m-%d')  = ? AND user_id=?  AND id > ?");
$stmt2->bind_param("sss",$_POST['apt_date'],$_POST['user_id'],$event_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
if($result2->num_rows > 0){
 while($row = $result2->fetch_assoc()) {

  $schid=  $row['id'];
  $apt_ids=  $row['apt_id'];
  $apt_ids= $apt_ids - 1;



  $start_time_patient = date('Y-m-d H:i:s',strtotime('-15 minutes',strtotime($row['start_time'])));
  $end_times_patient = date('Y-m-d H:i:s',strtotime('-15 minutes',strtotime($row['end_time'])));

  // $status3= mysqli_query($con, " UPDATE patient_schedule SET start_time ='$start_time_patient' ,end_time= '$end_times_patient' WHERE id = '$schid' ") ;
  
//  update
 $stmt3 = mysqli_prepare($con,"UPDATE patient_schedule SET start_time =? ,end_time=?, apt_id=? WHERE id =?");

/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
  $stmt3->bind_param('ssss', $start_time_patient,$end_times_patient,$apt_ids,$schid);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */

/* Execute the prepared Statement */
  $status3 = $stmt3->execute();
/* BK: always check whether the execute() succeeded */



}

//  search patient appointment
$stmt4 = $con->prepare("SELECT * FROM appointment WHERE  apt_date  = ? AND user_id=? AND  apt_id > ? ");
$stmt4->bind_param("sss",$_POST['apt_date'],$_POST['user_id'],$_POST['data_id']);
$stmt4->execute();
$result4 = $stmt4->get_result();
if($result4->num_rows > 0){
  while($row = $result4->fetch_assoc()) {    

    $aptid=  $row['apt_id'];
    $aptid= $aptid - 1;
    $no = $row['No'];

//  update patient appointment
$stmt5 = mysqli_prepare($con,"UPDATE appointment SET apt_id =? WHERE No =?");

$stmt5->bind_param('ss', $aptid, $no);

$status5 = $stmt5->execute();

$stmt16 = mysqli_prepare($con,"UPDATE opd_payments SET apt_id =? WHERE No =?");
$stmt16->bind_param('ss', $aptid, $no);
$stmt16->execute();



  }


}



if ($status3 === true) {

    echo "Records was updated successfully."; 
     
    }

    $stmt2 = $con->prepare("UPDATE appointment SET apt_id =?, admin_status=?, patient_status=? WHERE No =? ");
    $apt_id="0";
    $admin_status="0";
    $patient_status="0";
  
    $stmt2->bind_param("iiii",$apt_id, $admin_status, $patient_status,$_POST['no']);
    $status5 = $stmt2->execute();
  
// delete patient schedule
  $stmt = $con->prepare("DELETE FROM patient_schedule WHERE id = ?");
  $stmt->bind_param("i",$event_id);
  $stmt->execute();

  //  update patient OPD
  $stmt6 = $con->prepare("UPDATE opd_payments SET apt_id =? WHERE No =?");
  $apt_id="0";
  $stmt6->bind_param('ss',$apt_id, $_POST['no']);
  $stmt6->execute();
   


 
}else{


  $stmt2 = $con->prepare("UPDATE appointment SET apt_id =?, admin_status=?, patient_status=? WHERE No =? ");
  $apt_id="0";
  $admin_status="0";
  $patient_status="0";

  $stmt2->bind_param("iiii",$apt_id, $admin_status, $patient_status,$_POST['no']);
  $status5 = $stmt2->execute();

  // delete patient schedule
  $stmt = $con->prepare("DELETE FROM patient_schedule WHERE id = ?");
  $stmt->bind_param("i",$event_id);
  $stmt->execute();
  echo "Records was updated successfully."; 

  //  update patient OPD
  $stmt6 = $con->prepare("UPDATE opd_payments SET apt_id =? WHERE No =?");
  $apt_id="0";
  $stmt6->bind_param('ss',$apt_id, $_POST['no']);
  $stmt6->execute();
   


}

 }


//  
}else{

//  search patient schedule
$stmt = $con->prepare("SELECT * FROM patient_schedule WHERE apt_id=? AND DATE_FORMAT(start_time,'%Y-%m-%d')  = ? AND user_id=? AND p_id=? ");
$stmt->bind_param("ssss",$_POST['data_id'],$_POST['apt_date'],$_POST['user_id'],$_POST['p_id']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) ;
while($row = $result->fetch_assoc()) {

$event_id = $row['id'];

$stmt2 = $con->prepare("SELECT * FROM patient_schedule WHERE DATE_FORMAT(start_time,'%Y-%m-%d')  = ? AND user_id=?  AND id > ?");
$stmt2->bind_param("sss",$_POST['apt_date'],$_POST['user_id'],$event_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
if($result2->num_rows > 0){
 while($row = $result2->fetch_assoc()) {

  $schid=  $row['id'];

  $start_time_patient = date('Y-m-d H:i:s',strtotime('-15 minutes',strtotime($row['start_time'])));
  $end_times_patient = date('Y-m-d H:i:s',strtotime('-15 minutes',strtotime($row['end_time'])));

  
//  update
 $stmt3 = mysqli_prepare($con,"UPDATE patient_schedule SET start_time =? ,end_time=? WHERE id =?");

/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
  $stmt3->bind_param('sss', $start_time_patient,$end_times_patient,$schid);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */

/* Execute the prepared Statement */
  $status3 = $stmt3->execute();
/* BK: always check whether the execute() succeeded */

}


//  update patient appointment
$stmt5 = mysqli_prepare($con,"UPDATE appointment SET admin_status =?, patient_status=? WHERE No =?");
$admin_status="0";
$patient_status="0";
$stmt5->bind_param('sss',$admin_status, $patient_status, $_POST['no']);
$status5 = $stmt5->execute();

// delete patient schedule
$stmt = $con->prepare("DELETE FROM patient_schedule WHERE id = ?");
$stmt->bind_param("i",$event_id);
$stmt->execute();

if ($status5 === true && $status3 === true) {

  echo "Records was updated successfully."; 
   
  }


}else{

  
//  update patient appointment
$stmt2 = mysqli_prepare($con,"UPDATE appointment SET admin_status =?, patient_status=? WHERE No =?");
$admin_status="0";
$patient_status="0";
$stmt2->bind_param('sss',$admin_status, $patient_status, $_POST['no']);
$status2 = $stmt2->execute();

  // delete patient schedule
  $stmt = $con->prepare("DELETE FROM patient_schedule WHERE id = ?");
  $stmt->bind_param("i",$event_id);
  $stmt->execute();
  echo "Records was updated successfully."; 


}


}  // end while

}


$con->close(); 


}
?> 