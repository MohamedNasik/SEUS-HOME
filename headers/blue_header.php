
    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="index-2.php"><img src="images/logo12.png" alt="" />
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>All Courses</h4>
                            <ul>
                            <li><a href="departments.php">Departments</a></li>
                                            <li><a href="all-courses.php">Services</a></li>
                                            <li><a href="research.php">Doctors</a></li>
                                            <li><a href="admission.php">Request Appointment </a></li>
                                            <li><a href="course-details.php">Blogs</a></li>
                                            <li><a href="course-details.php">Blogs</a></li>
                            </ul>
                            <h4>User Account</h4>
                            <ul>
                                <li><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a></li>
                                <li><a href="#!" data-toggle="modal" data-target="#modal2">Register</a></li>
                            </ul>
                            <h4>All Pages</h4>
                            <ul>
                                <li><a href="index-2.php">Home</a></li>
                                <li><a href="about.php">About us</a></li>
                                <li><a href="admission.php">Admission</a></li>
                                <li><a href="all-courses.php">All courses</a></li>
                                <li><a href="course-details.php">Course details</a></li>
                                <li><a href="awards.php">Awards</a></li>
                                <li><a href="seminar.php">Seminar</a></li>
                                <li><a href="events.php">Events</a></li>
                                <li><a href="event-details.php">Event details</a></li>
                                <li><a href="event-register.php">Event register</a></li>
                                <li><a href="contact-us.php">Contact us</a></li>
                            </ul>
                            <h4>User Profile</h4>
                            <ul>
                                <li><a href="dashboard.php">User profile</a></li>
                                <li><a href="db-courses.php">Courses</a></li>
                                <li><a href="db-exams.php">Exams</a></li>
                                <li><a href="db-profile.php">Prfile</a></li>
                                <li><a href="db-time-line.php">Time line</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Location: No. 22, Main road Bandarawela</a>
                                </li>
                                <li><a href="#">Phone: +94 55 2230 352</a>
                                </li>
                            </ul>
                        </div>

 <?php if(!isset($_SESSION["p_id"])) {  ?>
           
           <div class="ed-com-t1-right">
           <ul>
               <li><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a>
               </li>
               <li><a href="#!" data-toggle="modal" data-target="#modal2">Sign Up</a>
               </li>
           </ul>
       </div>


    <?php    } else{  ?>

        <div class="ed-com-t1-right">
           <ul>
               
               <li><a href="#!" data-toggle="modal" data-target="#modal4">Logout</a>
               </li>
           </ul>
       </div>

   <?php }   ?>
  

        





                        <!-- <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="index-2.php"><img src="images/logo12.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.php">Home</a>
                                </li>

                                <li class="about-menu">
                                    <a href="departments.php" class="mm-arr">Departments</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="about-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay menu-about" href="departments.php">
                                                            <img src="images/departments/dep.jpg" alt="">
                                                            <span>Our Medical Departments </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="mm1-com mm1-s2">
                                              <p>Over the last 30 years SEUS Hospital has built a reputation for accuracy and dependability. 
                                              Using the most modern, fast and accurate analysers in the world, 
                                              Asiri Laboratories conducts internal quality control on all its machines daily</p>

                                                    <!-- <p>Want to change the world? At Berkeley we’re doing just that. When
                                                        you join the Golden Bear community, you’re part of an
                                                        institution that shifts the global conversation every single
                                                        day.</p> -->
                                                    <a href="about.php" class="mm-r-m-btn">Read more</a>
                                                </div>
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        <li><a href="departments.php">Surgical Department </a></li>
                                                        <li><a href="departments.php">Cardioology </a></li>
                                                        <li><a href="departments.php">Medical Lab </a></li>
                                                        <li><a href="departments.php">Neurology </a></li>
                                                        <li><a href="departments.php">Gastroenterology
                                                            </a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-s4">
                                                    <ul>
                                                        <li><a href="departments.php">Plastic Surgery </a></li>
                                                        <li><a href="departments.php">Dental Care</a></li>
                                                        <li><a href="departments.php">Ophthalmology</a></li>
                                                        <li><a href="departments.php">Traumotology</a></li>
                                                        <li><a href="departments.php">Psychological</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="admi-menu">
                                    <a href="#" class="mm-arr">Services</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="admi-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="admission.php">
                                                            <img src="images/services/ser1.jpg" alt="">
                                                            <!-- <span>Seminar 2018</span> -->
                                                        </a>
                                                    </div>
                                                    <p>We offer highest standards of clinical skills and nursing care across wide range of specialties, 
                                                        with leading specialist  doctors and surgeons along with spacious consultation rooms 
                                                        .</p>
                                                    <a href="all-courses.php" class="mm-r-m-btn">Read more</a>


                                                </div>
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="admission.php">
                                                            <img src="images/services/ser2.jpg" alt="">
                                                            <!-- <span>Admission</span> -->
                                                        </a>
                                                    </div>
                                                    <p>Donec lacus libero, rutrum ac sollicitudin sed, mattis non eros.
                                                        Vestibulum congue nec eros quis lacinia. Mauris non tincidunt
                                                        lectus. Nulla mollis, orci vitae accumsan rhoncus.</p>
                                                    <a href="all-courses.php" class="mm-r-m-btn">Read more</a>
                                                </div>
                                                <div class="mm2-com mm1-com mm1-s1">
                                                    <div class="ed-course-in">
                                                        <a class="course-overlay" href="admission.php">
                                                            <img src="images/services/ser3.jpg" alt="">
                                                            <!-- <span>History & awards</span> -->
                                                        </a>
                                                    </div>
                                                    <p>That's why Emergency Services Health only specialise in top-level cover for complete peace of mind. 
                                                        We make your private health insurance choices as simple as possible to ensure maximum value. .</p>
                                                    <a href="all-courses.php" class="mm-r-m-btn">Read more</a>
                                                </div>
                                                <div class="mm2-com mm1-com mm1-s4">

                                                    <ul>
                                                        <li><a href="admission.php">Channaling Services </a></li>
                                                        <li><a href="all-courses.php">Emergency Services </a></li>
                                                        <li><a href="all-courses.php">Homecare Services </a></li>
                                                        <li><a href="all-courses.php">laboratory research </a></li>
                                                        <li><a href="all-courses.php">RMI Services
                                                            </a></li>
                                                        <li><a href="all-courses.php">Online appointments
                                                            </a></li>
                                                        <li><a href="all-courses.php">Dental Care</a></li>
                                                        <li><a href="all-courses.php">Surgery</a></li>
                                               
                                                    </ul>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="research.php">Doctors</a></li>

                                <!-- <li><a href="research.php">Doctors</a></li> -->

                                <!-- <li><a href="all-courses.php">Doctors</a></li> -->

                                <!-- <li><a class='dropdown-button ed-sub-menu' href='#' data-activates='dropdown1'>Courses</a></li> -->

                                <!-- <li class="cour-menu">
                                    <a href="#!" class="mm-arr">All Pages</a> -->
                                    <!-- MEGA MENU 1 -->
                                    <!-- <div class="mm-pos">
                                        <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                    <h4>Frontend pages:1</h4>
                                                    <ul>
                                                        <li><a href="index-2.php">Home</a></li>
                                                        <li><a href="index-1.php">Home - 1</a></li>
                                                        <li><a href="all-courses.php">All Courses</a></li>
                                                        <li><a href="course-details.php">Course Details</a></li>
                                                        <li><a href="about.php">About us</a></li>
                                                        <li><a href="admission.php">admission</a></li>
                                                        <li><a href="awards.php">awards</a></li>
                                                        <li><a href="blog.php">blog</a></li>
                                                        <li><a href="blog-details.php">blog details</a></li>
                                                        <li><a href="contact-us.php">contact us</a></li>
                                                        <li><a href="departments.php">Departments</a></li>
                                                        <li><a href="events.php">events</a></li>
                                                        <li><a href="event-details.php">event details</a></li>
                                                        <li><a href="event-register.php">event register</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                    <h4>Frontend pages:2</h4>
                                                    <ul>
                                                        <li><a href="facilities.php">facilities</a></li>
                                                        <li><a href="facilities-detail.php">facilities detail</a></li>
                                                        <li><a href="research.php">research</a></li>
                                                        <li><a href="seminar.php">seminar</a></li>
                                                        <li><a href="gallery-photo.php">gallery photo</a></li>
                                                    </ul>
                                                    <h4 class="ed-dr-men-mar-top">User Dashboard</h4>
                                                    <ul>
                                                        <li><a href="dashboard.php">Student profile</a></li>
                                                        <li><a href="db-courses.php">Dashboard courses</a></li>
                                                        <li><a href="db-exams.php">Dashboard exams</a></li>
                                                        <li><a href="db-profile.php">Dashboard profile</a></li>
                                                        <li><a href="db-time-line.php">Dashboard timeline</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                    <h4>Admin panel:1</h4>
                                                    <ul>
                                                        <li><a href="admin.php">admin</a></li>
                                                        <li><a href="admin-add-courses.php">Add new course</a></li>
                                                        <li><a href="admin-all-courses.php">All courses</a></li>
                                                        <li><a href="admin-student-details.php">Student details</a>
                                                        </li>
                                                        <li><a href="admin-user-add.php">Add new user</a></li>
                                                        <li><a href="admin-user-all.php">All users</a></li>
                                                        <li><a href="admin-panel-setting.php">Admin setting</a></li>
                                                        <li><a href="admin-event-add.php">event add</a></li>
                                                        <li><a href="admin-event-all.php">event all</a></li>
                                                        <li><a href="admin-setting.php">Admin Setting</a></li>
                                                        <li><a href="admin-slider.php">Slider setting</a></li>
                                                        <li><a href="admin-slider-edit.php">Slider edit</a></li>
                                                        <li><a href="admin-course-details.php">course details</a></li>
                                                        <li><a href="admin-login.php">admin login</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                    <h4>Admin panel:2</h4>
                                                    <ul>
                                                        <li><a href="admin-event-edit.php">event edit</a></li>
                                                        <li><a href="admin-exam-add.php">exam add</a></li>
                                                        <li><a href="admin-exam-all.php">exam all</a></li>
                                                        <li><a href="admin-exam-edit.php">exam edit</a></li>
                                                        <li><a href="admin-export-data.php">export data</a></li>
                                                        <li><a href="admin-import-data.php">import data</a></li>
                                                        <li><a href="admin-job-add.php">Add new jobs</a></li>
                                                        <li><a href="admin-job-all.php">All jobs</a></li>
                                                        <li><a href="admin-job-edit.php">Edit job</a></li>
                                                        <li><a href="admin-main-menu.php">main menu</a></li>
                                                        <li><a href="admin-page-add.php">Add new page</a></li>
                                                        <li><a href="admin-page-all.php">All pages</a></li>
                                                        <li><a href="admin-page-edit.php">Edit page</a></li>
                                                        <li><a href="admin-forgot.php">forgot password</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-cour-com mm1-s4">
                                                    <h4>Admin panel:3</h4>
                                                    <ul>
                                                        <li><a href="admin-quick-link.php">quick link</a></li>
                                                        <li><a href="admin-seminar-add.php">Add new seminar</a></li>
                                                        <li><a href="admin-seminar-all.php">All seminar</a></li>
                                                        <li><a href="admin-seminar-edit.php">Edit seminar</a></li>
                                                        <li><a href="admin-seminar-enquiry.php">Semester enquiry</a>
                                                        </li>
                                                        <li><a href="admin-all-enquiry.php">All enquiry</a></li>
                                                        <li><a href="admin-view-enquiry.php">All enquiry view</a></li>
                                                        <li><a href="admin-event-enquiry.php">event enquiry</a></li>
                                                        <li><a href="admin-admission-enquiry.php">Admission enquiry</a>
                                                        </li>
                                                        <li><a href="admin-common-enquiry.php">common enquiry</a></li>
                                                        <li><a href="admin-course-enquiry.php">course enquiry</a></li>
                                                        <li><a href="admin-all-menu.php">menu all</a></li>
                                                        <li><a href="admin-about-menu.php">Menu - About</a></li>
                                                        <li><a href="admin-admission-menu.php">Menu - admission</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->



                                <li><a href="events.php">Schedule</a></li>
                                <li><a href="blogs.php">Blogs</a></li>

                                <?php if(isset($_SESSION["p_id"])) {  ?>

                                <li><a href="db-profile.php">Patient</a>
                                </li>
                                    <?php    }  ?>      
                                    <li><a href="about.php">About Us</a>
                      
                                <!-- <li><a href="contact-us.php">Contact us</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="all-drop-down-menu">

                    </div>

                </div>
            </div>
        </div>
        <div class="search-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-form">
                            <!-- <form>
                                <div class="sf-type">
                                    <div class="sf-input">
                                        <input type="text" id="sf-box" placeholder="Search services, Departments, Doctors" disabled>
                                    </div>
                                    <div class="sf-list">
                                        <ul>
                                            <li><a href="departments.php">Departments</a></li>
                                            <li><a href="all-courses.php">Services</a></li>
                                            <li><a href="research.php">Doctors</a></li>
                                            <li><a href="admission.php">Request Appointment </a></li>
                                        
                                      
                                        </ul>
                                    </div>
                                </div>
                                <div class="sf-submit">
                                    <input type="submit" value="Search">
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->