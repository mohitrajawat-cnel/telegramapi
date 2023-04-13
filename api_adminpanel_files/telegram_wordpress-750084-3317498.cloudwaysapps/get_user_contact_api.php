<?php
include 'config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if(isset($_POST['send_user_hrefs']))
{
    $userids= $_POST['userids'];


    $selectc= "SELECT * from user_group_contact where `status`='0' && user_id = '$userids' order by id asc limit 1";
    $row = $conn->query($selectc);
    if(mysqli_num_rows($row) > 0)
    {
        while($result = mysqli_fetch_assoc($row))
        {
            $value = $result['group_contact_id'];

            $check_messages= "SELECT * from user_messages where `contact_id`='$value' && user_id ='$userids'";
            $row_messages = $conn->query($check_messages);

            $id = $result['id'];
            if(mysqli_num_rows($row_messages) > 0)
            {
                $data = "#".$value;
                if($result['type'] == 'channel')
                {
                    $data = "#-".$value;
                }
                
                $update = "UPDATE user_group_contact SET `status`='1' where group_contact_id='$value'";
                if(mysqli_query($conn,$update))
                {
                    echo $data;
                }
            }
            else
            {
                $update = "UPDATE user_group_contact SET `status`='1' where group_contact_id='$value'";
                mysqli_query($conn,$update);
                echo "no_message";

            }
            
            
        }
       
    }
   
}

die();
?>