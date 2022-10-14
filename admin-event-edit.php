<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
         session_start();
        
         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

    
         require_once 'phpquery/dbconnection.php';
         mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


         error_reporting(E_ALL);
         ini_set('display_errors', 1);
        ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<link rel="stylesheet" type="text/css" href="../adminpanel/assets/sweetalert/sweetalert.css">
<script src="js/sweetalert.js"></script>
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
          
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
            
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
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Edit Testings</a>
                        </li>
                        <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
						<div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Edit Event</h4>
                                    <p>Here you can edit your website basic details URL, Phone, Email, Address, User and password and more</p>
                                </div>
                                <div class="tab-inn">
                              
                    <div class="udb">
                        <div class="udb-sec udb-time">
                            <h4><img src="images/icon/db4.png" alt="" /> Edit your testings</h4>
                            <div class="tour_head1 udb-time-line days" id="des">





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
    </div>

       <!--Import jQuery librar.js-->
       <?php   include ('headers/headfoot.php');?>


       <script>

load_data();
        function load_data() {
            $.ajax({
                url: "userquery/fetch_test_edit.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: { 
                    'pres': <?php echo $_GET['pres_id']   ?> },                    

                success: function (data) {

                    $('#des').html(data);

                }

            });

        }
        load_data();





$(document).ready(function () {

$(document).on('click', '.confirm', function () {


                var pres_id =$('#presid').val();
                var apt_id = $('#aptid').val();


                var testings = new Array();
                $('input[name="tests"]:checked').each(function () {
                    testings.push(this.value);
                });


                var aptid = apt_id;
                var presid = pres_id;

                var testings = { 'testings': testings, 'presid': presid, 'aptit': aptid }

                swal({
                    title: "Are you sure?",
                    text: "You wanna schedule this Tests!!",
                    icon: "warning",
                    buttons: true,
                    successMode: true,
                })
                    .then((willDelete) => {
                        if (!willDelete) return;

                        $.ajax({
                            url: "userquery/confirm.php", // Url to which the request is send
                            method: "POST",             // Type of request to be send, called as method
                            data: testings,


                            success: function (data) {
                                if ($.trim(data) === 'Saved') {

                                    swal("Success", "The tests has Scheduled  :)", "success");

                                    setInterval(function () {
                                        window.location.href = 'edit_tests.php';
                                    }, 2000);

                                } else {
                                    //our handled error
                                    swal("Sorry", "Failed to schedule. Something went wrong :(", "error");
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