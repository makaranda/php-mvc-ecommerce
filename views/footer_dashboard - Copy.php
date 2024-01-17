      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo date("Y");?> All rights reserved | <a href="https://www.grandtours.com/" target="_new" class="copyright-link text-warning" target="_new">Grand Tours</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close" aria-hidden="true"></i>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-sm btn-primary" href="<?php echo URL;?>dashboard/logout">Logout</a>
        </div>
      </div>
    </div>
  </div> 
<!--
<div id="uploadModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="event_images_form" action="" enctype="multipart/form-data">
    <div class="modal-header">
    <div class="container">
     <div class="row">
        <div class="col-8">     
          <h5 class="modal-title">Gallery Images Details</h5>        
        </div>
        <div class="col-4">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
     </div>
     </div>  
    </div>
    <div class="modal-body">
 
    </div>
    <div class="modal-footer">
     <input type="hidden" name="image_id" id="image_id" value="" />
     <button type="button" class="btn btn-info uploadBtn" id="UploadBtn">Upload</button> 
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>
-->
  <script src="<?php echo URL;?>assets/ckeditor/ckeditor.js"></script> 
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  
   <script type="text/javascript" src="<?php echo URL;?>assets/js/tail.select-full.min.js"></script> 
  <script src="<?php echo URL;?>assets/js/core.js"></script>
 
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo URL;?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URL;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URL;?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URL;?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo URL;?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo URL;?>assets/js/demo/chart-pie-demo.js"></script>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  
   <!-- Multiselect JS -->   
  <script src="<?php echo URL;?>assets/js/tokenize2.js"></script> 
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> 
  <script src="<?php echo URL;?>assets/js/bundle.min.js"></script>
  <script src="<?php echo URL;?>assets/js/bootstrap-multiselect.js"></script>
  

    <script type="text/javascript" src="<?php echo URL;?>assets/ckeditor/ckeditor.js"></script> 
	
    <script type="text/javascript" src="<?php echo URL;?>assets/js/functions.js"></script>  
	


    <script src="<?php echo URL;?>assets/js/functions.js"></script>	
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>	

  <!-- DataTable -->  
  <script src="<?php echo URL;?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo URL;?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo URL;?>assets/js/demo/datatables-demo.js"></script>
  
  <script type="text/javascript" src="<?php echo URL;?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo URL;?>assets/js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  
  <script type="text/javascript" src="<?php echo URL;?>assets/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo URL;?>assets/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="<?php echo URL;?>assets/js/selectstyle.js"></script>

  
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

   <script src="<?php echo URL;?>assets/js/datepicker.js"></script> 
   <script src="<?php echo URL;?>assets/js/myscript.js"></script> 	
   <script>
      $('#listView').DataTable();
      CKEDITOR.replace('events_details');
      CKEDITOR.replace('hotels_details');
      CKEDITOR.replace('edit_hotels_details');
   </script>
   	
   <script type="text/javascript">
   
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#upload_image").change(function() {
  $('.uploadingIMG').removeClass('d-none');
  $('.uploadingIMG').addClass('d-inline-block');
  readURL(this);
});

load_images();
load_images2();


//alert(page_type);

function load_images2()
{

  var page_id = $('#page_id').val();
  var page_type = $('#pageType').val();

    $.ajax({
        url:"<?php echo URL;?>assets/action/fetch_images2.php",
        type:"POST",
        data:{page_id:page_id,page_type:page_type},
        success:function(data)
        {
          //alert(data);
            $('#images_list2').html(data);
        }
    });
}

function load_images()
{
  var page_id = $('#page_id').val();
  var page_type = $('#pageType').val();	
    $.ajax({
        url:"<?php echo URL;?>assets/action/fetch_images.php",
		type:"POST",
		data:{page_id:page_id,page_type:page_type},
        success:function(data)
        {
          //alert(data);
            $('#images_list').html(data);
        }
    });
}
/*
$('#multiple_files').change(function(){ 
    $('#upload_form').submit();  
});
*/
$('#multiple_files').change(function(){
  //e.preventDefault();
  var error_images = '';
  var form_data = new FormData();
  var upload_image = $('#multiple_files').val();
  //alert(form_data);
  var page_type = $('#pageType').val();
  var files = $('#multiple_files')[0].files;
  var pageType = $('#pageType').val();
  //$('#uploadModal').modal('hide'); 
  $('#uploadModal').removeClass('show');
  $('#uploadModal').css("display", "none");
	$('#uploadModal').addClass('hide');
	$('#uploadModal').hide();

  if(files.length > 11)
  {
   error_images += 'You can not select more than 10 files';
   
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
	 var page_type = $('#pageType').val();	
	 //alert(page_type);  	
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
     form_data.append('pageType', page_type);
     form_data.append('pages_max', document.getElementById('pages_max').value);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"<?php echo URL;?>assets/action/uploadGalleryImages.php",
    type:"POST",
    data: form_data,
    //data: {upload_image: upload_image,page_type:page_type},
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary"><b>Uploading...</b></label>');
    },   
    success:function(data)
    {
     load_images(); 
     //alert(data);
     $('#error_multiple_files').html('<br /><label class="text-success"><b>Uploaded</b></label>');
     
    }
   });
  }
  else
  {
  
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 }); 

 $(document).on('click', '.deleteEventImage', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"<?php echo URL;?>assets/action/deleteEventImages.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_images();
     alert("Image removed");
    }
   });
  }
 });

 $(document).on('click', '.deleteHotelImage', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"<?php echo URL;?>assets/action/deleteHotelImages.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_images();
     alert("Image removed");
    }
   });
  }
 });

 $('#multiple_files2').change(function(){
  //e.preventDefault();
  var error_images = '';
  var form_data = new FormData();
  var upload_image = $('#multiple_files2').val();
  //alert(form_data);
  var page_type = $('#pageType').val();
  var files = $('#multiple_files2')[0].files;
  var pageType = $('#pageType').val();

  if(files.length > 11)
  {
   error_images += 'You can not select more than 10 files';
   
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files2").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files2").files[i]);
    var f = document.getElementById("multiple_files2").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files2').files[i]);
     form_data.append('pageType', document.getElementById('pageType').value);
     form_data.append('page_id', document.getElementById('page_id').value);
    }
   }
  }
  if(error_images == '')
  {
   
   $.ajax({
    url:"<?php echo URL;?>assets/action/uploadGalleryImages2.php",
    type:"POST",
    data: form_data,
    //data: {upload_image: upload_image,page_type:page_type},
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary"><b>Uploading...</b></label>');
    },   
    success:function(data)
    {
      load_images2(); 
      //alert(data);
     $('#error_multiple_files').html('<br /><label class="text-success"><b>Uploaded</b></label>');
     
    }
   });
  }
  else
  {
  
   $('#multiple_files2').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 }); 

 $(document).on('click', '.deleteEventImage2', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"<?php echo URL;?>assets/action/deleteEventImages2.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_images2();
     alert("Image removed");
    }
   });
  }
 });
 
 
 /*     const map = new L.Map('map', {
          center: new L.LatLng(52.6313102,1.292898),
          zoom: 14,
          maxZoom: 18
      });
      const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

      map.addLayer(osm);
     
*/
var latitudeForm = $('#latitude').val();
var longatudeForm = $('#longatude').val();
//alert(latitudeForm);
if(latitudeForm == '' && longatudeForm == ''){
    latitudeForm = '6.9271';
    longatudeForm = '79.8612';
}else{
    latitudeForm = latitudeForm;
    longatudeForm = longatudeForm;
    $('#long').val(latitudeForm);
    $('#lati').val(longatudeForm);
}



const mymap =  L.map('issMap').setView([latitudeForm,longatudeForm],8);
/*L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);
*/
//eventLocation

//var geocodeService = L.esri.Geocoding.geocodeService();

//alert(geocodeService);
const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreet Map</a>';

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tiles = L.tileLayer(tileUrl,{attribution,id: 'mapbox.streets',maxZoom: 18});
tiles.addTo(mymap);

const issIcon = L.icon({
	
	iconUrl: '<?php echo URL; ?>assets/images/map_marker.png',
	iconSize:[50.32],
	iconAnchor:[25,16]

});



const marker = L.marker([latitudeForm,latitudeForm],{icon: issIcon,draggable:true}).addTo(mymap);
const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';

//L.marker([50.5, 30.5]).addTo(mymap);

async function getISS(){
    
    
	const response = await fetch(api_url);
	const data = await response.json();
	const {latitude,longitude} = data;
	//const {latitudeForm,longatudeForm};
	
  //marker.setLatLng([latitude,longitude]);
  marker.setLatLng([latitudeForm,longatudeForm]);
  //L.marker([latitude,longitude]).addTo(mymap);
  //L.marker([latitude, longitude]).addTo(mymap);
	    //document.getElementById('long').textContent = longitude;
      //document.getElementById('lati').textContent = latitude;	

      $('#long').val(latitudeForm);
      $('#lati').val(longatudeForm);
}

//$(document).on('click','.leaflet-marker-icon',function(){
  marker.on('dragend', function(event){
            var marker = event.target;
            var position = marker.getLatLng();
            $('#changePointer').val(position);
            var allPosition1 = $('#changePointer').val();
            var allPosition2 = allPosition1.replace("LatLng(","");
            var allPosition3 = allPosition2.replace(")","");
            var allPosition4 = allPosition3.split(',');
            var long = allPosition4[0];
            var lati = allPosition4[1];
            //console.log(position);
            //alert(allPosition);


            $('#long').val(long);
            $('#lati').val(lati);

            $('#longatude').val(long);
            $('#latitude').val(lati);


            //marker.setLatLng(position,{icon: issIcon,draggable:true}).bindPopup(position).update();
    });

       

 /*   map.on('geosearch_showlocation', function (result) {
       var address = L.marker([result.x, result.y]).addTo(map);
       alert(address);
    });
*/
    mymap.addLayer(marker);
  //});
/*
function onMapClick(e) {
  getISS();
    marker.on('dragend', function(event){
            var marker = event.target;
            var position = marker.getLatLng();
            console.log(position);
            marker.setLatLng(position,{id:uni,draggable:'true'}).bindPopup(position).update();
    });
    map.addLayer(marker);
};
*/



getISS();

//$( ".formdatepicker" ).datepicker();
</script>
<script>
validationLength = 10;
	$('.contact_number').on('keyup keydown change', function () {
		//alert('OK');
		var contact_number = $('#contact_number').val();
		if($(this).val().length > validationLength){
			
			val=$(this).val().substr(0,$(this).val().length-1);
			$(this).val(val);
		};
	});
	
	
		$('.capitalize').on('keyup keydown change', function(event) {

			if($(this).val().length > 1){
				var event = $(this).val();
				
			   var splitStr = event.toLowerCase().split(' ');
			   for (var i = 0; i < splitStr.length; i++) {
				   // You do not need to check if i is larger than splitStr length, as your for does that for you
				   // Assign it back to the array
				   splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
			   }
				splitStr = splitStr.join(' ');
				$(this).val(splitStr);	
			};


		});

    $('.proDisCity').change(function(){
      $('.hidewithprovince').addClass('d-none');
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
     url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
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


      var hiddenprovince = $('#hiddenprovince').val();
		  var hiddendistrictName = $('#hiddendistrictName').val();
      var district_name_past = $('#hiddendistrictName').val();
		  var hiddendistrict = $('#hiddendistrict').val();
      var hiddentown = $('#neatest_town_past').val();	
		 //alert(hiddendistrict);
		  if(hiddenprovince != '')
		  {
			   //alert(hiddenprovince);
		   $.ajax({
			url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
			method:"POST",
			data:{action:"province", query:hiddenprovince,type:'withoutChange',disId:hiddendistrict,disName:hiddendistrictName},
			success:function(data){
			 $('#district').html(data);
			 
			}
		   })
		  }else{
		   $.ajax({
			url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
			method:"POST",
			data:{action:"province", query:'',type:'withoutChange',disId:'',disName:''},
			success:function(data){
			 $('#district').html(data);
			 
			}
		   })			  
		  }		
		  
		  if(hiddendistrict != '')
		  {
		   $.ajax({
			url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
			method:"POST",
			data:{action:"district", query:hiddendistrict,type:'withoutChange'},
			success:function(data){
			 //$('#city').html(data);
			  
			}
		   })
		  }else{
		   $.ajax({
			url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
			method:"POST",
			data:{action:"district", query:'',type:'withoutChange'},
			success:function(data){
			 //$('#city').html(data);
			 
			}
		   })			  
		  }


		  
		  
		  if(hiddendistrict != '')
		  {
			 // alert('OK');
		   var action = "province";
		   var query = hiddendistrict;
		   var result = '';
		   if(action == "province")
		   {
			result = 'district';
		   }
		   else
		   {
			result = 'city';
		   }
		   $.ajax({
			url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
			method:"POST",
			data:{action:action,query:hiddenprovince,disId:hiddendistrict,disName:district_name_past,type:'withoutChange'},
			success:function(data){
				//alert(data);
			 //$('.testText').html(data);
			 $('#district').html(data);
			}
		   })
		  }	
		  //alert(hiddentown);
		  if(hiddentown != '')
		  {
			  //alert('OK');
		   var action = "district";
		   var query = hiddendistrict;
		   var result = '';
		   if(action == "province")
		   {
			result = 'district';
		   }
		   else
		   {
			result = 'city';
		   }
		   $.ajax({
			url:"<?php echo URL;?>assets/action/fetch_prov_district_city.php",
			method:"POST",
			data:{action:action,query:hiddenprovince,disId:hiddendistrict,disName:district_name_past,hiddentown:hiddentown,type:'withoutChange'},
			success:function(data){
				//alert(data);
				//$('.testText').html(data);
			 $('#city').html(data);
       $('#testing').html(data);
			}
		   })
		  }


    

</script>
</body>
</html>


