 

<!-- Start Import RightNavbar -->   
<?php
$this->load->view('_partials/rightnavbar');
//	include('_partials/rightnavbar.php'); // Includes Right Navbar Script
?>        
<!-- End Import RightNavbar -->                  

</div>
</div>
</section>
<!-- Body End -->

<!-- Start Import Navbar --> 
<?php
$this->load->view('_partials/footer');
//	include('_partials/footer.php'); // Includes Footer Script
?>
<!-- End Import Navbar -->         

<!-- Start Import Scripts -->
<?php
$this->load->view('_partials/scripts');
//	include('_partials/scripts.php'); // Includes Scripts Script
?>
<!-- End Import Scripts -->

</div>
<script type="text/javascript" nonce='S51U26wMQz'>
    $(document).ready(function () {
        // get current URL path and assign 'active' class
        var pathname = window.location.href;
        // alert(pathname);
        $('.navbar-nav > li > a').removeClass('active');
        $('.navbar-nav > li > a[href="'+ pathname +'"]').addClass('active');       
    });
</script>        

</body>

</html>