<?php

session_start();
require_once "../phpquery/dbconnection.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


if (isset($_POST['testings'])) {

$testings = $_POST["testings"];
$presid = $_POST["presid"];
$lab_status = "0";
$patient_status = "1";
$update_status = "0";
$mode = "0";

$cur_date = date('Y-m-d');


// Start transaction
$con->begin_transaction();


// prepared statement prepared once and executed multiple times
$insertStatement = $con->prepare('INSERT INTO testing_schedule (test_id,p_id,pres_id,testing_perform,submit_date,lab_status,patient_status,update_status,payment_status) VALUES ( ?,?, ?, ?, ?,?,?,?,?)');
$insertStatement->bind_param('sssssssss', $test_id,$_SESSION['p_id'],$presid , $testing,$cur_date,$lab_status,$patient_status,$update_status,$mode);


foreach ($testings as $testing) {

  $stmt = $con->prepare("SELECT * FROM testings  WHERE testing_name=? ");
  $stmt->bind_param("s",$testing);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows === 0)  ;
  while($row = $result->fetch_assoc()) {
  
  $test_id= $row['test_id'];
  }
  
  $insertStatement->execute();
}

// Save and end transaction
$con->commit();


$stmt1 = mysqli_prepare($con,"UPDATE prescription SET testing_status =? WHERE pres_id =?");
$presid = $presid;

$testing_status="1";
/* Bind our params */
/* BK: variables must be bound in the same order as the params in your SQL.
 * Some people prefer PDO because it supports named parameter. */
 $stmt1->bind_param('ss', $testing_status,$presid);

/* Set our params */
/* BK: No need to use escaping when using parameters, in fact, you must not, 
 * because you'll get literal '\' characters in your content. */

/* Execute the prepared Statement */
 $status1 = $stmt1->execute();
/* BK: always check whether the execute() succeeded */
 if ($status1 === false) {
   trigger_error($stmt1->error, E_USER_ERROR);
 }
//  printf("%d Row inserted.\n", $stmt1->affected_rows);


//mysqli_stmt_execute($stmt); 
mysqli_stmt_execute($stmt1); 

echo "Saved";

    // }else{

    //     echo "now records";

    // }


  mysqli_stmt_close($stmt1);
    }





    if (isset($_POST['cancel'])) {


    $stmt2 = mysqli_prepare($con,"UPDATE testing_schedule SET payment_status =? WHERE testing_schedule_id =?");
    $payment="0";
    $cancel=$_POST['cancel'];

      /* Bind our params */
      /* BK: variables must be bound in the same order as the params in your SQL.
       * Some people prefer PDO because it supports named parameter. */
       $stmt2->bind_param('ss', $payment,$cancel);
      
      /* Set our params */
      /* BK: No need to use escaping when using parameters, in fact, you must not, 
       * because you'll get literal '\' characters in your content. */
      
      /* Execute the prepared Statement */
       $status2 = $stmt2->execute();
      /* BK: always check whether the execute() succeeded */
       if ($status2 === false) {
         trigger_error($stmt2->error, E_USER_ERROR);
       }
      //  printf("%d Row inserted.\n", $stmt1->affected_rows);
      
      
      //mysqli_stmt_execute($stmt); 
      mysqli_stmt_execute($stmt2); 
      
       
      
          }
      


          if (isset($_POST['pay'])) {


            $stmt3 = mysqli_prepare($con,"UPDATE testing_schedule SET payment_status =? WHERE testing_schedule_id =?");
            $payment="1";
            $pay=$_POST['pay'];
        
              /* Bind our params */
              /* BK: variables must be bound in the same order as the params in your SQL.
               * Some people prefer PDO because it supports named parameter. */
               $stmt3->bind_param('ss', $payment,$pay);
              
              /* Set our params */
              /* BK: No need to use escaping when using parameters, in fact, you must not, 
               * because you'll get literal '\' characters in your content. */
              
              /* Execute the prepared Statement */
               $status3 = $stmt3->execute();
              /* BK: always check whether the execute() succeeded */
               if ($status3 === false) {
                 trigger_error($stmt3->error, E_USER_ERROR);
               }
              //  printf("%d Row inserted.\n", $stmt1->affected_rows);
              
              
              //mysqli_stmt_execute($stmt); 
              mysqli_stmt_execute($stmt3); 
              
               
              
                  }

               
     
                  if (isset($_POST['repay'])) {


                    $stmt4 = mysqli_prepare($con,"UPDATE testing_schedule SET patient_status =?, payment_status=? WHERE testing_schedule_id =?");
                    $patient_status="1";
                    $payment_status="1";

                    $repay=$_POST['repay'];
                
                      /* Bind our params */
                      /* BK: variables must be bound in the same order as the params in your SQL.
                       * Some people prefer PDO because it supports named parameter. */
                       $stmt4->bind_param('sss', $patient_status,$payment_status,$repay);
                      
                      /* Set our params */
                      /* BK: No need to use escaping when using parameters, in fact, you must not, 
                       * because you'll get literal '\' characters in your content. */
                      
                      /* Execute the prepared Statement */
                       $status4 = $stmt4->execute();
                      /* BK: always check whether the execute() succeeded */
                       if ($status4 === false) {
                         trigger_error($stmt4->error, E_USER_ERROR);
                       }
                      //  printf("%d Row inserted.\n", $stmt1->affected_rows);
                      
                      
                      //mysqli_stmt_execute($stmt); 
                      mysqli_stmt_execute($stmt4); 
                      
                       
                      
                          }             


                  

?>

