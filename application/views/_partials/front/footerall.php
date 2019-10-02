 

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

</div>
<!-- Start Import Scripts -->
<?php
$this->load->view('_partials/front/scripts');
//	include('_partials/scripts.php'); // Includes Scripts Script
?>
<!-- End Import Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script>   
    
    $(document).ready(function () { 
        
        $("#accordion a").each(function() {   
            if (this.href == window.location.href) {
                $(this).css("background","#bc2832");
                $(this).parents('.submenu').css("display","block");
                $(this).parents('.submenu').parents('li').addClass('open');
            }
        });
        
//        $('#accordion').find('a.current').parent().prop('className');
//        
////       $("[data-toggle='tooltip']").tooltip(); 
//        // get current URL path and assign 'active' class                
//        var activeurl = window.location;   
////        $('a[href="'+activeurl+'"]').parent('.submenu').parent('li').addClass('open');
//        $('a[href="'+activeurl+'"]').parent('ul').css( "display", "block");

//        $('.navbar-nav > li > a[href="'+pathname+'"]').parent().css( "background-color", "red" );
//        
//        var pathname = window.location.href;        
//        $('.navbar-nav > li > a').removeClass('active');
//        $('.navbar-nav > li > a[href="' + pathname + '"]').addClass('active');        
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
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/file_list.php' ?>",
                    'data': {
                        emp_rmsa_user_id: <?php if (isset($_SESSION['emp_rmsa_user_id'])) {
        echo $_SESSION['emp_rmsa_user_id'];
    } ?>,
                    }
                },
    //            "ajax": "<?php //echo BASE_URL . '/assets/front/DataTablesSrc-master/file_list.php'  ?>",
                "columns": [
                    {"data": "uploaded_file_title"},
                    {"data": "uploaded_file_type"},
                    {"data": "uploaded_file_group"},
                    {"data": "uploaded_file_category"},
                    {"data": "uploaded_file_desc"},
                    {"data": "ext"},
                    {"data": "child"},
                    {"data": "ratting"}
                ]
            });
        });
    </script>
<?php } ?>

<?php if ($title == ' - Student Profile') {
    ?>
    <script>
        $(document).ready(function () {
            $('#frm_general_info').bootstrapValidator({
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
                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow") // Do something ...
                $('#frm_general_info').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    console.log(result);
                }, 'json');
            });

            $('#frm_change_password').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    rmsa_user_new_password: {
                        validators: {
                            stringLength: {
                                min: 6,
                            },
                            identical: {
                                field: 'rmsa_user_confirm_password',
                                message: 'The password and its confirm are not the same'
                            },
                            notEmpty: {
                                message: 'Please supply your new password'
                            }
                        }
                    },
                    rmsa_user_confirm_password: {
                        validators: {
                            stringLength: {
                                min: 6,
                            },
                            identical: {
                                field: 'rmsa_user_new_password',
                                message: 'The password and its confirm are not the same'
                            },
                            notEmpty: {
                                message: 'Please supply your confirm password'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow") // Do something ...
                $('#frm_change_password').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    console.log(result);
                }, 'json');
            });
        });
    </script>
<?php } ?>

<?php
if ($title == ' - File Reviews') {
    ?>
    <script>
        var reply_modal = $("#reply-modal");
        var fileId = "<?php echo $reviews['fileId']; ?>";
        var commentId;

        function comment_reply(comment_id) {
            commentId = comment_id;
            reply_modal.modal();
        }

        $(document).on('click', '.btn_post_reply', function (e) {
            var reply = $(".reply-comment");

            var data = {
                'file_id': fileId,
                'comment_id': commentId,
                'reply': reply.val(),
            };

            $.ajax({
                type: "POST",
                url: "<?php echo COMMENT_REPLY ?>",
                data: data,
                success: function (res) {
                    var res = $.parseJSON(res);
                    if (res.success) {
                        alert('Thank you, your reply has been submitted for review.')
                        reply_modal.modal('toggle');
                    }
                }
            });
        })

    </script>

<?php }
?>

<?php if ($title == ' - Student Resources') {
    ?>
    <script>
        var uploaded_file_id;
        var review_modal = $("#review-modal");
        function openreview(file_id) {
            uploaded_file_id = file_id;
            review_modal.modal();
            $('.review-comment').val('');
            show_rating(file_id);
            show_comments(file_id);
        }

        function show_rating(file_id) {
            $("#add_rating").empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_RATING ?>",
                data: {'file_id': file_id},
                success: function (res) {
                    $('#add_rating').append(res);
                }
            });
        }

        function show_comments(file_id) {
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
        }

        function resetRating() {
            if ($('#review_rating').val() != 0) {
                $('.review i').each(function (index) {
                    $(this).attr('class', 'fa fa-star')
                    if (index + 1 == $('#review_rating').val()) {
                        return false
                    }
                })
            }
        }
        function highlightStar(obj) {
            removeHighlight()
            $('.review i').each(function (index) {
                $(this).attr('class', 'fa fa-star')
                if (index == $('.review i').index(obj)) {
                    return false
                }
            })
        }

        function removeHighlight() {
            $('.review i').attr('class', 'fa fa-star-o')
        }

        function addRating(obj) {
            $('.review i').each(function (index) {
                $(this).attr('class', 'fa fa-star')
                $('#review_rating').val(index + 1)
                if (index == $('.review i').index(obj)) {
                    return false
                }
            })
        }

        $(document).on('click', '.btn_post_review', function (e) {
            var review_rating = $("#review_rating");
            var comment = $(".review-comment");
            if (review_rating.val() == '') {
                return alert('Please enter at least one rating.')
            }

            var data = {
                'file_id': uploaded_file_id,
                'rating': review_rating.val(),
                'comment': comment.val()
            }

            $.ajax({
                type: "POST",
                url: "<?php echo POST_REVIEW ?>",
                data: data,
                success: function (res) {
                    var res = $.parseJSON(res);
                    if (res.success) {
                        alert('Thank you, your post has been submitted for review.')
                        review_modal.modal('toggle');
                    }
                }
            });
        })

        $(document).on('click', '.view_count', function (e) {
            e.preventDefault();
            var rmsa_uploaded_file_id = $(this).data('id');
            var self = this;
            $.ajax({
                type: "POST",
                url: "<?php echo FILE_VIEW_COUNT ?>",
                data: {'rmsa_uploaded_file_id': rmsa_uploaded_file_id},
                success: function (res) {
                    var res = $.parseJSON(res);
                    if (res.count_added) {
                        location.href = self.href;
                    }
                }
            });
        });
        $(document).ready(function () {
            $('#example tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });
            $('#example').DataTable({               
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/student_resources.php'; ?>",
                    'data': {
                        uploaded_file_category: "<?php echo $uploaded_file_category; ?>",
                        // etc..
                    }
                },
                "columns": [
                    {"data": "uploaded_file_title"},
                    {"data": "uploaded_file_type"},
//                    {"data": "uploaded_file_group"},
                    {"data": "uploaded_file_category"},
                    {"data": "uploaded_file_desc"},
                    {"data": "ext"},
                    {"data": "review"},
                    {"data": "ratting"}

                ]
            }).columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
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
                        rmsa_school_id: <?php if (isset($_SESSION['emp_rmsa_school_id'])) {
        echo $_SESSION['emp_rmsa_school_id'];
    } ?>,
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
                            return $('<button></button>', {
                                'class': 'btn btn-success btn_approve',
                                'text': 'Approve',
                                'data-id': row.rmsa_user_id
                            }).prop("outerHTML");
                        }
                    },
                    {
                        "render": function (data, type, row, meta) {
                            return $('<button></button>', {
                                'class': 'btn btn-danger',
                                'text': 'Reject'
                            }).prop("outerHTML");
                        }
                    }
                ]
            });
            $(document).on('click', '.btn_approve', function () {
                var rmsa_user_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "<?php echo STUDENT_APPROVE ?>",
                    data: {'rmsa_user_id': rmsa_user_id},
                    success: function (res) {

                        var res = $.parseJSON(res);
                        if (res.suceess) {
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
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow") // Do something ...
                $('#student_register').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
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

                        $("#sub_district").append(new Option('---Select---', 0));
                        $("#rmsa_school").append(new Option('---Select---', 0));
                        $.each(data, function (index, value) {
                            $("#sub_district").append(new Option(value.rmsa_sub_district_name, value.rmsa_sub_district_id));
                        });
                    }
                })
            });

            $('#sub_district').on('change', function () {
                var subDistrictId = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "<?php echo LOAD_SCHOOL ?>",
                    data: {'subDistrictId': subDistrictId},
                    success: function (res) {
                        var school = $.parseJSON(res);
                        $("#rmsa_school").empty();
                        $("#rmsa_school").append(new Option('---Select---', 0));
                        $.each(school, function (index, value) {
                            $("#rmsa_school").append(new Option(value.rmsa_school_title, value.rmsa_school_id));
                        });
                    }
                });
            });
        });
    </script>
<?php }
?>

<?php
if (isset($_SESSION['st_rmsa_student_login_active'])) {
    if ($_SESSION['st_rmsa_student_login_active'] == 1) {
        //student will be logout if admin logout them from to backend
//    TODO
//    please run this sql on backend
//    ALTER TABLE `rmsa_student_users` ADD `rmsa_student_login_active` INT(1) NOT NULL AFTER `modified_dt`;
        ?>
        <script>
            $(document).ready(function () {
                window.setInterval(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo IS_STUDENT_ACTIVE ?>",
                        success: function (res) {
                            var check = $.parseJSON(res);
                            if (!check.isactive) {
                                location.href = "<?php echo STUDENT_LOGOUT_LINK ?>"
                            }
                        }
                    });
                }, 5000);
            });
        </script>
        <?php
    }
}
?>
<?php
if (isset($_SESSION['emp_rmsa_employee_login_active'])) {
    if ($_SESSION['emp_rmsa_employee_login_active'] == 1) {
        //student will be logout if admin logout them from to backend
//    TODO
//    please run this sql on backend
//     ALTER TABLE `rmsa_employee_users` ADD `rmsa_employee_login_active` INT(1) NOT NULL AFTER `modified_dt`;
        ?>
        <script>
            $(document).ready(function () {
                window.setInterval(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo IS_EMPLOYEE_ACTIVE ?>",
                        success: function (res) {
                            var check = $.parseJSON(res);
                            if (!check.isactive) {
                                location.href = "<?php echo EMPLOYEE_LOGOUT_LINK ?>"
                            }
                        }
                    });
                }, 5000);
            });
        </script>
        <?php
    }
}
?>
<!--//this script will be run for all pages-->
</body>
</html>