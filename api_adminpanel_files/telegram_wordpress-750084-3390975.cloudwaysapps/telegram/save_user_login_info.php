<?php
session_start();
include 'config.php';
$conn= mysqli_connect($localhost,$username,$password,$db_name);
if(isset($_POST['save_user_data']))
{
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
    
    $decode_user_data = json_decode($_POST['user_data'],true);

    $user_data = $decode_user_data['user'];
    
    $user_id = $user_data['id'];
    $access_hash = $user_data['access_hash'];
    $first_name = $user_data['first_name'];
    $last_name = $user_data['last_name'];
    $phone = $user_data['phone'];

    $_SESSION['user_id_telegram_hwe'] = $user_id;

    ?>

    <script>
        localStorage.setItem("user_id_telegramsfsd",'565634523452');
    </script>
    <?php

    $user_id = $_SESSION['user_id_telegram_hwe'];

    $select = "SELECT * from users where telegram_id='$user_id'";
    $row = $conn->query($select);
    if(mysqli_num_rows($row) > 0)
    {
        $insert = "UPDATE users SET first_name='".$first_name."',
        last_name='".$last_name."',
        telegram_id='".$user_id."',
        mobile_number='".$phone."',
        hash_id='".$access_hash."',
        updated=now() where telegram_id='".$user_id."'
        ";
        if(mysqli_query($conn,$insert))
        {
            echo $_SESSION['user_id_telegram_hwe'];
        }
    }
    else
    {
        $update = "INSERT INTO users SET first_name='".$first_name."',
        last_name='".$last_name."',
        telegram_id='".$user_id."',
        mobile_number='".$phone."',
        hash_id='".$access_hash."',
        updated=now()
        ";
        if(mysqli_query($conn,$update))
        {
            echo $_SESSION['user_id_telegram_hwe'];
        }
    }
    // print_r($decode_user_data);
    // echo "<br>";
    // echo "user_id:".$user_id."<br>";
    // echo "user_id:".$access_hash."<br>";
    // echo "user_id:".$first_name."<br>";
    // echo "user_id:".$last_name."<br>";
    // echo "user_id:".$phone."<br>";
    die();
}

?>