<?php

//fetch_images.php

include('../../config/database.php');


if(isset($_POST["image_id"]))
{
 $file_path = '../../assets/uploads/hotels/' . $_POST["image_name"];
 if($_POST["image_name"])
 {
  $query = "DELETE FROM gallery_temp_tbl WHERE id = '".$_POST["image_id"]."'";
  mysqli_query($conn, $query);
  unlink($file_path);
 }
}
?>