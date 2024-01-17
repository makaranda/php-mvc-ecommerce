<?php
include("../../config/paths.php");
include("../../config/database.php");
/*$servername = "localhost";
$username = "root";
$password = "";
*/
global $today;
$today = date("Y-m-d");

try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }
if(isset($_POST["action"])){
	//$connect = new PDO("mysql:host=localhost;dbname:prakashDB","root","");
		$query = "";
		$output1 = '';
		//$page_type = $_POST["page_type"];
	//action:action,searchvalue:searchvalue,sort_ascdesc:sort_ascdesc,sort_district:sort_district,sort_province:sort_province,sort_diviSec:sort_diviSec	
		
		if(isset($_POST["action"])){
			$query = "SELECT * FROM `products_tbl` WHERE `id` >= '1' ";
		}
		
		/*if(isset($_POST['industry_type']) && $_POST['industry_type'] != ''){
			$industry_type = $_POST['industry_type'];
			$query .=" AND industry_type = '$industry_type'";			
		}		

		if(isset($_POST['advertisement_type']) && $_POST['advertisement_type'] != ''){
			$advertisement_type = $_POST['advertisement_type'];
			$query .=" AND advertisement_type = '$advertisement_type'";			
		}*/
		
		if(isset($_POST['sort_sex'])){
			$sort_sex = implode("','",$_POST['sort_sex']);
			$query .=" AND user_gender IN('$sort_sex')";			
		}
		if(isset($_POST['sort_job_main_cat'])){
			$sort_job_main_cat = implode("','",$_POST['sort_job_main_cat']);
			$query .=" AND user_job_main IN('$sort_job_main_cat')"; 
		}
		if(isset($_POST['sort_job_sub_cat'])){
			$sort_job_sub_cat = implode("','",$_POST['sort_job_sub_cat']);
			$query .=" AND user_job_designation IN('".$sort_job_sub_cat."')";			
		}

		if(isset($_POST['short_sub_cat']) && $_POST['short_sub_cat'] != ''){
			
			$short_sub_cat = $_POST['short_sub_cat'];
				
			$query .=" AND sub_cat_id = $short_sub_cat";	
			
		}

		if(isset($_POST['short_main_cat']) && $_POST['short_main_cat'] != ''){
			
			$short_main_cat = $_POST['short_main_cat'];
				
			$query .=" AND main_cat_id = $short_main_cat";	
			
		}

		if(isset($_POST['sort_province2']) && $_POST['sort_province2'] != '' && $_POST['sort_province'] == ''){
			$sort_province2 = $_POST['sort_province2'];
			
			$selectProvince2 = "SELECT id,post_province_name FROM post_province WHERE id = $sort_province2";
			$result2 = mysqli_query($conn, $selectProvince2);
			$row2 = mysqli_fetch_array($result2);
			
			$province2 = $row2['post_province_name'];
				
			$query .=" AND province = '$sort_province2'";
			
		}
		if(isset($_POST['sort_province']) && $_POST['sort_province'] != ''){
			$sort_province = $_POST['sort_province'];
			
			$selectProvince = "SELECT id,post_province_name FROM post_province WHERE id = $sort_province";
			$result = mysqli_query($conn, $selectProvince);
			$row = mysqli_fetch_array($result);
			
			//$_POST['sort_district2'] = '';	
			
			$province = $row['post_province_name'];
				
			$query .=" AND province = '$sort_province'";			
		}
		
		if(isset($_POST['sort_district']) && $_POST['sort_district'] != ''){
			$sort_district = $_POST['sort_district'];
			$sort_province = $_POST['sort_province'];
			
			$selectDistrict = "SELECT * FROM post_districs WHERE id = $sort_district";
			$result = mysqli_query($conn, $selectDistrict);
			$row = mysqli_fetch_array($result);
			
			$district = $row['district_name'];
			
			$query .=" AND district = '$sort_district'";			
		}


		if(isset($_POST['sort_district2']) && $_POST['sort_district2'] != '' && $_POST['sort_district'] == ''){
			$sort_district2 = $_POST['sort_district2'];
			//$sort_province = $_POST['sort_province'];
			
			$selectDistrict2 = "SELECT * FROM post_districs WHERE id = $sort_district2";
			$result2 = mysqli_query($conn, $selectDistrict2);
			$row2 = mysqli_fetch_array($result2);
			
			$district2 = $row2['district_name'];
			
			$query .=" AND district = '$sort_district2'";			
		}
				
		
		if(isset($_POST['sort_diviSec']) && $_POST['sort_diviSec'] != ''){
			$sort_diviSec = $_POST['sort_diviSec'];
			$sort_district = $_POST['sort_diviSec'];
		/*				
			$selectCity = "SELECT * FROM post_districs_city WHERE id = $sort_diviSec";
			$result = mysqli_query($conn, $selectCity);
			$row = mysqli_fetch_array($result);
			
			$diviSec = $row['post_city_name'];
		*/	
			$query .=" AND city = '$sort_diviSec'";			
		}
		
	
		if(isset($_POST['searchvalue']) && $_POST['searchvalue'] != ''){
			$searchvalue = $_POST['searchvalue'];
			
			$selectProvince2 = "SELECT id,post_province_name FROM post_province WHERE post_province_name LIKE '%$searchvalue%'";
			$result2 = mysqli_query($conn, $selectProvince2);
			$row2 = mysqli_fetch_array($result2);
			
			$provincesearch = $row2['id'];
			
			$selectDistrict = "SELECT id,district_name FROM post_districs WHERE district_name LIKE '%$searchvalue%'";
			$result3 = mysqli_query($conn, $selectDistrict);
			$row3 = mysqli_fetch_array($result3);
			
			$districtsearch = $row3['id'];
			
			$selectDistrictCity = "SELECT post_city_name FROM post_districs_city WHERE post_city_name LIKE '%$searchvalue%'";
			$result4 = mysqli_query($conn, $selectDistrictCity);
			$row4 = mysqli_fetch_array($result4);
				
			   
		}

		if(isset($_POST['minimum_price']) && isset($_POST['maximum_price']) && !empty($_POST['maximum_price'])){
				
			$usermaxPrice = $_POST['maximum_price'];
			
			if($_POST['minimum_price'] > 0){
				$userminPrice = $_POST['minimum_price'];
			}else{
				$userminPrice = 0;
			}
			//$userminage = date('Y-m-d H:i:s', strtotime($today . ' - '.$userminage.' days'));
			//$usermaxage = date('Y-m-d H:i:s', strtotime($today . ' - '.$usermaxage.' days'));		
			
			
			$query .= " AND (pages_tbl.price BETWEEN $userminPrice AND $usermaxPrice)";		
		}else{
			$userminPrice = 0;	
			$usermaxPrice = 900000000;
			
			//$query .= " AND (products_price BETWEEN $userminPrice AND $usermaxPrice)";
		}	

/*		$query2 = '';
		if(isset($_POST['brands']) && $_POST['brands'] != ''){
			$brands = $_POST['brands'];
			$brandsarray = explode(',',$brands);
			
			$arrayCount = count($brandsarray);
			$arrayCountLast = array_key_last(array $brandsarray);
			
			for($x=0;$x <= $arrayCount;$x++){
				
				if($arrayCount == 1 && $arrayCountLast > 1){
					$query2 .=" product_brand LIKE '%$brandsarray[$x]%'";
				}else{
					if($arrayCountLast != ''){
						$query2 .=" product_brand LIKE '%$brandsarray[$x]%'";
					}else{
						$query2 .=" product_brand LIKE '%$brandsarray[$x]%' OR";
					}
					
				}
				
			}
			
			$output1 .= $arrayCountLast;
		
		}
*/		
		if(isset($_POST['min_price'],$_POST['max_price']) && $_POST['min_price'] != '' && $_POST['max_price'] != ''){
			$min_price = $_POST['min_price'];
			$max_price = $_POST['max_price'];
			$query .=" AND product_price BETWEEN $min_price AND $max_price";			
		}
		/*if(isset($_POST['max_price']) && $_POST['max_price'] != ''){
			$min_price = $_POST['min_price'];
			$max_price = $_POST['max_price'];
			$query .=" AND product_price BETWEEN '$min_price' AND '$max_price'";			
		}*/
	
		if(isset($_POST['brands']) && $_POST['brands'] != ''){
			$brands = $_POST['brands'];
			$query .=" AND product_brand = '$brands'";			
		}
	
		if(isset($_POST['category']) && $_POST['category'] != ''){
			$category = $_POST['category'];
			$query .=" AND product_category = '$category'";			
		}
	
		if(isset($_POST['inches']) && $_POST['inches'] != ''){
			$inches = $_POST['inches'];
			$query .=" AND product_inches = '$inches'";			
		}
	
		if(isset($_POST['protype']) && $_POST['protype'] != ''){
			$protype = $_POST['protype'];
			$query .=" AND product_type = '$protype'";			
		}	
		
		if(isset($_POST['shorting']) && $_POST['shorting'] != ''){
			$shorting = $_POST['shorting'];
			$query .=" ORDER BY product_price $shorting";			
		}else{
			$query .=" ORDER BY product_price desc";
		}
		
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$total_row = $statement->rowCount();
		$output = '';
		$output2 = '';
		
		//$result = mysqli_query($conn, $query);
		
		//if (mysqli_num_rows($result) > 0) {

		
		if($total_row > 0){
			
		$output .= '<div class="row justify-content-center shop_data">';
		$output2 .= '<div class="row justify-content-center shop_data2">';	
		
		foreach($result as $row){		
//`page_id`, `page_type`, `gallery_id`, `title`, `description`, `duration`, `start_date`, `expire_date`, `feature_image`, `feature_on_home`, `phone_number1`, `phone_number2`, `website`, `email_address`, `longitude`, `latitude`, `location_address`, `country`, `province`, `district`, `city`, `price`, `date_time` 		
		/*while($row = mysqli_fetch_assoc($result)) {*/
			$adid = $row["id"];
			$product_code = $row["product_code"];
			$product_image = $row["product_image"];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_qty = $row["product_qty"];
			$product_url = $row["product_url"];
			//$page_type = $row["page_type"];
			//$gallery_id = $row["gallery_id"];

			
			if(isset($row["advertisement_image"]) && $row["advertisement_image"] != ''){
				$image_no1 = $row["advertisement_image"];
			}else{
				$image_no1 = 'sample.jpg';
			}
			 if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
				 $caption = '<span class="off">'.$row['discount_rate'].'% Off</span>';
			}else{
				$caption = '';
			}
			
			if(isset($row['is_discount']) && $row['is_discount'] == 'yes'){
				$discountPrice = ($row['discount_rate'] / 100);
				$discountPrice = $row['product_price'] * $discountPrice;
				$discountPrice = $row['product_price'] - $discountPrice;
				$discount_label =  '<del class="off">RS '.$row['product_price'].'</del>';
				$product_price_new = round($discountPrice);
				$product_price_label =  '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.round($discountPrice).'</span></span>';
			}else{
				$discount_label = '';
				$product_price_label = '<span class="price"><i class="fa fa-eur d-none"></i>RS <span>'.$row['product_price'].'</span></span>';
				$product_price_new = $product_price;
			}			
			
		if(isset($product_qty) && $product_qty != '' && $product_qty != '0'){
			
		$output .='<div class="col-12 col-sm-6 col-md-4 col-lg-4 mt-2 mb-2">
					<input type="hidden" value="'.$product_price_new.'" id="price'.$product_code.'"/>
					<input type="hidden" value="1" id="quantity'.$product_code.'"/>
					<input type="hidden" value="'.$product_name.'" id="name'.$product_code.'"/>
					<div class="row justify-content-center p-1 m-2 shadow">
						<div class="col-12 col-md-12 shop_image">
							<img width="100%" height="auto" src="'.URL.'assets/uploads/products/'.$product_image.'" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
							<span class="product_message"><a class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
						</div>								
						<div class="col-12 col-md-12">
							<h2 class="product_title">'.$product_name.'</h2>
						</div>
						<div class="col-12 col-md-12">
							<span class="price">
								<span class="price_amount">
									<del class="off w-100 text-danger">Rs '.$discount_label.'</del>
									<span class="price price_amount w-100">
									<i class="fa fa-eur d-none"></i>
									Rs <span>'.$product_price_label.'</span>
									</span>								
								</span>
							</span>							
						</div>							
						<div class="col-12 col-md-12 text-center" align="center">
						  <center>
							<a data-quantity="1" value="'.$product_code.'" id="'.$product_code.'" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="Add “Ambewela Uht Milk L” to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
							<a href="'.URL.'single/shop/'.$product_url.'" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
						  </center>	
						</div>								
					</div>
					
				</div>	
		    ';
			
			$output2 .='<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2 mb-2 ">
					<input type="hidden" value="'.$product_price_new.'" id="price'.$product_code.'"/>
					<input type="hidden" value="1" id="quantity'.$product_code.'"/>
					<input type="hidden" value="'.$product_name.'" id="name'.$product_code.'"/>			
					<div class="row justify-content-center p-1 m-2 shadow">
						<div class="col-12 col-md-4 shop_image p-1 mt-1">
							<img width="100" height="auto" src="'.URL.'assets/uploads/products/'.$product_image.'" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
							<span class="product_message"><a class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
						</div>								
						<div class="col-12 col-md-8">
							<div class="row justify-content-center">
								<div class="col-12 col-md-12 text-left" align="center">
									<h2 class="product_title">'.$product_name.'</h2>
								</div>
								<div class="col-12 col-md-12 text-left">
									<span class="price">
										<span class="price_amount">
											<del class="off w-100 text-danger">Rs '.$discount_label.'</del>
											<span class="price price_amount w-100">
											<i class="fa fa-eur d-none"></i>
											Rs <span>'.$product_price_label.'</span>
											</span>								
										</span>
									</span>							
								</div>	
								<div class="col-12 col-md-12 text-left" align="center">
								  <center>
									<a data-quantity="1" value="'.$product_code.'" id="'.$product_code.'" class="cursor-pointer button add_to_cart" data-product_id="1102" data-product_sku="" aria-label="'.$product_name.' Add to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
									<a href="'.URL.'single/shop/'.$product_url.'" class="cursor-pointer show_product" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i></a>
								  </center>	
								</div>
							</div>
						</div>
					</div>	
				</div>		
						';
		}else{
		$output .='<div class="col-12 col-md-3">
					<div class="mt-product2 large bg-grey">									
						<div class="box">
							<span class="caption">
								<span class="off bg-danger text-white">Out of Stock</span>
							</span>
							<a href="'.URL.'single/shop/'.$product_url.'"><img src="'.URL.'assets/uploads/products/'.$product_image.'" alt="image description"></a>
							<ul class="mt-stars">
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star-o"></i></li>
							</ul>
						</div>
						<div class="txt">
							<strong class="title"><a href="'.URL.'single/shop/'.$product_url.'">'.$product_name.'</a></strong>
							<span class="price"><i class="fa fa-eur d-none"></i>RS <span> '.$product_price.'</span></span>
						</div>
					</div>
				</div>	</div>
		    ';			
		}	

		}
		  $output .= '</div>';
		  $output2 .= '</div>';
			
		  $output .= '<script>$(".shop_data").paginathing({
		  perPage: 9,
		  limitPagination:4,
		  containerClass: "panel-footer justify-content-center text-center",
		  pageNumbers: false

		});</script>';
			
		  $output2 .= '<script>$(".shop_data2").paginathing({
		  perPage: 15,
		  limitPagination:4,
		  containerClass: "panel-footer justify-content-center text-center",
		  pageNumbers: false

		});</script>';
			
		  $output .= '  <script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".mainImages"), {
		max: 25,
		speed: 400,
		transition:true,
		perspective:1000,
		scale:1,
		gyroscope: true,
		easing:"cubic-bezier(.03,.98,.52,.99)"
	});
	
</script>';
		
			$output .= '<script>$(".singleAd").on("click",function(){
			var dataId = $(this).attr("data-id");
			//alert(dataId);
			window.location.href = "'.URL.'ad/"+dataId+"52qwS"; 
		});</script>';		
		
					} else {
						$output = '<div class="col-12 alert alert-danger alert-dismissible fade show pt-2 pb-2" role="alert">
									  <strong></strong> We have not found related to your search...!!
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>';
						$output2 = '<div class="col-12 alert alert-danger alert-dismissible fade show pt-2 pb-2" role="alert">
									  <strong></strong> We have not found related to your search...!!
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>';
					
            	/*	$output .='	
            				<div class="select-ad singleAd">		
            				<div class="row p-3 m-2 normal-ads">
            				<div class="col-12 col-sm-12 col-md-12 col-lg-11">
            					<div class="row">
            						<div class="col-12 col-sm-4 text-center col-md-4 col-lg-4">
            							<img class="ads-img" src="'.$websiteurl.'/uploads/post/sample.jpg" />
            						</div>
            						<div class="col-12 col-sm-8 col-md-8 col-lg-8">
            							<h5 class="ads-list-main-topic">Normal Ad Title</h5>						
            							<p class="ads-list-main-company mb-0">Make your advertisement a Normal ad in this listing ....!</p>						
            						</div>
            					</div>
            				</div>
            				</div>	
            			</div>
            			
            		    ';	
            		    */
					}	
			//echo $output;			

//echo $query;
//echo '<br>';
$data = array(
 'grid'  => $output,
 'list'  => $output2
); 

echo json_encode($data);
}else{
	
	echo 'Not a Data';
}












