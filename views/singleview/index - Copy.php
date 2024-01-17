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
			<input type="hidden" id="province" value="">
			<input type="hidden" id="district" value="">
			<main id="mt-main">
				<section class="mt-contact-banner style4" style="background-image: url(<?php echo URL;?>assets/images/img11.jpg);">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1><?php echo $product_name;?></h1>
								<!-- Breadcrumbs of the Page -->
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href=""><?php echo $product_name;?></a></li>

									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
							</div>
						</div>
					</div>
				</section><!-- Mt Contact Banner of the Page end -->			
				<!-- Mt Product Detial of the Page -->
				<section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<!-- Slider of the Page -->
								<div class="slider exzoom_img_box">
									<!-- Comment List of the Page -->
									<ul class="list-unstyled comment-list d-none">
										<li><a href="#"><i class="fa fa-heart"></i>27</a></li>
										<li><a href="#"><i class="fa fa-comments"></i>12</a></li>
										<li><a href="#"><i class="fa fa-share-alt"></i>14</a></li>
									</ul>
									<!-- Comment List of the Page end -->
									<!-- Product Slider of the Page -->
									<div class="product-slider exzoom_img_ul">
										<div class="slide">
											<img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image1;?>" alt="<?php echo $product_name;?>" class="zoom-img1">
										</div>
										<div class="slide">
											<img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image2;?>" alt="<?php echo $product_name;?>" class="zoom-img1">
										</div>
										<div class="slide">
											<img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image3;?>" alt="<?php echo $product_name;?>" class="zoom-img1">
										</div>
										<div class="slide">
											<img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image4;?>" alt="<?php echo $product_name;?>" class="zoom-img1">
										</div>
										<div class="slide">
											<img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image5;?>" alt="<?php echo $product_name;?>" class="zoom-img1">
										</div>
									</div>
									<!-- Product Slider of the Page end -->
									<!-- Pagg Slider of the Page -->
									<ul class="list-unstyled slick-slider pagg-slider">
										<li><div class="img"><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image1;?>" alt="<?php echo $product_name;?>"></div></li>
										<li><div class="img"><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image2;?>" alt="<?php echo $product_name;?>"></div></li>
										<li><div class="img"><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image3;?>" alt="<?php echo $product_name;?>"></div></li>
										<li><div class="img"><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image4;?>" alt="<?php echo $product_name;?>"></div></li>
										<li><div class="img"><img src="<?php echo URL;?>assets/uploads/products/<?php echo $product_image5;?>" alt="<?php echo $product_name;?>"></div></li>
									</ul>
									<!-- Pagg Slider of the Page end -->
								</div>
								<div class="exzoom_nav"></div>
								<!-- Slider of the Page end -->
								<!-- Detail Holder of the Page -->
								<div class="detial-holder">
									<!-- Breadcrumbs of the Page -->
									<ul class="list-unstyled breadcrumbs">
										<li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="<?php echo URL;?>products">Products <i class="fa fa-angle-right"></i></a></li>
									</ul>
									<!-- Breadcrumbs of the Page end -->
									<h2><?php echo $product_name;?></h2>
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
										<li><a href="<?php echo URL;?>products"><i class="fa fa-exchange"></i>COMPARE</a></li>
										<li class="d-none"><a href="#"><i class="fa fa-heart"></i>ADD TO WISHLIST</a></li>
									</ul>
									<div class="txt-wrap">
										<p><?php echo $product_name;?></p>
									</div>
									<div class="text-holder">
<?php
											if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
												$discountPrice = ($row['discount_rate'] / 100);
												$discountPrice = $row['product_price'] * $discountPrice;
												$discountPrice = $row['product_price'] - $discountPrice;
												echo '<del class="off">RS '.$row['product_price'].'</del>';
												echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.round($discountPrice).'</span></span>';
											}else{
												echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.$row['product_price'].'</span></span>';
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
										</fieldset>
									</form>-
									<!-- Product Form of the Page end -->
								</div>
								<!-- Detail Holder of the Page end -->
							</div>
							
						</div>
					</div>
				</section><!-- Mt Product Detial of the Page end -->
				<div class="product-detail-tab wow fadeInUp d-none" data-wow-delay="0.4s">
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
				<div class="related-products mt-4 wow fadeInUp" data-wow-delay="0.4s">
					<div class="container pl-3 pr-3">
						<div class="row justify-content-center">
							<div class="col-xs-12">
							<h2>RELATED PRODUCTS</h2>
								<div class="row">
									<div class="col-xs-12">
<?php

				
				$featureProSQL = "SELECT * FROM `products_tbl` WHERE `product_code` != '$product_code' AND`sell_type` = '$sell_type' ORDER BY `id` DESC LIMIT 5";
				$featureProRSL = mysqli_query($conn, $featureProSQL);	
				while($featureProRow = mysqli_fetch_assoc($featureProRSL)){				
?>
										<div class="mt-product1 mt-paddingbottom20">
											<input type="hidden" value="<?php echo $featureProRow['product_price'];?>" id="price<?php echo $featureProRow['product_code'];?>"/>
											<input type="hidden" value="1" id="quantity<?php echo $featureProRow['product_code'];?>"/>
											<input type="hidden" value="<?php echo $featureProRow['product_name'];?>" id="name<?php echo $featureProRow['product_code'];?>"/>
											<div class="box">
												<div class="b1">
													<div class="b2">
														<a href="<?php echo URL.'single/product/'.$featureProRow['product_url'];?>"><img src="<?php echo URL;?>assets/uploads/products/<?php if(isset($featureProRow['product_image']) && $featureProRow['product_image'] != ''){echo $featureProRow['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $featureProRow['product_name'];?>"></a>
														<span class="caption">
															<span class="new"><?php echo $sell_type;?></span>
														</span>
														<ul class="mt-stars d-none">
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
														<ul class="links">
															<li><a id="<?php echo $featureProRow['product_code'];?>" class="add_to_cart cursor-pointer"><i class="icon-handbag"></i><span>Add to Cart</span></a></li>
															<li><a href="<?php echo URL.'single/product/'.$featureProRow['product_url'];?>" class="lightbox"><i class="icomoon icon-eye"></i></a></li>
															<li class="d-none"><a href="#"><i class="icomoon icon-exchange"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="txt">
												<strong class="title"><a href="product-detail.html"><?php echo $featureProRow['product_name'];?></a></strong>
														<?php 
															if(isset($featureProRow['is_discount']) && $featureProRow['is_discount'] == 'yes'){
																$discountPrice = ($featureProRow['discount_rate'] / 100);
																$discountPrice = $featureProRow['product_price'] * $discountPrice;
																$discountPrice = $featureProRow['product_price'] - $discountPrice;
																echo '<del class="off">RS '.$featureProRow['product_price'].'</del>';
																echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.round($discountPrice).'</span></span>';
															}else{
																echo '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.$featureProRow['product_price'].'</span></span>';
															}
															
														;?>
											</div>
										</div>
									
<?php
				}
			
?>									
									
			
									</div>
								</div>
							</div>
						</div>
					</div><!-- related products end here -->
				</div>
			</main>