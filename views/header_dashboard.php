<?php 

Session::init();
if(isset(explode('/',$_GET['url'])[1])){
	$allURL = explode('/',$_GET['url']);
	$allURL = $allURL[1];
}


if(isset($allURL) && $allURL != ''){
    $active =  $allURL;
}else{
    $active = '';
}




?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="noindex, nofollow" />

  <title>Fanz.Lk | Dashboard</title>
  
  <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">-->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL;?>assets/uploads/favicon.png"/>
<!-- 
  <link href="<?php //echo URL;?>assets/css/normalize.css" rel="stylesheet">

  <link href="<?php //echo URL;?>assets/css/skeleton.css" rel="stylesheet">
-->
  <!-- Custom fonts for this template-->  
  <link href="<?php echo URL;?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Exo|Open+Sans|Roboto&display=swap" rel="stylesheet">

  <link href="<?php echo URL;?>assets/css/core.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo URL;?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  
   <!-- Data Table --> 
  <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
  <link href="<?php echo URL;?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/tail.select-default.css">
	
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo URL;?>assets/css/font-awesome.min.css"> 

  
  <!-- Multiselect CSS -->
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap-multiselect.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/tokenize2.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap.min.css" type="text/css"/>

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

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />	
  <!-- My Style CSS -->
  <link href="<?php echo URL;?>assets/css/dashboardStyle.css" rel="stylesheet">

  <link href="<?php echo URL;?>assets/css/mystyle.css" rel="stylesheet">
  
  <!-- Responsive Layout -->
  <link href="<?php echo URL;?>assets/css/responsive-layout.css" rel="stylesheet">

	
  <link href="<?php echo URL;?>assets/css/selectstyle.css" rel="stylesheet">
	
  <link href="<?php echo URL;?>assets/css/datepicker.css" rel="stylesheet">	
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">   
        
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/wheelcolorpicker.css"> 
        
  <link rel="stylesheet" href="<?php echo URL;?>assets/css/wheelcolorpicker.dark.css">  

 <script type="text/javascript">
		$(function() {
			$('#color-inline1').wheelColorPicker();
			$('#color-inline2').wheelColorPicker({ sliders: "whsvp", preview: true, format: "css" });
			$('#color-inline3').wheelColorPicker({ live: false, sliders: "wrgbap", format: "rgba" });
			$('#color-block').wheelColorPicker({ layout: 'block', sliders: "whsvrgbap" });
		});
 </script>   
  <style>

  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URL;?>dashboard/">
			<div class="sidebar-brand-icon">
				<i class="fas fa-home"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Fanz.Lk</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if($active == 'home' || $active == ''){echo 'active';}else{echo '';}?>">
			<a class="nav-link" href="<?php echo URL;?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Go to Website</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Products
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'products' || $active == 'addproduct' || $active == 'editproduct'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
				<i class="fas fa-fw fa-cog"></i>
				<span>Products</span>
			</a>
			<div id="collapseOne1" class="collapse <?php if($active == 'products' || $active == 'addproduct' || $active == 'editproduct'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Products Details</h6>
				<a class="collapse-item font-size-12 <?php if($active == 'products'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/products">Products Lists</a>
				<a class="collapse-item font-size-12 <?php if($active == 'addproduct'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/addproduct">Add product</a>
				</div>
			</div>
			</li>  

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Orders
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'orders' || $active == 'orders' || $active == 'orders'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
				<i class="fas fa-fw fa-cog"></i>
				<span>Orders</span>
			</a>
			<div id="collapseOne2" class="collapse <?php if($active == 'orders' || $active == 'vieworder' || $active == 'orders'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Orders Details</h6>
				<a class="collapse-item font-size-12 <?php if($active == 'orders'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/orders">orders Lists</a>
				</div>
			</div>
			</li>  

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Locations
			</div>
			
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'hotels' || $active == 'addhotel' || $active == 'edithotels'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
				<i class="fas fa-fw fa-cog"></i>
				<span>Locations</span>
			</a>
			<div id="collapseOne3" class="collapse <?php if($active == 'province' || $active == 'destricts' || $active == 'cities'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Location Details</h6>
				<a class="collapse-item font-size-12 d-none <?php if($active == 'destricts'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/destricts">Destricts</a>
				<a class="collapse-item font-size-12 <?php if($active == 'cities'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/cities">Cities</a>
				</div>
			</div>
			</li>  

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Brands
			</div>
			
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'brands'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
				<i class="fas fa-fw fa-cog"></i>
				<span>Brands</span>
			</a>
			<div id="collapseOne4" class="collapse <?php if($active == 'brands'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Brand Details</h6>
				<a class="collapse-item font-size-12 <?php if($active == 'cities'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/brands">Brands</a>
				</div>
			</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Inches
			</div>
			
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'inches'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne46" aria-expanded="true" aria-controls="collapseOne46">
				<i class="fas fa-fw fa-cog"></i>
				<span>Inches</span>
			</a>
			<div id="collapseOne46" class="collapse <?php if($active == 'inches'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Inches Details</h6>
				<a class="collapse-item font-size-12 <?php if($active == 'cities'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/inches">Inches</a>
				</div>
			</div>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Categories
			</div>
			
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'categories'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
				<i class="fas fa-fw fa-cog"></i>
				<span>Categories</span>
			</a>
			<div id="collapseOne5" class="collapse <?php if($active == 'categories'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Category Details</h6>
				<a class="collapse-item font-size-12 <?php if($active == 'categories'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/categories">Categories</a>
				</div>
			</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Pages
			</div>
			
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'pages' || $active == 'about' || $active == 'contact' || $active == 'termsconditions' || $active == 'privacy'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6">
				<i class="fas fa-fw fa-cog"></i>
				<span>Pages</span>
			</a>
			<div id="collapseOne6" class="collapse <?php if($active == 'pages' || $active == 'about' || $active == 'contact' || $active == 'termsconditions' || $active == 'privacy'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Pages Details</h6>
				<a class="collapse-item font-size-12 <?php if($active == 'about'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/about">About Us</a>
				<a class="collapse-item font-size-12 <?php if($active == 'contact'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/contact">Contact Us</a>
				<a class="collapse-item font-size-12 <?php if($active == 'termsconditions'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/termsconditions">Terms & Conditions</a>
				<a class="collapse-item font-size-12 <?php if($active == 'privacy'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/privacy">Privacy Policy</a>
				</div>
			</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Divider -->

			<!-- Heading -->
			<div class="sidebar-heading text-white">
			Theme Setting
			</div>
			
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($active == 'header' || $active == 'footer' || $active == 'slider' || $active == 'theme'){echo 'active';}else{echo '';}?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="true" aria-controls="collapseOne7">
				<i class="fas fa-fw fa-cog"></i>
				<span>Theme Setting</span>
			</a>
			<div id="collapseOne7" class="collapse <?php if($active == 'header' || $active == 'footer' || $active == 'slider' || $active == 'theme'){echo 'show';}else{echo '';}?>" aria-labelledby="headingOne" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Theme Details</h6>
				<a class="collapse-item font-size-12 d-none <?php if($active == 'header'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/header">Header</a>
				<a class="collapse-item font-size-12 d-none <?php if($active == 'footer'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/footer">Footer</a>
				<a class="collapse-item font-size-12 <?php if($active == 'theme'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/pages/theme">Footer</a>
				<a class="collapse-item font-size-12 <?php if($active == 'slider'){echo 'active';}else{echo '';}?>" href="<?php echo URL;?>dashboard/slider">Slider</a>
				</div>
			</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

			</ul>
			<!-- End of Sidebar -->

      <!-- Content Wrapper -->
	  <div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
        <!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>



					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle cursor-pointer" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo Session::get('username');?></span>
								<!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
								<i class="fa fa-user"></i>
							</a>
							
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?php echo URL;?>dashboard/adminprofile/<?php echo Session::get('userId');?>">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Edit Profile
								</a>
								<a class="dropdown-item" href="#">
								<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
								Settings
								</a>
								<!--<a class="dropdown-item" href="#">
								<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
								Activity Log
								</a>-->
								<div class="dropdown-divider"></div>
								<a href="" class="dropdown-item " data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
								</a>
							</div>
						</li>

					</ul>

					</nav>
					<!-- End of Topbar -->		  

    




