<?php

//fetch_images.php

include('../../config/database.php');

$query = "SELECT * FROM gallery_temp_tbl ORDER BY id";
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
  while($row = mysqli_fetch_assoc($result)) 
 {
  $count ++; 
  $output .= '
  <tr>
   <td class="text-center">'.$count.'</td>
   <td><img src="../assets/uploads/'.$_POST['page_type'].'/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
   <td class="text-center"><button type="button" class="btn btn-danger btn-sm deleteHotelImage" id="'.$row["id"].'" data-image_name="'.$row["image_name"].'">Delete</button></td>
  </tr>
  ';
 }
}
$output .= '</table>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;

?>