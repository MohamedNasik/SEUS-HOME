<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
         session_start();
         
    

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
                    <h1>Photo Gallery</h1>
                    <p>Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p>
                    <div class="event-head-sub">
                        <ul>
                            <li>Photos: College</li>
                            <li>Total photos: 500</li>
                            <li>Location: Illunois</li>
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
                <div class="cor about-sp h-gal ed-pho-gal">
					<ul>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/8.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/9.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/10.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/11.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/1.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/2.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/3.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/4.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/5.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/6.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/7.jpg" alt="">
						</li>
						<li><img class="materialboxed" data-caption="Education master image captions" src="images/ami/8.jpg" alt="">
						</li>
					</ul>
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



</html>