<?php
//global $connect;

//include('libs/connection.php');

global $sliderImg1;
global $output;

//$selectSQL2 = "SELECT * FROM users_tbl";
//$result2 = mysqli_query($conn, $selectSQL2);



//$sliderImg1 = $row2['slider_img_name'];	
	/*$query = "SELECT * FROM personal_tbl";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();*/
	
	$output = '<table class="table" style="">
    <tbody>
        <tr class="headerColorMain" style="background-color: #fff !important;">
          <td style="width:30%;">
			  <h1 style="font-size:30px !important;"></h1>
			  <h4 style="text-align:left !important;font-weight:">Users List</h4>
		  </td>
          <td style="width:30%;">
			  
		  </td> 
          <td style="width:40%;">
			<h4></h4>
			<h4></h4>
			<h4></h4>
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
					  <th scope="col">Id</th>
					  <th scope="col">User Name</th>
					  <th scope="col">User Email</th>
					  <th scope="col">User Phone</th>
					  <th scope="col">User NIC</th>
					  <th scope="col">Entered Date</th>
					</tr>
				  </thead>';
	$output .= '<tbody>';	
/*  	
while($row2 = mysqli_fetch_assoc($result2)){
	$id = $row2['id'];
	$user_name = 'Name';
	$output .= '<tr>
					<th scope="row">'.$id.'</th>
					  <td>'.$user_name.'</td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					</tr>';	
}
*/
$output .= '</tbody>';
  
$output .= '</table>
			</div>	
		</div>'; 
//$output = $websiteurl;


	//include('assets/genaratepdf/detailspdf.php');
	//$file_name = md5(rand()) . '.pdf';
/*	$html_code = '<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">';	
	$html_code .= '<title>Find the latest properties in Sri Lanka | bestproperty.lk</title>';
	$html_code .= '<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@600&display=swap" rel="stylesheet">';
	$html_code .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
	$html_code .= '<link rel="stylesheet" href="mystyle.css">';	
	//$html_code .= '<link href="../img/favicon.png" rel="icon">';
	$html_code .= $output;	
	//$html_code .= fetch_customer_data2($connect2);*/
/*if ( headers_sent()) {
  die("Unable to stream pdf: headers already sent");
}	
	*/
/*	$pdf = new Pdf();
	$pdf->load_html($output);
	$pdf->setPaper("A4", 'portrait');	// portrait | landscape
	$pdf->render();	
	//$file = $pdf->output(); 1122-252 = 870

	$pdf->stream("bestproperty.lk_users_list.pdf", array("Attachment" => 1));
	//$pdf->stream('document.pdf');
    //$outputs = $dompdf->output();
    //file_put_contents('Brochure.pdf', $outputs);
/*
$html =
      '<html><body>'.
      '<p>Put your html here, or generate it with your favourite '.
      'templating system.</p>'.
      '</body></html>';
*/
/*    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents('Brochure.pdf', $output);
*/
$dompdf = new Pdf();
$dompdf->load_html('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->set_paper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
//$output2 = $dompdf->output();
//file_put_contents('Brochure.pdf', $output2);
// Output the generated PDF to Browser
$dompdf->stream('document.pdf');
?>