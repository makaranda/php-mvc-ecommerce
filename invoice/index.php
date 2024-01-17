<?php
session_start();
include('../libs/connection.php');
include('../config/paths.php');
require_once '../assets/dompdf/autoload.inc.php'; 
	
use Dompdf\Dompdf; 
$dompdf = new Dompdf();

global $connect;

global $output;
$count = 0;
$totalQty = 0;
$totalAmount = 0;
$total_item = 0;
$total_price = 0;
$total_qty = 0;
$totalprice = 0;
$pro_tot_cost = 0;
$pro_tot_discount = 0;
$pro_tot_profit = 0;
$total_price2 = 0;
$pro_tot_sales  = 0;
$proTot = 0;
$pro_tot = 0;
$output = '';
$porducts = '';
//$_SESSION['order_id'] = '441903';
//$_SESSION['user_id'] = '4925';
//var_dump($_SESSION['user_details']);	
//echo '<script>window.open("https://www.w3schools.com", "_blank");</script>';
//`order_company_id`, `order_company_name`, `company_type`, `province`, `district`, `city`, `address`, `phone`, `agent_category`, `joined_date`

//if(isset($_SESSION['user_details']['name'],$_SESSION['user_details']['address'],$_SESSION['user_details']['mobile'],$_SESSION['user_id'],$_SESSION['order_id'],$_SESSION['order_complete_message']) && $_SESSION['user_details']['address'] != '' && $_SESSION['order_complete_message'] == 'completed'){

if(isset($_SESSION['user_details']['name'],$_SESSION['user_details']['address'],$_SESSION['user_details']['mobile'])){

//$_SESSION['downloadmsg'] = 'downloaded';

	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_details']['name1'].' '.$_SESSION['user_details']['name2'];
	$user_address = $_SESSION['user_details']['address'];
	$user_mobile = $_SESSION['user_details']['mobile'];
	$orderedDate = $_SESSION['orderedDate'];
	$order_id = $_SESSION['order_id'];
	//$district = $_SESSION['district'];
	
	$shipCharge = $_SESSION['user_details']['shipCharge'];
	
	$findSQL27 = "SELECT * FROM `orders_tbl` WHERE `order_id` = '$order_id'";
	$findResult27 = mysqli_query($conn, $findSQL27);
	$findRow27 = mysqli_fetch_assoc($findResult27);	
	
	$district = $findRow27['district'];
	$payment_type = $findRow27['type'];
	
	if(isset($payment_type) && $payment_type == 'onlinepayment'){
	    $paymentmessage = 'Your online payment is successful.';
	}elseif(isset($payment_type) && $payment_type == 'cashondelivery'){
	    $paymentmessage = 'You must pay for these products with delivery';
	}else{
	    $paymentmessage = '';
	}
			
	$selectSQL45 = "SELECT * FROM `shipping_charge_tbl` INNER JOIN `post_districs` ON `shipping_charge_tbl`.`districts` = `post_districs`.`district_name` WHERE `post_districs`.`id` = '$district'";
	$findResult45 = mysqli_query($conn, $selectSQL45);
	$findRow45 = mysqli_fetch_assoc($findResult45);
	$delivery_time = $findRow45['delivery_time'];
	
	
		 foreach($_SESSION["invoice_cart"] as $keys => $values)
		 {
			
			$total_item = $total_item + 1;
			$total_price = $total_price + ($values['product_quantity'] * $values['product_price']);
			$proTot = $values['product_quantity'] * $values['product_price'];
			
			$total_qty = $total_qty + $values['product_quantity'];
			$total_price2 = $total_price2 + ($values['product_quantity'] * $values['product_price']);
			$totalprice = ($values['product_quantity'] * $values['product_price']);
			$product_quantity = $values["product_quantity"];
			$product_cost_price = $values["product_cost_price"];
			$product_sales_price = $values["product_price"];
			$pro_tot_cost = $pro_tot_cost + ($values["product_cost_price"] * $values["product_quantity"]);
			$pro_tot_sales = $pro_tot_sales + ($values["product_price"] * $values["product_quantity"]);
			$pro_tot_discount = $pro_tot_discount + ($values["product_discount"] * $values["product_quantity"]);
			$pro_tot_profit = $pro_tot_profit + ($pro_tot_sales - $pro_tot_discount) - $pro_tot_cost;
			$pro_tot = ($pro_tot_sales - $pro_tot_discount);
			
			$count++;
				
			$product_code = $values['product_id'];
			$product_name = $values['product_name'];
			$product_price = $values['product_price'];
			$product_qty = $values['product_quantity'];
			
			$findSQL2 = "SELECT * FROM `products_tbl` WHERE `product_code` = '$product_code'";
			$findResult2 = mysqli_query($conn, $findSQL2);
			$findRow2 = mysqli_fetch_assoc($findResult2);	

			$pro_name = $findRow2['product_name'];
    		$product_code = $findRow2['product_code'];
    		$product_price2 = $findRow2['product_price'];
    		$product_qty = $findRow2['product_qty'];
    		$is_discount = $findRow2['is_discount'];
    		$discount_rate = $findRow2['discount_rate'];
    		$product_image = $findRow2['product_image'];
    		$product_description = $findRow2['product_description'];
    		$product_brand = $findRow2['product_brand'];
    		$product_category = $findRow2['product_category'];
    		$product_inches = $findRow2['product_inches'];
    		$product_type = $findRow2['product_type'];
    		$display_type = $findRow2['display_type'];
    		$sell_type = $findRow2['sell_type'];
    		
    		
    		if(isset($findRow2['is_discount']) && $findRow2['is_discount'] == 'yes'){
    			$discountPrice = ($findRow2['discount_rate'] / 100);
    			$discountPrice = $findRow2['product_price'] * $discountPrice;
    			$discountPriceNew = $findRow2['product_price'] - $discountPrice;
    			$discountPriceNew = round($discountPriceNew);
    			$discount = $discountPriceNew;
    		}else{
    			$discountPriceNew = $product_price2;
    			$discountPrice = '';
    			$discount = 0;
    		} 
    		$prototal = ($discount * $product_quantity);  
    		
    		$discountSum = $discountSum + $prototal;
    		$productQtySum = $productQtySum + $product_quantity;
    		$totalPriceSum = $prTot + $prTot;
    		$netamount = $totalPriceSum - $discountSum;
    		
			$porducts .= '<tr>
					<th scope="row">'.$total_item.'</th>
					<td><i class="fas fa-rupee-sign" area-hidden="true"></i> '.$product_code.' </td>
					<td><i class="fas fa-rupee-sign" area-hidden="true"></i> '.$pro_name.'</td>
					<td><i class="fas fa-rupee-sign" area-hidden="true"></i> '.$product_qty.' </td>
					<td><i class="fas fa-rupee-sign" area-hidden="true"></i> Rs '.$product_price.' </td>
					<td><i class="fas fa-rupee-sign" area-hidden="true"></i> Rs '.$proTot.' </td>
				</tr>';		 
					
		  }
		  
		  $netamount = $total_price2 + $shipCharge;

	$output = '
 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3 body-main" style="border: 0px solid rgba(0,0,0,0);">
                <div class="col-md-12">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="">
            <tbody>
                <tr>
                    <td colspan="3" height="80" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff" style="padding:0;margin:0;font-size:0;line-height:0">
                        <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td align="center" valign="middle" style="padding:0;margin:0;font-size:0;line-height:0">                            
								<h4 style="color: #F81D2D;font-size:22px !important;"><strong>Fanz.Lk</strong></h4>
                            <p class="mt-1 mb-1" style="font-size:12px;"><strong>Importers &amp; Distributors</strong></p>
                            <p class="mt-1 mb-1" style="font-size:12px;">Kandy Road, Kadawatha</p>
                            <p class="mt-1 mb-1" style="font-size:12px;">Tel: 0771234567</p>
                            <p class="mt-1 mb-1" style="font-size:12px;">Email: info@fanz.com</p>
                            <p class="mt-1 mb-1" style="font-size:12px;">Web: www.fanz.lk</p></td>
                               
                            </tr>
                            <tr>
                            	<td>
                                <hr style="border-top: 1px solid rgba(0, 0, 0, 0.5);">
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                <h6 style="color: #F81D2D;font-size:16px !important;" class="text-center"><strong>INVOICE</strong></h6>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                </tr>
            
                <tr>
                    <td align="center">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <p class="p-0 m-0 text-left"><span class="font-weight-bold m-0">CUSTOMER DETAILS</span></p>
                                    </th>
                                </tr>
                            </thead>
							 <tbody>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">User ID</span> - '.$user_id.'										                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">Name</span> - '.$user_name.'									                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">Address</span> - '.$user_address.'										                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">Phone</span> - '.$user_mobile.'										                                      
                                    </td>
                                </tr>
							 </tbody>							 
							</table>
                                </td>
                                <td></td>
								<td>
                                    <table class="table table-borderless">
							 <tbody>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">Invoice No :</span> '.$order_id.' 										                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">Invoice Date :</span> '.$orderedDate.' 										                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
										 <span class="font-weight-bold m-0">Delivery Time :</span> within '.$delivery_time.' days									                                      
                                    </td>
                                </tr>
							 </tbody>							 
							</table>								
								</td>
                            </tr>
            			</tbody>							 
					</table> 
                    
                    <div class="mt-4">
                        <table class="table itemlist">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <p class="m-0" style="font-size:12px;">#</p>
                                    </th>
                                    <th scope="col">
                                        <p class="m-0" style="font-size:12px;">Item Code</p>
                                    </th>
                                    <th scope="col">
                                        <p class="m-0" style="font-size:12px;">Item Description</p>
                                    </th>
                                    <th scope="col">
                                        <p class="m-0" style="font-size:12px;">Qty</p>
                                    </th>
                                    <th scope="col">
                                        <p class="m-0" style="font-size:12px;">Price per</p>
                                    </th>
                                    <th scope="col">
                                        <p class="m-0" style="font-size:12px;">Total</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								'.$porducts.'		  
		 
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold">Total Amount: </strong> </p>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold">Discount: </strong> </p>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold">Shipping Charge: </strong> </p>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold">Total Amount Outstanding: </strong> </p>
                                    </td>
                                    <td>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold"><i class="fas fa-rupee-sign" area-hidden="true"></i>Rs '.$total_price.'</strong> </p>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold"><i class="fas fa-rupee-sign" area-hidden="true"></i>Rs '.$discountSum.' </strong> </p>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold"><i class="fas fa-rupee-sign" area-hidden="true"></i>Rs '.$shipCharge.' </strong> </p>
                                        <p class="mt-1 mb-1"> <strong class="font-weight-bold"><i class="fas fa-rupee-sign" area-hidden="true"></i>Rs '.$netamount.'</strong> </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center text-left">
                        <div class="col-md-12 mt-3">
                            <p class="m-0"><b><span style="color:red;" class="font-weight-bold">Note :</span> '.$paymentmessage.'</b></p>							
                            <p class="m-0"><b>Good accepted in good order</b></p>							
                            <p class="m-0"><b>The order will be delivered to your place within '.$delivery_time.' days</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';



	$html_code = '';
	$html_code .= '<html><head>';	
	$html_code .= '<link rel="stylesheet" href="../assets/bootstrap4/css/bootstrap.css">';
	$html_code .= '<title>Fanz.Lk | Invoice - '.$order_id.'</title>';
	$html_code .= '<link rel="stylesheet" href="../assets/bootstrap4/css/mystyle.css">';	
	$html_code .= '<link href="favicon.png" rel="icon" type="image/png" sizes="32x32">';
	$html_code .= '<style>

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: auto
 }

 h1 {
     text-align: center
 }
  .body-main {
     background: #ffffff;
     position: relative;
     font-size: 10px
	
}
table.itemlist td{
	font-size: 11px !important;
}
table.itemlist th{
	font-size: 13px !important;
	font-weight:900 !important;
}

</style></head><body>';	

	$html_code .= $output;	
	$html_code .= '    <script type="text/php">
        if ( isset($pdf) ) {
            // OLD 
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
            // v.0.7.0 and greater
            $x = 542;
            $y = 820;
            $text = "Page - {PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 6;
            $color = array(255,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script></body></html>';

//echo $html_code;
$dompdf->set_option("isPhpEnabled", true);
$dompdf->loadHtml($html_code); 
$dompdf->setPaper('A4', 'portrait'); 
$dompdf->render(); 
$dompdf->stream("fanz.lk_invoice_'.$order_id.'", array("Attachment" => 1));

//var_dump($_POST);

    echo '<script>window.location.href = "'.URL.'ordercomplete";</script>';

}else{
    $_SESSION['downloadmsg'] = '';   
	//unset($_SESSION['loggedIn']);
	//session_destroy();
	echo '<script>window.location.href = "'.URL.'";</script>';
}
//echo $html_code;
?>
