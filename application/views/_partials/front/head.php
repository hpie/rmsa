<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="object-src 'self'; script-src 'nonce-S51U26wMQz' 'unsafe-eval' ">
    <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self' 'nonce-<?php //echo $_SESSION['nonce'];  ?>' https://www.google.com https://www.gstatic.com https://fonts.gstatic.com;">-->

    <!--	<meta http-equiv="Content-Security-Policy" content="
                    default-src 
                    'self'
                    https://fonts.gstatic.com 
                    https://www.google.com 
                    https://www.gstatic.com 
                    'sha256-1VX18TtkQra0JXkm20ZxU8P9eN+gxFcekelgWqCgX5I=' 
                    'sha256-P6Iu36KC7tFxS/wj7dgkcfQAQoXoe+ApdFEUSM3T2EY=' 
                    'sha256-oC3DkadKVgPxYscP9I1BG4vBZPDAGT6Wg2pS2dGqdRc=' 
                    'sha256-BMdb04w9Rq4FNOX+3UzJFvr3MgTl1oBoK4UCtVEySOM=' 
                    'sha256-0fzRu1gjnArU0ytOoAh/8KkXYJrdLn34PlqewZN1MUQ=' 
                    'sha256-47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU=' 
                    'sha256-BQ5eA/mw6jES31KSfh/A55TC7nzftLBWpZBzzDfwUrA=' 
                    'sha256-SBaHvXSyXks3TIXVKn9Gqy4o2PN421QsgkmlzfWsnug=' 
                    'sha256-XR83ERgx2TOvCF9lulgoxtjL3OhmjYcaD7TN+JASsmQ=' 
                    'sha256-hyovrCo3ga4q6P5biJq9L0R89UkUXtwbcE+7hPfrUTs=' 
                    'sha256-f68AwUhmWitDwx040iUVSjhDB9Mfa8Ce1wct4isA9Jc=' 
                    'sha256-NDdKrvB0I5NbaNI1qN5DeU6DhLFo44/LgMGOOHF4T+s='
                    'sha256-YwuGBWTr5CDQCtLZbzMgZ6u8jxN8Si0DHAp1JZcBt3Y='
                    'nonce-S51U26wMQz;
                    ">-->
    <title><?php echo $title; ?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
    <link href="<?php echo BASE_URL ?>/assets/front/css/bootstrap1.min.css" rel="stylesheet" type="text/css"/>
    <!--<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
    <link href="<?php echo BASE_URL ?>/assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700" rel="stylesheet">-->
    <link href="<?php echo BASE_URL ?>/assets/front/css/googlefont.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/front/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/front/css/main.css">    
    <script nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/jquery.min.js"></script>
    <script nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/bootstrap.min.js"></script>
    <link href="<?php echo BASE_URL; ?>/assets/pnotify/dist/pnotifiadmin.css" rel="stylesheet">    
    <link href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/front/css/dataTables.responsive.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />-->
    <link href="<?php echo BASE_URL ?>/assets/front/css/bootstrap2.min.css" rel="stylesheet" type="text/css"/>
    <!-- Generic page styles -->         

    <?php if ($title == EMPLOYEE_FILE_UPLOAD_TITLE) { ?>    
        <!-- blueimp Gallery styles -->
        <link href="<?php echo BASE_URL ?>/assets/front/css/blueimp-gallery.min.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"/>-->
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