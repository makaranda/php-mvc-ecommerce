<?php
	include('libs/connection.php');
	
    $pageName = explode('/',$_GET['url']);
    $pageName = $pageName[0];	
	
    $selectSQL = "SELECT * FROM `pages_tbl` WHERE `page_type` = '$pageName'";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);	
    
    if(isset($row['page_description']) && $row['page_description'] != ''){
        $page_description = $row['page_description'];
    }else{
        $page_description = '';
    }
    //unset($_SESSION["wish_list_cart"]);
	//var_dump($_SESSION["wish_list_cart"]);
?>

 <div class="col-12 col-sm-10 col-md-10 mt-5">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb bg-transparent">
				<li class="breadcrumb-item"><a href="<?php echo '';?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Wishlist</li>
			  </ol>
			</nav>
		</div>
		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12">
					<h2>Wishlist</h2>
				</div>
			<!--	<div class="col-12 col-sm-12 col-md-12">
					<div class="table-responsive">
					  <table class="table table-sm">
						<thead>
							<tr>
							  <th scope="col"></th>
							  <th scope="col" class="text-center">Product name</th>
							  <th scope="col" class="text-center">Unit price</th>
							  <th scope="col" class="text-center">Stock status</th>
							  <th scope="col"></th>
							</tr>
						 </thead>
						 <tbody>
							<tr>
							  <td scope="row" class="table-padding-4"><a href="" class="remove remove_from_wishlist" title="Remove this product"></a></td>
							  <td><img width="75" height="auto" src="assets/uploads/products/Pic13697-300x300.jpg" class="cursor-pointer hvr-pulse" alt="" loading="lazy"> Ambewela Uht Milk L</td>
							  <td class="table-padding-4 text-center">රු260.00</td>
							  <td class="table-padding-4 text-center"><span class="wishlist-in-stock">In Stock</span></td>
							  <td class="table-padding-4"><a href="" class="btn view_more">Add to Cart</a></td>
							</tr>
						 </tbody>						
					  </table>
					</div>
				</div> -->
				<div class="col-12 col-sm-12 col-md-12">
					<div class="row border cartheader">
					  <div class="col-12 col-sm-1">
						<strong class="title"></strong>
					  </div>
					  <div class="col-12 col-sm-2">
						<strong class="title">PRODUCT</strong>
					  </div>
					  <div class="col-12 col-sm-2">
						<strong class="title">PRODUCT NAME</strong>
					  </div>
					  <div class="col-12 col-sm-2">
						<strong class="title">PRICE</strong>
					  </div>
					  <div class="col-12 col-sm-2">
						<strong class="title">STOCK STATUS</strong>
					  </div>
					  <div class="col-12 col-sm-3">
						<strong class="title"></strong>
					  </div>
					</div>
				</div>		
				<div id="whish_list_page"></div>
			</div>
							
		</div>
	</div>		
</div>
