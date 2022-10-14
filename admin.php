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
                <br> <a href="#" class="logo"><img src="images/logo12.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <li></li>
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <!-- <a class='waves-effect btn-noti' href="admin-all-enquiry.php" title="all enquiry messages"><i
                            class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.php" title="course booking messages"><i
                            class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.php" title="admission enquiry"><i
                            class="fa fa-tag" aria-hidden="true"></i><span>5</span></a> -->
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img
                        src="images/users.jpg" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>

                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="admin-panel-setting.php" class="waves-effect"><i class="fa fa-cogs"
                                aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="phpquery/logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in"
                                aria-hidden="true"></i>
                            Logout</a>
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
                <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li class="active-bre"><a href="admin.php"> Dashboard</a>
                </li>
                <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i>
                        Back</a>
                </li>
            </ul>
        </div>
        <!--== DASHBOARD INFO ==-->
        <div class="sb2-2-1">
            <h2>Patient Dashboard</h2>
            <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p> -->
            <div class="db-2">
                <?php 
                    include ('phpquery/dbconnection.php');
                    $sql= mysqli_query($con,"SELECT * FROM appointment WHERE p_id= '".$_SESSION['p_id']."' "); 
                   $num_rows=mysqli_num_rows($sql);
                   // echo $num_rows;
                    ?>
                <ul>

                    <li>
                        <div class="dash-book dash-b-1">
                            <h5>Appointments</h5>
                            <h4><?php  echo  $num_rows ?></h4>

                        </div>
                    </li>
                    <?php 
                    include ('phpquery/dbconnection.php');
                    $sql= mysqli_query($con,"SELECT * FROM appointment WHERE p_id= '".$_SESSION['p_id']."' AND doctor_status='1' "); 
                   $num_rows=mysqli_num_rows($sql);
               
                    ?>
                    <li>
                        <div class="dash-book dash-b-2">
                            <h5>Completions</h5>
                            <h4><?php  echo  $num_rows ?></h4>

                        </div>
                    </li>
                    <li>
                        <?php 
                    include ('phpquery/dbconnection.php');
                    $sql= mysqli_query($con,"SELECT * FROM appointment WHERE p_id= '".$_SESSION['p_id']."' AND admin_status='1' AND doctor_status='3' "); 
                   $num_rows=mysqli_num_rows($sql);
               
                    ?>
                        <div class="dash-book dash-b-3">
                            <h5>Ongoing</h5>
                            <h4><?php  echo  $num_rows ?></h4>

                        </div>
                    </li>
                    <li>
                        <?php 
                    include ('phpquery/dbconnection.php');
                    $sql= mysqli_query($con,"SELECT * FROM appointment WHERE p_id= '".$_SESSION['p_id']."' AND patient_status='0' "); 
                   $num_rows=mysqli_num_rows($sql);
               
                    ?>
                        <div class="dash-book dash-b-4">
                            <h5>Cancelled</h5>
                            <h4><?php  echo  $num_rows ?></h4>

                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!--== User Details ==-->
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>Appointments Details</h4>
                            <!-- <p>All about students like name, student id, phone, email, country, city and more</p> -->
                        </div>

                        <div class="tab-inn">
                            <div class="table-responsive table-desi">
                                <table id="user_data" style="width:100%" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Apt. ID</th>
                                            <th class="text-center">Doctor Name</th>
                                            <th class="text-center">Specialization</th>
                                            <th class="text-center">Apt. Type</th>
                                            <th class="text-center">Apt.Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th class="text-center">Apt. ID</th>
                                            <th class="text-center">Doctor Name</th>
                                            <th class="text-center">Specialization</th>
                                            <th class="text-center">Apt. Type</th>
                                            <th class="text-center">Apt.Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--== Latest Activity ==-->
        <div class="sb2-2-3">
            <div class="row">


            </div>
        </div>

        <center>
            <div id="success_mes" class="text text-success"> </div>
        </center> <br>

        <div id="edit1" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body text-center">
                        <!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
                        <h3>Are you sure want to delete this Patient?</h3>

                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" id="repl" class="btn btn-danger">Delete</button>
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

        <!-- Ajax queries -->

        <script>



            $(document).ready(function () {

                fetch_Data();

// get data from db to table
                function fetch_Data() {

                    var table = $('#user_data').DataTable({

                        "retrieve": true,
                        "processing": true, // did false 
                        "serverSide": true,
                        "order": [],
                        "ajax": "table/apt_fetch.php"

                    });

                }


// cancel apts
                $(document).on("click", ".rep", function () {

                    var data_id = $(this).attr("apt_id");
                    var apt_date = $(this).attr("apt_date");
                    var user_id = $(this).attr("user_id");
                    var p_id = $(this).attr("p_id");
                    var no = $(this).attr("no");

                    swal({
                        title: "Are you sure?",
                        text: "You wanna cancel this Appointment!!",
                        icon: "warning",
                        buttons: true,
                        successMode: true,
                    })
                        .then((willDelete) => {
                            if (!willDelete) return;

                            $.ajax({
                                url: "phpquery/apt.php", // Url to which the request is send
                                method: "POST",             // Type of request to be send, called as method
                                data: { 
                                    'data_id': data_id,
                                    'apt_date': apt_date,
                                    'user_id': user_id,
                                    'p_id': p_id,
                                    'no': no

                                    
                                     },


                                success: function (data) {
                                    if ($.trim(data) === 'Records was updated successfully.') {

                                        swal("Success", "Appointment has Cancelled  :)", "success");
                                        $('#user_data').DataTable().destroy();
                                        fetch_Data();

                                    } else {
                                        //our handled error
                                        swal("Sorry", "Failed to cancel. Something went wrong :(", "error");
                                    }
                                },
                                error: function (data) {
                                    //other errors that we didn't handle
                                    swal("Sorry", "Failed to schedule. Something went wrong :(", "error");
                                }
                            });

                        });

                });

            });

        </script>

</body>


</html>