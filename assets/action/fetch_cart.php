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
$total_price222 = 0;

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
 setcookie('shopping_cart', serialize($_SESSION["shopping_cart"]), time()+3600);

 $count = 0;
 $total_items = 0;	
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
/*
 array(1) {
  ["shopping_cart"]=>
  array(1) {
    [0]=>
    array(4) {
      ["product_id"]=>
      string(13) "4796007571891"
      ["product_name"]=>
      string(16) "MARVEL PANT S 18"
      ["product_price"]=>
      string(4) "1720"
      ["product_quantity"]=>
      int(2)
    }
  }
}
	*/
	$product_id = $values["product_id"];
	$total_price = $total_price + ($values['product_quantity'] * $values['product_price']);
	$total_price2 = $total_price2 + ($values['product_quantity'] * $values['product_price']);
	$product_quantity = $values["product_quantity"];
	$count++;
	
	$total_item = $total_item + $product_quantity;
	
	//$product_ids = explode('_',$values["product_id"]);
	//$pro_code1 = $product_ids[0];
	//$pro_id1 = $product_ids[1]; 
	
    $selectSQL2 = "SELECT * FROM `products_tbl` WHERE `id` = '$product_id'";
    $result2 = mysqli_query($conn, $selectSQL2);
    $row2 = mysqli_fetch_assoc($result2);		
		
	$pro_code2 = $row2['pro_code'];
	$pro_name2 = $row2['pro_name'];
	$pro_price2 = $row2['pro_unit_price'];
	if(isset($row['pro_discount']) && $row['pro_discount'] == 'yes'){
	    $discount_price2 = $row2['pro_unit_price'] - (($row2['pro_unit_price'] * $row['pro_discount'])/100);
	}else{
	    $discount_price2 = $row2['pro_unit_price'];
	}
	$total_price2 = $discount_price2 * $product_quantity;
	$product_qty2 = $row2['pro_qty'];
	
	if($count <= 3){
		
	//$product_id = $values["product_id"];
    $selectSQL = "SELECT * FROM `products_tbl` WHERE `id` = '$product_id'";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);		
		
	$pro_code = $row['pro_code'];
	$pro_name = $row['pro_name'];
	$pro_price = $row['pro_unit_price'];
	$product_qty = $row['pro_qty'];
	$pro_discount = $row['pro_discount'];
	$pro_discount = $row['pro_discount'];
	$pro_image = $row['pro_image'];
	$product_description = $row['product_description'];
	$pro_brand = $row['pro_brand'];
	$pro_category = $row['pro_category'];
	//$product_inches = $row['product_inches'];
	//$product_type = $row['product_type'];
	$display_type = $row['display_type'];
	$sell_type = $row['sell_type'];	  
	
			
	if(empty($pro_image)){
		$pro_image = 'sample_image.jpg';
	}else{
		$pro_image = $pro_image;
	}		 
/*	if(isset($province,$district) && $province != '' && $district != '') {
		if(isset($pro_category) && $pro_category != 'Ceiling Fans'){
			if(isset($product_inches) && $product_inches > '16'){
				$shipSQL1 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip1 = mysqli_query($conn, $shipSQL1);
				$rowShip1 = mysqli_fetch_assoc($resultShip1);	
				$totalShipCharge = ($rowShip1['18_inches'] * $total_item)/2;	
				//$totalShipCharge = $totalShipCharge + $totalShipCharge1;
			}else{
				$shipSQL2 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip2 = mysqli_query($conn, $shipSQL2);
				$rowShip2 = mysqli_fetch_assoc($resultShip2);	
				$totalShipCharge = ($rowShip2['16_inches'] * $total_item)/2;	
				//$totalShipCharge = $totalShipCharge + $totalShipCharge2;
			}
			
		}else{
				$shipSQL3 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip3 = mysqli_query($conn, $shipSQL3);
				$rowShip3 = mysqli_fetch_assoc($resultShip3);	
				$totalShipCharge = ($rowShip3['ceiling_fans'] * $total_item)/2;
				//$totalShipCharge = $totalShipCharge + $totalShipCharge3;			
		} 
                $totalShipCharge = $totalShipCharge + $totalShipCharge;
                
				$shipSQL4 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip4 = mysqli_query($conn, $shipSQL4);
				$rowShip4 = mysqli_fetch_assoc($resultShip4); 
			
				$deliveryTime = $rowShip4['delivery_time'];
				$totalAmount =  round($total_price2);
	}else{
		$totalAmount =  round($total_price2);
	}
	*/
 //$totalShipCharge .= $pro_category;
    $output .= '
		<div class="cart-row row">
		    <div class="col-3">
			<a href="#" class="img"><img src="'.URL.'assets/uploads/products/'.$pro_image.'" alt="'.$pro_name.'" class="img-responsive"></a>
			</div>
			<div class="col-7">
				<span class="mt-h-title text-left"><a href="#">'.$pro_name.'</a></span>
				<div class="price text-left"><i class="fa fa-eur d-none" aria-hidden="true"></i>Rs '.$pro_price.'</div>
				<div class="mt-h-title text-left">Qty: '.$product_quantity.'</div>
			</div>
			<div class="col-2"><a href="#" id="'.$product_id.'" class="close fa fa-times delete text-danger"></a></div>
		</div>';
		
	}
	
	$product_ids2 = $values["product_id"];
	//$product_ids2 = explode('_',$values["product_id"]);
	//$pro_code2 = $product_ids2[0];
	//$pro_id2 = $product_ids2[1];	
	
    $selectSQL2 = "SELECT * FROM `products_tbl` WHERE `id` = '$product_id'";
    $result2 = mysqli_query($conn, $selectSQL2);
    $row2 = mysqli_fetch_assoc($result2);		
		
	//$product_inches2 = $row2['product_inches'];  
/*		 
	if(isset($province,$district) && $province != '' && $district != '') {
		if(isset($pro_category) && $pro_category != 'Ceiling Fans'){
			if(isset($product_inches2) && $product_inches2 > '16'){
				$shipSQL1 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip1 = mysqli_query($conn, $shipSQL1);
				$rowShip1 = mysqli_fetch_assoc($resultShip1);	
				$totalShipCharge = ($rowShip1['18_inches'] * $total_item)/2;	
				//$totalShipCharge = $totalShipCharge + $totalShipCharge1;
			}else{
				$shipSQL2 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip2 = mysqli_query($conn, $shipSQL2);
				$rowShip2 = mysqli_fetch_assoc($resultShip2);	
				$totalShipCharge = ($rowShip2['16_inches'] * $total_item)/2;	
				//$totalShipCharge = $totalShipCharge + $totalShipCharge2;
			}
			
		}else{
				$shipSQL3 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip3 = mysqli_query($conn, $shipSQL3);
				$rowShip3 = mysqli_fetch_assoc($resultShip3);	
				$totalShipCharge = ($rowShip3['ceiling_fans'] * $total_item)/2;
				//$totalShipCharge = $totalShipCharge + $totalShipCharge3;			
		} 
                $totalShipCharge = $totalShipCharge + $totalShipCharge;
                
				$shipSQL4 = "SELECT * FROM `shipping_charge_tbl` WHERE `province` = '$provinceName' AND `districts` = '$cityName'";
				$resultShip4 = mysqli_query($conn, $shipSQL4);
				$rowShip4 = mysqli_fetch_assoc($resultShip4); 
			
				$deliveryTime = $rowShip4['delivery_time'];
				$totalAmount =  round($total_price2);
	}else{
		
	}	
*/	
$totalAmount =  round($total_price2);

$output3 .= '<tr class="text-left"><th scope="row">'.$count.'</th>
				<td class="text-left">'.$pro_name2.'</td>
				<td class="text-left">'.$product_quantity.'</td>
				<td class="text-left">'.number_format((float)$pro_price2, 0, '.', '').'</td>
				<td class="text-left">'.number_format((float)$discount_price2, 0, '.', '').'</td>
				<td class="text-left">'.number_format((float)$total_price2, 0, '.', '').'</td></tr>';	
$total_price222 = $total_price222 + $total_price2;	

$total_items = $total_items + $values['product_quantity'];			

 }
$output3 .= '<tr class="text-left"><th scope="row" colspan="5">TOTAL AMOUNT</th>
				<td class="text-left"><b>'.number_format((float)$total_price222, 0, '.', '').'</b></td>
			</tr>';
				
$output .= '<div class="cart-row-total row justify-content-center mt-2 mb-2">
		<div class="mt-total col-6 font-weight-bold">Sub Total</div>
		<div class="mt-total-txt col-6 font-weight-bold"><i class="fa fa-eur d-none" aria-hidden="true"></i>Rs '.number_format($total_price222, 2).'</div>
	</div>
 ';
$output .= '<div class="cart-btn-row row justify-content-center mt-3">
				<div class="col-6"><a href="'.URL.'cart" class="btn-type2">VIEW CART</a></div>
				<div class="col-6"><a href="'.URL.'checkout" class="btn-type3">CHECKOUT</a></div>
				<div class="col-12 text-center mt-2 mb-2"><a type="button" class="btn-type2" id="clear_cart">Empty Cart</a></div>
			</div>';
 
 
}else{
$totalAmount = '';	
$output .= '<div class="row cart-btn-row text-center pt-0 border-top-0">
		<div class="col-12 text-center"><img src="'.URL.'assets/images/main_logo.jpg" alt="schon" class="headerLogo text-center" align="center" width="100"></div>
		<div class="col-12 text-center mb-2"><a href="'.URL.'shop" class="btn-type2 text-center w-100 mt-4">Go to Shop Page</a></div>
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

if(isset($total_item) && $total_item != '' && $total_item != 'null'){
   $total_item = $total_item; 
}else{
   $total_item = 0;
}
//$totalAmount22 = $total_price222 + $totalShipCharge;
//$_SESSION['user_details']['shipCharge'] = $totalShipCharge;$total_price222
$totalAmount22 = (number_format((float)$total_price222, 0, '.', '') + number_format((float)$totalShipCharge, 0, '.', ''));
$data = array(
 'cart_details'  => $output,
 'cart_checkout_details'  => $output3,
 //'total_price'  => 'Rs ' . number_format($total_price, 2),
 'total_price'  => 'Rs ' . number_format($totalAmount22),
 'total_item'  => $total_item,
 //'totalAmount'  => $totalAmount,
 'totalAmount'  => number_format((float)$total_price222, 0, '.', ''),
 'plaintext'  => $plaintext,
 'payment'  => '',
 'url'  => '',
 'custom_fields'  => '',
 'totalShipCharge'  => $totalShipCharge,
 'deliveryTime'  => $deliveryTime,
 'checkouttotal' => $totalAmount22
); 

echo json_encode($data);
//var_dump($_POST);
//echo $output;
?>