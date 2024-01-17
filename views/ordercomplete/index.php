<?php
    unset($_SESSION['downloadmsg']);
?>
      <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(<?php echo URL;?>assets/images/img-76.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">ORDER COMPLETE</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="<?php echo URL;?>products">Products <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="">Order Complete</a></li>
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
                  <li class="active">
                    <span class="counter">03</span>
                    <strong class="title">Order Complete</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- Mt Process Section of the Page end -->
		<div class="row justify-content-center">
			<div class="col-md-8">
			        <div class="row justify-content-center">
				<?php
					if(isset($_SESSION['order_complete_message']) && $_SESSION['order_complete_message'] != ''){
						if($_SESSION['order_complete_message'] == 'completed'){
						    echo '<div class="col-md-4 col-4">';
							echo '<img src="'.URL.'assets/images/completed.gif" style="width:200px"/>';
							echo '</div>';
							echo '<div class="col-md-8 col-8">';
							echo '<h1>ORDER IS COMPLETED</h1>';
							echo '</div>';
							$message = 'paymentcompleted';
							//echo '<script>window.open("'.URL.'invoice/, "_blank");</script>';
							if(isset($_SESSION['downloadmsg']) && $_SESSION['downloadmsg'] == 'downloaded'){
							    
							}else{
							    echo '<script>window.location.replace = "'.URL.'invoice/index.php";</script>';
							}
							
							//exit();
						}elseif($_SESSION['order_complete_message'] == 'notcompleted'){
						    //echo '<script>window.open("'.URL.'invoice/", "_blank");</script>';
						    echo '<div class="col-md-4 col-4">';
							echo '<img src="'.URL.'assets/images/notcompleted.gif" style="width:200px"/>';
							echo '</div>';
							echo '<div class="col-md-8 col-8">';
							echo '<h1>ORDER IS NOT COMPLETED</h1>';
							echo '</div>';
							$message = 'paymentnotcompleted';
							//header('Location: invoice/');
							if(isset($_SESSION['downloadmsg']) && $_SESSION['downloadmsg'] == 'downloaded'){
							    
							}else{
							    echo '<script>window.location.replace = "'.URL.'invoice/index.php";</script>';
							    //header('Location: '.URL.'invoice/');
							}
							
							//exit();
						}
						
						//include('invoice/index.php');
						
                		//unset($_SESSION['feature_image']);
                		//unset($_SESSION['shopping_cart']);	
                		//unset($_SESSION['user_details']);						
						
					}else{
						echo '<h1>NO ANY MESSAGE</h1>';
					}
				?>
				    </div>
			</div>
		</div>
        <!-- Mt Product Table of the Page -->
	  </main>	
	  <input type="hidden" id="paymentmessage" value="<?php echo $_SESSION['order_complete_message'];?>"/>