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
<?php   include ('headers/blue_header.php');  ?>


	<section>
        <div class="head-2">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                    <h1>Our Well Experienced Doctors. </h1>
                    <p>To offer highest quality medical services we need a highly professional medical team: Doctors practicing in our <br> clinic are experienced and have a high professional standard.</p>
                    <div class="event-head-sub">
                        <ul>
                            <li>Consultants</li>
                            <li>Time: 24 X 7</li>
                            <li>Location: SEUS Health Care</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


       
                 

    </section>	
    
    



    <!--SECTION START-->
    <section>
        <div class="ed-res-bg">
		<div class="container com-sp pad-bot-70 ed-res-bg">
            <div class="row">
                <!-- <div class="cor about-sp">
                    <div class="ed-rsear">
                        <div class="ed-rsear-in"> -->


                        <?php
  include ('phpquery/dbconnection.php');

  $stmt = $con->prepare("SELECT * FROM users AS u INNER JOIN  doctor_specialist AS s ON  u.role_id = '2' INNER JOIN doctorspecilization as ds ON ds.specilization = s.specilization AND u.user_id=s.user_id  ");
  //$stmt->bind_param("s",$_POST["doctor_name"]);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
  
    $filepath="../adminpanel/profile/blog/";
     $image=$row['image'];
     
 ?> 


                <div class="col-md-6">
                    <div>
                        <!--POPULAR COURSES-->
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="col-md-3"> 
                            <?php
                                
                                printf('<img class="inline-block"     src="data:image/png;base64, %s" alt="user" />',
                               base64_encode(file_get_contents($filepath.$image ) ) );  ?>
                           
                            </div>
                            <!--POPULAR COURSES: CONTENT-->
                            <div class="col-md-9 home-top-cour-desc">
                             <br> <br>   <a href="#">
                                    <h3>Dr. <?php echo $row['fname'].' '.$row['lname']   ?></h3>
                                </a>
                                <h5> SEUS Hospital Bandarawela</h5>
                                <h5> Doctor Consultation Charge: <?php echo $row['fees']  ?></h5>

                                <span class="home-top-cour-rat"><?php echo $row['specilization']  ?></span>
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="admission.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Book Now</a> </li>
                                        <li><a href="events.php"><i class="fa fa-calendar" aria-hidden="true"></i> Available Days</a> </li>
                                        <!-- <li><a href="course-details.php"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php
              }
             
                  }

                

?>

                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>

                <!-- </div> -->
            </div>
        </div>
		</div>
      

        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit fa-lg"></i> Payment for this patient</button> -->



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title text-center" id="exampleModalLabel">Payment Status of <?php echo $_GET['name'];    ?> (Patient) </h5>
      </div>

      <div class="modal-body">
    
      </div>
      
      <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" id="activeid"  class="btn btn-primary">Active</button>
						</div>
    </div>
  </div>
</div> -->


    </section>
    <!--SECTION END-->
    <!-- FOOTER COURSE BOOKING -->
    <?php  include ('headers/footer.php');  ?>



<!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
<?php   include ('headers/logreg.php');?>


<!-- SOCIAL MEDIA SHARE -->



<!--Import jQuery before materialize.js-->
<?php   include ('headers/headfoot.php');?>


<!-- Ajax queries -->
<?php   include ('headers/query.php');?>


</body>


</html>