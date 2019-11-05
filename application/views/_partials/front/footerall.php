 

<!-- Start Import RightNavbar -->   
<?php
//$this->load->view('_partials/front/rightnavbar');
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" integrity="sha256-qSIshlknROr4J8GMHRlW3fGKrPki733tLq+qeMCR05Q=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha256-arMsf+3JJK2LoTGqxfnuJPFTU4hAK57MtIPdFpiHXOU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>


<script>    
//    function myFunction() {       
//        myVar = setTimeout(showPage, 3000);
//    }
//    function showPage() {
//        document.getElementById("loader").style.display = "none";
//        document.getElementById("myDiv").style.display = "block";
//    }    
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
        var pathname = window.location.href;        
        $('.navbar-nav > li > a').removeClass('active');
        $('.navbar-nav > li > a[href="' + pathname + '"]').addClass('active');        
    });
</script>
<?php
//all notification include
$this->load->view('_partials/front/allnotify');
?>

<?php if ($title == MOST_CONTENT_UPLOADED_EMPLOYEE_TITLE) {
    ?>
    <script>
        var employee_name = [];
        var overall_rating = [];

        $(most_upload).each(function (key,data) {
            employee_name.push(data.employee_name);
            overall_rating.push(data.uploaded_count);
        });

        var ctx = document.getElementById('most_content_upload_employee');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: employee_name,
                datasets: [{
                    label: 'Top Employee with most uploaded content',
                    data: overall_rating,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
<?php }?>

<?php if ($title == MOST_CONTENT_RATED_EMPLOYEE_TITLE) {
?>
    <script>
        var employee_name = [];
        var overall_rating = [];

        $(most_rated).each(function (key,data) {
            employee_name.push(data.employee_name);
            overall_rating.push(data.overall_rating);
        });

        var ctx = document.getElementById('employee_most_rated');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: employee_name,
                datasets: [{
                    label: 'Top Employee with most rated content',
                    data: overall_rating,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
<?php }?>

<?php if ($title == MOST_CONTENT_VIEW_EMPLOYEE_TITLE) {
    ?>
    <script>
        var employee_name = [];
        var uploaded_file_viewcount = [];

        $(most_content_view_employee).each(function (key,data) {
            employee_name.push(data.employee_name);
            uploaded_file_viewcount.push(data.uploaded_file_viewcount);
        });

        console.log(employee_name);
        console.log(uploaded_file_viewcount);

        var ctx = document.getElementById('most_content_view_employee');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: employee_name,
                datasets: [{
                    label: 'Top Employee with most viewed content',
                    data: uploaded_file_viewcount,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
<?php }?>

<?php if ($title == MOST_RATED_CONTENT_TITLE) {
    ?>
    <script>
        var uploaded_file_title = [];
        var overall_rating = [];

        $(most_rated_content).each(function (key,data) {
            uploaded_file_title.push(data.uploaded_file_title);
            overall_rating.push(data.overall_rating);
        });


        var ctx = document.getElementById('most_rated_content');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: uploaded_file_title,
                datasets: [{
                    label: 'Most Rated Content',
                    data: overall_rating,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
<?php }?>

<?php if ($title == RMSA_FILE_LIST_TITLE) {
    ?> 
    <script>        
        $(document).ready(function () {
        fill_datatable1();
        function fill_datatable1(uploaded_file_tag = '')
        {                         
            $('#example tfoot th').each( function () {                
                var title = $('#example thead th').eq($(this).index()).text();                
                if((title === "Title") || (title === "Type") || (title === "Group") || (title === "Category") || (title === "Description")){
                    $(this).html( '<input type="text" placeholder="'+title+'" />' ); 
                }
            });            
            var table = $('#example').DataTable({
                
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
		        className: 'control',
		        orderable: false,
		        targets: 0
		    } ],                                   
                "processing": true,
                "serverSide": true,
                "pageLength": 10,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_resource.php' ?>",
                    'data': {                        
                        uploaded_file_tag:uploaded_file_tag
                    }
                },
                "columns": [
                    {"data": "index"},
                    {"data": "uploaded_file_title"},
                    {"data": "ext"},
                    {"data": "uploaded_file_type"},
                    {"data": "uploaded_file_group"},
                    {"data": "uploaded_file_category"},
                    {"data": "uploaded_file_status"},
                    {"data": "ratting"},
                    {"data": "uploaded_file_desc"}
                ]
            });
            table.columns().eq(0).each( function ( colIdx ) { 
                $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                    table .column( colIdx ) .search( this.value ) .draw(); 
                }); 
            });
        }
        
         $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var uploaded_file_status = 'ACTIVE';

                if(status == 1){
                    uploaded_file_status = 'REMOVED';
                }

                if(!confirm('Are you sure want to '+uploaded_file_status.toLocaleLowerCase()+' file?')) return;

                self.attr('disabled','disabled');

                var data = {
                    'rmsa_uploaded_file_id' : self.data('id'),
                    'uploaded_file_status'  : uploaded_file_status
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_FILE_ACTIVE ?>",
                    data: data,
                    success: function (res) {

                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate file';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if(status == 1){
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text  = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                               'data-status' :isactive,
                               'title':title
                           });
                           self.removeAttr('disabled');
                           self.html(text);
                        }
                    }
                });
            });
        
        $('#searchTag').click(function(){
            var uploaded_file_tag = $('#uploaded_file_tag').val();            
            if(uploaded_file_tag != '')
            {
                $('#example').DataTable().destroy();
                fill_datatable1(uploaded_file_tag);
            }
            else
            {
                alert('Enter tag in textbox');  
                $('#example').DataTable().destroy();
                fill_datatable1();
            }
        });                
        $(document).on('click', '.viewFile', function (e) {
            e.preventDefault();
            var self = this;           
            window.open(self.href,'documents','width=600,height=400');                    
        });
    });
    function show_review_comments(file_id,e) {
        e.preventDefault();
        $('.show_comments').empty();
        $.ajax({
            type: "POST",
            url: "<?php echo DISPLAY_REVIEW ?>",
            data: {'file_id': file_id,'limit':10},
            success: function (res) {
                $('.show_comments').append(res);
            }
        });
        $("#view-reviews").modal();
    }
</script>
<?php } ?>

<?php if ($title == EMPLOYEE_FILE_LIST_TITLE) {
    ?> 
    <script>        
        $(document).ready(function () {
        fill_datatable1();
        function fill_datatable1(uploaded_file_tag = '')
        {                         
            $('#example tfoot th').each( function () {                
                var title = $('#example thead th').eq($(this).index()).text();                
                if((title === "Title") || (title === "Type") || (title === "Group") || (title === "Category") || (title === "Description")){
                    $(this).html( '<input type="text" placeholder="'+title+'" />' ); 
                }
            });            
            var table = $('#example').DataTable({
                
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
		        className: 'control',
		        orderable: false,
		        targets: 0
		    } ],                                  
                "processing": true,
                "serverSide": true,
                "pageLength": 10,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/file_list.php' ?>",
                    'data': {
                        emp_rmsa_user_id: <?php if (isset($_SESSION['emp_rmsa_user_id'])) { echo $_SESSION['emp_rmsa_user_id'];} ?>,
                        uploaded_file_tag:uploaded_file_tag
                    }
                },
                "columns": [
                    {"data": "index"},
                    {"data": "uploaded_file_title"},
                    {"data": "ext"},
                    {"data": "uploaded_file_type"},
                    {"data": "uploaded_file_group"},
                    {"data": "uploaded_file_category"},                                     
                    {"data": "child"},
                    {"data": "ratting"},
                    {"data": "uploaded_file_status"},
                    {"data": "action"},
                    {"data": "uploaded_file_desc"}
                ]
            });
            table.columns().eq(0).each( function ( colIdx ) { 
                $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                    table .column( colIdx ) .search( this.value ) .draw(); 
                }); 
            });
        }
        
        $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var uploaded_file_status = 'ACTIVE';

                if(status == 1){
                    uploaded_file_status = 'REMOVED';
                }

                if(!confirm('Are you sure want to '+uploaded_file_status.toLocaleLowerCase()+' file?')) return;

                self.attr('disabled','disabled');

                var data = {
                    'rmsa_uploaded_file_id' : self.data('id'),
                    'uploaded_file_status'  : uploaded_file_status
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_FILE_ACTIVE ?>",
                    data: data,
                    success: function (res) {

                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate file';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if(status == 1){
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text  = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                               'data-status' :isactive,
                               'title':title
                           });
                           self.removeAttr('disabled');
                           self.html(text);
                        }
                    }
                });
            });
        
        
        $('#searchTag').click(function(){
            var uploaded_file_tag = $('#uploaded_file_tag').val();            
            if(uploaded_file_tag != '')
            {
                $('#example').DataTable().destroy();
                fill_datatable1(uploaded_file_tag);
            }
            else
            {
                alert('Enter tag in textbox');  
                $('#example').DataTable().destroy();
                fill_datatable1();
            }
        });                
        $(document).on('click', '.viewFile', function (e) {
            e.preventDefault();
            var self = this;           
            window.open(self.href,'documents','width=600,height=400');                    
        });
    });
    function show_review_comments(file_id,e) {
        e.preventDefault();
        $('.show_comments').empty();
        $.ajax({
            type: "POST",
            url: "<?php echo DISPLAY_REVIEW ?>",
            data: {'file_id': file_id,'limit':10},
            success: function (res) {
                $('.show_comments').append(res);
            }
        });
        $("#view-reviews").modal();
    }
</script>
<?php } ?>
    
    <?php if ($title == STUDENT_RESOURCES_TITLE) {
    ?>
    <script>                                
        var uploaded_file_id;
        var review_modal = $("#review-modal");
        var view_reviews_modal = $("#view-reviews");
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
                data: {'file_id': file_id,'limit':10},
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

        function display_comments(fileId,e){
            e.preventDefault();
            view_reviews_modal.modal();
            show_comments(fileId);

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
                        window.open(self.href,'documents','width=600,height=400');
                    }
                }
            });
        });
        $(document).ready(function () {
        fill_datatable();
        function fill_datatable(uploaded_file_tag = '')
        {        
            $('#example tfoot th').each( function () {                
                var title = $('#example thead th').eq($(this).index()).text();                
                if((title === "Title") || (title === "Type") || (title === "Group") || (title === "Category") || (title === "Description")){
                    $(this).html( '<input type="text" placeholder="'+title+'" />' ); 
                }
            });
            var table = $('#example').DataTable({ 
            
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
                    className: 'control',
                    orderable: false,
                    targets: 0
                } ],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/student_resources.php'; ?>",
                    'data': {
                        uploaded_file_category: "<?php echo $uploaded_file_category; ?>",
                        uploaded_file_tag:uploaded_file_tag
                        // etc..
                    }
                },
                "columns": [
                    {"data": "index"},
                    {"data": "uploaded_file_title"},
                    {"data": "ext"},
                    {"data": "uploaded_file_type"},
                    {"data": "uploaded_file_group"},
                    {"data": "uploaded_file_category"},                                    
                    {"data": "review"},
                    {"data": "ratting"},
                    {"data": "uploaded_file_desc"}

                ]
            });
            table.columns().eq(0).each( function ( colIdx ) {
            $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                    table .column( colIdx ) .search( this.value ) .draw(); 
                }); 
            });
        }                 
        $('#searchTag').click(function(){
            var uploaded_file_tag = $('#uploaded_file_tag').val();            
            if(uploaded_file_tag != '')
            {
                $('#example').DataTable().destroy();
                fill_datatable(uploaded_file_tag);
            }
            else
            {
                alert('Enter tag in textbox');  
                $('#example').DataTable().destroy();
                fill_datatable();
            }
        });
        });
    </script>
<?php } ?>

<?php if ($title == EMPLOYEE_STUDENT_LIST_TITLE) {
    ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                
                 responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
                    className: 'control',
                    orderable: false,
                    targets: 0
                } ],                             
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
                    {"data": "index"},
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {"data": "rmsa_user_status"},
                    {"data": "rmsa_user_edit"}
                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');



                var user_status = 'ACTIVE';

                if(status == 1)
                    user_status = 'REMOVED';

                if(!confirm('Are you sure want to '+user_status.toLocaleLowerCase()+' student?')) return;
                self.attr('disabled','disabled');

                var data = {
                    'rmsa_user_id' : self.data('id'),
                    'user_status'  : user_status
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo STUDENT_APPROVE ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate student';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if(status == 1){
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text  = 'Inactive';
                                isactive = 0;
                            }

                            self.removeClass().addClass(class_);
                           self.attr({
                               'data-status' :isactive,
                               'title':title
                           });
                           self.removeAttr('disabled');
                           self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>
    
<?php if ($title == RMSAE_STUDENT_LIST_TITLE) {
    ?>
    <script>        
        $(document).ready(function () {           
            $('#example').DataTable({
                
                 responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
                    className: 'control',
                    orderable: false,
                    targets: 0
                } ],                                
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_students.php' ?>",               
                },
                    "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {"data": "rmsa_user_status"},
                    {"data": "rmsa_user_edit"}
                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var user_status = 'ACTIVE';

                if(status == 1){
                    user_status = 'REMOVED';
                }

                if(!confirm('Are you sure want to '+user_status.toLocaleLowerCase()+' student?')) return;

                self.attr('disabled','disabled');

                var data = {
                    'rmsa_user_id' : self.data('id'),
                    'user_status'  : user_status
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_STUDENT_ACTIVE ?>",
                    data: data,
                    success: function (res) {

                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate student';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if(status == 1){
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text  = 'Inactive';
                                isactive = 0;
                            }

                            self.removeClass().addClass(class_);
                           self.attr({
                               'data-status' :isactive,
                               'title':title
                           });
                           self.removeAttr('disabled');
                           self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>
<?php if ($title == RMSAE_EMPLOYEE_LIST_TITLE) {
    ?>
    <script>        
        $(document).ready(function () {
            $('#example').DataTable({
                
                 responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
                    className: 'control',
                    orderable: false,
                    targets: 0
                } ],                                
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_employee.php' ?>",               
                },
                    "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {"data": "rmsa_user_status"},
                    {"data": "rmsa_user_edit"}
                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');


                var user_status = 'ACTIVE';

                if(status == 1){
                    user_status = 'REMOVED';   
                }

                if(!confirm('Are you sure want to '+user_status.toLocaleLowerCase()+' employee?')) return;
                self.attr('disabled','disabled');

                var data = {
                    'rmsa_user_id' : self.data('id'),
                    'user_status'  : user_status
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_EMPLOYEE_ACTIVE ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            var title = 'Click to deactivate student';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;
                            if(status == 1){
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text  = 'Inactive';
                                isactive = 0;
                            }
                           self.removeClass().addClass(class_);
                           self.attr({
                               'data-status' :isactive,
                               'title':title
                           });
                           self.removeAttr('disabled');
                           self.html(text);
                        }
                    }
                });
            });
        });
    </script>
<?php } ?>

<?php if ($title == STUDENT_PROFILE_TITLE) {
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
                    rmsa_user_last_name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your last name'
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
                    if(result['success']=="success"){                        
                            location.href = "<?php echo STUDENT_UPDATE_PROFILE_LINK; ?>";                                           
                    }
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
                    if(result['success']=="success"){                        
                            location.href = "<?php echo STUDENT_UPDATE_PROFILE_LINK; ?>";                                           
                    }
                    if(result['success']=="fail"){                    
                        var d = new PNotify({
                            title: 'Old Password not match',
                            type: 'error',
                            styling: 'bootstrap3',
                        });                          
                    }
                }, 'json');
            });
        });
    </script>
<?php } ?>
    
<?php if ($title == EMPLOYEE_STUDENT_PROFILE_TITLE) {
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
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your first name'
                            }
                        }
                    },
                    rmsa_user_last_name: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your last name'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#frm_general_info').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {                                        
                    if(result['success']==="success"){                        
                            location.reload();                                        
                    }
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
                                min: 6
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
                                min: 6
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
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#frm_change_password').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    if(result['success']==="success"){                        
                            location.reload();                                           
                    }
                    if(result['success']==="fail"){                    
                        var d = new PNotify({
                            title: 'Old Password not match',
                            type: 'error',
                            styling: 'bootstrap3'
                        });                          
                    }
                }, 'json');
            });
        });
    </script>
<?php } ?>
    <?php if ($title == RMSA_STUDENT_PROFILE_TITLE) {
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

                        $("#sub_district").append(new Option('---Select---', 0));
                        $("#rmsa_school").append(new Option('---Select---', 0));
                        $.each(data, function (index, value) {
                            $("#sub_district").append(new Option(value.rmsa_sub_district_name, value.rmsa_sub_district_id));
                        });
                    }
                });
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
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your first name'
                            }
                        }
                    },
                    rmsa_user_last_name: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your last name'
                            }
                        }
                    },
                    rmsa_user_roll_number: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your roll number'
                            }
                        }
                    },
                    rmsa_user_email_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your email address'
                            },
                            emailAddress: {
                                message: 'Please supply a valid email address'
                            }
                        }
                    },
                    rmsa_user_DOB: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your date of birth'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#frm_general_info').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {                                        
                    if(result['success']==="success"){                        
                            location.reload();                                        
                    }
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
                                min: 6
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
                                min: 6
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
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#frm_change_password').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    if(result['success']==="success"){                        
                            location.reload();                                           
                    }
                    if(result['success']==="fail"){                    
                        var d = new PNotify({
                            title: 'Old Password not match',
                            type: 'error',
                            styling: 'bootstrap3'
                        });                          
                    }
                }, 'json');
            });
        });
    </script>
<?php } ?>
    <?php if ($title == RMSA_EMPLOYEE_PROFILE_TITLE) {
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

                        $("#sub_district").append(new Option('---Select---', 0));
                        $("#rmsa_school").append(new Option('---Select---', 0));
                        $.each(data, function (index, value) {
                            $("#sub_district").append(new Option(value.rmsa_sub_district_name, value.rmsa_sub_district_id));
                        });
                    }
                });
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
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your first name'
                            }
                        }
                    },
                    rmsa_user_last_name: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your last name'
                            }
                        }
                    },
                    rmsa_user_employee_code: {
                        validators: {
                            stringLength: {
                                min: 2
                            },
                            notEmpty: {
                                message: 'Please supply your Employee code'
                            }
                        }
                    },
                    rmsa_user_email_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your email address'
                            },
                            emailAddress: {
                                message: 'Please supply a valid email address'
                            }
                        }
                    },
                    rmsa_user_DOB: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your date of birth'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#frm_general_info').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {                                        
                    if(result['success']==="success"){                        
                            location.reload();                                        
                    }
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
                                min: 6
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
                                min: 6
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
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#frm_change_password').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    if(result['success']==="success"){                        
                            location.reload();                                           
                    }
                    if(result['success']==="fail"){                    
                        var d = new PNotify({
                            title: 'Old Password not match',
                            type: 'error',
                            styling: 'bootstrap3'
                        });                          
                    }
                }, 'json');
            });
        });
    </script>
<?php } ?>

<?php
if ($title == FILE_REVIEWS_TITLE) {
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


<?php if ($title == RMSA_EMPLOYEE_REGISTRATION_TITLE) {
    ?>
    <script>
        $(document).ready(function () {

            $('#employee_register').bootstrapValidator({
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
                    rmsa_user_employee_code: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your roll number'
                            }
                        }
                    },
                    rmsa_user_email_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your email address'
                            },
                            emailAddress: {
                                message: 'Please supply a valid email address'
                            }
                        }
                    },
                    rmsa_user_email_password: {
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
                                field: 'rmsa_user_email_password',
                                message: 'The password and its confirm are not the same'
                            },
                            notEmpty: {
                                message: 'Please supply your confirm password'
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
                $('#employee_register').data('bootstrapValidator').resetForm();
                // Prevent form submission
                e.preventDefault();
                // Get the form instance
                var $form = $(e.target);
                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');
                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {                                        
                    if(result['success']=="success"){
                        if('<?php if(isset($_SESSION['rm_rmsa_user_id'])){ echo '1'; }else{echo '0';} ?>' === '1'){
                            location.href = "<?php echo RMSA_EMPLOYEE_LIST_LINK ?>";
                        }                   
                    }
                    if(result['success']=="fail"){                    
                        var d = new PNotify({
                            title: 'Invalid Username & Password',
                            type: 'error',
                            styling: 'bootstrap3',
                        });                          
                    }
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
                });
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


<?php if ($title == STUDENT_REGISTRATION_TITLE) {
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
                    rmsa_user_roll_number: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your roll number'
                            }
                        }
                    },
                    rmsa_user_email_id: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply your email address'
                            },
                            emailAddress: {
                                message: 'Please supply a valid email address'
                            }
                        }
                    },
                    rmsa_user_email_password: {
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
                                field: 'rmsa_user_email_password',
                                message: 'The password and its confirm are not the same'
                            },
                            notEmpty: {
                                message: 'Please supply your confirm password'
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
                    if(result['success']=="success"){
                        if('<?php if(isset($_SESSION['rm_rmsa_user_id'])){ echo '1'; }else{echo '0';} ?>' === '1'){
                            location.href = "<?php echo RMSA_STUDENT_LIST_LINK; ?>";
                        }
                        if('<?php if(isset($_SESSION['emp_rmsa_user_id'])){ echo '1'; }else{echo '0';} ?>' === '1'){
                            location.href = "<?php echo EMPLOYEE_STUDENT_LIST_LINK ?>";
                        }
                        location.href = "<?php echo HOME_LINK ?>";                    
                    }
                    if(result['success']=="fail"){                    
                        var d = new PNotify({
                            title: 'Invalid Username & Password',
                            type: 'error',
                            styling: 'bootstrap3',
                        });                          
                    }
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