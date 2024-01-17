<?php
	include('libs/connection.php');
	//var_dump($_SESSION);
	//unset($_SESSION["shopping_cart"]);
	
	$output = '';
	$output2 = '';
	global $total_price;
	global $total_item;
	global $output;
	global $output2;
	global $gotocheckout;
	$total_price = 0;
	$total_item = 0;
	
	if(!empty($_SESSION["shopping_cart"]))
	{
	    $gotocheckout = 'gotocheckout';	

	}else{
		unset($_SESSION["shopping_cart"]);
		echo '<script>window.location.href = "'.URL.'shop";</script>';
	}
	



?>
	<input type="hidden" id="province" value="">
	<input type="hidden" id="district" value="">
	
	<input type="hidden" id="gotocheckout" value="<?php echo $gotocheckout;?>"/>
	<div class="col-12 col-sm-10 col-md-10 mt-5">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb bg-transparent">
				<li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo URL;?>shop">Shop</a></li>
				<li class="breadcrumb-item active" aria-current="page">Cart</li>
			  </ol>
			</nav>
		</div>
		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12">
					<h2>Cart</h2>
				</div>
				<div class="col-12 col-sm-12 col-md-12">
					<div class="mt-product-table">
					  <div class="container">
						<div class="row border cartheader">
						  <div class="col-xs-12 col-sm-2">
							<strong class="title">PRODUCT</strong>
						  </div>
						  <div class="col-xs-12 col-sm-2">
							<strong class="title">PRODUCT NAME</strong>
						  </div>
						  <div class="col-xs-12 col-sm-2">
							<strong class="title">PRICE</strong>
						  </div>
						  <div class="col-xs-12 col-sm-2">
							<strong class="title">DISCOUNT</strong>
						  </div>
						  <div class="col-xs-12 col-sm-2">
							<strong class="title">QUANTITY</strong>
						  </div>
						  <div class="col-xs-12 col-sm-2">
							<strong class="title">TOTAL</strong>
						  </div>
						</div>
						<div id="cart_page_details">
						
						</div>

					  </div>
					</div><!-- Mt Product Table of the Page end -->
					<!-- Mt Detail Section of the Page -->
					<section class="mt-detail-sec style1 pt-2">
					  <div class="container">
						<div class="row">
						  <div class="col-12 col-sm-6">
			   
						  </div>
						  <div class="col-12 col-sm-6" id="total_cart_details">

						  </div>
						</div>
					  </div>
					</section>
					
				</div>
			 </div>			
		</div>
	</div>		
</div>					
		
		