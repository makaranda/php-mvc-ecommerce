<?php
global $connect;


function fetch_customer_data($connect)
{
include_once('../../configuration.php');

global $sliderImg1;
global $output;

$selectSQL2 = "SELECT * FROM advertisements_tbl";
$result2 = mysqli_query($conn, $selectSQL2);



//$sliderImg1 = $row2['slider_img_name'];	
	/*$query = "SELECT * FROM personal_tbl";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();*/
	
	$output = '<table class="table" style="">
    <tbody>
        <tr class="headerColorMain" style="background-color: #fff !important;">
          <td style="width:30%;">
			  <h1 style="font-size:30px !important;">'.$header_text.'</h1>
			  <h4 style="text-align:left !important;font-weight:">Advertiesments List</h4>
		  </td>
          <td style="width:30%;">
			  
		  </td> 
          <td style="width:40%;">
			<h4>'.$company_address.'</h4>
			<h4>'.$company_phone.'</h4>
			<h4>'.$company_email.'</h4>
		  </td>
        </tr>
	</tbody>
	</table>	
		';
		
	$output .= '<div class="container-fluid">
		  <div class="table-responsive">
		  <table class="table table-striped table-hover" style="">';
	
	$output .= '  <thead class="text-white" style="background-color: indigo !important;">
					<tr>
					  <th scope="col">Ads Id</th>
					  <th scope="col">User Id</th>
					  <th scope="col">Rent / Sale</th>
					  <th scope="col">Ads Type</th>
					  <th scope="col">Contact Mobile</th>
					  <th scope="col">Availability</th>
					  <th scope="col">Postered Date</th>
					</tr>
				  </thead>';
	$output .= '<tbody>';	
  	
while($row2 = mysqli_fetch_assoc($result2)){
	$user_id = $row2['user_id'];
	$id = $row2['id'];
	$industry_type = $row2['industry_type'];
	$contact_mobile = $row2['contact_mobile'];
	$advertisement_type = $row2['advertisement_type'];
	$availability = $row2['availability'];
	$posted_date = $row2['posted_date'];
	$output .= '<tr>
					<th scope="row">'.$id.'</th>
					  <td>'.$user_id.'</td>
					  <td>'.$industry_type.'</td>
					  <td>'.$advertisement_type.'</td>
					  <td>'.$contact_mobile.'</td>
					  <td>'.$availability.'</td>
					  <td>'.substr($posted_date,0,10).'</td>
					</tr>';	
}

$output .= '</tbody>';
  
 $output .= '</table>
			</div>	
		</div>'; 
//$output = $websiteurl;

	return $output;
}


	include('pdf.php');
	//$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">';	
	$html_code .= '<title>Find the latest properties in Sri Lanka | bestproperty.lk</title>';
	$html_code .= '<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@600&display=swap" rel="stylesheet">';
	$html_code .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
	$html_code .= '<link rel="stylesheet" href="mystyle.css">';	
	$html_code .= '<link href="../img/favicon.png" rel="icon">';
	$html_code .= fetch_customer_data($connect);	
	//$html_code .= fetch_customer_data2($connect2);
	
	
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->setPaper("A4", 'landscape');	
	$pdf->render();	
	//$file = $pdf->output(); 1122-252 = 870

	$pdf->stream("bestproperty.lk_advertisements_list.pdf", array("Attachment" => 0));
	//$pdf->stream('document.pdf');




?>