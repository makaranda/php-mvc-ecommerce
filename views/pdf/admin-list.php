<?php
global $connect;


function fetch_customer_data($connect)
{
include_once('../../configuration.php');

global $sliderImg1;
global $output;

$selectSQL2 = "SELECT * FROM admin_reg_tbl";
$result2 = mysqli_query($conn, $selectSQL2);



//$sliderImg1 = $row2['slider_img_name'];	
	/*$query = "SELECT * FROM personal_tbl";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$header_logo
	*/
	
	$output = '<table class="table" style="">
    <tbody>
        <tr class="headerColorMain" style="background-color: #fff !important;">
          <td style="width:30%;">
			  <h1 style="font-size:30px !important;">'.$header_text.'</h1>
			  <h4 style="text-align:left !important;font-weight:">Admin List</h4>
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
					  <th scope="col">Name</th>
					  <th scope="col">NIC</th>
					  <th scope="col">Mobile</th>
					  <th scope="col">Gender</th>
					  <th scope="col">Address</th>
					</tr>
				  </thead>';
	$output .= '<tbody>';	
  	
while($row2 = mysqli_fetch_assoc($result2)){
	$first_name = $row2['first_name'];
	$nic = $row2['nic'];
	$mobile = $row2['mobile'];
	$gender = $row2['gender'];
	$address = $row2['address'];
	$output .= '<tr>
					<th scope="row">'.$first_name.'</th>
					  <td>'.$nic.'</td>
					  <td>'.$mobile.'</td>
					  <td>'.$gender.'</td>
					  <td>'.$address.'</td>
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
	$pdf->setPaper("A4", 'portrait');	
	$pdf->render();	
	//$file = $pdf->output(); 1122-252 = 870
//echo $html_code;
	$pdf->stream("bestproperty.lk_admin_list.pdf", array("Attachment" => 0));
	//$pdf->stream('document.pdf');




?>