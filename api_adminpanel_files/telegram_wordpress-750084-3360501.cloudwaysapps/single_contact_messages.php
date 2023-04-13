<?php
include 'config.php';
include 'auth.php';

$user_id_hwe = $_REQUEST['user_id'];
$contact_id = $_REQUEST['contact_id'];
$select = "SELECT * from user_messages where user_id='$user_id_hwe' && contact_id='$contact_id'";
$row = $conn->query($select);
$count = 1;
while($result = mysqli_fetch_assoc($row))
{
    
    $message = $result['message'];
    echo $count."-: ".$message;
    
    echo "<br>";
    echo "</hr>";
    echo "<hr/>";
    $count++;
    
}


die();
?>