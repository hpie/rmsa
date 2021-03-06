			<!-- LeftNavbar Start -->
                    <div class="col-md-3 col-sm-3  collapse navbar-collapse" id="slide-navbar-collapse">
                        <div class="left-side-area">
                            <ul id="accordion" class="accordion">

                            <?php
                                if(!isset($_SESSION['emp_rmsa_user_id']) AND !isset($_SESSION['rm_rmsa_user_id']) AND !isset($_SESSION['tech_rmsa_user_id']))
                                {
                            ?>
                                <li>
                                    <div class="link"><i class="fa fa-user"></i>For Students<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="<?php echo BASE_URL ?>/assets/front/gyanshala-student-user-guide.pdf" rel="stylesheet" type="application/pdf" target="_blank">Instructions</a></li>

                                        <?php
                                            if(!isset($_SESSION['st_rmsa_user_id']))
                                            {
                                        ?>
                                        <li><a href="<?php echo STUDENT_REGISTER_LINK; ?>">New Registration</a></li>
                                        <li><a href="<?php echo STUDENT_LOGIN_LINK; ?>">Registered Login</a></li>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <li><a href="<?php echo STUDENT_UPDATE_PROFILE_LINK; ?>">Change Password</a></li> 
                                        <li><a href="<?php echo STUDENT_MY_PROFILE_LINK; ?>">Profile</a></li>
                                        <?php
                                            }
                                        ?>
                                        <li><a href="<?php echo STUDENT_VIDEO_LINK; ?>1">Video Lessons</a></li>
                                    </ul>
                                </li>
                            <?php
                                }
                            ?>


                            <?php 
								if(!isset($_SESSION['emp_rmsa_user_id']) AND !isset($_SESSION['st_rmsa_user_id']) AND !isset($_SESSION['rm_rmsa_user_id']))
								{
							?>
                                <li>
                                    <div class="link"><i class="fa fa-user"></i>For Teachers<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">        
									<li><a href="#">Instructions</a></li>
                                                                        
                                                                        <?php
                                            if(!isset($_SESSION['tech_rmsa_user_id']))
                                            {
                                        ?>
                                        <li><a href="<?php echo RMSA_TEACHERS_REGISTER_LINK; ?>">New Registration</a></li>                                        
                                        <?php
                                            }                                           
                                        ?>
                                                                        
					                                
                                        <?php 
											if(!isset($_SESSION['tech_rmsa_user_id']))
											{ 
										?>                                       
                                        	<li><a href="<?php echo TEACHER_LOGIN_LINK; ?>">Teacher Login</a></li>                                       
                                        <?php 
											}
										?> 
                                        
										<?php
                                             if(isset($_SESSION['tech_rmsa_user_id']))
											{
										?>
                                            	<li><a href="<?php echo STUDENT_REGISTER_LINK; ?>">Create Student</a></li>
                                                <li><a href="<?php echo TEACHER_UPDATE_PROFILE_LINK; ?>">Change Password</a></li>
                                                <li><a href="<?php echo TEACHER_MY_PROFILE_LINK; ?>">Profile</a></li>
                                        <?php 
											}
										?>
                                    </ul>
                                </li>
							<?php 
								}
							?>


                                <?php
                                if(!isset($_SESSION['st_rmsa_user_id']) AND !isset($_SESSION['rm_rmsa_user_id']) AND !isset($_SESSION['tech_rmsa_user_id']))
                                {
                                    ?>
                                    <li>
                                        <div class="link"><i class="fa fa-user"></i>For RMSA Coordiators<i class="fa fa-chevron-down"></i></div>
                                        <ul class="submenu">
                                            <li><a href="<?php echo BASE_URL ?>/assets/front/gyanshala-coordinators-user-guide.pdf" rel="stylesheet" type="application/pdf" target="_blank">Instructions</a></li>

                                            <?php
                                            if(!isset($_SESSION['emp_rmsa_user_id']))
                                            {
                                                ?>
                                                <li><a href="<?php echo EMPLOYEE_LOGIN_LINK; ?>">Registered Login</a></li>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if(isset($_SESSION['emp_rmsa_user_id'])){?>
                                                <li><a href="<?php echo STUDENT_REGISTER_LINK; ?>">Create Student</a></li>
                                                <li><a href="<?php echo EMPLOYEE_UPDATE_PROFILE_LINK; ?>">Change Password</a></li>
                                                <li><a href="<?php echo EMPLOYEE_MY_PROFILE_LINK; ?>">Profile</a></li>
                                                <?php
                                            }
                                            ?>

                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>


                                <?php
                                if(!isset($_SESSION['emp_rmsa_user_id']) AND !isset($_SESSION['st_rmsa_user_id']) AND !isset($_SESSION['tech_rmsa_user_id']))
                                {
                            ?>
                                <li>
                                    <div class="link"><i class="fa fa-user"></i>For RMSA Admins<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>

                                        <?php
                                            if(!isset($_SESSION['rm_rmsa_user_id']))
                                            {
                                        ?>
                                        <li><a href="<?php echo RMSA_LOGIN_LINK; ?>">Rmsa Admin Login</a></li>
                                        <?php
                                            }
                                            if(isset($_SESSION['rm_rmsa_user_id'])){
                                                ?>
                                        <li><a href="<?php echo RMSA_UPDATE_PROFILE_LINK; ?>">Change Password</a></li>
                                        <li><a href="<?php echo RMSA_MY_PROFILE_LINK; ?>">Profile</a></li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                            <?php
                                }
                            ?>

                            <?php
                                if(isset($_SESSION['st_rmsa_user_id']))
                                {
                            ?>
                                <li>
                                    <div class="link"><i class="fa fa-database"></i>Resource Material<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Student User Manual</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/NONE'; ?>">View Resource Material</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/EBOOKS'; ?>">Download EBooks</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/Q-PAPERS'; ?>">Download Question Papers</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/SYLLABUS'; ?>">Download Syllabus</a></li>
                                        <li><a href="<?php echo STUDENT_QUIZ_RESULTS_LINK; ?>">Quiz Results</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Other Links<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                        
                                        <li><a href="<?php echo STUDENT_ONLINE_EXAM_LINK; ?>">Online Exam</a></li>
                                        <li><a href="<?php echo STUDENT_REPORTS; ?>/1">Reports</a></li>
                                        <li><a href="<?php echo EMPLOYEE_REPORTS_2; ?>/9/1">Reports graph</a></li>
                                    </ul>
                                </li>
                            <?php
                                    }
                            ?>
							
							 <?php 
								if(isset($_SESSION['tech_rmsa_user_id']))
								{
								?>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Manage Resources<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                       
                                        <li><a href="#">Teacher User Manual</a></li>
                                        <li><a href="<?php echo TEACHER_STUDENT_LIST_LINK; ?>">Manage Students</a></li>                                        
                                        <!--<li><a href="<?php //echo TEACHER_RESOURCES_LIST_LINK; ?>">View Resource Material</a></li>-->
                                        <li><a href="<?php echo TEACHER_RESOURCES_LIST_LINK; ?>">Resource List</a></li> 
                                    </ul>
                                </li>
				
								<li>
                                    <div class="link"><i class="fa fa-mobile"></i>Other Links<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="<?php echo STUDENT_QUIZ_RESULTS_LINK; ?>">Quiz Results</a></li>
                                        <li><a href="<?php echo STUDENT_ONLINE_EXAM_LINK; ?>">Online Exam</a></li>
                                        <li><a href="<?php echo STUDENT_REPORTS; ?>/1">Reports</a></li>
                                        <li><a href="<?php echo EMPLOYEE_REPORTS_2; ?>/9/1">Reports graph</a></li>
                                    </ul>
                                </li>
							<?php
								}
							?>

                            <?php
                                if(isset($_SESSION['emp_rmsa_user_id']))
                                {
                            ?>
                                <li>
                                    <div class="link"><i class="fa fa-database"></i>Manage Resources<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Employee User Manual</a></li>
                                        <li><a href="<?php echo EMPLOYEE_STUDENT_LIST_LINK; ?>">Manage Students</a></li>
                                        
                                        <li><a href="<?php echo EMPLOYEE_UPLOAD_FILE_LINK; ?>">Upload Resource Material</a></li>
                                        <li><a href="<?php echo EMPLOYEE_RESOURCES_LIST_LINK; ?>">Manage Resource Material</a></li>
                                        <li><a href="<?php echo EMPLOYEE__QUIZ_RESOURCES_LIST_LINK; ?>">Create Quiz For Resources</a></li>
                                        <li><a href="<?php echo EMPLOYEE_VIDEO_LIST_LINK; ?>">Manage Videos</a></li>
                                        <li><a href="<?php echo EMPLOYEE_STUDENT_LIST_LINK; ?>">Quiz Results</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Other Links<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="<?php echo EMPLOYEE_ONLINE_EXAM_LINK; ?>">Online Exam</a></li>
                                        <li><a href="<?php echo EMPLOYEE_REPORTS; ?>/1">Reports</a></li>
                                        <li><a href="<?php echo EMPLOYEE_REPORTS_2; ?>/9/1">Reports graph</a></li>
                                    </ul>
                                </li>
                            <?php
                                }
                            ?>

                            <?php
                                if(isset($_SESSION['rm_rmsa_user_id']))
                                {
                            ?>
                                <li>
                                    <div class="link"><i class="fa fa-database"></i>Manage Resources<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="<?php echo RMSA_STUDENT_LIST_LINK; ?>">Student List</a></li>
                                        <li><a href="<?php echo RMSA_EMPLOYEE_LIST_LINK; ?>">Employee List</a></li>
                                        <li><a href="<?php echo RMSA_TEACHERS_LIST_LINK; ?>">Teachers List</a></li>
                                        <li><a href="<?php echo RMSA_RESOURCES_LIST_LINK; ?>">Resource List</a></li>
                                        <li><a href="<?php echo RMSA_WRONG_LOGIN_LOG_LINK; ?>">Wrong Attempt List</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Other Links<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="<?php echo RMSA_ONLINE_EXAM_LINK; ?>">Online Exam</a></li>
                                        <li><a href="<?php echo RMSA_REPORTS; ?>/1">Reports</a></li>
                                        <li><a href="<?php echo EMPLOYEE_REPORTS_2; ?>/9/1">Reports graph</a></li>
                                    </ul>
                                </li>
                             <?php
                                }
                            ?>

                                <!-- Open Links -->
                                <!--
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>RMSA Coordinators<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Online MCQ Test</a></li>
                                        <li><a href="#">Download Syllabus</a></li>
                                    </ul>
                                </li>
                                -->

                            </ul>
                        </div>

                        <?php
                    $this->load->view('_partials/front/rightnavbar');
                    //	include('_partials/rightnavbar.php'); // Includes Right Navbar Script
                    ?> 
                    </div>

			<!-- LeftNavbar End -->					
