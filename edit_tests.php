<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
    
         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

        ?>
<!-- Data table css -->
<link href="ajax/new datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />


<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
               <a href="#" class="logo"><img src="images/logo12.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <!-- <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form> -->
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <!-- <a class='waves-effect btn-noti' href="admin-all-enquiry.html" title="all enquiry messages"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.html" title="course booking messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.html" title="admission enquiry"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a> -->
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="images/users.jpg" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="admin-panel-setting.php" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="phpquery/logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php    include ('adminheader.php');  ?>


            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                    <li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Missed Tests</a>
                        </li>
                        <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>


                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>View Tests per Appointment ID</h4>
                                    <!-- <p>All about courses, program structure, fees, best course lists (ranking), syllabus, teaching techniques and other details.</p> -->
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover" id="my">
                                            <thead>                                           
                                                <tr>                                                
                                                    <th>Apt.ID</th>
													<th>Doctor Name</th>
                                                    <th>Specilization</th>
													<th>Apt.Date</th>
                                                    <th>Recons.Date</th>
													<th>Edit</th>

                                                </tr>



                                            </thead>
                                            <tbody>

                                            <?php 
require_once 'phpquery/dbconnection.php';

$sqli = "SELECT * FROM prescription as p INNER JOIN users as u ON p.user_id=u.user_id AND p.p_id= '".$_SESSION['p_id']."' INNER join doctor_specialist as ds ON ds.user_id=u.user_id ORDER BY p.pres_id DESC ";
if($result = mysqli_query($con, $sqli)){
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        $aptid= $row['apt_id']; 
        $username= $row['fname'].' '.$row['lname']; 
        $specilization= $row['specilization']; 
        $pres_id= $row['pres_id']; 
        $user_id= $row['user_id']; 

   $date=   date('dS F Y', strtotime($row['date']));
   $reconsultion_date=   date('dS F Y', strtotime($row['reconsult_date']));
   $medRecords = json_decode($row['testing_details'],true);

   if (is_array($medRecords) || is_object($medRecords)) {
    foreach($medRecords as $key => $object) {

      $tests=  $object['testings'];
   
             $sqlss = "SELECT count(*) pres_id  FROM testing_schedule WHERE p_id= '".$_SESSION["p_id"]."' AND pres_id= '". $pres_id."' GROUP BY pres_id";
              $resultss = mysqli_query($con, $sqlss);
                if(mysqli_num_rows($resultss) > 0){
                    while($row = mysqli_fetch_assoc($resultss)) {

                        $count= $row["pres_id"];

                        // echo $count;            


               
             // $resultss = mysqli_query( $con,$sqlss) or trigger_error(mysqli_error($con));
            // $num_rows = mysqli_num_rows($resultss);
            

            // $sql= mysqli_query($con,"SELECT count(pres_id)  FROM testing_schedule WHERE p_id= '".$_SESSION['p_id']."'  AND pres_id= '".$pres_id."' AND testing_perform NOT IN  ('$value') GROUP BY pres_id"); 
            // $stmt1 = $con->prepare("SELECT count(*) pres_id  FROM testing_schedule WHERE p_id= ? AND pres_id= ? GROUP BY pres_id");
            // echo $con->error;
            // $stmt1->bind_param("ss",$_SESSION["p_id"], $presid);
            // $stmt1->execute();
            // $results = $stmt1->get_result();
        
        
            // // $count= $row["pres_id"];
            //     $count= $row["pres_id"];

            //             echo $count; 



//    $count=  count(array($tests));


      if( ($tests=='No need testings' )){

      }elseif( (!($tests=='No need testings') && ( count($tests) != $count ) )){
        // echo 'Total number of elements in the $days array is - ' . count($tests);

        
?>

                                                <tr>
                                                 
                                                    <td><a href="admin-course-details.html"><span class="list-enq-name"><?php  echo $aptid;   ?></span></a>
                                                    </td>
                                                    <td><?php  echo  $username; ?></td>
                                                    <td><?php  echo $specilization;   ?></td>
                                                    <td><?php  echo $date;   ?></td>
                                                    <td><?php  echo $reconsultion_date  ?></td>

													
                                                    <td><a href="admin-event-edit.php?pres_id=<?php  echo $pres_id;   ?>&user_id=<?php echo $user_id ?>" class="ad-st-view">Edit</a></td>

                                                </tr>
                                                <?php }
                                                 }
                                                }
                                            
                                            }} } }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!--== User Details ==-->
              
            </div>

        </div>
    </div>

    <!--Import jQuery librar.js-->

    <?php   include ('headers/headfoot.php');?>
	<!-- Data tables -->
	<script src="ajax/new datatable/jquery.dataTables.min.js"></script>
	<script src="ajax/new datatable/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready( function () {
    $('#my').DataTable();
} );



</script>





</body>

</html>