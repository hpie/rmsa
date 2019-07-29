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
                            <h1 class="heading">Reports</h1>
                            <h5>RMSA Reports</h5>
                            <table class="table table-borderless table-responsive contact_us">
                                <thead class="bg-gray">
                                    <tr>
                                        <th scope="col">Report Type</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Download Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Financial Report</th>
                                        <td>2018-2019</td>
                                        <td><a href="#">Download Report</a></td>
                                    </tr>

                                </tbody>
                            </table>
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