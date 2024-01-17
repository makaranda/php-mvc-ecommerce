$(document).ready(function(){

/* ================================ start Order Company code search list ======================================================== */
				
$('.select-label.ordComList').bind('click', function () {
	var allProvince;
	allProvince = 'all';
		
		$.ajax({
			url:"./action/ordComCode.php",
			method:"POST",
			data:{seachOrdComCode:'all'},
			//data:{name: 'value', anotherName: 'another value'},
			success:function(data){
				$('#seachOrdComCodelist').fadeIn();
				$('#seachOrdComCodelist').html(data);
			}

		});			
		
$('#ordComCode').keyup(function(){
	var ordComCode = $('#ordComCode').val();
	if(ordComCode != ''){	

		
		$.ajax({
			url:"./action/ordComCode.php",
			method:"POST",
			data:{seachOrdComCode:ordComCode},
			success:function(data){
				$('#seachOrdComCodelist').fadeIn();
				$('#seachOrdComCodelist').html(data);								
			}							
			
		});

	}else{
		$('#seachOrdComCodelist').fadeOut();
		$('#seachOrdComCodelist').html("");	
	}

});		

	if($(".tail-select.no-classes.ordComCodeMain").hasClass("active")){
		$(".ordComdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
		$(".ordComdroplist").css({"max-height": ""});
	}else{
		
		$(".ordComdropdown").css({"max-height": "auto", "height": "auto", "display": "block", "overflow": "visible"});
		$(".ordComdroplist").css({"max-height": "194px"});
	}		



$( ".tail-select.no-classes.ordComCodeMain" ).toggleClass(function() {
  if ( $(".tail-select.no-classes.ordComCodeMain").parent().is( ".active" ) ) {
	return "";;
  } else {
	return "active";;

  }				  				  				  
  
});	






});	

$('#seachOrdComCodelist').on('click','li',function(){

	$('#ordComCode').val($(this).text());

	$('.ordComInnerLabel').html($(this).text());

	$(this).addClass('selected');

	$(".ordComdropdown").css({"max-height": "", "height": "", "display": "", "overflow": ""});
	$(".ordComdroplist").css({"max-height": ""});
	$(".tail-select.no-classes.ordComCodeMain").removeClass('active');					
	
	$("#seachOrdComCodelist").fadeOut();
	
});			

	var ordComCode = $('#ordComCode').val();
	if(ordComCode != ''){
		$.ajax({
			url:"./action/ordComName.php",
			method:"POST",
			data:{seachOrdComName:ordComCode},
			success:function(data){
				$('#seachOrdComCodelist').fadeIn();
				$('#seachOrdComCodelist').html(data);								
				
			}							

		});
		
	}else{
		$('#seachOrdComCodelist').fadeOut();
		$('#seachOrdComCodelist').html("");
	}

	$('#seachOrdComCodelist').on('click','li',function(){
		$('#ordComCode').val($(this).text());
		$("#seachOrdComCodelist").fadeOut();
			
			var ordComCode = $('#ordComCode').val();
			
			var seachSupName = $('#seachSupName').val();
			$('#seachSupName').val('');
			if(ordComCode != ''){
				$.ajax({
					url:"./action/ordComName.php",
					method:"POST",
					data:{seachOrdComName:ordComCode},
					//data:{name: 'value', anotherName: 'another value'},
					success:function(data){
						$('#seachOrdComCodelist').fadeIn();
						$('#seachOrdComCodelist').html(data);
						$('#seachOrdComName').val(data);
						
					}

				});	
			}else{
				$('#seachOrdComCodelist').fadeOut();
				$('#seachOrdComCodelist').html("");
				$('#seachSupName').val('');	
			}							

	
		
	});	


/* ========================== End suppliOrder Company code search List =============================================== */


				
			
});			


/* ====================================== Start Order Number Type ==========================================  */

$(document).ready(function(){
	var orderdType = $('#orderdType').val();
	$('#ordNoType').val(orderdType);
	//var orderdItemType = $('.orderdItemType').val();
	
	if(orderdType == 'newNo'){
		$('.orderdItemType').removeClass('d-block');
		$('.orderdItemType').addClass('d-none');
	}else if(orderdType == 'existNo'){
		$('.orderdItemType').removeClass('d-none');
		$('.orderdItemType').addClass('d-block');
		
	}else{
		//alert('Nothing');
	}

	$('#orderdType').on('change',function(){
		var orderdType = $('#orderdType').val();
		$('#ordNoType').val(orderdType);
		if(orderdType == 'newNo'){
			$('#orderExist').removeClass('d-block');
			$('#orderExist').addClass('d-none');
			$('#orderAdd').removeClass('d-none');
			$('#orderAdd').addClass('d-block');	
			
			$('.orderdItemType').removeClass('d-block');
			$('.orderdItemType').addClass('d-none');			
		}else if(orderdType == 'existNo'){
			$('#orderExist').removeClass('d-none');
			$('#orderExist').addClass('d-block');
			$('#orderAdd').removeClass('d-block');
			$('#orderAdd').addClass('d-none');				

			$('.orderdItemType').removeClass('d-none');
			$('.orderdItemType').addClass('d-block');			
		}else{
			//alert('Nothing');
		}

	});

});	

/* ====================================== End Order Number Type ==========================================  */




/* ====================================== Start Add Order Table Type ==========================================  */
$(document).ready(function(){
		


});

$(document).ready(function(){
	load_order_table();
	load_supplier_table();
	
	function load_supplier_table(){
		$.ajax({
			url:"./action/fetchSupItems.php",
			method:"POST",
			dataType:"json",
			success:function(data){

				$('#addSupplierItems').html(data.details);
				//$('.totalamount').text(data.price);
				//$('.asdas').text(data.qty);
			}
		});
	}	
	
	function load_order_table(){
		$.ajax({
			url:"./action/fetchOrdItems.php",
			method:"POST",
			dataType:"json",
			success:function(data){
				$('#addOrderItems').html(data.details);
				//$('.totalamount').text(data.price);
				//$('.asdas').text(data.qty);
			}
		});
	}
	
	/*$('#orderAllDetails').popover({
		html:true,
		container:'body',
		content:function(){
			return $('#addOrderItems').html();
		}
	});*/
	
	$(document).on('click','#addSupplierItemBtn',function(){
		
		var orderAddInput = $('#seachProductCode').val();
		var seachProductName = $('#seachProductName').val();
		var seachProPrice = $('#seachProPrice').val();
		var product_qty = $('#supProQty').val();
		var seachProCategory = $('#seachProCategory').val();
		var ordItemType = $('#ordItemType').val();
		//var seachOrdComName = $('#seachOrdComName').val();
		var seachSupplierCode = $('#seachSupplierCode').val();
		var seachSupName = $('#seachSupName').val();
		var paymentSup = $('#paymentSup').val();
		
		//var product_qty = 10;
		//var ordComName = $('#ordComName').val();
		var action = 'addSup';
		//alert(''+seachProductName+''+seachProPrice+''+seachProQty+'');
		
		if(orderAddInput == ''){
			alert("Please Fill Product Code and Add Button....!");
		}else{
			//alert(ordItemType);
			$.ajax({
				url:"./action/actionAddSupplierItems.php",
				method:"POST",
				data:{action:action,product_id:orderAddInput,product_qty:product_qty,ordItemType:ordItemType,seachProPrice:seachProPrice,seachProductName:seachProductName,seachProCategory:seachProCategory},
				success:function(data){
					$('#allData').text(data);
					load_supplier_table();
					alert("Supplier Item Has been Added inton table....!");
					//alert(seachProductName);
				}	
			});			
			
			$.ajax({
				url:"./action/totalSupplierPrice.php",
				method:"POST",
				data:{action:'action'},
				success:function(data){
					$('#nettotal').val(data);
					$('#supnettotal').val(data);
					//alert(seachProductName);
				}	
			});
		}
		
		
			//alert('OKK');
	});	

			
	
	$(document).on('click','#addOrderItemBtn',function(){
		var orderAddInput = $('#seachProductCode').val();
		var seachProductName = $('#seachProductName').val();
		var seachProPrice = $('#seachProPrice').val();
		var product_qty = $('#ordProQty').val();
		var ordItemType = $('#ordItemType').val();
		var seachOrdComName = $('#seachOrdComName').val();
	
		//var product_qty = 10;
		//var ordComName = $('#ordComName').val();
		var action = 'add';
		//alert(''+seachProductName+''+seachProPrice+''+seachProQty+'');
		
		if(orderAddInput == ''){
			alert("Please Fill Item Name and Add Button....!");
		}else{
			//alert(orderAddInput);
			$.ajax({
				url:"./action/actionAddOrderItems.php",
				method:"POST",
				data:{action:action,product_id:orderAddInput,product_qty:product_qty,ordItemType:ordItemType,seachProPrice:seachProPrice,seachProductName:seachProductName,seachOrdComName:seachOrdComName},
				success:function(data){
					//$('#allData').html(data);

					load_order_table();
					alert("Order Item Has been Added inton table....!");
					//alert(seachProductName);
				}	
			});

			$.ajax({
				url:"./action/totalOrderPrice.php",
				method:"POST",
				data:{action:'action'},
				success:function(data){
					$('#nettotal').val(data);
					$('#ordnettotal').val(data);
					//$('#supnettotal').val(data);
					//alert(seachProductName);
				}	
			});
			
		}
			//alert('OKK');
	});	
	
	$(document).on('click','.delete',function(){
		var deleteId = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product from this table..??")){
			$.ajax({
				url:"./action/actionAddOrderItems.php",
				method:"POST",
				data:{action:action,deleteId:deleteId},
				success:function(data){
					load_order_table();
					alert("Item has been removed from table..");
				}	
			});
			
			$.ajax({
				url:"./action/totalOrderPrice.php",
				method:"POST",
				data:{action:'action'},
				success:function(data){
					$('#ordnettotal').val(data);
					//$('#supnettotal').val(data);
					//alert(seachProductName);
				}	
			});			
			
		}
		//alert(deleteId);
	});	
	
	$(document).on('click','.deleteSup',function(){
		var deleteId = $(this).attr("id");
		//var res = str.split(" ");
		var action = 'removeSup';
		if(confirm("Are you sure you want to remove this product from this table..??")){
			$.ajax({
				url:"./action/actionAddSupplierItems.php",
				method:"POST",
				data:{action:action,deleteId:deleteId},
				success:function(data){
					load_supplier_table();
					alert("Item has been removed from table..");
				}	
			});
			
			$.ajax({
				url:"./action/totalSupplierPrice.php",
				method:"POST",
				data:{action:'action'},
				success:function(data){
					$('#nettotal').val(data);
					$('#supnettotal').val(data);
					//alert(seachProductName);
				}	
			});
			
		}
		//alert(deleteId);
	});	
	
	$(document).on('click','#clearSupplierItemBtn',function(){
		var action = 'emptySupTable';
		if(confirm("Are you sure you want to clear this products from this table..??")){
			$.ajax({
				url:"./action/actionAddSupplierItems.php",
				method:"POST",
				data:{action:action},
				success:function(data){
					load_supplier_table();
					alert("Your Table has been Clear now..");
				}	
			});
			

			$('#ordnettotal').val(0);
			$('#supnettotal').val(0);

			
		}
		//alert(deleteId);
	});	
	
	$(document).on('click','#clearOrderItemBtn',function(){
		var action = 'emptyTable';
		if(confirm("Are you sure you want to clear this products from this table..??")){
			$.ajax({
				url:"./action/actionAddOrderItems.php",
				method:"POST",
				data:{action:action},
				success:function(data){
					
					load_order_table();
					alert("Your Table has been Clear now..");
				}	
			});
		}
		//alert(deleteId);
	});		
	
	
	
	
});	

/* ====================================== End Add Order Table Type ==========================================  */




/*Password Check*/
$(document).ready(function(){
	
	$('#password').keyup(function(){
		var number = /([0-9])/;
		var alphabets = /([a-zA-Z])/;
		var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
		var password;
		
		if($('#password').val().length<1) {
		  $('#password-strength-status').removeClass();	
		  $('#password-strength-status').html("");
			//alert('OK');
		}else if($('#password').val().length<6) {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('weak-password');
			$('#password-strength-status').html("Weak (should be atleast 6 characters.)");
			//alert('OK');
		} else { 

			if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
				$('#password-strength-status').removeClass();
				$('#password-strength-status').addClass('strong-password');
				$('#password-strength-status').html("Strong");
			} else {
				$('#password-strength-status').removeClass();
				$('#password-strength-status').addClass('medium-password');
				$('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
			}
	
		}
	});
	
	$('#confirm_password').keyup(function(){
		var confirm_password = $('#confirm_password').val();
		var password = $('#password').val(); 
		
		if(password != confirm_password){
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('weak-password');
			$('#password-strength-status').html("Password is not Matching.....!");			
		}else if(password == confirm_password){
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('medium-password');
			$('#password-strength-status').html("Password is Matching.....!");			
		}
	});	

});
