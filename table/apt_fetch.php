<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=hmsproject",$username,$password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  // echo "Connection failed: " . $e->getMessage();
}

$column= array('apt_id','fname','specilization','type','apt_date','admin_status','admin_status');

// $query = "SELECT * FROM appointment as a,users as u WHERE a.user_id= u.user_id";

$query = "SELECT * FROM appointment as ap INNER JOIN users as u ON ap.user_id=u.user_id AND p_id= '".$_SESSION['p_id']."'";


if(isset($_GET["search"]["value"])){

    $query .= '
    AND ( apt_id LIKE "%'.$_GET["search"]["value"].'%"
    OR  fname LIKE "%'.$_GET["search"]["value"].'%"
    OR  specilization LIKE "%'.$_GET["search"]["value"].'%"
    OR  apt_date LIKE "%'.$_GET["search"]["value"].'%"
    OR  type LIKE "%'.$_GET["search"]["value"].'%"
    OR  admin_status LIKE "%'.$_GET["search"]["value"].'%"
    OR  admin_status LIKE "%'.$_GET["search"]["value"].'%"

    )';

}


if(isset($_GET['order']))
{
 $query .= 'ORDER BY '.$column[$_GET['order']['0']['column']].' '.$_GET['order']['0']['dir'].' ';
}
else
{
 $query .= ' ORDER BY ap.apt_date, ap.apt_id DESC ';
}

$query1 = '';

if($_GET["length"] != -1)
{
 $query1 = 'LIMIT ' . $_GET['start'] . ', ' . $_GET['length'];
}





$statement = $conn->prepare($query);


$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $conn->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
    $sub_array =array();
    $sub_array[] =$row["apt_id"];
    $sub_array[] =$row["fname"].' '. $row["lname"] ;
    $sub_array[] =$row["specilization"] ;
    $sub_array[] =$row["type"] ;
    $sub_array[] = $row["apt_date"];

    //  status badth change
         if($row['admin_status']=="3" && $row['patient_status']=="3") {
            $sub_array[] ='<span class="label label-default">Not Attended</span>'; 

          } else if($row['admin_status']=="0" && $row['patient_status']=="3") { 
            $sub_array[] ='<span class="label label-danger">Cancelled</span>'; 

       } else if($row['admin_status']=="1" && $row['patient_status']=="3") {  
        $sub_array[] ='<span class="label label-success">Active</span>';

       
        } else if($row['admin_status']=="3" && $row['patient_status']=="0") {   
            $sub_array[] ='<span class="label label-danger">Cancelled</span>';

           
        } else if($row['admin_status']=="0" && $row['patient_status']=="0") {   
            $sub_array[] ='<span class="label label-danger">Cancelled</span>';

        } else if($row['admin_status']=="1" && $row['patient_status']=="0") {   
            $sub_array[] ='<span class="label label-danger">Cancelled</span>';
       
    
        } else if($row['admin_status']=="0" && $row['patient_status']=="3") {   
            $sub_array[] ='<span class="label label-danger">Cancelled</span>';

        } else if($row['doctor_status']=="1" ) {   
            $sub_array[] ='<span class="label label-success">Completed</span>';


    } else if($row['admin_status']=="1" && $row['patient_status']=="1") {   
        $sub_array[] ='<span class="label label-success">Active</span>';

    }



    if($row['admin_status']=="3" && $row['patient_status']=="3") {  

        // $sub_array[] =' <button class="ad-st-view rep" apt_id= '.$row['apt_id'].'> Cancel </button>';
        // $sub_array[] ='<p> Not Attended </p>';
        $sub_array[] ='<span class="label label-default"> Not Available</span>'; 


      } elseif (($row['admin_status']==1) && ($row['patient_status']==3)){  

        $sub_array[] =' <button class="ad-st-view rep" apt_id= '.$row['apt_id'].'> Cancel  </button>';

   } elseif (($row['admin_status']==3) && ($row['patient_status']==0)){  

    $sub_array[] ='<p> Cancelled by You </p>';
   
   } elseif (($row['admin_status']==0) && ($row['patient_status']==3)){  

    $sub_array[] ='<p> Cancelled by Admin </p>';
   }
   elseif (($row['admin_status']==1) && ($row['patient_status']==0)){  
    $sub_array[] ='<p> Cancelled by You </p>';
   }

   elseif (($row['admin_status']==0) && ($row['patient_status']==0)){  
    // $sub_array[] ='<p> Cancelled </p>';
    $sub_array[] ='<span class="label label-danger"> Not Available</span>'; 

   }
   elseif (($row['doctor_status']==1)){  
    $sub_array[] ='<p> :-) </p>';
   }

   elseif (($row['admin_status']==1) && ($row['patient_status']==1)){  
    $sub_array[] =' <button class="ad-st-view rep" apt_id= '.$row['apt_id'].' apt_date= '.$row['apt_date'].' user_id= '.$row['user_id'].' p_id= '.$row['p_id'].' no= '.$row['No'].'> Cancel </button>';
   }


$data[]=$sub_array;
}

function count_all_data($conn)
{
    $query = "SELECT * FROM appointment as ap INNER JOIN users as u ON ap.user_id=u.user_id AND p_id= '".$_SESSION['p_id']."'";
    $statement = $conn->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_GET["draw"]),
 "recordsTotal"   =>  count_all_data($conn),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);


?>  