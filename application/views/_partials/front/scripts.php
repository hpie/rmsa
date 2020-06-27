<script nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script nonce='S51U26wMQz' type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/pnotify/dist/pnotifyAdmin.js"></script>
<script nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/main.js"></script>
<?php if($title== EMPLOYEE_FILE_UPLOAD_TITLE){
     $this->load->view('_partials/front/fileuploadjs');
     ?>
<script nonce='S51U26wMQz'>
      $('#fileupload').fileupload({
            url: 'server/php/'
        }).on('fileuploadsubmit', function (e, data) {
            var title=0;
            var description=0;
            var tag=0;
            if($(".file_title").length){                
                if($(".file_title").val()==''){
                    title=0;
//                    alert('Title is required');                
//                    $( ".start" ).prop( "disabled", false );                   
                }else{
                    title=1;
                }
            }
            if($(".file_desc").length){                
                if($(".file_desc").val()==''){
                    description=0;
//                    alert('Title is required');                
//                    $( ".start" ).prop( "disabled", false );                   
                }else{
                    description=1;
                }
            }
            if($(".file_tag").length){                
                if($(".file_tag").val()==''){
                    tag=0;
//                    alert('Title is required');                
//                    $( ".start" ).prop( "disabled", false );                   
                }else{
                    tag=1;
                }
            }
            if(title==0 || description==0 || tag==0){
                var msg='';
                if(title==0){
                    msg="Title required"+"\n";
                }
                if(description==0){
                    msg=msg+"Description required"+"\n";
                }
                if(tag==0){
                    msg=msg+"Tag required";
                }
                alert(msg);
                $( ".start" ).prop( "disabled", false );
                return false;
            }            
            data.formData = data.context.find(':input').serializeArray();
        });
    </script>
<?php
} ?> 
