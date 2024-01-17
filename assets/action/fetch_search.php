<?php
include("../../config/paths.php");
include("../../config/database.php");
/*$servername = "localhost";
$username = "root";
$password = "";
*/
global $today;
$today = date("Y-m-d");

	
	


if(isset($_POST["query"]))
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

 //$query = "SELECT * FROM products_tbl WHERE CONCAT(`product_name`,`product_brand`,`product_category`,`product_price`) LIKE '%".str_replace(" ","%",$_POST["query"])."%' ORDER BY `product_name` ASC";
 
 $query = "SELECT * FROM `products_tbl` WHERE CONCAT(`pro_name`,`pro_brand`,`pro_category`,`pro_brand`,`pro_unit_price`) LIKE '%".$_POST["query"]."%' ORDER BY id ASC LIMIT 50";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $total_row = $statement->rowCount();

 //$output = array();
 $output = ''; 
 $output = '<ul class="searchmenu list-unstyled">'; 
 if($total_row > 0)
 {
  foreach($result as $row)
  {
	if(!empty($row['product_image'])){
		$pro_image = $row['product_image'];
	}else{
		$pro_image = 'sample_image.jpg';	
	}
	
    $output .= '<li><div class="row"><div class="col-2 pr-0"><img src="'.URL.'assets/uploads/products/'.$pro_image.'" width="50px" style="width:50px;" /></div><div class="col-8 pl-0"><a href="'.URL.'single/product/'.$row['product_url'].'">'.$row['pro_name'].'</a><br><span class="font-weight-normal text-danger"> Rs '.$row['pro_unit_price'].'</span></div></div></li>'; 
  }
 }
 else
 {
  //$output['value'] = '';
  //$output['label'] = 'No Record Found';
  $output .= '<li>No Record Found</li>'; 
 }
 $output .= '</ul>'; 
 echo $output;
 //echo json_encode($output);
}




 

  //flush();


