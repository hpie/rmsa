 

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
            "ajax": "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/file_list.php' ?>",
            "columns": [
                {"data": "uploaded_file_title"},
                {"data": "uploaded_file_type"},
                {"data": "uploaded_file_group"},
                {"data": "uploaded_file_category"},
                {"data": "uploaded_file_desc"},
                {"data": "ext"}                                
            ]
        });
    });
</script>
<?php } ?>



<?php if ($title == ' - Student Resources') {
    ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/student_resources.php' ?>",
                "columns": [
                    {"data": "uploaded_file_title"},
                    {"data": "uploaded_file_type"},
                    {"data": "uploaded_file_group"},
                    {"data": "uploaded_file_category"},
                    {"data": "uploaded_file_desc"},
                    {"data": "ext"}
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
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/employee_students.php' ?>",
                    'data': {
                        rmsa_school_id: <?php if(isset($_SESSION['emp_rmsa_school_id'])){echo $_SESSION['emp_rmsa_school_id']; } ?>,
                        // etc..
                    }
                },
                "columns": [
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {
                        "render": function (data, type, row, meta) {
                            return $('<button></button>',{
                                'class': 'btn btn-success btn_approve',
                                'text': 'Approve',
                                 'data-id' : row.rmsa_user_id
                            }).prop("outerHTML");
                        }
                    },
                    {
                        "render": function (data, type, row, meta) {
                            return $('<button></button>',{
                                'class': 'btn btn-danger',
                                'text': 'Reject'
                            }).prop("outerHTML");
                        }
                    }
                ]
            });
            $(document).on('click','.btn_approve',function () {
                var rmsa_user_id = $(this).data('id');

                $.ajax({
                   type : "POST",
                   url  : "<?php echo STUDENT_APPROVE ?>",
                   data : {'rmsa_user_id':rmsa_user_id},
                   success : function(res){

                      var res = $.parseJSON(res);
                      if(res.suceess){
                          alert('Approved');
                      }
                   }
                });
            });
        });
    </script>
<?php } ?>
    

    
<?php if ($title == ' - Student Registration') {
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script>

        $(document).ready(function () {

            $('#student_register').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    rmsa_user_first_name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your first name'
                            }
                        }
                    },
                    rmsa_user_middle_name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your middle name'
                            }
                        }
                    },
                    rmsa_user_last_name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your last name'
                            }
                        }
                    },
                    rmsa_user_nick_name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your nick name'
                            }
                        }
                    },
                    rmsa_user_DOB: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your date of birth'
                            }
                        }
                    },
                    rmsa_user_father_name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your father name'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(result);
                }, 'json');
            });


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
    
           <?php
if(isset($_SESSION['st_rmsa_student_login_active'])) {
    if($_SESSION['st_rmsa_student_login_active'] == 1){
    //student will be logout if admin logout them from to backend
//    TODO
//    please run this sql on backend
//    ALTER TABLE `rmsa_student_users` ADD `rmsa_student_login_active` INT(1) NOT NULL AFTER `modified_dt`;
    ?>
    <script>
        $(document).ready(function () {            
            window.setInterval(function(){               
                $.ajax({
                    type : "POST",
                    url  : "<?php echo IS_STUDENT_ACTIVE ?>",
                    success:function (res) {
                        var check = $.parseJSON(res);
                        if(!check.isactive){
                            location.href = "<?php echo STUDENT_LOGOUT_LINK ?>"
                        }
                    }
                });
            },5000);
        });
    </script>
    <?php
    }
}
?>
<?php
if(isset($_SESSION['emp_rmsa_employee_login_active'])) {
    if($_SESSION['emp_rmsa_employee_login_active'] == 1){
        //student will be logout if admin logout them from to backend
//    TODO
//    please run this sql on backend
//     ALTER TABLE `rmsa_employee_users` ADD `rmsa_employee_login_active` INT(1) NOT NULL AFTER `modified_dt`;
        ?>
        <script>
            $(document).ready(function () {
                window.setInterval(function(){
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo IS_EMPLOYEE_ACTIVE ?>",
                        success:function (res) {
                            var check = $.parseJSON(res);
                            if(!check.isactive){
                                location.href = "<?php echo EMPLOYEE_LOGOUT_LINK ?>"
                            }
                        }
                    });
                },5000);
            });
        </script>
        <?php
    }
}
?>
<!--//this script will be run for all pages-->
</body>
</html>