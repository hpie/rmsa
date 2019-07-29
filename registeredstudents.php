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
                            <h1 class="heading">View Information of RMSA Coordinates</h1>
                            <form class="form-horizontal border p-2" action="#">
                                <h2 class="second-heading">Registered Students</h2>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="distt">Distt:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="form-control">
                                                <option> ---Select---</option>
                                                <option> Bilaspur</option>
                                                <option> Chamba</option>
                                                <option> Hamirpur</option>
                                                <option> Kangra</option>
                                                <option> Kinnaur</option>
                                                <option> Kullu</option>
                                                <option> Lahul &amp; Spiti</option>
                                                <option> Mandi</option>
                                                <option> Shimla</option>
                                                <option> Sirmaur</option>
                                                <option> Solan</option>
                                                <option> Una</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="tehsil">Tehsil:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="form-control">
                                                <option value="0">---Select---</option>
                                                <option value="Bilaspur Sadar">Bilaspur Sadar</option>
                                                <option value="Ghumarwin">Ghumarwin</option>
                                                <option value="Jhanduta">Jhanduta</option>
                                                <option value="Naina Devi">Naina Devi</option>
                                                <option value="Namhol">Namhol</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4 col-xs-12" for="school">School:</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="form-control">
                                                <option value="0">---Select---</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="m-auto text-right">
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