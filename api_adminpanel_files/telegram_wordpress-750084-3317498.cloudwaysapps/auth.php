<?php
ini_set('session.cookie_samesite', 'None');
ini_set('session.cookie_secure', 1);
session_start();
include 'config.php';
if(!isset($_SESSION['user_id']))
{
    ?>

    <script>
        window.location.href='<?php echo Site_URL ?>/login.php';
    </script>

    <?php
}
?>