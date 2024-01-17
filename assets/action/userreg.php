<?php
session_start();
include("../../config/paths.php");
include("../../config/database.php");
include("../../libs/connection.php");
/*$servername = "localhost";
$username = "root";
$password = "";
*/
global $today;
global $msg;

$today = date("Y-m-d H:i:s");

$msg = '';
$html_code = '';

sleep(2);


if(isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['whatsapp_phone'],$_POST['phone']))
{
    
try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }
 function user_id_code()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec + (float)$sec);
}
//echo 'Send ';

if(isset($_POST['captcha_code2'],$_SESSION['captcha_code']) && $_POST['captcha_code2'] == $_SESSION['captcha_code']){ 
//echo 'Send 00';
		$user_email = $_POST['email'];
		$user_pwd = $_POST['password'];
		$usr_nic = $_POST['nic'];
		$usr_whtsph = $_POST['whatsapp_phone'];
		$usr_phn = $_POST['phone'];
		
    	$findSQL = "SELECT *,COUNT(id) AS usercount FROM `customers_tbl` WHERE `email_address` = '$user_email' OR `mobile_no` = '$usr_phn' OR `whatsapp_no` = '$usr_whtsph' OR `nic` = '$usr_nic'";
    	$findResult = mysqli_query($conn, $findSQL);
    	$findRow = mysqli_fetch_assoc($findResult);
    
    	$user_count = $findRow['usercount'];
    	$user_id = $findRow['id'];
    	
		//echo $findSQL;
		
$time_start2 = user_id_code();
$userId = ''.$user_id.''.substr(round(user_id_code()),10).''.(date('is') + 10);
//$verification_code = (substr(round(user_id_code()),10).''.(date('is') + 10) + 964271465).''.$user_id;

$verification_code = (substr(round(user_id_code()),9).''.(date('is') + 10));

if(isset($_POST['mainCatURL']) && ($_POST['mainCatURL'] != '')){
    $_SESSION['main_cat_url'] = $_POST['mainCatURL'];
    $main_cat_url = $_POST['mainCatURL'];

}else{
    $main_cat_url = '';
}

 $weblink = 'https://autoonline.lk/signin/'.$main_cat_url.'';

 $user_image = 'proffesional_user_logo.jpg';

 $data = array(
  ':user_id' => $userId,
  ':fname'  => $_POST['fname'],
  ':lname'  => $_POST['lname'],
  ':whatsapp_phone'  => $_POST['whatsapp_phone'],
  ':phone'  => $_POST['phone'],
  ':email'   => $_POST['email'],
  ':password'   => md5($_POST['password']),
  ':re_password'   => $_POST['password'],
  ':district'   => $_POST['district'],
  ':nic'   => $_POST['nic'],
  ':user_image' => $user_image,
  ':verification_code' => $verification_code,
  ':is_verify' => 'not',
  ':date_time' => $today
 );
 //`customer_code`, `first_name`, `last_name`, `whatsapp_no`, `mobile_no`, `nic`, `email_address`, `company_name`, `province`, `district`, `user_password`, `user_password_re`, `verification_code`, `is_verify`, `joined_date`
 //fname	lname email password confirm_password whatsapp_phone phone district nic password confirm_password
 
 $current_year = date('Y');
 
 $html_code .= '<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Poppins", sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    We are thrilled to have you here! Get ready to dive into your new account.
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center">
          
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
           
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                        <a href="#" target="_blank" style="text-decoration: none;">
							<span style="display: block; font-family: "Poppins", sans-serif; color: #3e8ef7; font-size: 36px;" border="0"><img src="https://autoonline.lk/assets/images/main_logo3.png" width="200px"/></span>
                        </a>
                    </td>
                </tr>
            </table>
            
            </td>
            </tr>
            </table>
           
        </td>
    </tr>
    
    <tr>
        <td align="center" style="padding: 0px 10px 0px 10px;">
            
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Poppins", sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height: 48px;">
                      <h1 style="font-size: 36px; font-weight: 600; margin: 0;">Autoonline- Registration</h1>
                    </td>
                </tr>
            </table>
            
            </td>
            </tr>
            </table>
            
        </td>
    </tr>
    
    <tr>
        <td align="center" style="padding: 0px 10px 0px 10px;">
            
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
          
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
              
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 0px 30px; color: #666666; font-family: "Poppins", sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;text-align:center;">Please use the verification code below to activate your account.</p>
                </td>
              </tr>
             
              <tr>
                <td bgcolor="#ffffff" align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td align="center" style="border-radius: 3px;" bgcolor=""><p style="color: #047bfd;font-size:22px;font-family: Helvetica, Arial, sans-serif; font-weight:600;">Verification Code</p><span style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #047bfd; text-decoration: none; color: #047bfd; text-decoration: none; padding: 12px 50px; border-radius: 2px; border: 3px solid #047bfd; display: inline-block;">'.$verification_code.'</span></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
           
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;text-align:center;">Click the web url below to go to your profile.</p>
                </td>
              </tr>
              
              
             
              <tr>
                <td bgcolor="#ffffff" align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 30px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td align="center" style="border-radius: 3px;" bgcolor="#047bfd"><a href="'.$weblink.'" style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #047bfd; text-decoration: none; color: #fff; text-decoration: none; padding: 12px 50px; border-radius: 2px; border: 3px solid #047bfd; display: inline-block;">CLICK HERE</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
           
                <tr>
                  <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 25px;">
                    <p style="margin: 0;"><span style="color: #047bfd;font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><u>User Login Details</u></span></p>
                    <p style="margin: 0;font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><span style="font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><b>Email Address:</b></span> '.$user_email.'</p>
                    <p style="margin: 0;font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><span style="font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><b>Phone:</b></span> '.$usr_phn.'</p>
                    <p style="margin: 0;font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><span style="font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><b>Whatsapp No:</b></span> '.$usr_whtsph.'</p>
                    <p style="margin: 0;font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><span style="font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;"><b>Password:</b></span> '.$user_pwd.'</p>
                    
                  </td>
                </tr>
             
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;">If you have any questions, just reply to this email—we are always happy to help out.</p>
                </td>
              </tr>
           
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #666666; font-family: "Poppins", sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;">Cheers,<br>AutoonlineTeam</p>
                </td>
              </tr>
            </table>
           
            </td>
            </tr>
            </table>
        
        </td>
    </tr>
  
    <tr>
        <td align="center" style="padding: 10px 10px 50px 10px;">
        
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
          
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 30px 30px 30px 30px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                  <p style="margin: 0;">
                    <a href="https://autoonline.lk/contact_us" target="_blank" style="color: #999999; font-weight: 700;">Contact</a> -
                    <a href="https://autoonline.lk/about_us" target="_blank" style="color: #999999; font-weight: 700;">About</a> -
                    <a href="https://autoonline.lk/privacy_policy" target="_blank" style="color: #999999; font-weight: 700;">Privacy Policy</a> -
                    <a href="https://autoonline.lk/terms_conditions" target="_blank" style="color: #999999; font-weight: 700;">Terms and Conditions</a>
                  </p>
                </td>
              </tr>
             
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 30px 30px; color: #aaaaaa; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                  <p style="margin: 0;">If you did not receive this email, please check your spam or Junk mail folder.</p>
                </td>
              </tr>
             
             
		 
              <tr>
                <td align="center" style="padding: 30px 30px 30px 30px; color: #333333; font-family: "Poppins", sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                  <p style="margin: 0;">Copyright © '.$current_year.' Autoonline. All rights reserved.</p>
                </td>
              </tr>
            </table>
        
            </td>
            </tr>
            </table>
      
        </td>
    </tr>
</table>

</body>';
 
    //echo 'Send 01';    
    if($user_count == 0){
    	
    	$_SESSION['userloggedIn'] = true;
    	$_SESSION['user_name'] = $_POST['phone'];
    	$_SESSION['user_password'] = $_POST['password'];
    	$_SESSION['user_id'] = $userId;
    	$_SESSION['user_real_name'] = $_POST['fname'];
    	
          
        include('../phpmailer/class.phpmailer.php'); 
        
        $mail = new PHPMailer;
        $mail->IsSMTP();							
        $mail->Host = 'sg1-sr9.supercp.com';	
        $mail->Port = '465';					
        $mail->SMTPAuth = true;						
        $mail->Username = 'support@autoonline.lk';				
        $mail->Password = 'Zqh4aQebVPYG';				
        $mail->SMTPSecure = 'ssl';							
        $mail->From = 'support@autoonline.lk';				
        $mail->FromName = 'Autoonline.Lk';			
        $mail->addAddress($_POST['email'], 'gsit.com.au');
        $mail->addReplyTo('info@gsit.com.au', 'Customer Registration Inquiry');
        $mail->WordWrap = 50;					
        $mail->IsHTML(true);									
        $mail->Subject = 'Auto Online - Customer Registration';				
        $mail->Body = $html_code;
        
        //echo 'Send 02';
        
        if($mail->Send()){							
 //`customer_code`, `first_name`, `last_name`, `whatsapp_no`, `mobile_no`, `nic`, `email_address`, `company_name`, `province`, `district`, `user_password`, `user_password_re`, `verification_code`, `is_verify`, `joined_date`
 //fname	lname email password confirm_password whatsapp_phone phone district nic                
        	 $query = "INSERT INTO customers_tbl (`customer_code`, `first_name`, `last_name`, `whatsapp_no`, `mobile_no`, `nic`, `email_address`, `user_image`, `district`, `user_password`, `user_password_re`, `verification_code`, `is_verify`, `joined_date`) VALUES (:user_id, :fname, :lname, :whatsapp_phone, :phone,  :nic, :email, :user_image, :district , :password , :re_password ,:verification_code,:is_verify,:date_time)";
        	 $statement = $connect->prepare($query);
        	 
         	 if($statement->execute($data))
        	 {       
        	 
                $url = "https://graph.facebook.com/v16.0/101128862670105/messages";
                
                $ch = curl_init();
                
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $whtfname = $_POST["fname"];
                $whtemail = $_POST["email"];
                $whatpassword = $_POST["password"];
                $sysUserName = $_POST["phone"];
                $sysPassword = $_POST["password"];
                $data = array(
                    'messaging_product' => 'whatsapp',
                    'to' => ''.$_POST["whatsapp_phone"].'',
                    'type' => 'template',
                    'template' => 
                        array('name' => 'autoonline_customer_reg','language' => array('code' => 'en_US'),'components'=> array(
                            array(
                                "type" => "header",
                                "parameters" => array(array("type"=> "image","image"=> array('link' =>'https://autoonline.lk/assets/images/whatsapp_logo_banner.jpg')))
                            ),
                            array(
                                "type" => "body",
                                "parameters" => array(array("type"=> "text","text"=> ''.$whtfname.''),array("type"=> "text","text"=> ''.$verification_code.''),array("type"=> "text","text"=> ''.$sysUserName.''),array("type"=> "text","text"=> ''.$sysPassword.''),array("type"=> "text","text"=> ''.$weblink.''),)
                            )
                    )
                   )
                );
                $payload = json_encode($data);
                
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Authorization: Bearer EAAFvBnp1vyUBAEBBhZCKPaMJ18yRB4LXhZAIAASwcx4PnsQZCFzw6CJ4KZA6V8BFqhonWQ4OpaaWxbICGtn7Q9J2AEJh2WatM5WKPCDe7o8MqofEXtoYEN4RftPkoMQ9zAcvxKiQG8PIrv0a94Qf63I8V1v31ICcg5PrazOoqZCiEEEpp1BAU4mzZB6dOhlVTDYOALH4vAQAZDZD')
                );
                
                 curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                 
                 $result = curl_exec($ch);
    
                 curl_close($ch);  
            	 
        	
        		//$msg = 'Registration Completed Successfully...';
        		$msg = 'success';
        	 }
        }else{
            $msg = 'emailerror';
        } 
    	 
     }else{
    		//$msg = 'You are the Registered user...!!';
    		$msg = 'allready_registered';
     }
    
  }else{
     $error = 'recaptcha_error'; 
  }    
 
}else{
	//$msg = 'Somthing Wrong...';
	$msg = 'wrong';
}


    unset($_SESSION['captcha_code']);    

	$message = strval(str_replace(" ","_",$msg));
	
    $data = array(
     'messages'  => ''.$message.''
    ); 
    
   
    echo json_encode($data);
	//echo $message;
//	var_dump($_POST);
//	echo '<br>';
//	var_dump($_SESSION);

?>

