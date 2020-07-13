 

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
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/bootstrapValidator.min.js?v=1.0" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/Chart.bundle.js?v=1.0" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/Chart.bundle.min.js?v=1.0" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/Chart.js?v=1.0" type="text/javascript"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/Chart.min.js?v=1.0" type="text/javascript"></script>

<?php
if ($title != STUDENT_EXAM_START_TITLE) {
    $_SESSION['score'] = 0;
}
?>
<script nonce='S51U26wMQz' type="text/javascript">
    $(document).ready(function () {
        $('input[type=text]').keyup(function (e) {
            if($(this).hasClass("novalidation")){}
            else{
                var str=$(this).val();
                for (var i = 0; i < str.length; i++) {
                    var charCode=str.charAt(i).charCodeAt(0);                  
                     if (charCode === 60 || charCode === 96 || charCode === 126 || charCode === 33 || charCode === 35 || charCode === 36 || charCode === 37 || charCode === 94 || charCode === 96 || charCode === 38 || charCode === 42 || charCode == 40 || charCode === 41 || charCode === 61 || charCode === 43 || charCode === 123 || charCode === 125 || charCode === 91 || charCode === 93 || charCode === 124 || charCode === 92 || charCode === 58 || charCode === 59 || charCode === 34 || charCode === 39 || charCode === 44 || charCode === 63 || charCode === 47 || charCode === 62)
                    {                
                        alert('Special Characters are not allowed. Only use A-Z, a-z and 0-9');
                        $(this).val('');
                        return false;
                    }       


                }               
                return true;
            }
        });        
        $("#fileupload").delegate(".input", "keyup", function (e) {
            if($(this).hasClass("novalidation")){}
            else{
                var str=$(this).val();
                for (var i = 0; i < str.length; i++) {
                    var charCode=str.charAt(i).charCodeAt(0);                  
                    if (charCode === 60 || charCode === 96 || charCode === 126 || charCode === 33 || charCode === 35 || charCode === 36 || charCode === 37 || charCode === 94 || charCode === 96 || charCode === 38 || charCode === 42 || charCode == 40 || charCode === 41 || charCode === 61 || charCode === 43 || charCode === 123 || charCode === 125 || charCode === 91 || charCode === 93 || charCode === 124 || charCode === 92 || charCode === 58 || charCode === 59 || charCode === 34 || charCode === 39 || charCode === 44 || charCode === 63 || charCode === 47 || charCode === 62)
                    {                
                        alert('Special Characters are not allowed. Only use A-Z, a-z and 0-9');
                        $(this).val('');
                        return false;
                    }                                       
                }               
                return true;
            }
        });
        $('textarea').keyup(function (e) {
            if($(this).hasClass("novalidation")){}
            else{
                var str=$(this).val();
                for (var i = 0; i < str.length; i++) {
                    var charCode=str.charAt(i).charCodeAt(0);                  
                    if (charCode === 60 || charCode === 96 || charCode === 126 || charCode === 33 || charCode === 35 || charCode === 36 || charCode === 37 || charCode === 94 || charCode === 96 || charCode === 38 || charCode === 42 || charCode == 40 || charCode === 41 || charCode === 61 || charCode === 43 || charCode === 123 || charCode === 125 || charCode === 91 || charCode === 93 || charCode === 124 || charCode === 92 || charCode === 58 || charCode === 59 || charCode === 34 || charCode === 39 || charCode === 44 || charCode === 63 || charCode === 47 || charCode === 62)
                    {                
                        alert('Special Characters are not allowed. Only use A-Z, a-z and 0-9');
                        $(this).val('');
                        return false;
                    }       


                }               
                return true;
            }
        });
    });
</script>   
<script nonce='S51U26wMQz' type="text/javascript">
//    function myFunction() {       
//        myVar = setTimeout(showPage, 3000);
//    }
//    function showPage() {
//        document.getElementById("loader").style.display = "none";
//        document.getElementById("myDiv").style.display = "block";
//    }    
    $(document).ready(function () {
//
//        document.onkeydown = function (e) {
//            if (e.keyCode == 123) {
//                return false;
//            }
//            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//                return false;
//            }
//            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//                return false;
//            }
//            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//                return false;
//            }
//             if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
//                return false;
//            }
//            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//                return false;
//            }
//        }

        $("#accordion a").each(function () {
            if (this.href == window.location.href) {
                $(this).css("background", "#bc2832");
                $(this).parents('.submenu').css("display", "block");
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

<script nonce='S51U26wMQz' type="text/javascript">
    $(document).ready(function () {
        $(".emp_reports").on('change', function () {
            var type = $(this).val();
            if (type != 0) {
                var link = '<?= EMPLOYEE_REPORTS ?>';
                window.location.href = link + '/' + type;
            }
        })
    });
</script>
<script nonce='S51U26wMQz' type="text/javascript">
    $(document).ready(function () {
        $(".reports_go").on('click', function () {
            var type = $('.emp_reports_type').find(":selected").val();
            var month = $('.emp_reports_duration').find(":selected").val();
            if (type != 0 && month != 0) {
                var link = '<?= EMPLOYEE_REPORTS_2 ?>';
                window.location.href = link + '/' + month + '/' + type;
            }
            if (type == 0) {
                alert("Please select report type");
            }
            if (month == 0) {
                alert("Please select report duation");
            }
        });
    });
</script>
<?php if ($title == REPORTS_2_UPLOADED_CONTENT_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var month = [];
        var count = [];
        $(most_upload).each(function (key, data) {
            month.push(data.month);
            count.push(data.count);
        });
        var ctx = document.getElementById('upload_content_reports2');
        var progress = document.getElementById('animationProgress');
        Chart.plugins.register({
            beforeRender: function (chart) {
                if (chart.config.options.showAllTooltips) {
                    // create an array of tooltips
                    // we can't use the chart tooltip because there is only one tooltip per chart
                    chart.pluginTooltips = [];
                    chart.config.data.datasets.forEach(function (dataset, i) {
                        chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                            chart.pluginTooltips.push(
                                    new Chart.Tooltip(
                                            {
                                                _chart: chart.chart,
                                                _chartInstance: chart,
                                                _data: chart.data,
                                                _options: chart.options.tooltips,
                                                _active: [sector]
                                            },
                                            chart
                                            )
                                    );
                        });
                    });

                    // turn off normal tooltips
                    chart.options.tooltips.enabled = false;
                }
            },
            afterDraw: function (chart, easing) {
                if (chart.config.options.showAllTooltips) {
                    // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                    if (!chart.allTooltipsOnce) {
                        if (easing !== 1)
                            return;
                        chart.allTooltipsOnce = true;
                    }
                    // turn on tooltips
                    chart.options.tooltips.enabled = true;
                    Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                        tooltip.initialize();
    //				tooltip._options.bodyFontFamily = "'Lato', sans-serif";
                        tooltip._options.bodyFontFamily = "'Lato', sans-serif";
                        tooltip._options.displayColors = true;
                        tooltip._options.titleFontSize = 12;
                        tooltip._options.bodyFontSize = 12;
                        tooltip._options.yPadding = 6;
                        tooltip._options.xPadding = 6;
                        tooltip._options.cornerRadius = 0;
                        // tooltip._options.position = 'average';
                        // tooltip._options.caretSize = tooltip._options.bodyFontSize * 0.5;
                        //tooltip._options.cornerRadius = tooltip._options.bodyFontSize * 0.5;
                        tooltip.update();
                        // we don't actually need this since we are not animating tooltips
                        tooltip.pivot();
                        tooltip.transition(easing).draw();
                    });
                    chart.options.tooltips.enabled = false;
                }
            }
        });

        var myChart = new Chart(ctx, {
    //            type: 'bar',
            type: 'horizontalBar',
            data: {
                labels: month,
                datasets: [{
                        label: 'Total uploaded content',
                        data: count,
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
                        borderWidth: 3
                    }]
            },
            options: {
                showAllTooltips: true, // call plugin we created
                responsive: true,
                title: {
                    display: true,
                    text: '<?php echo $label ?>',
                    fontSize: 18
                },
                animation: {
                    duration: 1500,
                    onProgress: function (animation) {
                        progress.value = animation.currentStep / animation.numSteps;
                    }
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>
<?php if ($title == REPORTS_2_STUDENT_REGISTERED_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var month = [];
        var count = [];
        $(most_upload).each(function (key, data) {
            month.push(data.month);
            count.push(data.count);
        });
        var ctx = document.getElementById('upload_content_reports2');
        var progress = document.getElementById('animationProgress');
        Chart.plugins.register({
            beforeRender: function (chart) {
                if (chart.config.options.showAllTooltips) {
                    // create an array of tooltips
                    // we can't use the chart tooltip because there is only one tooltip per chart
                    chart.pluginTooltips = [];
                    chart.config.data.datasets.forEach(function (dataset, i) {
                        chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                            chart.pluginTooltips.push(
                                    new Chart.Tooltip(
                                            {
                                                _chart: chart.chart,
                                                _chartInstance: chart,
                                                _data: chart.data,
                                                _options: chart.options.tooltips,
                                                _active: [sector]
                                            },
                                            chart
                                            )
                                    );
                        });
                    });

                    // turn off normal tooltips
                    chart.options.tooltips.enabled = false;
                }
            },
            afterDraw: function (chart, easing) {
                if (chart.config.options.showAllTooltips) {
                    // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                    if (!chart.allTooltipsOnce) {
                        if (easing !== 1)
                            return;
                        chart.allTooltipsOnce = true;
                    }
                    // turn on tooltips
                    chart.options.tooltips.enabled = true;
                    Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                        tooltip.initialize();
    //				tooltip._options.bodyFontFamily = "'Lato', sans-serif";
                        tooltip._options.bodyFontFamily = "'Lato', sans-serif";
                        tooltip._options.displayColors = true;
                        tooltip._options.titleFontSize = 12;
                        tooltip._options.bodyFontSize = 12;
                        tooltip._options.yPadding = 6;
                        tooltip._options.xPadding = 6;
                        tooltip._options.cornerRadius = 0;
                        // tooltip._options.position = 'average';
                        // tooltip._options.caretSize = tooltip._options.bodyFontSize * 0.5;
                        //tooltip._options.cornerRadius = tooltip._options.bodyFontSize * 0.5;
                        tooltip.update();
                        // we don't actually need this since we are not animating tooltips
                        tooltip.pivot();
                        tooltip.transition(easing).draw();
                    });
                    chart.options.tooltips.enabled = false;
                }
            }
        });

        var myChart = new Chart(ctx, {
    //            type: 'bar',
            type: 'horizontalBar',
            data: {
                labels: month,
                datasets: [{
                        label: 'Total registered student',
                        data: count,
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
                        borderWidth: 3
                    }]
            },
            options: {
                showAllTooltips: true, // call plugin we created
                responsive: true,
                title: {
                    display: true,
                    text: '<?php echo $label ?>',
                    fontSize: 18
                },
                animation: {
                    duration: 1500,
                    onProgress: function (animation) {
                        progress.value = animation.currentStep / animation.numSteps;
                    }
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>    
<?php if ($title == REPORTS_2_TEACHER_REGISTERED_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var month = [];
        var count = [];
        $(most_upload).each(function (key, data) {
            month.push(data.month);
            count.push(data.count);
        });
        var ctx = document.getElementById('upload_content_reports2');
        var progress = document.getElementById('animationProgress');
        Chart.plugins.register({
            beforeRender: function (chart) {
                if (chart.config.options.showAllTooltips) {
                    // create an array of tooltips
                    // we can't use the chart tooltip because there is only one tooltip per chart
                    chart.pluginTooltips = [];
                    chart.config.data.datasets.forEach(function (dataset, i) {
                        chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                            chart.pluginTooltips.push(
                                    new Chart.Tooltip(
                                            {
                                                _chart: chart.chart,
                                                _chartInstance: chart,
                                                _data: chart.data,
                                                _options: chart.options.tooltips,
                                                _active: [sector]
                                            },
                                            chart
                                            )
                                    );
                        });
                    });

                    // turn off normal tooltips
                    chart.options.tooltips.enabled = false;
                }
            },
            afterDraw: function (chart, easing) {
                if (chart.config.options.showAllTooltips) {
                    // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                    if (!chart.allTooltipsOnce) {
                        if (easing !== 1)
                            return;
                        chart.allTooltipsOnce = true;
                    }
                    // turn on tooltips
                    chart.options.tooltips.enabled = true;
                    Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                        tooltip.initialize();
    //				tooltip._options.bodyFontFamily = "'Lato', sans-serif";
                        tooltip._options.bodyFontFamily = "'Lato', sans-serif";
                        tooltip._options.displayColors = true;
                        tooltip._options.titleFontSize = 12;
                        tooltip._options.bodyFontSize = 12;
                        tooltip._options.yPadding = 6;
                        tooltip._options.xPadding = 6;
                        tooltip._options.cornerRadius = 0;
                        // tooltip._options.position = 'average';
                        // tooltip._options.caretSize = tooltip._options.bodyFontSize * 0.5;
                        //tooltip._options.cornerRadius = tooltip._options.bodyFontSize * 0.5;
                        tooltip.update();
                        // we don't actually need this since we are not animating tooltips
                        tooltip.pivot();
                        tooltip.transition(easing).draw();
                    });
                    chart.options.tooltips.enabled = false;
                }
            }
        });

        var myChart = new Chart(ctx, {
    //            type: 'bar',
            type: 'horizontalBar',
            data: {
                labels: month,
                datasets: [{
                        label: 'Total registered teachers',
                        data: count,
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
                        borderWidth: 3
                    }]
            },
            options: {
                showAllTooltips: true, // call plugin we created
                responsive: true,
                title: {
                    display: true,
                    text: '<?php echo $label ?>',
                    fontSize: 18
                },
                animation: {
                    duration: 1500,
                    onProgress: function (animation) {
                        progress.value = animation.currentStep / animation.numSteps;
                    }
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>    

<?php if ($title == MOST_CONTENT_UPLOADED_EMPLOYEE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var employee_name = [];
        var overall_rating = [];

        $(most_upload).each(function (key, data) {
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == MOST_CONTENT_RATED_EMPLOYEE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var employee_name = [];
        var overall_rating = [];

        $(most_rated).each(function (key, data) {
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == MOST_CONTENT_VIEW_EMPLOYEE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var employee_name = [];
        var uploaded_file_viewcount = [];

        $(most_content_view_employee).each(function (key, data) {
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == MOST_RATED_CONTENT_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var uploaded_file_title = [];
        var overall_rating = [];

        $(most_rated_content).each(function (key, data) {
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == MOST_VIEWED_CONTENT_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var uploaded_file_title = [];
        var uploaded_file_viewcount = [];

        $(most_viewed_content).each(function (key, data) {
            uploaded_file_title.push(data.uploaded_file_title);
            uploaded_file_viewcount.push(data.uploaded_file_viewcount);
        });


        var ctx = document.getElementById('most_viewed_content');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: uploaded_file_title,
                datasets: [{
                        label: 'Most Viewed Content',
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == MOST_ACTIVE_STUDENT_BY_CONTENT_READ) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var student_name = [];
        var most_active = [];

        $(most_active_student).each(function (key, data) {
            student_name.push(data.student_name);
            most_active.push(data.most_active);
        });


        var ctx = document.getElementById('most_active_student');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: student_name,
                datasets: [{
                        label: 'Most Active Student By Content Read',
                        data: most_active,
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == MOST_ACTIVE_STUDENT_ON_SCHOOL_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var school_name = [];
        var most_active = [];

        $(school_most_active_students).each(function (key, data) {
            school_name.push(data.rmsa_school_title);
            most_active.push(data.school_has_most_active);
        });


        var ctx = document.getElementById('school_most_active_students');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: school_name,
                datasets: [{
                        label: 'Top School Most Active Students',
                        data: most_active,
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == TOP_DISTRICT_WITH_MOST_CONTENT) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        var district_name = [];
        var total_upload = [];

        $(top_district_upload_content).each(function (key, data) {
            district_name.push(data.rmsa_district_name);
            total_upload.push(data.uploaded_content);
        });
        var ctx = document.getElementById('top_district_upload_content');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: district_name,
                datasets: [{
                        label: 'Top District With Most Content',
                        data: total_upload,
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
                            },
                            stacked: true
                        }],
                    xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            stacked: true
                        }]
                }
            }
        });
    </script>
<?php } ?>

<?php if ($title == RMSA_FILE_LIST_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1(uploaded_file_tag = '', uploaded_file_subject = '', uploaded_file_class = '')
            {
                $('#example').DataTable({

                    responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_resource.php' ?>",
                        'data': {                            
                            uploaded_file_tag: uploaded_file_tag,
                            uploaded_file_subject: uploaded_file_subject,
                            uploaded_file_class: uploaded_file_class
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
//                table.columns().eq(0).each(function (colIdx) {
//                    $('input', table.column(colIdx).footer()).on('keyup change', function () {
//                        table.column(colIdx).search(this.value).draw();
//                    });
//                });
            }
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var uploaded_file_status = 'ACTIVE';

                if (status == 1) {
                    uploaded_file_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + uploaded_file_status.toLocaleLowerCase() + ' file?'))
                    return;

                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_uploaded_file_id': self.data('id'),
                    'uploaded_file_status': uploaded_file_status
                };

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

                            if (status == 1) {
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);

                        }
                    }
                });
            });
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                var subject_val = $('#subject').val();
                var class_val = $('#class').val(); 
                if (uploaded_file_tag != '' ||  subject_val!='' || class_val!='')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag,subject_val,class_val);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $('#searchTagClear').click(function () {
                $('#uploaded_file_tag').val('');
                $('#subject').val('');
                $('#class').val(''); 
                $('#example').DataTable().destroy();
                fill_datatable1();
            });
            $(document).on('click', '.viewFile', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>
<?php if ($title == TEACHER_FILE_LIST_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1(uploaded_file_tag = '', uploaded_file_subject = '', uploaded_file_class = '')
            {
                $('#example').DataTable({
                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/teacher_resource.php' ?>",
                        'data': {
                            uploaded_file_tag: uploaded_file_tag,
                            uploaded_file_subject: uploaded_file_subject,
                            uploaded_file_class: uploaded_file_class
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
            }
             $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                var subject_val = $('#subject').val();
                var class_val = $('#class').val(); 
                if (uploaded_file_tag != '' ||  subject_val!='' || class_val!='')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag,subject_val,class_val);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $('#searchTagClear').click(function () {
                $('#uploaded_file_tag').val('');
                $('#subject').val('');
                $('#class').val(''); 
                $('#example').DataTable().destroy();
                fill_datatable1();
            });
            $(document).on('click', '.viewFile', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
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
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
             function fill_datatable1(uploaded_file_tag = '', uploaded_file_subject = '', uploaded_file_class = '')
            {
                $('#example').DataTable({
                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/file_list.php' ?>",
                        'data': {
                            emp_rmsa_user_id: <?php
    if (isset($_SESSION['emp_rmsa_user_id'])) {
        echo $_SESSION['emp_rmsa_user_id'];
    }
    ?>,
                            uploaded_file_tag: uploaded_file_tag,
                            uploaded_file_subject: uploaded_file_subject,
                            uploaded_file_class: uploaded_file_class
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
            }
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var uploaded_file_status = 'ACTIVE';

                if (status == 1) {
                    uploaded_file_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + uploaded_file_status.toLocaleLowerCase() + ' file?'))
                    return;

                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_uploaded_file_id': self.data('id'),
                    'uploaded_file_status': uploaded_file_status
                };

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

                            if (status == 1) {
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);

                        }
                    }
                });
            });


              $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                var subject_val = $('#subject').val();
                var class_val = $('#class').val(); 
                if (uploaded_file_tag != '' ||  subject_val!='' || class_val!='')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag,subject_val,class_val);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $('#searchTagClear').click(function () {
                $('#uploaded_file_tag').val('');
                $('#subject').val('');
                $('#class').val(''); 
                $('#example').DataTable().destroy();
                fill_datatable1();
            });
            $(document).on('click', '.viewFile', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>

<?php if ($title == TEACHER_STUDENT_ATTEMPTED_EXAM_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1(uploaded_file_tag = '')
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "bInfo" : false,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/tec_student_attempted_quiz_list.php' ?>",
                        'data': {
                            st_rmsa_user_id: <?php echo $student_id; ?>,
                            uploaded_file_tag: uploaded_file_tag
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "uploaded_file_title"},
                        {"data": "ext"},
                        {"data": "uploaded_file_type"},
                        {"data": "uploaded_file_group"},
                        {"data": "uploaded_file_category"},
                        {"data": "ratting"},
                        {"data": "action"},
                        {"data": "uploaded_file_desc"}
                    ]
                });            
            }            
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.view_count', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>        
    
    
 <?php if ($title == EMPLOYEE_STUDENT_ATTEMPTED_EXAM_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1(uploaded_file_tag = '')
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "bInfo" : false,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/emp_student_attempted_quiz_list.php' ?>",
                        'data': {
                            st_rmsa_user_id: <?php echo $student_id; ?>,
                            uploaded_file_tag: uploaded_file_tag
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "uploaded_file_title"},
                        {"data": "ext"},
                        {"data": "uploaded_file_type"},
                        {"data": "uploaded_file_group"},
                        {"data": "uploaded_file_category"},
                        {"data": "ratting"},
                        {"data": "action"},
                        {"data": "uploaded_file_desc"}
                    ]
                });            
            }            
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.view_count', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>        
    <?php if ($title == STUDENT_ATTEMPTED_EXAM_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1(uploaded_file_tag = '')
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "bInfo" : false,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/student_attempted_quiz_list.php' ?>",
                        'data': {
                            st_rmsa_user_id: <?php
    if (isset($_SESSION['st_rmsa_user_id'])) {
        echo $_SESSION['st_rmsa_user_id'];
    }
    ?>,
                            uploaded_file_tag: uploaded_file_tag
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "uploaded_file_title"},
                        {"data": "ext"},
                        {"data": "uploaded_file_type"},
                        {"data": "uploaded_file_group"},
                        {"data": "uploaded_file_category"},
                        {"data": "ratting"},
                        {"data": "action"},
                        {"data": "uploaded_file_desc"}
                    ]
                });            
            }            
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.view_count', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
            
            
            
            
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>       
<?php if ($title == STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1()
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "bInfo" : false,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/my_quiz_result.php' ?>",
                        'data': {
                            st_rmsa_user_id: <?php
    if (isset($_SESSION['st_rmsa_user_id'])) {
        echo $_SESSION['st_rmsa_user_id'];
    }
    ?>,
                            quiz_id: <?php echo $quiz_id; ?>,
                            quiz_pass_score:<?php echo $result['quiz_pass_score']; ?>
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "quiz_student_score"},
                        {"data": "attempt_date"},
                        {"data": "pass_fail"}
                        
                    ]
                });            
            }            
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.view_count', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>
    <?php if ($title == TEACHER_STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1()
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "bInfo" : false,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/tec_my_quiz_result.php' ?>",
                        'data': {
                            st_rmsa_user_id: <?php echo $student_id; ?>,
                            quiz_id: <?php echo $quiz_id; ?>,
                            quiz_pass_score:<?php echo $result['quiz_pass_score']; ?>
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "quiz_student_score"},
                        {"data": "attempt_date"},
                        {"data": "pass_fail"}
                        
                    ]
                });            
            }            
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.view_count', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>
       <?php if ($title == EMPLOYEE_STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1()
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "bInfo" : false,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/emp_my_quiz_result.php' ?>",
                        'data': {
                            st_rmsa_user_id: <?php echo $student_id; ?>,
                            quiz_id: <?php echo $quiz_id; ?>,
                            quiz_pass_score:<?php echo $result['quiz_pass_score']; ?>
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "quiz_student_score"},
                        {"data": "attempt_date"},
                        {"data": "pass_fail"}
                        
                    ]
                });            
            }            
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.view_count', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>
<?php if ($title == EMPLOYEE_FILE_LIST_QUIZ_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1(uploaded_file_tag = '')
            {                
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/file_list_quiz.php' ?>",
                        'data': {
                            emp_rmsa_user_id: <?php
    if (isset($_SESSION['emp_rmsa_user_id'])) {
        echo $_SESSION['emp_rmsa_user_id'];
    }
    ?>,
                            uploaded_file_tag: uploaded_file_tag
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "uploaded_file_title"},
                        {"data": "ext"},
                        {"data": "uploaded_file_type"},
                        {"data": "uploaded_file_group"},
                        {"data": "uploaded_file_category"},
                        {"data": "ratting"},
                        {"data": "action"},
                        {"data": "uploaded_file_desc"}
                    ]
                });            
            }

            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var uploaded_file_status = 'ACTIVE';

                if (status == 1) {
                    uploaded_file_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + uploaded_file_status.toLocaleLowerCase() + ' file?'))
                    return;

                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_uploaded_file_id': self.data('id'),
                    'uploaded_file_status': uploaded_file_status
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

                            if (status == 1) {
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);

                        }
                    }
                });
            });


            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                if (uploaded_file_tag != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $(document).on('click', '.viewFile', function (e) {
                e.preventDefault();
                var self = this;
                window.open(self.href, 'documents', 'width=600,height=400');
            });
        });
        function show_review_comments(file_id, e) {
            e.preventDefault();
            $('.show_comments').empty();
            $.ajax({
                type: "POST",
                url: "<?php echo DISPLAY_REVIEW ?>",
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
            $("#view-reviews").modal();
        }
    </script>
<?php } ?>
<?php if ($title == EMPLOYEE_QUIZ_LIST_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1()
            {
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/quiz_list.php' ?>",
                        'data': {
                            emp_rmsa_user_id: <?php
    if (isset($_SESSION['emp_rmsa_user_id'])) {
        echo $_SESSION['emp_rmsa_user_id'];
    }
    ?>, rmsa_uploaded_file_id:<?php echo $rmsa_uploaded_file_id; ?>
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "quiz_title"},
                        {"data": "quiz_min_questions"},
                        {"data": "quiz_pass_score"},
                        {"data": "quiz_status"},
                        {"data": "action"}
                    ]
                });              
            }
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var quiz_status = 'ACTIVE';

                if (status == 1) {
                    quiz_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + quiz_status.toLocaleLowerCase() + ' quiz?'))
                    return;

                self.attr('disabled', 'disabled');

                var data = {
                    'quiz_id': self.data('id'),
                    'quiz_status': quiz_status
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_QUIZ_ACTIVE ?>",
                    data: data,
                    success: function (res) {

                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate file';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
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
<?php if ($title == EMPLOYEE_QUESTIONS_LIST_TITLE) {
    ?> 
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            fill_datatable1();
            function fill_datatable1()
            {
                $('#example').DataTable({

                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 10,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/questions_list.php' ?>",
                        'data': {
                            emp_rmsa_user_id: <?php
    if (isset($_SESSION['emp_rmsa_user_id'])) {
        echo $_SESSION['emp_rmsa_user_id'];
    }
    ?>, quiz_id:<?php echo $quiz_id; ?>
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "question"},
                        {"data": "question_status"},
                        {"data": "action"}
                    ]
                });               
            }
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');

                var question_status = 'ACTIVE';

                if (status == 1) {
                    question_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + question_status.toLocaleLowerCase() + ' question?'))
                    return;

                self.attr('disabled', 'disabled');

                var data = {
                    'question_id': self.data('id'),
                    'question_status': question_status
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_QUESTION_ACTIVE ?>",
                    data: data,
                    success: function (res) {

                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate file';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active file';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
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

<?php if ($title == STUDENT_RESOURCES_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
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
                data: {'file_id': file_id, 'limit': 10},
                success: function (res) {
                    $('.show_comments').append(res);
                }
            });
        }
        function resetRating() {
            if ($('#review_rating').val() != 0) {
                $('.review i').each(function (index) {
                    $(this).attr('class', 'fa fa-star');
                    if (index + 1 == $('#review_rating').val()) {
                        return false;
                    }
                });
            }
        }
        function highlightStar(obj) {
            removeHighlight();
            $('.review i').each(function (index) {
                $(this).attr('class', 'fa fa-star');
                if (index == $('.review i').index(obj)) {
                    return false;
                }
            });
        }

        function removeHighlight() {
            $('.review i').attr('class', 'fa fa-star-o');
        }

        function addRating(obj) {
            $('.review i').each(function (index) {
                $(this).attr('class', 'fa fa-star');
                $('#review_rating').val(index + 1)
                if (index == $('.review i').index(obj)) {
                    return false;
                }
            });
        }

        function display_comments(fileId, e) {
            e.preventDefault();
            view_reviews_modal.modal();
            show_comments(fileId);

        }

        $(document).on('click', '.btn_post_review', function (e) {
            var review_rating = $("#review_rating");
            var comment = $(".review-comment");
            if (review_rating.val() == '') {
                return alert('Please enter at least one rating.');
            }

            var data = {
                'file_id': uploaded_file_id,
                'rating': review_rating.val(),
                'comment': comment.val()
            };

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
        });

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
                        window.open(self.href, 'documents', 'width=600,height=400');
                    }
                }
            });
        });
        $(document).ready(function () {
            fill_datatable1('','','<?php if(isset($_SESSION['st_rmsa_user_class'])){echo $_SESSION['st_rmsa_user_class'];}else{echo '';} ?>');
            function fill_datatable1(uploaded_file_tag = '', uploaded_file_subject = '', uploaded_file_class = '')
            {
                $('#example').DataTable({
                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/student_resources.php'; ?>",
                        'data': {
                            uploaded_file_category: "<?php echo $uploaded_file_category; ?>",
                            uploaded_file_tag: uploaded_file_tag,
                            uploaded_file_subject: uploaded_file_subject,
                            uploaded_file_class: uploaded_file_class,
                            rmsa_user_id: "<?php echo $_SESSION['user_id']; ?>"
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
            }
            $('#searchTag').click(function () {
                var uploaded_file_tag = $('#uploaded_file_tag').val();
                var subject_val = $('#subject').val();
                var class_val = $('#class').val(); 
                if (uploaded_file_tag != '' ||  subject_val!='' || class_val!='')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable1(uploaded_file_tag,subject_val,class_val);
                } else
                {
                    alert('Enter tag in textbox');
                    $('#example').DataTable().destroy();
                    fill_datatable1();
                }
            });
            $('#searchTagClear').click(function () {
                $('#uploaded_file_tag').val('');
                $('#subject').val('');
                $('#class').val(''); 
                $('#example').DataTable().destroy();
                fill_datatable1('','','<?php if(isset($_SESSION['st_rmsa_user_class'])){echo $_SESSION['st_rmsa_user_class'];}else{echo '';} ?>');
            });
        });
    </script>
<?php } ?>

<?php if ($title == EMPLOYEE_STUDENT_LIST_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({

                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/employee_students.php' ?>",
                    'data': {
                        rmsa_school_id: <?php
    if (isset($_SESSION['emp_rmsa_school_id'])) {
        echo $_SESSION['emp_rmsa_school_id'];
    }
    ?>
                        // etc..
                    }
                },
                "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_school_title"},
                    {"data": "rmsa_district_name"},
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
                if (status == 1)
                    user_status = 'REMOVED';

                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' student?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'user_status': user_status
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

                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }

                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
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

    
<?php if ($title == EMPLOYEE_VIDEO_LIST_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/employee_videos.php' ?>",
                    'data': {
                        rmsa_user_id: "<?php echo $_SESSION['user_id']; ?>"
                    }
                },
                "columns": [
                    {"data": "index"},
                    {"data": "youtube_video_title"},
                    {"data": "youtube_video_description"},                    
                    {"data": "youtube_video_recomendation"},
                    {"data": "youtube_video_class"},
                    {"data": "youtube_video_subject"},
                    {"data": "youtube_video_topic"},
                    {"data": "youtube_video_subtopic"},
                    {"data": "youtube_video_language"},
                    {"data": "youtube_video_instructor"},
                    {"data": "youtube_video_url"},
                    {"data": "youtube_video_status"},
                    {"data": "rmsa_video_edit"}
                ]
            });
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);

                var status = self.attr('data-status');                
                var youtube_video_status = 'ACTIVE';
                if (status == 1)
                    youtube_video_status = 'REMOVED';

                if (!confirm('Are you sure want to ' + youtube_video_status.toLocaleLowerCase() + ' video?'))
                    return;
                self.attr('disabled', 'disabled');
                var data = {
                    'rmsa_youtube_video_id': self.data('id'),
                    'youtube_video_status': youtube_video_status
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_ACTIVE_VIDEO ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {

                            var title = 'Click to deactivate student';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;

                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }

                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
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
    
<?php if ($title == TEACHER_STUDENT_LIST_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/teacher_students.php' ?>",
                    'data': {
                        rmsa_school_id: <?php
    if (isset($_SESSION['tech_rmsa_school_id'])) {
        echo $_SESSION['tech_rmsa_school_id'];
    }
    ?>
                        // etc..
                    }
                },
                "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_id"},
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_school_title"},
                    {"data": "rmsa_district_name"},
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
                if (status == 1)
                    user_status = 'REMOVED';
                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' student?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'user_status': user_status
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

                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }

                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
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
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({

                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_students.php' ?>"
                },
                "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_roll_number"},                    
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_school_title"},
                    {"data": "rmsa_district_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {"data": "rmsa_user_email_verified_status"},
                    {"data": "rmsa_user_status"},
                    {"data": "rmsa_user_block"},
                    {"data": "rmsa_user_edit"}
                ]
            });
            
             $(document).on('click', '.btn_approve_email', function () {
                var self = $(this);
                if (!confirm('Are you sure want to verified Email?'))
                    return;
                
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'rmsa_user_email_verified_status': 1,
                    'table':self.data('value')
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_VERIFY_EMAIL ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            self.after( "Email verified" );
                            self.remove();                            
                        }
                    }
                });
            });
            
            
            
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);

                var status = self.attr('data-status');

                var user_status = 'ACTIVE';

                if (status == 1) {
                    user_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' student?'))
                    return;

                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'user_status': user_status
                };

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

                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }

                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);

                        }
                    }
                });
            });
            $(document).on('click', '.btn_unblock', function () {
                var self = $(this);
                var table = self.attr('data-status');

                if (!confirm('Are you sure want to unblock user?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'table': table
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_UNBLOCK_USER ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            self.remove();

                            var d = new PNotify({
                                title: 'Unblock succeessfully',
                                type: 'success',
                                styling: 'bootstrap3'
                            });

                        }
                    }
                });
            });
        });
    </script>
<?php } ?>
<?php if ($title == RMSAE_EMPLOYEE_LIST_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({

                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_employee.php' ?>"
                },
                "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_employee_code"},                    
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_school_title"},
                    {"data": "rmsa_district_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {"data": "rmsa_user_email_verified_status"},
                    {"data": "rmsa_user_status"},
                    {"data": "rmsa_user_block"},
                    {"data": "rmsa_user_edit"}
                ]
            });
            
            
              $(document).on('click', '.btn_approve_email', function () {
                var self = $(this);
                if (!confirm('Are you sure want to verified Email?'))
                    return;
                
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'rmsa_user_email_verified_status': 1,
                    'table':self.data('value')
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_VERIFY_EMAIL ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            self.after( "Email verified" );
                            self.remove();                            
                        }
                    }
                });
            });
            
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');


                var user_status = 'ACTIVE';

                if (status == 1) {
                    user_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' employee?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'user_status': user_status
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
                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);

                        }
                    }
                });
            });
            $(document).on('click', '.btn_unblock', function () {
                var self = $(this);
                var table = self.attr('data-status');

                if (!confirm('Are you sure want to unblock user?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'table': table
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_UNBLOCK_USER ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            self.remove();

                            var d = new PNotify({
                                title: 'Unblock succeessfully',
                                type: 'success',
                                styling: 'bootstrap3'
                            });

                        }
                    }
                });
            });
        });
    </script>
<?php } ?>
<?php if ($title == RMSAE_TEACHERS_LIST_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({

                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [{
                        className: 'control',
                        orderable: false,
                        targets: 0
                    }],
                "processing": true,
                "serverSide": true,
                "paginationType": "full_numbers",
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "ajax": {
                    'type': 'POST',
                    'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/rmsa_teachers.php' ?>"
                },
                "columns": [
                    {"data": "index"},
                    {"data": "rmsa_user_teacher_code"},                                       
                    {"data": "rmsa_user_first_name"},
                    {"data": "rmsa_school_title"},
                    {"data": "rmsa_district_name"},
                    {"data": "rmsa_user_gender"},
                    {"data": "rmsa_user_DOB"},
                    {"data": "rmsa_user_email_id"},
                    {"data": "rmsa_user_email_verified_status"},
                    {"data": "rmsa_user_status"},
                    {"data": "rmsa_user_block"},
                    {"data": "rmsa_user_edit"}
                ]
            });
            
            
                $(document).on('click', '.btn_approve_email', function () {
                var self = $(this);
                if (!confirm('Are you sure want to verified Email?'))
                    return;
                
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'rmsa_user_email_verified_status': 1,
                    'table':self.data('value')
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_VERIFY_EMAIL ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            self.after( "Email verified" );
                            self.remove();                            
                        }
                    }
                });
            });
            
            $(document).on('click', '.btn_approve_reject', function () {
                var self = $(this);
                var status = self.attr('data-status');


                var user_status = 'ACTIVE';

                if (status == 1) {
                    user_status = 'REMOVED';
                }

                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' employee?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'user_status': user_status
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_TEACHER_ACTIVE ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            var title = 'Click to deactivate student';
                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
                            var text = 'Active';
                            var isactive = 1;
                            if (status == 1) {
                                title = 'Click to active student';
                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
                                text = 'Inactive';
                                isactive = 0;
                            }
                            self.removeClass().addClass(class_);
                            self.attr({
                                'data-status': isactive,
                                'title': title
                            });
                            self.removeAttr('disabled');
                            self.html(text);

                        }
                    }
                });
            });
            $(document).on('click', '.btn_unblock', function () {
                var self = $(this);
                var table = self.attr('data-status');

                if (!confirm('Are you sure want to unblock user?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'rmsa_user_id': self.data('id'),
                    'table': table
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo RMSA_UNBLOCK_USER ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            self.remove();

                            var d = new PNotify({
                                title: 'Unblock succeessfully',
                                type: 'success',
                                styling: 'bootstrap3'
                            });

                        }
                    }
                });
            });
        });
    </script>
<?php } ?>

<?php if ($title == STUDENT_PROFILE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
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
                    if (result['success'] == "success") {
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] == "success") {
                        location.href = "<?php echo STUDENT_UPDATE_PROFILE_LINK; ?>";
                    }
                    if (result['success'] == "fail") {
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
    
    
    <?php if ($title == TEACHER_PROFILE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {           
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] == "success") {
                        location.href = "<?php echo TEACHER_UPDATE_PROFILE_LINK; ?>";
                    }
                    if (result['success'] == "fail") {
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
    <?php if ($title == RMSA_PROFILE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {           
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] == "success") {
                        location.href = "<?php echo RMSA_UPDATE_PROFILE_LINK; ?>";
                    }
                    if (result['success'] == "fail") {
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
    <?php if ($title == EMPLOYEE_PROFILE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
        $(document).ready(function () {           
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] == "success") {
                        location.href = "<?php echo EMPLOYEE_UPDATE_PROFILE_LINK; ?>";
                    }
                    if (result['success'] == "fail") {
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

<?php if ($title == EMPLOYEE_STUDENT_PROFILE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
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
                    if (result['success'] === "success") {
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] === "success") {
                        location.reload();
                    }
                    if (result['success'] === "fail") {
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
    <script nonce='S51U26wMQz' type="text/javascript">
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
                    if (result['success'] === "success") {
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] === "success") {
                        location.reload();
                    }
                    if (result['success'] === "fail") {
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
    <script nonce='S51U26wMQz' type="text/javascript">
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
                    if (result['success'] === "success") {
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] === "success") {
                        location.reload();
                    }
                    if (result['success'] === "fail") {
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
<?php if ($title == RMSA_TEACHER_PROFILE_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
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
                    rmsa_user_teacher_code: {
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
                    if (result['success'] === "success") {
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
                                min: 8
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
                                min: 8
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
                    if (result['success'] === "success") {
                        location.reload();
                    }
                    if (result['success'] === "fail") {
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
    <script nonce='S51U26wMQz' type="text/javascript">
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
                'reply': reply.val()
            };

            $.ajax({
                type: "POST",
                url: "<?php echo COMMENT_REPLY ?>",
                data: data,
                success: function (res) {
                    var res = $.parseJSON(res);
                    if (res.success) {
                        alert('Thank you, your reply has been submitted for review.');
                        reply_modal.modal('toggle');
                    }
                }
            });
        });

    </script>

<?php }
?>
<?php if ($title == RMSA_EMPLOYEE_REGISTRATION_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
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
                                min: 8
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
                                min: 8
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
                    }
//                    rmsa_user_father_name: {
//                        validators: {
//                            stringLength: {
//                                min: 2,
//                            },
//                            notEmpty: {
//                                message: 'Please supply your father name'
//                            }
//                        }
//                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#employee_register').data('bootstrapValidator').resetForm();
                // Prevent form submission
                e.preventDefault();
                // Get the form instance
                var $form = $(e.target);
                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');
                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    if (result['success'] == "success") {
                        if ('<?php
    if (isset($_SESSION['rm_rmsa_user_id'])) {
        echo '1';
    } else {
        echo '0';
    }
    ?>' === '1') {
                            location.href = "<?php echo RMSA_EMPLOYEE_LIST_LINK ?>";
                        }
                    }
                    if (result['success'] == "fail") {
                        var d = new PNotify({
                            title: 'Email allready exist',
                            type: 'error',
                            styling: 'bootstrap3'
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

<?php if ($title == RMSA_TEACHER_REGISTRATION_TITLE) {
    ?>
    <script nonce='S51U26wMQz' type="text/javascript">
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
                    rmsa_user_teacher_code: {
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
                    rmsa_user_email_password: {
                        validators: {
                            stringLength: {
                                min: 8
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
                                min: 8
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
                    }
//                    rmsa_user_father_name: {
//                        validators: {
//                            stringLength: {
//                                min: 2
//                            },
//                            notEmpty: {
//                                message: 'Please supply your father name'
//                            }
//                        }
//                    }
                }
            }).on('success.form.bv', function (e) {
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#employee_register').data('bootstrapValidator').resetForm();
                // Prevent form submission
                e.preventDefault();
                // Get the form instance
                var $form = $(e.target);
                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');
                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    if (result['success'] == "success") {
                        if ('<?php
    if (isset($_SESSION['rm_rmsa_user_id'])) {
        echo '1';
    } else {
        echo '0';
    }
    ?>' === '1') {
                            location.href = "<?php echo RMSA_TEACHERS_LIST_LINK ?>";
                        }
                    }
                    if (result['success'] == "fail") {
                        var d = new PNotify({
                            title: 'Email allready exist',
                            type: 'error',
                            styling: 'bootstrap3'
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
    <script nonce='S51U26wMQz' type="text/javascript">

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
                    rmsa_user_email_password: {
                        validators: {
                            stringLength: {
                                min: 8
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
                                min: 8
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
                    }
//                    rmsa_user_father_name: {
//                        validators: {
//                            stringLength: {
//                                min: 2,
//                            },
//                            notEmpty: {
//                                message: 'Please supply your father name'
//                            }
//                        }
//                    }
                }
            }).on('success.form.bv', function (e) {                
                $('#success_message').slideDown({opacity: "show"}, "slow"); // Do something ...
                $('#student_register').data('bootstrapValidator').resetForm();
                // Prevent form submission
                e.preventDefault();
                // Get the form instance
                var $form = $(e.target);
                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');
                 
//              $("#btnRegister").removeAttr('disabled',false); 
                 
//                $("#btnRegister").attr('disabled',true);
                
                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function (result) {
                    
                    if (result['success'] == "success") {
//                        $("#btnRegister").removeAttr('disabled');
                        if ('<?php if (isset($_SESSION['rm_rmsa_user_id'])) {echo '1';} else {echo '0';}?>' === '1') {
                            location.href = "<?php echo RMSA_STUDENT_LIST_LINK; ?>";
                        }
                        if ('<?php if (isset($_SESSION['emp_rmsa_user_id'])) {echo '1';} else {echo '0';}?>' === '1') {
                            location.href = "<?php echo EMPLOYEE_STUDENT_LIST_LINK ?>";
                        }
                        if ('<?php if (isset($_SESSION['tech_rmsa_user_id'])) {echo '1';} else {echo '0';}?>' === '1') {
                            location.href = "<?php echo TEACHER_STUDENT_LIST_LINK ?>";
                        }
                        location.href = "<?php echo HOME_LINK ?>";
                    }
                    if (result['success'] == "fail") {
                       
//                  $("#btnRegister").removeAttr('disabled',false);
                        if(result['exist_email'] == 1){
                            var d = new PNotify({
                                title: 'Email allready exist',
                                type: 'error',
                                styling: 'bootstrap3'
                            });
                        }
                        if(result['rollnumber_exist'] == 1){
                            var d = new PNotify({
                                title: 'Roll number allready exist',
                                type: 'error',
                                styling: 'bootstrap3'
                            });
                        }
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
                        $("#rmsa_blocks").empty();
                        
                        $("#sub_district").append(new Option('---Select---', 0));
                        $("#rmsa_blocks").append(new Option('---Select---', 0));
                        $("#rmsa_school").append(new Option('---Select---', 0));
                        $.each(data.tehsil, function (index, value) {                            
                            $("#sub_district").append(new Option(value.rmsa_sub_district_name, value.rmsa_sub_district_id));
                        });
                        $.each(data.blocks, function (index, value) {
                            $("#rmsa_blocks").append(new Option(value.rmsa_block_name, value.rmsa_block_id));
                        });
                    }
                });
            });

            $('#rmsa_blocks').on('change', function () {
                var rmsaBlockId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo LOAD_SCHOOL_BY_BLOCK ?>",
                    data: {'rmsaBlockId': rmsaBlockId},
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
            
            $('#rmsa_school').on('change', function () {
                var schoolId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo LOAD_SCHOOL_CODE_BY_SCHOOL ?>",
                    data: {'schoolId': schoolId},
                    success: function (res) {
                        var school = $.parseJSON(res);
                        alert(school);
                        $("#rmsa_school_udise_code").val(school);                                                
                    }
                });
            });
            
        });
    </script>
<?php }
?>
    <?php 
    if($title!=STUDENT_VIDEOS_TITLE){
        if(isset($_SESSION['video_search'])){
            unset($_SESSION['video_search']);
        }
    }
    ?>
<?php if($title==STUDENT_VIDEOS_TITLE){ ?>
<script nonce='S51U26wMQz' type="text/javascript">
$('#search_clear').on('click', function () {        
    $.ajax({
            type: "POST",
            url: "<?php echo STUDENT_VIDEO_SEARCH_LINK; ?>",
            data: {clear_search:1},
            success: function (res) {
                var result = $.parseJSON(res);
                if(result['success'] === "success"){                   
                   window.location.href = "<?php echo STUDENT_VIDEO_LINK."1"; ?>";
                }
            }
        });            
});
    $('#search_all').on('click', function () {
        var title = $('#title').val();
        var topic = $('#topic').val();
        var sub_topic = $('#sub_topic').val();
        var recommendation = $('#recommendation').val();
        var subject = $('#subject').val();
        var instructor = $('#instructor').val();        
        var class_value = $('#class_value').children("option:selected").val();
        var vide_language = $('#vide_language').children("option:selected").val();        
        $.ajax({
            type: "POST",
            url: "<?php echo STUDENT_VIDEO_SEARCH_LINK; ?>",
            data: {title: title,topic:topic,sub_topic:sub_topic,recommendation:recommendation,subject:subject,instructor:instructor,class_value:class_value,vide_language:vide_language},
            success: function (res) {
                var result = $.parseJSON(res);
                if(result['success'] === "success"){                   
                   window.location.href = "<?php echo STUDENT_VIDEO_LINK."1"; ?>";
                }
            }
        });
    });
</script>  
<?php } ?>  
<?php
if (isset($_SESSION['st_rmsa_student_login_active'])) {
    if ($_SESSION['st_rmsa_student_login_active'] == 1) {
        //student will be logout if admin logout them from to backend
//    TODO
//    please run this sql on backend
//    ALTER TABLE `rmsa_student_users` ADD `rmsa_student_login_active` INT(1) NOT NULL AFTER `modified_dt`;
        ?>
        <script nonce='S51U26wMQz' type="text/javascript">
            $(document).ready(function () {
                window.setInterval(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo IS_STUDENT_ACTIVE ?>",
                        success: function (res) {
                            var check = $.parseJSON(res);
                            if (!check.isactive) {
                                location.href = "<?php echo STUDENT_LOGOUT_LINK ?>";
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
        <script nonce='S51U26wMQz' type="text/javascript">
            $(document).ready(function () {
                window.setInterval(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo IS_EMPLOYEE_ACTIVE ?>",
                        success: function (res) {
                            var check = $.parseJSON(res);
                            if (!check.isactive) {
                                location.href = "<?php echo EMPLOYEE_LOGOUT_LINK ?>";
                            }
                        }
                    });
                }, 25000);
            });
        </script>
        <?php
    }
}
?>
<script nonce='S51U26wMQz' type="text/javascript">
    $(document).ready(function () {
//        $('.filereviewslink').on('click', function () {   
        $("table").delegate(".filereviewslink", "click", function (e) {
//                alert('hi');
            var fileId = $(this).attr('id');
<?php if ($title == STUDENT_RESOURCES_TITLE) {
    ?>
                display_comments(fileId, e);
<?php } else { ?>
                show_review_comments(fileId, e);
<?php } ?>
        });
//        $("table").delegate(".filereviewslink", "click", function(e){
////                alert('hi');
//                var fileId = $(this).attr('id');
//                display_comments(fileId,e);
//        });
    });
</script>
<!--        <script nonce='S51U26wMQz' type="text/javascript">
$(document).ready(function () {
$('a').each(function(){  
$(this).attr('onclick','window.location.href="'+$(this).attr('href')+'"');
$(this).attr('href','javascript:void(0)');
});
});
</script>-->
<!--//this script will be run for all pages-->
</body>
</html>