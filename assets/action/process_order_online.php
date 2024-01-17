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
global $date_time;
global $orderid;

$date_time = date('Y-m-d H:i:s');

$output = '';
$output2 = '';
//var_dump($_SESSION['user_details']);
//array(18) { ["totalAmount"]=> string(4) "1499" ["plaintext"]=> string(12) "1531413|1499" ["payment"]=> string(172) "qV7Lvr9G8b6rOtGfxw/OSVy9OR3VQQ4wN1eDyJwChEB/1ALiROUIaaEAEaZsxZwOU2Vzt/gfFaq+2jbTcvO0VgCtQEPzsszLJfdL+rRAD3Yuv8uJdBkaM88WxfsB6HOpRJlAq21kun3PIH8fYXHgYebJaLZh7pqZ/izOLKPgL34=" ["url"]=> string(52) "https://webxpay.com/index.php?route=checkout/billing" ["custom_fields"]=> string(32) "Y3VzXzF8Y3VzXzJ8Y3VzXzN8Y3VzXzQ=" ["process_currency"]=> string(3) "LKR" ["secret_key"]=> string(36) "ff4f0f97-209a-4ea2-a0e6-a55f3a931bc2" ["enc_method"]=> string(24) "JCs3J+6oSz4V0LgE0zi/Bg==" ["cms"]=> string(3) "PHP" ["first_name"]=> string(9) "Makaranda" ["last_name"]=> string(9) "Pathirana" ["address_line_one"]=> string(15) "No 134 Mirigama" ["state"]=> string(1) "1" ["city"]=> string(1) "1" ["postal_code"]=> string(5) "11254" ["email"]=> string(28) "makarandapathirana@gmail.com" ["contact_number"]=> string(10) "0773944180" ["address_line_two"]=> string(0) "" }

//name:name,name2:name2,address:address,province:province,district:district,zipcode:zipcode,email:email,mobile:mobile,otheraddress:otheraddress,addressnew:addressnew

if(isset($_GET['ordmsg']) && $_GET['ordmsg'] == 'success'){

    if(!empty($_SESSION["shopping_cart"]))
    {
    	$totalAmount = '';
    	$plaintext = '';
    	$first_name = $_SESSION['user_details']['name'];
    	$last_name = $_SESSION['user_details']['name2'];
    	$address_line_one = $_SESSION['user_details']['address'];
    	$state = $_SESSION['user_details']['province'];
    	$city = $_SESSION['user_details']['district'];
    	$postal_code = $_SESSION['user_details']['zipcode'];
    	$email = $_SESSION['user_details']['email'];
    	$contact_number = $_SESSION['user_details']['mobile'];
    	$address_line_two = $_SESSION['user_details']['addressnew'];
    	$shipCharge = $_SESSION['user_details']['shipCharge'];	
    	$province = $state;
    	$district = $city;
    
    	$findSQL = "SELECT *,COUNT(id) AS usercount FROM `users_tbl` WHERE `email_address` = '$email' AND `phone_number` = '$contact_number'";
    	$findResult = mysqli_query($conn, $findSQL);
    	$findRow = mysqli_fetch_assoc($findResult);
    
    	$user_count = $findRow['usercount'];
    	$user_id = $findRow['user_id'];
    	
        function user_id_code()
        {
            list($usec, $sec) = explode(" ", microtime());
            return ((float)$usec + (float)$sec + (float)$sec);
        }
        
        $time_start2 = user_id_code();
        $userId = ''.$user_id.''.substr(round(user_id_code()),10).''.(date('is') + 10);
        $_SESSION['user_id'] = $userId;
    	$customerId = '';
    	if($user_count == 0){
    		//$user_name = $findRow['user_name'];
    		$insertUserSQL = "INSERT INTO `users_tbl`(`user_id`,`user_first_name`, `user_last_name`, `user_address`, `user_province`, `user_district`, `user_city`, `zip_code`, `email_address`, `phone_number`, `date_time`) VALUES ('$userId','$first_name','$last_name','$address_line_one','$state','$city','','$postal_code','$email','$contact_number','$date_time')";
    		mysqli_query($conn, $insertUserSQL);
    		$customerId = $userId;
    	}else{
    		$customerId = $user_id;
    	}
    		
        function microtime_float()
        {
            list($usec, $sec) = explode(" ", microtime());
            return ((float)$usec + (float)$sec);
        }
        
        $time_start = microtime_float();
        $orderid = ''.substr(round(microtime_float()),8).''.date('is');
    	$_SESSION['order_id'] = $orderid;
     $count = 0;	
     $discountSum = 0;
     $productQtySum = 0;
     //$shippingChargeSum = 0;
     foreach($_SESSION["shopping_cart"] as $keys => $values)
     {
    	$total_item = $total_item + 1;
    	$total_price = ($values['product_quantity'] * $values['product_price']);
    	$product_quantity = $values["product_quantity"];
    	$count++;
    		
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
    	 
     
    		if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
    			$discountPrice = ($row['discount_rate'] / 100);
    			$discountPrice = $row['product_price'] * $discountPrice;
    			$discountPriceNew = $row['product_price'] - $discountPrice;
    			$discountPriceNew = round($discountPriceNew);
    			$discount = $discountPriceNew;
    			//echo '<del class="off">RS '.$row['product_price'].'</del>';
    			$disbadge = 'd-inline-block';
    			//echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.round($discountPrice).'</span></span>';
    		}else{
    			$discountPriceNew = $product_price2;
    			$discountPrice = '';
    			$discount = 0;
    			$disbadge = 'd-none';
    			//echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.$row['product_price'].'</span></span>';
    		} 
    		$prototal = ($discount * $product_quantity);
    	/*	if(isset($discount) && $discount > 0){
    			$prototal = ($discount * $product_quantity);
    		}else{
    			$prototal = ($product_price2 * $product_quantity);
    		}
    	*/	
    		$discountSum = $discountSum + $prototal;
    		$productQtySum = $productQtySum + $product_quantity;
    		$totalPriceSum = $prTot + $prTot;
      
    
    		$value[] = "('$orderid','$customerId','$product_code','$product_price2','$product_quantity','$discount','$total_price','$date_time')";
    		
    		$updateQty = ($product_qty - $product_quantity);
    		
    		$updateSql = "UPDATE `products_tbl` SET `product_qty` = '$updateQty' WHERE `product_code` = '$product_id'";
    		mysqli_query($conn, $updateSql);		
     }
     	
    		$insertOrderItemsSQL = "INSERT INTO `sales_items_tbl`(`order_id`, `user_id`, `product_code`, `product_price`, `product_qty`, `product_discount`, `product_total`, `date_time`) VALUES ";
    		$insertOrderSQL = "INSERT INTO `orders_tbl`(`order_id`, `customer_id`,`province`,`district`, `product_qty`, `product_discount`, `shipping_charge`, `product_total`, `type`, `date_time`) VALUES ('$orderid','$customerId','$province','$district','$productQtySum','$discountSum','$shipCharge','$total_price2','onlinepayment','$date_time')";		
    		
    		$insertOrderItemsSQL .= implode(',',$value);
    		mysqli_query($conn, $insertOrderItemsSQL);
    		
    		//$insertOrderSQL .= implode(',',$value2);
    		mysqli_query($conn, $insertOrderSQL);
    		
    		$_SESSION["invoice_cart"] = $_SESSION['shopping_cart'];
    	    $_SESSION['user_invoice_details'] = $_SESSION['user_details'];   
    	    
    		unset($_SESSION['feature_image']);
    		unset($_SESSION['shopping_cart']);	
    		unset($_SESSION['user_details']);
    		//echo $insertOrderSQL;
             unset($_SESSION['downloadmsg']);    
    		$_SESSION['order_complete_message'] = 'completed';
    	//echo '<script>window.open("'.URL.'invoice/", "_blank");</script>';	
     	echo '<script>window.location.href = "'.URL.'ordercomplete";</script>';
    }
    else
    {
    	unset($_SESSION['shopping_cart']);
    	unset($_SESSION['user_details']);
    	 unset($_SESSION['downloadmsg']);
    	$_SESSION['order_complete_message'] = 'notcompleted';
    	//echo '<script>window.open("'.URL.'invoice/", "_blank");</script>';
     	echo '<script>window.location.href = "'.URL.'ordercomplete";</script>';
    	//echo '<script>window.location.href = "'.URL.'responsive";</script>';
    }

}else{
	//unset($_SESSION['shopping_cart']);
	//unset($_SESSION['user_details']);  
	$_SESSION['order_complete_message'] = 'notcompleted';
    echo '<script>window.location.href = "'.URL.'ordercomplete";</script>';
}

?>