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
<?php include ('headers/headpart.php');  ?>
<!-- Data table css -->
<link href="ajax/new datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />


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
                        <li class="active-bre"><a href="#"> OPD Test Payment History</a>
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
									<h4>Test Payment Summery </h4>
\                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover" id="myTable">
                                            <thead>
                                                <tr>
                                               
                                                    <th>Invoice ID</th>	
													<th>Invoice Date</th>                                                
                                                    <th>Check Tests</th>

                                                </tr>
                                            </thead>

<?php
  include ('phpquery/dbconnection.php');

   $stmt = mysqli_prepare($con,"SELECT * FROM test_payments WHERE p_id='".$_SESSION['p_id']."' ");
   //    $stmt->bind_param("s", $_GET['id']);
   $stmt->execute();
   $result = $stmt->get_result();
   if($result->num_rows === 0)  ;
   while($row = $result->fetch_assoc()) {

    $test_payment_id= $row['test_payment_id'];
    $invoice_date= $row['invoice_date'];

    $invoice_date=   date('dS F Y', strtotime($row['invoice_date']));

   
 ?>



                                            <tbody>
                                                <tr>
                                                 
													<td><?php echo $test_payment_id   ?></td>
													<td><?php echo $invoice_date   ?></td>
									
													<td><a href="check_test.php?id=<?php echo $test_payment_id ?>" class="ad-st-view">Check Test</a></td>
                                                </tr>


                                                </tr>
   <?php 
// $stmt->close();
} ?>
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