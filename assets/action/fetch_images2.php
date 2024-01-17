<?php

//fetch_images.php

include('../../config/database.php');
include('../../config/paths.php');

$query = "SELECT * FROM products_gallery_tbl WHERE `product_code` = '".$_POST['page_id']."' ORDER BY id";
$result = mysqli_query($conn, $query);


$output = '<div class="row">';
$output = '<div class="col-12">';
$output = '<div class="table-responsive">';
$output .= '
 <table class="table table-sm table-bordered table-striped">
  <tr class="bg-primary text-white text-center">
   <th>No</th>
   <th>Image</th>
   <th>Delete</th>
  </tr>
';
$count = 0;
if(mysqli_num_rows($result) > 0)
{
  $row = mysqli_fetch_assoc($result); 
 
  
  if(isset($row["product_image1"]) && $row["product_image1"] != ''){
	  $count = 1;  
	  $output .= '
	  <tr>
	   <td class="text-center">'.$count.'</td>
	   <td><img src="'.URL.'assets/uploads/products/'.$row["product_image1"].'" class="img-thumbnail" width="100" height="100" /></td>
	   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteEventImage2" id="'.$row["id"].'/1" data-image_name="'.$row["product_image1"].'">Delete</button></td>
	  </tr>
	  ';
  }
  if(isset($row["product_image2"]) && $row["product_image2"] != ''){
	  $count = $count + 1;		 
	  $output .= '
	  <tr>
	   <td class="text-center">'.$count.'</td>
	   <td><img src="'.URL.'assets/uploads/products/'.$row["product_image2"].'" class="img-thumbnail" width="100" height="100" /></td>
	   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteEventImage2" id="'.$row["id"].'/2" data-image_name="'.$row["product_image2"].'">Delete</button></td>
	  </tr>
	  ';
  } 
  if(isset($row["product_image3"]) && $row["product_image3"] != ''){
	  $count = $count + 1;		 
	  $output .= '
	  <tr>
	   <td class="text-center">'.$count.'</td>
	   <td><img src="'.URL.'assets/uploads/products/'.$row["product_image3"].'" class="img-thumbnail" width="100" height="100" /></td>
	   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteEventImage2" id="'.$row["id"].'/3" data-image_name="'.$row["product_image3"].'">Delete</button></td>
	  </tr>
	  ';
  } 
  if(isset($row["product_image4"]) && $row["product_image4"] != ''){
	  $count = $count + 1;		 
	  $output .= '
	  <tr>
	   <td class="text-center">'.$count.'</td>
	   <td><img src="'.URL.'assets/uploads/products/'.$row["product_image4"].'" class="img-thumbnail" width="100" height="100" /></td>
	   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteEventImage2" id="'.$row["id"].'/4" data-image_name="'.$row["product_image4"].'">Delete</button></td>
	  </tr>
	  ';
  } 
  if(isset($row["product_image5"]) && $row["product_image5"] != ''){
	  $count = $count + 1;		 
	  $output .= '
	  <tr>
	   <td class="text-center">'.$count.'</td>
	   <td><img src="'.URL.'assets/uploads/products/'.$row["product_image5"].'" class="img-thumbnail" width="100" height="100" /></td>
	   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteEventImage2" id="'.$row["id"].'/5" data-image_name="'.$row["product_image5"].'">Delete</button></td>
	  </tr>
	  ';
  }  
 
}
$output .= '</table>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
//var_dump($_POST);
?>