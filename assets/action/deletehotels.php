<?php

//fetch_images.php

include('../../config/database.php');


if(isset($_GET["hotelId"],$_GET['page_type']))
{
	$selectSQL = "SELECT *,COUNT(id) AS pages_count FROM pages_tbl WHERE page_id = '".$_GET['hotelId']."' AND page_type = '".$_GET["page_type"]."'";
	$result = mysqli_query($conn, $selectSQL);
	$row = mysqli_fetch_assoc($result);	
	
	$pages_count = $row['pages_count'];
	//echo $selectSQL;
	
 if($pages_count == 1)
 {
	
  $selectSQL1 = "SELECT * FROM gallery_tbl WHERE page_id = '".$_GET["hotelId"]."' AND page_type = '".$_GET["page_type"]."'";
  $result1 = mysqli_query($conn, $selectSQL1);
  while($row1 = mysqli_fetch_assoc($result1)){
	  
	  $file_path = '../../assets/uploads/'.$_GET["page_type"].'/' . $row1["image_name"];
	  unlink($file_path);	  
	  //echo $row1["image_name"];
  }
	   
	  $deleteSQL1 = "DELETE FROM gallery_tbl WHERE page_id = '".$_GET["hotelId"]."' AND page_type = '".$_GET["page_type"]."'";
	  mysqli_query($conn, $deleteSQL1);	
	  //echo $deleteSQL1;
  

 	  $deleteSQL2 = "DELETE FROM pages_tbl WHERE page_id = '".$_GET['hotelId']."' AND page_type = '".$_GET["page_type"]."'";
	  mysqli_query($conn, $deleteSQL2);	 
	  $file_path2 = '../../assets/uploads/'.$_GET["page_type"].'/' . $row["feature_image"];
	  unlink($file_path2);
  
 }
 
 header('Location: ../../dashboard/'.$_GET["page_type"].'');
 
}


?>