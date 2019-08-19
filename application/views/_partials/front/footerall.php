 

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
<?php
//all notification include
$this->load->view('_partials/front/allnotify');
?>
<?php if ($title == ' - FileDw') {
    ?> 
<script>
    $(document).ready(function () {
        $('#example').DataTable({            
            "processing": true,
            "serverSide": true,
            "paginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "ajax": "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/examples/server_side/scripts/server_processing.php' ?>",
            "columns": [
                {"data": "rmsa_user_id"},
                {"data": "rmsa_user_first_name"},
                {"data": "rmsa_user_gender"},
                {"data": "rmsa_user_DOB"},
                {"data": "rmsa_user_email_id"}
            ]
        });
    });
</script>
<?php } ?>
<?php if ($title == ' - EmployeeStudent') {
    ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/examples/server_side/scripts/employee_students.php' ?>",
                "columns": [
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"}
                ]
            });
        });
    </script>
<?php } ?>
<?php if ($title == ' - Student Registration') {
    ?>          
    <script>
        $(document).ready(function () {
            $('#rmsa_district').on('change', function () {
                var districtId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo LOAD_TEHSIL ?>",
                    data: {'districtId': districtId},
                    success: function (res) {
                        var data = jQuery.parseJSON(res);
                        $("#sub_district").empty();
                        $("#rmsa_school").empty();

                        $("#sub_district").append(new Option('---Select---',0));
                        $("#rmsa_school").append(new Option('---Select---',0));
                        $.each(data, function (index, value) {
                            $("#sub_district").append(new Option(value.rmsa_sub_district_name, value.rmsa_sub_district_id));
                        });
                    }
                })
            });

            $('#sub_district').on('change',function () {
               var subDistrictId = $(this).val();

               $.ajax({
                  type : "POST",
                  url  : "<?php echo LOAD_SCHOOL ?>",
                  data : {'subDistrictId' : subDistrictId},
                  success : function (res) {
                        var school = $.parseJSON(res);
                        $("#rmsa_school").empty();
                        $("#rmsa_school").append(new Option('---Select---',0));
                        $.each(school,function (index,value) {
                           $("#rmsa_school").append(new Option(value.rmsa_school_title,value.rmsa_school_id));
                        });
                  }
               });
            });
        });
    </script>
    <?php }
?>
</body>
</html>