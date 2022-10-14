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
                
<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <br> <a href="#" class="logo"><img src="images/logo12.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <li></li>

            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <!-- <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="admin-all-enquiry.html" title="all enquiry messages"><i
                            class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.html" title="course booking messages"><i
                            class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.html" title="admission enquiry"><i
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
                    <li><a href="phpquery/logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i>
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
                <li class="active-bre"><a href="#"> Dashboard</a>
                </li>
                <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i>
                        Back</a>
                </li>
            </ul>
        </div>

        <!--== User Details ==-->
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp admin-form">


<?php
require_once 'phpquery/dbconnection.php';

$aptid=  base64_decode($_GET['aptid']);
$apt_date=  base64_decode($_GET['apt_date']);
$user=  base64_decode($_GET['user']);

$stmt = $con->prepare("SELECT * FROM prescription WHERE p_id= ? AND apt_id=? AND date=? AND user_id=?");
$stmt->bind_param("ssss",$_SESSION['p_id'], $aptid,$apt_date,$user);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0);
while($row = $result->fetch_assoc()) {
    $investigations = json_decode($row['investigations'],true);

    if (is_array($investigations) || is_object($investigations)) {
        foreach($investigations as $key => $object) {
?>


<div class="sb2-2-add-blog sb2-2-1">
<h2>Prescription Details of   <code> [<?php echo $row['decease_name']  ?>] </code>   </h2> <span class="home-top-cour-rat">
 <?php echo $row['pres_id']  ?></span>

                                <?php 
                    $specilization= base64_decode($_GET['specilization']);  
                    $doctorname= base64_decode($_GET['doctor_name']);      
                    
                    //echo  $aptid;
                   
                    ?> 
                                   <span class="list-enq-name"> Dr. <?php  echo  $doctorname; ?>  ( <?php  echo  $specilization;   ?> )</span>     <br>


                                   <ul class="nav nav-tabs tab-list">
                        <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true"><i class="fa fa-bed" aria-hidden="true"></i> <span>Investigation Details</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu1" aria-expanded="false"><i class="fa fa-bed" aria-hidden="true"></i> <span> Medicine Details</span></a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#menu2" aria-expanded="false"><i class="fa fa-bed" aria-hidden="true"></i> <span>Testing Details</span></a>
                        </li>
                        
                     
                    </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade  active in">
                                    <div class="inn-title">
                                    <h4>Investigations Information </h4>
                                    </div>
                                    <div class="bor">
                                        <div class="bor">
                                        <span> <strong> Remarks of the Past Testings:  </strong></span>
                                            <br><br>
                                            <?php echo $object['past_history'] ?>
                                        </div>

                                        <div class="bor">
                                        <span><strong> complaints (any): </strong></span>
                                            <br><br>
                                            <?php echo $object['complaints'] ?>
                                        </div>

                                        <div class="bor">
                                        <span><strong> Examination Findings:</strong> </span>
                                            <br><br>
                                            <?php echo $object['special_investigations'] ?>
                                        </div>
                                        <?php       
              
} } }
?>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade ">
                                    <div class="box-inn-sp">
                                        <div class="inn-title">
                                            <h4>Medicine Information</h4>

                                        </div>
                                        <div class="bor">
                                            <div class="table-responsive table-desi">
                                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Medicine Name</th>
										<th>Morning</th>
										<th>Noon</th>
                                        <th>Night</th>
                                        <th>Period (Days)</th>
                                        </tr>
                                    </thead>
                                    <tbody>	

         <?php
        require_once 'phpquery/dbconnection.php';

$aptid=  base64_decode($_GET['aptid']);
$apt_date=  base64_decode($_GET['apt_date']);
$user=  base64_decode($_GET['user']);   

        $stmt = $con->prepare("SELECT * FROM prescription WHERE p_id= ? AND apt_id=? AND date=? AND user_id=?");
        $stmt->bind_param("ssss",$_SESSION['p_id'], $aptid,$apt_date,$user);
        $stmt->execute();
       $result = $stmt->get_result();
       if($result->num_rows === 0);
       while($row = $result->fetch_assoc()) {
                     $remark=$row['remark'];
                          $medRecords = json_decode($row['med_records'],true);
                            if (is_array($medRecords) || is_object($medRecords)) {
                              foreach($medRecords as $key => $object) {

                                if(isset($object['medical'])){

                                    $medicines=  $object['medical'];
                    
                                    if( $medicines=='No need Medicines'){
                                        $tests ='No need testings';
                                
                                ?>                         
 

<tr>  <td colspan="5"> <center>  Medicines did not provided  </center></td>  </tr>              
  <?php  }   } else{   ?>     
                            
                                <tr>
                                                              <td><?php echo $object['medname'] ?></td>
                                                              <td><?php echo $object['morning'] ?></td>
                                                              <td><?php echo $object['noon'] ?></td>
                                                              <td><?php echo $object['night'] ?></td>
                                                              <td><?php echo $object['period'] ?></td>
                                                      </tr>
                                                      <?php
           } }}   }  
                  
              ?>  
                                                  </tbody>
                                </table>
                                            </div>

                                            <div class="bor">
                                                <span><strong> Remark (Diet Advice): </strong></span>
                                                <br><br>
                                                <?php echo  $remark    ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="inn-title">
                                        <h4>Testing Information</h4>
                                        <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                                    </div>
                                    <div class="bor ad-cou-deta-h4">

                                        <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Testings</th>
										<th>Testing Remark</th>
									
                                        </tr>
                                    </thead>
                                    <tbody>	
                                    <?php

        require_once 'phpquery/dbconnection.php';
        $aptid=  base64_decode($_GET['aptid']);
        $apt_date=  base64_decode($_GET['apt_date']);
        $user=  base64_decode($_GET['user']);   
        
        $stmt = $con->prepare("SELECT * FROM prescription WHERE p_id= ? AND apt_id=? AND date=? AND user_id=?");
        $stmt->bind_param("ssss",$_SESSION['p_id'], $aptid,$apt_date,$user);
        $stmt->execute();
       $result = $stmt->get_result();
       if($result->num_rows === 0);
       while($row = $result->fetch_assoc()) {
               $medRecords = json_decode($row['testing_details'],true);


                   if (is_array($medRecords) || is_object($medRecords)) {
                        foreach($medRecords as $key => $object) {

                          $tests=  $object['testings'];
                          if( $tests=='No need testings'){
                              $tests ='No need testings';
                          }else{ 
                          $tests=  implode(" , ",$tests);// Use of implode function  s
                          }
?>			                                 
                                        <tr>
                                        <td><?php echo $tests ?></td>
										<td><?php echo $object['testingremark'] ?></td>
											
                                        </tr>
                                        <?php
     } }}
?>  
                                    </tbody>
                                </table>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!--Import jQuery librar.js-->
    <?php   include ('headers/headfoot.php');?>
</body>


</html>