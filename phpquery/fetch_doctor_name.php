

<?php
include('dbconnection.php');
$output='';
$sql="SELECT * from doctor_specialist where specilization='".$_POST['doc_spec_id']."'";
$result=mysqli_query($con,$sql);
$output='<option value="">Select Doctor</option>';
while($row=mysqli_fetch_array($result)){

  $output.='<option value="'.$row["doctor_name"].'">'.$row["doctor_name"].'</option>';
}
echo $output;
?>


