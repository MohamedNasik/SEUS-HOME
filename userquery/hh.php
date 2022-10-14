<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
         session_start();
         require_once 'phpquery/dbconnection.php';
        ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>
<?php    include ('headers/adminheader.php');  ?>

        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                    <div class="pro-user">
                        <img src="images/user.jpg" alt="user">
                    </div>
                    <div class="pro-user-bio">
                        <ul>
                            <li>
                                <h4>Emily Jessica</h4>
                            </li>
                            <li>Student Id: ST17241</li>
                            <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="udb">
                        <div class="udb-sec udb-time">
                            <h4><img src="images/icon/db5.png" alt="" /> Pending Testings</h4>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <div class="tour_head1 udb-time-line days">
                             
                               <form id="lab" method="post" enctype="multipart/form-data">

                               <?php    

$stmt = $con->prepare("SELECT * FROM prescription AS p INNER JOIN  users AS u ON p.user_id=u.user_id AND p.testing_status='0' WHERE p_id= ? ORDER BY p.apt_id DESC");
$stmt->bind_param("s", $_SESSION["p_id"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0); 
while($row = $result->fetch_assoc()) { 
    $reconsult=$row['reconsult_date'];
    $username=$row['username'];
    $date=$row['date'];
    $aptid=$row['apt_id'];
    $pres_id=$row['pres_id'];
    
    $medRecords = json_decode($row['testing_details'],true);


    if (is_array($medRecords) || is_object($medRecords)) {
         foreach($medRecords as $key => $object) {

           $tests=  $object['testings'];
           if( $tests=='No need testings'){
               $tests ='No need testings';
           }else{ 
               
?> <br>
<h4><img src="images/icon/db3.png" alt="" /> Some pending testings available on Appointment ID : <?php echo $aptid  ?></h4>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                <ul>
                                    <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <div class="sdb-cl-tim">
                                            <div class="sdb-cl-day">
                                                <h5>Prescription Date</h5>
                                                <span>Dr. <?php echo $username  ?></span>
                                            </div>
                                            <div class="sdb-cl-class">
                                                <ul>
                                                    <li>
                                                        <div class="sdb-cl-class-tim">
                                                            <span><?php echo $date  ?></span>
                                                
                                                        </div>
                                                        <div class="sdb-cl-class-name">
               <?php                 
                  $i = 0;
                           if (is_array($tests) || is_object($tests)){
                           foreach($tests as $value){
                            $i = uniqid(); 
                           ?>

                                                     <input type="hidden" id="presid" value="<?php echo $pres_id  ?>">
                                                            <h5><?php   echo  $value; ?> <span>  <input type="checkbox" name="tests" value="<?php echo  $value;  ?>" class="filled-in test" id="filled-in-box-<?php echo $i; ?>" />
                                                             <label for="filled-in-box-<?php echo $i; ?>"></label> </span></h5>
                                                            <span class="sdn-hall-na">Apj Hall 112</span>   

                                                            <?php  } ?>
                                                        </div>                                                     
                                                    </li>
                                             
                                                </ul>
                                            



                                            </div>
                                        </div>
                                    </li>
                         
                                    <li class="l-info-pack-plac"> <i class="fa fa-user" aria-hidden="true"></i>
                                        <h4><span>Holiday: </span> Thursday </h4>
                                        <p> <span>Recultation date  : </span><?php echo $reconsult  ?></p>
                                    </li>
                                </ul>
                      
                                <?php   
            }
                 ?>
  

                                <center>       <div class="row">
                                            <div class="input-field col s12">
                                                <!-- <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="button" id="confirm" class="waves-button-input" value="Confirm"></i> -->
                                                <input type="button" class="btn btn-success submit-btn" name="confirm" value="Confirm" id="confirm">
                                                <span>  <input type="button" class="btn btn-danger submit-btn" name="Register" value="Cancel" id="Register"> </span>

                                            </div>
                                    
            
                        
                                            
                                        </div>    </center> 
                                        <?php  } }  }
        
      
        ?>
<?php  } ?>
                                </form>
            



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

    <?php   include ('headers/footer.php');
?>

<?php   include ('headers/logreg.php');?>

    <?php   include ('headers/social.php');
?>

   <!--Import jQuery librar.js-->
   <?php   include ('headers/headfoot.php');?>


   <!-- Ajax queries -->
<?php   include ('headers/query.php');?>

<script>

$(document).ready(function () {

$(document).on('click', '#confirm', function () {

   //     var checkbox_value = "";
    // $(":checkbox").each(function () {
    //     var ischecked = $(this).is(":checked");
    //     if (ischecked) {
    //         checkbox_value += $(this).val() + " | ";
    //     }
    // });

    var testings = new Array();
$('input[name="tests"]:checked').each(function() {
    testings.push(this.value);
});
var presid = $('#presid').val();
var testings={ 'testings': testings,  'presid': presid  }


//console.log(checkbox_value);


    //   var valid;
    //   valid = validateContact();

    //   if (valid) {

          $.ajax({
              url: "userquery/confirm.php", // Url to which the request is send
              method: "POST",             // Type of request to be send, called as method
              data:  testings,   
            

              success: function (response) {
               //   $('#blog_status').val('');

                  $('#success_mes').html(response);

                  if (response == "Successfully saved") { // if the response is 1
                        $("success_mes").fadeIn().html("Department Added Successfully ");
                                setTimeout(function(){  
                               $('#success_mes').fadeOut("Slow");  
                          }, 5000); 
                        return true;
 
                    } else{
                        $("success_mes").fadeIn().html(response);
                          setTimeout(function(){  
                         $('#success_mes').fadeOut("Slow");  
                    }, 5000); 

                    } 
              }

          });
    //   };

      // check validations
    //   function validateContact() {
    //       var valid = true;
    //       $(".demoInputBox").css('background-color', '');
    //       $(".info").html('');

    //       if (!$("#dept_name").val()) {
    //           $("#blogtitle").html("(required)");
    //         //  $("#username").css('background-color', '#FFFFDF');
    //           valid = false;
    //       }
    //       if (!$("#dept_desc").val()) {
    //           $("#blogsub").html("(Required)");
    //        //   $("#email").css('background-color', '#FFFFDF');
    //           valid = false;
    //       }
  
    //       return valid;
    //   }

});

});
</script>







</body>


</html>