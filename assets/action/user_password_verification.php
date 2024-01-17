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


//userverificationemail userverificationpassword user_verification_code
//userverificationemail userverificationpassword user_verification_code

if(isset($_POST['userverificationemail'],$_POST['userverificationpassword'],$_POST['user_verification_code'],$_SESSION['captcha_code'],$_POST['captcha_code']) && $_SESSION['captcha_code'] != '' && $_POST['captcha_code'] != ''){
	
	if(isset($_SESSION['captcha_code'],$_POST['captcha_code']) && $_SESSION['captcha_code'] == $_POST['captcha_code']){
	//var_dump($_POST);
	$userverificationemail = $_POST['userverificationemail'];
	$userverificationpassword = $_POST['userverificationpassword'];
	$userverificationcode = $_POST['user_verification_code'];
	//$verif_past_password = $_POST['verif_past_password'];
	//$verif_past_passwordmd5 = md5($verif_past_password);
		
	$userverificationpassw = md5($userverificationpassword);
		
		$sql = "SELECT *,COUNT(customer_code) AS usercount FROM `customers_tbl` WHERE `email_address`='$userverificationemail' AND `user_password`='$userverificationpassw' AND `verification_code` = '$userverificationcode'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		//echo $sql;
		
		$user_count = $row['usercount'];
		$status = $row['is_verify'];
		$verification_code = $row['verification_code'];
		$customer_code = $row['customer_code'];
		$customer_name = $row['first_name'];
		$customer_password = $row['user_password_re'];
		$mobile_no = $row['mobile_no'];
		
		if($user_count == 1){
		    
		    if(isset($verification_code) && $verification_code != ''){
		        
		        if(isset($status) && $status == 'verify'){
		            
		            $message = 'already_verify';
		            
		        }elseif(isset($status) && $status == 'not'){
		            
		            $updateSQL = "UPDATE `customers_tbl` SET `verification_code` = '',`is_verify` = 'verify' WHERE `email_address`='$userverificationemail' AND `user_password`='$userverificationpassw'";
		            //echo $updateSQL;
		            mysqli_query($conn, $updateSQL);
		            
        			$_SESSION['userloggedIn'] = true;
        			$_SESSION['user_name'] = $mobile_no;
        			$_SESSION['user_password'] = $customer_password;
        			$_SESSION['user_id'] = $customer_code;
        			$_SESSION['user_real_name'] = $customer_name;        			
		            
    			    $message = 'success';
    			    
		            
		        }else{
		            $message = 'wrong';
		        }
		        
		        
		    }else{
		        
		        $message = 'verification_error';


		    }
			
				//echo 'OK';
				
				
			
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
 'message' => $message
);

echo json_encode($data);

/*

var_dump($_SESSION);
echo '<br>';
var_dump($_POST);
*/