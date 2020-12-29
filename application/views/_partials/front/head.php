<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <!--<meta http-equiv="Content-Security-Policy" content="script-src 'strict-dynamic' 'nonce-S51U26wMQz' 'unsafe-inline' http: https: https://www.gstatic.com https://csp.withgoogle.com https://www.google.com; object-src 'none'; base-uri 'none'; require-trusted-types-for 'script'; ">-->
    <!--<meta http-equiv="Content-Security-Policy" content="script-src 'strict-dynamic' 'nonce-S51U26wMQz' 'unsafe-inline' http: https: https://www.gstatic.com https://csp.withgoogle.com https://www.google.com; object-src 'none'; base-uri 'none';">-->
    <title><?php echo $title; ?></title>

    <link href="<?php echo BASE_URL ?>/assets/front/css/bootstrap1.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL ?>/assets/front/css/font-awesome.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL ?>/assets/front/css/googlefont.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>/assets/front/css/font-awesome.css?v=1.0" rel="stylesheet" type='text/css'>
    <link href="<?php echo BASE_URL; ?>/assets/front/css/main.css?v=1.0" rel="stylesheet" type='text/css'>
    <script type="text/javascript" nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/jquery.min.js?v=1.0"></script>
    <script type="text/javascript" nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/bootstrap.min.js?v=1.0"></script>
    <link href="<?php echo BASE_URL; ?>/assets/pnotify/dist/pnotifiadmin.css?v=1.0" rel="stylesheet" type='text/css'>
    <link href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.min.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL; ?>/assets/front/css/dataTables.responsive.css?v=1.0" rel="stylesheet" type="text/css">
    <link href="<?php echo BASE_URL ?>/assets/front/css/bootstrap2.min.css?v=1.0" rel="stylesheet" type="text/css">
    <!-- Generic page styles -->         

    <?php if ($title == EMPLOYEE_FILE_UPLOAD_TITLE) { ?>    
        <!-- blueimp Gallery styles -->
        <link href="<?php echo BASE_URL ?>/assets/front/css/blueimp-gallery.min.css?v=1.0" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"/>-->
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload.css?v=1.0" rel="stylesheet" type='text/css'>
        <link href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload-ui.css?v=1.0" rel="stylesheet" type='text/css'>
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload-noscript.css?v=1.0" rel="stylesheet" type='text/css'></noscript>
        <noscript><link href="<?php echo BASE_URL ?>/assets/front/fileupload/css/jquery.fileupload-ui-noscript.css?v=1.0" rel="stylesheet" type='text/css'></noscript>
    <?php } ?>
    <style>
        .form-control {
            height: 34px !important;
        }
    </style>
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
        .pagination a {
            border: 1px solid #ddd; /* Gray */
          }
        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
</head>
<!-- Head Section End -->