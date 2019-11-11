			<!-- LeftNavbar Start -->
                    <div class="col-md-3 col-sm-3  collapse navbar-collapse" id="slide-navbar-collapse">
                        <div class="left-side-area">
                            <ul id="accordion" class="accordion">
                                <?php if(!isset($_SESSION['st_rmsa_user_id']) AND !isset($_SESSION['rm_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-database"></i>Employee’s Corner<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>
                                        <?php
                                        if(!isset($_SESSION['emp_rmsa_user_id'])){?>
                                            <li><a href="#">New Registration</a></li>
                                            <li><a href="<?php echo EMPLOYEE_LOGIN_LINK; ?>">Registered Login</a></li>
                                        <?php } ?>

                                        <?php
                                        if(isset($_SESSION['emp_rmsa_user_id'])){?>
                                            <li><a href="<?php echo STUDENT_REGISTER_LINK; ?>">Create Student</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php }?>
                                <?php if(!isset($_SESSION['emp_rmsa_user_id']) AND !isset($_SESSION['rm_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-code"></i>Student's Corner<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>
                                        <?php if(!isset($_SESSION['st_rmsa_user_id'])){ ?>
                                        <li><a href="<?php echo STUDENT_REGISTER_LINK; ?>">New Registration</a></li>
                                        <li><a href="<?php echo STUDENT_LOGIN_LINK; ?>">Registered Login</a></li>
                                        <?php }
                                        else{
                                            ?>                                       
                                        <li><a href="<?php echo STUDENT_UPDATE_PROFILE_LINK; ?>">Change Password</a></li>
                                        <?php
                                        }
                                        ?>                                                                                
                                    </ul>
                                </li>
                                <?php }?>                               
                                <?php if(!isset($_SESSION['emp_rmsa_user_id']) AND !isset($_SESSION['st_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-user"></i>RMSA User’s Corner<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                        
                                        <?php if(!isset($_SESSION['rm_rmsa_user_id'])){ ?>                                       
                                        <li><a href="<?php echo RMSA_LOGIN_LINK; ?>">Rmsa Login</a></li>                                       
                                        <?php } ?>                                                                                                                       
                                    </ul>
                                </li>
                                <?php }?>                                                                
                                <?php if(isset($_SESSION['st_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Resource Material<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                       
                                        <li><a href="#">Student User Manual</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/NONE'; ?>">View Resource Material</a></li>                                       
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/EBOOKS'; ?>">Download EBooks</a></li>                                                                          
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/Q-PAPERS'; ?>">Download Question Papers</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK.'/SYLLABUS'; ?>">Download Syllabus</a></li>
                                        <li><a href="#">Post Queries</a></li>
                                        <li><a href="#">Online Exam</a></li>                                                                                                                       
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if(isset($_SESSION['emp_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Resource Material<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                       
                                        <li><a href="#">Employee User Manual</a></li>
                                        <li><a href="<?php echo EMPLOYEE_STUDENT_LIST_LINK; ?>">Manage Students</a></li>
                                        <li><a href="<?php echo EMPLOYEE_UPLOAD_FILE_LINK; ?>">Upload Resource Material</a></li>
                                        <li><a href="<?php echo EMPLOYEE_RESOURCES_LIST_LINK; ?>">Manage Resource Material</a></li>
                                        <li><a href="#">Post Queries</a></li>
                                        <li><a href="#">Online Exam</a></li>                                                                               
                                    </ul>
                                </li>
                                 <?php } ?>                                
                                 <?php if(isset($_SESSION['rm_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Resource Material<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                                                               
                                        <li><a href="<?php echo RMSA_STUDENT_LIST_LINK; ?>">Student List</a></li>                                        
                                        <li><a href="<?php echo RMSA_EMPLOYEE_LIST_LINK; ?>">Employee List</a></li> 
                                        <li><a href="<?php echo RMSA_RESOURCES_LIST_LINK; ?>">Resource List</a></li> 
                                    </ul>
                                </li>
                                 <?php } ?>                                                                
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Other Links<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Online MCQ Test</a></li>
                                        <li><a href="#">Download Syllabus</a></li>
                                        <li><a href="#">Download Question Papers</a></li>
                                        <li><a href="#">Student Queries</a></li>
                                        <li><a href="<?php echo ACTIVE_STUDENTS; ?>">Total Active Student</a></li>
                                        <li><a href="<?php echo ACTIVE_EMPLOYEE; ?>">Total Active Employee</a></li>
                                        <li><a href="<?php echo EMPLOYEE_REPORTS; ?>/1">Employee Reports</a></li>
                                        <li><a href="<?php echo MOST_RATED_CONTENT; ?>">Most Rated Content</a></li>
                                        <li><a href="<?php echo MOST_VIEWED_CONTENT; ?>">Most Viewed Content</a></li>
                                        <li><a href="<?php echo MOST_ACTIVE_STUDENT; ?>">Most Active Student</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>RMSA Coordinators<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="http://tcexam.hpie.in">Online MCQ Test</a></li>
                                        <li><a href="#">Download Syllabus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php
                    $this->load->view('_partials/front/rightnavbar');
                    //	include('_partials/rightnavbar.php'); // Includes Right Navbar Script
                    ?> 
                    </div>

			<!-- LeftNavbar End -->					
