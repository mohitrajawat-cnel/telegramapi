<?php
session_start();

include 'config.php';

session_unset();
session_destroy();
?>
<script>
        window.location.href='<?php echo Site_URL ?>/login.php';
</script>
