<?php

//fetch_images.php

include('../../config/database.php');

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
  if(file_already_uploaded($file_name, $conn))
  {
   $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
  }
  $location = '../../assets/uploads/'.$_POST['pageType'].'/' . $file_name;
  if(move_uploaded_file($tmp_name, $location))
  {
   $query = "
   INSERT INTO gallery_temp_tbl (`image_name`,`page_id`,`date_time`, `page_type`) 
   VALUES ('".$file_name."','".$_POST['pages_max']."','".$datetime."','".$_POST['pageType']."')
   ";
   mysqli_query($conn, $query);
  }
 }
}

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


//var_dump($_POST['pageType']);
?>