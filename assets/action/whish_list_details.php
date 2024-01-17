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

if(!empty($_SESSION["wish_list_cart"]))
{
 $count = 0;	
 foreach($_SESSION["wish_list_cart"] as $keys => $values)
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
			$product_price_new = round($discountPrice);
			$dis_details = '<span class="text-success">In Stock</span>';
			//echo '<del class="off">RS '.$row['product_price'].'</del>';
			$disbadge = 'd-inline-block';
			$wish_list_icon = 'complete';
			//echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.round($discountPrice).'</span></span>';
		}else{
			$discountPriceNew = $product_price2;
			$discountPrice = '';
			$dis_details = '<span class="text-danger">Out of Stock</span>';
			$disbadge = 'd-none';
			$product_price_new = $product_price;
			$wish_list_icon = 'not_complete';
			//echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.$row['product_price'].'</span></span>';
		} 
  
 
		$output .= '<div class="row border">
 					<input type="hidden" value="'.$product_price_new.'" id="price'.$product_code.'"/>
					<input type="hidden" value="1" id="quantity'.$product_code.'"/>
					<input type="hidden" value="'.$product_name.'" id="name'.$product_code.'"/>
              <div class="col-12 col-sm-1">
                <a href="#" id="'.$product_code.'"" class="deleteCartItem"><i class="remove mt-4"></i></a>
			  </div>
              <div class="col-12 col-sm-2">
                <div class="img-holder">
                  <img src="'.URL.'assets/uploads/products/'.$product_image.'" alt="'.$product_name.'" width="100">
                </div>
              </div>
              <div class="col-12 col-sm-2">
                <strong class="product-name">'.$product_name.'</strong>
				<span class="bg-success mt-2 '.$disbadge.'">
					<span class="off text-white p-2">'.$discount_rate.'% Off</span>
				</span>
              </div>
              <div class="col-12 col-sm-2">
                <strong class="price"><i class="fa fa-eur d-none"></i>Rs '.$product_price2.'</strong>
              </div>
              <div class="col-12 col-sm-2">
                <strong><i class="fa fa-eur d-none"></i>'.$dis_details.'</strong>
              </div>
              <div class="col-12 col-sm-3">
                <form action="#" class="qyt-form">
                  <fieldset>
					<input type="hidden" id="cartName'.$product_code.'" value="'.$product_name.'" class="form-control"/>
					<input type="hidden" id="cartPrice'.$product_code.'" value="'.$product_price.'" class="form-control"/>
					<a data-quantity="1" value="'.$product_code.'" id="'.$product_code.'" data-product_id="1102" class="form-control pt-1 pb-4 btn view_more add_to_wish_list_cart cartQty">Add to Cart</a>
                  </fieldset>
                </form>
              </div>
            </div>';
	
		$output .= '<div class="row d-none">
              <div class="col-12">
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
	/*$output .= '<div class="cart-btn-row text-center">
		<a href="'.URL.'shop" class="btn-type2 mt-4">Go to Shop Page</a>
	</div>';*/
	$output = 'not';
}

/*
$data = array(
 'whish_list'  => $output,
 'whish_list_icon' => $wish_list_icon
);

echo json_encode($data);
*/
echo $output;

?>