<script src="<?php echo BASE_URL; ?>/assets/front/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>/assets/pnotify/dist/pnotifyAdmin.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/front/js/main.js"></script>
<?php if($title==" - File Upload"){
     $this->load->view('_partials/front/fileuploadjs');
     ?>
<script>
      $('#fileupload').fileupload({
            url: 'server/php/'
        }).on('fileuploadsubmit', function (e, data) {
            data.formData = data.context.find(':input').serializeArray();
        });
    </script>
<?php
} ?> 
