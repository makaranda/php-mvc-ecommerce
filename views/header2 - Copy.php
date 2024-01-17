<?php
Session::init();

if(isset($_GET['url']) && $_GET['url'] != ''){
	$allURL = explode('/',$_GET['url']);
	$allURL1 = $allURL[0];

	if(isset($allURL[1])){
		$allURL2 = $allURL[1];
	}
	
	//echo $allURL;
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
//echo $active2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fanz.Lk | Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  -->
 
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>
 
  
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
  
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL;?>assets/uploads/favicon.png"/>
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/aos.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


  
  <link href="<?php echo URL;?>assets/css/fontawesome.min.css" rel="stylesheet">
  <script src="<?php echo URL;?>assets/js/fontawesome.min.js"></script>

  <script src="<?php echo URL;?>assets/js/aos.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap.min.css">
  <script src="<?php echo URL;?>assets/js/jquery.min.js"></script>
  <script src="<?php echo URL;?>assets/js/popper.min.js"></script>
  <script src="<?php echo URL;?>assets/js/bootstrap.min.js"></script>
  
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
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/bootstrap.css">
  <!-- include the site stylesheet -->
     <link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/animate.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/icon-fonts.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/main.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="<?php echo URL;?>assets/theme/css/responsive.css"> 
	
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/jquery-confirm.css">
  
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/mystyle.css">
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/responsive.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> 
  <link href="<?php echo URL;?>assets/theme/css/jquery.exzoom.css" rel="stylesheet">
  

    <?php
		if(isset($this->js))
		{
			foreach ($this->js as $js) {
				echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
			}
		}
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
	<div id="wrapper">
		<!-- Page Loader -->
		<div id="pre-loader" class="loader-container">
			<div class="loader">
				<img src="<?php echo URL;?>assets/images/svg/rings.svg" alt="loader">
			</div>
		</div>
		<!-- W1 start here -->
		<div class="w1">
			<!-- mt header style4 start here -->
			<header id="mt-header" class="style4">
				<!-- mt bottom bar start here -->
				<div class="mt-bottom-bar">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 navigation">
								<!-- mt logo start here -->
								<div class="mt-logo"><a href="<?php echo URL;?>"><!--<h3 class="text-uppercase font-weight-bold">fanz.LK</h3>--><img src="<?php echo URL;?>assets/uploads/logo2.png" alt="schon" class="headerLogo" width="150"></a></div>
								<!-- mt icon list start here -->
								<ul class="mt-icon-list">
									<li class="hidden-lg hidden-md d-inline-block d-md-none">
										<a href="#" class="bar-opener mobile-toggle">
											<span class="bar"></span>
											<span class="bar small"></span>
											<span class="bar"></span>
										</a>
									</li>
									<!--<li><a href="#" class="icon-magnifier"></a></li>-->													
									<li class="drop">
										<!--<a href="#" class="cart-opener">
											<span class="fa fa-shopping-cart"></span>
											<span class="num">3</span>
										</a>-->
										<a id="cart-popover" class="text-dark cart-opener cursor-pointer" data-placement="bottom" title="Shopping Cart">
												<i class="fa fa-shopping-cart text-size-20"></i>
												<span class="badge badge-secondary"></span>
												<span class="total_price text-capitalize">Rs 0.00</span>
										</a>
									
										<!-- mt drop start here -->
										<div class="mt-drop">
											<!-- mt drop sub start here -->
											<div class="mt-drop-sub">
												<!-- mt side widget start here -->
												<div class="mt-side-widget" id="cart_details">

												</div><!-- mt side widget end here -->
											</div>
											<!-- mt drop sub end here -->
										</div><!-- mt drop end here -->
										<span class="mt-mdropover"></span>
									</li>
									<?php if(Session::get('userId') != ''){?>
										<li class="drop loggedUser">
											<a href="#" class="cart-opener text-dark">
												<i class="fa fa-user text-dark"></i>
											</a>
											<!-- mt drop start here -->
											<div class="mt-drop">
												<ul class="list-group">
												  <li class="list-group-item">	
													<a class="dropdown-item" href="<?php echo URL;?>dashboard/adminprofile/<?php echo Session::get('userId');?>">Edit Profile</a>
												  </li>
												  <li class="list-group-item border-top-0 mt-0">
													<a class="dropdown-item" href="<?php echo URL;?>dashboard/logout">Logout</a>
												  </li>
												</ul>	
											</div>
										</li>										
									<?php
									}
									else{
									?>									
									<li>
									<!--
										<a href="#" class="bar-opener side-opener">
											<span class="bar"></span>
											<span class="bar small"></span>
											<span class="bar"></span>
										</a>
									-->
										<a href="#" class="bar-opener2 side-opener">
											<span class="fa fa-user"></span>
										</a>									
									</li>
									<?php
									}
									?>
								</ul><!-- mt icon list end here -->
								<!-- navigation start here -->
								<nav id="nav" class="d-none d-md-block">
									<ul>
										<li>
											<a href="<?php echo URL;?>">HOME <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
											
										</li>
										<li>
											<a href="<?php echo URL;?>products">PRODUCTS <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>											
										</li>
										<li><a href="<?php echo URL;?>about">About <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a></li>
										<li>
											<a href="<?php echo URL;?>contact">Contact <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
										</li>
									</ul>
								</nav>
								<!-- mt icon list end here -->
							</div>
						</div>
					</div>
				</div>
				<!-- mt bottom bar end here -->
				<span class="mt-side-over"></span>
				
			</header><!-- mt header style4 end here -->
				<div id="popover_content_wrapper" style="display: none">
					<span id="cart_details2"></span>
					<div align="right">
					 <a href="#" class="btn btn-sm btn-primary" id="check_out_cart">
					 <span class="lnr lnr-cart"></span> Check out
					 </a>
					 <a href="#" class="btn btn-sm btn-default shadow-sm" id="clear_cart">
					 <span class="lnr lnr-trash text-dark"></span> Clear
					 </a>
					</div>
				   </div>			
			<!-- mt side menu start here -->
			<div class="mt-side-menu">
				<!-- mt holder start here -->
				<div class="mt-holder">
					<a href="#" class="side-close"><span></span><span></span></a>
					<strong class="mt-side-title">MY ACCOUNT</strong>
					<!-- mt side widget start here -->
					<div class="mt-side-widget">
						<header>
							<span class="mt-side-subtitle">SIGN IN</span>
							<p>Welcome back! Sign in to Your Account</p>
						</header>
						<form action="#">
							<fieldset>
								<input type="text" placeholder="Username or email address" class="input">
								<input type="password" placeholder="Password" class="input">
								<div class="box">
									<span class="left"><input class="checkbox" type="checkbox" id="check1"><label for="check1">Remember Me</label></span>
									<a href="#" class="help">Help?</a>
								</div>
								<button type="submit" class="btn-type1">Login</button>
							</fieldset>
						</form>
					</div>
					<!-- mt side widget end here -->
					<div class="or-divider"><span class="txt">or</span></div>
					<!-- mt side widget start here -->
					<div class="mt-side-widget">
						<header>
							<span class="mt-side-subtitle">CREATE NEW ACCOUNT</span>
							<p>Create your very own account</p>
						</header>
						<form action="#">
							<fieldset>
								<input type="text" placeholder="Username or email address" class="input">
								<button type="submit" class="btn-type1">Register</button>
							</fieldset>
						</form>
					</div>
					<!-- mt side widget end here -->
				</div>
				<!-- mt holder end here -->
			</div><!-- mt side menu end here -->
			<!-- mt search popup start here -->
			<div class="mt-search-popup">
				<div class="mt-holder">
					<a href="#" class="search-close"><span></span><span></span></a>
					<div class="mt-frame">
						<form action="#">
							<fieldset>
								<input type="text" placeholder="Search...">
								<span class="icon-microphone"></span>
								<button class="icon-magnifier" type="submit"></button>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- mt search popup end here -->







