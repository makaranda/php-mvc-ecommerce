<?php
require('fpdf.php');
include "api/NotORM.php";
include "../../configuration.php";
date_default_timezone_set('Asia/Colombo');
global $orderNo;

	$_GET['date'] = '2019-12-13';



$pdo = new PDO("mysql:host=$servername;dbname=$database","$username","$password");
$db = new NotORM($pdo);
//$datas = $db->orders_sub_tbl();
/*$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();*/
$datas = $db->users_tbl()
    ->select("*")
	->where("user_role", "user")
;
/*
$datas = $db->orders_tbl()
    ->select("id, ord_customer_no, ord_pro_cost_total, ord_pro_qty, ord_pro_total, ord_profit,ord_date ,payment_method")
    ->where("ord_date LIKE ?", "$getmonth%")	
;
*/


$html = '<p></p>';

class PDF extends FPDF
{
	
function Header()
{
	global $title;
	$w = $this->GetStringWidth($title)+6;	
	$this->SetX((210-$w)/2);
    $this->Image('logo.jpg',15,6,20);
    $this->SetFont('Times','B',15);
	$this->SetLineWidth(1);
	$this->SetTextColor(0,68,99);
    //$this->Cell(70);
    $this->Cell($w,10,$title,30,30,'C');
    $this->Ln(20);
}

function LoadData($file)
{
	
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
	
}

function Chapter($num,$label)
{
	
global $today;
$orderNo = '1000';
$today = date('Y-m-d');
	$this->SetFont('Times','B',12);
	$this->SetFillColor(255,255,255);
	$this->SetTextColor(0,0,0);	
	//$this->Cell(0,8,"Order Number: $orderNo",0,2,'L',true);	
	
	$this->SetFont('Times','B',12);
	$this->SetFillColor(0,68,99);
	$this->SetTextColor(255,255,255);
	//$this->Cell(0,8,"Daily Report Table $num : $label",0,1,'L',true);
	$this->Cell(0,8,"User Report",0,0,'L',true);
	$this->Cell(0,8," $today",0,1,'R',true);
	$this->Ln(4);
}	

function Mybody($file,$type,$datas)
{	
	
	if($type=='database'){
		//$this->SetFillColor(0,0,0);
		//$this->SetTextColor(0,0,0);	
		//$this->SetDrawColor(128,0,0);
		//$this->SetLineWidth(.3);
		$this->SetFillColor(0,68,99);		
		$this->SetTextColor(255,255,255);		
		$this->SetFont('Times','',12);
		
		$this->Cell(30,7,'User id',1,0,'C',1);
		$this->Cell(30,7,'User Name',1,0,'C',1);
		$this->Cell(30,7,'User Nic',1,0,'C',1);		
		$this->Cell(30,7,'User Mobile',1,0,'C',1);
		$this->Cell(70,7,'User Email',1,0,'C',1);
		//$this->Cell(30,7,'Total',1,0,'C',1);		
		
		$this->Ln();
		$this->SetFont('Times','',12);
		//$this->SetFillColor(0,0,0);
		$this->SetTextColor(0,0,0);	
		
	
	
		//$x = 1;
		$prototal = 0;
		$costtotal = 0;
		$qtytotal = 0;
		$profittotal = 0;

		
		foreach ($datas as $row) {
			
			//$x ++;
			$proName = substr($row['user_name'],0,20);
			$this->Cell(30,7,$row['user_id'],1,0,'C');
			$this->Cell(30,7,$proName,1,0,'C');
			$this->Cell(30,7,$row['user_nic'],1,0,'C');				
			$this->Cell(30,7,$row['user_contact'],1,0,'C');
			$this->Cell(70,7,$row['user_email'],1,0,'C');					
			//$this->Cell(30,7,$row['pro_total'],1,0,'C');
			$this->SetFillColor(0,0,0);		
			$this->SetTextColor(0,0,0);
		
			$this->Ln();
				
			
		}
		//$this->Cell(array_sum($x),0,'','T');
		$this->SetFillColor(0,68,99);		
		$this->SetTextColor(255,255,255);		
		$this->Cell(190,7,'****************',1,0,'C',1);
		//$this->Cell(30,7,$costtotal,1,0,'C',1);		
		
		
		$this->Ln();
		$this->SetFont('Times','',12);
		//$this->SetFillColor(0,0,0);
		//$this->SetTextColor(0,0,0);		
		
	}
	
}	

function Layout($num,$lable,$file,$type,$datas)
{
	$this->AddPage();
	$this->Chapter($num,$lable);
	$this->Mybody($file,$type,$datas);	
}

function Footer()
{
	$this->SetX(-15);
	$this->SetY(-15);
	$this->SetFont('Times','B',10);
	$this->SetFillColor(0,0,0);
	$this->SetTextColor(0,0,0);
	//$this->Cell(0,8,"Chapter",0,1,'L',true);
	$this->Cell(0,10,'Nawodaya pvt Ltd',0,0,'L');
	$this->Ln(4);
	$this->Cell(0,10,'No 140/1/1, Colombo Road, Galle, Sri Lanka.   Tel: (+94) 11 1234567 / 0711144477',0,0,'L');
	$this->Ln();
	
	//$pdf->WriteHTML($html);
	
    $this->SetY(-15);
    $this->SetFont('Times','',12);
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'R');
	$this->SetTextColor(0,0,0);
	//$this->SetFillColor(0,68,99);
	
	$this->SetFont('Times','B',12);
	//$this->SetFillColor(0,68,99);	
	$this->Cell(0,8,"",0,1,'L',true);	
	$this->Ln(4);	
}

}

$pdf = new PDF();
$title = 'Nawodaya';
$pdf->SetTitle($title);
$pdf->SetAuthor('Nawodaya IT Dep');
//$pdf->Layout(1,'text 1','files/20k_c1.txt','file','');
//$pdf->Layout(2,'text 2','files/20k_c2.txt','file','');

//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
//$data = $pdf->LoadData('countries.txt');
//$pdf->Layout(3,'text 3',$data,'csv',$header);
$pdf->Layout(1,'Stock Report','','database',$datas);

$pdf->Output('I',$title.'.pdf',true);
//$pdf->Output();
//$pdf->AliasNbPages();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);

?>