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
<head>
    <title>SEUS Hospital</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Education master is one of the best educational html template, it's suitable for all education websites like university,college,school,online education,tution center,distance education,computer education">
    <meta name="keyword" content="education html template, university template, college template, school template, online education template, tution center template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->


    <link rel="stylesheet" type="text/css" href="../adminpanel/assets/calender/fullcalendar.css">
<link href='../adminpanel/assets/packages/daygrid/main.css' rel='stylesheet' />
    <link href='../adminpanel/assets/packages/timegrid/main.css' rel='stylesheet' />
    <link href="../adminpanel/assets/packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='../adminpanel/assets/packages/datepicker/datepicker.css' rel='stylesheet' />
    <link href='../adminpanel/assets/packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
    <link href="../adminpanel/assets/packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">

    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />

    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="ajax/vendor.js"></script>
    <script type="text/javascript" src="ajax/app.js"></script>
    <script type="text/javascript" src="ajax/validate.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>





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
                        <li class="active-bre"><a href="#"> Patient Schedule</a>
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
                             
                            <div class="col-md-12">
                                    <div id="calendar"></div>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>

    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


<script src="../adminpanel/assets/calender/moment.min.js"></script>
<script src="../adminpanel/assets/calender/fullcalendar.min.js"></script>

<script src='../adminpanel/assets/packages/daygrid/main.js'></script>
<script src='../adminpanel/assets/packages/timegrid/main.js'></script>
<script src='../adminpanel/assets/packages/list/main.js'></script>
<script src='../adminpanel/assets/packages/interaction/main.js'></script>

<script src='../adminpanel/assets/packages/datepicker/datepicker.js'></script>
<script src='../adminpanel/assets/packages/colorpicker/bootstrap-colorpicker.min.js'></script>

    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>


    <script>

$(document).ready(function () {
    // page is now ready, initialize the calendar...
    var calendar = $('#calendar').fullCalendar({
        // put your options and callbacks here
        editable:false,
    plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay,dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    navLinks: true, // can click day/week names to navigate views
    businessHours: true, // display business hours
   
    selectable:false,
    selectHelper:false,
    
    eventSources: [
{
    url: 'seus/load.php',

}
    ],


    })


    });






  
 


</script>









</body>


</html>