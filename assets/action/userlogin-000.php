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

sleep(5);

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
 
$user_name = $_POST['user_name'];
$user_password = md5($_POST['user_password']);
//$actualUrl = $_POST['actualUrl'];
 
 $sql = "SELECT * FROM users_tbl WHERE email_address = '$user_name' AND user_password = '$user_password'";
 $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);
      $user_id = $row['user_id'];
      $user_first_name = $row['user_first_name'];
      $user_last_name = $row['user_last_name'];
      
      //echo 'This User is registered....!!'; 
      $error = 'Reg';
			$_SESSION['loggedInUser'] = true;
			$_SESSION['user_name'] = $_POST['user_name'];
			$_SESSION['user_password'] = $_POST['user_password'];
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_real_name'] = $user_first_name;
			
			//header('location: '.URL.'my_account');
		    
      
      
    } else {
      //echo 'This User is Not registered....!!';
	  $error = 'Not';
    }
    
    //var_dump($_POST);
    echo $error;

}	
	
?>

