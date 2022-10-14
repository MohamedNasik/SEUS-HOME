<!DOCTYPE html>
<html lang="en">

<?php
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
                <a href="#" class="logo"><img src="images/logo12.png" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <!-- <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form> -->
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <!-- <a class='waves-effect btn-noti' href="admin-all-enquiry.html" title="all enquiry messages"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-course-enquiry.html" title="course booking messages"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="admin-admission-enquiry.html" title="admission enquiry"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a> -->
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="images/users.jpg" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="admin-panel-setting.php" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="phpquery/logout.php" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
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
                        <li class="active-bre"><a href="#"> Patient Profile</a>
                        </li>
                        <li class="page-back"><a href="db-profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>

    <!--SECTION START-->


<section>
<div>



        <!--== User Details ==-->
        <div class="sb2-2-3">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                
<?php 
require_once 'phpquery/dbconnection.php';

$sqli = "SELECT * FROM prescription as p INNER  JOIN  users AS u ON p.user_id=u.user_id AND p.p_id= '".$_SESSION['p_id']."'   ORDER BY pres_id DESC ";
if($result = mysqli_query($con, $sqli)){
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {

        $investigations = json_decode($row['investigations'],true);
        $testing_details = json_decode($row['testing_details'],true);

        if (is_array($investigations) || is_object($investigations ) && is_array($testing_details) || is_object($testing_details )  ) {
        

            foreach($investigations as $key => $object) {
                foreach($testing_details as $keys => $objects) {
?>


                            <div class="col-md-6">
							<div class="ed-rese-grid ed-rese-grid-mar-bot-30">
								<!-- <div class="ed-rsear-img">
									<img src="images/course/sm-6.jpg" alt="">
								</div> -->
								<div class="ed-rsear-dec">
                                <h3> <?php echo $row['decease_name']   ?></h3>
									<a href="#">Consultant <span> <?php echo $row["fname"].' '. $row["lname"] ; ?></span></a><br>
                                    <?php        $tests=  $objects['testings'];
                          if( $tests=='No need testings'){
                              $tests ='No need testings';
                          }else{ 
                          $tests=  implode(" , ",$tests);// Use of implode function  s
                          }  ?>
									<a href="#">Tests to perform: <span><?php  echo $tests ?></span></a><br>
									<a href="#">Reconsultation Date:  <span>     <?php   if($row['reconsult_date'] == '0000-00-00' ){ echo 'No Need';  }else{ echo $row['reconsult_date']; }   ?></span></a><br>
									<a href="#">Test Status:  
                                    
                                    <?php if( $row['testing_status'] == '3'){  ?>
                                    <span>     <?php  echo 'No Need' ?></span></a><br>
                                    <?php }elseif($row['testing_status'] == '1') { ?>
                                    <span>     <?php  echo 'Yes' ?></span></a><br>
                                    <?php }  ?>



									<div class="ed-flag">  <span class="home-top-cour-rat"> <?php echo $row['pres_id']  ?></span></div>
								</div>
							</div>

                            </div>

                            <?php
            }}}}


    }}
?>

            
                    
                            </div>
                        </div>









<div class="row">
<div class="col-md-10 tab-hide">






<!-- 
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Cras justo odio
  </a>
  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>

  <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
</div>
</div></div></div> -->


</section>


         <section>

                <div class="ho-event pg-eve-main">
                                <ul>




                                  
                                
                                

                                </ul>
                            </div>
                        </div>
                      

                     
    </section>
    <!--SECTION END-->




        




        
            </div>

        </div>
    </div>

    <!--Import jQuery librar.js-->
    <?php   include ('headers/headfoot.php');?>

<!-- Ajax queries -->
<?php   include ('headers/query.php');?>


</body>


</html>