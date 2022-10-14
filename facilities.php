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
<!-- blue_header -->
<?php include ('headers/blue_header.php');  ?>
	<section>
        <div class="head-2">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                    <h1>Doctor Schedule</h1>
                    <p>Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p>
                    <div class="event-head-sub">
                        <ul>
                            <li>Dr.  <?php echo $_GET['name'];  ?></li>
                            <li><?php echo $_GET['spec'];  ?></li>
                            <li>SEUS Hospital</li>
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
                <div class="cor about-sp">
                    <div class="ed-rsear">
                        <div class="ed-rsear-in">
                         

				<div class="col-md-12">
				<div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>Dr.  <?php echo $_GET['name'];  ?>  (Weekly Schedule) </h4>
                           
                        </div>
						

						<div class="tab-inn">
                            <div class="table-responsive table-desi">
                                <table class="table table-hover" id="user_appoint">
                                    <thead>
                                        <tr>
                                    	        <th>Days</th>
												<th>Time (From)</th>
												<th>Time (To)</th>

                                        </tr>
                                    </thead>
                                    <tbody>

									<?php 

$stmt = $con->prepare("SELECT * FROM schedule WHERE user_id= ?");
 $stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0)  exit('No rows');
while($row = $result->fetch_assoc()) {

	$times = json_decode($row['available_days'],true);
		foreach($times as $key => $object) {

?>

<?php if(!empty($object['monday_start']) && !empty($object['monday_end'])): ?>
<tr>
  <td>Monday</td>
  <td><?php echo  $object['monday_start']; ?></td>
  <td><?php echo  $object['monday_end'] ?></td>
</tr>
<?php endif; ?>

<?php if(!empty($object['tuesday_start']) && !empty($object['tuesday_end'])): ?>
<tr>
  <td>TuesDay</td>
  <td><?php echo  $object['tuesday_start']; ?></td>
  <td><?php echo  $object['tuesday_end'] ?></td>
</tr>
<?php endif; ?>

<?php if(!empty($object['wednesday_start']) && !empty($object['wednesday_end'])): ?>
<tr>
  <td>WednesDay</td>
  <td><?php echo  $object['wednesday_start']; ?></td>
  <td><?php echo  $object['wednesday_end'] ?></td>
</tr>
<?php endif; ?>

<?php if(!empty($object['thursday_start']) && !empty($object['thursday_end'])): ?>
<tr>
  <td>ThursDay</td>
  <td><?php echo  $object['thursday_start']; ?></td>
  <td><?php echo  $object['thursday_end'] ?></td>
</tr>
<?php endif; ?>

<?php if(!empty($object['friday_start']) && !empty($object['friday_end'])): ?>
<tr>
  <td>FriDay</td>
  <td><?php echo  $object['friday_start']; ?></td>
  <td><?php echo  $object['friday_end']; ?></td>
</tr>
<?php endif; ?>

<?php if(!empty($object['saturday_start']) && !empty($object['saturday_end'])): ?>
<tr>
  <td>SaturDay</td>
  <td><?php echo  $object['saturday_start']; ?></td>
  <td><?php echo  $object['saturday_end']; ?></td>
</tr>
<?php endif; ?>

<?php if(!empty($object['sunday_start']) && !empty($object['sunday_end'])): ?>
<tr>
  <td>Sunday</td>
  <td><?php echo  $object['sunday_start']; ?></td>
  <td><?php echo  $object['sunday_end']; ?></td>
</tr>
<?php endif; ?>


<?php  } }
     
	 ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

						</div>
						</div>
				




                        </div>
                    </div>
                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
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

</body>


</html>