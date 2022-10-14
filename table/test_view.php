<?php 

session_start();

if(!isset($_SESSION['p_id'])){
header('location:index.php');
}




include ('../phpquery/dbconnection.php');
$pres=$_POST['pres'];

$output='';

$query="SELECT * FROM testing_schedule WHERE pres_id= '".$pres."' AND p_id= '".$_SESSION['p_id']."' ORDER BY pres_id DESC ";
$results =mysqli_query($con,$query);

$output .=  '
<table class="table table-hover">
                                    
<tr>
    <th class="text-center">Test Name</th>
    <th class="text-center">Test Status</th>
    <th class="text-center">Action</th>
    <th class="text-center">Payment Status</th>

</tr>
';

if(mysqli_num_rows($results) > 0){
while($row =mysqli_fetch_array($results) )
{

    $output .='

    <tr>


  

    <td class="text-center">  '.$row['testing_perform'].'</td>

        



    




    <td class="text-center">';




    if($row['patient_status']=='1' ){      

            $output .='<span class="label label-success">Actived</span>'; 
    }

    elseif($row['patient_status']=='0'){      

        $output .='<span class="label label-danger">Cancelled</span>'; 
}

    elseif($row['patient_status']=='3'){      

        $output .='<span class="label label-success">Actived</span>'; 
    }






            
            $output .='</td>';

            
            $output .='  <td class="text-center">';
 
            if($row['patient_status']=='3' ||  $row['lab_status']=='1'){      
                $output .='<span class="label label-success">Completed</span>';
            }
            
            elseif($row['patient_status']=='1'){      
            $output .='<a href="" id="rep" data-toggle="modal" data-target="#edit"
            class="ad-st-view" data_id= '.$row['testing_schedule_id'].'>Drop Test</a>';

        }
        elseif($row['patient_status']=='0'){      
            $output .='<a href="" id="rep1" data-toggle="modal" data-target="#edit1"
            class="label label-success" data_id= '.$row['testing_schedule_id'].'>Active Test</a>';

        }


$output .='</td> 



<td class="text-center">';

if($row['payment_status']=='1'){

$output .='

<a href="" id="rep5" data-toggle="modal" data-target="#edit5"
class="label label-success" data_id= '.$row['testing_schedule_id'].'>Paid Now </a>';

}

elseif($row['payment_status']=='3'){

    $output .='
    
    <a href="" id="rep7" data-toggle="modal" data-target="#edit7"
    class="label label-default" data_id= '.$row['testing_schedule_id'].'> Cancelled </a>';
    
    }

    elseif($row['payment_status']=='2'){

        $output .='<span class="label label-success">Paid</span>';

        
        }

elseif($row['payment_status']=='0'){

    $output .='
    
    <a href="" id="rep6" data-toggle="modal" data-target="#edit6"
    class="label label-danger" data_id= '.$row['testing_schedule_id'].'> Paid later </a>';
    
    }



$output .='

</td>



</tr>';

}

} else{

    $output .='
<tr>
<td colspan="9" center> <center> Does not any tests needed :-) </center> </td>
</tr>
';


}

$output .=  '</table>';

echo $output;



?> 