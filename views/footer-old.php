<?php

	$company_phone11 = strtolower($company_phone1);   
	$company_phone11 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $company_phone11);
	$company_phone11 = str_replace(' ','',$company_phone11);	
	
	$company_phone22 = strtolower($company_phone2);   
	$company_phone22 = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $company_phone22);
	$company_phone22 = str_replace(' ','',$company_phone22);

?>
			<!-- footer of the Page -->

    <div class="col-sm-12 col-md-12 mb-5">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
				<div class="row justify-content-center newsletter">
					<div class="col-12 col-sm-4 col-md-4">
					  <p class="newsletter-content1">
						<span class="txt1"><strong>Newsletter</strong> Sign Up</span>
						<br>
						<span class="txt2">(Get <strong>30% off</strong> coupon today subscibers)</span>
					  </p>					
					</div>
					<div class="col-12 col-sm-4 col-md-4">
					  <p class="newsletter-content2">
						<span class="txt3">Join <strong>35.000+ subscribers</strong> and get a new discount
						  coupon on every Wednesday.
						</span>
					  </p>					
					</div>
					<div class="col-12 col-sm-4 col-md-4">
						<p class="newsletter-content2">
							<input type="submit" value="Subscribe" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span><span class="wpcf7-form-control-wrap user_email">
							<input type="email" name="user_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your name here"></span>
						</p>					
					</div>
				</div>
			</div>
		</div>
	</div> 
 </div>
</div>

<footer id="footer" class="o-site-ft">
    <div class="container">
        <div class="row justify-content-center"> 
			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
				<div class="row justify-content-center newsletter">
					<div class="col-12 col-sm-3 col-md-3">
						<h3 class="text-uppercase">About Us </h3>
						<p class="txt-4">Welcome to the International Foodstuff Company. IFCO is an independent seafood company located in Homagama and Pepiliyana Sri Lanka...<a href="about-us/" style="color: #e02b20;">Read more</a></p>
					</div>
					<div class="col-12 col-sm-2 col-md-2">
						<h3 class="text-uppercase">INFORMATION</h3>
						<ul class="sub-menu list txt-4">
							<li class="hvr-forward"><a href="about-us.php">About Us</a></li>
							<li class="hvr-forward"><a href="delivery-information.php">Delivery Information</a></li>
							<li class="hvr-forward"><a href="privacy-policy.php">Privacy &amp; Policy</a></li>
							<li class="hvr-forward"><a href="terms-condition.php">Terms &amp; Condition</a></li>
						</ul>
					</div>
					<div class="col-12 col-sm-2 col-md-2">
						<h3 class="text-uppercase">USER AREA</h3>
						<ul class="sub-menu list txt-4">
							<li class="hvr-forward"><a href="my-account.php">My Account</a></li>
							<li class="hvr-forward"><a href="cart.php">My Cart</a></li>
							<li class="hvr-forward"><a href="login.php">Login</a></li>
							<li class="hvr-forward"><a href="wishlist.php">Wishlist</a></li>
							<li class="hvr-forward"><a href="checkout.php">Checkout</a></li>
						</ul>
					</div>
					<div class="col-12 col-sm-2 col-md-2">
						<h3 class="text-uppercase">GUIDE & HELP</h3>
						<ul class="sub-menu list txt-4">
							<li class="hvr-forward"><a href="careers.php">Careers</a></li>
							<li class="hvr-forward"><a href="buying-guide.php">Buying Guide</a></li>
							<li class="hvr-forward"><a href="faq.php">FAQs</a></li>
							<li class="hvr-forward"><a href="order-returns.php">Order Returns</a></li>
							<li class="hvr-forward"><a href="contact-us.php">Contact Us</a></li>
						</ul>						
					</div>
					<div class="col-12 col-sm-3 col-md-3">
						<h3 class="text-uppercase">contact info</h3>
						<p class="txt-4">
							<span class="txt1"><i class="icofont icofont-headphone-alt-1"></i><tcxspan tcxhref="+94778617274" title="Call +94773513941">+94773513941</tcxspan></span><br>
							<span class="txt2">#17/3, Sarasavi Mawatha, S De S Jayasinghe road, Kalubowila, Colombo, Sri Lanka.</span><br>
							<a class="txt3 ft-contact-info" href="mailto:info@richwingroup.com">info@gsit.com.au</a>
						</p>
							<ul class="social list-inline">
								<li>
									<a href="#" class="facebook" target="_blank" rel="noopener"><i class="fa fa-facebook "></i></a>
								</li>
																									   
								<li>
									<a href="#" class="linkedin" target="_blank" rel="noopener">
										<i class="fa fa-linkedin "></i>
									</a>
								</li>
								<li>
									<a href="#" class="instagram" target="_blank" rel="noopener">
										<i class="fa fa-instagram "></i>
									</a>
								</li>
							</ul>						
					</div>
				</div>
			</div>
			
			<div class="col-12 col-sm-12 col-md-12 text-center"><a href="<?php echo URL;?>"><img src="<?php echo URL;?>assets/images/logo_v2.png" class="img-fluid" width="100px"/></a></div>
			
			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
				<div class="row justify-content-center newsletter">
					<div class="col-12 col-sm-4 col-md-4">
						<img src="<?php echo URL;?>assets/images/payments.png"/>
					</div>
					<div class="col-12 col-sm-4 col-md-4">
						<div class="center_footer_sec">       
							<span>Copyright © <?php echo date('Y');?> <a href="/" title="Richwin Group">Richwin Group</a> All Rights Reserved.</span>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 right_menu">
						<a href="about.php" title="About Richwin Group">About Richwin Group</a>
						<a href="careers.php" title="Richwin Group Careers"> Careers </a>
						<a href="sitemap.php" title="Sitemap">Sitemap</a>					
					</div>
				</div>		
			</div>
			
		</div>
	</div>
</footer>
	


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
<script src="<?php echo URL;?>assets/js/paginathing.js"></script>  

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
	$('#myCarousel').carousel({
	  interval: 4000
	});

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
        
        $('#processFormNew').parsley();
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
            }
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
    
    
    $('.carousel').carousel();

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
load_cart_data();
cart_details();

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
	$('.filter_data').html(make_skeleton());
		
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
		
		function filter_data(){
			var action = 'fetch_data';
			var inchName = $('#inchName').val();
			var catName = $('#catName').val();
			var shorting = $('.short').val();
			var brands = $('.brands').val(); 
			var max_price = $('#hidden_maximum_price').val();
			var min_price = $('#hidden_minimun_price').val();
			var inches = $('.inches').val();
			var category = $('.category').val();
			var pageName = $('#pageName').val();
			var protype = $('#protype').val();
			var types = $('.types').val();
			
			if(catName != '' && category == ''){
				category = catName;
			}else{
				category = category;
			}
			
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
				dataType:"json",
				data:{action:action,shorting:shorting,brands:brands,max_price:max_price,min_price:min_price,inches:inches,category:category,protype:types},
				beforeSend:function(){
					if((brands != '' || price != '' || shorting != '' || inches != '' || category != '' || types != '') && pageName == 'products'){
						$('#loading_response').removeClass('d-none');
					}
					
				}, 				
				success:function(data){
					setTimeout(function(){
					$('#loading_response').addClass('d-none');	
					$('.filter_data').html(data.grid);
					$('.filter_data2').html(data.list);
						//alert(data);
						
					 },1000);
				}
			});	
		 }


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
			url:"<?php echo URL;?>assets/action/fetch_cart.php",
			method:"POST",
			dataType:"json",
			data:{province:province,district:district},
			success:function(data)
			{
				//alert(data);
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
					//alert(data.status);	
					/*if(data.status != 'ok'){
						
					}else{
						//$('#cart_page_details').html('<div class="cart-btn-row text-center"><a href="<?php echo URL;?>products" class="btn-type2">Go to Product Page</a></div>');
					}*/
					$('#cart_page_details').html(data.cart_details);
					$('#total_cart_details').html(data.total_cart_details);
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
					$('.popover').css('display', 'none');
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

</script>

</body>
</html>
