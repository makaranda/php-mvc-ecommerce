<?php
include("../../config/paths.php");
include("../../config/database.php");
/*$servername = "localhost";
$username = "root";
$password = "";
*/
global $today;
$today = date("Y-m-d");

//sleep(5);

if(isset($_POST["email"]))
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
 

 $query = "SELECT * FROM users_tbl WHERE email_address = '".trim($_POST["email"])."'";

 $statement = $connect->prepare($query);

 $statement->execute();

 $total_row = $statement->rowCount();

 if($total_row == 0)
 {
  $output = array(
   'success' => true
  );

  echo json_encode($output);
 }
}
?>

