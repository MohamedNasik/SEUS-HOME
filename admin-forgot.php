<!DOCTYPE html>
<html lang="en">


<?php
        // Initialize the session
         session_start();
         
    

        ?>

<!-- Head Part -->
<?php include ('headers/headpart.php');  ?>

<body>

   <section>
		<div class="ad-log-main">
			<div class="ad-log-in">
				<div class="ad-log-in-logo">
                  <a href="#" class="logo"><img src="images/logo12.png" alt="" />
				</div>
				<div class="ad-log-in-con">
			<div class="log-in-pop-right">
                    <h4>Forgot Password</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name" class="validate">
                                <label class="">User name</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="email" class="validate">
                                <label>Email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                    <input type="checkbox" id="test5">
                                    <label for="test5">Remember me</label>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style=""><input type="submit" value="Submit" class="waves-button-input"></i> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="admin-login.html">Admin login</a> | <a href="#">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
				</div>
			</div>
		</div>
   </section>

   <!--Import jQuery librar.js-->
   <?php   include ('headers/headfoot.php');?>
</body>


</html>