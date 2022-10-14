<!DOCTYPE html>
<html lang="en">

<?php
require_once 'phpquery/dbconnection.php';
   // Initialize the session
   session_start();
   if(!isset($_SESSION['p_id'])){
    header('location:index.php');
    }
                ?>

<!-- Head Part -->

<?php include ('headers/headpart.php');  ?>

<link rel="stylesheet" type="text/css" href="../adminpanel/assets/sweetalert/sweetalert.css">
<script src="js/sweetalert.js"></script>

<style>
    label.cabinet {
        display: block;
        cursor: pointer;
    }

    label.cabinet input.file {
        position: relative;
        height: 0%;
        width: auto;
        opacity: 0;
        -moz-opacity: 0;
        filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
        margin-top: -30px;
    }

    #upload-demo {
        width: 250px;
        height: 250px;
        padding-bottom: 25px;
    }

    figure figcaption {
        position: absolute;
        bottom: 0;
        color: #fff;
        width: 100%;
        padding-left: 20px;
        padding-bottom: -20px;
        text-shadow: 0 0 10px #000;
    }
</style>

<body>

    <?php    include ('headers/adminheader.php');  ?>
    <?php  
$sql = "SELECT * FROM patients WHERE p_id = '".$_SESSION["p_id"]."' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)) {
?>
    <div class="stu-db">
        <div class="container pg-inn">
            <div class="col-md-3">
                <div class="pro-user" id="uploadimage">
                    <!-- <img src="images/users.jpg" alt="user"> -->
                    <label class="cabinet center-block">

                        <figure>
                            <image class="gambar img-responsive img-thumbnail" id="item-img-output"
                                src="images/users.jpg" placeholder="sdsd" />
                            <!-- <figcaption><i class="fa fa-camera"></i></figcaption>
                        </figure>
                        <input id="upload_image" type="file" class="item-img file center-block upload"
                            name="file_photo"> -->
                    </label>


                </div>


                <div class="pro-user-bio">
                    <ul>
                        <li>

                        <h4>   Logged as: <?php echo $row["p_fname"].' '.$row["p_lname"]; ?>     </h4>
                            <!-- <a href="phpquery/logout.php">log</a> -->
                        </li>
                        <li>Patient ID: <?php echo $_SESSION["p_id"]; ?> </li>
                        <!-- <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li> -->
                    </ul>
                </div>
            </div>
            <?php }} } ?>


            <div class="col-md-9">
                <div class="udb">
                    <div class="udb-sec udb-time">
                        <h4><img src="images/icon/db5.png" alt="" /> Pending Testings</h4>

                        <div class="tour_head1 udb-time-line days" id="des">

                        </div>


                    </div>

                </div>

            </div>


        </div>

    </div>
    </div>
    </section>




    <!--SECTION END-->

    <?php   include ('headers/footer.php');?>

    <?php   include ('headers/logreg.php');?>

    <!--Import jQuery librar.js-->
    <?php   include ('headers/headfoot.php');?>

    <!-- Ajax queries -->
    <?php   include ('headers/query.php');?>


    <script>
        $("#profileImage").click(function (e) {
            $("#imageUpload").click();
        });
    </script>



    <script>

        load_data();
        function load_data() {
            $.ajax({
                url: "userquery/fetch_test.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method

                success: function (data) {

                    $('#des').html(data);

                }

            });

        }
        load_data();



        $(document).ready(function () {
//  schedule tests
            $(document).on("click", ".confirm", function () {

                var pres_id = $(this).attr("data-id");
                var apt_id = $(this).attr("data-id1");


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
                                        load_data()
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