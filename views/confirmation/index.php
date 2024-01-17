<?php
    
	include('libs/connection.php');

	//unset($_SESSION["shopping_cart"]);
	global $total_price;
	global $total_item;
	global $output;
	global $output2;
	global $gotoprocess;
	global $url;	
	
	$total_price = 0;
	$total_item = 0;
	$output = '';
	$output2 = '';
	
	//var_dump($_POST);
	
    $country = $_POST['country'];
    $totalAmount = $_POST['totalAmount'];
    $totalwithoutshipping = $_POST['totalwithoutshipping'];
    $totalwithshipping = $_POST['totalwithshipping'];
    $totalShippingCharge = $_POST['totalShippingCharge'];
    //$plaintext = $_POST['plaintext'];
    //$url = $_POST['url'];
    $custom_fields = $_POST['custom_fields'];
    $process_currency = $_POST['process_currency'];
    $secret_key = $_POST['secret_key'];
    $enc_method = $_POST['enc_method'];
    //$payment = $_POST['payment'];
    $shipCharge = $_POST['shipCharge'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address_line_one = $_POST['address_line_one'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address_line_two = $_POST['address_line_two'];	
	
	
	if(!empty($_SESSION["shopping_cart"]))
	{
	 $gotoprocess = 'gotoprocess';
	 $count = 0;	
	 foreach($_SESSION["shopping_cart"] as $keys => $values)
	 {
		$total_item = $total_item + 1;
		$total_price = $total_price + ($values['product_quantity'] * $values['product_price']);
		$product_id = $values["product_id"];
		$product_name = $values["product_name"];
		$product_quantity = $values["product_quantity"];
		$product_price = $values["product_price"];
		$count++;
			
		$product_id = $values["product_id"];
		$selectSQL = "SELECT * FROM `products_tbl` WHERE `product_code` = '$product_id'";
		$result = mysqli_query($conn, $selectSQL);
		$row = mysqli_fetch_assoc($result);		
			
		$product_code = $row['product_code'];
		$product_name = $row['product_name'];
		//$product_price = $row['product_price'];
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
		 
	 }
	}else{
		unset($_SESSION["shopping_cart"]);
		echo '<script>window.location.href = "'.URL.'products";</script>';
	}
	
    global $adsid;
	

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    
    $time_start = microtime_float();
    $adsid = ''.substr(round(microtime_float()),8).''.date('is');
	
    $plaintext = ''.$adsid.'|10';
    //$plaintext = ''.$adsid.'|'.$totalAmount.'';
    
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

?>
<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
	   <span id="loading_response" class="col-12 d-none"><div class="textloading col-12">Processing......</div></span>	
      <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(<?php echo URL;?>assets/images/img-76.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">Confirmation</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="<?php echo URL;?>products">Products <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="<?php echo URL;?>cart">Shopping Cart <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="<?php echo URL;?>checkout">Check out <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="">Confirmation</a></li>
                  </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Process Section of the Page -->
        <div class="mt-process-sec">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <ul class="list-unstyled process-list">
                  <li class="active">
                    <span class="counter">01</span>
                    <strong class="title">Shopping Cart</strong>
                  </li>
                  <li class="active">
                    <span class="counter">02</span>
                    <strong class="title">Check Out</strong>
                  </li>
                  <li>
                    <span class="counter">03</span>
                    <strong class="title">Order Complete</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- Mt Process Section of the Page end -->
        <!-- Mt Product Table of the Page -->
<?php

	  //var_dump($_SESSION['user_details']);


?>
       <section class="mt-detail-sec toppadding-zero">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12 text-center">
                  
              </div>    
              <div class="col-xs-12 col-sm-12 text-center">
				<span id="testing"></span>	
                <!-- Bill Detail of the Page -->
                <form id="processFormNew" action="<?php echo $url;?>" method="POST" class="bill-detail onlinePay text-center">
                  <input type="hidden" name="country" value="<?php echo $country; ?>">
				  <input type="hidden" name="totalAmount" id="totalAmount" value="<?php echo $totalAmount; ?>"/>
				  <input type="hidden" name="totalShippingCharge" id="totalShippingCharge" value="<?php echo $totalShippingCharge; ?>"/>
				  <input type="hidden" name="plaintext" id="plaintext" value="<?php echo $plaintext; ?>"/>
				  <input type="hidden" name="url" id="url" value="<?php echo $url; ?>"/>
				  <input type="hidden" name="custom_fields" id="custom_fields" value="<?php echo $custom_fields;?>"/>
				  <input type="hidden" name="process_currency" value="LKR">
				  <input type="hidden" name="secret_key" value="ff4f0f97-209a-4ea2-a0e6-a55f3a931bc2" >  
				  <input type="hidden" name="enc_method" value="JCs3J+6oSz4V0LgE0zi/Bg==">
		          <input type="hidden" name="payment" value="<?php echo $payment; ?>" 				  
				  <input type="hidden" name="cms" value="PHP">
				  <input type="hidden" name="shipCharge" class="shipCharge" value="<?php echo $shipCharge;?>"/>
				  <input type="hidden" id="gotoprocess" value="<?php echo $gotoprocess;?>"/>
				  <input type="hidden" class="form-control" id="name" name="first_name" value="<?php echo $first_name;?>">
				  <input type="hidden" class="form-control" id="name2" name="last_name" value="<?php echo $last_name;?>">
				  <input type="hidden" class="form-control" id="address" name="address_line_one" value="<?php echo $address_line_one;?>">
				  <input type="hidden" class="form-control" id="province" name="state" value="<?php echo $state;?>">
				  <input type="hidden" class="form-control" id="district" name="city" value="<?php echo $city;?>">
				  <input type="hidden" class="form-control" id="zipcode" name="postal_code" value="<?php echo $postal_code;?>" >
				  <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email;?>">
				  <input type="hidden" class="form-control" id="mobile" name="contact_number" value="<?php echo $contact_number;?>">
				  <input type="hidden" class="form-control" id="addressnew" name="address_line_two" value="<?php echo $address_line_two;?>" >
                 
                
                <!-- Bill Detail of the Page end -->
              </div>
              <div class="col-xs-12 col-sm-12 text-center">
                <div class="holder">
                  <h2>ORDER FROM <?php echo strtoupper($name.' '.$name2);?></h2>
                  <ul class="list-unstyled block">
                    <li>
					   <div class="table-responsive stxt-holder">
						<table class="table table-sm">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">PRODUCTS</th>
							  <th scope="col">TOTALS</th>
							</tr>
						  </thead>
						  <tbody id="fetch_check_cart">
						  </tbody>
						</table>
					  </div>		
                    </li>
                    <li>
                      <div class="txt-holder">
                        <strong class="title sub-title pull-left">CART SUBTOTAL</strong>
                        <div class="txt pull-right">
                          <span><i class="fa fa-eur d-none"></i><span id="checkoutsubtotal"></span></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="txt-holder">
                        <strong class="title sub-title pull-left">SHIPPING CHARGE</strong>
                        <div class="txt pull-right">
                          <span class="shipCharge"></span>
                        </div>
                      </div>
                    </li>
                    <li style="border-bottom: none;">
                      <div class="txt-holder">
                        <strong class="title sub-title pull-left">ORDER TOTAL</strong>
                        <div class="txt pull-right">
                          <span><i class="fa fa-eur d-none"></i><span id="checkouttotal"></span></span>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <h4>I HAVE AGREE THIS ONLINE PAYMENT METHODS AND COMPANY TERMS AND CONDITIONS</h2>
                  <!-- Panel Group of the Page -->
                  
                  <!-- Panel Group of the Page end -->
                </div>
                <div class="block-holder">
                  <input type="checkbox" checked> I’ve read &amp; accept the <a href="<?php echo URL;?>termsconditions" target="_new">terms &amp; conditions</a>
                </div>
                <!--<a href="#" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>-->
				<button type="submit" class="checkoutbtn notranslate text-center ui-btn is-important post-jobs mr-3">CLICK TO CONFIRM ORDER </button>
				</form>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
      </main><!-- Main of the Page end here -->