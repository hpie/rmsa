<!DOCTYPE html>
<html lang="en">

<!-- Start Import Head -->
<?php
$this->load->view('_partials/head');
//	include('_partials/head.php'); // Includes Header Script
?>
<!-- End Import Head -->

<body>
    <div class="">
    
<!-- Start Import Navbar -->   
<?php
$this->load->view('_partials/navbar');
//	include('_partials/navbar.php'); // Includes Navbar Script
?>        
<!-- End Import Navbar -->   

	 <!-- Body Start -->
        <section class="main">
        	<div class="wapper">
                <div class="row mob-v-c-order">

<!-- Start Import LeftNavbar -->   
<?php
        $this->load->view('_partials/leftnavbar');
//	include('_partials/leftnavbar.php'); // Includes LeftNavbar Script
?>        
<!-- End Import LeftNavbar -->
                <!-- overlay mobile -->  
                <div class="menu-overlay"></div>