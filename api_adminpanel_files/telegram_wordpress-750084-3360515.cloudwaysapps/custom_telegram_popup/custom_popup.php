<?php
/*
Plugin Name:  Custom Login Popup
Plugin URI:   https://www.wpbeginner.com 
Description:  Show a poup when login telegram
Version:      1.0
Author:       Hire Wordpress Expert
*/

function custom_popup() {

    global $wpdb;
    $get_site_url = get_site_url();
    ?>
    <script>
            jQuery(document).ready(function(){

                jQuery("#custom_telegram_login").on("click",function(){

                    jQuery(".custom_button").trigger("click");

                    // alert("សូមពិនិត្យមើលលេខកូដចូលរបស់អ្នកពីតេឡេក្រាមរបស់អ្នក។");
                    // if(confirm('សូមពិនិត្យមើលលេខកូដចូលរបស់អ្នកពីតេឡេក្រាមរបស់អ្នក។'))
                    // {
                    //     window.location.href = '<?php echo $get_site_url ?>/telegram/public';
                    // }
                    
                   
                });

                jQuery(".send_custom_link").on("click",function(){

               
                    window.location.href = '<?php echo $get_site_url ?>/telegram/public';
                

                });

                
              
            });
    </script>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" style="display:none;" class="btn btn-info btn-lg custom_button" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal" id="myModal" role="dialog" style="top:35%;">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login Telegram</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
            <p>សូមពិនិត្យមើលលេខកូដចូលរបស់អ្នកពីតេឡេក្រាមរបស់អ្នក។</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="background-color:#6c757d;color:#fff;" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary send_custom_link" style="background-color:#0d6efd;" data-dismiss="modal">Ok</button>
            </div>
        </div>
        
        </div>
    </div>
    
    </div>

    </body>
    </html>

        
    <?php
}
add_action('wp_head', 'custom_popup');