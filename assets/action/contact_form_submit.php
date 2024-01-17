<?php
session_start();
include("../../config/database.php");
include('../../libs/connection.php');
include('../../config/paths.php');
include('../phpmailer/class.phpmailer.php');

global $today;
$today = date("Y-m-d");
$date_time = date("Y-m-d H:i:s"); 
$message = '';
$userEmail = '';
$fontName1 = 'Poppins';
/*
array(1) { ["captcha_code"]=> string(6) "c0dd2c" }
array(7) { ["recaptcha_response"]=> string(15) "03ANYolqsKwnMEI" ["message"]=> string(4) "sasd" ["name"]=> string(19) "Makaranda Pathirana" ["phone"]=> string(10) "0773944180" ["email"]=> string(28) "makarandapathirana@gmail.com" ["subject"]=> string(3) "asd" ["captcha_code"]=> string(6) "c0dd2c" }
*/
//message name phone email subject
if(isset($_POST['message'],$_POST['name'],$_SESSION['captcha_code'],$_POST['captcha_code'],$_POST['phone'],$_POST['email']) && $_POST['email'] != '' && $_POST['captcha_code'] != '')
{
	
    if(isset($_SESSION['captcha_code'],$_POST['captcha_code']) && $_POST['captcha_code'] == $_SESSION['captcha_code']){
        
        
        $email = $_POST['email'];
        $name = $_POST['name'];
        $messages = $_POST['message'];
        $phone = $_POST['phone'];
        $subject = 'Contact us - '.$name;
        
        //$message = 'success';

        $userEmail .= '<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
        
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        
            <tr>
                <td align="center">
        
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                                <a href="#" target="_blank" style="text-decoration: none;">
        							<span style="display: block; font-family: '.$fontName1.', sans-serif; color: #3e8ef7; font-size: 36px;" border="0"><img src="'.URL.'assets/images/main_logo3.png" width="150px"/></span>
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
                              <h1 style="font-size: 36px; font-weight: 600; margin: 0; font-family: '.$fontName1.', sans-serif;text-transform: capitalize;text-align:center;">Welcome to Autoonline.Lk </h1>
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
                          <p style="margin: 0;text-align:center;">Please visit the following personal information of the person contacting us.</p>
                          <p style="margin: 20px 0 0 0;color:#666666;text-align:center;display:none;">Your investment and partnership are vital in helping the Millennial who are suffering in various comers of the world!.</p>
                          <p style="margin: 20px 0 0 0;color:#666666;text-align:center;display:none;">Many Blessings!</p>
                          
                          <p style="text-align:left;margin:25px 0 0 0;font-family:sans-serif;line-height:24px;color:#333333;font-size:16px;font-weight: 700;">
        <strong>Name :</strong> '.$name.'</p>
                          <p style="text-align:left;margin:0;font-family:sans-serif;line-height:24px;color:#333333;font-size:16px;font-weight: 700;">
        <strong>Email Address :</strong> '.$email.'</p>
                          <p style="text-align:left;Margin:0;font-family:sans-serif;line-height:24px;color:#333333;font-size:16px;font-weight: 700;">
        <strong>Whatsapp Number :</strong> '.$phone.'</p>
                          <p style="text-align:left;Margin:0;font-family:sans-serif;line-height:24px;color:#333333;font-size:16px;font-weight: 700;">
        <strong>Subject :</strong> '.$subject.'</p>
                          <p style="text-align:left;Margin:0;font-family:sans-serif;line-height:24px;color:#333333;font-size:16px;font-weight: 700;">
        <strong>Message :</strong> '.$messages.'</p>
               
                        </td>
                      </tr>

                 
                 
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #666666; font-family: '.$fontName1.', sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                          <p style="margin: 0;">Cheers,<br>Autoonline.Lk Team</p>
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
                          <p style="margin: 0;color:#b37b16;">We are a Sri Lanka Government approved and well experienced OEM spare parts and accessories distribution company.</p>
                        </td>
                      </tr>
               
             
        
                      <tr>
                        <td align="center" style="padding: 30px 30px 30px 30px; color: #333333; font-family: '.$fontName1.', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                          <p style="margin: 0;">Copyright © '.date("Y").' Autoonline.Lk All Rights Reserved.</p>
                          <p style="margin: 0;text-align:center;">When it is a good thing, keep it in your mind.</p>
                        </td>
                      </tr>
                    </table>
        
                </td>
            </tr>
        </table>
        
        </body>';
        
        
        
        $userEmail2 .= '<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">
        
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        
            <tr>
                <td align="center">
        
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 40px 10px 10px 10px;">
                                <a href="#" target="_blank" style="text-decoration: none;">
        							<span style="display: block; font-family: '.$fontName1.', sans-serif; color: #3e8ef7; font-size: 36px;" border="0"><img src="'.URL.'assets/images/main_logo3.png" width="150px"/></span>
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
                              <h1 style="font-size: 36px; font-weight: 600; margin: 0; font-family: '.$fontName1.', sans-serif;text-transform: capitalize;text-align:center;">Welcome to Autoonline.Lk </h1>
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
                          <p style="margin: 0;text-align:center;">Thank you for contacting us and sharing your personal information with us.</p>
                         
                          <p style="text-align:left;margin: 30px 0 25px 0;font-family: monospace;line-height: 25px;color: #27ab18;font-size: 20px;font-weight:700">
        <strong>Name :</strong>Your contact message has been successfully sent to our system and we will contact you within 24 hours.</p>
               
                        </td>
                      </tr>

                 
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                          <p style="margin: 0;color:#161414;"><strong style="text-transform: capitalize;font-family: sans-serif;">For questions about this message, please contact.</strong> <br> Email Address - <a href="mailto:rajaranatunga@gmail.com">info@autoonline.lk.com</a> <br> Land Line - <a href="tel:94753813398">94(75) 381 3398</a></p>
                        </td>
                      </tr>
                 
                      <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 0px 0px; color: #666666; font-family: '.$fontName1.', sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                          <p style="margin: 0;">Cheers,<br>Autoonline.Lk Team</p>
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
                          <p style="margin: 0;color:#b37b16;">We are a Sri Lanka Government approved and well experienced OEM spare parts and accessories distribution company.</p>
                        </td>
                      </tr>
               
             
        
                      <tr>
                        <td align="center" style="padding: 30px 30px 30px 30px; color: #333333; font-family: '.$fontName1.', sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                          <p style="margin: 0;">Copyright © '.date("Y").' Autoonline.Lk All Rights Reserved.</p>
                          <p style="margin: 0;text-align:center;">When it is a good thing, keep it in your mind.</p>
                        </td>
                      </tr>
                    </table>
        
                </td>
            </tr>
        </table>
        
        </body>';

                    //message name email subject
                    $message = 'success';
                    
                    $datetime = date('Y-m-d H:i:s');
            	    
            		$mail = new PHPMailer;
            		$mail->IsSMTP();							
            		$mail->Host = 'sg1-sr9.supercp.com';	
            		//$mail->Host = gethostname();
            		$mail->Port = '465';					
            		$mail->SMTPAuth = true;						
            		$mail->Username = 'support@kidscentremalabe.com';				
                    $mail->Password = 'Zqh4aQebVPYG';				
            		$mail->SMTPSecure = 'ssl';							
            		$mail->From = 'support@kidscentremalabe.com';				
            		$mail->FromName = 'Kids Centre Malabe';			
            		//$mail->addAddress('makarandapathirana@gmail.com', 'Contact us');		
            		$mail->addAddress('rajaranatunga@gmail.com', 'Contact us');	
                    $mail->addReplyTo('rajaranatunga@gmail.com', 'Kids Centre Malabe');            		
            		//$mail->AddCC($_POST["email"]);
            		$mail->WordWrap = 50;					
            		$mail->IsHTML(true);									
            		$mail->Subject = 'Contact Us - from '.$_POST["name"].'';				
            		$mail->Body = $userEmail;
            		
            		
            		
            		if($mail->Send())								//Send an Email. Return true on success or false on error
            		{
            			//$error = '<label class="text-success">Thank you for contacting us</label>';
            			
                        $insertSQL = "INSERT INTO `contact_tbl`(`name`, `email`, `phone`,`subject`, `message`, `date_time`) VALUES ('$name','$email','$phone','$subject','$messages','$datetime')";
                        mysqli_query($conn, $insertSQL);            			
            			//$message = 'success';
            			
                        $mail->ClearAllRecipients();
                        $mail->Subject = 'Contact Us - from Kids Centre Malabe';
                        $mail->addReplyTo('support@kidscentremalabe.com', 'Kids Centre Malabe');                      
                        $mail->Body = $userEmail2;
                 		$mail->From = 'support@kidscentremalabe.com';				
                		$mail->FromName = 'Kids Centre Malabe';	                   
                        $mail->addAddress($email);
                		
                		if($mail->Send()){
                		    $message = 'success';
                		}
            		
            		}
            		else
            		{
            			//$error = '<label class="text-danger">There is an Error</label>';
            			$message = 'email_error';
            		}


            		
            		$name = '';
            		$email = '';
            		$subject = '';
            		$messages = '';
            		$phone = '';

  
        }else{
        	$message = 'recaptcha_error';
        	//echo 'You are not a human';
        }  
    
}else{
	
	$message = 'wrong_all';
}


$data = array(
 'message'  => $message
); 

echo json_encode($data);
/*
array(1) { ["captcha_code"]=> string(6) "c0dd2c" }
array(7) { ["recaptcha_response"]=> string(15) "03ANYolqsKwnMEI" ["message"]=> string(4) "sasd" ["name"]=> string(19) "Makaranda Pathirana" ["phone"]=> string(10) "0773944180" ["email"]=> string(28) "makarandapathirana@gmail.com" ["subject"]=> string(3) "asd" ["captcha_code"]=> string(6) "c0dd2c" }
*/
/*
echo 'message - '.$message;
echo '<br>';
var_dump($_SESSION);
echo '<br>';
var_dump($_POST);
*/

?>