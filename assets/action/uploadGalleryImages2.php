<?php
session_start();
//fetch_images.php

include('../../config/database.php');
include('../../config/paths.php');

	function resizeImage($resourceType,$image_width,$image_height) {
		$resizeWidth = 800;
		$resizeHeight = 800;
		$imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
		imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
		return $imageLayer;
	}
//$query = "SELECT * FROM gallery_tbl ORDER BY id";
//$result = mysqli_query($conn, $query);

$datetime = date('Y-m-d H:i:s');

if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
	 
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  $file_name = $file_array[0].''. rand() .'.'. $file_extension;
  $fileName = str_replace('.'.$file_extension.'','',$file_name);
  $fileTempName = $_FILES['file']['tmp_name'][$count];

  $location = '../../assets/uploads/products/' . $file_name;
  $fileLocation = '../../assets/uploads/products/';
 
	$sourceProperties = getimagesize($_FILES['file']['tmp_name'][$count]);
	$resizeFileName = time();
	$fileExt = pathinfo($_FILES["file"]["name"][$count], PATHINFO_EXTENSION);
	$uploadImageType = $sourceProperties[2];
	$sourceImageWidth = $sourceProperties[0];
	$sourceImageHeight = $sourceProperties[1];
	
	

	switch ($uploadImageType) {
		case IMAGETYPE_JPEG:
			$resourceType = imagecreatefromjpeg($fileTempName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagejpeg($imageLayer,$location);
			break;

		case IMAGETYPE_GIF:
			$resourceType = imagecreatefromgif($fileTempName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagegif($imageLayer,$location);
			break;

		case IMAGETYPE_PNG:
			$resourceType = imagecreatefrompng($fileTempName); 
			$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
			imagepng($imageLayer,$location);
			break;

		default:
			$imageProcess = 0;
			break;
	}
    $productCode = $_POST['page_id'];	
	$sql = "SELECT * FROM `products_gallery_tbl` WHERE `product_code` = '".$productCode."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
 
 	if(isset($row['product_image1']) && $row['product_image1'] == ''){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image1`='".$file_name."' WHERE `product_code` = '".$productCode."'";
	  mysqli_query($conn, $updateQuery);
	  $file_name = '';	
	}
 
 	if(isset($row['product_image2']) && $row['product_image2'] == ''){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image2`='".$file_name."' WHERE `product_code` = '".$productCode."'";
	  mysqli_query($conn, $updateQuery);	
	  $file_name = '';	  
	}
 
 	if(isset($row['product_image3']) && $row['product_image3'] == ''){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image3`='".$file_name."' WHERE `product_code` = '".$productCode."'";
	  mysqli_query($conn, $updateQuery);
	  $file_name = '';	  
	}
 
 	if(isset($row['product_image4']) && $row['product_image4'] == ''){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image4`='".$file_name."' WHERE `product_code` = '".$productCode."'";
	  mysqli_query($conn, $updateQuery);
	  $file_name = '';	  
	}
 
 	if(isset($row['product_image5']) && $row['product_image5'] == ''){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image5`='".$file_name."' WHERE `product_code` = '".$productCode."'";
	  mysqli_query($conn, $updateQuery);	
	  $file_name = '';	  
	}			
  
 //echo $file_name[1];
 }

 
}
/*
function file_already_uploaded($file_name, $conn)
{
 
 $query2 = "SELECT * FROM gallery_tbl WHERE image_name = '".$file_name."' AND `page_type` = '".$_POST['pageType']."'";
 $result2 = mysqli_query($conn, $query2);
 if(mysqli_num_rows($result2) > 0 && mysqli_num_rows($result2) < 10)
 {
  return true;
 }
 else
 {
  return false;
 }
}
*/

//var_dump($_POST['pageType']);
?>