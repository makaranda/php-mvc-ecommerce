<?php

//fetch_images.php
/*
include('../../config/database.php');
include('../../config/paths.php');

if(isset($_POST["image_id"]))
{
 $file_path = ''.URL.'assets/uploads/events/' . $_POST["image_name"];
 if($_POST["image_name"])
 {
  $query = "DELETE FROM gallery_tbl WHERE id = '".$_POST["image_id"]."'";
  mysqli_query($conn, $query);
  unlink($file_path);
 }
}
*/


include('../../config/database.php');


if(isset($_POST["image_id"]))
{
 $file_path = '../../assets/uploads/products/' . $_POST["image_name"];
 if(isset($_POST["image_name"]))
 {
  global $imgId;
  global $imgNo;
  
  $imgDetails = explode('/',$_POST["image_id"]);
  $imgId = $imgDetails[0];
  $imgNo = $imgDetails[1];
  //var_dump($imgDetails);
  //$updateQuery = "DELETE FROM gallery_temp_tbl WHERE id = '".$_POST["image_id"]."'";
  
  if($imgNo == '1'){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image1`='' WHERE `id` = '".$imgId."'";
	  mysqli_query($conn, $updateQuery);	  
  }
  if($imgNo == '2'){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image2`='' WHERE `id` = '".$imgId."'";
	  mysqli_query($conn, $updateQuery);	  
  }
  if($imgNo == '3'){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image3`='' WHERE `id` = '".$imgId."'";
	  mysqli_query($conn, $updateQuery);	  
  }
  if($imgNo == '4'){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image4`='' WHERE `id` = '".$imgId."'";
	  mysqli_query($conn, $updateQuery);	  
  }
  if($imgNo == '5'){
	  $updateQuery = "UPDATE `products_gallery_tbl` SET `product_image5`='' WHERE `id` = '".$imgId."'";
	  mysqli_query($conn, $updateQuery);	  
  }

 // unlink($file_path);
 }
}
?>