
			<main id="mt-main">
				<!-- Mt Contact Banner of the Page -->
				<section class="mt-contact-banner style4" style="background-image: url(<?php echo URL;?>assets/images/img11.jpg);">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>ADMIN LOGIN</h1>
								<!-- Breadcrumbs of the Page -->
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
										<li><a href="">Admin Login</a></li>
									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
							</div>
						</div>
					</div>
				</section>

<div class="container-fluid mt-2">
  <div class="row justify-content-center">
    <div class="col-md-10 shadow-lg bg-white rounded">  

			<div class="row justify-content-center">
				<div class="col-md-10 col-10 mt-4 mb-4 login-area">
					<div class="row justify-content-center">					
						<div class="col-md-12 col-12 p-4">
						  <div class="row justify-content-center"> 
							<div class="col-md-6 col-12">
								<h3 class="text-uppercase font-weight-bold d-none">Admin Login</h3>
								<img src="<?php echo URL;?>assets/images/logo.png" class="main_logo d-none"/>
							</div>
							<div class="col-md-12 col-12"></div>
						    <div class="col-md-6 col-12">
								<form action="ecadmin/run" method="POST">
									<div class="form-group">
										<label for="exampleInputEmail1">Username</label>
										<input type="text" class="form-control" name="username">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" class="form-control" name="password">
									</div>
									<button type="submit" class="btn btn-primary w-100">Login</button>
								</form>
							  <div class="form-group text-center mt-3">
								<a href="<?php echo URL;?>resetpassword/" class="text-center text-primary">Forgot password..?</a>
								<hr>
							  </div>
							  <div class="form-group text-center">
								<p class="">Don't have an account yet..?</p>
								<a href="<?php echo URL;?>signup/" class="btn btn-light text-center pr-4 pl-4">Sign Up</a>
							  </div>							  
							</div>  
						  </div>  	
						</div>						
					</div>
				</div>		
			</div>	

		
	   </div>
	</div>
   </div>