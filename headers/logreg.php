<?php  include_once ('phpquery/dbconnection.php');   ?>
<section>
        <!-- LOGIN SECTION -->
        <div id="modal1" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Get benefits just simply login!</h4>
                    <ul>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Login</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>

                    
                    <form class="s12" method="post" id="loginform" enctype="multipart/form-data">
                        <div>
                            <div class="input-field s12">
                                <input type="text" name="lemail" id="lemail" data-ng-model="name" class="validate">
                                <label>Email</label>
                                <span id="Email-info" class="info"></span><br />

                            </div>

                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" name="lpassword" id="lpassword" class="validate">
                                <label>Password</label>
                                <span id="pass" class="info"></span><br />

                            </div>
                        </div>
                        <!-- <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                    <input type="checkbox" id="test5" />
                                    <label for="test5">Remember me</label>
                                </p>
                            </div>
                        </div> -->
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Login" id="login" class="waves-effect waves-light log-in-btn"> </div>
                                <center> <div id="error"> </div> </center>
                             </div>
                           <!-- <center> <div id="error"> </div> </center> -->
                           <center>   <div id="requered"> </div>  </center>

                        <div>
                            <div class="input-field s12">
                             <a href="#" data-dismiss="modal" data-toggle="modal"
                                    data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal"
                                    data-toggle="modal" data-target="#modal2">Create a new account</a> </div>         
                        </div>
                     
                    </form>

                </div>
            </div>
        </div>

        <!-- REGISTER SECTION -->

        <div id="modal2" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Get benefits just simply register!</h4>
                    <ul>
                      
                    <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                                    data-target="#modal1">Are you a already member ? Login</a> </div>
                        </div>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                     
               
                    </ul>
                    
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Create an Account</h4>
                    <!-- <p>Don't have an account? Create your account. It's take less then a minutes</p> -->
                    <span id="success_mes" class="text-success"></span>

                    <form name="poster" id="poster" method="post" class="s12" enctype="multipart/form-data" data-toggle="validator">
                                <div class="row">
                                <div class="input-field col s2" class="select">
                                <select class="select" id="prefix" name="prefix">
                                            <option value="Select">Select</option>
                                            <option value="Mr.">Mr</option>
                                            <option value="Ms.">Ms</option>

                                        </select>
                                        <span id="prefix_info" class="info text-danger text"></span>                                        

                                    </div>

                                    <div class="input-field col s5">
                                        <input id="first_name" name="first_name" type="text" class="validate">
                                        <label for="first_name" class="">First Name</label>
                                        <span id="first" class="info text-danger text"></span>

                                    </div>
                                    <div class="input-field col s5">
                                        <input id="last_name" name="last_name" type="text" class="validate">
                                        <label for="last_name" class="">Last Name</label>
                                        <span id="last" class="info text-danger text"></span>

                                  </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                    <input type="email" id="email" name="email"  onblur="checkemail();" onkeyup="checkemail();" onchange="checkemail();" class="validate" >
                                <label>Email id</label>
                                <span id="userEmail-info" class="info text-danger text" ></span>
                                <span id="email_status" name="email_status" class="text"></span>
                                    </div>
                                 
                                </div>


                                <div class="row">
                                    <div class="input-field col s6">
                                    <input type="password" name="password" id="password" class="validate" >
                                <label>Password</label>
                                <span id="real" class="info text-danger text"></span>
                                    </div>
                                    <div class="input-field col s6">
                                    <input type="password" name="password1" id="password1" class="validate" >
                                <label>Confirm password</label>
                                <span id="pass1" class="info text-danger text"></span>
                                <span id="invalid" class="info text-danger text"></span>

                                    </div>
                                </div>



       
                                <div class="row">
                                
                               <div class="input-field col s6">
                                    <input id="dob" name="dob" placeholder="Date of Birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" />
                           <span id="dobs" class="info text-danger text"></span>

                                    </div>

                                    <div class="input-field col s6">

                                    <input name="gender" type="radio" id="r2" value="Male" class="gender">
                                        <label for="r2">Male</label>

                                        <input name="gender" type="radio" id="r1" value="Female" class="gender">
                                        <label for="r1">Female</label>

                                    </div>
                                    <span id="genders" class="info text-danger text"></span>

                                </div>
                       


                        

                                <div class="row">
                                    <div class="input-field col s12">
                                     
                            <div class="input-field s4">

<input type="submit" value="Register" id="Register" name="Register" class="waves-effect waves-light log-in-btn">
</div>

                                    </div>

                                </div>


                                <br>




                            </form>




                

                </div>
            </div>
        </div>

    
        <!-- FORGOT SECTION -->
        <div id="modal3" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello... </h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Get benefits just simply register!</h4>
                    <ul>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Forgot password</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name3" id="forgot_email" class="validate">
                                <label>User name or email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                            <input type="submit" value="Submit" id="forgot" class="waves-effect waves-light log-in-btn"> 

                            </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                                    data-target="#modal1">Are you a already member ? Login</a> | <a href="#"
                                    data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new
                                    account</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- LOGIN out -->
        <div id="modal4" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                   <?php  if(isset($_SESSION['p_id'])){   ?>

                    <p>You are logged as a: <?php echo $_SESSION['username'] ?>          </p>
                   
                   <?php }  ?>
                    <h4>Login with social media</h4>
                    <ul>
                        <li> <img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                        <li><img src="" alt="">
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <?php  if(isset($_SESSION['p_id'])){   ?>

                    <h4> Dear <?php echo $_SESSION['username'] ?>   </h4>
                    <?php }  ?>

                    <p>Do you want to logout from your account?  It's take less then a minutes. <span class="text text-danger"> Click Logout Button </span> </p>

                    <form class="s12" method="post" action="phpquery/logout.php" id="ougoutform">

                        <div>

                            <div class="input-field s12">
                                <!-- <input type="text" name="lemail" id="lemail" data-ng-model="name" class="validate"> -->
                                <!-- <label>Email</label> -->
                                <span id="Email-info" class="info"></span><br />

                            </div>

                        </div>
               
                     
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="logout" id="logout" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        
                       
                        <div>
                       
                    </form>

                </div>
            </div>
        </div>




    </section>
