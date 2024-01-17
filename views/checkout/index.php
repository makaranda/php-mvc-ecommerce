<?php
    
	include('libs/connection.php');
    unset($_SESSION['user_details']);
	//unset($_SESSION["shopping_cart"]);
    //var_dump($_SESSION['user_details']);
    //var_dump($_SESSION["user_id"]);
	//array(6) { ["loggedInUser"]=> bool(true) ["user_name"]=> string(28) "makarandapathirana@gmail.com" ["user_password"]=> string(3) "123" ["user_id"]=> string(6) "964651" 
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
	//SELECT `id`, `user_id`, `user_first_name`, `user_last_name`, `user_address`, `user_province`, `user_district`, `user_city`, `zip_code`, `email_address`, `phone_number`, `user_password`, `user_password_re`, `date_time` FROM `users_tbl` WHERE 1
	if(isset($_SESSION["loggedInUser"],$_SESSION["user_real_name"],$_SESSION["user_id"]) && $_SESSION["loggedInUser"] == true){
		//$selectuserSQL = "SELECT * FROM `users_tbl` WHERE `email_address` = '".$_SESSION["user_name"]."' AND `user_password` = '".md5($_SESSION["user_password"])."'";
		$selectuserSQL = "SELECT * FROM `users_tbl` WHERE `user_id` = '".$_SESSION["user_id"]."'";
		$resultUser = mysqli_query($conn, $selectuserSQL);
		$rowUser = mysqli_fetch_assoc($resultUser);	
		
		$reguser_id = $rowUser['user_id'];
        $reguser_first_name = $rowUser['user_first_name']; 
        $reguser_last_name = $rowUser['user_last_name'];
        $reguser_address = $rowUser['user_address'];
        $reguser_province = $rowUser['user_province'];
        $reguser_district = $rowUser['user_district'];
        $reguser_city = $rowUser['user_city'];
        $reguserzip_code = $rowUser['zip_code'];
        $reguseremail_address = $rowUser['email_address'];
        $reguserphone_number = $rowUser['phone_number'];
        $reguser_password = $rowUser['user_password'];
        $reguser_password_re = $rowUser['user_password_re'];
    
        $reguser_password_new = $rowUser['user_password'];
        
        $regCustName = ''.$reguser_first_name.' '.$reguser_last_name.'';
        
        //echo $selectuserSQL;
        
        $readonly = 'readonly';
        
        $userregistered = 'yes';
        
	}else{
		$reguser_id = '';
        $reguser_first_name = ''; 
        $reguser_last_name = '';
        $reguser_address = '';
        $reguser_province = '';
        $reguser_district = '';
        $reguser_city = '';
        $reguserzip_code = '';
        $reguseremail_address = '';
        $reguserphone_number = '';
        $reguser_password = '';
        $reguser_password_re = '';	
        
        $reguser_password_new = '';
        
        $regCustName = '';
        
        $readonly = 'readonly';
        
        $userregistered = 'no';        
	}
	
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
    global $provinceList;

    $query = "SELECT id,post_province_name FROM post_province GROUP BY post_province_name ORDER BY post_province_name ASC";	
    $result = mysqli_query($conn, $query);
    
    
    while($row = mysqli_fetch_array($result))
    {
        $provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	   
         
       //$provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	
    }	

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    
    $time_start = microtime_float();
    $adsid = ''.substr(round(microtime_float()),8).''.date('is');
	

    $plaintext = ''.$adsid.'|10';
    
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
<!--<div id="dialog" title="Basic dialog">
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>-->
	<span id="loading_response" class="col-12 d-none"><div class="textloading col-12">Processing......</div></span>	
    <div class="col-sm-12 col-md-12">
		<div class="row justify-content-center">
		
			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
				<div class="row justify-content-center">	
					<div class="col-12 col-sm-12 col-md-12">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb bg-transparent">
							<li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?php echo URL;?>shop">Shop</a></li>
							<li class="breadcrumb-item active" aria-current="page">Checkout</li>
						  </ol>
						</nav>
					</div>
				</div>		
				<h3 class="et_pb_text_4"><strong>Checkout</strong></h3>
			</div>
		<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">	

       <section class="mt-detail-sec toppadding-zero">
          <input type="hidden" id="userregtype" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){echo 'alreadyuser';}else{echo 'newuser';}?>"/> 
          <input type="hidden" id="userregistered" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){echo $userregistered;}else{echo 'no';}?>"/> 
          <input type="hidden" id="regEmailAddressVeryfy" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){echo 'verify';}else{echo 'not';}?>"/> 
          <input type="hidden" id="regEmailAddressPasswordVerify" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){echo 'verify';}else{echo 'not';}?>"/> 
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <h2>ORDER CONFIRMATION</h2>
				<span id="testing"></span>
				<div class="row">
				    <div class="col-12 col-md-12">

                <div id="accordion2">
                    
                  <div class="card">
                    <div class="card-header" id="headingOne2">
                      <h5 class="mb-0 mt-0">
                        <button class="btn btn-link regalreadyuser text-dark font-weight-bold" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                          Already Registerd User - click here
                        </button>
                      </h5>
                    </div>
                
                    <div id="collapseOne2" class="collapse <?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){echo 'show in';}else{echo '';}?>" aria-labelledby="headingOne2" data-parent="#accordion2">
                      <div class="card-body bill-detail">
                      <!--<form id="processFormReg" method="POST">-->
                      
                        <fieldset>
                            <div class="row form-group">
        					  <div class="col-md-12">
        					    <span class="text-success w-100 emailverifymessage"></span>  	
        						<input type="text" class="form-control" id="regEmailAddress" name="regEmailAddress" placeholder="Email Address" required data-parsley-type="email" data-parsley-trigger="focusout" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id'])){echo $reguseremail_address;}else{}?>" <?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_name'])){echo $readonly;}else{}?>>
        					   </div>
        					 </div>  
        					 <div class="row form-group">  
        					  <div class="col-md-12">
        					    <span class="text-success w-100 emailpasswordverifymessage"></span> 	
        						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Password" required data-parsley-trigger="keyup" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id'])){echo $reguser_password_re;}else{}?>">
        					   </div>	
                            </div>
                            <div class="form-group">
                              <input type="checkbox" id="regOtheraddress2" name="regOtheraddress2"> Ship to a different address?
                            </div> 
        					 <div class="row form-group">  
        					  <div class="col-md-12">	
        						<input type="text" class="form-control" id="regPhone" name="regPhone" placeholder="Phone" value="<?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id'])){echo $reguserphone_number;}else{}?>">
        					   </div>	
                            </div>
                            <div class="form-group">
        					  <select class="form-control provCity2 proDisCity2" id="province2" name="state" required>
        						<option value="">Select Province</option>
        						<?php
        							echo $provinceList;
        						?>
        					  </select>
                            </div>
                            <div class="form-group">
        					  <select class="form-control provCity2" id="district2" name="city" required>
        						<option value="">Select District</option>
        					  </select>					  
                            </div>                            
                            <div class="form-group">
        					  <span class="text-success w-100 addressverify"></span> 
                              <textarea class="form-control" id="regAddressnew" name="regAddressnew" placeholder="Ship to a different address"></textarea>
                            </div> 
        					 <div class="row form-group">  
        					  <div class="col-md-12 text-center">
								<p class="">Don't have an account yet..?</p>	
        						<button class="btn-type1 bar-opener2 btn-danger side-opener pr-4 pl-4" type="button">Sign up</button>
        					   </div>	
                            </div>
                        </fieldset>  
                        <!--</form>-->
                       </div>
                    </div> 
                  </div> 
                  <div class="card <?php if(isset($_SESSION['loggedInUser'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){echo 'd-none';}else{echo '';}?>">
                    <div class="card-header" id="headingTwo2">
                      <h5 class="mb-0 mt-0">
                        <button class="btn btn-link regnewuser text-dark font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
                          Register As a New User - click here
                        </button>
                      </h5>
                    </div>
                    <?php //if(isset($_SESSION['loggedInUser'],$_SESSION['user_name']) && $_SESSION['loggedInUser'] == true){echo 'cashDeli';}else{echo 'onlinePay';}?>
                    <div id="collapseTwo2" class="collapse show" aria-labelledby="headingTwo2" data-parent="#accordion2">
                      <div class="card-body">
                        <form id="processFormNew" action="<?php echo URL;?>confirmation" method="POST" class="bill-detail w-100 ">
                          <input type="hidden" name="country" id="country" value="Sri Lanka">
        				  <input type="hidden" name="totalAmount" id="totalAmount" value=""/>
        				  <input type="hidden" name="totalwithoutshipping" id="totalwithoutshipping" value=""/>
        				  <input type="hidden" name="totalwithshipping" id="totalwithshipping" value=""/>
        				  <input type="hidden" name="totalShippingCharge" id="totalShippingCharge" value=""/>
        				  <input type="hidden" name="plaintext" id="plaintext" value=""/>
        				  <input type="hidden" name="url" id="url" value=""/>
        				  <input type="hidden" name="custom_fields" id="custom_fields" value="<?php echo $custom_fields;?>"/>
        				  <input type="hidden" name="process_currency" id="process_currency" value="LKR">
        				  <input type="hidden" name="secret_key" id="secret_key" value="ff4f0f97-209a-4ea2-a0e6-a55f3a931bc2" >  
        				  <input type="hidden" name="enc_method" id="enc_method" value="JCs3J+6oSz4V0LgE0zi/Bg==">
        		          <input type="hidden" name="payment" id="payment" value="<?php echo $payment; ?>" 				  
        				  <input type="hidden" name="cms" id="cms" value="PHP">
        				  <input type="hidden" name="shipCharge" id="shipCharge" class="shipCharge" value=""/>
        				  <input type="hidden" id="gotoprocess" value="<?php echo $gotoprocess;?>"/>
                          <fieldset>
                            <div class="row form-group">
        					  <div class="col-md-6">	
        						<input type="text" class="form-control fname" id="name" name="first_name" placeholder="Name" required data-parsley-trigger="keyup"/>
        					   </div>
        					  <div class="col-md-6">	
        						<input type="text" class="form-control lname" id="name2" name="last_name" placeholder="Name" required data-parsley-trigger="keyup">
        					   </div>	
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" id="address" name="address_line_one" placeholder="Address" required data-parsley-trigger="keyup"></textarea>
                            </div>
                            <div class="form-group">
        					  <select class="form-control provCity proDisCity" id="province" name="state" required>
        						<option value="">Select Province</option>
        						<?php
        							echo $provinceList;
        						?>
        					  </select>
                            </div>
                            <div class="form-group">
        					  <select class="form-control provCity" id="district" name="city" required>
        						<option value="">Select District</option>
        					  </select>					  
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="zipcode" name="postal_code" placeholder="Postcode / Zip" required data-parsley-trigger="keyup">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control searchEmail email" id="email" name="email" placeholder="Email Address" required data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail data-parsley-checkemail-message="Email Address already Exists please use already registerd user tab"/>
                            </div>
        					<div class="form-group">
                                <input type="number" class="form-control" id="mobile" name="contact_number" placeholder="Phone Number" required data-parsley-trigger="keyup">
                            </div>
                            <div class="form-group">
                              <input type="checkbox" id="otheraddress" name="otheraddress"> Ship to a different address?
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" id="addressnew" name="address_line_two" placeholder="Ship to a different address"></textarea>
                            </div>
                          </fieldset>
                        
                        <!-- Bill Detail of the Page end -->
                      </div>
                    </div>
                  </div>
                  
                </div>				
                <!-- Bill Detail of the Page -->
				        
				    </div>
				</div>
				
              </div>
              

                      <div class="col-xs-12 col-sm-6">
                        <div class="holder">
                          <h2>YOUR ORDER</h2>
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
                          <h2>PAYMENT METHODS</h2>
                          <!-- Panel Group of the Page -->
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                             <div class="form-check border-top pt-3 pb-3">
                              <label class="form-check-label paymentmethodtext cursor-pointer" for="exampleRadios1">
                                Online Payment - Click here
                              </label>
                              <input type="radio" class="chkonline paymentMethotType form-check-input float-right cursor-pointer" name="paymentmethods" id="exampleRadios1" value="online">
                            </div>
                            <div class="form-check border-top border-bottom pt-3 pb-3">
                              <label class="form-check-label paymentmethodtext cursor-pointer" for="exampleRadios2">
                                Cash On Delivery - Click here
                              </label>
                              <input type="radio" class="chkcashondelivery paymentMethotType form-check-input float-right cursor-pointer" name="paymentmethods" id="exampleRadios2" value="cashondelivery" checked>
                            </div>       
                            <!-- Panel Panel Default of the Page -->
                            <div class="panel panel-default onlinePayment2 d-none">
                              <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                  <a class="onlinePayment" role="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="" title="Please Click here to pay via online..!!">
                                    Online Payment - Click here
                                    <!--<span class="check"><i class="fa fa-check"></i></span>
                                    
                                    <input type="radio" class="chkonline form-check-input paymentMethotType float-right" name="paymentmethodstype" id="exampleRadios2" value="online">
                                  -->
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 col-4">
                                            <div class="w-100 drz-footer-width-25 payment-column">
                                            
                                            
                                              <span class="drz-icon-payment drz-footer-sprit icon-yatra-payment-7"></span>
                                            
                                              <span class="drz-icon-payment drz-footer-sprit icon-yatra-payment-8"></span>
                                            
                                            </div>                                            
                                        </div>
                                        <div class="col-md-9 col-8">
                                            <p>Make your payment directly into our bank account. Please use your order id as the payment reference. Your order wont be shippided until the funds have cleared in our account</p>
                                        </div>
                                    </div>
                                  
                                </div>
                              </div>
    
                            </div>
                            <!-- Panel Panel Default of the Page end -->
                            <!-- Panel Panel Default of the Page -->
                            <div class="panel panel-default cashOnDelivery2 d-none">
                              <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                  <a role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="collapsed cashOnDelivery" title="Please Click here to pay via cash on delivery..!!">
                                    Cash On Delivery - Click here
                                    <!--<span class="check"><i class="fa fa-check"></i></span>
                                    <input type="radio" class="chkcashondelivery form-check-input paymentMethotType float-right" name="paymentmethodstype" id="exampleRadios1" value="cashondelivery" checked>
                                  -->
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="panel-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 col-4">
                                            <div class="w-100 drz-footer-width-25 payment-column">
                                            
                                              <span class="drz-icon-payment drz-footer-sprit icon-yatra-payment-1"></span>
                                            
                                            </div>                                            
                                        </div>
                                        <div class="col-md-9 col-8">
                                            <p>Make your payment directly into our bank account. Please use your order id as the payment reference. Your order wont be shippided until the funds have cleared in our account</p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!-- Panel Panel Default of the Page end -->
                          </div>
                          <!-- Panel Group of the Page end -->
                        </div>
                        <div class="block-holder">
                          <input type="checkbox" id="termsconditions" name="termsconditions"  data-parsley-checkmin="1" required/> I’ve read &amp; accept the <a href="<?php echo URL;?>termsconditions" target="_new">terms &amp; conditions</a>
                        </div>
                        <!--<a href="#" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>-->
        				<!--<button type="button" class="btn checkoutbtn3 d-none">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>-->
        				<button type="button" class="btn checkoutbtn2">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
        				<!--<button type="button" class="btn checkoutbtn1 d-none">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>-->
        				<button type="button" class="btn checkoutbtn4 d-none">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
        				</form>
                       </div>              
              
              
            </div>
          </div>
        </section>
		
		</div>
	</div>
</div>	

        