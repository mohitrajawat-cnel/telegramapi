<?php
include 'config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if(isset($_POST['get_user_mob_number']))
{
    
    $selectc= "SELECT * from user_mobile_otp_get where `status`='0' and `otp`='0'  order by id asc limit 1";
    $row = $conn->query($selectc);
    if(mysqli_num_rows($row) > 0)
    {
        while($result = mysqli_fetch_assoc($row))
        {
            $mobile_number = $result['mobile_number'];
            $id = $result['id'];
            $update = "UPDATE user_mobile_otp_get SET `status`='1' where id='$id'";
            if(mysqli_query($conn,$update))
            {
                echo $mobile_number;
            }
         
        }
    
    }

    die();
}


if(isset($_POST['get_user_mob_number_with_otp']))
{
    $otp = 0;
    if(isset($_POST['mobile_number']) && $_POST['mobile_number'] != '')
    {
        $mobile_number = explode(' ',$_POST['mobile_number']);

        $mobile_number = $mobile_number[1];

        $country_code = trim($mobile_number[0]);
        
        $selectc= "SELECT * from user_mobile_otp_get where `mobile_number`='$mobile_number' && `otp`!='0'";
        $row = $conn->query($selectc);
        if(mysqli_num_rows($row) > 0)
        {
            while($result = mysqli_fetch_assoc($row))
            {
                $otp = $result['otp'];
            
              
            }
        
        }
    }

    echo $otp;

    die();
}


?>