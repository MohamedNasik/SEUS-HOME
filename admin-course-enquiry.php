<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();

         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

        ?>
    <title>SEUS HMS</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="EEducation master is one of the best eEducational html template, it's suitable for all eEducation websites like university,college,school,online eEducation,tution center,distance eEducation,computer eEducation">
    <meta name="keyword"
        content="eEducation html template, university template, college template, school template, online eEducation template, tution center template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700"
        rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />

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
                <!-- <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="admin-all-enquiry.html" title="all enquiry messages"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.html" title="course booking messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.html" title="admission enquiry"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
                </div> -->
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
                        <li class="active-bre"><a href="#">Testings for Prescription</a>
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
                                    <h4>Testings for Prescription ID :    <?php echo $_GET['pres_id'];   ?> </h4>
                                    <p>All about students like name, student id, phone, email, country, city and more</p>
                                </div>
                                <?php $_GET['pres_id'];   ?> 
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi" id="test_data">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<!-- pay payment -->
<div id="edit6" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center"> 
                     <!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
                    <h3>Are you sure want to pay for this Testing?</h3>

                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="repl6" class="btn btn-success">Active</button>
                    </div>

                </div>

            </div>
        </div> 

    </div>



<!-- cancel payment -->
<div id="edit5" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center"> 
                     <!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
                    <h3>Are you sure want to paying later ?</h3>

                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="repl5" class="btn btn-danger">Deactive</button>
                    </div>

                </div>

            </div>
        </div> 

    </div>


    
<!-- cancel test -->
<div id="edit" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center"> 
                     <!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
                    <h3>Are you sure want to cancel this Testing?</h3>

                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="repl" class="btn btn-danger">Deactive</button>
                    </div>

                </div>

            </div>
        </div> 

    </div>
<!-- active test -->

    <div id="edit1" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center"> 
                     <!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
                    <h3>Are you sure want to active this testing?</h3>

                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="reps" class="btn btn-success">Acitive</button>
                    </div>

                </div>

            </div>
        </div> 

    </div>

<!-- re pay payment -->

<div id="edit7" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center"> 
                     <!-- <img src="assets/img/sent.png" alt="" width="50" height="46"> -->
                    <h3>Are you sure want to re-pay for this Testing?</h3>

                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="repl7" class="btn btn-success">Active</button>
                    </div>

                </div>

            </div>
        </div> 

    </div>






    <script src="ajax/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>


<script>




/**---------deactive A ROW ----------------*/

$(document).on('click', '#rep', function () {

$("#repl").attr('testing_schedule_id', $(this).attr('data_id'));

$("#edit").modal({ show: 'true' });


});

/**---------active A ROW ----------------*/

$(document).on('click', '#rep1', function () {

$("#reps").attr('testing_schedule_id', $(this).attr('data_id'));

$("#edit1").modal({ show: 'true' });


});

/**--------- cancel payment ----------------*/

$(document).on('click', '#rep5', function () {

$("#repl5").attr('testing_schedule_id', $(this).attr('data_id'));

$("#edit5").modal({ show: 'true' });


});

/**--------- pay payment ----------------*/

$(document).on('click', '#rep6', function () {

$("#repl6").attr('testing_schedule_id', $(this).attr('data_id'));

$("#edit6").modal({ show: 'true' });


});

/**--------- re pay payment ----------------*/

$(document).on('click', '#rep7', function () {

$("#repl7").attr('testing_schedule_id', $(this).attr('data_id'));

$("#edit7").modal({ show: 'true' });


});


load_data();

function load_data(){
    
$.ajax({
  url: "table/test_view.php", // Url to which the request is send
  type: "POST",             // Type of request to be send, called as method
  data: { 'pres': <?php echo $_GET['pres_id']   ?> },                    

  success: function (data) {

      $('#test_data').html(data);

  }

});

}


$(document).ready( function () {
$('#myTable').DataTable();
} );

//  active the test into 0

$("#repl").click(function () {

var testing_schedule_id = $("#repl").attr('testing_schedule_id');
$.ajax({
    data: { 'testing_schedule_id': testing_schedule_id, },
    type: "POST",
    url: "userquery/apt.php",
    success: function (data) {
        //   console.log(data);
        $('#success_mes').html(data);

        $("#edit").modal('hide');
        load_data();


    }
});

setInterval(function () {
    $('#tab').load("table/test_view.php").fadeIn("slow");
}, 1000);

});


//  active the test into 1

$("#reps").click(function () {

var testing_schedule_id1 = $("#reps").attr('testing_schedule_id');
$.ajax({
    data: { 'testing_schedule_id1': testing_schedule_id1, },
    type: "POST",
    url: "userquery/apt.php",
    success: function (data) {
        //   console.log(data);
        $('#success_mes').html(data);

        $("#edit1").modal('hide');
        load_data();


    }
});

setInterval(function () {
    $('#tab').load("table/test_view.php").fadeIn("slow");
}, 1000);

});


//  cancel payment

$("#repl5").click(function () {

var cancel = $("#repl5").attr('testing_schedule_id');
$.ajax({
    data: { 'cancel': cancel, },
    type: "POST",
    url: "userquery/confirm.php",
    success: function (data) {
        //   console.log(data);
        $('#success_mes').html(data);

        $("#edit5").modal('hide');
        load_data();


    }
});

setInterval(function () {
    $('#tab').load("table/test_view.php").fadeIn("slow");
}, 1000);

});


//  pay payment

$("#repl6").click(function () {

var pay = $("#repl6").attr('testing_schedule_id');
$.ajax({
    data: { 'pay': pay, },
    type: "POST",
    url: "userquery/confirm.php",
    success: function (data) {
        //   console.log(data);
        $('#success_mes').html(data);

        $("#edit6").modal('hide');
        load_data();


    }
});

setInterval(function () {
    $('#tab').load("table/test_view.php").fadeIn("slow");
}, 1000);

});


//  re-pay payment

$("#repl7").click(function () {

var repay = $("#repl7").attr('testing_schedule_id');
$.ajax({
    data: { 'repay': repay, },
    type: "POST",
    url: "userquery/confirm.php",
    success: function (data) {
        //   console.log(data);
        $('#success_mes').html(data);

        $("#edit7").modal('hide');
        load_data();


    }
});

setInterval(function () {
    $('#tab').load("table/test_view.php").fadeIn("slow");
}, 1000);

});



</script>




      
</body>


</html>