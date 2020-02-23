<script>
$(document).ready(function () {
<?php
if(isset($_SESSION['invalidAttempt'])){
    if($_SESSION['invalidAttempt']==1){
        $_SESSION['invalid_login']=0;
    }
}
?>
if (<?php
if (isset($_SESSION['quizAdd']) && isset($_SESSION['invalidAttempt'])) {
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
if (isset($_SESSION['invalidAttempt']) && isset($_SESSION['invalidAttempt'])) {
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
if (isset($_SESSION['invalid_login']) && isset($_SESSION['invalid_login'])) {
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
if (isset($_SESSION['existParentFileHasvol']) && isset($_SESSION['existParentFileHasvol'])) {
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
if (isset($_SESSION['registration']) && isset($_SESSION['registration'])) {
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
if (isset($_SESSION['updatedata']) && isset($_SESSION['updatedata'])) {
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
        if (isset($_SESSION['update_file']) && isset($_SESSION['update_file'])) {
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