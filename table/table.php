<?php 

session_start();

if(!isset($_SESSION['p_id'])){
header('location:index.php');
}


include ('../phpquery/dbconnection.php');
$output='';

$query="SELECT * FROM appointment as ap INNER JOIN users as u ON ap.user_id=u.user_id AND p_id= '".$_SESSION['p_id']."' ORDER BY apt_id DESC ";

$results =mysqli_query($con,$query);

$output .=  '
<table class="table table-hover" id="myTable">
                                    
<tr>
    <th class="text-center">Appointment ID</th>
    <th class="text-center">Doctor Name</th>
    <th class="text-center">Specialization</th>
   
    
    <th class="text-center">Apt. Date</th>
    <th class="text-center">Apt. Type</th>

    <th class="text-center">Status</th>
    <th class="text-center">Action</th>
</tr>
';

if(mysqli_num_rows($results) > 0){
while($row =mysqli_fetch_array($results) )
{

    $output .='

    <tr>

    <td class="text-center">  '.$row['apt_id'].'  </td>
    <td class="text-center"> '.$row['username'].'</td>
    <td class="text-center"> '.$row['specilization'].'</td>
  

    <td class="text-center">  '.$row['apt_date'].'</td>
    <td class="text-center">  '.$row['type'].'</td>


    <td class="text-center">';

          if($row['admin_status']=="3" && $row['patient_status']=="3") {
            $output .='<span class="label label-default">Pending</span>'; 

          } else if($row['admin_status']=="0" && $row['patient_status']=="3") { 
            $output .='<span class="label label-danger">Cancelled</span>'; 

       } else if($row['admin_status']=="1" && $row['patient_status']=="3") {  
        $output .='<span class="label label-success">Active</span>';

       
        } else if($row['admin_status']=="3" && $row['patient_status']=="0") {   
            $output .='<span class="label label-danger">Cancelled</span>';

           
        } else if($row['admin_status']=="0" && $row['patient_status']=="0") {   
            $output .='<span class="label label-danger">Cancelled</span>';

        } else if($row['admin_status']=="1" && $row['patient_status']=="0") {   
            $output .='<span class="label label-danger">Cancelled</span>';
       
    
        } else if($row['admin_status']=="0" && $row['patient_status']=="3") {   
            $output .='<span class="label label-danger">Cancelled</span>';

        } else if($row['doctor_status']=="1" ) {   
            $output .='<span class="label label-success">Completed</span>';


    } else if($row['admin_status']=="1" && $row['patient_status']=="1") {   
        $output .='<span class="label label-success">Active</span>';

    }
        
         $output .=  '   </td>


         <td class="text-center">';
         if($row['admin_status']=="3" && $row['patient_status']=="3") {  

            $output .=' <button class="ad-st-view rep" apt_id= '.$row['apt_id'].'> Cancel </button>';


          } elseif (($row['admin_status']==1) && ($row['patient_status']==3)){  

            $output .=' <button class="ad-st-view rep" apt_id= '.$row['apt_id'].'> Cancel  </button>';

       } elseif (($row['admin_status']==3) && ($row['patient_status']==0)){  

        $output .='<p> Cancelled by You </p>';
       
       } elseif (($row['admin_status']==0) && ($row['patient_status']==3)){  

        $output .='<p> Cancelled by Admin </p>';
       }
       elseif (($row['admin_status']==1) && ($row['patient_status']==0)){  
        $output .='<p> Cancelled by You </p>';
       }

       elseif (($row['admin_status']==0) && ($row['patient_status']==0)){  
        $output .='<p> Cancelled </p>';
       }
       elseif (($row['doctor_status']==1)){  
        $output .='<p> :-) </p>';
       }

       elseif (($row['admin_status']==1) && ($row['patient_status']==1)){  
        $output .=' <button class="ad-st-view rep" apt_id= '.$row['apt_id'].'> Cancel </button>';
       }

       
       
else {

	// echo "Canceled";
} 
$output .='</td> 

</tr>';

}

} else{

    $output .='
<tr>
<td colspan="9" center> <center> Currently You did not request any appointments :-) </center> </td>
</tr>
';


}

$output .=  '</table>';

echo $output;

?> 