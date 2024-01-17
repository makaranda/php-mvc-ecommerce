<?php
include('libs/connection.php');
	global $singlepage;
	global $mainTopic; 
	global $totalItems;
    $allURL = explode('/',$_GET['url']);
	
	if(isset($allURL[1]) && $allURL[1] != '' && $allURL[1] != 'protype'){
		$catDisplay = 'd-none';
		$catName = ucwords(str_replace('-',' ',$allURL[1]));
	}else{
		$catDisplay = '';
		$catName = '';
	}
	if(isset($allURL[2]) && $allURL[2] != '' && $allURL[1] != 'protype'){
		$inchDisplay = 'd-none';
		$inchName = $allURL[2];
	}else{
		$inchDisplay = '';
		$inchName = '';
	}
	
	if(isset($allURL[2]) && $allURL[2] != '' && $allURL[1] == 'protype'){
		$protype = ucwords(str_replace('-',' ',$allURL[2]));
	}else{
		$protype = '';
	}
	
	
	
        $proCount = "SELECT COUNT(*) AS totalItems FROM `products_tbl`";
        $proCountResult = mysqli_query($conn, $proCount);	
		$proCountRow = mysqli_fetch_assoc($proCountResult);
		$totalItems = $proCountRow['totalItems'];
			
	
		$brands = '';
        $proBrand = "SELECT * FROM `brands_tbl`";
        $proBrandResult = mysqli_query($conn, $proBrand);	
		while($proBrandrRow = mysqli_fetch_assoc($proBrandResult)){
			$brands .= '<option value="'.$proBrandrRow['brand_name'].'">'.$proBrandrRow['brand_name'].'</option>';
		}
		
		$category = '';
        $proCategory = "SELECT * FROM `categories_tbl`";
        $proCategoryResult = mysqli_query($conn, $proCategory);	
			if(isset($catName) && $catName != ''){
				$category .= '<option value="'.$catName.'">'.$catName.'</option>';
			}
		while($proCategoryrRow = mysqli_fetch_assoc($proCategoryResult)){
			
			//$category .= '<option value="'.$catName.'">'.$catName.'</option>';

			if($catName == $proCategoryrRow['category_name']){
				
			}else{
				$category .= '<option value="'.$proCategoryrRow['category_name'].'">'.$proCategoryrRow['category_name'].'</option>';
			}
			
		}
		
		$inches = '';
        $proInches = "SELECT * FROM `product_inches_tbl`";
        $proInchesResult = mysqli_query($conn, $proInches);	
			if(isset($inchName) && $inchName != ''){
				$inches .= '<option value="'.$inchName.'">'.$inchName.' Inches Fans</option>';
			}		
		while($proInchesrRow = mysqli_fetch_assoc($proInchesResult)){
			//$inches .= '<option value="'.$proInchesrRow['inches_name'].'">'.$proInchesrRow['inches_name'].' Inches Fans</option>';

			if($inchName == $proInchesrRow['inches_name']){
				
			}else{
				$inches .= '<option value="'.$proInchesrRow['inches_name'].'">'.$proInchesrRow['inches_name'].' Inches Fans</option>';
			}			
		}
		
		$types = '';
        $proTypes = "SELECT * FROM `product_type_tbl`";
        $proTypesResult = mysqli_query($conn, $proTypes);
			if(isset($protype) && $protype != ''){
				$types .= '<option value="'.$protype.'">'.$protype.'</option>';
			}		
		while($proTypesrRow = mysqli_fetch_assoc($proTypesResult)){
			if($protype == $proTypesrRow['type_name']){
				
			}else{
				$types .= '<option value="'.$proTypesrRow['type_name'].'">'.$proTypesrRow['type_name'].'</option>';
			}
			
		}		
?>

			<input type="hidden" id="province" value="">
			<input type="hidden" id="district" value=""> 
			<input type="hidden" id="cat_val" value=""> 
			<input type="hidden" id="pro_tags" value=""> 
			
			<input type="hidden" id="catName" value="<?php echo $catName;?>"> 
			<input type="hidden" id="inchName" value="<?php echo $inchName;?>"> 
			<input type="hidden" id="protype" value="<?php echo $protype;?>"> 



 <div class="col-sm-12 col-md-12 pl-0 pr-0">
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Kids Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo URL;?>">Home</a>
                            <span>Kids Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </div>   
   
    <div class="col-sm-12 col-md-12">
		<div class="row justify-content-center">
		<!--
			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
				<div class="row justify-content-center">	
					<div class="col-12 col-sm-12 col-md-12">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb bg-transparent">
							<li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shop</li>
						  </ol>
						</nav>
					</div>
				</div>		
				<h3 class="et_pb_text_4"><strong>Shop</strong></h3>
			</div>
			-->
			<div class="col-sm-10 col-md-10 text-left align-self-center mt-4">
			<input type="hidden" value="0" id="hidden_minimun_price"/>
			<input type="hidden" value="10000" id="hidden_maximum_price"/>
				<div class="row justify-content-center">
					<div class="col-12 col-sm-3 col-md-3">
						<div class="row justify-content-center">
							<div class="col-12 col-sm-12 col-md-12 mb-4">
								<h4 class="widgettitle">Product categories</h4>
							</div>

							<div class="col-12 col-sm-12 col-md-12">
								<ul class="product-categories pl-0 text-decoration-none">
								<?php
									$selectSQL = "SELECT * FROM `categories_tbl` ORDER BY `category_name` ASC";
									$result = mysqli_query($conn, $selectSQL);	
										
									while($row = mysqli_fetch_assoc($result)){
										$category_name = $row['category_name'];	
										$selectSQL2 = "SELECT COUNT(*) AS ads_count FROM `products_tbl` WHERE `pro_category` = '$category_name'";
										$result2 = mysqli_query($conn, $selectSQL2);
										$row2 = mysqli_fetch_assoc($result2);
										$ads_count = $row2['ads_count'];
								?>								
								
									<li class="cat-item"><button type="button" value="<?php echo $row['category_link_name'];?>" class="main_category btn btn-link"><?php echo $row['category_name'];?></button> <span class="count">(<?php echo $ads_count;?>)</span></li>
								<?php
									}
								?>	
									
								</ul>
							</div>
							
							<div class="col-12 col-sm-12 col-md-12 mt-4 mb-4">
								<h4 class="widgettitle">FILTER BY PRICE</h4>
							</div>
							<div class="col-12 col-sm-12 col-md-12">
								<div id="slider-range" class="price-filter-range" name="rangeInput"></div>

								<div style="margin:30px auto">
								  <input type="number" value="0" min=0 max="99990" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
								  <input type="number" value="10000" min=0 max="100000" oninput="validity.valid||(value='100000');" id="max_price" class="price-range-field" />
								</div>

								<!--<button class="price-range-search" id="price-range-submit">Search</button>-->

								<!--<div id="searchResults" class="search-results-block"></div>-->
							</div>

							<div class="col-12 col-sm-12 col-md-12 mt-4 mb-4">
								<h4 class="widgettitle">PRODUCT TAGS</h4>
							</div>	

							<div class="col-12 col-sm-12 col-md-12">
								<ul class="list-unstyled tabs">
								<?php
									$selectSQL = "SELECT * FROM `product_tags_tbl` ORDER BY `tag_name` ASC";
									$result = mysqli_query($conn, $selectSQL);	
										
									while($row = mysqli_fetch_assoc($result)){
										$tag_name = $row['tag_name'];
										$tag_link_name = $row['tag_link_name'];	
								?>								
								
									<li><a class="pro_tags" id="<?php echo $tag_link_name;?>"><?php echo $tag_name;?></a></li>
								<?php
									}
								?>						
								</ul>
							</div>							
						</div>
					</div>
					<div class="col-12 col-sm-9 col-md-9">
						<div class="row justify-content-center">
							<div class="col-sm-12 col-md-12 text-center align-self-center mt-4 Featured_ul shop_list">
							    <div class="row">
							        <div class="col-6 col-md-6">
        								<!--<ul class="nav nav-tabs" id="myTab" role="tablist">
        								  <li class="nav-item mr-0 pr-0">
        									<a class="nav-link active change-view display-mode-btn list mr-0 pr-0" id="grid-view" data-toggle="tab" href="#grid" role="tab" aria-controls="home" aria-selected="true"><i class="icon-grid icons"></i></a>
        								  </li>
        								  <li class="nav-item ml-0 pl-0">
        									<a class="nav-link change-view display-mode-btn list ml-0 pl-0" id="list-view" data-toggle="tab" href="#list" role="tab" aria-controls="profile" aria-selected="false"><i class="icon-list icons"></i></a>
        								  </li>
        								</ul>-->
        							</div>	
        							<div class="col-6 col-md-6">
        							    <span>shorting</span>	
            							<select id="shorting">
            							    <option value="ASC">Accending</option>
            							    <option value="DESC">Deccending</option>
            							</select>  
        							</div>	
								</div>
								<div class="row justify-content-center filter_data mt-4">							
																
								</div>
								<!--<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-view">
									<div class="row justify-content-center filter_data">							
																
									</div>
								  </div>
								  <div class="tab-pane fade filter_data2" id="list" role="tabpanel" aria-labelledby="list-view">
																				  
								  </div>
							  </div>-->				  
						   </div>
						</div>
					
					</div>
				  </div>
			</div>	
				<div class="col-sm-10 col-md-10 text-center align-self-center mt-4 d-none">
					<nav aria-label="Page navigation example">
					  <ul class="pagination justify-content-center">
						<li class="page-item disabled">
						  <a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
						  <a class="page-link" href="#">Next</a>
						</li>
					  </ul>
					</nav>
				</div>
		</div>	
	</div>
	

		
	

			
			