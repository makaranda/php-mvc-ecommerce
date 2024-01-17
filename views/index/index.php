<?php
include('libs/connection.php');

$query = "SELECT * FROM `products_tbl` WHERE `id` >= '1' ORDER BY `id` DESC LIMIT 20";
$result = mysqli_query($conn, $query);
$carosel1 = '';
if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
	$adid = $row["id"];
	$product_code = $row["product_code"];
	$pro_image = $row["product_image"];
	$product_name = $row["product_name"];
	$pro_unit_price = $row["product_cost_price"];
	$product_qty = $row["product_qty"];
	$product_url = $row["product_url"];
	if(!empty($product_qty) && $product_qty >= 1){
		$is_stock = 'stock_available';
	}else{
		$is_stock = 'stock_not_available';
	}
	
	$product_code_id = $product_code.''.$adid;
	
	$stock_qty = $product_qty;
	
	if(isset($row["pro_image"]) && $row["pro_image"] != ''){
		$image_no1 = $row["pro_image"];
	}else{
		$image_no1 = 'sample.jpg';
	}
	 if(isset($row['pro_discount']) && $row['pro_discount'] != ''){
		 $caption = '<span class="off">'.$row['pro_discount'].'% Off</span>';
	}else{
		$caption = '';
	}	
	if(empty($pro_image)){
		$pro_image = 'sample_image.jpg';
	}else{
		$pro_image = $pro_image;
	}	

			
			if(isset($row["pro_image"]) && $row["pro_image"] != ''){
				$image_no1 = $row["pro_image"];
			}else{
				$image_no1 = 'sample.jpg';
			}
			 if(isset($row['product_discount']) && $row['product_discount'] != ''){
				 $caption = '<span class="off">'.$row['product_discount'].'% Off</span>';
			}else{
				$caption = '';
			}
			
			if(!empty($row['product_discount'])){
				//$discountPrice = (((int)$row['pro_discount']) / 100);
				$discountPrice = $row['product_discount'];
				//$discountPrice = $row['pro_unit_price'] * $discountPrice;
				$discountPrice = $row['product_cost_price'] - $discountPrice;
				$discount_label =  '<del class="off">Rs '.$row['product_cost_price'].'</del>';
				$pro_unit_price_new = round($discountPrice);
								
				if(!empty($row['product_cost_price'])){
					$discount_label =  '<del class="off">Rs '.$row['product_cost_price'].'</del>';
				}else{
					$discount_label =  '';
				}
				
				if(!empty($row['product_cost_price'])){
					$pro_unit_price_label =  '<span class="price">Rs <i class="fa fa-eur d-none"></i><span>'.round($discountPrice).'</span></span>';
				}else{
					$pro_unit_price_label =  '';
				}
			}else{
				$discount_label = '';				
				$pro_unit_price_new = $pro_unit_price;
				
				if(!empty($row['product_cost_price'])){
					$pro_unit_price_label = '<span class="price">Rs <i class="fa fa-eur d-none"></i><span>'.$row['pro_unit_price'].'</span></span>';
				}else{
					$pro_unit_price_label =  '';
				}
			}	
	
    $carosel1 .= '<div class="col-12 mt-2 mb-2">
					<div class="row justify-content-center p-1 m-2 shadow">
						<div class="col-12 col-md-12 text-center">
							<img width="150px" height="auto" src="'.URL.'assets/uploads/products/'.$pro_image.'" class="cursor-pointer hvr-pulse" alt="" loading="lazy"/>
							<span class="product_message"><a data-quantity="1" value="'.$product_code.'" id="'.$product_code.'" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
						</div>								
						<div class="col-12 col-md-12 text-center">
							<h2 class="product_title">'.$product_name.'</h2>
						</div>
						<div class="col-12 col-md-12 text-center">
							<span class="price">
								<span class="price_amount">
									<del class="off w-100 text-danger">'.$discount_label.'</del>
									<span class="price price_amount w-100">
									<i class="fa fa-eur d-none"></i>
									   <span>'.$pro_unit_price_label.'</span>
									</span>								
								</span>
							</span>							
						</div>							
						<div class="col-12 col-md-12 text-center" align="center">
						  <center>
							<a data-quantity="1" class="cursor-pointer button add_to_cart_home btn btn-warning" data-product_id="'.$adid.'" data-product-price="'.$pro_unit_price.'" data-product-name="'.$product_name.'" data-product-stock="'.$is_stock.'" data-stock-qty="'.$stock_qty.'" data-product-qty="1" to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
							<a href="'.URL.'single/shop/'.$product_url.'" class="cursor-pointer show_product btn btn-primary" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i> View</a>
						  </center>	
						</div>								
					</div>
					
				</div>';
  }
}
?>
<input type="hidden" id="province" value=""/>
<input type="hidden" id="district" value=""/>
    <!-- Page Preloder -->
    <div id="preloder">
		<div class="w-100 text-center mt-5">
			<img src="<?php echo URL;?>assets/images/main_logo.jpg" class="preloder_img img-fuid"/>
		</div>	
        <div class="loader"></div>
    </div>
	
    <!-- Hero Section Begin -->
    <section class="col-12 col-md-12 hero mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            <li><a href="#">Baby Toys</a></li>
                            <li><a href="#">Baby Care</a></li>
                            <li><a href="#">Kids Dress</a></li>
                            <li><a href="#">Stationery</a></li>
                            <li><a href="#">Teddy Bears</a></li>
                            <li><a href="#">Batteries</a></li>
                            <li><a href="#">Watches</a></li>
                            <li><a href="#">Household Appliances</a></li>
                            <li><a href="#">Electics Items</a></li>
                            <li><a href="#">Kitchen Items</a></li>
                            <li><a href="#">Pregnancy Items</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories d-none">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?" id="search_data"/>
                                <button type="button" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><a href="tel:94772530784">+94 77 253 0784</a></h5>
                                <span>Support 24/7 time</span>
                            </div>
                        </div>
						
						
                    </div>
					<div id="productsList" class="w-100" style="display: none;"></div>
                    <div class="hero__item set-bg">
                        <div class="hero__text">
	
							<div class="col-sm-12 col-md-12 pl-0 pr-0">
								<div class="owl-carousel carousel-main">
									<div class="owl-items">
										<img class="img-fluid" src="<?php echo URL;?>assets/uploads/slider/maun_slider02.jpg" alt="First slide"/>
										<div class="carousel-caption cover d-none d-md-block home-text row justify-content-center">
										    <div class="line"></div>
											<h3 class="">Best Quality Toys</h3>
											<h5 class="mt-3">It sustains us, fulfills us and fuels our wellbeing. KIds Centre Malabe is devoted to that impact every single day. Unlocking Nature. Enriching Life.</h5>
										</div>										
									</div>
									<div class="owl-items">
										<img class="img-fluid" src="<?php echo URL;?>assets/uploads/slider/maun_slider03.jpg" alt="First slide"/>		
										<div class="carousel-caption cover d-none d-md-block home-text row justify-content-center">
											<div class="line"></div>
											<h3 class="">Baby Care Items</h3>
											<h5 class="mt-3">It sustains us, fulfills us and fuels our wellbeing. KIds Centre Malabe is devoted to that impact every single day. Unlocking Nature. Enriching Life.</h5>
										</div>
									</div>
									<div class="owl-items">
										<img class="img-fluid" src="<?php echo URL;?>assets/uploads/slider/maun_slider01.jpg" alt="First slide"/>
										<div class="carousel-caption cover d-none d-md-block home-text row justify-content-center">
										    <div class="line"></div>
											<h3 class="">Quality Kids Dress</h3>
											<h5 class="mt-3">It sustains us, fulfills us and fuels our wellbeing. KIds Centre Malabe is devoted to that impact every single day. Unlocking Nature. Enriching Life.</h5>
										</div>										
									</div>
								 </div>	
							</div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->	

    <!-- Categories Section Begin -->
    <section class="categories mt-5 col-12 ciol-md-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="categories__slider col-12 col-md-12 owl-carousel">
					<?php echo $carosel1;?>
                </div>
            </div>
        </div>
    </section>	
    
    <div class="col-sm-12 col-md-12 mt-5">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10 text-center align-self-center mt-4 section-title">
				<h3 class="et_pb_text_4"><strong>Top Featured</strong>  Products</h3>
			</div>
			<div class="col-sm-10 col-md-10 text-center align-self-center mt-4 Featured_ul">
			    <div class="w-100 cat_lists">
    				<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    				  <li class="nav-item">
    					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#Beverages" role="tab" aria-controls="home" aria-selected="true"><i class="icofont-racing-car"></i><br> Toys</a>
    				  </li>
    				  <li class="nav-item">
    					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#Grocery" role="tab" aria-controls="profile" aria-selected="false"><i class="icofont-book"></i><br> Stationery</a>
    				  </li>
    				  <li class="nav-item">
    					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#Household" role="tab" aria-controls="contact" aria-selected="false"><i class="icofont-baby-cloth"></i><br> Kids Dress</a>
    				  </li>
    				  <li class="nav-item">
    					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#FruitsVegetables" role="tab" aria-controls="contact" aria-selected="false"><i class="icofont-water-bottle"></i><br> Baby Care</a>
    				  </li>
    				  <li class="nav-item">
    					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#FreshMeat" role="tab" aria-controls="contact" aria-selected="false"><i class="icofont-teddy-bear"></i><br> Teddy Bears</a>
    				  </li>
    				  <li class="nav-item">
    					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#OceanFoods" role="tab" aria-controls="contact" aria-selected="false"><i class="icofont-apple-watch"></i><br> Watches</a>
    				  </li>
    				</ul>
				</div>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="Beverages" role="tabpanel" aria-labelledby="home-tab">
					<div class="row justify-content-center">
					<?php 
						$selectSQL = "SELECT * FROM `products_tbl` WHERE `product_category` = 'Beverages' ORDER BY `id` DESC LIMIT 4";
						$result = mysqli_query($conn, $selectSQL);						
						while($row = mysqli_fetch_assoc($result)){
							
						if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
							$discountPrice = ($row['discount_rate'] / 100);
							$discountPrice = $row['product_price'] * $discountPrice;
							$discountPrice = $row['product_price'] - $discountPrice;
							$is_discount = 'yes';
							$beforeDscount = '<del class="off w-100 text-danger">Rs '.$row['product_price'].'</del>';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
						}else{
							$is_discount = 'no';
							$discountPrice = $row['product_price'];
							$beforeDscount = '';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$row['product_price'].'</span></span>';
						}							
					?>
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $row['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $row['product_code'];?>"/>
						<input type="hidden" value="<?php echo $row['product_name'];?>" id="name<?php echo $row['product_code'];?>"/>							
							<div class="row justify-content-center p-1 m-1 shadow">
								<div class="col-12 col-md-12 shop_image">
									<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($row['product_image']) && $row['product_image'] != ''){echo $row['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $row['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
									<span class="product_message"><a data-quantity="1" value="<?php echo $row['product_code'];?>" id="<?php echo $row['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
								</div>								
								<div class="col-12 col-md-12">
									<h2 class="product_title"><?php echo $row['product_name'];?></h2>
								</div>								
								<div class="col-12 col-md-12">
									<span class="price"><span class="price_amount">
										<?php 
											echo $beforeDscount;
											echo $dscount;															
										?>
									</span>
								</div>							
								<div class="col-12 col-md-12 text-center" align="center">
								  <center>
									<a data-quantity="1" value="<?php echo $row['product_code'];?>" id="<?php echo $row['product_code'];?>" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="<?php echo URL.'single/shop/'.$row['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>								
							</div>
						</div>
					  <?php 
						}
					  ?>
						<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
							<a href="<?php echo URL;?>shop/beverages" class="btn site-btn">VIEW ALL</a>
						</div>	
					</div>
				  </div>
				  <div class="tab-pane fade" id="Grocery" role="tabpanel" aria-labelledby="profile-tab">
					<div class="row justify-content-center">
					<?php 
						$selectSQL2 = "SELECT * FROM `products_tbl` WHERE `product_category` = 'Grocery' ORDER BY `id` DESC LIMIT 4";
						$result2 = mysqli_query($conn, $selectSQL2);						
						while($row2 = mysqli_fetch_assoc($result2)){
							
						if(isset($row2['is_discount']) && $row2['is_discount'] == 'yes'){
							$discountPrice = ($row2['discount_rate'] / 100);
							$discountPrice = $row2['product_price'] * $discountPrice;
							$discountPrice = $row2['product_price'] - $discountPrice;
							$is_discount = 'yes';
							$beforeDscount = '<del class="off w-100 text-danger">Rs '.$row2['product_price'].'</del>';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
						}else{
							$is_discount = 'no';
							$discountPrice = $row2['product_price'];
							$beforeDscount = '';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$row2['product_price'].'</span></span>';
						}							
					?>
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $row2['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $row2['product_code'];?>"/>
						<input type="hidden" value="<?php echo $row2['product_name'];?>" id="name<?php echo $row2['product_code'];?>"/>							
							<div class="row justify-content-center p-1 m-1 shadow">
								<div class="col-12 col-md-12 shop_image">
									<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($row2['product_image']) && $row2['product_image'] != ''){echo $row2['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $row2['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
									<span class="product_message"><a data-quantity="1" value="<?php echo $row2['product_code'];?>" id="<?php echo $row2['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
								</div>								
								<div class="col-12 col-md-12">
									<h2 class="product_title"><?php echo $row2['product_name'];?></h2>
								</div>								
								<div class="col-12 col-md-12">
									<span class="price"><span class="price_amount">
										<?php 
											echo $beforeDscount;
											echo $dscount;															
										?>
									</span>
								</div>							
								<div class="col-12 col-md-12 text-center" align="center">
								  <center>
									<a data-quantity="1" value="<?php echo $row2['product_code'];?>" id="<?php echo $row2['product_code'];?>" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="<?php echo URL.'single/shop/'.$row2['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>								
							</div>
						</div>
					  <?php 
						}
					  ?>
						<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
							<a href="<?php echo URL;?>shop/grocery" class="btn site-btn">VIEW ALL</a>
						</div>
					</div>			  				  
				  </div>
				  <div class="tab-pane fade" id="Household" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row justify-content-center">
					<?php 
						$selectSQL3 = "SELECT * FROM `products_tbl` WHERE `product_category` = 'Household' ORDER BY `id` DESC LIMIT 4";
						$result3 = mysqli_query($conn, $selectSQL3);						
						while($row3 = mysqli_fetch_assoc($result3)){
							
						if(isset($row3['is_discount']) && $row3['is_discount'] == 'yes'){
							$discountPrice = ($row3['discount_rate'] / 100);
							$discountPrice = $row3['product_price'] * $discountPrice;
							$discountPrice = $row3['product_price'] - $discountPrice;
							$is_discount = 'yes';
							$beforeDscount = '<del class="off w-100 text-danger">Rs '.$row3['product_price'].'</del>';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
						}else{
							$is_discount = 'no';
							$discountPrice = $row3['product_price'];
							$beforeDscount = '';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$row3['product_price'].'</span></span>';
						}							
					?>
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $row3['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $row3['product_code'];?>"/>
						<input type="hidden" value="<?php echo $row3['product_name'];?>" id="name<?php echo $row3['product_code'];?>"/>							
							<div class="row justify-content-center p-1 m-1 shadow">
								<div class="col-12 col-md-12 shop_image">
									<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($row3['product_image']) && $row3['product_image'] != ''){echo $row3['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $row3['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
									<span class="product_message"><a data-quantity="1" value="<?php echo $row3['product_code'];?>" id="<?php echo $row3['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
								</div>								
								<div class="col-12 col-md-12">
									<h2 class="product_title"><?php echo $row3['product_name'];?></h2>
								</div>								
								<div class="col-12 col-md-12">
									<span class="price"><span class="price_amount">
										<?php 
											echo $beforeDscount;
											echo $dscount;															
										?>
									</span>
								</div>							
								<div class="col-12 col-md-12 text-center" align="center">
								  <center>
									<a data-quantity="1" value="<?php echo $row3['product_code'];?>" id="<?php echo $row3['product_code'];?>" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="<?php echo URL.'single/shop/'.$row3['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>								
							</div>
						</div>
					  <?php 
						}
					  ?>
						<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
							<a href="<?php echo URL;?>shop/household" class="btn site-btn">VIEW ALL</a>
						</div>
					</div>				  
				  </div>
				  <div class="tab-pane fade" id="FruitsVegetables" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row justify-content-center">
					<?php 
						$selectSQL4 = "SELECT * FROM `products_tbl` WHERE `product_category` = 'Fruits Vegetables' ORDER BY `id` DESC LIMIT 4";
						$result4 = mysqli_query($conn, $selectSQL4);						
						while($row4 = mysqli_fetch_assoc($result4)){
							
						if(isset($row4['is_discount']) && $row4['is_discount'] == 'yes'){
							$discountPrice = ($row4['discount_rate'] / 100);
							$discountPrice = $row4['product_price'] * $discountPrice;
							$discountPrice = $row4['product_price'] - $discountPrice;
							$is_discount = 'yes';
							$beforeDscount = '<del class="off w-100 text-danger">Rs '.$row4['product_price'].'</del>';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
						}else{
							$is_discount = 'no';
							$discountPrice = $row4['product_price'];
							$beforeDscount = '';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$row4['product_price'].'</span></span>';
						}							
					?>
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $row4['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $row4['product_code'];?>"/>
						<input type="hidden" value="<?php echo $row4['product_name'];?>" id="name<?php echo $row4['product_code'];?>"/>							
							<div class="row justify-content-center p-1 m-1 shadow">
								<div class="col-12 col-md-12 shop_image">
									<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($row4['product_image']) && $row4['product_image'] != ''){echo $row4['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $row4['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
									<span class="product_message"><a data-quantity="1" value="<?php echo $row4['product_code'];?>" id="<?php echo $row4['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
								</div>								
								<div class="col-12 col-md-12">
									<h2 class="product_title"><?php echo $row4['product_name'];?></h2>
								</div>								
								<div class="col-12 col-md-12">
									<span class="price"><span class="price_amount">
										<?php 
											echo $beforeDscount;
											echo $dscount;															
										?>
									</span>
								</div>							
								<div class="col-12 col-md-12 text-center" align="center">
								  <center>
									<a data-quantity="1" value="<?php echo $row4['product_code'];?>" id="<?php echo $row4['product_code'];?>" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="<?php echo URL.'single/shop/'.$row4['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>								
							</div>
						</div>
					  <?php 
						}
					  ?>

						<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
							<a href="<?php echo URL;?>shop/fruits-vegetables" class="btn site-btn">VIEW ALL</a>
						</div>						  
					</div>				  
				  </div>
				  <div class="tab-pane fade" id="FreshMeat" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row justify-content-center">
					<?php 
						$selectSQL5 = "SELECT * FROM `products_tbl` WHERE `product_category` = 'Fresh Meat' ORDER BY `id` DESC LIMIT 4";
						$result5 = mysqli_query($conn, $selectSQL5);						
						while($row5 = mysqli_fetch_assoc($result5)){
							
						if(isset($row5['is_discount']) && $row5['is_discount'] == 'yes'){
							$discountPrice = ($row5['discount_rate'] / 100);
							$discountPrice = $row5['product_price'] * $discountPrice;
							$discountPrice = $row5['product_price'] - $discountPrice;
							$is_discount = 'yes';
							$beforeDscount = '<del class="off w-100 text-danger">Rs '.$row5['product_price'].'</del>';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
						}else{
							$is_discount = 'no';
							$discountPrice = $row5['product_price'];
							$beforeDscount = '';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$row5['product_price'].'</span></span>';
						}							
					?>
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $row5['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $row5['product_code'];?>"/>
						<input type="hidden" value="<?php echo $row5['product_name'];?>" id="name<?php echo $row5['product_code'];?>"/>							
							<div class="row justify-content-center p-1 m-1 shadow">
								<div class="col-12 col-md-12 shop_image">
									<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($row5['product_image']) && $row5['product_image'] != ''){echo $row5['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $row5['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
									<span class="product_message"><a data-quantity="1" value="<?php echo $row5['product_code'];?>" id="<?php echo $row5['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
								</div>								
								<div class="col-12 col-md-12">
									<h2 class="product_title"><?php echo $row5['product_name'];?></h2>
								</div>								
								<div class="col-12 col-md-12">
									<span class="price"><span class="price_amount">
										<?php 
											echo $beforeDscount;
											echo $dscount;															
										?>
									</span>
								</div>							
								<div class="col-12 col-md-12 text-center" align="center">
								  <center>
									<a data-quantity="1" value="<?php echo $row5['product_code'];?>" id="<?php echo $row5['product_code'];?>" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="<?php echo URL.'single/shop/'.$row5['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>								
							</div>
						</div>
					  <?php 
						}
					  ?>

						<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
							<a href="<?php echo URL;?>shop/fresh-meat" class="btn site-btn">VIEW ALL</a>
						</div>					  
					</div>				  
				  </div>
				  <div class="tab-pane fade" id="OceanFoods" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row justify-content-center">
					<?php 
						$selectSQL6 = "SELECT * FROM `products_tbl` WHERE `product_category` = 'Ocean Foods' ORDER BY `id` DESC LIMIT 4";
						$result6 = mysqli_query($conn, $selectSQL6);						
						while($row6 = mysqli_fetch_assoc($result6)){
							
						if(isset($row6['is_discount']) && $row6['is_discount'] == 'yes'){
							$discountPrice = ($row6['discount_rate'] / 100);
							$discountPrice = $row6['product_price'] * $discountPrice;
							$discountPrice = $row6['product_price'] - $discountPrice;
							$is_discount = 'yes';
							$beforeDscount = '<del class="off w-100 text-danger">Rs '.$row6['product_price'].'</del>';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
						}else{
							$is_discount = 'no';
							$discountPrice = $row6['product_price'];
							$beforeDscount = '';
							$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$row6['product_price'].'</span></span>';
						}							
					?>
						<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $row6['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $row6['product_code'];?>"/>
						<input type="hidden" value="<?php echo $row6['product_name'];?>" id="name<?php echo $row6['product_code'];?>"/>							
							<div class="row justify-content-center p-1 m-1 shadow">
								<div class="col-12 col-md-12 shop_image">
									<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($row6['product_image']) && $row6['product_image'] != ''){echo $row6['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $row6['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
									<span class="product_message"><a data-quantity="1" value="<?php echo $row6['product_code'];?>" id="<?php echo $row6['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
								</div>								
								<div class="col-12 col-md-12">
									<h2 class="product_title"><?php echo $row6['product_name'];?></h2>
								</div>								
								<div class="col-12 col-md-12">
									<span class="price"><span class="price_amount">
										<?php 
											echo $beforeDscount;
											echo $dscount;															
										?>
									</span>
								</div>							
								<div class="col-12 col-md-12 text-center" align="center">
								  <center>
									<a data-quantity="1" value="<?php echo $row6['product_code'];?>" id="<?php echo $row6['product_code'];?>" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="<?php echo URL.'single/shop/'.$row6['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>								
							</div>
						</div>
					  <?php 
						}
					  ?>
					  
						<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
							<a href="<?php echo URL;?>shop/ocean-foods" class="btn site-btn">VIEW ALL</a>
						</div>
					</div>				  
				  </div>
				</div>
			</div>
		</div>	
	</div>

	
    <div class="col-sm-12 col-md-12 d-none">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
				<h2 class="c-titleBloc c-titleBloc_2" data-aos="fade-down">Innovating with you and for you</h2>
				<div class="c-titleBloc c-rule_center c-titleBloc_rule"></div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
			</div>
		</div>	
	</div>
	
	   


    <div class="col-sm-12 col-md-12 mt-5">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-12 text-left align-self-center mt-4 pl-0 pr-0 cat2-background-img">
				<div class="overlay-mf"></div>
					<div class="container">
						  <div class="row justify-content-end">
								<div class="col-sm-10 col-lg-8">
									<div class="o-grid-col_12of12 o-grid-col_8of12@large">
										<div class="c-story-card c-story-card-tertiary">
											<div class="c-story-card-hd">
												<h2 class="c-story-hdg_2" data-aos="fade-down">Reliable and quality products</h2>
												<div class="c-titleBloc_rule c-light_left"></div>
											</div>
											<div class="c-story-card-bd">
												<p class="text-dark">A Kids Centre Malabe sells clothing,, toys, and accessories geared toward young children and pregnent mothers. we distributed to wholesale and retail in island wide multinational companies.our store is a large location that offers affordable items targeted at the majority of families or a boutique featuring unique designs and products with a higher purchase price. <br></p>
											</div>
											<div class="c-story-card-button"></div>
											<div class="c-story-card-ctaArrow text-right">												
												<a href="" class="btn btn-outline-info outline-white mt-3 btn-sm site-btn2 border">Shop Now</a>
											</div>
										</div>
									</div>
								</div>									
							</div>
					</div>				
			</div>
		</div>	
	</div>	

    <div class="col-sm-12 col-md-12 mt-5">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10 text-center align-self-center mt-4 section-title">
				<h3 class="et_pb_text_4"><strong>Best</strong> Products</h3>
			</div>
			<div class="col-sm-10 col-md-10 text-center align-self-center mt-4 Featured_ul">	
				<div class="row justify-content-center">
<?php

				
				$featureProSQL = "SELECT * FROM `products_tbl` WHERE `display_type` = 'Featured' ORDER BY `id` DESC LIMIT 10";
				$featureProRSL = mysqli_query($conn, $featureProSQL);	
				while($featureProRow1 = mysqli_fetch_assoc($featureProRSL)){

				
				if(isset($featureProRow1['product_qty']) && $featureProRow1['product_qty'] == '0'){
					$label = '<span class="p-2 new bg-danger text-white">Out of Order</span>';
				}else{
					$label = '<span class="new">FEATURED</span>';					
				}
				//$is_discount = '';
				if(isset($featureProRow1['is_discount']) && $featureProRow1['is_discount'] == 'yes'){
					$discountPrice = ($featureProRow1['discount_rate'] / 100);
					$discountPrice = $featureProRow1['product_price'] * $discountPrice;
					$discountPrice = $featureProRow1['product_price'] - $discountPrice;
					$is_discount = 'yes';
					$beforeDscount = '<del class="off w-100 text-danger">Rs '.$featureProRow1['product_price'].'</del>';
					$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.round($discountPrice).'</span></span>';
				}else{
					$is_discount = 'no';
					$discountPrice = $featureProRow1['product_price'];
					$beforeDscount = '';
					$dscount = '<span class="price price_amount w-100"><i class="fa fa-eur d-none"></i>Rs <span>'.$featureProRow1['product_price'].'</span></span>';
				}				
?>


					<div class="col-6 col-sm-6 col-md-4 col-lg-3 pl-1 pr-1 mt-2 mb-2">
						<input type="hidden" value="<?php echo round($discountPrice);?>" id="price<?php echo $featureProRow1['product_code'];?>"/>
						<input type="hidden" value="1" id="quantity<?php echo $featureProRow1['product_code'];?>"/>
						<input type="hidden" value="<?php echo $featureProRow1['product_name'];?>" id="name<?php echo $featureProRow1['product_code'];?>"/>					
						<div class="row justify-content-center p-1 m-2 shadow">
							<div class="col-12 col-md-12 shop_image">
								<img width="100%" height="auto" src="<?php echo URL;?>assets/uploads/products/<?php if(isset($featureProRow1['product_image']) && $featureProRow1['product_image'] != ''){echo $featureProRow1['product_image'];}else{echo 'fans_sample.jpg';};?>" alt="<?php echo $featureProRow1['product_name'];?>" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
								<span class="product_message_real <?php if(isset($featureProRow1['product_qty'],$is_discount) && $featureProRow1['product_qty'] <= '0' && $featureProRow1['is_discount'] == 'no'){echo 'd-none';}else{echo 'd-block';}?>">Sale!</span>
									<span class="product_message"><a data-quantity="1" value="<?php echo $featureProRow1['product_code'];?>" id="<?php echo $featureProRow1['product_code'];?>" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
							</div>								
							<div class="col-12 col-md-12">
								<h2 class="product_title"><?php echo $featureProRow1['product_name'];?></h2>
							</div>								
							<div class="col-12 col-md-12">
								<span class="price"><span class="price_amount">
									<?php 
										echo $beforeDscount;
										echo $dscount;															
									?>
								</span>
							</div>							
							<div class="col-12 col-md-12 text-center <?php if(isset($featureProRow1['product_qty']) && $featureProRow1['product_qty'] == '0'){echo 'd-none';}else{echo '';}?>" align="center">
							  <center>
								<a data-quantity="1" value="<?php echo $featureProRow1['product_code'];?>" id="<?php echo $featureProRow1['product_code'];?>" class="add_to_cart cursor-pointer button" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
								<a href="<?php echo URL.'single/shop/'.$featureProRow1['product_url'];?>" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
							  </center>	
							</div>								
						</div>
					</div>								
								
<?php
				}
			
?>				
				
					
				</div>			
		    </div>				
		</div>	
	</div>


    <div class="col-sm-12 col-md-12 mb-5">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10 text-center align-self-center mt-4">
				<div class="row justify-content-center">
					<div class="col-12 col-md-4 mt-4"><a href="<?php echo URL;?>shop" class=""><img src="<?php echo URL;?>assets/images/banner-new-12.jpg" class="img-fluid hvr-float-shadow"/></a></div>
					<div class="col-12 col-md-8">
						<div class="row justify-content-center">
							<div class="col-12 col-md-12">
								<div class="row justify-content-center">
									<div class="col-12 col-md-6 mt-4"><a href="<?php echo URL;?>shop" class=""><img src="<?php echo URL;?>assets/images/banner-new2.jpg" class="img-fluid hvr-float-shadow"/></a></div>
									<div class="col-12 col-md-6 mt-4"><a href="<?php echo URL;?>shop" class=""><img src="<?php echo URL;?>assets/images/banner-new3-2.jpg" class="img-fluid hvr-float-shadow"/></a></div>
								</div>
							</div>
							<div class="col-12 col-md-12 mt-4">
								<a href="<?php echo URL;?>shop" class=""><img src="<?php echo URL;?>assets/images/banner-new4-1.jpg" class="img-fluid hvr-float-shadow"/></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>  
	</div>