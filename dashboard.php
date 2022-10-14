<!DOCTYPE html>
<html lang="en">

<?php
        // Initialize the session
         session_start();
        //  echo $_SESSION["username"];
        require_once 'phpquery/dbconnection.php';

     ?>




<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>

<?php    include ('headers/adminheader.php');  ?>

        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                    <div class="pro-user">
                        <img src="images/user.jpg" alt="user">
                    </div>
                    <div class="pro-user-bio">
                        <ul>
                            <li>
                                <h4>    <?php echo $_SESSION["username"]; ?></h4>
                            </li>
                            <li>Patient Id: ST17241</li>
                            <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li>
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

</body>


</html>