<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
        require_once 'phpquery/dbconnection.php';

         session_start();
         
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["p_id"])) {
           
            //  echo $_SESSION["username"];
        }
  

        ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>


<body>

<?php   include ('headers/blue_header.php');  ?>

   
    <!-- SLIDER -->
    <section>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item slider1 active">
                    <img src="images/slider/1.jpg" alt="">
                    <div class="carousel-caption slider-con">

                        <h2> We Care for Your Health<span> Every Moment </span></h2>
                        <p>Leading the way in medical excellence</p>
                        <a href="admission.php" class="bann-btn-1">Appointment</a><a href="about.php" class="bann-btn-2">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="images/slider/2.jpg" alt="">
                    <div class="carousel-caption slider-con">
                        <h2> Caring for better <span>life</span></h2>
                        <p>Guaranted safe & potent Medicine</p>
                        <a href="admission.php" class="bann-btn-1">Appointment</a><a href="about.php" class="bann-btn-2">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="images/slider/11.jpg" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Leading the way in <span>medical excellence</span></h2>

                        <p>
                            Medical Services that you can trust
                        </p>
                        <a href="admission.php" class="bann-btn-1">Appointment</a><a href="about.php" class="bann-btn-2">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-chevron-left slider-arr"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-chevron-right slider-arr"></i>
            </a>
        </div>
    </section>

    <!-- QUICK LINKS -->
    <section>
        <div class="container">
            <div class="row">
                <div class="wed-hom-ser">
                    <ul>
                        <li>
                            <a href="about.php" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img
                                    src="images/icon/h-ic1.png" alt=""> SEUS</a>
                        </li>
                        <li>
                            <a href="all-courses.php" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img
                                    src="images/icon/h-ic2.png" alt=""> Services</a>
                        </li>
                        <li>
                            <a href="departments.php" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img
                                    src="images/icon/h-ic4.png" alt=""> department</a>
                        </li>
                        <!-- <li>
                            <a href="seminar.html" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img
                                    src="images/icon/h-ic3.png" alt=""> Seminar</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- DISCOVER MORE -->


    <!-- POPULAR COURSES -->
    <section class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Centers For <span>Excellence</span></h2>
                    <!-- <p>Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec
                        pharetra augue.</p> -->
                </div>
            </div>


            <div class="row">
                   <!--POPULAR COURSES-->
                <div class="col-md-6">
                    <div>
                        <!--POPULAR COURSES-->
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="ed-rsear-img ed-faci-full-top">
                                <img src="images/departments/1.png" alt="">
                            </div>
                            <div class="ed-rsear-dec ed-faci-full-bot">
                                <h4><a href="#">Surgical Department</a></h4>
                                <p>General surgery mainly comprises surgical emergencies, trauma, abdominal, gastro intestinal, breast, endocrine, bariatric, skin and soft tissue surgeries.
                                Lanka Hospital General Operating Theatre is equipped with the latest equipment and advanced technology to carry out any complicated general surgery such as high-end laparoscopy systems, advanced laser techniques to stop bleeding, 
                                nerve monitoring systems to stop nerve damage and more. </p>
                                <!-- <span class="home-top-cour-rat">4.2</span> -->

                                <div class="hom-list-share">
                                  
                                </div>



                            </div>
                        </div>
                     

                    </div>
                </div>

                <!--POPULAR COURSES-->
                <div class="col-md-6">
                    <div>

                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="ed-rsear-img ed-faci-full-top">
                                <img src="images/departments/2.png" alt="">
                            </div>
                            <div class="ed-rsear-dec ed-faci-full-bot">
                                <h4><a href="#">RADIOLOGY department </a></h4>
                                <p>Through the use of an array of radiology & imaging services, we aim towards diagnosing diseases where outward symptoms don’t give the full picture.Radiological & imaging services include equipment ranging from MRI, sound scanning, Digital X-Ray, Digital Dental X ray, Dexa scan & Mammography. Our team of experienced and qualified consultant 
                                radiologist & radiographers will make you at ease, assisting you towards the accurate diagnosis.
                                </p>
                                <!-- <span class="home-top-cour-rat">4.2</span> -->

                                <div class="hom-list-share">
                                
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
    

        
                <!--POPULAR COURSES-->

                <!--POPULAR COURSES-->
                <div class="col-md-6">
                    <div>
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="ed-rsear-img ed-faci-full-top">
                                <img src="images/departments/5.png" alt="">
                            </div>
                            <div class="ed-rsear-dec ed-faci-full-bot">
                                <h4><a href="#">Gastroenterology</a></h4>
                                <p>The Department of Gastroenterology & Hepatology at Monilek hospital provides excellent facilities for the diagnosis, treatment and prevention of diseases of the digestive tract and liver. Patients having gastric, small bowel, colon, liver, pancreatic & biliary tract diseases undergo evaluation and management by skilled and experienced gastroenterologist here.

                                </p>
                                <!-- <span class="home-top-cour-rat">4.2</span> -->

                                <div class="hom-list-share">
                                 
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!--POPULAR COURSES-->


                <!--POPULAR COURSES-->
                <div class="col-md-6">
                    <div>
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="ed-rsear-img ed-faci-full-top">
                                <img src="images/departments/6.png" alt="">
                            </div>
                            <div class="ed-rsear-dec ed-faci-full-bot">
                                <h4><a href="#">Neorology</a></h4>
                                <p>Lanka Hospitals is a 256 bedded multi –disciplinary-tertiary care hospital offering critical emergency and routine Neurosurgical services, Neurological care, ICU care, laboratory and testing services, pharmacy and other vital services round the clock for patients seeking medical attention. 
                                The Department of Neurosurgery has the most modern equipment 
                                
                                </p>
                                <!-- <span class="home-top-cour-rat">4.2</span> -->

                                <div class="hom-list-share">
                               
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!--POPULAR COURSES-->

        </div>
    </section>



    <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Our Featured <span> Services</span></h2>
                            <p> For over a decade we have played a critical role in the nation’s strategy to provide
                                world-class medical care whilst balancing the equation of affordability and
                                accessibility for all Sri Lankans.</p>
                        </div>
                    </div>





                    <div class="ed-about-sec1">
                        <div class="ed-advan">
                            <ul>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/a.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Channaling Services</h4>
                                        <p>We offer highest standards of clinical skills and nursing care across wide range of specialties,</p>
                                        <a href="all-courses.php">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/b.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Emergency Services</h4>
                                        <p>Emergency Services Health only specialise in top-level cover for complete peace of mind. </p>
                                        <a href="all-courses.php">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/3.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Online appointments </h4>
                                        <p>An online booking system is a software you can use for reservation management. </p>
                                        <a href="all-courses.php">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/4.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Homecare Services</h4>
                                        <p>caring for people in need. We are caregivers, first and foremost.       Our promise to you is that we wi</p>
                                        <a href="all-courses.php">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/d.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>laboratory research</h4>
                                        <p>Research carried out in a laboratory for testing chemical substances, growing tissues in cultures,</p>
                                        <a href="all-courses.php">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/6.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>RMI Services </h4>
                                        <p>Remote Medical International® helps clients manage
                                                         and improve the health and well-being of their global </p>
                                        <a href="all-courses.php">Read more</a>
                                    </div>
                                </li>

                            </ul>



                        </div>
                    </div>


                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->






    <!--SECTION START-->
    <section>
        <div class="ed-res-bg">
            <div class="container com-sp pad-bot-70 ed-res-bg">
                <div class="row">
                    <div class="cor about-sp">
                        <div class="ed-rsear">
                            <div class="ed-rsear-in">
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="ed-about-sec1">
                            <div class="col-md-6">
                                <!-- <div class="ed-rese-grid ed-rese-grid-mar-bot-30"> -->
                                <div class="ed-rsear-img ed-faci-full-top">
                                    <img src="images/icon/1.png" alt="">
                                </div>

                                <!-- </div> -->


                            </div>
                            <div class="col-md-6">

                                <div class="con-title">
                                    <h2>A great medical team to <span>help your needs</span></h2>
                                    <br>
                                    <p>SEUS Hospital has dedicated and great medical team to help your needs</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->



    <!-- NEWS AND EVENTS -->
    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>News and <span>Events</span></h2>
                    <p>You can easily find new post of events and news.</p>
                </div>
            </div>
            <div class="row">
             
            
                <div class="col-md-12">
                    <div class="bot-gal h-blog ho-event">
                        <h4>News </h4>
                        <div class="ho-event">
                            <ul>


<?php 
require_once ('phpquery/dbconnection.php');

$stmt = $con->prepare("SELECT  DATE_FORMAT(published, '%d-%b-%Y') as pub_date,title,sub_title,blog_category,blog_id   FROM blog WHERE status='Active' ORDER BY blog_id DESC LIMIT 4");
// $stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
if(mysqli_num_rows($result)>0){
while($row = $result->fetch_assoc()) {
  $blog_id = $row['blog_id'];
  $title = $row['title'];
  $sub_title = $row['sub_title'];
  $blog_category= $row['blog_category'];
  $publishdate= $row['pub_date'];
 

  
?>             
                                <li>
                                    <div class="ho-ev-date"><?php  echo $publishdate  ?>
                                    </div>
                                    <div class="ho-ev-link">
                                    <a href="course-details.php?id=<?php echo $row['blog_id']?> ">
                                            <h4><?php echo $row['title'];?></h4>
                                        </a>
                                        <p><?php echo $row['sub_title'];?></p>
                                        <span><?php echo $row['blog_category'];?></span>
                                    </div>
                                </li>



                                
                      <?php   
}


}else{

    echo "No Blogs Found";

}
$stmt->close();  
?>
  <center>     <a href="blogs.php"> Read More</a>     </center>                     
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






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