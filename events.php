<!DOCTYPE html>
<html lang="en">
<?php
        // Initialize the session
         session_start();
         require_once 'phpquery/dbconnection.php';
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


<?php   include ('headers/blue_header.php');  ?>


    <!--SECTION START-->
    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Doctor <span> Schedule</span></h2>
                            <p>A great doctor team to help your needs </p>
                        </div><br>
                        <div>
                            <div class="ho-event pg-eve-main">
                              
                            <div class="col-md-12">
                                    <div id="calendar"></div>

                                </div>




                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


<!--footer-->
    <?php   include ('headers/footer.php');?>

<!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
 <?php   include ('headers/logreg.php');?>

<!--social  -->


   <!--Import jQuery librar.js-->

    <!--Import jQuery before materialize.js-->


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



    <script type="text/javascript" src="ajax/vendor.js"></script>
    <script type="text/javascript" src="ajax/app.js"></script>
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
    url: '../adminpanel/adminquery/schedule/load_doctor_schedule.php',

}
    ],


    })


    });






  
 


</script>




    




    


<!-- Ajax queries -->
<?php   include ('headers/query.php');?>



</body>


</html>