<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
    
         if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

        ?>
<!-- Data table css -->
<link href="ajax/new datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />


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
                        <li class="active-bre"><a href="#"> Change Settings</a>
                        </li>
                        <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>


<?php
require_once 'phpquery/dbconnection.php';

$stmt = $con->prepare("SELECT * FROM appointment as ap INNER JOIN users as u ON ap.user_id=u.user_id AND p_id=  ? AND ap.No=? ");
$stmt->bind_param("ss", $_SESSION["p_id"],$_GET["no"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {

?>


                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="box-inn-sp admin-form">
                        <div class="inn-title">
                            <h4>User Profile  </h4>
                   
                        </div>

                        <div class="tab-inn">
                            <form method="POST" id="update">
                                <div class="row">
                                    <div class="input-field col s6">
                                    Appointment ID
                                    <input id="first_name" name="first_name" type="text"
                                            value="<?php echo $row['apt_id'];?>" class="validate form-control"
                                            disabled>

                                    </div>

                                    <div class="input-field col s6">
                                    Appointment ID
                                    <input id="first_name" name="first_name" type="text"
                                            value="<?php echo $row['specilization'];?>" class="validate form-control"
                                            disabled>

                                    </div>
                             
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                              
                                    Appointment ID
                                    <input id="first_name" name="first_name" type="text"
                                            value="<?php echo $row['fname'].' '.$row['lname'];?>" class="validate form-control"
                                            disabled>
                                    </div>


                                    <div class="input-field col s6">
                                    Appointment ID

                                    <select name="type" id="type">
                                <option value="Select Type">Select Type</option>
                                
                                <option value="Consultation" <?php if( $row['type']=="Consultation") echo 'selected="selected"'; ?>>Consultation</option>
                                <option value="Check Report" <?php if( $row['type']=="Check Report") echo 'selected="selected"'; ?>>Check Report</option>

						
							  </select>
                              <span id="typed-info" class="info text-danger"></span><br />

                              </div>



                                </div>



                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="date" name="date" type="date" value="<?php echo $row['apt_date'];?>"
                                            class="validate form-control" disabled>
                                    </div>
                                    <span id="info" class="info text-danger"></span><br />

                        
                   
                                    <input id="apt_id" name="apt_id" type="hidden" value="<?php echo $row['apt_id'];?>" >

                                    <input id="no" name="no" type="hidden" value="<?php echo $row['No'];?>">

                

                                <div class="row">

                                    <div class="input-field col s6">
                                        <input type="hidden" class="validate form-control" id="id"
                                            value="<?php echo $row['p_id'];?>" name="id">
                                        <label for="id" class=""></label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                            <input type="button" name="edit" id="apply" Value="Save Changes    "
                                                class="waves-button-input"> </i>
                                    </div>

                                </div>


                                
                                <div id="error"> </div>


                                <br>



                                <div id="edit"> </div>
    <?php }}?>
                            </form>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>




                <!--== User Details ==-->
              
            </div>

        </div>
    </div>

    <!--Import jQuery librar.js-->

    <?php   include ('headers/headfoot.php');?>
	<!-- Data tables -->
	<script src="ajax/new datatable/jquery.dataTables.min.js"></script>
	<script src="ajax/new datatable/dataTables.bootstrap4.min.js"></script>

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


$(document).ready( function () {

    $(document).on('click', '#apply', function () {

    var no = $('#no').val();
    var type = $('#type').val();

var data={ 

                'no': no,
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
            url: "phpquery/apts_edit.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,

            success: function (data) {

                if ($.trim(data) === 'Success') {

                swal("Success", "Appointment has Updated  :)", "success");
          
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

    

  
        if ($("#type").val() == 'Select Type') {
            $("#typed-info").html("(Required)");
            $("#typed").css('background-color', '#FFFFDF');
            valid = false;
        }

        return valid;
    }

});







});



</script>





</body>

</html>