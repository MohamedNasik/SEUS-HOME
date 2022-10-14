<?php
       
         require_once 'phpquery/dbconnection.php';

         $sql = "SELECT * FROM patients WHERE p_id = '".$_SESSION["p_id"]."' ";
         if($result = mysqli_query($con, $sql)){
         if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_array($result)){

                 ?>
 
  <!--== BODY CONTNAINER ==-->
  <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="images/users.jpg" alt="">
                        </li>
                        <li>
                            <h5>  <?php echo $row["p_fname"].' '. $row["p_lname"]; ?>  <span> Patient ID :  <?php echo $row["p_id"]; ?></span></h5>
                        </li>
                        <li></li>
                    </ul>
                </div>
                <!--== LEFT MENU ==-->
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li><a href="admin.php" class="menu-active"><i class="fa fa-bar-chart" aria-hidden="true"></i> Patient Dashboard</a>
                        </li>
                      
                 <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-calendar" aria-hidden="true"></i> Check Schedule</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                <li><a href="doctor_schedule.php"><i class="fa fa-calendar" aria-hidden="true"></i> Check Doctor Schedule</a>
                                    </li>
                                    <li><a href="admin-import-data.php"><i class="fa fa-calendar" aria-hidden="true"></i> Check your Schedule</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>




                     <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-list" aria-hidden="true"></i> All Prescriptions</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="prescription.php">First Visit</a>
                                    </li>
                                    <li><a href="prescriptions.php">Based on Report Check</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                    
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i> Recommended</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="doctor_recommend.php">OPD Doctor Recommended</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                        <!-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bookmark-o" aria-hidden="true"></i>All Pages</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-page-all.php">Pages</a>
                                    </li>
                                    <li><a href="admin-page-add.php">Create New Page</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-main-menu.php">Main menu</a></li>
									<li><a href="admin-about-menu.php">About menu</a></li>
									<li><a href="admin-admission-menu.php">Admission menu</a></li>
									<li><a href="admin-all-menu.php">All page menu</a></li>
                                </ul>
                            </div>
                        </li> -->
						<!-- <li><a href="admin-slider.php"><i class="fa fa-image" aria-hidden="true"></i> Slider</a>
                        </li> -->
						<!-- <li><a href="admin-quick-link.php"><i class="fa fa-external-link-square" aria-hidden="true"></i> Slider quick link</a>
                        </li> -->
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-flask" aria-hidden="true"></i> Testings</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                
                                    <li><a href="admin-all-enquiry.php">Perform Testings</a>
                                    </li>
                                    <li><a href="admin-export-data.php">Edit Testings</a>
                                    </li>
                                    <li><a href="test_select.php">Results</a>
                                    </li>
                                    <li><a href="testings.php">About Testings</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bullhorn" aria-hidden="true"></i> Seminar</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-seminar-all.php">All Seminar</a>
                                    </li>
                                    <li><a href="admin-seminar-add.php">Create New Seminar</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-money" aria-hidden="true"></i> Payment Details</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="opdpayments.php">OPD Payments</a>
                                    </li>
                                    <li><a href="testpayments.php">Testing Payments</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                  
                        <li><a href="admin-user-all.php" class="collapsible-header"><i class="fa fa-users" aria-hidden="true"></i> Patient Health Profile</a>
                          
                        </li>
                        <li><a href="chat/chat.php" class="collapsible-header"><i class="fa fa-commenting-o" aria-hidden="true"></i> Chat with Consultant</a>
                          
                        </li>
                        <!-- <li><a href="admin-setting.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Analytical Details</a>
</li> -->



                        <!-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-calendar" aria-hidden="true"></i> Import & Export</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-export-data.php">Export all datas</a>
                                    </li>
                                    <li><a href="admin-import-data.php">Import all datas</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>

            <?php   


}
mysqli_free_result($result);

} 
else{
echo "No records matching your query were found.";
}
}


?>


?>