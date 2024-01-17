				<!-- Mt Contact Banner of the Page -->
				<section class="mt-contact-banner style4" style="background-image: url(<?php echo URL;?>assets/images/img11.jpg);">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>RESPONSE PAGE</h1>
								<!-- Breadcrumbs of the Page -->
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="">Response Page</a></li>

									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
							</div>
						</div>
					</div>
				</section><!-- Mt Contact Banner of the Page end -->
<?php
	include('libs/connection.php');
echo 'cart session - ';	
var_dump($_SESSION['shopping_cart']);	
    $allURL = explode('/',$_GET['url']);
	if($allURL[0] == 'single'){
		$prourl = $allURL[2];
	}else{
		//echo '<script>window.location.href = "'.URL.'";</script>';
	}
echo '<br/>';
echo '<br/>';
//echo '<h1>Responsive Page</h1>';

$payment = base64_decode($_POST ["payment"]);
$signature = base64_decode($_POST ["signature"]);
$custom_fields = base64_decode($_POST ["custom_fields"]);
//load public key for signature matching
$publickey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC4d2DSOBDXSs5mgOPFcbkwmH4b
7LsAzQT43pWaiTnAqtAiWQCvhW3eurvy2aZxF2L4sdVlYg3mxrTIXaMxpufgCbyx
BAvaDfBw+ht4Ro2TvNrtF+JwSF+ploJhM8hNpcKOhB7iwsgWWZRCa5BW475SQPmo
bqUe1msjXO7CO3qoQQIDAQAB
-----END PUBLIC KEY-----";
openssl_public_decrypt($signature, $value, $publickey);

$signature_status = false;

echo 'POST payment variable '.$payment;
echo '<br>';
echo 'POST signature variable '.$signature;
echo '<br>';
echo 'POST custom_fields variable '.$custom_fields;
echo '<br>';
echo 'value variable '.$value;
echo '<br>';
echo 'payment variable '.$payment;
echo '<br>';

if($value == $payment){
	$signature_status = true ;
}

//get payment response in segments
//payment format: order_id|order_refference_number|date_time_transaction|payment_gateway_used|status_code|comment;
$responseVariables = explode('|', $payment);      

if($signature_status == true)
{
	//display values
	echo $signature_status;
	$custom_fields_varible = explode('|', $custom_fields);
	var_dump($custom_fields_varible);
	echo '<br/>';
	var_dump($responseVariables);
}else
{
	echo 'Error Validation'; 
}

echo '<br/>';
echo '<br/>';
?>
