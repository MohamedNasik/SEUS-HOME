<?php

        // Initialize the session
         session_start();


$connect = new PDO('mysql:host=localhost;dbname=hmsproject', 'root', '');

$data = array();

$query = "SELECT * FROM patient_schedule WHERE p_id='".$_SESSION['p_id']."' ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{

$sql = "SELECT * FROM doctor_specialist WHERE user_id='".$row["user_id"]."' ";
$statement1 = $connect->prepare($sql);
$statement1->execute();
$result1 = $statement1->fetchAll();

foreach($result1 as $rows)
{
    $title =   $rows["doctor_name"]   .' (' . $rows["specilization"].')' ;

   $data[] = array(
      'id'   => $row["id"],
      'title'   => $title,
      'start'  => $row['start_time'],
      'end'  => $row['end_time'],
      'backgroundColor'  => $row['color'],
      'textColor'  => $row['text_color']
   );
}
}

echo json_encode($data);

?>