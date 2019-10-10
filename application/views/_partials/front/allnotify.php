<script>
$(document).ready(function () {      
if (<?php
if (isset($_SESSION['invalid_login']) && isset($_SESSION['invalid_login'])) {
    echo $_SESSION['invalid_login'];
}
?> == 1) {
                var d = new PNotify({
                    title: 'Invalid Username & Password',
                    type: 'error',
                    styling: 'bootstrap3',
                });
                <?php echo $_SESSION['invalid_login'] = 0; ?>;
            }
            
            
            if (<?php
if (isset($_SESSION['existParentFileHasvol']) && isset($_SESSION['existParentFileHasvol'])) {
    echo $_SESSION['existParentFileHasvol'];
}
?> == 1) {
                var d = new PNotify({
                    title: 'This file hasvol not true',
                    type: 'error',
                    styling: 'bootstrap3',
                });
                <?php echo $_SESSION['existParentFileHasvol'] = 0; ?>;
            }
            
                        if (<?php
if (isset($_SESSION['registration']) && isset($_SESSION['registration'])) {
    echo $_SESSION['registration'];
}
?> == 1) {
                var d = new PNotify({
                    title: 'Registration successfully chek your mail',
                    type: 'success',
                    styling: 'bootstrap3',
                });
                <?php echo $_SESSION['registration'] = 0; ?>;
            }  
});   
</script>