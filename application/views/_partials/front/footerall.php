 

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
            "ajax": "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/examples/server_side/scripts/server_processing.php' ?>"
        });
    });
</script>
<!--<script type="text/javascript">
    function ajaxFunction()
    {
        var xmlHttp;
        try
        {
            // Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        } catch (e)
        {
            // Internet Explorer
            try
            {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e)
            {
                try
                {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e)
                {
                    alert("Your browser does not support AJAX!");
                    return false;
                }
            }
        }
        xmlHttp.onreadystatechange = function ()
        {
            if (xmlHttp.readyState == 4)
            {
                document.myForm.time.value = xmlHttp.responseText;
            }
        }
        xmlHttp.open("GET", "http://localhost/rmsa/front/studentLogout", true);
        xmlHttp.send(null);
    }
</script>-->
<script>
    $('#fileupload').fileupload({
        url: '<?php echo BASE_URL; ?>/assets/front/fileupload/server/php/index.php'
    }).on('fileuploadsubmit', function (e, data) {
        data.formData = data.context.find(':input').serializeArray();
    });
</script>       

</body>

</html>