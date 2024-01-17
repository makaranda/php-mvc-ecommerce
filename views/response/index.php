				<!-- Mt Contact Banner of the Page -->
<!--				<section class="mt-contact-banner style4" style="background-image: url(<?php //echo URL;?>assets/images/img11.jpg);">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>RESPONSE PAGE</h1>
								<!-- Breadcrumbs of the Page -->
	<!--							<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="">Response Page</a></li>

									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
<!--							</div>
						</div>
					</div>
				</section><!-- Mt Contact Banner of the Page end -->
<?php
	include('libs/connection.php');
//echo 'cart session - ';	
var_dump($_SESSION['shopping_cart']);	
    $allURL = explode('/',$_GET['url']);
	if($allURL[0] != ''){
		$responsemsg = $allURL[0];
	}else{
	    //$responsemsg = $allURL[2];
	    $responsemsg = '';
	    session_destroy();
		//echo '<script>window.location.href = "'.URL.'";</script>';
	}
    
    if(isset($responsemsg) && $responsemsg == 'notsuccess'){
        
        
        
        
    }
    
    
?>
