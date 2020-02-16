
<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report_2.php');
        ?>
        <h1 class="heading">Uploaded content reports</h1>        
    </div>
    <canvas id="upload_content_reports2" width="400" height="400"></canvas>    
</div>
<script>
    window.most_upload = <?php echo json_encode($data)?>
</script>
