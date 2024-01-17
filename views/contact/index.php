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

      <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(<?php echo URL;?>assets/images/img-76.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">Contact</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="">Contact<i class="fa fa-angle-right"></i></a></li>
                  </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
              </div>
            </div>
          </div>
        </section>

        <!-- Mt Detail Section of the Page end -->
      </main><!-- Main of the Page end here -->
 	  <input type="hidden" class="form-control" name="latitude" id="latitude" value="<?php echo $page_long;?>">
      <input type="hidden" class="form-control" name="longatude" id="longatude" value="<?php echo $page_lati;?>">     
      
      <div class="container shadow-lg">
          <div class="row justify-content-center mt-5">
             <div class="col-10 col-md-8 mt-4">              
    			<div class="row">
    				<div class="col-md-8" style="margin:0 auto; float:none;">
    					<?php echo $error; ?>
    					<form method="post" action="" class="contactForm">
                            <!--<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <input type="hidden" name="action" value="validate_captcha">-->
                            <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
    						<div class="form-group">
    							<label>Enter Name</label>
    							<input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" autocomplete="off"/>
    						</div>
    						<div class="form-group">
    							<label>Enter Email</label>
    							<input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" autocomplete="off"/>
    						</div>
    						<div class="form-group">
    							<label>Enter Subject</label>
    							<input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" autocomplete="off"/>
    						</div>
    						<div class="form-group">
    							<label>Enter Phone</label>
    							<input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="<?php echo $phone; ?>" autocomplete="off"/>
    						</div>
    						<div class="form-group">
    							<label>Enter Message</label>
    							<textarea name="message" class="form-control" placeholder="Enter Message" rows="4"><?php echo $message; ?></textarea>
    						</div>
    						<div class="form-group d-none">
    						    <div class="g-recaptcha" data-sitekey="6LfnhGcaAAAAAIiiohx-Bjx87qf2_WpIRonQXLY4"></div>
    						</div>
    						<div class="form-group" align="right">
    							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
    						</div>
    					</form>
    				</div>
    			</div>
			</div>
			
              <div class="col-10 col-md-4">
                  <p><?php echo $page_description;?></p>
              </div>
              <div class="col-12 col-md-12 pl-0 pr-0">
                  <div style="width: 100%; height: 100vh" id="map" class="map"></div>  
              </div>
              
          </div>
          
      </div>    
          