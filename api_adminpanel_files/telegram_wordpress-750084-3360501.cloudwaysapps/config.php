<?php
session_start();
$localhost = 'localhost';

// test server details

// $username = 'u688797554_telegramapi';
// $db_name = 'u688797554_telegramapi';
// $password= 'YUSuCCM4q[';

//cloudways details
$username = 'mcdyrsaugh';
$db_name = 'mcdyrsaugh';
$password= 'JsbqZ2VSSt';

$conn= mysqli_connect($localhost,$username,$password,$db_name);

define("Site_URL","https://wordpress-750084-3360501.cloudwaysapps.com/telegram");
?>