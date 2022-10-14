<?php

session_start();

include ('../phpquery/dbconnection.php');
$output='';

$stmt = $con->prepare("SELECT * FROM prescription AS p INNER JOIN  users AS u ON p.user_id=u.user_id  WHERE p_id= ? AND pres_id= ?");
$stmt->bind_param("ss", $_SESSION["p_id"],$_POST['pres']);
$stmt->execute();
$result = $stmt->get_result();
if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {

    $reconsult=$row['reconsult_date'];
    $username= $row['fname'].' '.$row['lname']; 
    $date=$row['date'];
    $aptid=$row['apt_id'];
    $pres_id=$row['pres_id'];
    
    $medRecords = json_decode($row['testing_details'],true);


    if (is_array($medRecords) || is_object($medRecords)) {
         foreach($medRecords as $key => $object) {

           $tests=  $object['testings'];
           if( !($tests=='No need testings')){



                     
$output .=  '

 <br>
<h4><img src="images/icon/db3.png" alt="" /> Some pending testings available on Appointment ID :  '.$aptid.'   </h4>
                                <ul>
                                    <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <div class="sdb-cl-tim">
                                            <div class="sdb-cl-day">
                                                <h5>Prescription Date</h5>
                                                <span>Dr. '. $username.' </span>
                                            </div>
                                            <div class="sdb-cl-class">
                                                <ul>
                                                    <li>
                                                        <div class="sdb-cl-class-tim">
                                                            <span>'.$date.'  </span>
                                                
                                                        </div>
                                                        <div class="sdb-cl-class-name">';
                           
                                                        $i = 0;
                                                        if (is_array($tests) || is_object($tests)){
                                                        foreach($tests as $value){
                                                         $i = uniqid(); 
                                                        // $sqlis = implode(',', $tests);
                                                        $con->begin_transaction();

                                                         $stmt1 = $con->prepare("SELECT * FROM testing_schedule WHERE p_id= ? AND pres_id= ? AND testing_perform NOT IN  ('$value')   ");
                                                         echo $con->error;
                                                         $stmt1->bind_param("ss",$_SESSION["p_id"], $_POST['pres']);
                                                         $stmt1->execute();
                                                         $results = $stmt1->get_result();
                                                         if($results->num_rows > 0){
                                                         while($row = $results->fetch_assoc()) {
                            
                                                    $output .=  '

                                                     <input type="hidden" id="aptid" value="'. $aptid.'  ?>">

                                                     <input type="hidden" id="presid" value="'. $pres_id .'">
                                             

                                                     <h5> '.  $value .'  <span>  
                                                            <input type="checkbox" name="tests" value="'.  $value .' " class="filled-in test" id="filled-in-box-'.$i.'" />
                                                             <label for="filled-in-box-'.$i.'"></label> </span></h5>
                                                            <span class="sdn-hall-na">Check the box</span>   ';
                                                        }} else{
                                                            // echo 'dsds';
                                                        }

                                                        mysqli_stmt_close($stmt1);
                                                    }
                                                    }
                                                    $con->commit();

            $output .=  '          </div>                                                     
                                                    </li>
                                             
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    

                                    <li class="l-info-pack-plac"> <i class="fa fa-calendar" aria-hidden="true"></i>

                                    
                             
                                        
                                        
           
        
                                         
                     <h4>    <span>Recultation Date  : </span>'. $reconsult .'       </h4>


                                        
                                    </li>
                                    
                                </ul>
                                <center>       <div class="row">
                                            <div class="input-field col s12">
                                                <!-- <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="button" id="confirm" class="waves-button-input" value="Confirm"></i> -->
                                                <input type="button" class="btn btn-success submit-btn confirm" name="confirm" value="Confirm" id="confirm'.  $row['pres_id'].' "   data-id=" '. $row['pres_id']  .' " data-id1=" '.  $row['apt_id'] .'  "  onclick="(this.id)" >
                                            </div>                                         
                                        </div>    </center> 
                            ';



                        }else{
                            echo 'No Test prescribed ';
                        
                        
                         }  }}} 
                        }else{
                        
                            echo 'Currently you have not any pending tests. For further, check testing status. ';
                        
                        }
        
                        echo $output;

        ?>