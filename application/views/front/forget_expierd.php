<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    
        <title>RMSA forget password expire</title>
        <link href="<?php echo BASE_URL; ?>/assets/front/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <style>
            @mixin vertical-align($position: relative) {
                position: $position;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            body, html {
                background: #16A085;
            }
            #wrapper {
                width: 100%;
                margin: 0 auto;
                margin-top: 15%;
            }
            h1 {
                color: #EEE;
                text-shadow: -1px -2px 3px rgba(17, 17, 17, 0.3);
                text-align: center;
                font-family: "Monsterrat", sans-serif;
                font-weight: 900;
                text-transform: uppercase;
                font-size: 80px;
                margin-bottom: -5px;
            }
            h1 underline {
                border-top: 5px solid rgba(26, 188, 156, 0.3);
                border-bottom: 5px solid rgba(26, 188, 156, 0.3);
            }
            h3 {
                width: 570px;
                margin-left: 16px;
                font-family: "Lato", sans-serif;
                font-weight: 600;
                color: #EEE;
            }
            .red{
                color: red !important;
            }
        </style>
    </head>
    <body>
        <div id="wrapper" class="animated zoomIn">
            <!-- We make a wrap around all of the content so that we can simply animate all of the content at the same time. I wanted a zoomIn effect and instead of placing the same class on all tags, I wrapped them into one div! -->          
            <?php if ($success==0){ ?>
            <h1 class="red">
                <!-- The <h1> tag is the reason why the text is big! -->
                
                <underline>This link is expired!</underline>
                
                <!-- The underline makes a border on the top and on the bottom of the text -->
            </h1>
            <center>
            <h3>
                You have used an old link. Please generate request again.
            </h3>
            <h3>
                If you are still facing issues, please contact your admin.
            </h3>
            </center>
            <?php } ?>
        </div>
        <script nonce='S51U26wMQz' src="<?php echo BASE_URL; ?>/assets/front/js/jquery.min.js?v=1.0"></script>
        <script nonce='S51U26wMQz' type="text/javascript">
            $(document).ready(function () {
                // perform some jQuery when page is loaded

                $("h1").hover(function () {
                    // when user is hovering the h1
                    $(this).addClass("animated infinite pulse");
                    // we add pulse animation and to infinite
                }, function () {
                    // when user no longer hover on the h1
                    $(this).removeClass("animated infinite pulse");
                    // we remove the pulse
                });
            });

        </script>
    </body>
</html>