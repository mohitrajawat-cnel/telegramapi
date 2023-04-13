<?php
session_start();
include 'config.php';
// include 'auth.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
<meta charset="UTF-8">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>User id</th>
                <th>Username/Channel Title</th>
                <th>Mobile Number</th>
                <th>Contact Messages</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "SELECT * from user_group_contact where user_id='".$_REQUEST['id']."' order by id asc";
                $row = $conn->query($select);
                if(mysqli_num_rows($row) > 0)
                {
                    while($result = mysqli_fetch_assoc($row))
                    {
                       
                        $group_contact_id = $result['group_contact_id'];
                        $telegram_id = $result['user_id'];

                        $select_check_message = "SELECT * from user_messages where user_id='$telegram_id' && contact_id='$group_contact_id'";
                        $row_check_message = $conn->query($select_check_message);

                        if(mysqli_num_rows($row_check_message) > 1)
                        {
                            $message_have_not = "More Messages";
                        }
                        elseif(mysqli_num_rows($row_check_message) > 0 && mysqli_num_rows($row_check_message) <= 1)
                        {
                            $message_have_not = "Less Messages";
                        }
                        else
                        {
                            $message_have_not = "No Messages";
                        }
                            $user_id = $result['id'];
                            $first_name = $result['group_first_name'];
                            $last_name = $result['group_last_name'];
                            $channel_title ='';
                            if(isset($result['channel_title']))
                            {
                                $channel_title = $result['channel_title'];
                            }
                            
                            $mobile_number = $result['mobile_number'];
                            $type = $result['type'];

                            if($type == "channel")
                            {
                                $name = html_entity_decode($channel_title);
                            }
                            else
                            {
                                $name = $first_name.' '.$last_name;
                            }

                            ?>
                                <tr>
                                    <td><a target="_blank" href="<?php echo Site_URL; ?>/single_contact_messages.php?user_id=<?php echo $telegram_id; ?>&contact_id=<?php echo $group_contact_id;?>"><?php echo $user_id; ?></a></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $mobile_number; ?></td>
                                    <td><?php echo $message_have_not; ?></td>
                                    <td><?php echo $type; ?></td>
                                    
                                
                                </tr>
                            <?php
                        
                    }

                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>User id</th>
                <th>Username/Channel Title</th>
                <th>Mobile Number</th>
                <th>Contact Messages</th>
                <th>Type</th>
                
            </tr>
        </tfoot>
    </table>
<script>
jQuery(document).ready(function () {
    $('#example').DataTable();
});
</script>