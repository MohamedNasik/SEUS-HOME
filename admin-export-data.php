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
                        <li class="active-bre"><a href="#"> Tests Settings</a>
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
                                    <h4>Adjust your Testings</h4>
                                    <!-- <p>All about courses, program structure, fees, best course lists (ranking), syllabus, teaching techniques and other details.</p> -->
                                </div>
                          
                                <div class="ed-about-sec1">
                        <div class="ed-advan">
                            <ul>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/a.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>You missed the tests?</h4>
                                        <p>Just click the view button to view all the tests you have missed.</p>
                                      <br>  <a href="edit_tests.php">View</a>
                                    </div>
                                </li>

                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/a.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Edit your tests?</h4>
                                        <p>Click view button to adjest your payment details, active or drop the tests.</p>
                                        <a href="admin-event-all.php">View</a>
                                    </div>
                                </li>

                                </ul>



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