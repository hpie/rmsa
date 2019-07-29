<!DOCTYPE html>
<html lang="en">

<!-- Start Import Head -->
<?php
	include('_partials/head.php'); // Includes Header Script
?>
<!-- End Import Head -->

<body>
    <div class="">
    
<!-- Start Import Navbar -->   
<?php
	include('_partials/navbar.php'); // Includes Navbar Script
?>        
<!-- End Import Navbar -->   

	 <!-- Body Start -->
        <section class="main">
        	<div class="wapper">
                <div class="row mob-v-c-order">

<!-- Start Import LeftNavbar -->   
<?php
	include('_partials/leftnavbar.php'); // Includes LeftNavbar Script
?>        
<!-- End Import LeftNavbar -->
                <!-- overlay mobile -->  
                <div class="menu-overlay"></div>
                    
 					<!-- content -->
                    <div class="col-md-6 col-sm-8  col-12">
                        <div class="middle-area">
                            <h1 class="heading">RMSA portal - Forgot Password
                            </h1>
                            <form class="form-horizontal border p-2" action="#">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="userName">Email:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="email" class="form-control" placeholder="Email :">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="Security Question">Security
                                            Question:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <select name="" id="" class="form-control">
                                                <option value="What is your birth place">What is your birth place
                                                </option>
                                                <option value="What is your mother first name"> What is your mother
                                                    first name</option>
                                                <option value="What is your birth year"> What is your birth year
                                                </option>
                                                <option value="What is your pet name">What is your pet name </option>
                                                <option value="What is your pan number"> What is your pan number
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="answer">The answer:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="m-auto text-center">
                                        <button type="submit" class="btn primary_btn">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

<!-- Start Import RightNavbar -->   
<?php
	include('_partials/rightnavbar.php'); // Includes Right Navbar Script
?>        
<!-- End Import RightNavbar -->                  
                    
                </div>
            </div>
        </section>
    <!-- Body End -->

<!-- Start Import Navbar --> 
<?php
	include('_partials/footer.php'); // Includes Footer Script
?>
<!-- End Import Navbar -->         
    
    
<!-- Start Import Scripts -->
<?php
	include('_partials/scripts.php'); // Includes Scripts Script
?>
<!-- End Import Scripts -->

	</div>

</body>

</html>