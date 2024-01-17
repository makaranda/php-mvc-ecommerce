<?php
session_start();
//fetch_images.php

include('../../config/database.php');
include('../../config/paths.php');

$query = "SELECT * FROM gallery_temp_tbl ORDER BY id";
$result = mysqli_query($conn, $query);


$output = '<div class="row">';
$output = '<div class="col-12 mb-4">';
$output = '<div class="table-responsive">';
$output .= '
 <table class="table table-sm table-bordered table-striped">
  <tr class="bg-primary text-white text-center">
   <th>No</th>
   <th>Image</th>
   <th>Action</th>
  </tr>
';
$count = 0;
if(!empty($_SESSION["arrayImages"])){
	
	foreach($_SESSION["arrayImages"] as $keys => $values){
  $count ++; 
  $output .= '
  <tr>
   <td class="text-center">'.$count.'</td>
   <td><img src="'.URL.'assets/uploads/'.$values["pageType"].'/'.$values["image_name"].'.'.$values["image_extension"].'" class="img-thumbnail" width="100" height="100" /></td>
   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteImage" id="'.$values["image_name"].'" data-image_name="'.$values["image_name"].'">Delete</button></td>
  </tr>
  ';
 }
}
$output .= '</table>';
$output .= '</div>';
$output .= '</div>';
if(isset($_SESSION["arrayImages"])){$output .= '<div class="col-12 mb-5"><button type="button" id="emptyImages" class="btn btn-sm btn-primary float-right">Clear All</button></div>';}
$output .= '<div class="col-12 mb-5"><hr></div>';
$output .= '</div>';

echo $output;

?>