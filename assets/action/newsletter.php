<?php
include('../../config/paths.php');
include('../../config/database.php');
sleep(3);
//var_dump($_POST);
//$_POST['user_email'] = 'makarandapathirana@gmail.com';
if(isset($_POST['user_email'])){
	
	$email = $_POST['user_email'];
	$error = '';
	$year = date('Y');
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	//$error = "$email is a valid email address";
	

            $messagetext = '
             
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3 body-main" style="border: 0px solid rgb(8 105 165);">
                            <div class="col-md-12">
								<table width="80%" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="" style="border:1px solid #ccc;box-shadow: 1px 0px 13px 2px #ccc;padding: 4%;margin-top: 8px; margin-bottom: 8px;border-radius: 8px;">
									<tbody>									
		
										<td colspan="3" height="80" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff" style="padding:0;margin:0;font-size:0;line-height:0">
											<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
											<tbody>
												<tr>
													<td style="width: 30%;"><img src="'.URL.'assets/images/logo_new.png" class="img-fluid" style="width: 200px;"></td>
		  
													<td align="center" valign="middle" style="padding:0;margin:0;font-size:0;line-height:0;width: 70%;">                            
													<h3 style="color: rgb(8 105 165);font-size:25px !important;"><strong>THIRUPATHI</strong></h3>
													<p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;display:none;">company address</p>
													<p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">Tel: company phone</p>
													<p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">Email: company email</p>
													<p class="mt-1 mb-1" style="font-size:18px;line-height: 0.5;">Web: www.thirupathi.com</p></td>
												   
												</tr>
												<tr>
													<td colspan="2">
													<hr style="border-top: 1px solid rgba(0, 0, 0, 0.5);">
													</td>
												</tr>
											</tbody>
											</table>
										</td>
									</tr>									 
									  <tr>
										<td colspan="2" height="80" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff" style="padding:0;margin:0;font-size:0;line-height:0">
											<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
												<tbody>
													<tr>
														<td>
														<h6 style="color: rgb(8 105 165);font-size:16px !important;" class="text-center"><strong>NEWS LETTER</strong></h6>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									  </tr>
                        
										<tr>
											<td align="center" colspan="3">
						
												<table class="table table-bordered" style="width: 100%;">
													<thead></thead>
													<tbody>
														<tr>
															<td class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
																 <span class="font-weight-bold m-0" style="text-align:justify;padding: 2% 0 2% 2%;">Email </span> - '.$email.' 										                                      
															</td>
														</tr>
														<tr>
															<td colspan="2" class="m-0 pl-3 pt-1 pb-1" style="font-size:12px !important;">
																 <span class="font-weight-bold m-0"></span><p style="text-align:justify;padding: 2%;">Thanks for contact us and we will send you the latest news for this email</p>										                                      
															</td>
														</tr>
															
													  </tbody>							 
												 </table>
											 </td>
											<td></td>
										 </tr>
										 <tr>
											<td colspan="3"><img src="'.URL.'assets/images/TMT-Main-Board-W16ft5xH2ft.jpg" width="100%"/></td>
										 </tr>
										 <tr><td colspan="3" align="center"><div style="padding:5%;">Copyright Thirupathi © '.$year.', All rights reserved.</div></td></tr>
									</tbody>							 
								</table> 
                                

                            </div>
                        </div>
                    </div>
                </div>
            ';
 
		require '../phpmailer/class.phpmailer.php';
	 
		$mail = new PHPMailer;
		$mail->IsSMTP();							
		$mail->Host = 'sg1-ss18.a2hosting.com';	
		//$mail->Host = gethostname();
		$mail->Port = '465';					
		$mail->SMTPAuth = true;						
		$mail->Username = 'noreplay@ceyloneazycabs.com';				
		$mail->Password = 'RC9vv0Hnp3e';				
		$mail->SMTPSecure = 'ssl';							
		$mail->From = 'noreplay@ceyloneazycabs.com';				
		$mail->FromName = 'Thirupathi';				
		$mail->addAddress('makarandapathirana@gmail.com', 'News Letter');
		$mail->WordWrap = 50;					
		$mail->IsHTML(true);									
		$mail->Subject = 'Forum - from '.$email.'';				
		$mail->Body = $messagetext;
		
		/*if(!$mail->Send()){
			$error = "$email is not a registered email address";
		}else{
			$error = "your are now registered and you can received a email from us";
		}*/	
		$error = "your are now registered and you can received a email from us";
	} else {
	  $error = "$email is not a valid email address format";
	}

}

echo $error;
//echo $messagetext;

