<script nonce='S51U26wMQz' type="text/javascript">
$(document).ready(function () {
<?php
if(isset($_SESSION['invalidAttempt'])){
    if($_SESSION['invalidAttempt']==1){
        $_SESSION['invalid_login']=0;
    }
}
?>
               if (<?php
if (isset($_SESSION['captcha'])) {
    echo $_SESSION['captcha'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'invalid captcha',
                    type: 'error',
                    styling: 'bootstrap3'
                });
                <?php $_SESSION['captcha'] = 0; ?>
            }          
        if (<?php
if (isset($_SESSION['questionEdit'])) {
    echo $_SESSION['questionEdit'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Question Updated successfully',
                    type: 'success',
                    styling: 'bootstrap3'
                });
                <?php $_SESSION['questionEdit'] = 0; ?>
            }
        if (<?php
if (isset($_SESSION['quizEdit'])) {
    echo $_SESSION['quizEdit'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Quiz Updated successfully',
                    type: 'success',
                    styling: 'bootstrap3'
                });
                <?php $_SESSION['quizEdit'] = 0; ?>
            }
        
        if (<?php
if (isset($_SESSION['questionAdd'])) {
    echo $_SESSION['questionAdd'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Question added successfully',
                    type: 'success',
                    styling: 'bootstrap3'
                });
                <?php $_SESSION['questionAdd'] = 0; ?>
            }
if (<?php
if (isset($_SESSION['quizAdd'])) {
    echo $_SESSION['quizAdd'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Quiz added successfully',
                    type: 'success',
                    styling: 'bootstrap3'
                });
                <?php $_SESSION['quizAdd'] = 0; ?>
            }        
        
if (<?php
if (isset($_SESSION['invalidAttempt'])) {
    echo $_SESSION['invalidAttempt'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Your account is locked',
                    type: 'error',
                    styling: 'bootstrap3'
                });
                <?php $_SESSION['invalidAttempt'] = 0; ?>
            }        
        
if (<?php
if (isset($_SESSION['invalid_login'])) {
    echo $_SESSION['invalid_login'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Invalid Username & Password',
                    type: 'error',
                    styling: 'bootstrap3',
                });
                <?php $_SESSION['invalid_login'] = 0; ?>
            }
            
            
            if (<?php
if (isset($_SESSION['existParentFileHasvol'])) {
    echo $_SESSION['existParentFileHasvol'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'This file hasvol not true',
                    type: 'error',
                    styling: 'bootstrap3',
                });
                <?php $_SESSION['existParentFileHasvol'] = 0; ?>
            }
            
                        if (<?php
if (isset($_SESSION['registration'])) {
    echo $_SESSION['registration'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Registration successfully chek your mail',
                    type: 'success',
                    styling: 'bootstrap3',
                });
                <?php $_SESSION['registration'] = 0; ?>
            } 
            
             if (<?php
if (isset($_SESSION['updatedata'])) {
    echo $_SESSION['updatedata'];
}else{echo 0;}
?> == 1) {
                var d = new PNotify({
                    title: 'Data updated successfully',
                    type: 'success',
                    styling: 'bootstrap3',
                });
                <?php $_SESSION['updatedata'] = 0; ?>
            }
    if (<?php
        if (isset($_SESSION['update_file'])) {
            echo $_SESSION['update_file'];
        }else{echo 0;}
        ?> == 1) {
        var d = new PNotify({
            title: 'File updated successfully',
            type: 'success',
            styling: 'bootstrap3',
        });
        <?php $_SESSION['update_file'] = 0; ?>
    }
});   
</script>