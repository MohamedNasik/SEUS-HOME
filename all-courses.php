<!DOCTYPE html>
<html lang="en">
<?php
        // Initialize the session
         session_start();
        //  echo $_SESSION["username"];
     ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>
<!-- blue_header -->
<?php include ('headers/blue_header.php');  ?>
<section class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Our Featured <span>Services</span></h2>
                    <p>We are the number one service providers around this country.</p>
                </div>
            </div>


            <!--SECTION START-->
            <section>
                <div class="ed-res-bg">
                    <div class="container com-sp pad-bot-70 ed-res-bg">
                        <div class="row">
                            <div class="cor about-sp">
                                <div class="ed-rsear">
                                    <div class="ed-rsear-in">
                                        <ul>
                                            <li>
                                                <div class="ed-rese-grid">
                                                    <div class="ed-rsear-img ed-faci-full-top">
                                                        <img src="images/facilities/1.png" alt="">
                                                    </div>
                                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                                        <h4><a href="#">Channaling Services</a></h4>
                                                        <p>We offer highest standards of clinical skills and nursing care across wide range of specialties, 
                                                        with leading specialist  doctors and surgeons along with spacious consultation rooms 
                                                        that meet international standards</p>
                                                    
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ed-rese-grid">
                                                    <div class="ed-rsear-img ed-faci-full-top">
                                                        <img src="images/facilities/2.png" alt="">
                                                    </div>
                                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                                        <h4><a href="#">Online appointments </a>
                                                        </h4>
                                                        <p>An online booking system is a software you can use for reservation management. 
                                                        They allow tour and activity operators to accept bookings
                                                         online and better manage their phone and in person bookings. 
                                                         But they also do so much more than that.  </p>
                                                       
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ed-rese-grid">
                                                    <div class="ed-rsear-img ed-faci-full-top">
                                                        <img src="images/facilities/3.png" alt="">
                                                    </div>
                                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                                        <h4><a href="#">Homecare Services</a></h4>
                                                        <p>The team at SEUS  has a single mission: making a difference by 
                                                        caring for people in need. We are caregivers, first and foremost. 
                                                        Our promise to you is that we will treat our patients, customers and teams with respect. </p>
                                                     
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ed-rese-grid">
                                                    <div class="ed-rsear-img ed-faci-full-top">
                                                        <img src="images/facilities/4.png" alt="">
                                                    </div>
                                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                                        <h4><a href="#">Laboratory research</a></h4>
                                                        <p>Research carried out in a laboratory for testing chemical substances, growing tissues in cultures, or performing 
                                                        microbiological, biochemical, hematological, microscopical, immunological, parasitological tests, etc. </p>
                                                      
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ed-rese-grid">
                                                    <div class="ed-rsear-img ed-faci-full-top">
                                                        <img src="images/facilities/5.png" alt="">
                                                    </div>
                                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                                        <h4><a href="#">RMI Services</a></h4>
                                                        <p>A Seattle-based company with an international footprint, Remote Medical International® helps clients manage
                                                         and improve the health and well-being of their global workforce. 
                                                         By creating an ecosystem of medical screenings, on-site medical staff, 
                                                        and injury.</p>
                                                       
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ed-rese-grid">
                                                    <div class="ed-rsear-img ed-faci-full-top">
                                                        <img src="images/facilities/6.png" alt="">
                                                    </div>
                                                    <div class="ed-rsear-dec ed-faci-full-bot">
                                                        <h4><a href="#">Emergency Services</a></h4>
                                                        <p>That's why Emergency Services Health only specialise in top-level cover for complete peace of mind. 
                                                        We make your private health insurance choices as simple as possible to ensure maximum value. 
                                                        We don’t overload you with options, or opt-ins or opt-outs. 

</p>
                                                     
                                                    </div>
                                                </div>
                                            </li>
                           
                                       
                                      
                                       
                                        </ul>
                                    </div>
                                </div>
                                </div>
    </section>


                                <div class="ed-about-sec1">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6"></div>
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