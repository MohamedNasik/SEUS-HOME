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


    <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70 pg-inn">
            <div class="row">
                <div class="cor">
                 

 <?php

require_once 'phpquery/dbconnection.php';

$sql="SELECT image,sub_title,title,publisher,blog_id,body, published FROM blog WHERE blog_id=? ";
$stmt=$con->prepare( $sql );
  $stmt->bind_param("s", $_GET['id']);


$res=$stmt->execute();
if( $res ){
    $stmt->store_result();
    $stmt->bind_result($image,$sub_title,$title,$publisher, $blog_id,$body,$published);

    while( $stmt->fetch() ){
   
        $filepath="../adminpanel/assets/img/blog_images/";
        $published=   date('dS F Y', strtotime($published));

      
        ?>

                    <div class="col-md-9">
                        <div class="cor-mid-img">
                        <?php     printf(
                    '<img  class="img-fluid" src="data:image/png;base64, %s" alt="" />',
                         base64_encode(file_get_contents($filepath.$image ) ) );  ?>   
                        </div>
                        <div class="cor-con-mid">
                            <div class="cor-p1">
                                <h2><?php  echo  $title  ?></h2>
                                <span><?php  echo  $sub_title  ?></span>
                                <div class="share-btn">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>  <?php echo  $publisher;  ?></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-pencil"></i> Published:  <?php echo  $published;  ?></a>
                                        </li>
                                        <!-- <li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="cor-p4">
                            
                                <p><?php  echo  $body  ?></p>
                            </div>
                          
                            <?php               
         
        }
        $stmt->free_result();
        // $stmt->close();
  

    }
?> 
                         
                            <div class="cor-p6">
                                <!-- <h3>Reviews</h3> -->
                                <!-- <div class="cor-p6-revi">
                                    <div class="cor-p6-revi-left">
                                        <img src="images/4.jpg" alt="">
                                    </div>
                                    <div class="cor-p6-revi-right">
                                        <h4>Rachel Britain</h4>
                                        <span>Date: 12may, 2017</span>
                                        <p>Mauris elementum et libero ac pharetra. Proin tristique dapibus tellus, lacinia blandit mi tincidunt at. Vivamus vitae interdum felis. Pellentesque congue mollis erat in imperdiet.</p>
                                    </div>
                                </div> -->
                            
                               
                                
                            </div>
                            <!-- <div class="cor-p6">
                                <h3>Write Reviews</h3>
                                <div class="cor-p7-revi">
                                    <form class="col s12">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" class="validate">
                                                <label>Name</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" class="validate">
                                                <label>Email id</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea class="materialize-textarea"></textarea>
                                                <label>Message</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="submit" value="Submit" class="waves-effect waves-light btn-book">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-md-3">
                        
                    <div class="cor-side-com">
                            <div class="">
                                <div class="de-left-tit">
                                    <h4>Other Blogs</h4>
                                </div>
                            </div>
                            <div class="ho-event">
                                <ul>
<?php 

$stmt1 = mysqli_prepare($con, "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 10");

$published=   date('dS F Y', strtotime($published));

$stmt1->execute();
$result1 = $stmt1->get_result();
if($result1->num_rows === 0);

while($row = $result1->fetch_assoc()) {
  $blog_id = $row['blog_id'];
  $title = $row['title'];
  $sub_title = $row['sub_title'];
  $body= $row['body'];
  $publishdate= $row['published'];
 
?>    


                                    <li>
                                        <div class="ho-ev-link ho-ev-link-full">
                                        <a href="course-details.php?id=<?php echo $row['blog_id']?> ">
                                                <h4><?php echo $row['title'];?></h4>
                                            </a>
                                            <p> <?php echo $row['sub_title'];?>  </p>
                                            <span><?php echo $published ?></span>
                                        </div>
                                    </li>
                                    
                                                               
                      <?php   
}
$con->close();
?>
                               
                                
                                </ul>
                            </div>
                        </div>
                    </div>

                        
                
                        <div class="cor-side-com">
                          
                          
                            <!-- <div class="ho-ev-latest in-ev-latest-bg-1">
                                <div class="ho-lat-ev">
                                    <a href="#">
                                        <h4>Job Vacants</h4>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    </a>
                                </div>
                            </div> -->
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


<!--Import jQuery before materialize.js-->
<?php   include ('headers/headfoot.php');?>

<!-- Ajax queries -->
<?php   include ('headers/query.php');?>


</body>


</html>