<?php
//session_start();
include('libs/connection.php');
require 'assets/phpmailer/class.phpmailer.php';
$error = '';
$errorlogin = '';
$name = '';
$email = '';
$password = '';
$confirm_password = '';
$phone = '';

$company_address = '';
$company_phone1 = '';
$company_email = '';
$errorlogin = '';
$loginemail = '';
$loginpassword = '';
/*
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}
*/
function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
		$signUrls = explode('/',$_GET['url']);
if(isset($signUrls[1]) && $signUrls[1] != ''){
    $signUrl = $signUrls[1];
    $_SESSION['main_cat_url'] = $signUrl;
}else{
    $signUrl = '';
    unset($_SESSION['main_cat_url']);
}		
		
		
		
$district_list = '';
$distRst = mysqli_query($conn, "SELECT * FROM `post_districs`");
if (mysqli_num_rows($distRst) > 0) {
  while($distRow = mysqli_fetch_assoc($distRst)) {
	
	$district_name = $distRow['district_name'];
    $district_list .= '<option value="'.$district_name.'"> '.$district_name.' </option>';
  }
} else {
	$district_list .= '';
} 

//var_dump($_SESSION['main_cat_url']);
?>



 <div class="col-sm-12 col-md-12 pl-0 pr-0">
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>User Password Reset</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo URL;?>">Home</a>
                            <span>User Password Reset</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </div> 
 

<div class="col-12 col-sm-10 col-md-10 mt-5">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-12">

		</div>
		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-md-12 col-12 mt-4 mb-4 login-area">
					<div class="row justify-content-center">
						<div class="col-md-6 col-12 p-4">
							<div class="row justify-content-center shadow-lg login-left-side border p-3">
								<div class="col-md-12 col-12">
									<h2>User Password Reset</h2>
									<?php //var_dump($_SESSION);?>
								</div>
								<div class="col-md-12 col-12">
									<form id="user_reset_form" type="POST">
										<fieldset>
											<label for="username">Email address&nbsp;<span class="required text-danger">*</span></label>
											<input class="form-control" name="user_name" placeholder="Enter Your Email" type="email" id="qlogStIDEmil465815" size="30" required data-parsley-type="email" data-parsley-trigger="keyup" autocomplete="off">
											<label for="password" class="mt-3">New Password&nbsp;<span class="required text-danger">*</span></label>
											<div class="input-group">
												<input type="password" name="user_new_password" class="form-control showInput" placeholder="Enter Your New Password" aria-describedby="showBtn"  id="user_new_pwd" size="30"  required data-parsley-trigger="keyup" autocomplete="off">
												<div class="input-group-prepend">
												  <button type="button" class="input-group-text showBtn" id="showBtn" value="1"><i class="fa fa-eye-slash" id="showIcon"></i></button>
												</div> 
                                             </div>
                                             <div class="form-group mt-3">
                                                 <label for="username" class="">Confirm Password&nbsp;<span class="required text-danger">*</span></label>
                                                 <input type="text" name="user_confirm_password" class="form-control" placeholder="Enter Your Confirm Password" aria-describedby="showBtn" id="user_new_confirm_pwd" size="30"  required data-parsley-equalto="#user_new_pwd" data-parsley-trigger="keyup" autocomplete="off">
                                             </div>     
						
        					
                                              <div class="form-group mt-3">
                                    			 <div class="row justify-content-center">
                                    			    <div class="col-12 col-md-12">
                                    			        <label for="exampleFormControlInput1">Recaptcha Code&nbsp;<span class="required text-danger">*</span></label>    
                                    			    </div>
                                    			    <div class="col-12 col-sm-6 col-md-6 recaptcha_col_left pr-0"> 
                                    					<input type="text" placeholder="Recaptcha Code *" style="margin-top: 2px;" name="captcha_code" id="captcha_code" class="form-control" data-parsley-trigger="keyup" required="">
                                    				  </div>	
                                    				   <div class="col-12 col-sm-6 col-md-6 recaptcha_col_right pl-0">
                                    						<img src="<?php echo URL;?>assets/action/recaptcha_image.php" id="captcha_image" style="width: 170px;height: 40px;padding: 2px 0 0;">
                                    						<button type="button" class="btn btn-transparent recaptch_refresh bg-transparent"><i class="fa fa-refresh"></i></button>
                                    			       </div>
                                    		      </div>
                                    		  </div>
                                    		  
											<!--<div class="box">
												<span class="left"><input class="checkbox" type="checkbox" id="check1" data-parsley-multiple="check1"><label for="check1">Remember Me</label></span>
												<a href="#" class="help">Help?</a>
											</div>-->
											<button type="submit" id="loginsubmit" name="Login" value="Login" class="btn view_more mt-3">Submit</button>
										</fieldset>
									</form>
								</div>									
							</div>
						</div>
						<!--<div class="col-md-6 col-12 p-4">
							<div class="row justify-content-center shadow-lg login-left-side border p-3">
								<div class="col-md-12 col-12">
									<h2>Register</h2>
								</div>
								<div class="col-md-12 col-12">
									<form id="validate_form">
										<fieldset>
										  <div class="row justify-content-start">
											<div class="col-12 col-md-6">
												<label for="username">First Name <span class="required text-danger">*</span></label>
												<input type="text" placeholder="Name" class="input form-control" name="fname" id="fname" required data-parsley-trigger="keyup">
											</div>
											<div class="col-12 col-md-6">
												<label for="username">Last Name <span class="required text-danger">*</span></label>
												<input type="text" placeholder="Name" class="input form-control" name="lname" id="lname" required data-parsley-trigger="keyup">
											</div>
											<div class="col-12 col-md-12">
												<label for="username">Email Address <span class="required text-danger">*</span></label>
												<input type="email" placeholder="Email" class="input searchEmail form-control" name="email" id="email" required data-parsley-type="email" data-parsley-trigger="keyup">
											</div>	
											<div class="col-12 col-md-6">	
												<label for="username">Password <span class="required text-danger">*</span></label>
												<input type="password" placeholder="Password" class="input form-control" name="password" id="password" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup"> 
											</div>	
											<div class="col-12 col-md-6">
												<label for="username">Confirm Password <span class="required text-danger">*</span></label>
												<input type="password" placeholder="Confirm Password" class="input form-control" name="confirm_password" data-parsley-equalto="#password" data-parsley-trigger="keyup" required id="confirm_password">
											</div>	
											<div class="col-12 col-md-6">
												<label for="username">Whatsapp Number <span class="required text-danger">*</span></label>
												<input type="number" placeholder="Whatsapp Number" class="input form-control" name="whatsapp_phone" required data-parsley-type="number" data-parsley-trigger="keyup" id="whatsapp_phone">	
											</div>	
											<div class="col-12 col-md-6">
												<label for="username">Phone <span class="required text-danger">*</span></label>
												<input type="number" placeholder="Phone" class="input form-control" name="phone" required data-parsley-type="number" data-parsley-trigger="keyup" id="phone">
											</div>	
											<div class="col-12 col-md-6">
												<label for="username">District <span class="required text-danger">*</span></label>
												<select class="form-control" name="district" required  id="district">
													<?php echo $district_list;?>
												</select>
											</div>	
											<div class="col-12 col-md-6">
												<label for="username">NIC <span class="required text-danger">*</span></label>
												<input type="text" placeholder="NIC" class="input form-control" name="nic" required data-parsley-trigger="keyup" id="nic">
											</div>	
											<div class="col-12 col-md-12">
                                              <div class="form-group mt-2">
                                               <div class="checkbox">
                                                <label><input type="checkbox" id="check_rules" name="check_rules" required /> I Accept the <a href="<?php echo URL;?>privacy_policy" class="btn btn-link pl-0 pr-0 pb-2" target="_new">privacy policy</a> & <a href="<?php echo URL;?>terms_conditions" class="btn btn-link pl-0 pr-0 pb-2" target="_new">Terms & Conditions</a>.</label>
                                               </div>
                                              </div>
                                            </div>
											<p></p>
											<div class="col-12 col-md-12">
												<button type="submit" id="regsubmit" name="Login" value="Login" class="btn view_more">Register</button>
											</div>
										  </div>
										</fieldset>
									</form>
								</div>									
							</div>  	
						</div>-->						
					</div>
				</div>		
			</div>	

		
	   </div>
	</div>
   </div>
	


	
     