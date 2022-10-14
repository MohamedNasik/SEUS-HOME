<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

            $conn = mysqli_connect("localhost", "root", "", "hmsproject");

    
            
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
                        <li class="active-bre"><a href="#"> Doctor Patient Schedule</a>
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
                           
                            <div class="col-md-12">
      <div class="box-inn-sp admin-form">
                    <div class="col s12">
                         
                    <form class="form-horizontal" method="POST" id="form_apt">
                     <center>   <h3>Search Doctors</h3>  </center>  <br><br>                    
                            <div class="form-group">
                                <label class="control-label col-sm-3">Doctor Specilization:</label>
                                <div class="col-sm-4">

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

                                    <select name="doctorspecilization" id="specilization">
								<option value="Select Specilization">Select Specilization</option> 
                                     <?php echo load();   ?>
                    
							  </select>
                              <span id="doctorspecilization-info" class="info text-danger"></span> <br />

                                </div>
                            </div> 
                         
                         
                            <div class="form-group">
                                <label class="control-label col-sm-3">Doctor :</label>
                                <div class="col-sm-4" class="select">
                                    <select name="doctorname" id="doctorname">
								<option value="">Select Doctor</option>										
							  </select>
                              <span id="doctor-info" class="info text-danger"></span><br />

                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="control-label col-sm-3"> Date:</label>
                                <div class="col-sm-4">
                                    <input type="date" id="date" name="date" class="form-control" placeholder="Enter your date">
                                    <span id="date-info" class="info text-danger"></span><br />
                                </div>
                             

                            </div>

                            <!-- <div id="snackbar">Please Sign Up .....</div> -->


               
                            <br>
                            <center>  <div id="success_mes" class="text text-success">    </div>  </center> <br>

                        </form>

                        
                         
                         

            


                            <div class="form-group mar-bot-0">
                                <div class="col-sm-offset-3 col-sm-4">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style="">   <input type="button" value="Search" name="search" id="search" class="waves-button-input"></i>
                                </div>
                            </div>
                    </div>
                </div>
            </div>  
                             
                            </div>
                        </div>
             <br>        <br>        <br>             <br>        <br>        <br>        <br>        <br> 
         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="n-form-com admiss-form">
                    <div class="col s12">
                     

                    <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
									<h4>Doctor Patient Consultation Schedule</h4>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive " id="test_info" style="display:none">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center"><strong>Doctor</strong></th>
                                                    <th class="center"><strong>Specialization</strong></th>
                                                    <th class="center"><strong>Doctor End Time</strong></th>
                                                    <th class="center"><strong>Patient Last Time Allocated</strong></th>

                                                </tr>
                                            </thead>
                                            <tbody>                                        
                                                <tr>
                                                    <td class="center"><span id="1"></td>
                                                    <td class="center"><span id="2"></td>
                                                    <td class="center"><span id="3"> </span></td>
                                                    <td class="center"><span id="4"></td>
                                                </tr>

                                                <tr>
                                                <td class="center" colspan="4"><span id="5"></td>

                                                  </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<br><br>
                 



                </div>
            </div>

        </div>
    </div>



                    </div>
                </div>
            </div>  



                    </div>
                 
                </div>
           
                <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>
            </div>

        </div>
    </div>

    <!--Import jQuery librar.js-->

    <script src="ajax/datatables/js/dataTables.bootstrap.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="ajax/datatables/js/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <?php   include ('headers/headfoot.php');?>
  

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






$(document).ready(function(){


// get specialization
 $('#specilization').change(function () {
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

    $('#search').click( function () {

  var specilization= $('#specilization').val();
  var doctor_name= $('#doctorname').val();
  var date= $('#date').val();

  $('#1').html('');
  $('#2').html('');
  $('#3').html('');
  $('#4').html('');
  $('#5').html('');


  var valid;
                valid = validateContact();

                if (valid) {

        $.ajax({
  
  url: "phpquery/fetch_schedule.php", // Url to which the request is send
  method: "POST",             // Type of request to be send, called as method
  data:{specilization:specilization,doctor_name:doctor_name,date:date },

  success:function(data)
  {

  $('#test_info').css("display","block");

  var doctor = $('#5').text(data.doctor);


  if ($.trim(data) === doctor) {

  $('#test_info').css("display","none");

  $('#5').text(data.doctor);



  }else{

  $('#1').text(data.doctor_name);
  $('#2').text(data.specilization);
  $('#3').text(data.end_times_doctor);
  $('#4').text(data.end_times_patient);

  }
     

}

});

};

// check validations
function validateContact() {
    var valid = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');


if ($("#specilization").val() == 'Select Specilization') {
        $("#doctorspecilization-info").html("(Required)");
     //   $("#datetimepicker4").css('background-color', '#FFFFDF');
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









    

// check validations
function validateContact() {
        var valid = true;
        $(".demoInputBox").css('background-color', '');
        $(".info").html('');

    
    if ($("#specilization").val() == 'Select Specilization') {
            $("#doctorspecilization-info").html("(Required)");
         //   $("#datetimepicker4").css('background-color', '#FFFFDF');
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





    } );

} );



</script>





</body>

</html>