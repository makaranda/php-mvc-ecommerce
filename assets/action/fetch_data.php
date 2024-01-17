<?php
include("../../config/paths.php");
include("../../config/database.php");
/*$servername = "localhost";
$username = "root";
$password = "";
*/
$output01 = '';
$output02 = '';
global $output;
global $output2;
global $today;
$today = date("Y-m-d");
//$_POST["action"] = 'ok';
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
		$output = '';
		$output1 = '';
		//$page_type = $_POST["page_type"];
	//action:action,searchvalue:searchvalue,sort_ascdesc:sort_ascdesc,sort_district:sort_district,sort_province:sort_province,sort_diviSec:sort_diviSec	
		
		if(isset($_POST["action"])){
			$query = "SELECT * FROM `products_tbl` WHERE `id` >= '1' ";
		}
				
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
			
			$query .= " AND (pages_tbl.price BETWEEN $userminPrice AND $usermaxPrice)";		
		}else{
			$userminPrice = 0;	
			$usermaxPrice = 900000000;
			
		}	

	
		if(isset($_POST['min_price'],$_POST['max_price']) && $_POST['min_price'] != '' && $_POST['max_price'] != ''){
			$min_price = $_POST['min_price'];
			$max_price = $_POST['max_price'];
			$query .=" AND pro_unit_price BETWEEN $min_price AND $max_price";			
		}
		/*if(isset($_POST['max_price']) && $_POST['max_price'] != ''){
			$min_price = $_POST['min_price'];
			$max_price = $_POST['max_price'];
			$query .=" AND pro_unit_price BETWEEN '$min_price' AND '$max_price'";			
		}*/
	
		if(isset($_POST['brands']) && $_POST['brands'] != ''){
			$brands = $_POST['brands'];
			$query .=" AND pro_brand = '$brands'";			
		}
	
		if(isset($_POST['category']) && $_POST['category'] != ''){
			$category = ucwords(str_replace('-',' ',$_POST['category']));
			$query .=" AND pro_category = '$category'";			
		}
	/*
		if(isset($_POST['inches']) && $_POST['inches'] != ''){
			$inches = $_POST['inches'];
			$query .=" AND product_inches = '$inches'";			
		}
	*/
		if(isset($_POST['protype']) && $_POST['protype'] != ''){
			$protype = $_POST['protype'];
			$query .=" AND pro_type = '$protype'";			
		}
	
		if(isset($_POST['pro_tags']) && $_POST['pro_tags'] != ''){
			$pro_tags = $_POST['pro_tags'];
			$query .=" AND products_tags LIKE '%".$pro_tags."%'";			
		}	
		
		if(isset($_POST['shorting']) && $_POST['shorting'] != ''){
			$shorting = $_POST['shorting'];
			$query .=" ORDER BY pro_unit_price $shorting";			
		}else{
			$query .=" ORDER BY pro_unit_price desc LIMIT 100";
		}
		
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$total_row = $statement->rowCount();

		
		$paging_row = 4;
		
		if($total_row > 0){
			if(isset($total_row) && $total_row <= 9){
				$paging_row = 1;
			}else if(isset($total_row) && $total_row > 9 && $total_row <= 18){
				$paging_row = 2;
			}else if(isset($total_row) && $total_row > 18 && $total_row <= 27){
				$paging_row = 3;
			}else{
				$paging_row = 4;
			}
			
		$output .= '<div class="col-12 col-md-12"><div class="row justify-content-center shop_data">';
		$output2 .= '<div class="row justify-content-center shop_data2">';	
		
		foreach($result as $row){		

//`pro_code`, `pro_name`, `pro_category`, `pro_type`, `pro_brand`, `pro_branch`, `pro_cost_price`, `pro_unit_price`, `pro_discount`, `pro_qty`, `display_type`, `sell_type`, `products_tags`, `product_url`, `status`, `pro_date` 
			$adid = $row["id"];
			$product_code = $row["pro_code"];
			$pro_image = $row["pro_image"];
			$product_name = $row["pro_name"];
			$pro_unit_price = $row["pro_unit_price"];
			$product_qty = $row["pro_qty"];
			$product_url = $row["product_url"];
			
			if(empty($pro_image)){
				$pro_image = 'sample_image.jpg';
			}else{
				$pro_image = $pro_image;
			}

			if(!empty($product_qty) && $product_qty >= 1){
				$is_stock = 'stock_available';
			}else{
				$is_stock = 'stock_not_available';
			}
			
			$product_code_id = $product_code.''.$adid;
			
			$stock_qty = $product_qty;			

$output01 .= 'Test';
$output02 .= 'Test 2';
			
			if(isset($row["pro_image"]) && $row["pro_image"] != ''){
				$image_no1 = $row["pro_image"];
			}else{
				$image_no1 = 'sample.jpg';
			}
			 if(isset($row['pro_discount']) && $row['pro_discount'] != ''){
				 $caption = '<span class="off">'.$row['pro_discount'].'% Off</span>';
			}else{
				$caption = '';
			}
			
			if(!empty($row['pro_discount'])){
				//$discountPrice = (((int)$row['pro_discount']) / 100);
				$discountPrice = (int)$row['pro_discount'];
				//$discountPrice = $row['pro_unit_price'] * $discountPrice;
				$discountPrice = (int)$row['pro_unit_price'] - $discountPrice;
				$discount_label =  '<del class="off">Rs '.$row['pro_unit_price'].'</del>';
				$pro_unit_price_new = round($discountPrice);
								
				if(!empty($row['pro_unit_price'])){
					$discount_label =  '<del class="off">Rs '.round($row['pro_unit_price']).'</del>';
				}else{
					$discount_label =  '';
				}
				
				if(!empty($row['pro_unit_price'])){
					$pro_unit_price_label =  '<span class="price">Rs <i class="fa fa-eur d-none"></i><span>'.round($discountPrice).'</span></span>';
				}else{
					$pro_unit_price_label =  '';
				}
			}else{
				$discount_label = '';				
				$pro_unit_price_new = $pro_unit_price;
				
				if(!empty($row['pro_unit_price'])){
					$pro_unit_price_label = '<span class="price">Rs <i class="fa fa-eur d-none"></i><span>'.round($row['pro_unit_price']).'</span></span>';
				}else{
					$pro_unit_price_label =  '';
				}
			}			
			
		if(isset($product_qty) && $product_qty != '' && $product_qty != '0'){
			
		$output .='<div class="col-12 col-sm-6 col-md-4 col-lg-4 mt-2 mb-2">
					<div class="row justify-content-center p-1 m-2 shadow">
						<div class="col-12 col-md-12 shop_image">
							<img width="100%" height="auto" src="'.URL.'assets/uploads/products/'.$pro_image.'" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
							<span class="product_message"><a data-quantity="1" value="'.$product_code.'" id="'.$product_code.'" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
						</div>								
						<div class="col-12 col-md-12">
							<h2 class="product_title">'.$product_name.'</h2>
						</div>
						<div class="col-12 col-md-12">
							<span class="price">
								<span class="price_amount">
									<del class="off w-100 text-danger">'.$discount_label.'</del>
									<span class="price price_amount w-100">
									<i class="fa fa-eur d-none"></i>
									   <span>'.$pro_unit_price_label.'</span>
									</span>								
								</span>
							</span>							
						</div>							
						<div class="col-12 col-md-12 text-center" align="center">
						  <center>
							<a data-quantity="1" class="cursor-pointer button add_to_cart_home btn btn-warning" data-product_id="'.$adid.'" data-product-price="'.$pro_unit_price.'" data-product-name="'.$product_name.'" data-product-stock="'.$is_stock.'" data-stock-qty="'.$stock_qty.'" data-product-qty="1" to your cart" rel="nofollow"><i class="icofont-cart"></i> Add to cart</a>
							<a href="'.URL.'single/shop/'.$product_url.'" class="cursor-pointer show_product btn btn-primary" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i> View</a>
						  </center>	
						</div>								
					</div>
					
				</div>	
		    ';
			
		}else{
$output .='<div class="col-12 col-sm-6 col-md-4 col-lg-4 mt-2 mb-2">
					<div class="row justify-content-center p-1 m-2 shadow">
						<div class="col-12 col-md-12 shop_image">
							<img width="100%" height="auto" src="'.URL.'assets/uploads/products/'.$pro_image.'" class="cursor-pointer hvr-pulse" alt="" loading="lazy">
							<span class="product_message"><a data-quantity="1" value="'.$product_code.'" id="'.$product_code.'" data-product_id="1102" class="cursor-pointer add_whish_list"><i class="yith-wcwl-icon fa fa-heart-o"></i></a></span>
						</div>								
						<div class="col-12 col-md-12">
							<h2 class="product_title">'.$product_name.'</h2>
							
							<div class="caption mt-2 mb-2">
								<span class="off bg-danger text-white outofstocklabel">Out of Stock</span>
							</div>
						</div>							
						<div class="col-12 col-md-12 text-center" align="center">
						  <center>
							<a href="'.URL.'single/shop/'.$product_url.'" class="cursor-pointer show_product btn btn-warning" data-product_id="1102" rel="nofollow"><i class="icofont-eye-alt"></i> View</a>
						  </center>	
						</div>								
					</div>
					
				</div>	
		    ';			
			/*$output .='<div class="col-12 col-md-3">
						<div class="mt-product2 large bg-grey">									
							<div class="box">
								<span class="caption">
									<span class="off bg-danger text-white">Out of Stock</span>
								</span>
								<a href="'.URL.'single/shop/'.$product_url.'"><img src="'.URL.'assets/uploads/products/'.$pro_image.'" alt="image description"></a>
								<ul class="mt-stars">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star-o"></i></li>
								</ul>
							</div>
							<div class="txt">
								<strong class="title"><a href="'.URL.'single/shop/'.$product_url.'">'.$product_name.'</a></strong>
								<span class="price"><i class="fa fa-eur d-none"></i>RS <span> '.$pro_unit_price.'</span></span>
							</div>
						</div>
					</div>	</div>
				';*/
				
		}	

		}
		  

		
		  $output .= '</div></div>';		
			
		  $output .= '<script>$(".shop_data").paginathing({
		  perPage: 9,
		  limitPagination: '.$paging_row.',
		  containerClass: "panel-footer justify-content-center text-center mt-4 mb-4",
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
						$output .= '<div class="col-12 alert alert-danger alert-dismissible fade show pt-2 pb-2" role="alert">
									  <strong></strong> We have not found related to your search...!!
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>';
					

					}	
				


$data = array(
 'grid'  => $output,
 'list'  => $output2
); 
	


}else{
	
    $data = array(
     'grid'  => 'Empty grid Data',
     'list'  => 'Empty list Data'
    );
}
//var_dump($_POST);

echo $output;
//echo $query;








