 

<!-- Start Import RightNavbar -->   
<?php
$this->load->view('_partials/front/rightnavbar');
//	include('_partials/rightnavbar.php'); // Includes Right Navbar Script
?>        
<!-- End Import RightNavbar -->                  

</div>
</div>
</section>
<!-- Body End -->

<!-- Start Import Navbar --> 
<?php
$this->load->view('_partials/front/footer');
//	include('_partials/footer.php'); // Includes Footer Script
?>
<!-- End Import Navbar -->         


<!-- Start Import Scripts -->
<?php
$this->load->view('_partials/front/scripts');
//	include('_partials/scripts.php'); // Includes Scripts Script
?>
<!-- End Import Scripts -->

</div>

<script>
    $(document).ready(function () {
        // get current URL path and assign 'active' class
        var pathname = window.location.href;
        // alert(pathname);
        $('.navbar-nav > li > a').removeClass('active');
        $('.navbar-nav > li > a[href="' + pathname + '"]').addClass('active');
    });
</script> 
<script>
    $(document).ready(function () {
        $('#example').DataTable({           
            "processing": true,
            "serverSide": true,
            "paginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "ajax": "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/examples/server_side/scripts/server_processing.php' ?>",
            columns: [
                {"data": "rmsa_user_first_name"},
                {"data": "rmsa_user_DOB"},
                {"data": "rmsa_user_mobile_no"},
                {"data": "rmsa_user_email_id"}
          ]
        });
    });
</script>
</body>
</html>