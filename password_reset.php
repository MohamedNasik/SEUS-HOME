<?php
        // Initialize the session
         session_start();
         include "phpquery/dbconnection.php";




        ?>




<!DOCTYPE html>
<html lang="en">




<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>




    <section>
        <div class="ad-log-main">
            <div class="ad-log-in">
                <div class="ad-log-in-logo">
                    <img src="images/logo12.png" alt="">
                </div>

                <div class="ad-log-in-con">
                    <div class="log-in-pop"><br>
                    <div class="box-inn-sp admin-form">

                        <h4>Enter your Password</h4>
                        <form name="pass" id="pass" method="post" class="s12" enctype="multipart/form-data"
                            data-toggle="validator">

                            <div>
                                <div class="input-field s12">
                                    <input id="passcode1" type="password" class="validate"
                                        placeholder="Enter New Password">
                                    <br> <small> <span id="passed1" class="info"></span> </small>

                                    <input id="passcode2" type="password" class="validate" placeholder="Enter New Confirm Password">

                                    <br> <!-- <label>Password</label> -->
                                    <small> <span id="passed2" class="info"></span> </small>

                                </div>
                            </div>

                            <div></div>
                                <div class="input-field s4">
                                    <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                        <!-- <button type="submit" id="login" value="Login" class="waves-button-input">Login</button> -->
                                        <input type="hidden" name="person" id="person" value="<?php echo $_GET['person']   ?>">

                                        <input type="hidden" name="mail" id="mail" value="<?php echo $_GET['email']   ?>">
                                        <input type="button" id="login" value="Submit" class="waves-effect waves-light log-in-btn">



                                    </i> </div>
                            </div><br>
                            <center> <div id="error"> </div> </center>
                            <center> <div id="real"> </div></center>

                            <br><br>
                            <div>
                                <div class="input-field s12"> <a href="index.php">Back to main menu</a> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Import jQuery librar.js-->
    <?php   include ('headers/headfoot.php');?>



    <script>
        $(document).ready(function () {

//  ajax for reset password
            $(document).on('click', '#login', function () {
                var passcode1 = $('#passcode1').val();
                var passcode2 = $('#passcode2').val();
                var mail = $('#mail').val();
                var person = $('#person').val();


                var valid;
                valid = validateContact();

                if (valid) {

                    $.ajax({
                        url: "phpquery/reset.php", // Url to which the request is send
                        type: "POST",             // Type of request to be send, called as method
                        data: {
                            'passcode1': passcode1,
                            'passcode2': passcode2,
                            'person': person,

                            'mail': mail,
                        },


                        success: function (response) {


                            if (response == 'Password Changed') {

                                $('#real').html(response);

                            }

                            var passcode1 = $('#passcode1').val('');
                            var passcode2 = $('#passcode2').val('');



                        }

                    });
                };

                // check validations
                function validateContact() {
                    var valid = true;
                    $(".demoInputBox").css('background-color', '');
                    $(".info").html('');

                    var minLength = 8;
                    var value = $("#passcode1").val();

                    if (value.length < minLength) {
                        $("#error").html("(Password contains Minimum 8 Characters)");
                        valid = false;
                    }


                    if (!$("#passcode1").val()) {
                        $("#passed1").html("(Required)");
                        $("#passcode1").css('background-color', '#FFFFDF');
                        valid = false;
                    }
                    if (!$("#passcode2").val()) {
                        $("#passed2").html("(Required)");
                        $("#passcode2").css('background-color', '#FFFFDF');
                        valid = false;
                    }
                    if ($("#passcode1").val() != $("#passcode2").val()) {
                        $("#real").html("(Password do not match)");
                        //$("#password1").css('background-color', '#FFFFDF');
                        valid = false;
                    }

                    return valid;
                }

            });

        });



    </script>







</body>

</html>