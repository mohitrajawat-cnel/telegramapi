<?php
include 'config.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

$data = file_get_contents('php://input');
// $data = json_encode($_REQUEST);
$data = addslashes($data);

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


        $all_users = $telegram_data['users'];
        $all_messages = $telegram_data['messages'];
        $all_chats = $telegram_data['chats'];
        
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

         foreach($all_chats as $all_chats_hwe)
        {
            if(isset($all_chats_hwe['id']))
            {
                if($all_chats_hwe['_'] == 'channel')
                {

                
                    $channel_id = $all_chats_hwe['id'];
                    
                    $select_channel= "SELECT * from user_group_contact where user_id='$user_id' && `group_contact_id`='".$all_chats_hwe['id']."'";

                    // echo "<br>";
                    $row_channel = $conn->query($select_channel);
                    if(mysqli_num_rows($row_channel) > 0)
                    {
                        
                    }
                    else
                    {
                        if(!empty($all_chats_hwe['title']))
                        {
                            $select_channel_hwe = "SELECT * from user_group_contact where user_id='$user_id' && `group_contact_id`='".$all_chats_hwe['id']."'";
                            $row_channel_hwe = $conn->query($select_channel_hwe);
                            if(mysqli_num_rows($row_channel_hwe) > 0)
                            {
                            
                            }
                            else
                            {
                                $channel_title = addslashes($all_chats_hwe['title']);
                                $channel_username = addslashes($all_chats_hwe['username']);

                                $insert_channel = "INSERT INTO user_group_contact SET user_id='$user_id',`group_contact_id`='".$all_chats_hwe['id']."',
                                    `channel_title`='$channel_title',group_first_name='$channel_username',type='channel'";
                                mysqli_query($conn,$insert_channel);
                            }
                        }
                    }

                }
            }

         }

         foreach($all_users as $all_users_hwe)
        {
            if(isset($all_users_hwe['id']))
            {
                $group_user_id = $all_users_hwe['id'];
                
                $select_channel= "SELECT * from user_group_contact where user_id='$user_id' && `group_contact_id`='".$all_users_hwe['id']."'";

               // echo "<br>";
                $row_channel = $conn->query($select_channel);
                if(mysqli_num_rows($row_channel) > 0)
                {
                    
                }
                else
                {
                    
                        $select_channel_hwe = "SELECT * from user_group_contact where user_id='$user_id' && `group_contact_id`='".$all_users_hwe['id']."'";
                        $row_channel_hwe = $conn->query($select_channel_hwe);
                        if(mysqli_num_rows($row_channel_hwe) > 0)
                        {
                           
                        }
                        else
                        {
                            // if(!empty($all_users_hwe['phone']))
                            // {
                                $firstname = $all_users_hwe['first_name'];
                                $phone = $all_users_hwe['phone'];
                                $last_name = $all_users_hwe['last_name'];
    
                                $insert_channel = "INSERT INTO user_group_contact SET user_id='$user_id',`group_contact_id`='".$all_users_hwe['id']."',
                                    `group_first_name`='$firstname',group_last_name='$last_name',mobile_number='$phone',type='contact'";
                                mysqli_query($conn,$insert_channel);
                            //}
                            
                        }
                    
                }
            }

         }
        
        // $update = "INSERT INTO channel_messages SET user_id='$user_id',
        // messagess='$data',
        // `date`=now()";
        // mysqli_query($conn,$update);

        // $id = mysqli_insert_id($conn);

        // $before_id = $id - 1;
        // $select = "SELECT * from channel_messages where id='$before_id'";
        // $row = $conn->query($select);
        // while($result = mysqli_fetch_assoc($row))
        // {
            
        //     $result_data = $result['messagess'];
        //     $result_data_hwe = addslashes($result_data);
         
        //     $insert_mesage = "INSERT INTO user_messages SET user_id='$user_id',
        //     `message`='$result_data_hwe'";
        //     mysqli_query($conn,$insert_mesage);
        // }
        
         // $datadfsd = $_REQUEST;

        $result_data = file_get_contents('php://input');

        $fp = fopen('Output.txt', 'w');
        fwrite($fp, $result_data);
        fclose($fp);
    }
    $array = array(
        "key"=>"first"
    );
echo json_encode($array);
die();
?>