<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    ?>

    <script>
        window.location.href='<?php echo Site_URL ?>/login.php';
    </script>

    <?php
}
else
{
    ?>

    <script>
        window.location.href='<?php echo Site_URL ?>/user_messages_show.php';
    </script>

    <?php
}
?>