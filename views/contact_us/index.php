<?php
	include('libs/connection.php');
	
    $pageName = explode('/',$_GET['url']);
    $pageName = $pageName[0];	
	
    $selectSQL = "SELECT * FROM `pages_tbl` WHERE `page_type` = '$pageName'";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);	
    
    if(isset($row['page_description']) && $row['page_description'] != ''){
        $page_description = $row['page_description'];
    }else{
        $page_description = '';
    }

    if(isset($row['page_lati'],$row['page_long']) && ($row['page_lati'] && $row['page_long'])){
        $page_lati = $row['page_lati'];
        $page_long = $row['page_long'];        
    }else{
        $page_lati = '6.9271';
        $page_long = '79.8612';        
    }
    
    $selectSQL2 = "SELECT * FROM `theme_setting` WHERE 1";
    $result2 = mysqli_query($conn, $selectSQL2);
    $row2 = mysqli_fetch_assoc($result2);
    
    $website_name = $row2['website_name'];
    $header_logo = $row2['website_name']; 
    $footer_logo= $row2['footer_logo']; 
    $favicon_logo= $row2['favicon_logo']; 
    $footer_content= $row2['footer_content']; 
    $company_address= $row2['company_address']; 
    $company_phone1= $row2['company_phone1']; 
    $company_phone2= $row2['company_phone2']; 
    $company_email= $row2['company_email']; 
    $instagram= $row2['instagram']; 
    $facebook= $row2['facebook']; 
    $youtube= $row2['youtube']; 
    $whatsapp= $row2['whatsapp'];
	    
  
$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';
$phone = '';

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
/*
if (!$captcha) {
    //Do something with error
} else {
    $secret   = '6LfnhGcaAAAAAOdgb6Zl0UQs9-O6IGaz2LF6ycS_';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    // use json_decode to extract json response
    $response = json_decode($response);

    if ($response->success === false) {
        //Do something with error
        $error .= '<p><label class="text-danger">There have some problem...!!</label></p>';
    }
}   
*/
if(isset($_POST["submit"]))
{
    //Do something to denied access
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LfnhGcaAAAAAOdgb6Zl0UQs9-O6IGaz2LF6ycS_';
    $recaptcha_response = $_POST['recaptcha_response'];
    
    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    
    if($recaptcha->success==true){
        // Take action based on the score returned:
        if ($recaptcha->score >= 0.5) {
                                    
    
            	if(empty($_POST["name"]))
            	{
            		$error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
            	}
            	else
            	{
            		$name = clean_text($_POST["name"]);
            		if(!preg_match("/^[a-zA-Z ]*$/",$name))
            		{
            			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
            		}
            	}
            	if(empty($_POST["email"]))
            	{
            		$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
            	}
            	else
            	{
            		$email = clean_text($_POST["email"]);
            		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            		{
            			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
            		}
            	}
            	if(empty($_POST["phone"]))
            	{
            		$error .= '<p><label class="text-danger">Phone is required</label></p>';
            	}
            	else
            	{
            		$phone = clean_text($_POST["phone"]);
            	}
            	if(empty($_POST["subject"]))
            	{
            		$error .= '<p><label class="text-danger">Subject is required</label></p>';
            	}
            	else
            	{
            		$subject = clean_text($_POST["subject"]);
            	}
            	if(empty($_POST["message"]))
            	{
            		$error .= '<p><label class="text-danger">Message is required</label></p>';
            	}
            	else
            	{
            		$message = clean_text($_POST["message"]);
            	}
            	if($error == '')
            	{
            	    
            $messagetext = '
             
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3 body-main" style="border: 0px solid rgba(0,0,0,0);">
                            <div class="col-md-12">
            <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="" style="border:1px solid #ccc;box-shadow: 1px 0px 13px 2px #ccc;padding: 4%;margin-top: 8px; margin-bottom: 8px;border-radius: 8px;">
                        <tbody>
                            <tr>
                                <td colspan="3" height="80" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff" style="padding:0;margin:0;font-size:0;line-height:0">
                                    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td align="center" valign="middle" style="padding:0;margin:0;font-size:0;line-height:0">                            
            								<h2 style="color: #F81D2D;font-size:28px !important;"><strong>Fanz.Lk</strong></h2>
                                            <p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">'.$company_address.'</p>
                                            <p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">Tel: '.$company_phone1.'</p>
                                            <p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">Email: '.$company_email.'</p>
                                            <p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">Web: www.fanz.lk</p></td>
                                           
                                        </tr>
                                        <tr>
                                        	<td>
                                            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.5);">
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>
                                            <h6 style="color: #F81D2D;font-size:16px !important;" class="text-center"><strong>DETAILS OF CONTACT PERSON</strong></h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </td>
                            </tr>
                        
                            <tr>
                                <td align="center">
            
                                    <table class="table table-bordered" style="width: 100%;">
                                        <thead>
                                        </thead>
            							 <tbody>
                                            <tr>
                                                <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <span class="font-weight-bold m-0">Name </span> - '.$name.'									                                      
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <span class="font-weight-bold m-0">Email </span> - '.$email.' 										                                      
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <span class="font-weight-bold m-0">Phone </span> - '.$phone.'										                                      
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <span class="font-weight-bold m-0">Message</span> - <p style="text-align:justify;background-color: antiquewhite;padding: 2%;">'.$message.'</p>										                                      
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <p class="m-0" style="margin-bottom: 0px;"><b><span style="color:red;" class="font-weight-bold">Thanks for Contact Us </span> </b></p>									                                      
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <p class="m-0" style="margin-top: 0px;"><b>We will give you a feedback as soon as possible</b></p>									                                      
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
            										 <p class="m-0" style="margin-top: 0px;"><b>Walldecks Enteprises (Pvt) ltd. - FANZ.LK</b></p>									                                      
                                                </td>
                                            </tr>
            							 </tbody>							 
            							</table>
                                            </td>
                                            <td></td>
                                        </tr>
                        			</tbody>							 
            					</table> 
                                
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';	  
                    $datetime = date('Y-m-d H:i:s');
            	    
            		require 'assets/phpmailer/class.phpmailer.php';
            		$mail = new PHPMailer;
            		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
            		$mail->Host = 'sg1-ss18.a2hosting.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
            		//$mail->Host = gethostname();
            		$mail->Port = '465';								//Sets the default SMTP server port
            		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
            		$mail->Username = 'noreplay@fanz.lk';					//Sets SMTP username
            		$mail->Password = 'DFxt&mUe9l?E';					//Sets SMTP password
            		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
            		$mail->From = 'noreplay@fanz.lk';					//Sets the From email address for the message
            		$mail->FromName = $_POST["name"];				//Sets the From name of the message
            		$mail->addAddress('makarandapathirana@gmail.com', 'Contact us');		//Adds a "To" address             //Name is optional
                    $mail->addReplyTo('info@fanz.lk', 'Information');            		
            		$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
            		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
            		$mail->IsHTML(true);							//Sets message type to HTML				
            		$mail->Subject = $_POST["subject"];				//Sets the Subject of the message
            		$mail->Body = $messagetext;
            		if($mail->Send())								//Send an Email. Return true on success or false on error
            		{
            			$error = '<label class="text-success">Thank you for contacting us</label>';
            			
                        $insertSQL = "INSERT INTO `contact_tbl`(`name`, `subject`, `email`, `phone`, `message`, `date_time`) VALUES ('$name','$subject','$email','$phone','$message','$datetime')";
                        mysqli_query($conn, $insertSQL);            			
            			
            		}
            		else
            		{
            			$error = '<label class="text-danger">There is an Error</label>';
            		}
            		$name = '';
            		$email = '';
            		$subject = '';
            		$message = '';
            		$phone = '';
            	}
                
        }else{
            
        }
    
    }

}
?>

 <div class="col-sm-12 col-md-12 pl-0 pr-0">
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo URL;?>">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </div> 


<div class="col-12 col-sm-10 col-md-10 mt-5 contact_us_page">
	<div class="row justify-content-center">

		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12 mb-4">
					<h2>Contact Us</h2>
				</div>
				<div class="col-12 col-sm-12 col-md-12">
					<div class="row justify-content-center">
						<div class="col-12 col-sm-6 col-md-6">
							<h4 class="mb-4">Our Location</h4>
							<p>A Kids Centre Malabe sells clothing, furniture, toys, and accessories geared toward young children and their family. our store is a big box location that offers affordable items targeted at the majority of families or a boutique featuring unique designs and products with a higher purchase price.</p>
							
							<p class=""><i class="menu-icons et-pb-icon icofont-location-pin"></i> New Kandy Road, Weliwita Junction ,Sri Lanka.</p>
							<p><i class="menu-icons et-pb-icon icofont-phone"></i> +9477 253 0784</p>
							<p><i class="menu-icons et-pb-icon icofont-envelope"></i> rajaranatunga@gmail.com</p>
							
							<div class="contact_us_widget__social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-6">
						<?php echo $error; ?>
    					<form method="post" id="contactForm">
                            <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
							<h4>Get In Touch</h4>
							<p>Your email address will not be published. Required fields are marked (*)</p>
							  <div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Name" autocomplete="off" required>
							  </div>
							  <div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input type="email" class="form-control" placeholder="Enter Email" name="email" autocomplete="off" required>
							  </div>
							  <div class="form-group">
								<label for="exampleFormControlInput1">Message</label>
								<textarea class="form-control" name="message" placeholder="Enter Message" rows="4" autocomplete="off" required></textarea>
							  </div>                              
							  <div class="form-group">
                    			 <div class="row justify-content-center">
                    			    <div class="col-12 col-md-12">
                    			        <label for="exampleFormControlInput1">Recaptcha Code </label>    
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
						</div>
					</div>
				</div>		
				
				<div class="col-12 col-sm-12 col-md-12 mb-5 mt-5">
					<button type="submit" name="submit" value="Submit" class="btn site-btn float-right">Send</button>
				</div>
				</form>
			</div>
							
		</div>
	</div>		
</div>
<div class="col-12 col-sm-12 col-md-12 mb-5 mt-5">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1177.5481360499857!2d79.97232975690257!3d6.916405221490697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae257750c0bd671%3A0x9a2f51c3c7f36a0f!2sKids%20Center%20Malabe!5e0!3m2!1sen!2slk!4v1693980307066!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>  
      
        
          