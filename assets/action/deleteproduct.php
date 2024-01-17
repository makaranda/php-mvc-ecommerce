<?php

//fetch_images.php

include('../../config/database.php');


if(isset($_GET["proId"],$_GET['page_type']))
{
	$selectSQL = "SELECT *,COUNT(id) AS pages_count FROM products_tbl WHERE product_code = '".$_GET['proId']."'";
	$result = mysqli_query($conn, $selectSQL);
	$row = mysqli_fetch_assoc($result);	
	
	$pages_count = $row['pages_count'];
	//echo $selectSQL;
	
 if($pages_count == 1)
 {
	
  $selectSQL1 = "SELECT * FROM products_gallery_tbl WHERE product_code = '".$_GET["proId"]."'";
  $result1 = mysqli_query($conn, $selectSQL1);
  $row1 = mysqli_fetch_assoc($result1);
	  
	  $file_path = '../../assets/uploads/products/' . $row1["product_image1"];
	  unlink($file_path);	  
	  $file_path2 = '../../assets/uploads/products/' . $row1["product_image2"];
	  unlink($file_path2);
	  $file_path3 = '../../assets/uploads/products/' . $row1["product_image3"];
	  unlink($file_path3);
	  $file_path4 = '../../assets/uploads/products/' . $row1["product_image4"];
	  unlink($file_path4);
	  $file_path5 = '../../assets/uploads/products/' . $row1["product_image5"];
	  unlink($file_path5);

  
	   
	  $deleteSQL1 = "DELETE FROM products_gallery_tbl WHERE product_code = '".$_GET["proId"]."'";
	  mysqli_query($conn, $deleteSQL1);	
	  //echo $deleteSQL1;
  

 	  $deleteSQL2 = "DELETE FROM products_tbl WHERE product_code = '".$_GET['proId']."'";
	  mysqli_query($conn, $deleteSQL2);	 
	  $file_path6 = '../../assets/uploads/products/' . $row["feature_image"];
	  unlink($file_path6);
  
 }
 
     header('Location: ../../dashboard/products');
 
}


?>