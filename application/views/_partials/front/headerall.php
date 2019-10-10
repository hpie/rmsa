<!DOCTYPE html>
<html lang="en">

<!-- Start Import Head -->
<?php
$this->load->view('_partials/front/head');
//	include('_partials/head.php'); // Includes Header Script
?>
<style>
.tooltip1 .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}
.tooltip1:hover .tooltiptext {
  visibility: visible;
}
</style>
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<!-- End Import Head -->
<body>
    
<!--<body onload="myFunction()">-->
    <!--<div id="loader"></div>-->
    <!--<body onunload="ajaxFunction()">-->
    <div class="">
    
<!-- Start Import Navbar -->   
<?php
$this->load->view('_partials/front/navbar');
//	include('_partials/navbar.php'); // Includes Navbar Script
?>        
<!-- End Import Navbar -->   

	 <!-- Body Start -->
        <section class="main">
        	<div class="wapper">
                <div class="row mob-v-c-order">

<!-- Start Import LeftNavbar -->   
<?php
        $this->load->view('_partials/front/leftnavbar');
//	include('_partials/leftnavbar.php'); // Includes LeftNavbar Script
?>        
<!-- End Import LeftNavbar -->
                <!-- overlay mobile -->  
                <div class="menu-overlay"></div>