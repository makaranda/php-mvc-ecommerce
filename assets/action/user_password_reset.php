<?php
session_start();
//ob_start();
include("../../config/paths.php");
include("../../config/database.php");
include("../../libs/connection.php");


$dateTime = date('Y-m-d H:i:s');
global $formData;
$formData = '';
$from_type = '';
$message = '';
$sendEmail = '';
$sendEmail2 = '';


global $today;
$today = date("Y-m-d");
$date_time = date("Y-m-d H:i:s"); 
$message = '';
$userEmail = '';
$fontName1 = 'Poppins';


//resetpasswordbyemail newPassword confirmPassword
//user_name user_new_password user_confirm_password
if(isset($_POST['user_name'],$_POST['user_new_password'],$_POST['user_confirm_password'],$_SESSION['captcha_code'],$_POST['captcha_code']) && $_SESSION['captcha_code'] != '' && $_POST['captcha_code'] != ''){
	
	if(isset($_SESSION['captcha_code'],$_POST['captcha_code']) && $_SESSION['captcha_code'] == $_POST['captcha_code']){
	//var_dump($_POST);
	
	$verification_code = rand(999999,10);
		
	$resetpasswordbyemail = $_POST['user_name'];
	$newPassword = $_POST['user_new_password'];
	$confirmPassword = $_POST['user_confirm_password'];
		
	$login_password = md5($newPassword);
	
		$sql = "SELECT *,COUNT(customer_code) AS usercount FROM `customers_tbl` WHERE `email_address` = '$resetpasswordbyemail'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		$usercount = $row['usercount'];
		$pastPassword = $row['user_password_re'];
		$pastPasswordmd5 = md5($row['user_password_re']);
		
		if($usercount == 1){
			//$_SESSION['login_email'] = $login_Email;
			//$_SESSION['login_password'] = $login_password;
				//echo 'OK';
				
            $sendEmail2 .= "First line of text\nSecond line of text";
			$sendEmail .= '<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
        
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        
            <tr>
                <td align="center">
        
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                                <a href="#" target="_blank" style="text-decoration: none;">
        							<span style="display: block; font-family: '.$fontName1.', sans-serif; color: #3e8ef7; font-size: 36px;" border="0"><img src="'.URL.'assets/images/main_logo3.png" width="250px"/></span>
                                </a>
                            </td>
                        </tr>
                    </table>
        
                </td>
            </tr>
          
            <tr>
                <td align="center" style="padding: 0px 10px 0px 10px;">
        
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td bgcolor="#ffffff" align="center" valign="top" style="padding: 10px 20px 20px 20px; border-radius: 4px 4px 0px 0px;">
                              <h1 style="font-size: 36px; font-weight: 600; margin: 0; font-family: '.$fontName1.', sans-serif;text-transform: capitalize;text-align:center;">Welcome to Auto Online</h1>
                            </td>
                        </tr>
                    </table>
        
                </td>
            </tr>
          
            <tr>
                <td align="center" style="padding: 0px 10px 0px 10px;">
                    
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                   
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #000; font-family: '.$fontName1.', sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                          <p style="margin: 0;text-align:center;">Thank you for registering with us and sharing your personal information with us.</p>
                         
                          <p style="text-align:left;margin: 30px 0 25px 0;font-family: monospace;line-height: 25px;color: #27ab18;font-size: 20px;font-weight:700">
        Your password reset process has been successfully updated in our system and please go to the email and verify this before accessing this account.</p>
        
                          <p style="text-align:center;margin: 40px 0 25px 0;font-family: inherit;line-height: 25px;color: #ab1818;font-size: 20px;font-weight:700;text-transform: uppercase;" align="center">
        Verification Code - '.$verification_code.'</p>
        
        				<div class="" style="text-align:center;margin-bottom:20px;margin-top:20px;" align="center">
                        	<form action="'.URL.'user_password_verification" method="POST">
                            	<input type="hidden" name="verif_usr_email" value="'.$resetpasswordbyemail.'"/>	
                                <input type="hidden" name="verif_usr_new_password" value="'.$newPassword.'"/>
                                <input type="hidden" name="verif_usr_code" value="'.$verification_code.'"/>
                                <input type="hidden" name="verif_usr_past_password" value="'.$pastPassword.'"/>
                            	<button type="submit" style="background-color:rgb(41,121,255);border-color:rgb(41,121,255);border-radius:0px 3px 3px;border-style:solid;border-width:10px 17px;color:rgb(255,255,255);display:inline-block;font-family:Roboto,Arial;font-size:14px;font-weight:500;line-height:18px;margin:0px;text-align:center;text-decoration:none">SUBMIT VERIFICATION</button>
                            </form>
                        </div>
               
                        </td>
                      </tr>

                 
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                          <p style="margin: 0;color:#161414;"><strong style="text-transform: capitalize;font-family: sans-serif;">For questions about this message, please contact.</strong> <br> Email Address - <a href="mailto:info@autoonline.lk">info@autoonline.lk</a> <br> Land Line - <a href="tel:94753813398">94 7538 13398</a></p>
                        </td>
                      </tr>
                 
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #666666; font-family: '.$fontName1.', sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                          <p style="margin: 0;">Cheers,<br>Auto Online Team</p>
                        </td>
                      </tr>
                    </table>
           
                </td>
            </tr>
        
            <tr>
                <td align="center" style="padding: 10px 10px 50px 10px;">
        
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                   
                      <tr style="display:none;">
                        <td bgcolor="#ffffff" align="left" style="padding: 30px 30px 30px 30px; color: #aaaaaa; font-family: '.$fontName1.', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                          <p style="margin: 0;">
                            <a href="#" target="_blank" style="color: #999999; font-weight: 700;">User Account</a> -
                            <a href="#" target="_blank" style="color: #999999; font-weight: 700;">About</a> -
                            <a href="#" target="_blank" style="color: #999999; font-weight: 700;">Help</a> -
                            <a href="#" target="_blank" style="color: #999999; font-weight: 700;">Terms and Conditions</a>
                          </p>
                        </td>
                      </tr>
                   
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 30px 30px; color: #aaaaaa; font-family: '.$fontName1.', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                          <p style="margin: 0;">You received this email because you just messaged us. If it looks weird, check it out in your browser.</b>.</p>
                          <p style="margin: 0;color:#b37b16;">We are a trusted group of finding multiple jobs through an online group.</p>
                        </td>
                      </tr>
               
             
        
                      <tr>
                        <td align="center" style="padding: 30px 30px 30px 30px; color: #333333; font-family: '.$fontName1.', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                          <p style="margin: 0;">Copyright © '.date("Y").' Auto Online All Rights Reserved.</p>
                          <p style="margin: 0;text-align:center;">When it is a good thing, keep it in your mind.</p>
                        </td>
                      </tr>
                    </table>
        
                </td>
            </tr>
        </table>
        
        </body>';	
            
            include('../../assets/phpmailer/class.phpmailer.php');

            $datetime = date('Y-m-d H:i:s');
    
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
            //$mail->addAddress('makarandapathirana@gmail.com', 'User Password Reset');
            $mail->addAddress(''.$resetpasswordbyemail.'', 'User Password Reset');
            $mail->addReplyTo('info@autoonline.lk', 'User Password Reset');
            $mail->WordWrap = 50;					
            $mail->IsHTML(true);									
            $mail->Subject = 'Auto Online - User Password Reset';  				
    		$mail->Body = $sendEmail;  		
    		
    		if($mail->Send())								
            {
                
                $updateSQL = "UPDATE `customers_tbl` SET `verification_code` = '$verification_code',`is_verify` = 'not',`user_password_re` = '$newPassword',`user_password` = '$login_password' WHERE `email_address`='$resetpasswordbyemail' AND `user_password`='$pastPasswordmd5'";
                mysqli_query($conn, $updateSQL);
                //echo $updateSQL;
                $message = 'success';
            }else{
                $message = 'wrong';
            }
				
			//$message = 'success';	
			
		}else{
		
			$message = 'not_user';
		}
		
	}else{
		$message = 'recaptcha_error';
	}
	
	
}else{
	$message = 'wrong';
}

$data = array(
 'message' => $updateSQL
);

echo json_encode($data);

/*

var_dump($_SESSION);
echo '<br>';
var_dump($_POST);
*/