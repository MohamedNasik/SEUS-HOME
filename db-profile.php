<html >

<?php
require_once 'phpquery/dbconnection.php';
   // Initialize the session
   session_start();
   if(!isset($_SESSION['p_id'])){
    header('location:index.php');
    }
                ?>

<!-- Head Part -->
<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">


<script src="js/jquery.min.js"></script>
<script src="ajax/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="ajax/crop/croppie.css" />

<script src="ajax/crop/croppie.js"></script>



    <!-- ALL CSS FILES -->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

 


    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    
    <!-- <link rel="stylesheet" href="../adminpanel/assets/crop/croppie.css" />
    <script src="../adminpanel/assets/crop/croppie.js"></script> -->

<!-- <style>

#upload_button {
  display: inline-block;
}
#upload_button input[type=file] {
  display:none;
}

</style> -->

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

<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>




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
                   <!-- <figcaption><i class="fa fa-camera"></i></figcaption></figure> -->

<!-- <input id="upload_image" type="file" class="item-img file center-block upload" name="file_photo"> </label> -->

                        
                    </div>

                    

                    <div class="pro-user-bio">
                        <ul>
                            <li>
                              <h4>   Logged as: <?php echo $row["p_fname"].' '.$row["p_lname"]; ?>     </h4>
                            </li>
                            <li>Patient ID: <?php echo $row["p_id"]; ?>     </li>
                            <li>
                            <!-- <center>
    <div id="upload_button">
          <label>
     
        <input type="file" ngf-select ng-model="new_files" ng-change="fs.uploadFiles(new_files)" id="upload" name="upload" multiple>  
      <span class="btn btn-primary">Change Image</span>
        </label>
       </div>
       </center> -->
                                    
                            </li>
                    
                        </ul>
                    </div>
                </div>




                <div class="col-md-9">
                    <div class="udb">
                        <div class="udb-sec udb-prof">
                            <h4><img src="images/icon/db1.png" alt="" /> My Profile</h4>
                           


                            
                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="responsive-table bordered">
                                    <tbody>
                                        <tr>
                                            <td>Patient Name</td>
                                            <td>:</td>
                                            <td> <?php echo $row["prefix"]  ?>  <?php echo $row["p_fname"].' '. $row["p_lname"]; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Patient ID</td>
                                            <td>:</td>
                                            <td><?php echo $row["p_id"]; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Email ID</td>
                                            <td>:</td>
                                            <td><?php echo $row["email"]; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number</td>
                                            <td>:</td>
                                            <td><?php if( $row["p_contact"] !='0') {echo $row["p_contact"];}else{ echo 'Not Inserted'; } ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth</td>
                                            <td>:</td>
                                            <td><?php echo $row["dob"]; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>:</td>
                                            <?php 
                                            $today = new DateTime();
                                            $birthdate = new DateTime($row["dob"]);

                                            $interval = date_diff(date_create(), date_create($row["dob"]));
                                            
                                            ?>
                                            <td><?php  echo $interval->format("%Y Year, %M Months, %d Days Old"); ?> </td>

                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td><?php if( $row["p_address"] !='') {echo $row["p_address"];}else{ echo 'Not Inserted'; } ?> </td>
                                        </tr>
                                        <tr>
                                            <td>NIC No</td>
                                            <td>:</td>
                                            <td><?php if( $row["nic"] !='') {echo $row["nic"];}else{ echo 'Not Inserted'; } ?> </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><span class="db-done">Active</span> </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <div class="sdb-bot-edit">
                                   
                                    <a href="admin-panel-setting.php" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"><i
                                            class="fa fa-pencil"></i> Edit my profile</a>
                                </div>


                            </div>




                        </div>
                    
  




                        <!-- finish image -->
                        <?php

}
mysqli_free_result($result);

} 
else{
   header('index.php');
echo "No records matching your query were found.";
}
}


?>
                

                        <!-- finish timeline -->
                    </div>
                </div>
            </div>
        </div>



    </section>
    <!--SECTION END-->







    <?php   include ('headers/footer.php');?>


<?php   include ('headers/logreg.php');?>
    
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>

 


<!-- Ajax queries -->
<?php   include ('headers/query.php');?>



<script>  
$(document).ready(function(){
    
	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:150,
      height:150,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }


  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"profile/profilepic.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }


        
      });
      
      setInterval(function () {
        $('#user_data').load("profile/fetch.php").fadeIn("slow");
    }, 1000);

    })

  });


 

});  
</script>


<script>
$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});
</script>



</body>


</html>

