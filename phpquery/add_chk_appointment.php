
<?php
 

session_start();


// Include config file
require_once "dbconnection.php";
require_once '../vendor/autoload.php';

if (isset($_POST['doctorname'])) {

  // $options = array(
  //   'cluster' => 'ap2',
  //   'useTLS' => true
  // );
  // $pusher = new Pusher\Pusher(
  //   '27c56afd7ee8299ee997',
  //   'e7b285158037dc2c9e87',
  //   '956718',
  //   $options
  // );


  $doctor_name=$_POST["doctorname"];
  $doctorspecilization=$_POST["doctorspecilization"];
  $date=$_POST["date"];
   $patient_id= $_SESSION['p_id'];
   $patient_name= $_SESSION['username'];
   $patient_status="3";
   $admin_status="3";
   $doctor_status="3";
   $type="Meet Consultant";

    $fees="500";



   $query = "SELECT * FROM schedule WHERE username = '$doctor_name'";
   if($result = mysqli_query($con,$query));
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        
     $doctor_id=$row['user_id'];
     $doctor_name= $row['username'];
  
     $time= "5.pm";


 
  $sql= "INSERT INTO appointment (specilization,user_id,doctor_name,p_id,patient_name,fees,apt_date,apt_time,type,patient_status,admin_status,doctor_status) 
  VALUES ('". $doctorspecilization."','". $doctor_id."','". $doctor_name."','". $patient_id."','". $patient_name."',  '". $fees."','". $date."','". $time."','". $type."','". $patient_status."','". $admin_status."','". $doctor_status."')  ";
  
  if(mysqli_query($con,$sql) ){

    $data['message'] = $doctor_name .' '.$doctorspecilization . ' '. $date . ' ' .$patient_id . ' ' .$patient_name . ' '. $patient_status. ' ' .$admin_status . ' '. $doctor_status ;
    $pusher->trigger('my-channel', 'my-event', $data);
    
    echo'<center>Successfully Delivered.<br> Pleaes wait for administration reply</center>';
    
    // return $type;


  }
  else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }

}

mysqli_free_result($result);

} 
else{
  echo  " <center> These types of users not available. </center>";
}

// Close connection
mysqli_close($con);
exit();
  }

// ?>

<script>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>


</script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('27c56afd7ee8299ee997', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>