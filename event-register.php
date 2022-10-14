<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
         session_start();
         
    

        ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>
<?php   include ('headers/blue_header.php');  ?>



    <!--SECTION START-->
    <section class="c-all p-semi p-event">
        <div class="semi-inn">
            <div class="semi-com semi-left">
                <div class="all-title quote-title qu-new semi-text eve-reg-text">
                    <h2>College Expo</h2>
                    <p>Fusce purus mauris, blandit vitae purus eget, viverra volutpat nibh. Nam in elementum nisi, a placerat nisi. Quisque ullamcorper magna in odio rhoncus semper.Sed nec ultricies velit. Aliquam non massa id enim ultrices aliquet a ac
                        tortor.</p>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    <div class="semi-deta eve-deta">
                        <ul>
                            <li>DATE:<span>Jan 01, 2018</span></li>
                            <li>Time:<span>02:00 PM GMT</span></li>
                            <li>Topic:<span>Feature Technology</span></li>
                            <li>Location:<span>illinois, united states</span></li>
                        </ul>
                    </div>
                    <p class="help-line">Join this for free!</p>
                </div>
            </div>
            <div class="semi-com semi-right">
                <div class="n-form-com semi-form">
                    <div class="col s12">
                        <form class="form-horizontal">
                            <div class="form-group">
  


                                <div class="col-md-12">
                                    <!-- <input type="text" class="form-control" placeholder="Name" required> -->H2SDSDSD
                                    
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
								<option value="">Select Doctor</option>	
                                <?php echo load();   ?>
									
							  </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                <select name="doctorname" id="doctorname">
								<option value="">Select Doctor</option>										
							  </select>                              </div>
                            </div>
                      
                            <div class="form-group">
                                <div class="col-md-12">
                                <select name="aptid" id="aptid">
								<option value="">Select Appointment ID</option>										
							  </select>                                </div>
                            </div>
                         
                            <div class="form-group mar-bot-0">
                                <div class="col-md-12">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style=""><input type="submit" id="check"  value="Register NOW" class="waves-button-input"></i>
                                </div>
                            </div>
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
<?php   include ('headers/social.php');?>


<!--Import jQuery before materialize.js-->
<?php   include ('headers/headfoot.php');?>

<!-- Ajax queries -->
<?php   include ('headers/query.php');?>


<script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="ajax/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>





<script>

        //    start query
 $(document).ready(function () {

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



    $('#doctorname').change(function () {
    $('select').material_select();
   


var apt_id=$(this).val();

$.ajax({
            url: "phpquery/fetch_apt_id.php", // Url to which the request is send
            method: "POST",             // Type of request to be send, called as method
            data: {apt_id:apt_id  },
           // dataType:"text",

            success: function (data) {
                $("#aptid").html(data);
                $("#aptid").material_select();


         }

        });


    });




$(document).on('click', '#check', function () {

    var doctorspecilization = $('#doctorspecilization').val();
    var doctorname = $('#doctorname').val();
    var date = $('#date').val();
    var aptid = $('#aptid').val();

var data={ 
                'doctorspecilization': doctorspecilization,
                'doctorname': doctorname,
                'date': date,
                'type': type,

}

    var valid;
    valid = validateContact();

    if (valid) {

        $.ajax({
            url: "phpquery/addappointment.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,

            success: function (response) {

                $('#doctorspecilization').val('');
                
                $('#doctorname').val('');
                $('#date').val('');
           
                $('#type').val('');

                $('#success_mes').fadeIn().html(response);

                $("success_mes").fadeIn().html(response);
                setTimeout(function () {
                    $('#success_mes').fadeOut("Slow");
                }, 2000);

            }

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
  
        // if (!$("#doctorspecilization").val() == 'Select Specilization') {
        //     $("#datetimepicker4-info").html("(Required)");
        //     $("#datetimepicker4").css('background-color', '#FFFFDF');
        //     valid = false;
        // }

        if (!$("#doctorname").val()) {
              $("#doctor-info").html("(required)");
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