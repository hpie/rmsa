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
});   
</script>