<?php
    include('libs/connection.php');
    $date_time = date('Y-m-d H:i:s');
/*	echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';
*/  

	//unset($_SESSION['arrayImages']);
	global $adsid;    
    global $provinceList;
	global $thumbnail_image;
	global $product_url;
    global $feature_image;
	
    $query = "SELECT id,post_province_name FROM post_province GROUP BY post_province_name ORDER BY post_province_name ASC";	
    $result = mysqli_query($conn, $query);
    
    
    while($row = mysqli_fetch_array($result))
    {
        $provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	   
         
       //$provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	
    }

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    
    $time_start = microtime_float();
    $adsid = ''.substr(round(microtime_float()),8).''.date('is');
	
    //var_dump($_FILES);
    if(isset($_POST['proName'],$_POST['proQty'],$_POST['proPrice'],$_FILES['upload_image']["name"],$_POST['proBrand'])){  
  
        $feature_image = $_SESSION['feature_image'];
		//echo $feature_image; isDisount discountRate
      
        $proName = $_POST['proName'];
        $proQty = $_POST['proQty'];
        $proPrice = $_POST['proPrice'];
        $products_details = $_POST['products_details'];
        $proBrand = $_POST['proBrand'];
        $proCategory = $_POST['proCategory'];
        $proType = $_POST['proType'];
        $proInches = $_POST['proInches']; 
		$displayType = $_POST['displayType']; 
		$saleType = $_POST['saleType']; 
		$isDisount = $_POST['isDisount'];
		$discountRate = '';
		if($isDisount == 'yes'){
			$discountRate = $_POST['discountRate'];
		}else{
			$discountRate = '';
		}	
		
		$product_url_name = strtolower($proName);   
		$post_title = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $product_url_name);
		$post_title = str_replace(' ','-',$post_title);
		
        $proCheckTitle= "SELECT *,COUNT(*) AS titleCheck FROM `products_tbl` WHERE `product_url` LIKE '$post_title%' ORDER BY id DESC";
        $proCheckTitleResult = mysqli_query($conn, $proCheckTitle);	
		$proCheckTitleRow = mysqli_fetch_assoc($proCheckTitleResult);	
		
		//echo $proCheckTitle;
		
		if(isset($proCheckTitleRow['titleCheck']) && $proCheckTitleRow['titleCheck'] >= 1){
			$checkTitle = $proCheckTitleRow['product_url'];
			$checkTitleArray = explode("-",$checkTitle);
			$titleCheckplus = $proCheckTitleRow['titleCheck'] + 1;
			
			/*if(is_numeric(end($checkTitleArray))){
				//$checkelast = end($checkTitleArray) + 1;
				$product_url = array_slice($checkTitleArray, 0, -1);
				$product_url = implode("-",$checkTitleArray).'-'.$titleCheckplus;
			}else{
				$product_url = ''.$post_title.'-1';
			}
			*/	
			$product_url = implode("-",$checkTitleArray).'-'.$titleCheckplus;

			//var_dump($product_url);	
		}else{
			$product_url = ''.$post_title.'';
			//echo '2';
		}
		 		
        
        //include('assets/action/uploadfeature.php');  

        if($feature_image != ''){
          $feature_image = $feature_image;
        }else{
          $feature_image = 'sample.png';
        }       

 
	   $query = "INSERT INTO `products_tbl`(`product_code`, `product_name`, `product_price`, `product_qty`, `is_discount`, `discount_rate`, `product_image`, `product_description`, `product_brand`, `product_category`, `product_inches`, `product_type`, `display_type`, `sell_type`, `product_url`, `date_time`) VALUES ('".$adsid."','".$product_url_name."','".$proPrice."','".$proQty."','".$isDisount."','".$discountRate."','".$feature_image."','".$products_details."','".$proBrand."','".$proCategory."','".$proInches."','".$proType."','".$displayType."','".$saleType."','".$product_url."','".$date_time."')";
  	   mysqli_query($conn, $query);
  	    //echo $query;


		if(isset($_SESSION['arrayImages'][0]['image_name'])){
			$proImage1 = (''.$_SESSION['arrayImages'][0]['image_name'].'.'.$_SESSION['arrayImages'][0]['image_extension'].'');
			//$thumbnail_image = $proImage1;
		}else{
			$proImage1 = '';
			//$thumbnail_image = 'sample.jpg';
		}
		
		if(isset($_SESSION['arrayImages'][1]['image_name'])){
			$proImage2 = (''.$_SESSION['arrayImages'][1]['image_name'].'.'.$_SESSION['arrayImages'][1]['image_extension'].'');
		}else{
			$proImage2 = '';
		}
		
		if(isset($_SESSION['arrayImages'][2]['image_name'])){
			$proImage3 = (''.$_SESSION['arrayImages'][2]['image_name'].'.'.$_SESSION['arrayImages'][2]['image_extension'].'');
		}else{
			$proImage3 = '';
		}
		
		if(isset($_SESSION['arrayImages'][3]['image_name'])){
			$proImage4 = (''.$_SESSION['arrayImages'][3]['image_name'].'.'.$_SESSION['arrayImages'][3]['image_extension'].'');
		}else{
			$proImage4 = '';
		}
		
		if(isset($_SESSION['arrayImages'][4]['image_name'])){
			$proImage5 = (''.$_SESSION['arrayImages'][4]['image_name'].'.'.$_SESSION['arrayImages'][4]['image_extension'].'');
		}else{
			$proImage5 = '';
		}
		
		$insertSQL = "INSERT INTO `products_gallery_tbl`(`product_code`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_image5`,`product_url`, `date_time`) VALUES ('".$adsid."','".$proImage1."','".$proImage2."','".$proImage3."','".$proImage4."','".$proImage5."','".$product_url."','".$date_time."')"; 		
        mysqli_query($conn, $insertSQL);
        
		unset($_SESSION['feature_image']);
		unset($_SESSION['arrayImages']);
       // echo $query;

        echo '<script>window.location.href = "'.URL.'dashboard/products";</script>';
    }else{
		
    }
		
		$brands = '';
        $proBrand = "SELECT * FROM `brands_tbl`";
        $proBrandResult = mysqli_query($conn, $proBrand);	
		while($proBrandrRow = mysqli_fetch_assoc($proBrandResult)){
			$brands .= '<option value="'.$proBrandrRow['brand_name'].'">'.$proBrandrRow['brand_name'].'</option>';
		}	
		$category = '';
        $proCategory = "SELECT * FROM `categories_tbl`";
        $proCategoryResult = mysqli_query($conn, $proCategory);	
		while($proCategoryrRow = mysqli_fetch_assoc($proCategoryResult)){
			$category .= '<option value="'.$proCategoryrRow['category_name'].'">'.$proCategoryrRow['category_name'].'</option>';
		}
		$inches = '';
        $proInches = "SELECT * FROM `product_inches_tbl`";
        $proInchesResult = mysqli_query($conn, $proInches);	
		while($proInchesrRow = mysqli_fetch_assoc($proInchesResult)){
			$inches .= '<option value="'.$proInchesrRow['inches_name'].'">'.$proInchesrRow['inches_name'].' Inches Fans</option>';
		}
		$types = '';
        $proTypes = "SELECT * FROM `product_type_tbl`";
        $proTypesResult = mysqli_query($conn, $proTypes);	
		while($proTypesrRow = mysqli_fetch_assoc($proTypesResult)){
			$types .= '<option value="'.$proTypesrRow['type_name'].'">'.$proTypesrRow['type_name'].'</option>';
		}		
?>
  
  <!-- Begin Page Content -->
  <div class="container-fluid">
  <span id="testing2"></span>
    <!-- Content Row -->
    <div class="row">
         <div class="col-lg-12 mb-4">
             <div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					  <h6 class="m-0 font-weight-bold text-primary">Add Products</h6>
					</a>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
					  <div class="card-body">
             <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary"></h6>
							</div>
              <form method="POST" action="" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Product Name</label>
                        <input type="text" class="form-control capitalize" name="proName" placeholder="" required>
                      </div>                     
                    </div>

                    <div class="col-12 col-md-3 align-self-center">
                      <div class="form-group text-left">
                         <label class="font-weight-bold w-100 float-left uploadingIMG2 d-none">Feature Image Preview (upload file size is 600px X 300px)</label>
                         <img id="blah" src="<?php echo URL;?>assets/uploads/fans_sample.jpg" alt="your image" class="w-100 uploadingIMG shadow" align="center"/>
                      </div>
                       
                    </div>

                    <div class="col-12 col-md-9" id="disblock2">
                    <div class="form-group mb-0 text-left font-weight-bold">
                      <label class="w-100 mb-0">Feature Image</label>
                      <span class="btn text-danger" id="showImg01"><span/>
                    </div>	
                    <div class="dropify-wrapper border-primary rounded">
                      <div class="dropify-message">
                        <i class="fa fa-cloud-upload" style="font-size: 50px !important;width:100%;"></i> 
                        <span class="d-none d-sm-inline-block d-md-inline-block btn btn-success">Drag and drop here</span>	
                        <p class="text-primary">Drag and drop a file here or click | Remember .jpg and .png files only</p>
                      </div>
                      <div class="dropify-loader"></div>
                      <div class="dropify-errors-container">
                      <ul></ul>
                      </div>
                      <input type="file" accept=".jpg, .png, .gif" name="upload_image" class="dropify" id="upload_image" aria-describedby="fileHelp" required>
                      <!--<input type="file"  name="multiple_files" id="multiple_files" multiple accept=".jpg, .png, .gif" class="dropify" aria-describedby="fileHelp">-->					  
                      <button type="button" class="dropify-clear">Remove</button>
                        <div class="dropify-preview">
                        <span class="dropify-render"></span>
                        <div class="dropify-infos">
                        <div class="dropify-infos-inner">
                        <p class="dropify-filename">
                        <span class="file-icon"></span> 
                        <span class="dropify-filename-inner"></span></p>
                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                        </div>
                        </div>
                        </div>
                          </div>
                              <div class="form-group mb-1 text-center file-uploaded-txt">
                                <label id="showfilename2"></label>
                              </div>													
                          </div>
						  <div class="col-12">
							  <span id="error_multiple_files3"></span>
							</div> 						  
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="font-weight-bold">Description</label>
                              <textarea rows="5" class="form-control products_details" name="products_details" id="products_details" required></textarea>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Price</label>
                              <input class="form-control contact_number0000" type="number" name="proPrice" min="1" required/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Qty</label>
                              <input class="form-control contact_number0000" type="number" value="1" name="proQty" min="1"/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Discount</label>
								<select class="form-control isdiscount" name="isDisount">
									<?php
										echo '<option value="no"> No </option>';
										echo '<option value="yes"> Yes </option>';
									?>
								</select>							  
                            </div>                     
                          </div>   

                          <div class="col-md-6 mt-3">
                            <div class="form-group discount d-none">
                              <label class="font-weight-bold">Discount Rate</label>
                              <input class="form-control contact_number0000" type="number" name="discountRate" min="1" step="0.1"/>
                            </div>                     
                          </div>


                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Brand</label>
								<select class="form-control" name="proBrand">
									<?php
										echo '<option value=""> Select Brand </option>';
										echo $brands;
									?>
								</select>
                            </div>                     
                          </div>  

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Pro Category</label>
								<select class="form-control" name="proCategory">
									<?php
										echo '<option value=""> Select Category </option>';
										echo $category;
									?>
								</select>
                            </div>                        
                          </div> 


                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Inches</label>
								<select class="form-control" name="proInches">
									<?php
										echo '<option value=""> Select Inches </option>';
										echo $inches;
									?>
								</select>
                            </div>                     
                          </div>  

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Pro Type</label>
								<select class="form-control" name="proType">
									<?php
										echo '<option value=""> Select Type </option>';
										echo $types;
									?>
								</select>
                            </div>                        
                          </div> 

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Display Type</label>
								<select class="form-control" name="displayType">
									<?php
										echo '<option value=""> Select Type </option>';
										echo '<option value="Featured"> Featured </option>';
										echo '<option value="Normal"> Normal </option>';
										
									?>
								</select>
                            </div>                        
                          </div> 

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Sale Type</label>
								<select class="form-control" name="saleType">
									<?php
										echo '<option value=""> Select Type </option>';										
										echo '<option value="Top"> Top </option>';									
										echo '<option value="Best"> Best </option>';
									?>
								</select>
                            </div>                        
                          </div>                        
                         

                           <div class="col-md-12 mt-3">
                              <div align="center">  
                                  <!--<button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-info btn-lg">Upload Images for Gallery</button>-->
                                  <div class="col-12 col-md-12" id="disblock2">
                                      <div class="form-group mb-0 text-left font-weight-bold">
                                        <label class="w-100 mb-0">Gallery Images (You can upload only 05 images) - please wait here few secounds for uploading images</label>
                                        <span class="btn text-danger" id="showImg01"><span/>
                                      </div>	
                                      <div class="dropify-wrapper border-primary rounded">
                                        <div class="dropify-message">
                                          <i class="fa fa-cloud-upload" style="font-size: 50px !important;width:100%;"></i> 
                                          <span class="d-none d-sm-inline-block d-md-inline-block btn btn-success">Drag and drop here</span>	
                                          <p class="text-primary">Drag and drop a file here or click | Remember .jpg and .png files only</p>
                                        </div>
                                        <div class="dropify-loader"></div>
                                        <div class="dropify-errors-container">
                                        <ul></ul>
                                        </div>
                                        <input type="file"  name="multiple_files" id="multiple_files" multiple accept=".jpg, .png, .gif" class="dropify" aria-describedby="fileHelp">
                                        <button type="button" class="dropify-clear">Remove</button>
                                          <div class="dropify-preview">
                                          <span class="dropify-render"></span>
                                          <div class="dropify-infos">
                                          <div class="dropify-infos-inner">
                                          <p class="dropify-filename">
                                          <span class="file-icon"></span> 
                                          <span class="dropify-filename-inner"></span></p>
                                          <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                          </div>
                                          </div>
                                          </div>
                                            </div>
                                                <div class="form-group mb-1 text-center file-uploaded-txt">
                                                  <label id="showfilename1"></label>
                                                </div>													
                                    </div>
                                            <div class="col-12">
                                              <span id="error_multiple_files2"></span>
                                            </div>                                   
                              </div> 
                           </div>                           
                          <div class="col-md-12 mt-5">
                            <div id="images_list"></div>
                          </div>
                         
                          <div class="col-12 col-md-12">
                              <button type="submit" class="btn btn-warning btn-icon-split float-right">
                              <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                                </span>
                              <span class="text">Publish</span></button>
                              <a href="<?php echo URL;?>dashboard/" class="btn btn-danger btn-icon-split float-right mr-2">
                              <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                                </span>
                              <span class="text">Close</span></a>										
                          </div>	
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
 </div> 