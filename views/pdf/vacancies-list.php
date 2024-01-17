<?php
global $connect;






function fetch_customer_data($connect)
{
include_once('../../configuration.php');

global $sliderImg1;
global $output;

$selectSQL2 = "SELECT * FROM companies_ads_tbl INNER JOIN companies_tbl ON companies_ads_tbl.company_id=companies_tbl.company_id";
$result2 = mysqli_query($conn, $selectSQL2);



//$sliderImg1 = $row2['slider_img_name'];	
	/*$query = "SELECT * FROM personal_tbl";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();*/
	
	$output = '<table class="table" style="">
    <tbody>
        <tr class="headerColorMain" style="background-color: #fff !important;">
          <td style="width:20%;"><img src="../../img/'.$header_logo.'" class="profilePic" style="width:80px !important;"/></td>
          <td style="width:40%;">
			<h1 style="font-size:22px !important;">Freshjobs.lk</h1>
			<h4>Vacancies List</h4>
		  </td>
 
          <td style="width:40%;">
			<h4>Post Box 07, Galle, Sri Lanka</h4>
			<h4>94 71 6969 606</h4>
			<h4>info@freshjobs.lk</h4>
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
					  <th scope="col">Com Id</th>
					  <th scope="col">Com Name</th>
					  <th scope="col">Job Name</th>
					  <th scope="col">Email</th>
					  <th scope="col">Contact</th>
					  <th scope="col">Salary</th>
					</tr>
				  </thead>';
	$output .= '<tbody>';	
  	
while($row2 = mysqli_fetch_assoc($result2)){
	$company_id = $row2['company_id'];
	$company_name = $row2['company_name'];
	$job_name = $row2['job_name'];
	$job_email = $row2['job_email'];
	$job_contact = $row2['job_contact'];
	$job_salary = $row2['job_salary'];
	$output .= '<tr>
					<th scope="row">'.$company_id.'</th>
					  <td>'.$company_name.'</td>
					  <td>'.$job_name.'</td>
					  <td>'.$job_email.'</td>
					  <td>'.$job_contact.'</td>
					  <td>'.$job_salary.'</td>
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
	$html_code .= '<title>Find the latest job vacancies in Sri Lanka | Freshjobs.lk</title>';
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

	$pdf->stream("freshjobs.lk_users_list.pdf", array("Attachment" => 0));
	//$pdf->stream('document.pdf');




?>