<?php
session_start();
date_default_timezone_set("Asia/Colombo");
global $feature_image;
global $error;
global $file_name;
global $tmp_name;
global $fileName2;

	function resizefeatureImage($resourceType2,$image_width2,$image_height2) {
		$resizeWidth2 = 275;
		$resizeHeight2 = 285;
		$imageLayer2 = imagecreatetruecolor($resizeWidth2,$resizeHeight2);
		imagecopyresampled($imageLayer2,$resourceType2,0,0,0,0,$resizeWidth2,$resizeHeight2, $image_width2,$image_height2);
		return $imageLayer2;
	}
 sleep(3);	
if(isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != ""){
	

  $file_name2 = $_FILES["file"]["name"];
  $tmp_name2 = $_FILES["file"]['tmp_name'];
  $file_array2 = explode(".", $file_name2);
  $file_extension2 = end($file_array2);
  $file_name2 = $file_array2[0].''. rand() .'.'. $file_extension2;
  $fileName2 = str_replace('.'.$file_extension2.'','',$file_name2);
  $fileTempName2 = $_FILES['file']['tmp_name'];

	$file_name23 = strtolower($file_name2);   
	$file_name_new = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $file_array2[0]);
	$file_name2 = str_replace(' ','-',$file_name_new);
    $file_name2 = strtolower($file_name2).'.'.$file_extension2;
    
    
    $locations = '../../assets/uploads/products/' . $file_name2;
    $fileLocations = '../../assets/uploads/products/';
 
	$sourceProperties = getimagesize($_FILES['file']['tmp_name']);
	$resizefileName2 = time();
	$fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
	$uploadImageType2 = $sourceProperties[2];
	$sourceImageWidth2 = $sourceProperties[0];
	$sourceImageHeight2 = $sourceProperties[1];
	
	echo $fileTempName2;

	switch ($uploadImageType2) {
		case IMAGETYPE_JPEG:
			$resourceType2 = imagecreatefromjpeg($fileTempName2); 
			$imageLayer2 = resizefeatureImage($resourceType2,$sourceImageWidth2,$sourceImageHeight2);
			imagejpeg($imageLayer2,$locations);
			break;

		case IMAGETYPE_GIF:
			$resourceType2 = imagecreatefromgif($fileTempName2); 
			$imageLayer2 = resizefeatureImage($resourceType2,$sourceImageWidth2,$sourceImageHeight2);
			imagegif($imageLayer2,$locations);
			break;

		case IMAGETYPE_PNG:
			$resourceType2 = imagecreatefrompng($fileTempName2); 
			$imageLayer2 = resizefeatureImage($resourceType2,$sourceImageWidth2,$sourceImageHeight2);
			imagepng($imageLayer2,$locations);
			break;

		default:
			$imageProcess = 0;
			break;
	}	
	


$_SESSION['feature_image'] = $file_name2;
//$feature_image = ''.$file_name2.'';

}

?>