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
    <link rel="stylesheet" type="text/css" href="../adminpanel/assets/sweetalert/sweetalert.css">

    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />
   
    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

 


    <link rel="stylesheet" type="text/css" href="../adminpanel/assets/sweetalert/sweetalert.css">
<script src="js/sweetalert.js"></script>


  
  




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <!-- <style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #0C0D58;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style> -->




</head>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body>
<?php   include ('headers/blue_header.php');  ?>


    <!--SECTION START-->
    <section class="c-all h-quote">
        <div class="container">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="all-title quote-title qu-new">
                    <h2>Request an Appointment</h2>
                    <p>Find a Doctor. Book an Appointment. 
</p>
                    <!-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p> -->
                    <p class="help-line">Help Line <span>+94 55 2230 352</span> </p> <span class="help-arrow pulse"><i class="fa fa-angle-right" aria-hidden="true"></i></span> </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="n-form-com admiss-form">
                    <div class="col s12">


             <form class="form-horizontal" method="POST" id="form_apt">
                     <center>   <h2>Request an Appointment</h2>  </center>  <br><br>                    
                            <div class="form-group">
                                <label class="control-label col-sm-3">Doctor Specilization:</label>
                                <div class="col-sm-9">

 <?php

function load(){ 

include ('phpquery/dbconnection.php');
$output='';
$sql="SELECT * from doctorspecilization";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
  $output.='<option value="'.$row["specilization"].'">'.$row["specilization"].'</option>';
}
return $output;

}
?>

                                    <select name="doctorspecilization" id="doctorspecilization">
								<option value="Select Specilization">Select Specilization</option> 
                                     <?php echo load();   ?>
                    
							  </select>
                              <span id="doctorspecilization-info" class="info text-danger"></span> <br />

                                </div>
                            </div> 
                         
                         
                            <div class="form-group">
                                <label class="control-label col-sm-3">Doctor :</label>
                                <div class="col-sm-9" class="select">
                                    <select name="doctorname" id="doctorname">
								<option value="">Select Doctor</option>										
							  </select>
                              <span id="doctor-info" class="info text-danger"></span><br />

                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="control-label col-sm-3">Apt.Type :</label>
                                <div class="col-sm-9" class="select">
                                    <select name="typed" id="typed">
								<option value="Select Type">Select Type</option>	
                                <option value="Consultation">Consultation</option>	
								<option value="Check Report">Check Report</option>	
						
							  </select>
                              <span id="typed-info" class="info text-danger"></span><br />

                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="control-label col-sm-3">Appointment Date:</label>
                                <div class="col-sm-9">
                                    <input type="date" id="date" name="date" class="form-control" placeholder="Enter your date">
                                    <span id="date-info" class="info text-danger"></span><br />
                                </div>
                             

                            </div>
                          <?php    if(isset($_SESSION['p_id'])){
                                       
       ?>
                            <div class="form-group mar-bot-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style=""><input type="button" value="APPLY NOW" id="apply" name="apply" class="waves-button-input"></i>
                                </div>
                            </div> 
                          <?php  }else{   ?>
                            
                            <div class="form-group mar-bot-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style=""><input type="button" value="APPLY NOW" onclick="myFunction()" class="waves-button-input"></i>
                                </div>
                            </div> 
                            <!-- <div id="snackbar">Please Sign Up .....</div> -->


                          <?php  } ?>
                            <br>
                            <center>  <div id="success_mes" class="text text-success">    </div>  </center> <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


    <!-- FOOTER COURSE BOOKING -->
    <?php  include ('headers/footer.php');  ?>



<!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
<?php   include ('headers/logreg.php');?>


<!-- SOCIAL MEDIA SHARE -->

<!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>



<!-- Ajax queries -->
<?php   include ('headers/query.php');?>


<script>

$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    // alert(maxDate);
    $('#date').attr('min', maxDate);
});



 function myFunction() {
//   var x = document.getElementById("snackbar");
//   x.className = "show";
//   setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
 

swal("Sign In ", "You are not a member :(", "error")


 }



</script>



<script>

        //    start query
 $(document).ready(function () {

// get specialization
 $('#doctorspecilization').change(function () {
    $('select').material_select();
   
var doc_spec_id=$(this).val();

$.ajax({
            url: "phpquery/fetch_doctor_name.php", // Url to which the request is send
            method: "POST",             // Type of request to be send, called as method
            data: {doc_spec_id:doc_spec_id  },
           // dataType:"text",

            success: function (data) {
                $("#doctorname").html(data);
                $("#doctorname").material_select();

         }

        });


    });


$(document).on('click', '#apply', function () {
// request apts
    var doctorspecilization = $('#doctorspecilization').val();
    var doctorname = $('#doctorname').val();
    var date = $('#date').val();
    var type = $('#typed').val();

var data={ 
                'doctorspecilization': doctorspecilization,
                'doctorname': doctorname,
                'date': date,
                'type': type,

}

    var valid;
    valid = validateContact();

    if (valid) {
        swal({
                    title: "Are you sure?",
                    text: "You wanna request this Appointment ?",
                    icon: "warning",
                    buttons: true,
                    successMode: true,
                })
                    .then((willDelete) => {
                        if (!willDelete) return;




        $.ajax({
            url: "check_apt.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,

            success: function (response) {

                if ($.trim(response) === 'Admin added succesfully!!') {

                swal("Success", "Appointment Requested  :)", "success");
                
                    } else if($.trim(response) === 'This Doctor does not available in this time') {
                        swal("Sorry", "This Doctor does not available in this time :(", "error");

                    } else if($.trim(response) === 'This doctor does not available at this moment') {

                        swal("Sorry", "This doctor does not available at this moment !! :(", "error");

                    } else if($.trim(response) === 'You have already requested for this date with doctor') {

                        swal("Sorry", "You have already requested for this date with doctor !! :(", "error");

                    } else if($.trim(response) === 'Time passed') {
                        swal("Sorry", "All time were allocated !! :(", "error");

                    } else if($.trim(response) === 'Time Expired') {
                        swal("Sorry", "Consultation Time Passed !! :(", "error");


                    } else {
                        //our handled error
                       swal("Sorry", "Failed to Sent. Something went wrong :(", "error");
                   }
            }

        });
    });
    };

    // check validations
    function validateContact() {
        var valid = true;
        $(".demoInputBox").css('background-color', '');
        $(".info").html('');

    
    if ($("#doctorspecilization").val() == 'Select Specilization') {
            $("#doctorspecilization-info").html("(Required)");
         //   $("#datetimepicker4").css('background-color', '#FFFFDF');
            valid = false;
        }
  
        if ($("#typed").val() == 'Select Type') {
            $("#typed-info").html("(Required)");
            $("#typed").css('background-color', '#FFFFDF');
            valid = false;
        }

        if (!$("#doctorname").val()) {
              $("#doctor-info").html("(Required)");
           //   $("#userName-info").css('background-color', '#FFFFDF');
              valid = false;
          }

        if (!$("#date").val()) {
            $("#date-info").html("(Required)");
         //   $("#datetimepicker3").css('background-color', '#FFFFDF');
            valid = false;
        }
        return valid;
    }

});


});


</script>



</body>


</html>