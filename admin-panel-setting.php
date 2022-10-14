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

<head>
    <title>SEUS Hospital</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Education master is one of the best educational html template, it's suitable for all education websites like university,college,school,online education,tution center,distance education,computer education">
    <meta name="keyword"
        content="education html template, university template, college template, school template, online education template, tution center template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700"
        rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ALL CSS FILES -->
    <link rel="stylesheet" type="text/css" href="../adminpanel/assets/sweetalert/sweetalert.css">


    <script src="js/sweetalert.js"></script>


    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />

    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>




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
                    <a class='waves-effect btn-noti' href="admin-all-enquiry.php" title="all enquiry messages"><i
                            class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.php" title="course booking messages"><i
                            class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.php" title="admission enquiry"><i
                            class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
                </div> -->
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
                <li><a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li class="active-bre"><a href="#"> Patient Settings</a>
                </li>
                <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i>
                        Back</a>
                </li>
            </ul>
        </div>

        <?php    

require_once 'phpquery/dbconnection.php';

    $sql = "SELECT * FROM patients WHERE p_id = '".$_SESSION["p_id"]."' ";
        if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                ?>
        <!--== User Details ==-->
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp admin-form">
                        <div class="inn-title">
                            <h4>User Profile <?php echo $row['p_fname'].' '.$row['p_lname'];  ?> </h4>
                            <p>Here you can edit your website basic details URL, Phone, Email, Address, User and
                                password and more</p>
                        </div>

                        <div class="tab-inn">
                            <form method="POST" id="update">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="first_name" name="first_name" type="text"
                                            value="<?php echo $row['p_fname'];?>" class="validate form-control"
                                            required>
                                        <label for="first_name" class="">First Name</label>
                                        <span id="fname_info" class="info text-danger"></span>

                                    </div>
                                    <div class="input-field col s6">
                                        <input id="last_name" name="last_name" type="text"
                                            value="<?php echo $row['p_lname'];?>" class="validate form-control"
                                            required>
                                        <label for="last_name" class="">Last Name</label>
                                        <span id="lname_info" class="info text-danger"></span>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="address" name="address" type="text"
                                            value="<?php echo $row['p_address'];?>" class="validate form-control"
                                            required>
                                        <label for="Address" class="">Address</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="state" name="state" type="text" value="<?php echo $row['p_state'];?>"
                                            class="validate form-control">
                                        <label for="State" class="">State</label>

                                    </div>


                                </div>



                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="dob" name="dob" type="date" value="<?php echo $row['dob'];?>"
                                            class="validate form-control">

                                    </div>

                                    <div class="input-field col s6">

                                        <input type="text" id="contact" name="contact" class="validate form-control"
                                            maxlength="10" placeholder="tel: input ten numbers"  value="<?php echo $row['p_contact'];?>" />
                                        <label for="contact"></label>

                                        <div id="error"></div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <!-- <label class="display-block">Schedule Status</label> -->


                                        <label>Gender:</label> </br>
                                        <input type="radio" name="gender" id="r2"  class="gender" <?php if($row['p_gender'] == "Male") { echo "checked"; }?> value="Male">
                                      <label for="r2">Male</label>


                                      <input type="radio" name="gender" id="r1"  class="gender" <?php if($row['p_gender'] == "Female") { echo "checked"; }?> value="Female">
                                      <label for="r1">Female</label>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="nic" name="nic" type="text"  maxlength="10"  value="<?php echo $row['nic'];?>"
                                            class="validate form-control">
                                        <label for="Note" class="">NIC No</label>
                                        <div id="comment"></div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="input-field col s6">
                                        <input type="hidden" class="validate form-control" id="id"
                                            value="<?php echo $row['p_id'];?>" name="id">
                                        <label for="id" class=""></label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                            <input type="button" name="edit" id="edit" Value="Save Changes    "
                                                class="waves-button-input"> </i>
                                    </div>

                                </div>
                                <div id="error"> </div>


                                <br>



                                <div id="edit"> </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php  
}
mysqli_free_result($result);

} 
else{
echo "No records matching your query were found.";
}
}


?>

        <!--== User Details ==-->
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp admin-form">
                        <div class="inn-title">
                            <h4>User Profile (Password Changes)</h4>

                        </div>

                        <div class="tab-inn">
                            <form method="POST">
                                <div class="row">

                                    <div class="input-field col s6">
                                        <input type="hidden" class="validate form-control" id="id"
                                            value="<?php echo $row['p_id'];?>" name="id">
                                        <label for="id" class=""></label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="curpass" name="password" type="password"
                                            class="validate form-control">
                                        <label for="password" class="">Current Password</label>
                                        <span id="curpass_info" class="info text-danger"></span>

                                    </div>


                                    <div class="row">
                                    <div class="input-field col s6">
                                        <input id="conpass" name="password" type="password"
                                            class="validate form-control">
                                        <label for="password" class="">Confirm Password</label>
                                        <span id="conpass_info" class="info text-danger"></span>

                                    </div>

                                </div>

                                    <div class="input-field col s6">
                                        <input id="newpass" name="password1" type="password"
                                            class="validate form-control">
                                        <label for="password1" class="">New Password</label>
                                        <span id="newpass_info" class="info text-danger"></span>

                                    </div>

                                </div>



                        



                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="waves-effect waves-light btn-large waves-input-wrapper" style="">
                                            <input type="button" name="change_pass" id="change_pass"
                                                Value="Save Changes   " class="waves-button-input"> </i>
                                    </div>

                                </div>
                                <div id="edit"> </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    </div>
    </div>



    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>



</body>


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
    $('#dob').attr('max', maxDate);
});





    $(document).ready(function () {


        $("#contact").on("keyup", function (e) {
            e.target.value = e.target.value.replace(/[^\d]/, "");
            if (e.target.value.length === 10) {
                // do stuff
                var ph = e.target.value.split("");
                ph.splice(3, 0, "-"); ph.splice(7, 0, "-");

                // $("label").html(ph.join(""))
                $('input[id=edit]').prop('disabled', false);
                $('#error').html('');

            }else if(e.target.value.length === 0) {
                            // do stuff
                            var ph = e.target.value.split("");
                            ph.splice(3, 0, "-"); ph.splice(7, 0, "-");

                            // $("label").html(ph.join(""))
                            $('input[id=edit]').prop('disabled', false);
                            $('#error').html('');


            } else {

                $('input[id=edit]').prop('disabled', true);
                $('#error').html('Contact Number should be 10 digits');

            }


        });

        $("#nic").on("keyup", function (a) {
            let inputElement = document.getElementById("nic");
  let divElement = document.getElementById("comment");
  var message = "";


  let inputValue = inputElement.value.trim();
  
  let pattern = new RegExp(/^\d{9}[a-zøæ]{1}/,   "i");

  if (isValid(inputValue, pattern)) {
    message = "Correct NIC Number" 
    $('input[id=edit]').prop('disabled', false);

  }else if(a.target.value.length === 0){
    var message = "";
    $('input[id=edit]').prop('disabled', false);
  }
  else{
    $('input[id=edit]').prop('disabled', true);
    message = "Wrong NIC Number"  

  }
  
  divElement.innerHTML = message;

  function isValid(str, pattern) {
  return str.match(pattern);
}



        });




        $(document).on('click', '#edit', function () {
            // var id = edit_id;
            var id = $('#id').val();
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var address = $('#address').val();
            var gender = $(".gender:checked").val();
            var dob = $('#dob').val();
            var contact = $('#contact').val();
            var state = $('#state').val();
            var nic = $('#nic').val();


            var valid;
                valid = validateContact();

                if (valid) {

            swal({
                title: "Are you sure?",
                text: "You wanna update this profile!!",
                icon: "warning",
                buttons: true,
                successMode: true,
            })
                .then((willDelete) => {
                    if (!willDelete) return;


                    $.ajax({
                        url: 'userquery/change.php',
                        type: 'POST',
                        data: {
                            'id': id,
                            'first_name': first_name,
                            'last_name': last_name,
                            'address': address,
                            'gender': gender,
                            'dob': dob,
                            'contact': contact,
                            'state': state,
                            'nic': nic,

                        },

                        success: function (data) {
                            if (data == 'saved_comment') {
                                swal("Success", "User Profile Updated :)", "success");


                            } else {
                                //our handled error
                                swal("Sorry", "Failed to change. Try it by correct password :(", "error");
                            }
                        },
                        error: function (data) {
                            //other errors that we didn't handle
                            swal("Sorry", "Failed to send order. Please try later :(", "error");
                        }
                    });

                });

            };
        // check validations
        function validateContact() {
                    var valid = true;
                    $(".demoInputBox").css('background-color', '');
                    $(".info").html('');

                    if (!$("#last_name").val()) {
                        $("#lname_info").html("(Last name is required)");
                        $("#last_name").css('background-color', '#FFFFDF');
                        valid = false;
                    }
                    if (!$("#first_name").val()) {
                        $("#fname_info").html("(First name is required)");
                        $("#first_name").css('background-color', '#FFFFDF');
                        valid = false;
                    }

        
                    return valid;
                }


        });


        // change comment to database
        $(document).on('click', '#change_pass', function () {


            var curpass = $('#curpass').val();
            var newpass = $('#newpass').val();
            var conpass = $('#conpass').val();

            var valid;
            valid = validateContact();

            if (valid) {

                swal({
                    title: "Are you sure?",
                    text: "You wanna change your Password!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (!willDelete) return;
                        $.ajax({
                            url: "userquery/change.php", // Url to which the request is send
                            type: "POST",             // Type of request to be send, called as method
                            data: {
                                'curpass': curpass,
                                'newpass': newpass,
                                // 'conpass': conpass,

                            },


                            success: function (data) {
                                if (data == 'Password Changed') {
                                    swal("Success", "Password has been changed :)", "success");

                                    $('#curpass').val('');
                                    $('#newpass').val('');
                                    $('#conpass').val('');
                                } else {
                                    //our handled error
                                    swal("Sorry", "Failed to change password. Try it by correct password :(", "error");
                                }
                            },
                            error: function (data) {
                                //other errors that we didn't handle
                                swal("Sorry", "Failed to send order. Please try later :(", "error");
                            }


                        });

                    });



            };

            // check validations
            function validateContact() {
                var valid = true;
                $(".demoInputBox").css('background-color', '');
                $(".info").html('');

                var minLength = 8;
                    var value = $("#curpass").val();

                      if (value.length < minLength){ 
                         $("#curpass_info").html("(Password contains Minimum 8 Characters)");
                            valid = false;
                                 }


                if (!$("#curpass").val()) {
                    $("#curpass_info").html("(Required)");
                    $("#curpass").css('background-color', '#FFFFDF');
                    valid = false;
                }

                if (!$("#newpass").val()) {
                    $("#newpass_info").html("(Required)");
                    $("#newpass").css('background-color', '#FFFFDF');
                    valid = false;
                }
                if (!$("#conpass").val()) {
                    $("#conpass_info").html("(Required)");
                    $("#conpass").css('background-color', '#FFFFDF');
                    valid = false;
                }
                if ($("#curpass").val() != $("#conpass").val()) {
                    $("#conpass_info").html("(Password do not match)");
                    //$("#password1").css('background-color', '#FFFFDF');
                    valid = false;
                }


                return valid;
            }

        });













    });







</script>




</html>