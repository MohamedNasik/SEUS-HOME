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

    <!--SECTION START-->
    <section class="c-all p-semi">
        <div class="semi-inn">
            <div class="semi-com semi-left">
                <div class="all-title quote-title qu-new semi-text">
                    <h2>Seminar 2018</h2>
                    <p>Fusce purus mauris, blandit vitae purus eget, viverra volutpat nibh. Nam in elementum nisi, a placerat nisi. Quisque ullamcorper magna in odio rhoncus semper.Sed nec ultricies velit. Aliquam non massa id enim ultrices aliquet a ac
                        tortor.</p>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    <div class="semi-deta">
                        <ul>
                            <li>DATE:<span>Jan 01, 2018</span></li>
                            <li>Time:<span>02:00 PM GMT</span></li>
                            <li>Topic:<span>Feature Technology</span></li>
                            <li>Location:<span>illinois, united states</span></li>
                        </ul>
                    </div>
                    <p class="help-line">Join this for free!</p>
                </div>
            </div>
            <div class="semi-com semi-right">
                <div class="n-form-com semi-form">
                    <div class="col s12">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" placeholder="Phone number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" placeholder="Email id" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Country">
                                </div>
                            </div>
                            <div class="form-group mar-bot-0">
                                <div class="col-md-12">
                                    <i class="waves-effect waves-light light-btn waves-input-wrapper" style=""><input type="submit" value="APPLY NOW" class="waves-button-input"></i>
                                </div>
                            </div>
                        </form>
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