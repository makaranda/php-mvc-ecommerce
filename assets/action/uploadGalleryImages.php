<?php
session_start();
//fetch_images.php
global $error;
global $file_name;
global $tmp_name;
global $fileName;

include('../../config/database.php');
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
  //$fileName = str_replace('.'.$file_extension.'','',str_replace(' ','-',preg_replace('/[^\p{L}\p{N}\s]/u', ' ',strtolower($file_array[0]))));
  //$fileName = str_replace(' ','-',preg_replace('/[^\p{L}\p{N}\s]/u', ' ',strtolower($file_array[0]))).'.'.$file_extension2;
  $fileTempName = $_FILES['file']['tmp_name'][$count];
/*  if(file_already_uploaded($file_name, $conn))
  {
   $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
  }
*/
	$file_name = strtolower($file_name);   
	$file_name_new = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $file_array[0]);
	$file_name1 = str_replace(' ','-',$file_name_new);
    $file_name2 = strtolower($file_name1).'.'.$file_extension;
    $fileName = strtolower($file_name1);
	
    $location = '../../assets/uploads/products/' . $file_name2;
    $fileLocation = '../../assets/uploads/products/';
 

	//var_dump($_FILES['file']['tmp_name'][$count]);
	//$fileName = $_FILES['file']['tmp_name']; 
	//$sourceProperties = getimagesize($_FILES["file"]["name"][$count]);
	$sourceProperties = getimagesize($_FILES['file']['tmp_name'][$count]);
	//$sourceProperties = $_FILES['file']['tmp_name'][$count];
	$resizeFileName = time();
	//$uploadPath = "./uploads/";
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



/*	if($uploadImageType == 2){
		var_dump($uploadImageType);
		$resourceType = imagecreatefromjpeg($fileTempName); 	
		$resizeWidth = 600;
		$resizeHeight = 400;
		$imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
		imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $sourceImageWidth,$sourceImageHeight);	
		imagejpeg($imageLayer,$location);		
	}
	
*/
	

  //if(move_uploaded_file($tmp_name, $location)){
	  
  //if(move_uploaded_file($tmp_name, $location)){
	  
	//require_once("../../assets/php_image_magician.php");
	//require_once("../../assets/classPhpPsdReader.php");
  
		//var_dump($sourceProperties[2]);	
		
            //$magicianObj = new imageLib(''.$fileLocation.''.$file_name.'');
            
            //$magicianObj -> addWatermark('../../assets/uploads/watermark.jpg', 'br', 50);
            
            //$magicianObj -> saveImage(''.$fileLocation.''.$file_name.'');
			
	if(!isset($_SESSION['arrayImages']) || count($_SESSION['arrayImages']) < 10){
		
		
		$_SESSION['image_name'] = $fileName;
		if(isset($_SESSION['arrayImages'])){
			$is_available = 0;
			foreach($_SESSION["arrayImages"] as $keys => $values){
				if($_SESSION["arrayImages"][$keys]['image_name'] == $fileName){
					$is_available++;
					//$_SESSION["arrayImages"][$keys]['product_qty'] = $_SESSION["arrayImages"][$keys]['product_qty'] + $_POST['product_qty'];
				}
			}
			if($is_available == 0){
				$order_item_array = array(
				'image_name' => $fileName,
				'pageType' => 'products',
				'image_extension' => $file_extension
			
				);
			$_SESSION['arrayImages'][] = $order_item_array;				
			}
		}else{
			$order_item_array = array(
				'image_name' => $fileName,
				'pageType' => 'products',
				'image_extension' => $file_extension				
			);
			$_SESSION["arrayImages"][] = $order_item_array;	
			
		} 
		


			
	}else{
		$error = 'max';
	}		
   
 // }
 }
 
 echo $error;


/*	function file_already_uploaded($file_name, $conn)
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
/*	function resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight) {
		$resizeWidth = 600;
		$resizeHeight = 400;
		$imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
		imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $sourceImageWidth,$sourceImageHeight);
		return $imageLayer;
	}
*/
}
?>