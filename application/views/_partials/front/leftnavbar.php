			<!-- LeftNavbar Start -->

                    <div class="col-md-3 col-sm-3  collapse navbar-collapse" id="slide-navbar-collapse">
                        <div class="left-side-area">
                            <ul id="accordion" class="accordion">
                                <li>
                                    <div class="link"><i class="fa fa-database"></i>Employee’s Corner<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>                                        
                                        <?php
                                        if(!isset($_SESSION['emp_rmsa_user_id'])){?>
                                            <li><a href="<?php echo BASE_URL ?>/employee-registration">New Registration</a></li>
                                            <li><a href="<?php echo BASE_URL ?>/employee-login">Registered Login</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php if(!isset($_SESSION['emp_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-code"></i>Student's Corner<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>
                                        <?php if(!isset($_SESSION['st_rmsa_user_id'])){ ?>
                                        <li><a href="<?php echo BASE_URL ?>/student-registration">New Registration</a></li>
                                        <li><a href="<?php echo BASE_URL ?>/student-login">Registered Login</a></li>
                                        <li><a href="<?php echo BASE_URL ?>/registered-students">Registered Students</a></li>
                                        <?php }
                                        else{
                                            ?>                                       
                                        <li><a href="<?php echo STUDENT_UPDATE_PROFILE_LINK; ?>">Update Profile</a></li>                                        
                                        <?php
                                        }
                                        ?>                                                                                
                                    </ul>
                                </li>
                                <?php }?>
                                
                                <?php if(isset($_SESSION['st_rmsa_user_id'])){ ?>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Resource Material<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">                                       
                                        <li><a href="#">Student User Manual</a></li>
                                        <li><a href="<?php echo STUDENT_RESOURCES_LINK; ?>">View Resource Material</a></li>                                       
                                        <li><a href="#">Download EBooks</a></li>                                                                          
                                        <li><a href="#">Download Question Papers</a></li>
                                        <li><a href="#">Download Syllabus</a></li>
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
                                        <li><a href="#">Enroll Students</a></li>
                                        <li><a href="<?php echo EMPLOYEE_UPLOAD_FILE_LINK; ?>">Upload Resource Material</a></li>
                                        <li><a href="<?php echo EMPLOYEE_RESOURCES_LIST_LINK; ?>">Manage Resource Material</a></li>
                                        <li><a href="#">Post Queries</a></li>
                                        <li><a href="#">Online Exam</a></li>
                                       
                                        
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
                    </div>

			<!-- LeftNavbar End -->					
