<?php
Session::init();
//ini_set('session.gc_maxlifetime', 3600);
include('libs/connection.php');
if(isset($_GET['url']) && $_GET['url'] != ''){
	$allURL = explode('/',$_GET['url']);
	$allURL1 = $allURL[0];
	
	$menuName = $allURL[0];

	if(isset($allURL[1])){
		$allURL2 = $allURL[1];
	}

	//echo $allURL;
}else{
	$menuName = '';
	$allURL1 = '';
}

if(isset($allURL[0]) && $allURL[0] != ''){
	$active =  $allURL1;	

	if(isset($allURL[1])){
		$active2 =  $allURL2;
	}	
}else{
	$active = '';
	$active2 = '';
}
//echo $active;
	$inches = '';
	
	global $header_logo;
	global $footer_logo;
	global $footer_content;
	global $company_address;
	global $company_phone1;
	global $company_phone2;
	global $company_email;
	global $instagram;
	global $facebook;
	global $youtube;
	global $whatsapp;
	
    $selectSQL = "SELECT * FROM `theme_setting` WHERE `id` = 1";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);	
    /*
    $header_logo = $row['header_logo'];
    $footer_logo = $row['footer_logo']; 
	*/
	$header_logo = '';
    $footer_logo = ''; 
	
    $footer_content = $row['footer_content'];
    $company_address = $row['company_address'];
    $company_phone1 = $row['company_phone1'];
    $company_phone2 = $row['company_phone2'];
    $company_email = $row['company_email'];
    $instagram = $row['instagram'];
    $facebook = $row['facebook'];
    $youtube = $row['youtube'];
    $whatsapp = $row['whatsapp'];
//print_r($_SESSION['shopping_cart']);										
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kids Centre Malabe | Best Online Market | Sri Lanka</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!--  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  -->
 
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>
 
  
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
  
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL;?>assets/images/main_logo.jpg"/>
  
  <link href="<?php echo URL;?>assets/css/fontawesome.min.css" rel="stylesheet">
  <script src="<?php echo URL;?>assets/js/fontawesome.min.js"></script>
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap.min.css">
  <script src="<?php echo URL;?>assets/js/jquery.min.js"></script>
  <script src="<?php echo URL;?>assets/js/popper.min.js"></script>
  <script src="<?php echo URL;?>assets/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
  <link href="//db.onlinewebfonts.com/c/f52d3ba10c48f120aac7151517915276?family=DINNextSlabW01-Black" rel="stylesheet" type="text/css"/>
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

  
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
    integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
    crossorigin=""></script>
	
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">	

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/leaflet-routing-machine.css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />	
		
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/jquery-confirm.css">
  <!--
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/owl.carousel.min.css">
  -->
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/owl.theme.default.css">
  <!--<link rel="stylesheet" href="<?php //echo URL;?>assets/css/docs.theme.min.css">-->

  <!-- start theme styles -->
 
  <link href="<?php echo URL;?>assets/css/responsive_style.css" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;600;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/aos.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <script src="<?php echo URL;?>assets/theme/js/aos.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/bootstrap4/css/bootstrap.min.css">
  <script src="<?php echo URL;?>assets/bootstrap4/js/jquery.min.js"></script>
  <script src="<?php echo URL;?>assets/bootstrap4/js/popper.min.js"></script>
  <script src="<?php echo URL;?>assets/bootstrap4/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
  <link href="//db.onlinewebfonts.com/c/f52d3ba10c48f120aac7151517915276?family=DINNextSlabW01-Black" rel="stylesheet" type="text/css"/>

  
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/icons/icofont.css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/hover.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
  <script src="<?php echo URL;?>assets/theme/js/price_range_script.js" type="text/javascript"></script>    
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/price_range_style.css">  
  
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/bootstrap.min.css" type="text/css">
  <!--<link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/bootstrap3.css" type="text/css">-->
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/jquery-ui.min.css" type="text/css">
 <!-- <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/owl.carousel.min.cssd" type="text/css">-->
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/style.css" type="text/css">
   
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/theme_style.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>  
  <!-- end theme styles -->
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/animate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/parsley.css?v=<?php echo time();?>">
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/mystyle.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/my_responsive.css?v=<?php echo time();?>">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> 
  <link href="<?php echo URL;?>assets/theme/css/jquery.exzoom.css" rel="stylesheet">

  <!--<script src="http://parsleyjs.org/dist/parsley.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.0/parsley.js"></script>
    <?php

		//unset($_SESSION['wish_list_cart']);
		//unset($_SESSION['shopping_cart']);
		 /*if(isset($_SESSION["shopping_cart"])){
			 
			 foreach($_SESSION["shopping_cart"] as $keys => $values)
			 {
					echo $values['product_id'];
					echo '<br>';
			 }
			echo count($_SESSION['shopping_cart']);
			echo '<br>';
			var_dump($_SESSION['shopping_cart']);
		 } */

		
	?>
<style>
body, *,a,h1,h2,h3,h4,h5,p,span,div {
    /* font-family: 'Exo', sans-serif; */
	/* font-family: 'Raleway', sans-serif !important; */
	/*font-family: 'DIN Next Slab' !important;*/
}
</style>


</head>
<body>
<div id="text_datas"></div>
<input type="hidden" id="pageName" value="<?php echo $allURL1;?>"/>		

  
<div class="container-fluid">
  <div class="row justify-content-center">

    <div class="col-sm-12 col-md-12 headerTop2 fixed-top">
		<div class="row justify-content-center pt-2 pb-2">
			<div class="col-sm-11 col-md-11">
				<i class="fa fa-envelope text-white" id="i_fd84_0"></i><a href="mailto:rajaranatunga@gmail.com" class="text-decoration-none text-white"> rajaranatunga@gmail.com</a> 
				<i class="fa fa-phone text-white" id="i_fd84_1"></i> <a href="tel:94772530784" class="text-decoration-none text-white">+9477 253 0784</a>
			</div>	
		</div>
	</div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?php echo URL;?>"><img src="<?php echo URL;?>assets/images/main_logo.jpg" alt="Kids Centre Malabe" class="main_nav_logo"></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?php echo URL;?>">Home</a></li>
                <li><a href="<?php echo URL;?>shop">Shop</a></li>
                <li><a href="<?php echo URL;?>about">About</a></li>
                <li><a href="<?php echo URL;?>contact">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> rajaranatunga@gmail.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
	
    <!-- Header Section Begin -->
    <header class="header col-12 col-md-12 pt-4 navbar-expand-lg navbar-light shadow-lg w-100 pb-0 sticky-top bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?php echo URL;?>"><img src="<?php echo URL;?>assets/images/main_logo.jpg" alt="Kids Centre Malabe" class="main_nav_logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?php if(isset($active) && $active == ''){echo 'active';}?>"><a href="<?php echo URL;?>">Home</a></li>
                            <li class="<?php if(isset($active) && $active == 'shop'){echo 'active';}?>"><a href="<?php echo URL;?>shop">Shop</a></li>
                            <li class="<?php if(isset($active) && $active == 'about_us'){echo 'active';}?>"><a href="<?php echo URL;?>about_us">About Us</a></li>
                            <li class="<?php if(isset($active) && $active == 'contact_us'){echo 'active';}?>"><a href="<?php echo URL;?>contact_us">Contact Us</a></li>
                            <li class="<?php if(isset($active) && $active == 'signin'){echo 'active';}?>"><a href="<?php echo URL;?>signin">Signin</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 align-self-center">
                    <div class="header__cart">
                        <ul>
                            <!--<li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>-->
							<li class="drop">
								<a id="cart-popover" class="text-dark cart-opener cursor-pointer" data-placement="bottom" title="Shopping Cart">
										<i class="fa fa-shopping-bag text-size-20"></i>
										<span class="badge badge-secondary"></span>
										<span class="total_prices text-capitalize total_items">0</span>
								</a>
								<div class="mt-drop">
								</div>
								<span class="mt-mdropover"></span>		
							</li>	
                        </ul>
                        <div class="header__cart__price">item: <span>Rs 00.00</span></div>
                    </div>
					
					<div id="popover_content_wrapper" style="display: none">
						<span id="cart_details"></span>
					</div>

					<div id="display_item"></div>
					
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->	
	
    <!-- Humberger End -->
	

		<span id="loading_response" class="col-12 d-none"><div class="textloading col-12">Processing......</div></span>


