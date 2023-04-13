<?php
include 'config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

$data = file_get_contents('php://input');
// $data = json_encode($_REQUEST);
// $data = addslashes($data);

if(!empty($data))
{
    //$user_id_hwe = $_SESSION['user_id_telegram_hwe'];
    $select_user = "SELECT * from users order by updated desc limit 1";
    $row_user = $conn->query($select_user);
    while($data_user = mysqli_fetch_assoc($row_user))
    {
        $user_id = $data_user['telegram_id'];
    }

    $telegram_data = json_decode(file_get_contents('php://input'),true);
    
    $all_messages = $telegram_data;
    
    foreach($all_messages as $all_messages_hwe)
    {
        if(isset($all_messages_hwe['mid']))
        {
            $message_id = $all_messages_hwe['mid'];

            $select_messages = "SELECT * from user_messages where user_id='$user_id' && `message_id`='".$all_messages_hwe['mid']."'";

            // echo "<br>";
            $row_messages = $conn->query($select_messages);
            if(mysqli_num_rows($row_messages) > 0)
            {
                
            }
            else
            {
                if(!empty($all_messages_hwe['message']))
                {
                    $select_messages_hwe = "SELECT * from user_messages where user_id='$user_id' && `message_id`='".$all_messages_hwe['mid']."'";
                    $row_messages_hwe = $conn->query($select_messages_hwe);
                    if(mysqli_num_rows($row_messages_hwe) > 0)
                    {
                        
                    }
                    else
                    {
                        $message = addslashes($all_messages_hwe['message']);

                        $peer_data = $all_messages_hwe['peer_id'];
                        $contact_id='';
                        if($peer_data['_'] == 'peerChannel')
                        {
                            $contact_id = $peer_data['channel_id'];
                        }
                        elseif($peer_data['_'] == 'peerUser')
                        {
                            $contact_id = $peer_data['user_id'];
                        }

                        $insert_mesage = "INSERT INTO user_messages SET user_id='$user_id',`message_id`='".$all_messages_hwe['mid']."',
                            `message`='$message',contact_id='$contact_id'";
                        mysqli_query($conn,$insert_mesage);
                    }
                }
            }
        }

        }

        

    $result_data = file_get_contents('php://input');

    $fp = fopen('Output_hwe.txt', 'w');
    fwrite($fp, $result_data);
    fclose($fp);
}
$array = array(
    "data"=>"send sucessfully"
);
echo json_encode($array);
die();
?>