<?php
	include('libs/connection.php');
    $allURL = explode('/',$_GET['url']);
	if($allURL[0] == 'single'){
		$prourl = $allURL[2];
	}else{
		//echo '<script>window.location.href = "'.URL.'";</script>';
	}
	
	//echo $prourl;

    $selectSQL = "SELECT * FROM `products_tbl` WHERE `product_url` = '$prourl'";
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
	
    $selectSQL2 = "SELECT * FROM `products_gallery_tbl` WHERE `product_url` = '$prourl' AND `product_code` = '$product_code'";
    $result2 = mysqli_query($conn, $selectSQL2);
    $row2 = mysqli_fetch_assoc($result2);
	
	//echo $selectSQL2;
		
	if(isset($row2['product_image1']) && $row2['product_image1'] != ''){
		$product_image1 = $row2['product_image1'];
	}else{
		$product_image1 = 'fans_sample.jpg';
	}
	
	if(isset($row2['product_image2']) && $row2['product_image2'] != ''){
		$product_image2 = $row2['product_image2'];
	}else{
		$product_image2 = 'fans_sample.jpg';
	}
	
	if(isset($row2['product_image3']) && $row2['product_image3'] != ''){
		$product_image3 = $row2['product_image3'];
	}else{
		$product_image3 = 'fans_sample.jpg';
	}
	
	if(isset($row2['product_image4']) && $row2['product_image4'] != ''){
		$product_image4 = $row2['product_image4'];
	}else{
		$product_image4 = 'fans_sample.jpg';
	}
	
	if(isset($row2['product_image5']) && $row2['product_image5'] != ''){
		$product_image5 = $row2['product_image5'];
	}else{
		$product_image5 = 'fans_sample.jpg';
	}
	



?>
		<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
				<div class="row justify-content-center">	
					<div class="col-12 col-sm-12 col-md-12">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb bg-transparent">
							<li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo URL;?>shop">Shop</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $product_name;?></li>
						  </ol>
						</nav>
					</div>
				</div>		
				<h3 class="et_pb_text_4 d-none"><strong>Shop</strong></h3>
		  </div>
		  <div class="col-12 col-md-10">
			<div class="row justify-content-center">
				<input type="hidden" id="province" value="">
				<input type="hidden" id="district" value="">		
				<!-- Mt Product Detial of the Page -->
				<section class="col-12 col-md-12 mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<!-- Slider of the Page -->
								  <div class="slider">
									<div class="exzoom hidden" id="exzoom">
										<div class="exzoom_img_box">
											<ul class='exzoom_img_ul'>
												<li><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image1;?>"/></li>
												<li><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image2;?>"/></li>
												<li><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image3;?>"/></li>
												<li><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image4;?>"/></li>
												<li><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image5;?>"/></li>
											</ul>
										</div>
										<div class="exzoom_nav"></div>
										<p class="exzoom_btn">
											<a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
											<a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
										</p>
									</div>
								 </div>								
								<div class="exzoom_nav"></div>
								<!-- Slider of the Page end -->
								<!-- Detail Holder of the Page -->
								<div class="detial-holder">
									<!-- Breadcrumbs of the Page -->
									<ul class="list-unstyled breadcrumbs d-none">
										<li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="<?php echo URL;?>products">Products <i class="fa fa-angle-right"></i></a></li>
									</ul>
									<!-- Breadcrumbs of the Page end -->
									<h2 class="text-capitalize"><?php echo $product_name;?></h2>
									<!-- Rank Rating of the Page -->
									<div class="rank-rating d-none">
										<ul class="list-unstyled rating-list">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o"></i></a></li>
										</ul>
										<span class="total-price">Reviews (12)</span>
									</div>
									<!-- Rank Rating of the Page end -->
									<ul class="list-unstyled list">
										<li><a href="#"><i class="fa fa-share-alt"></i>SHARE</a></li>
										<li class="d-none"><a href="<?php echo URL;?>products"><i class="fa fa-exchange"></i>COMPARE</a></li>
										<li class="d-none"><a href="#"><i class="fa fa-heart"></i>ADD TO WISHLIST</a></li>
									</ul>
									<div class="txt-wrap">
										<p><?php echo $product_description;?></p>
									</div>
									<div class="text-holder">
<?php
											if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
												$discountPrice = ($row['discount_rate'] / 100);
												$discountPrice = $row['product_price'] * $discountPrice;
												$discountPrice = $row['product_price'] - $discountPrice;
												echo '<del class="off">Rs '.$row['product_price'].'</del>';
												echo '<span class="price"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
											}else{
												echo '<span class="price"><i class="fa fa-eur d-none"></i>Rs <span>'.$row['product_price'].'</span></span>';
											}
?>
										<span class="price d-none">$ 79.00 <del>399,00</del></span>
									</div>
									<!-- Product Form of the Page -->
									<!--<form action="#" class="product-form">-->
										<fieldset>
											<form class="product-form">
												<div class="row-val">
													<label for="qty">qty</label>
													<input type="hidden" value="<?php echo $product_price;?>" id="price<?php echo $product_code;?>">
													<input type="hidden" value="<?php echo $product_name;?>" id="name<?php echo $product_code;?>">
													<input type="number" value="1" step="1" min="1" max="1000" id="quantity<?php echo $product_code;?>" placeholder="1">
												</div>
												<div class="row-val">
													<button type="button" id="<?php echo $product_code;?>" class="add_to_cart">ADD TO CART</button>
												</div>
											</form>
										</fieldset>
										
									<!-- Product Form of the Page end -->
								</div>
								<!-- Detail Holder of the Page end -->
							</div>
				
					
						</div>
					</div>
				</section><!-- Mt Product Detial of the Page end -->
				<div class="col-12 col-md-12 product-detail-tab wow fadeInUp d-none" data-wow-delay="0.4s">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<ul class="mt-tabs text-center text-uppercase">
									<li><a href="#tab1" class="active">DESCRIPTION</a></li>
									<li class="d-none"><a href="#tab2">INFORMATION</a></li>
									<li class="d-none"><a href="#tab3">REVIEWS (12)</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab1">
										<p>Koila is a chair designed for restaurants and food lovers in general. Designed in collaboration with restaurant professionals, it ensures comfort and an ideal posture, as there are armrests on both sides of the chair. </p>
										<p>Koila is a seat designed for restaurants and gastronomic places in general. Designed in collaboration with professional of restaurants and hotels field, this armchair is composed of a curved shell with a base in oak who has pinched the back upholstered in fabric or leather. It provides comfort and holds for ideal sitting position,the arms may rest on the sides ofthe armchair. <br>Solid oak construction.<br> Back in plywood (2  faces oak veneer) or upholstered in fabric, leather or eco-leather.<br> Seat upholstered in fabric, leather or eco-leather. <br> H 830 x L 585 x P 540 mm.</p>
									</div>
									<div id="tab2">
										<p>Koila is a chair designed for restaurants and food lovers in general. Designed in collaboration with restaurant professionals, it ensures comfort and an ideal posture, as there are armrests on both sides of the chair. </p>
										<p>Koila is a seat designed for restaurants and gastronomic places in general. Designed in collaboration with professional of restaurants and hotels field, this armchair is composed of a curved shell with a base in oak who has pinched the back upholstered in fabric or leather. It provides comfort and holds for ideal sitting position,the arms may rest on the sides ofthe armchair. <br>Solid oak construction.<br> Back in plywood (2  faces oak veneer) or upholstered in fabric, leather or eco-leather.<br> Seat upholstered in fabric, leather or eco-leather. <br> H 830 x L 585 x P 540 mm.</p>
									</div>
									<div id="tab3">
										<div class="product-comment">
											<div class="mt-box">
												<div class="mt-hold">
													<ul class="mt-star">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-o"></i></li>
													</ul>
													<span class="name">John Wick</span>
													<time datetime="2016-01-01">09:10 Nov, 19 2016</time>
												</div>
												<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit sse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
											</div>
											<div class="mt-box">
												<div class="mt-hold">
													<ul class="mt-star">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-o"></i></li>
														<li><i class="fa fa-star-o"></i></li>
													</ul>
													<span class="name">John Wick</span>
													<time datetime="2016-01-01">09:10 Nov, 19 2016</time>
												</div>
												<p>Usmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit sse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
											</div>
											<form action="#" class="p-commentform">
												<fieldset>
													<h2>Add  Comment</h2>
													<div class="mt-row">
														<label>Rating</label>
														<ul class="mt-star">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
													</div>
													<div class="mt-row">
														<label>Name</label>
														<input type="text" class="form-control">
													</div>
													<div class="mt-row">
														<label>E-Mail</label>
														<input type="text" class="form-control">
													</div>
													<div class="mt-row">
														<label>Review</label>
														<textarea class="form-control"></textarea>
													</div>
													<button type="submit" class="btn-type4">ADD REVIEW</button>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- related products start here -->
				<div class="col-12 col-md-12 related-products mt-4 wow fadeInUp" data-wow-delay="0.4s">
					<div class="container pl-3 pr-3">
						<div class="row justify-content-center">
							<div class="col-12">
							<h2>RELATED PRODUCTS</h2>
								<div class="row">
									<div class="col-12">
										<div class="row justify-content-start">
<?php

				
				$featureProSQL = "SELECT * FROM `products_tbl` WHERE `product_code` != '$product_code' AND `product_category` = '$product_category' ORDER BY `id` DESC LIMIT 8";
				$featureProRSL = mysqli_query($conn, $featureProSQL);	
				while($featureProRow = mysqli_fetch_assoc($featureProRSL)){		

				
				if(isset($featureProRow['product_qty']) && $featureProRow['product_qty'] == '0'){
					$label = '<span class="p-2 new bg-danger text-white">Out of Order</span>';
				}else{
					$label = '<span class="new">FEATURED</span>';					
				}
				//$is_discount = '';
				if(isset($featureProRow['is_discount']) && $featureProRow['is_discount'] == 'yes'){
					$discountPrice = ($featureProRow['discount_rate'] / 100);
					$discountPrice = $featureProRow['product_price'] * $discountPrice;
					$discountPrice = $featureProRow['product_price'] - $discountPrice;
					$is_discount = 'yes';
					$beforeDscount = '<del class="off w-100 text-danger">Rs '.$featureProRow['product_price'].'</del>';
					$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
				}else{
					$is_discount = 'no';
					$discountPrice = $featureProRow['product_price'];
					$beforeDscount = '';
					$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$featureProRow['product_price'].'</span></span>';
				}				
?>										
										<div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2 mb-2">
											<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $featureProRow['product_code'];?>"/>
											<input type="hidden" value="1" id="quantity<?php echo $featureProRow['product_code'];?>"/>
											<input type="hidden" value="<?php echo $featureProRow['product_name'];?>" id="name<?php echo $featureProRow['product_code'];?>"/>					
											<div class="row justify-content-center p-1 m-2 shadow">
												<div class="col-12 col-md-12 shop_image">
													<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($featureProRow['product_image']) && $featureProRow['product_image'] != ''){echo $featureProRow['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $featureProRow['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
													<span class="product_message_real <?php if(isset($featureProRow['product_qty'],$is_discount) && $featureProRow['product_qty'] <= '0' && $featureProRow['is_discount'] == 'no'){echo 'd-none';}else{echo 'd-block';}?>">Sale!</span>
													<span class="product_message"><a class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
												</div>								
												<div class="col-12 col-md-12">
													<h2 class="product_title"><?php echo $featureProRow['product_name'];?></h2>
												</div>								
												<div class="col-12 col-md-12">
													<span class="price"><span class="price_amount">
														<?php 
															echo $beforeDscount;
															echo $dscount;															
														?>
													</span>
												</div>							
												<div class="col-12 col-md-12 text-center <?php if(isset($featureProRow['product_qty']) && $featureProRow['product_qty'] == '0'){echo 'd-none';}else{echo '';}?>" align="center">
												  <center>
													<a data-quantity="1" value="<?php echo $featureProRow['product_code'];?>" id="<?php echo $featureProRow['product_code'];?>" class="add_to_cart cursor-pointer button" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
													<a href="<?php echo URL.'single/product/'.$featureProRow['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
												  </center>	
												</div>								
											</div>
										</div>											
									
<?php
				}
			
?>									
									
										</div>
									</div>
<!--									
<div class="col-md-12 text-center">
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                
				<div class="carousel-item active">
                    <div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT241MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/electronics_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Electronics</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(19)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div> 	
				<div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT242MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/vehicles_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Vehicles</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(101)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT243MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/property_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Property</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(432)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT2411MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/jobs_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Jobs in Sri Lanka</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(0)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT242MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/vehicles_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Vehicles</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(101)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div></div> 		
				<div class="carousel-item ">
                    <div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT242MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/vehicles_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Vehicles</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(101)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div> 	
				<div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT243MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/property_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Property</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(432)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT2411MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/jobs_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Jobs in Sri Lanka</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(0)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT241MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/electronics_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Electronics</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(19)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT242MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/vehicles_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Vehicles</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(101)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div></div> 		
				<div class="carousel-item ">
                    <div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT243MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/property_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Property</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(432)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div> 	
				<div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT2411MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/jobs_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Jobs in Sri Lanka</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(0)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT241MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/electronics_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Electronics</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(19)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT242MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/vehicles_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Vehicles</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(101)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT243MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/property_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Property</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(432)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div></div> 		
				<div class="carousel-item ">
                    <div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT2411MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/jobs_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Jobs in Sri Lanka</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(0)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div> 	
				<div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT241MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/electronics_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Electronics</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(19)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT242MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/vehicles_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Vehicles</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(101)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT243MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/property_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Property</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(432)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div><div class="col-12 col-sm-6 col-md-3 cat-items-thumbs">	
						<div class="row justify-content-center cat-item-thumb mb-3 pt-4 mr-0 ml-0 pl-0 pr-0 dropdown">							
						<a data-id="CT2411MN54" class="adsCategories mainCat">
							<div class="col-md-12 p-0">
								<img src="https://ikmaninma.lk/images/categories/jobs_logo.jpg" class="rounded">
								<div class="row pl-0 pr-0 ml-0 mr-0 pb-1 pt-2 topCatContent">
									<div class="col-12">
										<span class="topCatContentSpan text-center">Jobs in Sri Lanka</span>
									</div>	
									<div class="col-12">	
										<span class="text-center topCatContentSpan pr-2 pb-2 pl-2">(0)</span>
									</div>
								</div>								
							</div>	
						</a>
					  </div>
					</div></div> 		
					
                
            </div>
            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
	</div>									
	-->								
								</div>
							</div>
						</div>
					</div><!-- related products end here -->
				</div>
			</div>
		 </div>