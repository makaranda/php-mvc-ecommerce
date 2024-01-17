<?php

	$company_phone11 = strtolower($company_phone1);   
	$company_phone11 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $company_phone11);
	$company_phone11 = str_replace(' ','',$company_phone11);	
	
	$company_phone22 = strtolower($company_phone2);   
	$company_phone22 = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $company_phone22);
	$company_phone22 = str_replace(' ','',$company_phone22);

?>
			<!-- footer of the Page -->

   
 </div>
</div>

<!-- Footer Section Begin -->
<footer class="footer spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer__about">
					<div class="footer__about__logo">
						<a href="<?php echo URL;?>"><img src="<?php echo URL;?>assets/images/main_logo.jpg" alt="Kids Centre Malabe" class="main_nav_logo"></a>
					</div>
					<ul>
						<li>Address: New Kandy Road ,</li>
						<li>Phone: <a href="tel:94772530784">+9477 253 0784</a></li>
						<li>Email: <a href="mailto:rajaranatunga@gmail.com">rajaranatunga@gmail.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
				<div class="footer__widget">
					<h6>Useful Links</h6>
					<ul>
						<li class="hvr-forward"><a href="<?php echo URL;?>careers">Careers</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>buying_guide">Buying Guide</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>faq">FAQs</a></li>
						<li class="hvr-forward d-none"><a href="<?php echo URL;?>order_returns">Order Returns</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>contact_us">Contact Us</a></li>
					</ul>
					<ul>
						<li class="hvr-forward"><a href="<?php echo URL;?>about_us">About Us</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>delivery_information">Delivery Information</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>privacy_policy">Privacy &amp; Policy</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>terms_condition">Terms &amp; Condition</a></li>
						<li class="hvr-forward"><a href="<?php echo URL;?>sitemap">Sitemap</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="footer__widget">
					<h6>About Us</h6>
					<p>A Kids Centre Malabe sells clothing, furniture, toys, and accessories geared toward young children and their family. our store is a big box location that offers affordable items targeted at the majority of families or a boutique featuring unique designs and products with a higher purchase price.</p>

					<div class="footer__widget__social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">

			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4 mb-4">
				<div class="row justify-content-center newsletter">
					<div class="col-12 col-sm-3 col-md-3">
						<img src="<?php echo URL;?>assets/images/payments_type_icons.png"/>
					</div>
					<div class="col-12 col-sm-5 col-md-5">
						<div class="center_footer_sec">       
							<span>Copyright © <?php echo date('Y');?> All Rights Reserved. Developed By <a href="https://websl.lk" target="_new" title="Richwin Group">WEBSL.LK</a> </span>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 right_menu">
						<a href="<?php echo URL;?>about_us" title="About Richwin Group">About Kds Centre</a>
						<a href="<?php echo URL;?>careers" title="Richwin Group Careers"> Careers </a>
						<a href="<?php echo URL;?>sitemap" title="Sitemap">Sitemap</a>					
					</div>
				</div>		
			</div>	
			
		</div>
	</div>
</footer>
<!-- Footer Section End -->

	


<div class="" id="toTop" style="display: block;">
	<a href="#" class="js-gotop1"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>


	
<script src="<?php echo URL;?>assets/js/snowstorm.js"></script>


<script src="<?php echo URL;?>assets/js/Control.Geocoder.js"></script>
<script src="<?php echo URL;?>assets/js/leaflet-routing-machine.js"></script>
<script src="<?php echo URL;?>assets/js/myscript.js"></script>


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="<?php echo URL;?>assets/js/jquery-confirm.js"></script>

<script src="<?php echo URL;?>assets/theme/js/jquery.js"></script>

<script src="<?php echo URL;?>assets/js/vanilla-tilt.js"></script>

<!-- include jQuery -->
<script src="<?php echo URL;?>assets/theme/js/plugins.js"></script>
<!-- include jQuery -->
<script src="<?php echo URL;?>assets/theme/js/jquery.main.js"></script>

<!-- Js Plugins -->
<script src="<?php echo URL;?>assets/theme/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo URL;?>assets/theme/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>assets/theme/js/jquery.nice-select.min.js"></script>
<script src="<?php echo URL;?>assets/theme/js/jquery-ui.min.js"></script>
<script src="<?php echo URL;?>assets/theme/js/jquery.slicknav.js"></script>
<script src="<?php echo URL;?>assets/theme/js/mixitup.min.js"></script>
<!--<script src="<?php echo URL;?>assets/theme/js/owl.carousel.min.js"></script>-->
<script src="<?php echo URL;?>assets/theme/js/main.js?v=<?php echo time();?>"></script>

<script src="<?php echo URL;?>assets/js/paginathing.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo URL;?>assets/theme/js/jquery.exzoom.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<!-- <script src="<?php //echo URL;?>assets/js/app.js"></script> -->
<script src="https://www.google.com/recaptcha/api.js?render=6LfnhGcaAAAAAIiiohx-Bjx87qf2_WpIRonQXLY4"></script>
<!--<script src="http://parsleyjs.org/dist/parsley.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.0/parsley.js"></script>

 <script>

$(document).ready(function() {

recaptcha_reset();
recaptcha_reset2();
 
 
$(document).on('click','.recaptch_refresh2',function(){
	$('.recaptch_refresh2').addClass('rotate');

	recaptcha_reset2();

	setTimeout(function() {
		$('.recaptch_refresh2').removeClass("rotate");
	}, 1000);

});

$(document).on('click','.recaptch_refresh',function(){
	$('.recaptch_refresh').addClass('rotate');

	recaptcha_reset();
	
	setTimeout(function() {
		$('.recaptch_refresh').removeClass("rotate");
	}, 1000);

});          
            
      
function recaptcha_reset2(){
	$('#captcha_image2').attr('src', '<?php echo URL;?>assets/action/recaptcha_image.php');			 
}

function recaptcha_reset(){
	$('#captcha_image').attr('src', '<?php echo URL;?>assets/action/recaptcha_image.php');			 
}	

    $(".main_nav").click(function(){
        $(".main_nav").toggleClass("main_nav_open");
            $('.main_nav span').addClass('fa-close');
            $('.main_nav span').removeClass('fa-bars');
        if($(".main_nav").hasClass("main_nav_open") == false){
            $('#navbarNav').addClass('d-none');
            $('.main_nav span').addClass('fa-bars');
            $('.main_nav span').removeClass('fa-close');
        }else{
            $('#navbarNav').removeClass('d-none');
            $('.main_nav span').addClass('fa-close');
            $('.main_nav span').removeClass('fa-bars');
        }
    });
	
		$('#search_data').on('keyup',function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
               
                $.ajax({  
                     url:"<?php echo URL;?>assets/action/fetch_search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#productsList').fadeIn();  
                          $('#productsList').html(data); 
                          
                          var sum = 0;
                          $('#productsList ul li').nextUntil(':eq(2)').each(function() {
                               sum += $(this).height(); 
                            });
                         var num = $("#menu").find("li").length;

                         if(sum >= 400){
                             $("#productsList ul").css("height", "400px");
                         }else if(sum < 400 && num == '5'){
                             //$("#productsList ul").css("height", ""+sum+""); 
                             $("#productsList ul").css("height", "370px");
                         }else if(sum < 400 && num == '4'){
                             //$("#productsList ul").css("height", ""+sum+""); 
                             $("#productsList ul").css("height", "296px");
                         }else if(sum < 400 && num == '3'){
                             //$("#productsList ul").css("height", ""+sum+""); 
                             $("#productsList ul").css("height", "222px");
                         }else if(sum < 400 && num == '2'){
                             //$("#productsList ul").css("height", ""+sum+""); 
                             $("#productsList ul").css("height", "148px");
                         }else if(sum < 400 && num == '1'){
                             //$("#productsList ul").css("height", ""+sum+""); 
                             $("#productsList ul").css("height", "74px");
                         }   
                            //alert(sum);
                          //alert(data);
                     }  
                });  
           }else{
               $('#productsList').fadeOut(); 
               $('#productsList').css('display','none');
           }  
      });  
      $(document).on('click', '#productsList ul li', function(){  
           $('#search_data').val($(this).text());  
           $('#productsList').fadeOut();  
      });	
	
         $('#newsletter_btn').on('click', function(){
		   if($('#user_email').val() != ''){	 
			   $.ajax({
				url:"<?php echo URL;?>assets/action/newsletter.php",
				method:"POST",
				data:$('#newsletter_form').serialize(),
				beforeSend:function(){
				 //$('#newsletter_btn').attr('disabled','disabled');
				 $('#newsletter_btn').val('Submiting');
				 $('#loading_response').addClass('d-block');
				 $('#loading_response').removeClass('d-none');
				},
				success:function(data)
				{
				 $('#newsletter_form')[0].reset();
				 //$('#newsletter_btn').attr('disabled',false);
				 $('#newsletter_btn').val('Subscribe');
				 //alert(data);
				 
				 $('#loading_response').removeClass('d-block');
				 $('#loading_response').addClass('d-none');
					$.alert({
						title: 'Message...!!!',
						content: ''+data+'',
						btnClass: 'btn-red any-other-class',
					});         
				}
			   });
		   }else{
			   $.alert({
						title: 'Warning...!!!',
						content: 'You Must Type Email Here...!!',
						btnClass: 'btn-red any-other-class',
				});
		   }  
          
         });

      $('#regsubmit').on('click', function(){
           //alert();
           $.ajax({
            url:"<?php echo URL;?>assets/action/userreg.php",
            method:"POST",
            data:$('#validate_form').serialize(),
            beforeSend:function(){
             $('#regsubmit').attr('disabled','disabled');
             $('#regsubmit').text('Registering...');
			 $('#loading_response').addClass('d-block');
			 $('#loading_response').removeClass('d-none');			 
            },
            success:function(data)
            {
             $('#validate_form')[0].reset();
             //$('#validate_form').parsley().reset();
             $('#regsubmit').attr('disabled',false);
             $('#regsubmit').text('Register');
             //$('#submit').removeClass('bg-danger');
			 $('#loading_response').removeClass('d-block');
			 $('#loading_response').addClass('d-none');				 
             //alert(data);
             //$('#checkcode').text(data);
             
        		$.alert({
        			title: 'Message...!!!',
        			content: data,
        			btnClass: 'btn-red any-other-class',
        		}); 
				setTimeout(function() {
					window.location.replace('<?php echo URL;?>my_account');
				}, 5000);				
				
        	   //$('body').removeClass('side-col-active');
        	   //$('.mt-side-over').removeClass('active');	
            }
           });
          
         });
    
	$('#myCarousel').carousel({
	  interval: 8000
	});
	
	var owlslider = $('.carousel-main');
	
	owlslider.owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 8000,
		margin: 10,
		nav: true,
		dots: true,    
		animateOut: 'slideOutUp',
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		},
		navText: ['<span class="fa fa-chevron-left fa-2x"></span>','<span class="fa fa-chevron-right fa-2x"></span>'],
	});
$(window).on('load',function(){

    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: false,
		responsiveClass:true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
		autoplayTimeout: 8000,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            300: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });	
});	
/*
 owlslider.on('changed.owl.carousel', function(event) {
      var item = event.item.index - 1; 

      $('h3').removeClass('animated bounce');
	  $('.owl-item').not('.cloned').eq(item).find('h3').addClass('animated bounce');
  });
*/	

	$('.carousel .item').each(function(){
	  var next = $(this).next();
	  if (!next.length) {
		next = $(this).siblings(':first');
	  }
	  next.children(':first-child').clone().appendTo($(this));
	  
	  for (var i=0;i<2;i++) {
		next=next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		
		next.children(':first-child').clone().appendTo($(this));
	  }
	});
	
    $('.searchEmail').parsley();
    
        window.ParsleyValidator.addValidator('checkemail', {
          validateString: function(value)
          {
             
            return $.ajax({
              url:'<?php echo URL;?>assets/action/checkemail.php',
              method:"POST",
              data:{email:value},
              dataType:"json",
              success:function(data)
              {
                 
                return true;
              }
            });
          }
        });
		
	
	$('#login_form').parsley();
    $('#login_form').on('submit', function(event){
        event.preventDefault();
    
        if($('#login_form').parsley().isValid())
    		{

               //var userCategoryUrl = $('#user_category_url').val();
               //alert(userCategoryUrl);
              
               $.ajax({
                url:"<?php echo URL;?>assets/action/userlogin.php",
                method:"POST",
                dataType:"json",
    			cache:false,
                data:$('#login_form').serialize(),
                beforeSend:function(){ 
                 $('#loginsubmit').attr('disabled','disabled');
                 $('#loginsubmit').text('Loging...');
    			 $('#loading_response').addClass('d-block');
    			 $('#loading_response').removeClass('d-none');
                },
                success:function(data)
                {
                
                 $('#login_form')[0].reset();
                 $('#login_form').parsley().reset();
                 $('#loginsubmit').attr('disabled',false);
                 $('#loginsubmit').text('Login');
    			 $('#loading_response').removeClass('d-block');
    			 $('#loading_response').addClass('d-none');	
    			 
    			 recaptcha_reset();

    			 if(data.messages == 'Reg'){
    				//setTimeout(function() {
    					window.location.replace('<?php echo URL;?>user_profile/');
    				//}, 1000);
    			 }else if(data.messages == 'recaptcha_error'){
    			     $.alert({
            			title: 'Attention...!!!',
            			content: 'Your Recaptcha code is not matching.. please try again...!!',
            			btnClass: 'btn-red any-other-class',
            		});
    			 }else if(data.messages == 'Not'){
    			     $.alert({
            			title: 'Attention...!!!',
            			content: 'You are Not a registered user.. please try again...!!',
            			btnClass: 'btn-red any-other-class',
            		});
    			 }
         
                }
               });
              
          
           
    	}   
    
    });
 
        $('#validate_form').parsley();
        
         $('#validate_form').on('submit', function(event){
          event.preventDefault();
				
          if($('#validate_form').parsley().isValid())
          {
           $.ajax({
            url:"<?php echo URL;?>assets/action/userreg.php",
            method:"POST",
            dataType:"json",
			cache:false,
            data:$('#validate_form').serialize(),
            beforeSend:function(){ 
             $('#submit').attr('disabled','disabled');
             $('#submit').text('Wait...');
			 $('#loading_response').addClass('d-block');
			 $('#loading_response').removeClass('d-none');
            },
            success:function(datas)
            {
                 
			 $('#loading_response').addClass('d-none');
			 $('#loading_response').removeClass('d-block');
             
             //$('#test_data').html(datas);
             //$('#validate_form')[0].reset();
             
             $('#validate_form').parsley().reset();
             $('#submit').attr('disabled',false);
             $('#submit').text('Register');
             
             //$('#submit').val('Submit');
             //alert(datas.messages);
                    /*setTimeout(function() {
    					reset_parsley();
    				}, 5000);
                    */
                 //alert(datas.messages);
                 recaptcha_reset2();                    
                    
                 if(datas.messages == 'success'){
                     //alert('ok');
                     $.alert({
            			title: 'Message...!!!',
            			content: 'You are successfully registered now please check your email and whatsapp for login your user profile..!!',
            			btnClass: 'btn-success any-other-class',
            		}); 
    				setTimeout(function() {
    					window.location.replace('<?php echo URL;?>user_profile');
    				}, 1000);
                 }else if(datas.messages == 'emailerror'){
                     //alert('not ok');
                     $.alert({
            			title: 'Attention...!!!',
            			content: 'Your email address is not use at this time.. please use an other email address..!!',
            			btnClass: 'btn-red any-other-class',
            		});
                 }else if(datas.messages == 'recaptcha_error'){
    			     $.alert({
            			title: 'Attention...!!!',
            			content: 'Your Recaptcha code is not matching.. please try again...!!',
            			btnClass: 'btn-red any-other-class',
            		});
    			 }else if(datas.messages == 'allready_registered'){
                     //alert('not ok');
                     $.alert({
            			title: 'Attention...!!!',
            			content: 'You are already registered user..!!',
            			btnClass: 'btn-red any-other-class',
            		});
                 }else if(datas.messages == 'wrong'){
                     //alert('wrong');
                     $.alert({
            			title: 'Attention...!!!',
            			content: 'There are someting wrong..!!',
            			btnClass: 'btn-red any-other-class',
            		});
                 }else{
                     alert('nothing');
                 }
         
            }
           });
          }
         });    
          

  
    $('#user_reset_form').parsley();
    $('#user_reset_form').on('submit', function(event){
        event.preventDefault();
    
        if($('#user_reset_form').parsley().isValid())
    		{
              var actionVal = 'userPasswordReset';
			  //alert();
			  	$.ajax({
					 url:"./assets/action/user_password_reset.php",
					 method:"POST",
					 dataType:"json",
					 data:$('#user_reset_form').serialize(),
					 beforeSend:function(){ 
						$('#loading_response').addClass('d-block');
						$('#loading_response').removeClass('d-none');
					 },
					 success:function(data){
						$('#loading_response').removeClass('d-block');
						$('#loading_response').addClass('d-none');
 
					  //$('#form_type').val(data.form_type);
					  //$('.visitor_reg_btn').text(data.next_btn);
					  
					  $('#user_reset_form').parsley().reset();
					  $('#user_reset_form')[0].reset();
					  recaptcha_reset();
					  
					  //alert(data.message);
					  //visitorBookedForm();
					  //$('#test_data').html(data);

						if(data.message != '' && data.message == 'recaptcha_error'){						
							$.alert({
								title: '<span class="text-danger font-weight-bolt">Warning..!!</span>',
								content: 'Recaptcha does not match.. please try again..!!',
							}); 							
						}else if(data.message != '' && data.message == 'not_user'){
							$.alert({
								title: '<span class="text-danger font-weight-bolt">Warning..!!</span>',
								content: 'You are not registered here.. first you must register here..!!',
							}); 							
						}else if(data.message != '' && data.message == 'success'){
							$.confirm({
								title: '<span class="text-success font-weight-bold">Alert</span>',
								content: 'We have successfully reset your password..Please go to your email and verify your account before access your profile..!!',
								buttons: {
									Yes:{
										text: 'Ok',
										btnClass: 'btn-success btn-sm pt-1 pb-1',
										keys: ['enter', 'shift'],
										action: function(){
											
											//$.redirect("<?php echo URL;?>login/", {action: actionVal}, "POST", "_self");
											
										}
									},
									No:{
										text: 'Cancel',
										btnClass: 'btn-danger btn-sm pt-1 pb-1',
										keys: ['esc'],
										action: function(){
											
										}
									}
								}
							});		
							/*$.alert({
								title: '<span class="text-danger font-weight-bolt">Warning..!!</span>',
								content: 'Your username and pasword not match..!!',
							});*/ 
								
						}else{
							$.alert({
								title: '<span class="text-danger font-weight-bolt">Alert..!!</span>',
								content: 'There have something wrong in this form..!!',
							});
						}
						
					  
					 }
				  })   		    
    		}
    		
    });		
        
        $('#processFormNew').parsley();
/*
        $('#validate_form').parsley();
        
         $('#validate_form').on('submit', function(event){
          event.preventDefault();
          if($('#validate_form').parsley().isValid())
          {
           $.ajax({
            url:"<?php echo URL;?>assets/action/userreg.php",
            method:"POST",
            data:$(this).serialize(),
            beforeSend:function(){
             $('#submit').attr('disabled','disabled');
             $('#submit').val('Submitting...');
            },
            success:function(data)
            {
             $('#validate_form')[0].reset();
             $('#validate_form').parsley().reset();
             $('#submit').attr('disabled',false);
             $('#submit').val('Submit');
             //alert(data);
        		/*$.alert({
        			title: 'Message...!!!',
        			content: ''+data+''',
        			btnClass: 'btn-red any-other-class',
        		});*/         
 /*           }
           });
          }
         });  
*/		 
  
  $('#contactForm').parsley();
        
  $('#contactForm').on('submit', function(event){
//alert('ok 1');
    var form_data = new FormData($('#contact_form')[0]);
	event.preventDefault();
	if($('#contactForm').parsley().isValid())
	{
        $.ajax({
            url:"<?php echo URL;?>assets/action/contact_form_submit.php",
            method:"POST",
            dataType:"json",
            data: $('#contactForm').serialize(),
			//contentType: false,
			//cache: false,
			//processData: false, 
			beforeSend:function(){ 
			   $('#loading_response').addClass('d-block');
			   $('#loading_response').removeClass('d-none');
			},
            success:function(data)
            {
                
                //alert(data.message);
                
			    $('#loading_response').removeClass('d-block');
			    $('#loading_response').addClass('d-none');
			    
			    //$('#testdata').html(data);
			    
		        $('#contactForm').parsley().reset();
		        $('#contactForm')[0].reset();
		        recaptcha_reset();
		        
                if(data.message != '' && data.message == 'success'){
                    $.alert({
                      title: '<span class="text-success font-weight-bolt">Alert..!!</span>',
                      content: 'You have successfully submitted your message..!!!',
                    });
                }else if(data.message != '' && data.message == 'recaptcha_error'){
					$.alert({
						title: '<span class="text-danger font-weight-bolt">Attention..!!</span>',
						content: 'Your Recaptcha code is not matching...Please Try Again..!!',
					});									  
				}else if(data.message != '' && data.message == 'long_response'){
					$.alert({
						title: '<span class="text-danger font-weight-bolt">Attention..!!</span>',
						content: 'You cannot resend the request.....!!',
					});									  
				}else if(data.message != '' && data.message == 'email_error'){
					$.alert({
						title: '<span class="text-danger font-weight-bolt">Attention..!!</span>',
						content: 'There is something wrong with your email address....!!',
					});									  
				}else{
					$.alert({
						title: '<span class="text-danger font-weight-bolt">Attention..!!</span>',
						content: 'There were problems with your email address or your request data. Please try again...!!',
					});							  
				}
                
            }
        }); 
         
	}else{
	    $.alert({
           title: 'Warning!',
           content: 'There have something wrong..!!',
        });
	}
});      
	
	
});
</script>
<script>
/*    grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
        grecaptcha.execute('6LfnhGcaAAAAAIiiohx-Bjx87qf2_WpIRonQXLY4', {action:'validate_captcha'})
                  .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
*/        grecaptcha.ready(function () {
            grecaptcha.execute('6LfnhGcaAAAAAIiiohx-Bjx87qf2_WpIRonQXLY4', { action: 'contact' })
                .then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                console.log(recaptchaResponse)
                recaptchaResponse.value = token;
            });
        });    
</script>
<script>
$(document).ready(function() {
    
    
    //$('.carousel').carousel();

	$('.contactForm').submit(function(){
		var recaptcha = $('#recaptchaResponse').val();
		
		if(recaptcha === ""){
			event.preventDefault();
			alert("Please Check the Home Page Recaptcha...!");
		}
		
	});	
});
</script>
<script>
$(document).ready(function() {

/*	
	$(function() {
		var minPriceInRupees = 0;
		var maxPriceInRupees = 100000;
		var currentMinValue = 0;
		var currentMaxValue = 10000;
		
		$("#min_price").val(currentMinValue);
		$("#max_price").val(currentMaxValue);
		
		$( "#slider-range" ).slider({
			range: true,
			min: minPriceInRupees,
			max: maxPriceInRupees,
			values: [ currentMinValue, currentMaxValue ],
			slide: function( event, ui ) {
				//$( "#min_price" ).val( ui.values[ 0 ] + "" + ui.values[ 1 ] );
				currentMinValue = ui.values[ 0 ];
				currentMaxValue = ui.values[ 1 ];
			},
			stop: function( event, ui ) {
				currentMinValue = parseInt(ui.values[ 0 ]);
				currentMaxValue = parseInt(ui.values[ 1 ]);
				$("#min_price").val(currentMinValue);
				$("#max_price").val(currentMaxValue);
				//filter_data();
				//alert('currentMinValue and currentMaxValue updated !!!');
				//alert('currentMinValue = '+currentMinValue+' currentMaxValue = '+currentMaxValue);
			}
			
		});
		filter_data();
		//$("#min_price").val( $("#slider-range").slider( "values", 0 ) +"" + $("#slider-range").slider( "values", 1 ) );
	});	
	
	*/

	
});   
 </script>    
 <script>
$(document).ready(function() {	
/*    $('#email').parsley();
    
        window.ParsleyValidator.addValidator('checkemail', {
          validateString: function(value)
          {
            return $.ajax({
              url:'<?php //echo URL;?>/assets/action/checkemail.php',
              method:"POST",
              data:{email:value},
              dataType:"json",
              success:function(data)
              {
                  //alert();
                return true;
              }
            });
          }
        }); */    
   /* $('#emailAddress').parsley();
    
        window.ParsleyValidator.addValidator('checkemail', {
          validateString: function(value)
          {
            return $.ajax({
              url:'<?php echo URL;?>/assets/action/checkemail.php',
              method:"POST",
              data:{email:value},
              dataType:"json",
              success:function(data)
              {
                  //alert();
                return true;
              }
            });
          }
        });   
    
 
	
	 */
});	 
initbackTop2();
function initbackTop2() {
	var jQuerybackToTop = jQuery(".side-opener");
	jQuery(window).on('scroll', function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuerybackToTop.addClass('active');
		} else {
			jQuerybackToTop.removeClass('active');
		}
	});
	jQuerybackToTop.on('click', function(e) {
		jQuery("html, body").animate({scrollTop: 0}, 500);
	});
}
</script>
<script>
$(document).ready(function(){
  ordercompleted();      
      //alert($('#pageName').val());
  function ordercompleted(){ 
    if($('#pageName').val() == 'ordercomplete' && $('#paymentmessage').val() == 'completed'){
        //setTimeout(function() {
            
        /*var paymentmessage = $('#paymentmessage').val();
        if(paymentmessage = 'notcompleted'){
            
        }*/
        //}, 3000);
       // window.location.href = "<?php //echo URL;?>invoice/";
    }
    //window.open("<?php //echo URL;?>invoice/", "_blank");
    
  } 
/*  $("#search_data").keyup(function(){
  
    $('#search_data').autocomplete({
      source: "<?php //echo URL;?>/assets/action/fetch_search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#search_data').val(ui.item.value);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };  
  
  });
*/

  });
</script>
  <script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".mainImages"), {
		max: 25,
		speed: 400,
		transition:true,
		perspective:1000,
		scale:1,
		gyroscope: true,
		easing:"cubic-bezier(.03,.98,.52,.99)"
	});
	
</script>
	
<script>
const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

const d = new Date();
if((monthNames[d.getMonth()]) == 'January' || (monthNames[d.getMonth()]) == 'December'){
	snowStorm.snowColor = '#fff';
	snowStorm.flakesMaxActive = 150;
	snowStorm.useTwinkleEffect = true;
}else{
	snowStorm.freeze()
}

	
</script>
<script type="text/javascript">

    $('.container').imagesLoaded( function() {
		$("#exzoom").exzoom({
			autoPlay: false,
		});
		$("#exzoom").removeClass('hidden')
	});
	$(".jconfirm-box-container").removeClass('hidden');
	

</script>
<script>

</script>

<script>

$('.fancybox').fancybox();

$('.proDisCity').change(function(){
    //alert('OK');
         if($(this).val() != '')
         {
           
          var action = $(this).attr("id");
          var query = $(this).val();
          var result = '';
          var disId = $('#district').val();
          //alert(disId);
          //$('#city').val('').trigger('change');
          if(action == "province")
          {
         //$('#city').val('').trigger('change');
         $('#city').html('<option value="">Select Town</option>');
         result = 'district';
          }
          else
          {	   
         result = 'city';
          }
          $.ajax({
         url:"<?php echo URL;?>/assets/action/fetch_prov_district_city.php",
         method:"POST",
         data:{action:action, query:query,type:'withChange',disId:disId,disName:'',hiddentown:''},
         success:function(data){
          $('#'+result).html(data);
          //alert(data);
          //$('.testText').html(data);
         }
          })
         }
 });



function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

</script>
<script>

		
$(document).ready(function(){
filter_data();
//categories_data();
load_cart_data();
cart_details();
whish_list_details();

/*	setInterval(function(){
		load_cart_data();
	}, 5000);
*/	
var brands = '';

//name name2 address province district zipcode email mobile otheraddress addressnew
$(document).on('click','.checkoutbtn',function(){
    var action = 'checkout_user_details';
    var name = $('#name').val();
    var name2 = $('#name2').val();
    var address = $('#address').val();
    var province = $('#province').val();
    var district = $('#district').val();
    var zipcode = $('#zipcode').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    var otheraddress = $('#otheraddress').val();
    var addressnew = $('#addressnew').val();
    var shipCharge = $('.shipCharge').val(); 
    $.ajax({
		 url:"<?php echo URL;?>/assets/action/user_data.php",
		 method:"POST",
		 data:{action:action,name:name,name2:name2,address:address,province:province,district:district,zipcode:zipcode,email:email,mobile:mobile,otheraddress:otheraddress,addressnew:addressnew,shipCharge:shipCharge},
		 beforeSend:function(){
			//$('#loading_response').html('<img src="<?php echo URL;?>assets/images/loading_process.gif" width="100%" style="position: absolute;z-index:1000;text-align: center;width: 100%;"/>'); 
			$('#loading_response').removeClass('d-none');
			$('#loading_response').addClass('d-block');
			
		 },
		 success:function(data){
			 //$('form').trigger('reset');
			 $('#loading_response').fadeIn();
			 setTimeout(function(){
				$('#loading_response').fadeOut('slow')
				$('#loading_response').addClass('d-none');
				$('#loading_response').removeClass('d-block');								 
			 },5000);
			 //alert(data);
		  //$('#'+result).html(data);
		  }
	   })   
    
});

	$('.showBtn').click(function(){
		var showBtn = $('#showBtn').val();
		if(showBtn == '1'){
			$('.showInput').attr('type', 'text');
			$('#showBtn').val('2');
			$('#showIcon').addClass('fa-eye');
			$('#showIcon').removeClass('fa-eye-slash');
		}else{
			$('.showInput').attr('type', 'password');
			$('#showBtn').val('1');
			$('#showIcon').addClass('fa-eye-slash');
			$('#showIcon').removeClass('fa-eye');
		}
	});
 /*   
	$('#loginsubmit').on('click', function(){
          
           $.ajax({
            url:"<?php echo URL;?>assets/action/userlogin.php",
            method:"POST",
            data:$('#login_form').serialize(),
            beforeSend:function(){ 
             $('#loginsubmit').attr('disabled','disabled');
             $('#loginsubmit').text('Loging...');
			 $('#loading_response').addClass('d-block');
			 $('#loading_response').removeClass('d-none');
            },
            success:function(data)
            {
             $('#login_form')[0].reset();
             $('#loginsubmit').attr('disabled',false);
             $('#loginsubmit').text('Submit');
			 $('#loading_response').removeClass('d-block');
			 $('#loading_response').addClass('d-none');			 
             //alert(data);
				//window.location.replace('<?php echo URL;?>my_account');
             //$('.testcode').text(data);
             //window.location.href = "'"+actualUrl+"'";
              //window.location.replace(actualUrl);
	//		  window.location.replace('<?php echo URL;?>my_account');
              /*if(data != '' && data == 'Reg'){
					/*$.alert({
						title: 'Message...!!!',
						content: 'This User is registered....!!',
						btnClass: 'btn-red any-other-class',
					});*/				  
              /*    window.location.replace('<?php echo URL;?>my_account');
              }else{
                  window.location.replace('<?php echo URL;?>');
              }*/
              
        		/*$.alert({
        			title: 'Message...!!!',
        			content: ''+data+''',
        			btnClass: 'btn-red any-other-class',
        		});*/         
 /*           }
           });
          
       });

 */     
         

	$(document).on('click','.checkout-btn',function(){
		var gotocheckout = $('#gotocheckout').val();
		if(gotocheckout != '' && gotocheckout == 'gotocheckout'){
			window.location.href = "<?php echo URL;?>checkout";
		}else{
			$.alert({
				title: 'Warning...!!!',
				content: 'before go to checkout, you must add products into cart...!!',
			});
			//alert('before go to checkout, you must add products into cart...!!');
			window.location.href = "<?php echo URL;?>products";
		}
	});
	//onlinePayment 
	
	$('.cashOnDelivery').click(function(){
		$('#processFormNew').addClass('cashDeli');
		$('#processFormNew').removeClass('onlinePay');
		
		$('.checkoutbtn2').removeClass('d-none');
		$('.checkoutbtn2').addClass('d-block');
		$('.checkoutbtn3').addClass('d-none');
		$('.checkoutbtn3').removeClass('d-block');
		
	});	
	
	$('.onlinePayment').on('click',function(){
		$('#processFormNew').removeClass('cashDeli');
		$('#processFormNew').addClass('onlinePay');
		
		$('.checkoutbtn2').addClass('d-none');
		$('.checkoutbtn2').removeClass('d-block');
		$('.checkoutbtn3').removeClass('d-none');
		$('.checkoutbtn3').addClass('d-block');
	});	
	$(document).on('click','.checkoutbtn2',function(){
		var gotoprocess = $('#gotoprocess').val();
		if(gotoprocess != '' && gotoprocess == 'gotoprocess'){
			var name = $('#name').val();
			var mobile = $('#mobile').val();
			var address = $('#address').val();
			var province = $('#province').val();
			var district = $('#district').val();
			var email = $('#email').val();
			var zipcode = $('#zipcode').val();
			var otheraddress = $('#otheraddress').val();
			var addressnew = $('#addressnew').val();
			var otheraddresschecked = 'checked';
			
			if(name == '' || mobile == '' || address == '' || province == '' || district == '' || email == '' || zipcode == ''){
				//alert('All fields are required....!!');
				$.alert({
					title: 'Warning...!!!',
					content: 'All fields are required....!!',
					btnClass: 'btn-red any-other-class',
				});				
				//window.location.href = "<?php echo URL;?>checkout";
				//alert($('.cashDeli').serialize());
			}else{
					if($('#otheraddress').prop("checked") == true && addressnew != ''){
						//alert('ok 3');
					   $.ajax({
						 url:"<?php echo URL;?>/assets/action/process_order.php",
						 method:"POST",
						// data:$('#processForm').serialize()+"&otheraddress="+otheraddresschecked,
						 //data:$('.cashDeli').serialize() + "&name="+name+"&name2="+name2+"&address="+address+"&province="+province+"&district="+district+"&zipcode="+zipcode+"&email="+email+"&mobile="+mobile+"&otheraddress="+otheraddress+"&addressnew="+addressnew+"",
						 data:$('.cashDeli').serialize(),
						 beforeSend:function(){
							//$('#loading_response').html('<img src="<?php //echo URL;?>assets/images/loading_process.gif" width="100%" style="position: absolute;z-index:1000;text-align: center;width: 100%;"/>'); 
							$('#loading_response').removeClass('d-none');
							$('#loading_response').addClass('d-block');
							
						 },
						 success:function(data){
							 $('form').trigger('reset');
							 $('#loading_response').fadeIn().html(data);
							 setTimeout(function(){
								$('#loading_response').fadeOut('slow')
								$('#loading_response').addClass('d-none');
								$('#loading_response').removeClass('d-block');								 
							 },5000);
						  //$('#'+result).html(data);
						  }
					   })				
									
				
				//alert(otheraddress);
				//alert('ok 1');
				}else if($('#otheraddress').prop("checked") == true && addressnew == ''){
					$.alert({
						title: 'Warning...!!!',
						content: 'If you checked Ship to a different address box, Then you must fill other address field...!!',
					});					
					//alert('If you checked Ship to a different address box, Then you must fill other address field...!!');
				}else if($('#otheraddress').prop("checked") == false && addressnew == ''){
					//alert('ok 2');
				   $.ajax({
					 url:"<?php echo URL;?>/assets/action/process_order.php",
					 method:"POST",
					 data: $('.cashDeli').serialize(),
					 beforeSend:function(){
							$('#loading_response').removeClass('d-none');
							$('#loading_response').addClass('d-block'); 
					 },
						 success:function(data){
							 $('form').trigger('reset');
							 $('#loading_response').fadeIn().html(data);
							 setTimeout(function(){
								$('#loading_response').fadeOut('slow')
								$('#loading_response').addClass('d-none');
								$('#loading_response').removeClass('d-block');								 
							 },5000);
						  //$('#'+result).html(data);
						  $('#testing').html(data);
						  //alert(data);
						  }
				   })
				}
			}
		}else{
			$.alert({
				title: 'Warning...!!!',
				content: 'before go to checkout, you must add products into cart...!!',
			});				
			//alert('before go to checkout, you must add products into cart...!!');
			window.location.href = "<?php echo URL;?>products";
		}
	});
/*
 $('.short').on("click", "li", function(){
	var shorting = $(this).attr('id');
	filter_data();
	//alert(shorting);
 });
 */
 //$(document).on('click','.brands',function(){
/* $('.brands').click(function(){
	var brands = [];
	$('.brands:checked').each(function(){
		brands.push($(this).val());
	});
	brands = brands.toString();
	filter_data(brands);
 });
*/

  // it is checked
	  $( function() {
		var valueSlider;
		var minPriceInRupees = 0;
		var maxPriceInRupees = 100000;
		var currentMinValue = 0;
		var currentMaxValue = 10000;
		
		$( "#slider-range" ).slider({
		  range: true,
		  min: minPriceInRupees,
		  max: maxPriceInRupees,
		  values: [ currentMinValue, currentMaxValue ],
		  slide: function( event, ui ) {
				//$( "#min_price" ).val( ui.values[ 0 ] + "" + ui.values[ 1 ] );
				currentMinValue = ui.values[ 0 ];
				currentMaxValue = ui.values[ 1 ];
			},
		  stop: function( event, ui ) {
			$( "#min_price" ).val( ui.values[ 0 ] );
			$( "#max_price" ).val( ui.values[ 1 ] );
			$( "#hidden_minimun_price" ).val(ui.values[ 0 ]);
			$( "#hidden_maximum_price" ).val(ui.values[ 1 ]);

			//alert(minYear);
			//alert(ui.values[ 1 ]);
			//$('#currentAge').html('Sort by Age:- ' + calAge + '');
			
			filter_data();
		  }		  
		  
		});

			$( "#hidden_minimun_price" ).val( $( "#slider-range" ).slider( "values" ,0) );
			$( "#hidden_maximum_price" ).val( $( "#slider-range" ).slider( "values" ,1) );
		//$( "#hidden_minimun_age" ).val( $( "#age_range" ).slider( "value" ) );
		//valueSlider = $( "#hidden_minimun_age" ).val();hidden_minimun_price hidden_maximum_price
	
		  
				
		});	
		
  $('.short').on("change", function(){
	var shorting = $(this).val();
	filter_data();
	//alert(shorting);
 });
  $('.brands').on("change", function(){
	var brands = $(this).val();
	filter_data();
	//alert(brands);
 });
  $('.inches').on("change", function(){
	var inches = $(this).val();
	filter_data();
	//alert(brands);
 });
  $('.category').on("change", function(){
	var category = $(this).val();
	filter_data();
	//alert(brands);
 });
  $('.types').on("change", function(){
	var types = $(this).val();
	filter_data();
	//alert(brands);
 });
  $('.price').on("change", function(){
	var price = $(this).val();
	$('.priceval').val(price);
	filter_data();
	//alert(price);
 });
  $('#shorting').on("change", function(){
	var shorting = $(this).val();
	filter_data();
	//alert(price);
 });
 
 		var province = $('#province').val();
		var district = $('#district').val();
		
		$(document).on('change','#province',function(){
			var province = $(this).val();
			load_cart_data();
		});	
		$(document).on('change','#district',function(){
			var district = $(this).val();
			load_cart_data();
		});
		
		$(document).on('change keyup','#max_price',function(){
			var max_price = $(this).val();
			filter_data();
		});
		$(document).on('change keyup','#min_price',function(){
			var min_price = $(this).val();
			filter_data();
		});
		$(document).on('click','.product-categories li button',function(){
			var category = ($(this).val());
			$('#cat_val').val(category);
			filter_data();
		});
		$(document).on('click','.pro_tags',function(){
			var pro_tags = ($(this).attr('id'));
			$('#pro_tags').val(pro_tags);
			filter_data();
		});
/*	function categories_data(){
			//var category = category;
			//alert(category)	
			//return category;
			
	}
*/	
function filter_data(){ 
	$('.filter_data').html(make_skeleton());
	$('.filter_data2').html(make_skeleton());

		//alert(data);
		
		function make_skeleton()
			{
			var output = '';
			
				output += '<div class="col-md-12">';
			for(var count = 0; count < 5; count++)
			{	
				output += '<div class="row">';
				output += '<div class="col-md-4">';
				
				output += '<div class="ph-item">';
				output += '<div class="ph-col-12">';
				output += '<div class="ph-picture"></div>';
				output += '</div>';
				output += '<div>';
				
				output += '<div class="ph-row">';
				
				output += '<div class="ph-col-12 big"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '</div>';
				
				output += '</div>';
				output += '</div>';
                output += '</div>';
                
				output += '<div class="col-md-4">';
				
				output += '<div class="ph-item">';
				output += '<div class="ph-col-12">';
				output += '<div class="ph-picture"></div>';
				output += '</div>';
				output += '<div>';
				
				output += '<div class="ph-row">';
				
				output += '<div class="ph-col-12 big"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '</div>';
				
				output += '</div>';
				output += '</div>';
                output += '</div>';
                
				output += '<div class="col-md-4">';
				
				output += '<div class="ph-item">';
				output += '<div class="ph-col-12">';
				output += '<div class="ph-picture"></div>';
				output += '</div>';
				output += '<div>';
				
				output += '<div class="ph-row">';
				
				output += '<div class="ph-col-12 big"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '<div class="ph-col-12"></div>';
				output += '</div>';
				
				output += '</div>';
				output += '</div>';
                output += '</div>';               
							
				output += '</div>';
			}
			output += '</div>';
			return output;
		}
//district
	
		
			var category = '';
			var action = 'fetch_data';
			var inchName = $('#inchName').val();
			var catName = $('#catName').val();
			var shorting2 = $('.short').val();
			var brands = $('.brands').val(); 
			var max_price = $('#hidden_maximum_price').val();
			var min_price = $('#hidden_minimun_price').val();
			var inches = $('.inches').val();
			//var category = get_filter('main_category');
			//var category = $('.product-categories li button').val();
			var category = $('#cat_val').val()
			var pageName = $('#pageName').val();
			var protype = $('#protype').val();
			var types = $('.types').val();
			var pro_tags = $('#pro_tags').val();
			var shorting = $('#shorting').val();
			//alert(category);
			/*$(document).on('click','.product-categories li button',function(){
				var cat = $(this).val();
				//e.preventDefault();
				alert(cat);
			});*/
			
			//var str_data = data;
			//var results_data =  data.split("/");
			
			/*if(results_data[0] == 'CAT'){
				category = results_data[1];
			}
			
			
			alert(category);
			*/
			if(catName != '' && category == ''){
				category = catName;
			}else{
				category = category;
			}
			/*if(category != 'undefined'){
				//alert(category);
				category = category;
			}else{
				category = '';
			}
			*/
			//category = '';
			
			if(inchName != '' && inches == ''){
				inches = inchName;
			}else{
				inches = inches;
			}
			
			if(protype != '' && types == ''){
				types = protype;
			}else{
				types = types;
			}
		
		//alert(category);
			$.ajax({
				url:"<?php echo URL;?>/assets/action/fetch_data.php",
				method:"POST",
				//dataType:"json",
				data:{action:action,shorting:shorting,brands:brands,max_price:max_price,min_price:min_price,inches:inches,category:category,protype:types,pro_tags:pro_tags},
				beforeSend:function(){
					/*if((brands != '' || price != '' || shorting != '' || inches != '' || category != '' || types != '') && pageName == 'products'){
						$('#loading_response').removeClass('d-none');
					}
					*/
				}, 				
				success:function(data){
					setTimeout(function(){
					$('#loading_response').addClass('d-none');	
					/*$('.filter_data').html(data.grid);
					$('.filter_data2').html(data.list);*/
						//alert(data.grid);
					//alert(data);	
						$('.filter_data').html(data);	
						
					 },1000);
				}
			});	
			/*
			$.ajax({
				url:"<?php echo URL;?>/assets/action/fetch_data2.php",
				method:"POST",
				//dataType:"json",
				data:{action:action,shorting:shorting,brands:brands,max_price:max_price,min_price:min_price,inches:inches,category:category,protype:types,pro_tags:pro_tags},
				beforeSend:function(){
					if((brands != '' || price != '' || shorting != '' || inches != '' || category != '' || types != '') && pageName == 'products'){
						$('#loading_response').removeClass('d-none');
					}
					
				}, 				
				success:function(data){
					setTimeout(function(){
					$('#loading_response').addClass('d-none');	
					*/
					/*$('.filter_data').html(data.grid);
					$('.filter_data2').html(data.list);*/
						//alert(data.grid);
						//$('.filter_data2').html(data);	
				/*		
					 },1000);
				}
			});	
			*/
			//e.preventdefault();
		 }
/*	function get_filter(class_name){
		var filter = [];
		$('.'+class_name+'').on('click',function(){
			//filter = ($(this).val());
			filter.push($(this).val());
		});	
		alert(filter);	
		return filter;
	};
*/
		function load_cart_data()
		{
			var province = $('#province').val();
			var district = $('#district').val();
			
			if(province != ''){
				province = province;
			}else{
				province = '';
			}
			if(district != ''){
				district = district;
			}else{
				district = '';
			}
			//alert(district);
			//alert(province);
			//data:{province:province,district:district},
			$.ajax({
			url:"assets/action/fetch_cart.php",
			method:"POST",
			dataType:"json",
			data:{province:province,district:district},
			success:function(data)
			{
				//alert(data);
				//$('#text_datas').html(data.cart_details);
				$('.total_items').html(data.total_item);
				$('.header__cart__price').html(data.total_price);
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);				
				//alert(data.cart_details);	
				$('#totalAmount').val((data.totalAmount) + (data.totalShipCharge));
				$('#plaintext').val(''+(data.plaintext)+'|'+((data.totalAmount) + (data.totalShipCharge))+'');
				$('#payment').val(data.payment);
				$('#url').val(data.url);
				$('#custom_fields').val(data.custom_fields);
				$('#shipCharge').html(data.totalShipCharge);
				$('#fetch_check_cart').html(data.cart_checkout_details);
				$('.shipCharge').html(data.totalShipCharge);
				$('.shipCharge').val(data.totalShipCharge);
				$('#checkoutsubtotal').html(data.totalAmount);
				$('#checkouttotal').html((data.totalAmount) + (data.totalShipCharge));
			}
			});
		}


		function whish_list_details()
		{
			var action = 'action';	
			$.ajax({
			url:"<?php echo URL;?>assets/action/whish_list_details.php",
			method:"POST",
			data:{action:action},
			//dataType:"json",
			success:function(data)
				{
					//alert(data);				
										
					if(data != 'not'){
						$('.menu-icons.icofont-ui-love').addClass('text-danger');
						$('#whish_list_page').html(data);
					}else{
						$('.menu-icons.icofont-ui-love').removeClass('text-danger');
						$('#whish_list_page').html("<div class='cart-btn-row text-center'><a href='<?php echo URL;?>shop' class='btn-type2 mt-4'>Go to Shop Page</a></div>");
						/*$('#whish_list_page').html("<div class="cart-btn-row text-center"><a href="shop" class="btn-type2 mt-4
						">Go to Shop Page</a></div>");*/
					}
				}
			});
		}


		function cart_details()
		{
			var action = 'action';	
			$.ajax({
			url:"<?php echo URL;?>assets/action/cart_details.php",
			method:"POST",
			data:{action:action},
			dataType:"json",
			success:function(data)
				{
					$('#cart_page_details').html(data.cart_details);					
				}
			});
		}


		$('#cart-popover').popover({
			html : true,
			container: 'body',
			content:function(){
				return $('#popover_content_wrapper').html();
			}
		});
		

		$(document).on('click', '.add_to_cart_home', function(){
			//var product_id = $(this).attr("id");
			//var product_name = $('#name').val();
			//var product_price = $('#price').val(); 8710
			var product_id = $(this).attr('data-product_id');
			var product_price = $(this).attr('data-product-price');
			var product_name = $(this).attr('data-product-name');
			var product_stock = $(this).attr('data-product-stock');
			var product_stock_quantity = $(this).attr('data-stock-qty');
			var product_quantity = $(this).attr('data-product-qty');
			var action = "add";
			//alert(product_id);
			if(product_stock_quantity > 0 && product_stock == 'stock_available')
			{

					$.ajax({
						url:"<?php echo URL;?>assets/action/action.php",
						method:"POST",
						data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
						success:function(data)
						{
						cart_details();
						load_cart_data();
						//alert(data);
						//$('#cart-popover').popover('show');
						$.alert({
							title: 'Alert',
							content: 'Item has been Added into Cart...!!',
						});						

						}
					});
		
			}
			else
			{
				$.alert({
					title: 'Warning...!!!',
					content: 'Please Enter Number of Quantity...!!',
				});				
			}
		});
		

		$(document).on('click', '.add_to_cart', function(){
			var product_id = $(this).attr("id");
			var product_name = $('#name'+product_id+'').val();
			var product_price = $('#price'+product_id+'').val();
			var product_quantity = $('#quantity'+product_id).val();
			var action = "add";
			//alert(product_quantity);
			if(product_quantity > 0)
			{

					$.ajax({
						url:"<?php echo URL;?>assets/action/action.php",
						method:"POST",
						data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
						success:function(data)
						{
						cart_details();
						load_cart_data();
						//alert(data);
						//$('#cart-popover').popover('show');
						$.alert({
							title: 'Alert',
							content: 'Item has been Added into Cart...!!',
						});						

						}
					});
		
			}
			else
			{
				$.alert({
					title: 'Warning...!!!',
					content: 'Please Enter Number of Quantity...!!',
				});				
			}
		});
		

		$(document).on('click', '.add_to_wish_list_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var action = "add";
		//alert(product_quantity);
		if(product_quantity > 0)
		{

				$.ajax({
					url:"<?php echo URL;?>assets/action/action_from_wishlist.php",
					method:"POST",
					data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
					success:function(data)
					{
						//alert(data);
					cart_details();
					load_cart_data();
					whish_list_details();
					//alert(data);
					//$('#cart-popover').popover('show');
					$.alert({
						title: 'Alert',
						content: 'Item has been Added into Shoping Cart...!!',
					});						
					//alert("Item has been Added into Cart");
					}
				});
	
		}
		else
		{
			$.alert({
				title: 'Warning...!!!',
				content: 'Please Enter Number of Quantity...!!',
			});				
			//alert("Please Enter Number of Quantity");
		}
		});
		

		$(document).on('click', '.add_whish_list', function(){
		var product_id = $(this).attr("id");
		$('#'+product_id+' i').addClass('text-danger');
		$('#'+product_id+' i').removeClass('fa-heart-o');
		$('#'+product_id+' i').addClass('fa-heart');
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = 1;
		var action = "add";
		//alert(product_quantity);
		if(product_quantity > 0)
		{

				$.ajax({
					url:"<?php echo URL;?>assets/action/action_whish_list.php",
					method:"POST",
					data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
					success:function(data)
					{
					whish_list_details();
					//load_cart_data();
					$.alert({
						title: 'Alert',
						content: 'Item has been Added into Wish List...!!',
					});						
					//alert("Item has been Added into Cart");
					}
				});
	
		}
		else
		{
			/*$.alert({
				title: 'Warning...!!!',
				content: 'Please Enter Number of Quantity...!!',
			});*/				
			//alert("Please Enter Number of Quantity");
		}
		});	
		
	
		$(document).on('keyup change', '.cartQty', function(){
			//clearTimeout(timer);
			
		//var timer = null;	
		//$('.cartQty').keydown(function(){
			//var product_id = $(this).attr("id").toString();			
		   //clearTimeout(timer); 
		   //timer = setTimeout(updateCart, 2000)			
		//});
		
		//function updateCart(product_id) {
		var product_id = $(this).attr("id").toString();	
 		//alert(product_id);
		var cartQty = $(this).val();	
		//alert(cartQty);
		var value = '';
		var product_name = $('#cartName'+product_id+'').val();
		var product_price = $('#cartPrice'+product_id+'').val();
		var product_quantity = $('.cartQty'+product_id).val();
		var action = "add";
		var actionnew = "update";
		//alert(product_id);
		//alert(product_quantity);
		//alert(product_quantity);
			if(cartQty > 0)
			{
				
				$.ajax({
					url:"<?php echo URL;?>assets/action/action.php",
					method:"POST",
					data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:cartQty, action:action,actionnew:actionnew},
					success:function(data)
					{
						setTimeout(function(){
							//alert("Item has been Updated into Cart");
							load_cart_data();
							cart_details();							
						},1000);
						
								
					}
				});

					
				
			}
			else
			{
				$.alert({
					title: 'Warning...!!!',
					content: 'Please Enter Number of Quantity...!!',
				});					
				//alert("Please Enter Number of Quantity");
			}
			
			
		});		
 
		$(document).on('click', '#cart-popover', function(){
			load_cart_data();
			cart_details();			
		});
/*
var isVisible = false;
var clickedAway = false;
$(document).click(function (e) {
    if (isVisible & clickedAway) {
        $('.popoverThis').popover('hide')
        isVisible = clickedAway = false
    } else {
        clickedAway = true
    }
});
*/		
		$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
			$.confirm({
				title: 'Confirm!',
				content: 'Are you sure you want to remove this product..?',
				buttons: {
					confirm: {
						closeIcon: true,
						closeIconClass: 'fa fa-close',
						action: function(){
							$.ajax({
								url:"<?php echo URL;?>assets/action/action.php",
								method:"POST",
								data:{product_id:product_id, action:action},
								success:function()
								{
									$('#cart-popover').popover('hide');
									load_cart_data();
									cart_details();
	
									//$('#cart-popover').popover('hide');
									//$('.popover').css('display', 'none');
									$.alert({
										title: 'Alert',
										content: 'Item has been removed from Cart...!!',
									});							
									//alert("Item has been removed from Cart");
								}
							})

						}
					},
					cancel: function () {
						return false;							
						$.alert({
							title: 'Alert',
							content: 'Form is Closed Now...!!',
						});
					}
				}
			});
		/*	if(confirm("Are you sure you want to remove this product?"))
			{
				$.ajax({
					url:"<?php echo URL;?>assets/action/action.php",
					method:"POST",
					data:{product_id:product_id, action:action},
					success:function()
					{
						load_cart_data();
						cart_details();
						//$('#cart-popover').popover('hide');
						//$('.popover').css('display', 'none');
						$.alert({
							title: 'Alert',
							content: 'Item has been removed from Cart...!!',
						});							
						//alert("Item has been removed from Cart");
					}
				})
			}
			else
			{
			return false;
			}
			*/
			//load_cart_data();
		});
/*
		$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
		$.ajax({
			url:"<?php echo URL;?>assets/action/action.php",
			method:"POST",
			data:{product_id:product_id, action:action},
			success:function()
			{
				load_cart_data();
				cart_details();
				//$('#cart-popover').popover('hide');
				//$('.popover').css('display', 'none');
				alert("Item has been removed from Cart");
			}
		})
		}
		else
		{
		return false;
		}
		});
	*/	
		$(document).on('click', '.deleteCartItem', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
/*			if(confirm("Are you sure you want to remove this product?"))
			{
			$.ajax({
				url:"<?php echo URL;?>assets/action/action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					cart_details();
					//$('#cart-popover').popover('hide');
					//$('.popover').css('display', 'none');
					$.alert({
						title: 'Alert',
						content: 'Item has been removed from Cart 22...!!',
					});						
					//alert("Item has been removed from Cart");
					//window.location.href = "<?php echo URL;?>cart";
				}
			})
			}
			else
			{
			return false;
			}
*/
			$.confirm({
				title: 'Confirm!',
				content: 'Are you sure you want to remove this product..?',
				buttons: {
					confirm: {
						closeIcon: true,
						closeIconClass: 'fa fa-close',
						action: function(){
							$.ajax({
								url:"<?php echo URL;?>assets/action/action.php",
								method:"POST",
								data:{product_id:product_id, action:action},
								success:function()
								{
									load_cart_data();
									cart_details();
									//$('#cart-popover').popover('hide');
									//$('.popover').css('display', 'none');
									$.alert({
										title: 'Alert',
										content: 'Item has been removed from Cart 22...!!',
									});						
									//alert("Item has been removed from Cart");
									//window.location.href = "<?php echo URL;?>cart";
								}
							})

						}
					},
					cancel: function () {
						//return false;							
						$.alert({
							title: 'Alert',
							content: 'Form is Closed Now...!!',
						});
					}
				}
			});
		});
		
		$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
			$.ajax({
			url:"<?php echo URL;?>assets/action/action.php",
			method:"POST",
			data:{action:action},
				success:function()
				{
					cart_details();
					load_cart_data();
					$('#cart-popover').popover('hide');
					//$('.popover').css('display', 'none');
					$.alert({
						title: 'Alert',
						content: 'Your Cart has been clear...!!',
					});						
					//alert("Your Cart has been clear");
				}
			});
		});
		
		$('section').on('click', function (e){ 
			$('#cart-popover').popover('hide');
			$('.popover').css('display', 'none');
		});
		
		$('#cart-popover').on('click', function(){
			$('.navbar-collapse').collapse('hide');
		});

	
});	
	
$(document).on('input', '.price', function() {
    $('#slider_value').html('Rs '+$(this).val());
}); 

/*if($(window).width() <= 540){
	$('nav').addClass('d-none');
	$('.mobile-toggle').removeClass('d-none');
}else{
	$('nav').removeClass('d-none');
	$('.mobile-toggle').addClass('d-none');
}
*/
$('.mobile-toggle').click(function(){
	if($("nav").hasClass("d-none")){
		$('nav').addClass('d-block mobileversion').fadeIn();
		$('nav').removeClass('d-none').fadeIn();		
	}else{
		$('nav').removeClass('d-block mobileversion').fadeIn();
		$('nav').addClass('d-none').fadeIn();		
	}

}); 
</script>



<script>
if($('#page_type').val() == 'contact' || $('#page_type').val() == 'hotels' || $('#page_type').val() == 'restaurants' && $('#page').val() == '' || $('#page').val() != 'single'){
	//alert();
var latitudeForm = $('#latitude').val();
var longatudeForm = $('#longatude').val();
//alert(longatudeForm);
const mymap =  L.map('map').setView([latitudeForm,longatudeForm],12);

const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreet Map</a>';

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tiles = L.tileLayer(tileUrl,{attribution,id: 'mapbox.streets',maxZoom: 18});
tiles.addTo(mymap);

const issIcon = L.icon({
	
	iconUrl: '<?php echo URL; ?>assets/images/map_marker.png',
	iconSize:[50.32],
	iconAnchor:[25,16]

});


const marker = L.marker([6.9271,79.8612],{icon: issIcon,draggable:false}).addTo(mymap);
const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';


async function getISS(){
	const response = await fetch(api_url);
	const data = await response.json();
	const {latitude,longitude} = data;
	
  marker.setLatLng([latitudeForm,longatudeForm]);

      $('#long').val(latitudeForm);
      $('#lati').val(longatudeForm);
}


mymap.addLayer(marker);


getISS();

}

if($('#page_type').val() == 'routemaps' && $('#page').val() == 'single'){
window.lrmConfig = {
//    serviceUrl: 'https://api.mapbox.com/directions/v5',
//    profile: 'mapbox/driving',
};	

var singlelati = $('#singlelati').val();
var singlelong = $('#singlelong').val();

var singlelati2 = $('#singlelati2').val();
var singlelong2 = $('#singlelong2').val();

var map = L.map('map');


//alert(''+singlelati+'/'+singlelong+'');

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var control = L.Routing.control(L.extend(window.lrmConfig, {
	waypoints: [
		L.latLng(singlelati,singlelong),
		L.latLng(singlelati2,singlelong2)
	],
	geocoder: L.Control.Geocoder.nominatim(),
	routeWhileDragging: true,
	reverseWaypoints: true,
	showAlternatives: true,
	altLineOptions: {
		styles: [
			{color: 'black', opacity: 0.15, weight: 9},
			{color: 'white', opacity: 0.8, weight: 6},
			{color: 'blue', opacity: 0.5, weight: 2}
		]
	}
})).addTo(map);

L.Routing.errorControl(control).addTo(map);
	

	
}	
//https://api.whatsapp.com/send?phone=https://api.whatsapp.com/send?phone=9710529210050&text=%20Welcome%20to%20Western%20Valuers%20
</script>

</body>
</html>
