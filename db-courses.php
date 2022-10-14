<!DOCTYPE html>
<html lang="en">
<?php
        // Initialize the session
         session_start();
        //  echo $_SESSION["username"];
        require_once 'phpquery/dbconnection.php';

        if(!isset($_SESSION['p_id'])){
            header('location:index.php');
            }

     ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>
<!-- <link rel="stylesheet" type="text/css" href="ajax/datatable/datatables.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="ajax/datatables/css/jquery.dataTables.min.css"/>

    <style>
label.cabinet{
	display: block;
	cursor: pointer;
}

label.cabinet input.file{
	position: relative;
	height: 0%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
  filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
  margin-top:-30px;
}

#upload-demo{
	width: 250px;
	height: 250px;
  padding-bottom:25px;
}
figure figcaption {
    position: absolute;
    bottom: 0;
    color: #fff;
    width: 100%;
    padding-left: 20px;
    padding-bottom: -20px;
    text-shadow: 0 0 10px #000;
}



</style>





<body>
<?php    include ('headers/adminheader.php');  ?>

<?php  
$sql = "SELECT * FROM patients WHERE p_id = '".$_SESSION["p_id"]."' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)) {
?>

<div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                    <div class="pro-user" id="uploadimage">
                        <!-- <img src="images/users.jpg" alt="user"> -->
                        <label class="cabinet center-block">
                 
                        <figure>  <image class="gambar img-responsive img-thumbnail" id="item-img-output" src="images/users.jpg" placeholder="sdsd" />  
                   <!-- <figcaption><i class="fa fa-camera"></i></figcaption></figure>
<input id="upload_image" type="file" class="item-img file center-block upload" name="file_photo"> </label> -->

                        
                    </div>

                   
               
                    <div class="pro-user-bio">
                        <ul>
                            <li>

                            <h4>   Logged as: <?php echo $row["p_fname"].' '.$row["p_lname"]; ?>     </h4>
                                <!-- <a href="phpquery/logout.php">log</a> -->
                            </li>
                            <li>Patient ID: <?php echo $_SESSION["p_id"]; ?>     </li>
                            <!-- <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li> -->
                        </ul>
                    </div>

                </div>

  <?php }} } ?>
                <div class="col-md-9">
                    <div class="udb">

                    <div class="udb-sec udb-cour-stat">
                            <h4><img src="images/icon/db3.png" alt="" /> Appoinments Status</h4>
                            <!-- <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.The point of using Lorem Ipsummaking it look like readable English.</p> -->
                            <div class="pro-con-table">
                                <table class="bordered responsive-table" id="myTable">
                                    <thead>
                                      
                                        <tr>
    <th class="text-center">Appt.ID</th>
    <th class="text-center">Doctor</th>
    <th class="text-center">Specialization</th>
   
    
    <th class="text-center">Appt.Date</th>

    <th class="text-center">Status</th>
    <th class="text-center">Edit Type</th>

</tr>

                                    </thead>

                                    <tbody>
<?php    

$stmt = $con->prepare("SELECT * FROM appointment as ap INNER JOIN users as u ON ap.user_id=u.user_id AND p_id=  ? AND doctor_status='3' AND patient_status='1' ORDER BY apt_id DESC ");
$stmt->bind_param("s", $_SESSION["p_id"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) ;
while($row = $result->fetch_assoc()) { 
?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['apt_id']   ?></td>
                                            <td class="text-center"><?php echo $row['fname'].' '.$row['lname']   ?></td>
                                            <td class="text-center"><?php echo $row['specilization']   ?></td>
                                            <td class="text-center"><?php echo $row['apt_date']   ?></td>
                                           
                                            <td class="text-center">
                                            
                                            <?php if($row['admin_status']=="3" && $row['patient_status']=="3") { ?>
                                            <span  class="label label-default">Un Attended</span>
                                           
                                            
                                            <?php } else if($row['admin_status']=="0" && $row['patient_status']=="3") { ?>
                                            <span  class="label label-danger">Cancel</span>
                                            

                                            <?php } else if($row['admin_status']=="1" && $row['patient_status']=="3") { ?>
                                            <span  class="label label-success">Active</span>
                                           
                                            
                                            <?php } else if($row['admin_status']=="3" && $row['patient_status']=="0") { ?>
                                            <span  class="label label-danger">Cancelled</span>
                                          

                                            <?php } else if($row['admin_status']=="0" && $row['patient_status']=="0") { ?>
                                            <span  class="label label-danger">Cancelled</span>
                                         

                                            <?php } else if($row['admin_status']=="1" && $row['patient_status']=="0") { ?>
                                            <span  class="label label-danger">Cancelled</span>
                                 

                                            <?php } else if($row['admin_status']=="0" && $row['patient_status']=="3") { ?>
                                            <span  class="label label-danger">Cancelled</span>
                                     
                                            <?php } else if($row['doctor_status']=="1") { ?>
                                            <span  class="label label-success">Completed</span>
                                           

                                            <?php } else if($row['admin_status']=="1" && $row['patient_status']=="1") { ?>
                                            <span  class="label label-success">Active</span>
                                            <?php   } ?>

                                            <td class="text-center"> <a href="edit_apt.php?no=<?php echo $row['No'] ?>" class="label label-primary"  >Edit</a></td>


                                            </td>  
                                                                                 
                                        </tr>
                                        
<?php   } ?>
            
                                    </tbody>
                          
                                </table>
                            
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



   <!--Import jQuery librar.js-->

   <script src="ajax/datatables/js/dataTables.bootstrap.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="ajax/datatables/js/datatables.min.js"></script>
   <?php   include ('headers/headfoot.php');?>

<!-- Ajax queries -->
<?php   include ('headers/query.php');?>

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

<script>
$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});
</script>


</body>


</html>