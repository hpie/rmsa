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
                            <h1 class="heading">Registration of Employee in the RMSA Portal</h1>
                            <form class="form-horizontal border p-2" action="#">
                                <h2 class="second-heading text-center">GenPMIS Login
                                </h2>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12"
                                            for="department">Department:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <select name="" id="" class="form-control">
                                                <option value="">Elementary Education</option>
                                                <option value="">Higher Education</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="GenPMIS">GenPMIS
                                            EmpCd::</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="Password">Password</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="password" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12"
                                            for="verification">Verification:</label>
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