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
                            <h1 class="heading">Contact Us</h1>
                            <h5>Contact Numbers of RMSA Officers, Directorate of Higher Education, Shimla - 171001 (HP)
                            </h5>
                            <table class="table table-borderless table-responsive contact_us">
                                <thead class="bg-gray">
                                    <tr>
                                        <th scope="col">KWord</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Office</th>
                                        <th scope="col">Pbx No.</th>
                                        <th scope="col">Mobile No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Sh. Ghanshyam Chand</th>
                                        <td>State Project Director</td>
                                        <td>gcshyam46@gmail.com </td>
                                        <td>0177-2807105</td>
                                        <td>300</td>
                                        <td>9418002410</td>
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