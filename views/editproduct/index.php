  <?php
    include('libs/connection.php');
    include("assets/php_image_magician.php");
    include("assets/classPhpPsdReader.php"); 
            
    $productId = explode('/',$_GET['url']);
    $productId = $productId[2];
    global $provinceList;
    global $no_of_img;

	//var_dump($_SESSION["arrayImages"]);
    
    $date_time = date('Y-m-d H:i:s');
    
    if(isset($productId) && $productId != ''){
        $eID =  ''.$productId.'';
    }else{
        echo '<script>window.location.href = "'.URL.'dashboard/products";</script>';
        $eID = '';
    }
	
	$no_of_img = 0;

    $selectSQL = "SELECT * FROM `products_tbl` WHERE `product_code` = $productId";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);
	
    $selectSQL23 = "SELECT * FROM `products_gallery_tbl` WHERE `product_code` = $productId";
    $result23 = mysqli_query($conn, $selectSQL23);
    $row23 = mysqli_fetch_assoc($result23);	
	
	//echo $selectSQL23;	
	
	if(isset($row23['product_image1']) && $row23['product_image1'] != ''){
		$no_of_img = 1;
	}
	if(isset($row23['product_image2']) && $row23['product_image2'] != ''){
		$no_of_img = $no_of_img + 1;
	}
	if(isset($row23['product_image3']) && $row23['product_image3'] != ''){
		$no_of_img = $no_of_img + 1;
	}
	if(isset($row23['product_image4']) && $row23['product_image4'] != ''){
		$no_of_img = $no_of_img + 1;
	}
	if(isset($row23['product_image5']) && $row23['product_image5'] != ''){
		$no_of_img = $no_of_img + 1;
	}
	
    $product_code = $row['product_code'];
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $product_qty = $row['product_qty'];
    $is_discount = $row['is_discount'];
    $discount_rate = $row['discount_rate'];
    $product_image = $row['product_image'];
    $product_description = $row['product_description']; 
    $product_brand = $row['product_brand'];
    $product_category = $row['product_category'];
    $product_inches = $row['product_inches'];
    $product_type = $row['product_type'];

    
    $display_type = $row['display_type'];
    $sell_type = $row['sell_type'];
    $product_url = $row['product_url'];
    $date_time = $row['date_time'];
		
		$brands = '';
        $proBrand = "SELECT * FROM `brands_tbl`";
        $proBrandResult = mysqli_query($conn, $proBrand);	
		while($proBrandrRow = mysqli_fetch_assoc($proBrandResult)){
			if(isset($product_brand) && $product_brand == $proBrandrRow['brand_name']){
				
			}else{
				$brands .= '<option value="'.$proBrandrRow['brand_name'].'">'.$proBrandrRow['brand_name'].'</option>';				
			}

		}	
		$category = '';
        $proCategory = "SELECT * FROM `categories_tbl`";
        $proCategoryResult = mysqli_query($conn, $proCategory);	
		while($proCategoryrRow = mysqli_fetch_assoc($proCategoryResult)){
			if(isset($product_category) && $product_category == $proCategoryrRow['category_name']){
				
			}else{
				$category .= '<option value="'.$proCategoryrRow['category_name'].'">'.$proCategoryrRow['category_name'].'</option>';
			}			
			
		}
		$inches = '';
        $proInches = "SELECT * FROM `product_inches_tbl`";
        $proInchesResult = mysqli_query($conn, $proInches);	
		while($proInchesrRow = mysqli_fetch_assoc($proInchesResult)){
			if(isset($product_inches) && $product_inches == $proInchesrRow['inches_name']){
				
			}else{
				$inches .= '<option value="'.$proInchesrRow['inches_name'].'">'.$proInchesrRow['inches_name'].' Inches Fans</option>';
			}			
			
		}
		$types = '';
        $proTypes = "SELECT * FROM `product_type_tbl` WHERE `type_name` != '$product_type'";
        $proTypesResult = mysqli_query($conn, $proTypes);	
		while($proTypesrRow = mysqli_fetch_assoc($proTypesResult)){
			if(isset($product_type) && $product_type == $proTypesrRow['type_name']){
				
			}else{
				$types .= '<option value="'.$proTypesrRow['type_name'].'">'.$proTypesrRow['type_name'].'</option>';
			}			
			
		}
//deck-pedestal-fan-50inch
//deck-16inch-fan200535285.jpg
	//echo $query;
//var_dump($_POST);
//product_name products_details proPrice proQty isDisount discountRate proBrand proCategory proInches proType dispalyType saleType
    if(isset($_POST['page_id'],$_POST['past_feature_image'],$_POST['pageType'],$_POST['product_name'],$_FILES['upload_image']["name"],$_POST['products_details'],$_POST['proPrice'],$_POST['proQty'],$_POST['isDisount'],$_POST['discountRate'],$_POST['proBrand'],$_POST['proCategory'],$_POST['proInches'],$_POST['proType'],$_POST['dispalyType'],$_POST['saleType'])){  
  
      
        global $feature_image;
        $feature_image = $_SESSION['feature_image'];
        
        $pageType = $_POST['pageType'];
        $page_id = $_POST['page_id'];
        $past_feature_image = $_POST['past_feature_image'];
        $proName = $_POST['product_name'];
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
		
		if(isset($proCheckTitleRow['titleCheck']) && $proCheckTitleRow['titleCheck'] > 1){
			$checkTitle = $proCheckTitleRow['product_url'];
			$checkTitleArray = explode("-",$checkTitle);
			$titleCheckplus = $proCheckTitleRow['titleCheck'] + 1;
			
			$product_url = implode("-",$checkTitleArray).'-'.$titleCheckplus;

		}else{
			$product_url = ''.$post_title.'';
		}

        if($feature_image != ''){
          $feature_image = $feature_image;
        }else{
          $feature_image = $past_feature_image;
        }



        $query = "UPDATE `products_tbl` SET `product_name`='$proName',`product_price`='$proPrice',`product_qty`='$proQty',`is_discount`='$isDisount',`discount_rate`='$discountRate',
        `product_image`='$feature_image',`product_description`='$products_details',`product_brand`='$proBrand',`product_category`='$proCategory',`product_inches`='$proInches',`product_type`='$proType',`display_type`='$displayType',
        `sell_type`='$saleType',`product_url`='$product_url' WHERE `product_code` = '$page_id'";
        mysqli_query($conn, $query);

        //echo $query;

        echo '<script>window.location.href = "'.URL.'dashboard/editproduct/'.$eID.'";</script>';
    }

  ?>
  
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Content Row -->
<div class="row">
     <div class="col-lg-12 mb-4">
         <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
         <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
          </div>
          <form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" class="form-control capitalize" name="pageType" value="products" id="pageType">
          <input type="hidden" class="form-control capitalize" name="page_id" value="<?php echo $product_code;?>" id="page_id">
          <input type="hidden" class="form-control capitalize" name="product_url_old" value="<?php echo $product_url;?>" id="product_url_old">
          <input type="hidden" class="form-control capitalize" name="no_of_img" value="<?php echo $no_of_img;?>" id="no_of_img">
          <input type="hidden" class="form-control capitalize" name="past_feature_image" value="<?php echo $product_image;?>" id="past_feature_image">

             
              <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Product Name</label>
                    <input type="text" class="form-control capitalize" name="product_name" value="<?php echo $product_name;?>" placeholder="" required>
                  </div>                     
                </div>

                <div class="col-12 col-md-3 align-self-center">
                  <div class="form-group text-left">
                     <label class="font-weight-bold w-100 float-left uploadingIMG2 d-none">Feature Image Preview (upload file size is 600px X 300px)</label>
                     <img id="blah" src="<?php echo ''.URL.'assets/uploads/products/'.$product_image;?>" alt="your image" class="w-100 uploadingIMG shadow" align="center"/>
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
                  <input type="file" accept="image/*" name="upload_image" class="dropify" id="upload_image" aria-describedby="fileHelp">
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

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="font-weight-bold">Description</label>
                              <textarea rows="5" class="form-control products_details" name="products_details" id="products_details" required><?php echo $product_description;?></textarea>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Price</label>
                              <input class="form-control contact_number0000" type="number" value="<?php echo $product_price;?>" name="proPrice" min="1"required/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Qty</label>
                              <input class="form-control contact_number0000" type="number" value="<?php echo $product_qty;?>" name="proQty" min="1"/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Discount</label>
								<select class="form-control isdiscount" name="isDisount">
									<?php
										if(isset($is_discount) && $is_discount == 'no'){
											echo '<option value="no"> No </option>';
											echo '<option value="yes"> Yes </option>';											
										}else{
											echo '<option value="yes"> Yes </option>';
											echo '<option value="no"> No </option>';											
										}

									?>
								</select>							  
                            </div>                     
                          </div>   

                          <div class="col-md-6 mt-3">
                            <div class="form-group discount  <?php if(isset($is_discount) && $is_discount == 'no'){echo 'd-none';}else{echo 'd-block';}?>">
                              <label class="font-weight-bold">Discount Rate</label>
                              <input class="form-control contact_number0000" type="number" value="<?php echo $discount_rate;?>" name="discountRate" min="1" step="0.1"/>
                            </div>                     
                          </div>


                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Pro Brand</label>
								<select class="form-control" name="proBrand">
									<?php
										if(isset($product_brand) && $product_brand != ''){
											echo '<option value="'.$product_brand.'"> '.$product_brand.' </option>';
										}
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
										if(isset($product_category) && $product_category != ''){
											echo '<option value="'.$product_category.'"> '.$product_category.' </option>';
										}
										
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
										if(isset($product_inches) && $product_inches != ''){
											echo '<option value="'.$product_inches.'"> '.$product_inches.' Inches Fans</option>';
										}
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
										if(isset($product_type) && $product_type != ''){
											echo '<option value="'.$product_type.'"> '.$product_type.' </option>';
										}
										echo $types;
									?>
								</select>
                            </div>                        
                          </div> 

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Display Type</label>
								<select class="form-control" name="dispalyType">
									<?php
										if(isset($display_type) && $display_type == 'Normal'){
											echo '<option value="Normal"> Normal </option>';
											echo '<option value="Featured"> Featured </option>';
										}else{
											echo '<option value="Featured"> Featured </option>';
											echo '<option value="Normal"> Normal </option>';
										}
									?>
								</select>
                            </div>                        
                          </div> 

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Sale Type</label>
								<select class="form-control" name="saleType">
									<?php
										if(isset($sell_type) && $sell_type == 'Top'){
											echo '<option value="Top"> Top </option>';									
											echo '<option value="Best"> Best </option>';
										}else{
											echo '<option value="Best"> Best </option>';
											echo '<option value="Top"> Top </option>';
										}																		
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
                                    <input type="file"  name="multiple_files2" id="multiple_files2" multiple accept=".jpg, .png, .gif" class="dropify" aria-describedby="fileHelp">
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
                                          <span id="error_multiple_files"></span>
                                        </div>                                   
                          </div> 
                       </div>                           
                      <div class="col-md-12 mt-5">
                        <div id="images_list2"></div>
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
                          <a href="<?php echo URL;?>single/product/<?php echo $product_url;?>" class="btn btn-primary btn-icon-split float-right mr-2" target="_new">
                          <span class="icon text-white-50">
                            <i class="fas fa-eye"></i>
                            </span>
                          <span class="text">View</span></a>										
                      </div>	
        </div>
    </div>
    </form>
  </div>
</div>
</div>
</div> 


