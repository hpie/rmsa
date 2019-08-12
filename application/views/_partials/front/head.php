<?php 
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // request 30 minates ago
    session_destroy();
    session_unset();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!-- Head Section Start -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to rmsahimachal.nic.in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/front/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/front/css/main.css">    
    <script src="<?php echo BASE_URL; ?>/assets/front/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/front/js/bootstrap.min.js"></script>
    <link href="<?php echo BASE_URL; ?>/assets/front/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
</head>
<!-- Head Section End -->