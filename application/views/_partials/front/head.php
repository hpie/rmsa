<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/front/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/front/css/main.css">    
    <script src="<?php echo BASE_URL; ?>/assets/front/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/front/js/bootstrap.min.js"></script>
    <link href="<?php echo BASE_URL; ?>/assets/pnotify/dist/pnotifiadmin.css" rel="stylesheet">    
    <link href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/front/css/dataTables.responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
    <!-- Generic page styles -->         
    <?php if($title == EMPLOYEE_FILE_UPLOAD_TITLE){ ?>    
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"/>
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload-ui.css" />
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload-noscript.css"/></noscript>
    <noscript><link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload-ui-noscript.css"/></noscript> 
    <?php } ?>
    <style>
        .form-control {
            height: 34px !important;
        }
    </style>
</head>
<!-- Head Section End -->