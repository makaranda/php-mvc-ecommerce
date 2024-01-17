<?php
session_start();
include("../../config/paths.php");
include("../../config/database.php");
/*$servername = "localhost";
$username = "root";
$password = "";
*/
global $today;
$today = date("Y-m-d");

//sleep(5);

global $error;

if(isset($_POST['user_name'],$_POST['user_password']))
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

if(isset($_POST['captcha_code'],$_SESSION['captcha_code']) && $_POST['captcha_code'] == $_SESSION['captcha_code']){ 
    
$user_name = $_POST['user_name'];
$user_password = md5($_POST['user_password']);
//$actualUrl = $_POST['actualUrl'];
 
 $sql = "SELECT * FROM `customers_tbl` WHERE `mobile_no` = '$user_name' OR `whatsapp_no` = '$user_name' OR `email_address` = '$user_name' AND user_password = '$user_password'";
 $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);
      $user_id = $row['customer_code'];
      $user_first_name = $row['first_name'];
      $user_last_name = $row['last_name'];
      
      //echo 'This User is registered....!!'; 
      $error = 'Reg';
			$_SESSION['userloggedIn'] = true;
			$_SESSION['user_name'] = $_POST['user_name'];
			$_SESSION['user_password'] = $_POST['user_password'];
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_real_name'] = $user_first_name;
			if(isset($_POST['user_category_url']) && $_POST['user_category_url'] != ''){
			    $_SESSION['main_cat_url'] = $_POST['user_category_url'];
			}else{
			    unset($_SESSION['main_cat_url']);
			}
			
			
			//header('location: '.URL.'my_account');
		    
      
      
    } else {
      //echo 'This User is Not registered....!!';
	  $error = 'Not';
    }
    
    //var_dump($_POST);
    //echo $error;
  }else{
     $error = 'recaptcha_error'; 
  }
  
}

    unset($_SESSION['captcha_code']);

	$message = strval(str_replace(" ","",$error));
    $data = array(
     'messages'  => $message
    ); 
	echo json_encode($data);
	
?>

