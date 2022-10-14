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
                    <img src="images/photo-1519494026892-80bbd2d6fd0d.jpg" alt="">
                    <div class="carousel-caption slider-con">

                        <h2> We Care for Your Health<span> Every Moment </span></h2>
                        <p>Leading the way in medical excellence</p>
                        
                    </div>
                </div>
              
               
            </div>

        
        
        </div>
    </section>



    <!-- DISCOVER MORE -->


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
                                <h2>ABOUT <span> SEUS HOSPITAL</span></h2>
                                    <br>
                                    <P>  
SEUS Hospital Corporation PLC commenced operations in Sri Lanka on 7th June 2002, under the brand name of Apollo Hospitals, a part of the chain of Apollo Hospitals founded by the renown Dr. Pratap C. Reddy in India. 
As the only purpose built private hospital of its kind in Sri Lanka, Apollo Colombo revolutionised Sri Lanka’s healthcare service, 
and today under the brand Lanka Hospitals, we continue to dominate and lead the healthcare sector. Ours is still considered to be the best health care facility in the country.
In 2012, we celebrated a decade of excellence in healthcare. 
</P>
                                </div>

                            </div>
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