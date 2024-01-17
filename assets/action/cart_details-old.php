<?php
session_start();
include("../../config/paths.php");
include("../../config/database.php");

$total_price = 0;
$total_price2 = 0;
$total_item = 0;
global $status;
global $disbadge;
global $prTot;
global $maxOrdId;

$output = '';
$output2 = '';
if(!empty($_SESSION["shopping_cart"]))
{
 $count = 0;	
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
	$total_item = $total_item + 1;
	$total_price = ($values['product_quantity'] * $values['product_price']);
	$product_quantity = $values["product_quantity"];
	$count++;
	if($count > 0){
		
		//$total_item = $total_item;
		$total_price = ($values['product_quantity'] * $values['product_price']);
		$total_price2 = $total_price2 + ($values['product_quantity'] * $values['product_price']);
		$product_id = $values["product_id"];
		$product_name = $values["product_name"];
		$product_quantity = $values["product_quantity"];
		$product_price = $values["product_price"];
		
		$prTot = ($product_quantity * $product_price);
		$count++;
			
		$product_id = $values["product_id"];
		$selectSQL = "SELECT * FROM `products_tbl` WHERE `product_code` = '$product_id'";
		$result = mysqli_query($conn, $selectSQL);
		$row = mysqli_fetch_assoc($result);		
			
		$product_code = $row['product_code'];
		$product_name = $row['product_name'];
		$product_price2 = $row['product_price'];
		//$product_qty = $row['product_qty'];
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
	 
 
		if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
			$discountPrice = ($row['discount_rate'] / 100);
			$discountPrice = $row['product_price'] * $discountPrice;
			$discountPriceNew = $row['product_price'] - $discountPrice;
			$discountPriceNew = round($discountPriceNew);
			//echo '<del class="off">RS '.$row['product_price'].'</del>';
			$disbadge = 'd-inline-block';
			//echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.round($discountPrice).'</span></span>';
		}else{
			$discountPriceNew = $product_price2;
			$discountPrice = '';
			$disbadge = 'd-none';
			//echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.$row['product_price'].'</span></span>';
		} 
  
 
 $output .= '<div class="row border">
              <div class="col-xs-12 col-sm-2">
                <div class="img-holder">
                  <img src="'.URL.'assets/uploads/products/'.$product_image.'" alt="'.$product_name.'" width="100">
                </div>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="product-name">'.$product_name.'</strong>
				<span class="bg-success mt-2 '.$disbadge.'">
					<span class="off text-white p-2">'.$discount_rate.'% Off</span>
				</span>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="price"><i class="fa fa-eur d-none"></i>Rs '.$product_price2.'</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="price '.$disbadge.'"><i class="fa fa-eur d-none"></i>Rs '.$discountPrice.'</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <form action="#" class="qyt-form">
                  <fieldset>
					<input type="hidden" id="cartName'.$product_code.'" value="'.$product_name.'" class="form-control"/>
					<input type="hidden" id="cartPrice'.$product_code.'" value="'.$product_price.'" class="form-control"/>
                    <input type="number" id="'.$product_code.'" value="'.$product_quantity.'" class="form-control cartQty cartQty'.$product_code.'"/>
                  </fieldset>
                </form>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="price"><i class="fa fa-eur d-none"></i>Rs '.$total_price.'</strong>
                <a href="#" id="'.$product_code.'"" class="deleteCartItem"><i class="remove"></i></a>
              </div>
            </div>';
	
		$output .= '<div class="row d-none">
              <div class="col-xs-12">
                <form action="#" class="coupon-form">
                  <fieldset>
                    <div class="mt-holder">
                      <input type="text" class="form-control" placeholder="Your Coupon Code">
                      <button type="submit">APPLY</button>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>';
			
			
	
	}	
 }
 
 
 $output2 .= '
 			  <div class="col-xs-12 col-sm-12">
                <h2 class="text-uppercase font-weight-bold">CART TOTAL</h2>
                <ul class="list-unstyled block cart">
                  <li>
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">CART SUBTOTAL</strong>
                      <div class="txt pull-right">
                        <span><i class="fa fa-eur d-none"></i>Rs '.number_format($total_price2, 0,'.', ',').'</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="txt-holder text-center">
                      <strong class="title w-100 sub-title font-weight-normal pull-left text-danger text-lowercase">Shipping charges will be added on the checkout page</strong>
                      <div class="txt pull-right">
                        <span></span>
                      </div>
                    </div>
                  </li>
                  <li style="border-bottom: none;">
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">CART TOTAL</strong>
                      <div class="txt pull-right">
                        <span><i class="fa fa-eur d-none"></i>Rs '.number_format($total_price2, 0,'.', ',').'</span>
                      </div>
                    </div>
                  </li>
                </ul>
                <a class="checkout-btn cursor-pointer">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
              </div>
 ';
	$status = 'ok';
	

/*
$_SESSION['totalAmount'] = $totalAmount;
$_SESSION['plaintext'] = $plaintext;
$_SESSION['publickey'] = $publickey;
$_SESSION['encrypt'] = $encrypt;
$_SESSION['payment'] = $payment;
$_SESSION['url'] = $url;
$_SESSION['custom_fields'] = $custom_fields;
 */
}
else
{
$output .= '<div class="cart-btn-row text-center">
		<a href="'.URL.'products" class="btn-type2 mt-4">Go to Product Page</a>
	</div>';
	$status = 'not';
}
$data = array(
 'cart_details'  => $output,
 'status'  => $status,
 'total_cart_details'  => $output2
);

echo json_encode($data);


?>