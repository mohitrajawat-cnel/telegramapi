<?php
session_start();
$localhost = 'localhost';

// test server details

// $username = 'u688797554_telegramapi';
// $db_name = 'u688797554_telegramapi';
// $password= 'YUSuCCM4q[';

//cloudways details
$username = 'tsrjsmbcax';
$db_name = 'tsrjsmbcax';
$password= 'YtgZF62FC8';

$conn= mysqli_connect($localhost,$username,$password,$db_name);

define("Site_URL","http://phpstack-906702-3360504.cloudwaysapps.com/telegram");
?>