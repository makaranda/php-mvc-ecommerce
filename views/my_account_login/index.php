
<div class="col-12 col-sm-10 col-md-10 mt-5">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb bg-transparent">
				<li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Account</li>
			  </ol>
			</nav>
		</div>
		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12">
					<h2>My Account</h2>
				</div>	
				<div class="col-md-12 col-12 mt-4 mb-4 login-area">
					<div class="row justify-content-center">
						<div class="col-md-6 col-12 p-4">
							<div class="row justify-content-center shadow-lg login-left-side border p-3">
								<div class="col-md-12 col-12">
									<h2>Login</h2>
								</div>
								<div class="col-md-12 col-12">
									<form id="login_form">
										<fieldset>
											<label for="username">Username or email address&nbsp;<span class="required">*</span></label>
											<input class="form-control" name="user_name" placeholder="Enter Your Email" type="text" id="qlogStIDEmil465815" size="30" required="" autocomplete="off">
											<label for="password" class="mt-3">Password&nbsp;<span class="required">*</span></label>
											<div class="input-group">
												<input type="password" name="user_password" class="form-control showInput" placeholder="Enter Your Password" aria-describedby="showBtn" id="qlogpwd044515" size="30" required="" autocomplete="off">
												<div class="input-group-prepend">
												  <button type="button" class="input-group-text showBtn" id="showBtn" value="1"><i class="fa fa-eye-slash" id="showIcon"></i></button>
												</div> 
                                             </div>
											<!--<div class="box">
												<span class="left"><input class="checkbox" type="checkbox" id="check1" data-parsley-multiple="check1"><label for="check1">Remember Me</label></span>
												<a href="#" class="help">Help?</a>
											</div>-->
											<button type="button" id="loginsubmit" name="Login" value="Login" class="btn view_more mt-3">Login</button>
										</fieldset>
									</form>
								</div>									
							</div>
						</div>
						<div class="col-md-6 col-12 p-4">
							<div class="row justify-content-center shadow-lg login-left-side border p-3">
								<div class="col-md-12 col-12">
									<h2>Register</h2>
								</div>
								<div class="col-md-12 col-12">
									<form id="validate_form">
										<fieldset>
											<label for="username">Name<span class="required"></span></label>
											<input type="text" placeholder="Name" class="input form-control" name="name" id="name" required="">
											<label for="username">Email Address<span class="required"></span></label>
											<input type="text" placeholder="Email" class="input searchEmail form-control" name="email" id="email" required="">
											<label for="username">Password<span class="required"></span></label>
											<input type="text" placeholder="Password" class="input form-control" name="password" id="password" required=""> 
											<label for="username">Confirm Password<span class="required"></span></label>
											<input type="text" placeholder="Confirm Password" class="input form-control" name="confirm_password" required="" id="confirm_password">
											<label for="username">Phone<span class="required"></span></label>
											<input type="text" placeholder="Phone" class="input form-control" name="phone" required="" id="phone">											
											<p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="<?php echo URL;?>privacy_policy" class="btn btn-link" target="_blank">privacy policy</a>.</p>
											<button type="button" id="regsubmit" name="Login" value="Login" class="btn view_more">Register</button>
										</fieldset>
									</form>
								</div>									
							</div>  	
						</div>						
					</div>
				</div>		
			</div>	

		
	   </div>
	</div>
   </div>