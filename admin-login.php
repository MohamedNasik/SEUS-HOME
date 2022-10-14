
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
			<div class="log-in-pop">
            <div class="box-inn-sp admin-form">

                    <h4>DashBoard</h4>
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

                                <input type="hidden" name="mail" id="mail" value="<?php echo $_GET['email']   ?>">
                                <input type="hidden" name="person" id="person" value="<?php echo $_GET['personid']   ?>">

                                <input  type="button" id="login" value="Submit"
                                    class="waves-effect waves-light log-in-btn">

                                </i> </div>
                        </div> <br><br>
                        <center> <div id="warn" class="text-danger"> </div> </center>
                        <center> <div id="warns" class="text-success"> </div> </center>

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
        var passcode = $('#passcode').val();
        var mail = $('#mail').val();
        var person = $('#person').val();



  var valid;
  valid = validateContact();

  if (valid) {

      $.ajax({
          url: "phpquery/passcode.php", // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: {  'passcode': passcode,
            'mail': mail,
            'person': person,

  },                
    


          success: function (response) {

              $('#success_mes').html(response);

              if ($.trim(response) === 'Success') {

$('#warns').html('The activation code is found. ');


setTimeout(function () {
    //Redirect with JavaScript
    window.location.href = 'password_reset.php?email=<?php echo $_GET['email'] ?>&person=<?php echo $_GET['personid']   ?>';
}, 2000);


}else if ($.trim(response) === 'Wrong Activation code'){

$('#warn').html('The activation code is wrong.');


}else{

$('#warn').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Error!</strong> Something went wrong. <a href="#" class="alert-link">  </a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


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