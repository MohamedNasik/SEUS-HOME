<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
    
         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }
        ?>
        <link rel="stylesheet" type="text/css" href="ajax/table/datatables.bootstrap.min.css"/>


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
                <a href="index-2.html" class="logo"><img src="images/logo12.png" alt="" />
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
                        <li class="active-bre"><a href="#"> Test Select</a>
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
                            <div class="col-md-6">
							<div class="ed-rese-grid ed-rese-grid-mar-bot-30">
								<div class="ed-rsear-img">
									<img src="images/course/sm-6.jpg" alt="">
								</div>
								<div class="ed-rsear-dec">
									<h4><a href="urine.php">Urine</a></h4>
									<a href="#">Full <span>Report</span></a>
									<!-- <a href="#">Duration <span>120 Days</span></a> -->
									<!-- <div class="ed-flag"><img src="images/icon/flag-5.png" alt=""></div> -->
								</div>
							</div>

                            </div>

                            <div class="col-md-6">
							<div class="ed-rese-grid ed-rese-grid-mar-bot-30">
								<div class="ed-rsear-img">
									<img src="images/course/sm-6.jpg" alt="">
								</div>
								<div class="ed-rsear-dec">
                                <h4><a href="bloodcount.php">Blood Count</a></h4>
                                <a href="#">Full <span>Report</span></a>
									<!-- <a href="#">Duration <span>120 Days</span></a> -->
									<!-- <div class="ed-flag"><img src="images/icon/flag-5.png" alt=""></div> -->
								</div>
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

    <script src="ajax/datatables/js/dataTables.bootstrap.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="ajax/datatables/js/datatables.min.js"></script>


    <?php   include ('headers/headfoot.php');?>
  

<script>

$(document).ready( function () {
    $('#my').DataTable();
} );



</script>





</body>

</html>