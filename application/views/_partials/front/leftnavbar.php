			<!-- LeftNavbar Start -->  

                    <div class="col-md-3 col-sm-3  collapse navbar-collapse" id="slide-navbar-collapse">
                        <div class="left-side-area">
                            <ul id="accordion" class="accordion">
                                <li>
                                    <div class="link"><i class="fa fa-database"></i>Education Deptt Employee's<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>
                                        <li><a href="<?php echo BASE_URL ?>/employee-registration">New Registration</a></li>

                                        <?php
                                        if(!isset($_SESSION['employee_session']['rmsa_user_employee_code'])){?>
                                            <li><a href="<?php echo BASE_URL ?>/employee-login">Registered Login</a></li>
                                        <?php
                                        }else{?>
                                            <li><a href="<?php echo EMPLOYEE_LOGOUT_LINK; ?>">Logout</a></li>

                                      <?php  }
                                        ?>

                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><i class="fa fa-code"></i>Student's Corner<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">Instructions</a></li>
                                        <?php if(!isset($_SESSION['username'])){ ?>
                                        <li><a href="<?php echo BASE_URL ?>/student-registration">New Registration</a></li>
                                        <li><a href="<?php echo BASE_URL ?>/student-login">Registered Login</a></li>
                                        <?php }
                                        else{
                                            ?>
                                        <li><a href="<?php echo STUDENT_LOGOUT_LINK; ?>">Logout</a></li>
                                        <?php
                                        }
                                        ?>
                                        
                                        <li><a href="<?php echo BASE_URL ?>/registered-students">Registered Students</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><i class="fa fa-mobile"></i>Resource Material<i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li><a href="#">RMSA User Manual</a></li>
                                        <li><a href="#">Resource Material</a></li>
                                        <li><a href="#">Teachers Training Modules</a></li>
                                        <li><a href="#">Download EBooks</a></li>
                                        <li><a href="#">Online MCQ Test</a></li>
                                        <li><a href="#">Download Syllabus</a></li>
                                        <li><a href="#">Download Question Papers</a></li>
                                        <li><a href="#">Student Queries</a></li>
                                    </ul>
                                </li>
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
