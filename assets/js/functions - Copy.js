$(document).ready(function(){


					
/* ================================ start supplier code search list ======================================================== */
				
				$('.select-label.supplierList').bind('click', function () {
					var allProvince;
					allProvince = 'all';
					
						$.ajax({
							url:"./action/productsCode.php",
							method:"POST",
							data:{seachSupplierCode:'all'},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachSupplierCodelist').fadeIn();
								$('#seachSupplierCodelist').html(data);
							}

						});	
						
				$('#seachSupplierCode').keyup(function(){
					var seachSupplierCode = $('#seachSupplierCode').val();
					if(seachSupplierCode != ''){	

						
						$.ajax({
							url:"./action/productsCode.php",
							method:"POST",
							data:{seachSupplierCode:seachSupplierCode},
							success:function(data){
								$('#seachSupplierCodelist').fadeIn();
								$('#seachSupplierCodelist').html(data);								
							}							
							
						});

					}else{
						$('#seachSupplierCodelist').fadeOut();
						$('#seachSupplierCodelist').html("");	
					}

				});		

					if($(".tail-select.no-classes.supCodeMain").hasClass("active")){
						$(".supplierdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
						$(".supplierdroplist").css({"max-height": ""});
					}else{
						
						$(".supplierdropdown").css({"max-height": "auto", "height": "auto", "display": "block", "overflow": "visible"});
						$(".supplierdroplist").css({"max-height": "194px"});
					}		



				$( ".tail-select.no-classes.supCodeMain" ).toggleClass(function() {
				  if ( $(".tail-select.no-classes.supCodeMain").parent().is( ".active" ) ) {
					return "";;
				  } else {
					return "active";;

				  }				  				  				  
				  
				});	

				
			   });	
			
				$('#seachSupplierCodelist').on('click','li',function(){

					$('#seachSupplierCode').val($(this).text());

					$('.supplierInnerLabel').html($(this).text());

					$(this).addClass('selected');

					$(".supplierdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
					$(".supplierdroplist").css({"max-height": ""});
					$(".tail-select.no-classes.supCodeMain").removeClass('active');					
					
					$("#seachSupplierCodelist").fadeOut();
					
				});			
				
					var seachSupplierCode = $('#seachSupplierCode').val();
					if(seachSupplierCode != ''){
						$.ajax({
							url:"./action/productsCode.php",
							method:"POST",
							data:{seachSupplierCode:seachSupplierCode},
							success:function(data1){
								$('#seachSupplierCodelist').fadeIn();
								$('#seachSupplierCodelist').html(data1);								
								
							}							

						});
						
					}else{
						$('#seachSupplierCodelist').fadeOut();
						$('#seachSupplierCodelist').html("");
					}
				
					$('#seachSupplierCodelist').on('click','li',function(){
						$('#seachSupplierCode').val($(this).text());
						$("#seachSupplierCodelist").fadeOut();
							
							var seachSupplierCode = $('#seachSupplierCode').val();
							
							var seachSupName = $('#seachSupName').val();
							$('#seachSupName').val('');
							if(seachSupplierCode != ''){
								$.ajax({
									url:"./action/productsName.php",
									method:"POST",
									data:{seachSupName:seachSupplierCode},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data){
										$('#seachSupplierCodelist').fadeIn();
										$('#seachSupplierCodelist').html(data);
										$('#seachSupName').val(data);
										
									}

								});	
							}else{
								$('#seachSupplierCodelist').fadeOut();
								$('#seachSupplierCodelist').html("");
								$('#seachSupName').val('');	
							}							

					
						
					});	
				
				
/* ========================== End supplier code search List =============================================== */
				
				
/* ================================ start product code search list ======================================================== */
				var seachProCode = $('#seachProCode').val();
				$('.select-label.productsList').bind('click', function () {
					var allProvince;
					allProvince = 'all';
					
						$.ajax({
							url:"./action/productsItemCode.php",
							method:"POST",
							data:{seachProductCode:'all'},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachProductCodelist').fadeIn();
								$('#seachProductCodelist').html(data);								
								
							}							
							
						});
						
				$('#seachProductCode').keyup(function(){
					var seachProductCode = $('#seachProductCode').val();
					if(seachProductCode != ''){	

						
						$.ajax({
							url:"./action/productsItemCode.php",
							method:"POST",
							data:{seachProductCode:seachProductCode},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachProductCodelist').fadeIn();
								$('#seachProductCodelist').html(data);								
								
							}							
							
						});

					}else{
						$('#seachProductCodelist').fadeOut();
						$('#seachProductCodelist').html("");	
					}

				});		

					if($(".tail-select.no-classes.proCodeMain").hasClass("active")){
						$(".productsdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
						$(".productsdroplist").css({"max-height": ""});
					}else{
						
						$(".productsdropdown").css({"max-height": "auto", "height": "auto", "display": "block", "overflow": "visible"});
						$(".productsdroplist").css({"max-height": "194px"});
					}		



				$( ".tail-select.no-classes.proCodeMain" ).toggleClass(function() {
				  if ( $(".tail-select.no-classes.proCodeMain").parent().is( ".active" ) ) {
					return "";;
				  } else {
					return "active";;

				  }				  				  				  
				  
				});	

				
			});	
			
				$('#seachProductCodelist').on('click','li',function(){
					//var list = $('#listProvince li').text();
					
					$('#seachProductCode').val($(this).text());
					//$('.adsprovSearch').val($(this).text());
					$('.productsInnerLabel').html($(this).text());

					$(this).addClass('selected');

					$(".productsdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
					$(".productsdroplist").css({"max-height": ""});
					$(".tail-select.no-classes.proCodeMain").removeClass('active');					
					
					$("#seachProductCodelist").fadeOut();
					
				});			
				
				
					var seachProductCode = $('#seachProductCode').val();
					if(seachProductCode != ''){
						$.ajax({
							url:"./action/productsItemCode.php",
							method:"POST",
							data:{seachProductCode:seachProductCode},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data1){
								$('#seachProductCodelist').fadeIn();
								$('#seachProductCodelist').html(data1);								
								
							}							

						});
						
					}else{
						$('#seachProductCodelist').fadeOut();
						$('#seachProductCodelist').html("");
						$('#seachProductName').val('');	
						$('#seachProPrice').val('');
					}
				
					$('#seachProductCodelist').on('click','li',function(){
						$('#seachProductCode').val($(this).text());
						$("#seachProductCodelist").fadeOut();
						
							var seachProductName = $('#seachProductCode').val();
							//$('#seachProductCode').val('');
							
							if(seachProductName != ''){
								$.ajax({
									url:"./action/productsItemName.php",
									method:"POST",
									data:{seachProductName:seachProductName},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data2){
										$('#seachProductCode').fadeIn();
										$('#seachProductCode').val(seachProductName);
										$('#seachProductName').val(data2);
										
										
									var seachProQty = 1;
									var seachProPrice = $('#seachProPrice').val();
									var seachProTotal;
									
									seachProTotal = (seachProPrice * 1);
									$('#seachProTotal').val(seachProTotal);
									$('#seachProQty').val('1');	
									
									
									}

								});	
							}else{
								$('#seachProductCodelist').fadeOut();
								$('#seachProductCodelist').html("");
								$('#seachProductName').val('');	
							}
					
							var seachProductPrice = $('#seachProductCode').val();
							//$('#seachProductCode').val('');
							
							if(seachProductPrice != ''){
								$.ajax({
									url:"./action/productsItemPrice.php",
									method:"POST",
									data:{seachProductPrice:seachProductPrice},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data3){
										$('#seachProductCode').fadeIn();
										$('#seachProductCode').val(seachProductPrice);
										$('#seachProPrice').val(data3);
										
										$('#seachProTotal').val(data3);
																				
										$('#nettotal').val(data3);
									}

								});	
							}else{
								$('#seachProductCodelist').fadeOut();
								$('#seachProductCodelist').html("");
								$('#seachProPrice').val('');	
							}

							var seachProductCategory = $('#seachProductCode').val();
							//$('#seachProductCode').val('');
							
							if(seachProductCategory != ''){
								$.ajax({
									url:"./action/productsItemCategory.php",
									method:"POST",
									data:{seachProductCategory:seachProductCategory},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data4){
										$('#seachProductCode').fadeIn();
										$('#seachProductCode').val(seachProductCategory);
										$('#seachProCategory').val(data4);
										
									}

								});	
							}else{
								$('#seachProductCodelist').fadeOut();
								$('#seachProductCodelist').html("");
								$('#seachProCategory').val('');	
							}

						
					});	
				
				
/* ========================== End product code search List =============================================== */



/* ================================ start order number search list ======================================================== */
				
				$('.select-label.orderList').bind('click', function () {

						$.ajax({
							url:"./action/ordNumber.php",
							method:"POST",
							data:{seachOrdNo:'all'},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachOrderCodelist').fadeIn();
								$('#seachOrderCodelist').html(data);
							}

						});		
						
				$('#seachOrdNo').keyup(function(){
					var seachOrdNo = $('#seachOrdNo').val();
					if(seachOrdNo != ''){	
						
						$.ajax({
							url:"./action/ordNumber.php",
							method:"POST",
							data:{seachOrdNo:seachOrdNo},
							success:function(data){
								$('#seachOrderCodelist').fadeIn();
								$('#seachOrderCodelist').html(data);	
																	
							}							
							
						});

					}else{
						$('#seachOrderCodelist').fadeOut();
						$('#seachOrderCodelist').html("");	
					}

				});		

					if($(".tail-select.no-classes.ordCodeMain").hasClass("active")){
						$(".orderdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
						$(".orderdroplist").css({"max-height": ""});
					}else{
						
						$(".orderdropdown").css({"max-height": "auto", "height": "auto", "display": "block", "overflow": "visible"});
						$(".orderdroplist").css({"max-height": "194px"});
					}		



				$( ".tail-select.no-classes.ordCodeMain" ).toggleClass(function() {
				  if ( $(".tail-select.no-classes.ordCodeMain").parent().is( ".active" ) ) {
					return "";;
				  } else {
					return "active";;

				  }				  				  				  
				  
				});	

				
			   });	
			



					$('#seachOrderCodelist').on('click','li',function(){
				
						$('#seachOrdNo').val($(this).text());
							//var seachOrdNo = $('#seachOrdNo').val();
						$('.orderInnerLabel').html($(this).text());

						$(this).addClass('selected');
							
						$(".orderdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
						$(".orderdroplist").css({"max-height": ""});
						$(".tail-select.no-classes.ordCodeMain").removeClass('active');					
					
						$("#seachOrderCodelist").fadeOut();				
					//$('#seachOrderCodelist').on('click','li',function(){
						$('#seachOrdNo').val($(this).text());
						$("#seachOrderCodelist").fadeOut();
							
							var seachOrdNo = $('#seachOrdNo').val();
							
							var seachSupName = $('#seachSupName').val();
							$('#seachSupName').val('');


							var seachOrdNo = $('#seachOrdNo').val();
														
							if(seachOrdNo != ''){
								$.ajax({
									url:"./action/ordNumber.php",
									method:"POST",
									data:{seachOrdNo:seachOrdNo},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data){
										$('#seachOrderCodelist').fadeIn();
										$('#seachOrderCodelist').html(data);
									}

								});	
								
								$.ajax({
									url:"./action/ordNoCode.php",
									method:"POST",
									data:{ordNoCode:seachOrdNo},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data){
										//alert('OK SEARCH');
										//$('#seachOrderCodelist').fadeIn();
										//$('#seachOrderCodelist').html(data);
										$('#ordComCode').val(data);
										$('.ordComInnerLabel').html(data);
										//$('#seachOrdComCode').attr('readonly', true);
										
									}

								});
								
								var seachOrdComCode;
								seachOrdComCode = $('#seachOrdComCode').val();
							
								if(seachOrdComCode != ''){
									$('#seachOrdComCode').attr('readonly', true);
								}else{
									$('#seachOrdComCode').attr('readonly', false);
								}						

								$.ajax({
									url:"./action/ordNoName.php",
									method:"POST",
									data:{ordNoName:seachOrdNo},
									//data:{name: 'value', anotherName: 'another value'},
									success:function(data){
										//$('#seachOrderCodelist').fadeIn();
										//$('#seachOrderCodelist').html(data);
										$('#seachOrdComName').val(data);
										
										
									}

								});
								var seachOrdComName;
								seachOrdComName = $('#seachOrdComName').val();
								
								if(seachOrdComName != ''){
									//$('#seachOrdComName').attr('readonly', true);
								}else{
									//$('#seachOrdComName').attr('readonly', false);
								}	
								
							}else{
								$('#seachOrderCodelist').fadeOut();
								$('#seachOrderCodelist').html("");
								$('#seachOrdComName').val('');	
							}							

					
						
					});	
				
				
/* ========================== End order number search List =============================================== */



			


				

				$('#supConirmedCode').keyup(function(){
					var supConirmedCode = $(this).val();
					if(supConirmedCode != ''){
						$.ajax({
							url:"./action/supConirmedCode.php",
							method:"POST",
							data:{supConirmedCode:supConirmedCode},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachSupConfirmCodelist').fadeIn();
								$('#seachSupConfirmCodelist').html(data);
							
								//$('#supConirmedCode').prop('readonly', false);
								//$('#ordConirmedCode').prop('readonly', true);
								//$('#pettyConirmedCode').prop('readonly', true);								
							}
						});	
						
						
					}else{
						$('#seachSupConfirmCodelist').fadeOut();
						$('#seachSupConfirmCodelist').html("");
						$('#supConirmedCode').val('');
							$('#supConirmedCode').val('');	
							$('#supTotQty').text('');	
							$('#supNetTot').text('');
							$('#supSupDate').text('');	
							//$('#ordConirmedCode').prop('readonly', false);
							//$('#pettyConirmedCode').prop('readonly', false);								
					}
				
					$('#seachSupConfirmCodelist').on('click','li',function(){
						$('#supConirmedCode').val($(this).text());
						$("#seachSupConfirmCodelist").fadeOut();
						
						var supConirmedCode = $('#supConirmedCode').val();
						
						if(supConirmedCode != ''){
							
							$.ajax({
								url:"./action/supTotQty.php",
								method:"POST",
								data:{supConirmedCode:supConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#supTotQty').text(data);	
									
								}

							});	
							
							$.ajax({
								url:"./action/supShipping.php",
								method:"POST",
								data:{supConirmedCode:supConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#supShipping').text(data);	
									
								}

							});	

							$.ajax({
								url:"./action/supNetTot.php",
								method:"POST",
								data:{supConirmedCode:supConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#supNetTot').text(data);	
									
								}

							});	

							$.ajax({
								url:"./action/supSupDate.php",
								method:"POST",
								data:{supConirmedCode:supConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#supSupDate').text(data);	
									
								}

							});								
						
						}else{
							
							$('#seachSupConfirmCodelist').fadeOut();
							$('#seachSupConfirmCodelist').html("");
							$('#supConirmedCode').val('');	
							$('#supTotQty').text('');	
							$('#supNetTot').text('');
							$('#supSupDate').text('');
							
						}	
																	
					});	
				});	
				
				
				$('#ordConirmedCode').keyup(function(){
					var ordConirmedCode = $(this).val();
					if(ordConirmedCode != ''){
						$.ajax({
							url:"./action/ordConirmedCode.php",
							method:"POST",
							data:{ordConirmedCode:ordConirmedCode},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachOrdConfirmCodelist').fadeIn();
								$('#seachOrdConfirmCodelist').html(data);
							
								//$('#ordConirmedCode').prop('readonly', false);
								//$('#supConirmedCode').prop('readonly', true);
								//$('#pettyConirmedCode').prop('readonly', true);								
							}
						});	
						
						
					}else{
						$('#seachOrdConfirmCodelist').fadeOut();
						$('#seachOrdConfirmCodelist').html("");
						$('#ordConirmedCode').val('');
							$('#ordConirmedCode').val('');	
							$('#ordTotQty').text('');	
							$('#ordNetTot').text('');
							$('#ordDate').text('');	
							$('#ordShippedTot').text('');	
							//$('#supConirmedCode').prop('readonly', false);
							//$('#pettyConirmedCode').prop('readonly', false);								
					}
				
					$('#seachOrdConfirmCodelist').on('click','li',function(){
						$('#ordConirmedCode').val($(this).text());
						$("#seachOrdConfirmCodelist").fadeOut();
					
						var ordConirmedCode = $('#ordConirmedCode').val();
						
						if(ordConirmedCode != ''){
							
							$.ajax({
								url:"./action/ordTotQty.php",
								method:"POST",
								data:{ordConirmedCode:ordConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#ordTotQty').text(data);	
									
								}

							});	
							
							$.ajax({
								url:"./action/ordShipping.php",
								method:"POST",
								data:{ordConirmedCode:ordConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#ordShippedTot').text(data);	
									
								}

							});	

							$.ajax({
								url:"./action/ordNetTot.php",
								method:"POST",
								data:{ordConirmedCode:ordConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#ordNetTot').text(data);	
									
								}

							});	

							$.ajax({
								url:"./action/ordDate.php",
								method:"POST",
								data:{ordConirmedCode:ordConirmedCode},
								//data:{name: 'value', anotherName: 'another value'},
								success:function(data){
									$('#ordDate').text(data);	
									
								}

							});								
						
						}else{
							
							$('#seachOrdConfirmCodelist').fadeOut();
							$('#seachOrdConfirmCodelist').html("");
							$('#ordConirmedCode').val('');	
							$('#ordTotQty').text('');	
							$('#ordNetTot').text('');
							$('#ordShippedTot').text('');
							$('#ordDate').text('');
							
						}	
																	
					});	
				});
				
				
				$('#seachOrdComCode').keyup(function(){
					var seachOrdComCode = $(this).val();
					if(seachOrdComCode != ''){
						$.ajax({
							url:"./action/ordComCode.php",
							method:"POST",
							data:{seachOrdComCode:seachOrdComCode},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachOrdComCodelist').fadeIn();
								$('#seachOrdComCodelist').html(data);
							}

						});	
					}else{
						$('#seachOrdComCodelist').fadeOut();
						$('#seachOrdComCodelist').html("");
						$('#seachOrdComName').val('');	
					}
				
					$('#seachOrdComCodelist').on('click','li',function(){
						$('#seachOrdComCode').val($(this).text());
						$("#seachOrdComCodelist").fadeOut();
						
					var seachOrdComName = $('#seachOrdComCode').val();
					$('#seachOrdComName').val('');
					if(seachOrdComName != ''){
						$.ajax({
							url:"./action/ordComName.php",
							method:"POST",
							data:{seachOrdComName:seachOrdComName},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachProNameelist').fadeIn();
								$('#seachProNameelist').html(data);
								$('#seachOrdComName').val(data);
								
								
							/*	var seachOrdComName;
								seachOrdComName = $('#seachOrdComName').val();
								
								if(seachOrdComName != ''){
									$('#seachOrdComName').attr('readonly', true);
								}else{
									$('#seachOrdComName').attr('readonly', false);
								}								
							*/
							}

						});	
					}else{
						$('#seachProNameelist').fadeOut();
						$('#seachProNameelist').html("");
						$('#seachOrdComName').val('');	
					}

					
						
					});	
				});	



				$('#invoiceId').keyup(function(){
					var invoiceId = $(this).val();
					$("#invoiceMessage").html("New Invoice Number");
					if(invoiceId != ''){
						$.ajax({
							url:"./action/supInvoiceId.php",
							method:"POST",
							data:{invoiceId:invoiceId},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachInvoicelist').fadeIn();
								$('#seachInvoicelist').html(data);
							}

						});	
					}else{
						$('#seachInvoicelist').fadeOut();
						$('#seachInvoicelist').html("");
						$('#invoiceId').val('');
						$("#invoiceMessage").html("");	
					}
				
					$('#seachInvoicelist').on('click','li',function(){
						$('#invoiceId').val($(this).text());
						$("#seachInvoicelist").fadeOut();								
						$("#invoiceMessage").html("This invoice number is already inserted and still not pay");
					});	
					
				});


				$('#seachOrdNo').keyup(function(){
					var seachOrdNo = $(this).val();
					if(seachOrdNo != ''){
						$.ajax({
							url:"./action/ordNumber.php",
							method:"POST",
							data:{seachOrdNo:seachOrdNo},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								$('#seachOrdNoList').fadeIn();
								$('#seachOrdNoList').html(data);
							}

						});	
						
						$.ajax({
							url:"./action/ordNoCode.php",
							method:"POST",
							data:{ordNoCode:seachOrdNo},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								//$('#seachOrdNoList').fadeIn();
								//$('#seachOrdNoList').html(data);
								$('#seachOrdComCode').val(data);
								//$('#seachOrdComCode').attr('readonly', true);
								
							}

						});
						
						var seachOrdComCode;
						seachOrdComCode = $('#seachOrdComCode').val();
				
						if(seachOrdComCode != ''){
							$('#seachOrdComCode').attr('readonly', true);
						}else{
							$('#seachOrdComCode').attr('readonly', false);
						}						

						$.ajax({
							url:"./action/ordNoName.php",
							method:"POST",
							data:{ordNoName:seachOrdNo},
							//data:{name: 'value', anotherName: 'another value'},
							success:function(data){
								//$('#seachOrdNoList').fadeIn();
								//$('#seachOrdNoList').html(data);
								$('#seachOrdComName').val(data);
								
								
							}

						});
						var seachOrdComName;
						seachOrdComName = $('#seachOrdComName').val();
						
						if(seachOrdComName != ''){
							//$('#seachOrdComName').attr('readonly', true);
						}else{
							//$('#seachOrdComName').attr('readonly', false);
						}	
						
					}else{
						$('#seachOrdNoList').fadeOut();
						$('#seachOrdNoList').html("");
						$('#seachOrdComName').val('');	
					}
				
					$('#seachOrdNoList').on('click','li',function(){
						$('#seachOrdNo').val($(this).text());
						$("#seachOrdNoList").fadeOut();
						
					var seachOrdComName = $('#seachOrdNo').val();
					//$('#seachOrdComName').val('');						
						
					});	
				});				

	alert('OK');			
				
				$('#seachProQty').click(function(){
					
					var seachProQty = $('#seachProQty').val();
					var seachProPrice = $('#seachProPrice').val();
					seachProPrice = parseInt(seachProPrice);
					seachProQty = parseInt(seachProQty);
					var seachProTotal;

					shippingCharge0 = $('#shippingCharge').val();
					shippingCharge = parseInt(shippingCharge0);
					alert(seachProPrice);
					if(seachProQty != '' && shippingCharge != ''){
						seachProTotal = parseInt((seachProPrice * seachProQty) + shippingCharge);
						$('#nettotal').val(seachProTotal);	
						//alert(shippingCharge);					
							
					}else{
						//alert('NOT USED');
						seachProTotal = parseInt(seachProPrice * seachProQty);
						$('#nettotal').val(seachProTotal);
					}				
				});
				

				$('#seachProQty').keyup(function(){
					
					var seachProQty = $(this).val();
					var seachProPrice = $('#seachProPrice').val();
					var seachProTotal;
					var shippingNetTot;	
					
					seachProPrice = $('#seachProPrice').val(); 
					seachProQty = $('#seachProQty').val(); 					
					shippingCharge0 = $('#shippingCharge').val();
					shippingCharge = parseInt(shippingCharge0);

					if(seachProQty == ''){
						shippingNetTot =parseInt(seachProPrice * seachProQty);
						$('#seachProTotal').val(shippingNetTot);
					}else{
						shippingNetTot = parseInt((seachProPrice * seachProQty) + shippingCharge);
						$('#seachProTotal').val(shippingNetTot);
					}

					if(seachProQty != '' && shippingCharge != ''){
						seachProTotal = parseInt((seachProPrice * seachProQty) + shippingCharge);
						$('#nettotal').val(seachProTotal);
							
					}else{
						seachProTotal = parseInt(seachProPrice * seachProQty);
						$('#nettotal').val(seachProTotal);
					}	
								
				});
				
				$('#paymentSup').change(function(){
					var paymentSup;
					paymentSup = $('#paymentSup').val();
					if(paymentSup == 'credit'){
						$('#creditPeriod').addClass('d-block');
						$('#creditPeriod').removeClass('d-none');
					}else{
						$('#creditPeriod').addClass('d-none');
						$('#creditPeriod').removeClass('d-block');
					}
					
				});
				
				
/*				$('#shippingCharge').keyup(function(){
					var shippingCharge;
					var total;
					var nettotal;
					var seachProTotal;
					var seachProPrice;
					var seachProQty;
					var shippingNetTot;

					seachProPrice = $('#seachProPrice').val(); 
					seachProQty = $('#seachProQty').val(); 

					shippingCharge0 = $('#shippingCharge').val();
					shippingCharge = parseInt(shippingCharge0);					
					total = $('#seachProTotal').val();
	
					total = parseInt(total);

					if(shippingCharge0 == ''){
						shippingNetTot =parseInt(seachProPrice * seachProQty);
						$('#seachOrdEditProTotal').val(shippingNetTot);
					}else{
						shippingNetTot = parseInt((seachProPrice * seachProQty) + shippingCharge);
						$('#seachOrdEditProTotal').val(shippingNetTot);
					}
	
					//alert(seachProQty);
					
					nettotal = '';
					
					if(shippingCharge0 == ''){
						nettotal = parseInt(seachProPrice * seachProQty);
						$('#nettotal').val(nettotal);;
						nettotal = '';	
					}else{
						nettotal = parseInt((seachProPrice * seachProQty) + shippingCharge);
						$('#nettotal').val(nettotal);
						nettotal = '';
					}
					
				});
*/

				$('#creditValue').keyup(function(){
					var creditValue;

					creditValue = $('#creditValue').val();
									
					if(creditValue != ''){
						$('#debitValue').prop('readonly', true);
						$('#creditValue').prop('readonly', false);
					}else if(creditValue == ''){
						//$('#creditValue').prop('readonly', false);
						
						$('#debitValue').prop('readonly', false);						
					}else{
						$('#debitValue').prop('readonly', false);	
					}
					
				});

				$('#creditValue').change(function(){
					var creditValue;
							console.log(creditValue);				
					creditValue = $('#creditValue').val();
				
					if(creditValue != ''){
						console.log(creditValue);
						$('#debitValue').prop('readonly', true);
						$('#creditValue').prop('readonly', false);
					}
					
					if(parseFloat(creditValue) == 0){
						$('#debitValue').prop('readonly', false);						
					}else if(parseFloat(creditValue) >= 0){
						$('#debitValue').prop('readonly', true);	
					}
					
				});	
				
				$('#debitValue').keyup(function(){
					var debitValue;

					debitValue = $('#debitValue').val();
				
					if(debitValue != ''){
						$('#creditValue').prop('readonly', true);
						$('#debitValue').prop('readonly', false);
					}else if(debitValue == '0'){
						//$('#creditValue').prop('readonly', false);
						$('#creditValue').prop('readonly', false);						
					}else{
						$('#creditValue').prop('readonly', false);	
					}
					
				});				
				
				$('#debitValue').change(function(){
					var debitValue;

					debitValue = $('#debitValue').val();
					
					if(debitValue != ''){
						console.log(debitValue);
						$('#creditValue').prop('readonly', true);
						$('#debitValue').prop('readonly', false);
					}
					
					if(parseFloat(debitValue) == 0){
						$('#creditValue').prop('readonly', false);						
					}else if(parseFloat(debitValue) >= 0){
						$('#creditValue').prop('readonly', true);	
					}					
					
				});	
				if($('#supplier').prop('checked', true)){
						
						$('#supItm').addClass('d-block');	
						$('#ordItm').addClass('d-none');	
						$('#pettyItm').addClass('d-none');	
						$('#otherItm').addClass('d-none');	

						
				}else{
					
				}
										
				$('#supplier').click(function(){
					
					if($('#supplier').prop('checked', true)){
						$('#supItm').removeClass('d-none');
						$('#ordItm').removeClass('d-block');
						$('#pettyItm').removeClass('d-block');
						$('#otherItm').removeClass('d-block');
						
						$('#supItm').addClass('d-block');	
						$('#ordItm').addClass('d-none');	
						$('#pettyItm').addClass('d-none');	
						$('#otherItm').addClass('d-none');
					}else{
					
					}
					
				});	
				$('#order').click(function(){
					
					if($('#order').prop('checked', true)){
						$('#supItm').removeClass('d-block');
						$('#ordItm').removeClass('d-none');
						$('#pettyItm').removeClass('d-block');
						$('#otherItm').removeClass('d-block');
						
						$('#supItm').addClass('d-none');	
						$('#ordItm').addClass('d-block');	
						$('#pettyItm').addClass('d-none');	
						$('#otherItm').addClass('d-none');
					}else{
					
					}
				
				});
				$('#others').click(function(){
					
					if($('#others').prop('checked', true)){
						$('#supItm').removeClass('d-block');
						$('#ordItm').removeClass('d-block');
						$('#pettyItm').removeClass('d-block');
						$('#otherItm').removeClass('d-none');
						
						$('#supItm').addClass('d-none');	
						$('#ordItm').addClass('d-none');	
						$('#pettyItm').addClass('d-none');	
						$('#otherItm').addClass('d-block');
					}else{
					
					}
					
				});		
				$('#pettycash').click(function(){
					
					if($('#pettycash').prop('checked', true)){
						$('#supItm').removeClass('d-block');
						$('#ordItm').removeClass('d-block');
						$('#pettyItm').removeClass('d-none');
						$('#otherItm').removeClass('d-block');
						
						$('#supItm').addClass('d-none');	
						$('#ordItm').addClass('d-none');	
						$('#pettyItm').addClass('d-block');	
						$('#otherItm').addClass('d-none');
					}else{
						
					}
					
				});					
						
				
			});	