<?php

session_start();
require_once "../phpquery/dbconnection.php";

//$testings= $_POST["testings"];
$testings = $_POST["testings"];
$test_id = $_POST["test_id"];
// $lab_status = "1";
// $patient_status = "1";
$test =implode(',',$testings);


$stmt= $con->prepare("UPDATE testing_schedule SET testing_perform =? WHERE testing_schedule_id =?");

//$testing_status="1";
/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */

 $stmt->bind_param('ss',$test , $_POST["test_id"]);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */

/* Execute the prepared Statement */
 $status = $stmt->execute();



/* BK: always check whether the execute() succeeded */
 if ($status === false) {
   trigger_error($stmt->error, E_USER_ERROR);
 }
 printf("%d Row inserted.\n", $stmt->affected_rows);


mysqli_stmt_execute($stmt); 



  mysqli_stmt_close($stmt);


  // mysqli_stmt_close($con);

?>

