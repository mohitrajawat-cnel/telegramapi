<?php
include 'config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if(isset($_REQUEST['check_mobile_numer']))
{
    
    $check_status = 0;
    $selectc= "SELECT * from user_mobile_otp_get where `status`='0' and `otp`='0' and mobile_status='0'  order by id asc limit 1";
    $row = $conn->query($selectc);
    if(mysqli_num_rows($row) > 0)
    {
        while($result = mysqli_fetch_assoc($row))
        {
            $mobile_number = $result['mobile_number'];
            $id = $result['id'];
            $update = "UPDATE user_mobile_otp_get SET mobile_status='1' where mobile_number='$mobile_number'";
            if(mysqli_query($conn,$update))
            {
                $check_status  =1;
            }
         
        }
    
    }

    echo $check_status;

    die();
}

?>