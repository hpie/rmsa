    <!-- NavBar Start -->
        <header>
            <div class="top_header">
                <a href="<?php echo BASE_URL; ?>/home"><img src="<?php echo BASE_URL; ?>/assets/front/img/header.png" alt="" srcset=""></a>
            </div>
            <div class="nav-main">
                <div class="wapper">
                    <nav class="navbar-expand-lg navbar  navbar-dark default-color">
                        <div class="navbar-header">
                            <div class="menu_btn_group">
                                <button type="button" class="navbar-toggle collapsed" id="side-menu-btn"
                                    data-toggle="slide-collapse" data-target="#slide-navbar-collapse"
                                    aria-expanded="false">
                                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="nav-bar collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/home" class="nav-link active">Home</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/about-us" class="nav-link">About Us</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/organization" class="nav-link">Organisation</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/circulars" class="nav-link">Circulars & Orders</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/annual-Reports" class="nav-link">Annual Report</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/contact-us" class="nav-link">Contact Us</a></li>
                                    <?php if(isset($_SESSION['st_rmsa_user_id'])){ ?>
                                    <li class="nav-item"><a href="<?php echo STUDENT_LOGOUT_LINK; ?>" class="nav-link">Logout</a></li>
                                    <?php } ?>
                                    <?php if(isset($_SESSION['emp_rmsa_user_id'])){ ?>
                                    <li class="nav-item"><a href="<?php echo EMPLOYEE_LOGOUT_LINK; ?>" class="nav-link">Logout</a></li>
                                    <?php } ?>
                                    <?php if(isset($_SESSION['rm_rmsa_user_id'])){ ?>
                                    <li class="nav-item"><a href="<?php echo RMSA_LOGOUT_LINK; ?>" class="nav-link">Logout</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    <!-- NavBar End -->
