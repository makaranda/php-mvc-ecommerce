<?php
session_start();
include("../../config/paths.php");
include("../../config/database.php");
global $total_price2;

$total_price = 0;
$total_item = 0;
$total_price2 = 0;
$totalShipCharge = 0;
$deliveryTime = '';

$output = '';
$output3 = '';
if(!empty($_SESSION["shopping_cart"]))
{

 if(isset($_POST['province'],$_POST['district']) && $_POST['province'] != '' && $_POST['district'] != ''){
	$province = $_POST['province'];
	$district = $_POST['district'];	 
	
	 $proSQL = "SELECT * FROM `post_province` WHERE `id` = $province";
	 $resultPro = mysqli_query($conn, $proSQL);
	 $rowPro = mysqli_fetch_assoc($resultPro);	
	 
	 $provinceName = $rowPro['post_province_name'];
	 
	 $citySQL = "SELECT * FROM `post_districs` WHERE `id` = $district AND `province_id` = $province";
	 $resultCity = mysqli_query($conn, $citySQL);
	 $rowCity = mysqli_fetch_assoc($resultCity);	
	 
	 $cityName = $rowCity['district_name'];	
 }else{
	$province = '';
	$district = '';
	$provinceName = '';
	$cityName = '';
	$totalShipCharge = 0;
 }
 setcookie('fanz_shopping_cart', serialize($_SESSION["shopping_cart"]), time()+3600);

 $count = 0;	
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
 
	$total_item = $total_item + 1;
	$total_price = $total_price + ($values['product_quantity'] * $values['product_price']);
	$total_price2 = $total_price2 + ($values['product_quantity'] * $values['product_price']);
	$product_quantity = $values["product_quantity"];
	$count++;
	
	$product_id2 = $values["product_id"];
    $selectSQL2 = "SELECT * FROM `products_tbl` WHERE `product_code` = '$product_id2'";
    $result2 = mysqli_query($conn, $selectSQL2);
    $row2 = mysqli_fetch_assoc($result2);		
		
	$product_code2 = $row2['product_code'];
	$product_name2 = $row2['product_name'];
	$product_price2 = $row2['product_price'];
	$product_qty2 = $row2['product_qty'];
	
	if($count <= 3){
		
	$product_id = $values["product_id"];
    $selectSQL = "SELECT * FROM `products_tbl` WHERE `product_code` = '$product_id'";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);		
		
	$product_code = $row['product_code'];
	$product_name = $row['product_name'];
	$product_price = $row['product_price'];
	$product_qty = $row['product_qty'];
	$is_discount = $row['is_discount'];
	$discount_rate = $row['discount_rate'];
	$product_image = $row['product_image'];
	$product_description = $row['product_description'];
	$product_brand = $row['product_brand'];
	$product_category = $row['product_category'];
	$product_inches = $row['product_inches'];
	$product_type = $row['product_type'];
	$display_type = $row['display_type'];
	$sell_type = $row['sell_type'];	   
		 
	if(isset($province,$district) && $province != '' && $district != '') {
		if(isset($product_category) && $product_category != 'Ceiling Fans'){
			if(isset($product_inches) && $product_inches > '16'){
				$shipSQL1 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip1 = mysqli_query($conn, $shipSQL1);
				$rowShip1 = mysqli_fetch_assoc($resultShip1);	
				$totalShipCharge1 = $rowShip1['16_inches'];	
				$totalShipCharge = $totalShipCharge + $totalShipCharge1;
			}else{
				$shipSQL2 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip2 = mysqli_query($conn, $shipSQL2);
				$rowShip2 = mysqli_fetch_assoc($resultShip2);	
				$totalShipCharge2 = $rowShip2['16_inches'];	
				$totalShipCharge = $totalShipCharge + $totalShipCharge2;
			}
			
		}else{
				$shipSQL3 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip3 = mysqli_query($conn, $shipSQL3);
				$rowShip3 = mysqli_fetch_assoc($resultShip3);	
				$totalShipCharge3 = $rowShip3['18_up_inches'];
				$totalShipCharge = $totalShipCharge + $totalShipCharge3;			
		} 

				$shipSQL4 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip4 = mysqli_query($conn, $shipSQL4);
				$rowShip4 = mysqli_fetch_assoc($resultShip4); 
			
				$deliveryTime = $rowShip4['delivery_time'];
				$totalAmount =  round($total_price2);
	}else{
		$totalAmount =  round($total_price2);
	}

 $output .= '
		<div class="cart-row">
			<a href="#" class="img"><img src="'.URL.'assets/uploads/products/'.$product_image.'" alt="'.$product_name.'" class="img-responsive"></a>
			<div class="mt-h">
				<span class="mt-h-title"><a href="#">'.$product_name.'</a></span>
				<span class="price"><i class="fa fa-eur d-none" aria-hidden="true"></i>Rs '.$product_price.'</span>
				<span class="mt-h-title">Qty: '.$product_quantity.'</span>
			</div>
			<button type="button" id="'.$product_code.'" class="close fa fa-times delete"></button>
		</div>';
		
	}

  $output3	.= '<tr class="text-left"><th scope="row">'.$count.'</th>
				<td class="text-left">'.$product_name2.'</td>
				<td class="text-left">'.$product_price2.'</td></tr>';	
 }
$output .= '<div class="cart-row-total">
		<span class="mt-total">Sub Total</span>
		<span class="mt-total-txt"><i class="fa fa-eur d-none" aria-hidden="true"></i>Rs '.number_format($total_price2, 2).'</span>
	</div>
 ';
$output .= '<div class="cart-btn-row text-center">
		<a href="'.URL.'cart" class="btn-type2">VIEW CART</a>
		<a href="'.URL.'checkout" class="btn-type3">CHECKOUT</a>
	</div>';
$output .= '<div class="cart-btn-row text-center">
		<button type="button" class="btn-type2" id="clear_cart">Empty Cart</button>
	</div>'; 
 
}else{
$totalAmount = '';	
$output .= '<div class="row cart-btn-row text-center pt-0 border-top-0">
		<div class="col-12 text-center"><img src="'.URL.'assets/images/logo_v2.png" alt="schon" class="headerLogo text-center" align="center" width="100"></div>
		<a href="'.URL.'products" class="btn-type2 text-center w-100 mt-4">Go to Product Page</a>
	</div>';
}
//$output .= '';
$output3 .= '';


function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}
    
$time_start = microtime_float();
$adsid = ''.substr(round(microtime_float()),8).''.date('is');
	
$sqlOrd = "SELECT MAX(`id`) AS maxId FROM `orders_tbl`";
$resultOrd = mysqli_query($conn, $sqlOrd);
$rowOrd = mysqli_fetch_assoc($resultOrd);

if(isset($rowOrd['maxId']) && $rowOrd['maxId'] != ''){
	$maxOrdId = ($rowOrd['maxId'] + 1).''.$adsid.'';
}else{
	$maxOrdId = '1'.$adsid.'';
}

// unique_order_id|total_amount
//$plaintext = ''.$maxOrdId.'|'.$totalAmount.'';
$plaintext = ''.$maxOrdId.'';
$publickey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC4d2DSOBDXSs5mgOPFcbkwmH4b
7LsAzQT43pWaiTnAqtAiWQCvhW3eurvy2aZxF2L4sdVlYg3mxrTIXaMxpufgCbyx
BAvaDfBw+ht4Ro2TvNrtF+JwSF+ploJhM8hNpcKOhB7iwsgWWZRCa5BW475SQPmo
bqUe1msjXO7CO3qoQQIDAQAB
-----END PUBLIC KEY-----";
//load public key for encrypting
openssl_public_encrypt($plaintext, $encrypt, $publickey);

//encode for data passing
$payment = base64_encode($encrypt);
//checkout URL
$url = 'https://webxpay.com/index.php?route=checkout/billing';

//custom fields
//cus_1|cus_2|cus_3|cus_4
$custom_fields = base64_encode('cus_1|cus_2|cus_3|cus_4');	


$data = array(
 'cart_details'  => $output,
 'cart_checkout_details'  => $output3,
 'total_price'  => 'Rs ' . number_format($total_price, 2),
 'total_item'  => $total_item,
 'totalAmount'  => $totalAmount,
 'plaintext'  => $plaintext,
 'payment'  => $payment,
 'url'  => $url,
 'custom_fields'  => $custom_fields,
 'totalShipCharge'  => $totalShipCharge,
 'deliveryTime'  => $deliveryTime
); 

echo json_encode($data);
//var_dump($_POST);
//echo $deliveryTime;
?>