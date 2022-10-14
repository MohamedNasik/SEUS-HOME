
<?php
        // Initialize the session
         session_start();
         
         if(isset($_SESSION['p_id'])){
            header('location:index.php');
            }



         include "phpquery/dbconnection.php";

         $email =$_GET['email'];
         $password = $_GET['password'];
         $first_name = $_GET['first_name'];
         $last_name= $_GET['last_name'];
         $gender = $_GET['gender'];
         $dob= $_GET['dob'];
         $prefix= $_GET['prefix'];


        ?>

<!DOCTYPE html>
<html lang="en">




<!-- Head Part -->

<?php include ('headers/headpart.php');   ?>
<link href="css/mat.css" rel="stylesheet">

<body>



   <section>
		<div class="ad-log-main">
			<div class="ad-log-in">
				<div class="ad-log-in-logo">
				<img src="images/logo12.png" alt="">
				</div>
      
		<div class="ad-log-in-con">
			<div class="log-in-pop">
            <div class="box-inn-sp admin-form">
  <code> Activation Code is sent to the email </code>
                    <h4>Patient Account Verification</h4>
                    <p>Enter your activation code...</p>
                    <form name="pass" id="pass" method="post" class="s12" enctype="multipart/form-data" data-toggle="validator">
                   
                        <div>
                            <div class="input-field s12">
                                <input id="passcode" type="text" class="validate">
                               <br> <!-- <label>Password</label> -->
                               <small> <span id="passed" class="info"></span>   </small>
                  
                            </div>
                        </div>  
                      </div>
                        <div>
                            <div class="input-field s4">
                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                <!-- <button type="submit" id="login" value="Login" class="waves-button-input">Login</button> -->

                                <input type="hidden" name="email" id="email" value="<?php echo $_GET['email'];   ?>">
                                <input type="hidden" name="prefix" id="prefix" value="<?php echo $_GET['prefix'] ;  ?>">
                                <input type="hidden" name="first_name" id="first_name" value="<?php echo $_GET['first_name'];   ?>">
                                <input type="hidden" name="last_name" id="last_name" value="<?php echo $_GET['last_name'];   ?>">
                                <input type="hidden" name="password" id="password" value="<?php echo $_GET['password'];  ?>">
                                <input type="hidden" name="dob" id="dob" value="<?php echo $_GET['dob'];   ?>">
                                <input type="hidden" name="gender" id="gender" value="<?php echo   $_GET['gender'];   ?>">


                                <input type="button" id="login" value="Submit" class="waves-effect waves-light log-in-btn">

                                </i> </div>
                        </div>
                        <center> <div id="warn"> </div> </center>

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


    $(document).on('click', '#login', function () {

        var password = $('#password').val();
        var email = $('#email').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var prefix = $('#prefix').val();
        var gender = $('#gender').val();
        var dob = $('#dob').val();
        var passcode = $('#passcode').val();



  var valid;
  valid = validateContact();

  if (valid) {

      $.ajax({
          url: "phpquery/verification.php", // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: {  
            'passcode': passcode,
            'email': email,
            'dob': dob,
            'gender': gender,
            'prefix': prefix,
            'first_name': first_name,
            'last_name': last_name,
            'password': password,

  },                
    


          success: function (response) {

              $('#success_mes').html(response);

              if ($.trim(response) === 'Successfully Saved') {
                $('#warn').html('<div class="materialert success"> <div class="material-icons">Success!</div> Activation Code found :) </div>');

setTimeout(function () {


    window.location.href = 'db-profile.php';
}, 2000);


}else if ($.trim(response) === 'Wrong Activation code'){

 $('#warn').html('<div class="materialert error"> <div class="material-icons">Error!</div> Wrong Activation Code :( </div>');
// $("#warn").html("(Required)");


}else{

    $('#warn').html('<div class="materialert error"> <div class="material-icons">Error!</div> Wrong Activation Code :( </div>');


}


          }

      });
  };

  // check validations
  function validateContact() {
      var valid = true;
      $(".demoInputBox").css('background-color', '');
      $(".info").html('');

  
      if (!$("#passcode").val()) {
          $("#passed").html("(Required)");
       //   $("#email").css('background-color', '#FFFFDF');
          valid = false;
      }

      return valid;
  }

});

});



</script>






   
</body>

</html>