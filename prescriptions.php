<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
         session_start();

         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

        ?>

<!-- Head Part -->

<!-- Data table css -->
<link href="ajax/new datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

<?php include ('headers/headpart.php');  ?>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="index-2.html" class="logo"><img src="images/logo12.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
            <li></li>

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
                        <li class="active-bre"><a href="admin.php"> Based on past Visit</a>
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
                                    <h4>Appointment Details</h4>
                                    <!-- <p>All about courses, program structure, fees, best course lists (ranking), syllabus, teaching techniques and other details.</p> -->
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover" id="myTable">
                                            <thead>


                                            
                                                <tr>
                                                  
                                                    <th>Apt.ID</th>
													<th>Doctor Name</th>
                                                    <th>Specilization</th>
													<th>Apt.Date</th>
													<th>Status</th>
													<th>View</th>
                                                </tr>



                                            </thead>
                                            <tbody>

                                            <?php 
require_once 'phpquery/dbconnection.php';

$sqli = "SELECT * FROM appointment as ap INNER JOIN users as u ON ap.user_id=u.user_id AND p_id= '".$_SESSION['p_id']."' AND doctor_status='1' AND type='Check Report' ORDER BY apt_id DESC ";
if($result = mysqli_query($con, $sqli)){
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        $aptid= $row['apt_id']; 
        $username= $row["fname"].' '. $row["lname"] ;
        $specilization= $row['specilization']; 

?>

                                                <tr>
                                                 
                                                    <td><a href="admin-course-details.html"><span class="list-enq-name"><?php  echo $row['apt_id'];   ?></span></a>
                                                    </td>
                                                    <td><?php  echo $row["fname"].' '. $row["lname"] ;   ?></td>
                                                    <td><?php  echo $row['specilization'];   ?></td>
                                                    <td><?php  echo $row['apt_date'];   ?></td>
                                              
													
                                                    <td>
                                                        <span class="label label-success">Completed</span>
                                                    </td>
													<td><a href="second.php?aptid=<?php  echo base64_encode($row['apt_id']);   ?>& doctor_name=<?php  echo base64_encode($row["fname"].' '. $row["lname"]) ; ?>& specilization=<?php  echo base64_encode($row['specilization']); ?>&apt_date=<?php  echo base64_encode($row['apt_date']); ?> &user=<?php  echo base64_encode($row['user_id']); ?>  " class="ad-st-view">View Prescription</a></td>
                                                </tr>
                                                <?php  } }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    $('#myTable').DataTable();
} );



</script>



</body>


</html>