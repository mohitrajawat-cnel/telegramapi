<?php
include 'config.php';
include 'auth.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">

<?php
if(isset($_REQUEST['delete']) && $_REQUEST['delete'] == '1')
{
    $get_user_id = $_REQUEST['delete_id'];
    $delete = "DELETE from users where telegram_id='$get_user_id'";
    mysqli_query($conn,$delete);

    $delete_channel_messages = "DELETE from channel_messages where user_id='$get_user_id'";
    mysqli_query($conn,$delete_channel_messages);

    $delete_user_messages = "DELETE from user_messages where user_id='$get_user_id'";
    mysqli_query($conn,$delete_user_messages);

    $delete_user_contacts = "DELETE from user_group_contact where user_id='$get_user_id'";
    mysqli_query($conn,$delete_user_contacts);
    ?>
    <script>
        window.location.href='<?php echo Site_URL; ?>/user_messages_show.php';
    </script>
    <?php

}
?>
<div style="float:right;margin-top: 43px;margin-right: 20px;"><a href="<?php echo Site_URL ?>/logout.php" class="btn btn-primary" >Logout</a></div>
<br/>
<br/>
<div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>User id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "SELECT * from users";
                $row = $conn->query($select);
                if(mysqli_num_rows($row) > 0)
                {
                    while($result = mysqli_fetch_assoc($row))
                    {

                        $user_id = $result['id'];
                        $telegram_id = $result['telegram_id'];
                        $access_hash = $result['access_hash'];
                        $first_name = $result['first_name'];
                        $last_name = $result['last_name'];
                        $phone = $result['mobile_number'];

                        ?>
                            <tr>
                                <td><a href="#"><?php echo $user_id; ?></a></td>
                                <td><?php echo $first_name; ?></td>
                                <td><?php echo $last_name; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td>
                                    <button><a href="<?php echo Site_URL; ?>/user_messages_show.php?delete=1&delete_id=<?php echo $telegram_id; ?>" >Delete User</a></button>
                                    <button><a href="<?php echo Site_URL; ?>/user_login_contact.php?id=<?php echo $telegram_id; ?>" target="_blank" >All Contacts</a></button>
                                 
                               </td>

                               
                            </tr>
                        <?php
                    }

                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>User id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
jQuery(document).ready(function () {
    $('#example').DataTable();
});
</script>