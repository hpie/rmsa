<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<!--<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>-->
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/tmpl.min.js" type="text/javascript"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<!--<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>-->
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/load-image.all.min.js" type="text/javascript"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<!--<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>-->
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/canvas-to-blob.min.js" type="text/javascript"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/bootstrap1.min.js" type="text/javascript"></script>
<!-- blueimp Gallery script -->
<!--<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>-->
<script nonce='S51U26wMQz' src="<?php echo BASE_URL ?>/assets/front/js/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload.js"></script>   
<!-- The File Upload processing plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script nonce='S51U26wMQz' type="text/javascript" src="<?php echo BASE_URL ?>/assets/front/fileupload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<?php
$this->load->view('_partials/front/demo');
?>
<!--<script src="<?php echo BASE_URL ?>/assets/front/fileupload/js/demo.js"></script>-->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
  <script src="js/cors/jquery.xdr-transport.js" nonce='S51U26wMQz' type="text/javascript"></script>
<![endif]-->