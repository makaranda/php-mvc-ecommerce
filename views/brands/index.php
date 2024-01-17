<?php
    include('libs/connection.php');
    $date_time = date('Y-m-d H:i:s');

    //$deleteTable = "TRUNbrandE TABLE gallery_temp_tbl";
    //mysqli_query($conn, $deleteTable);
if(isset($_POST['brandId']) && isset($_POST['brand_name'])){
	//$updateDistrict = "UPDATE `brands_tbl` SET `id`='',`brand_name`='' WHERE `id` = ";
	$brandId = $_POST['brandId'];
	$brand_name = $_POST['brand_name'];
	
	$updateDistrict = "UPDATE `brands_tbl` SET `brand_name`='$brand_name' WHERE `id`= $brandId";
	mysqli_query($conn, $updateDistrict);
	
	echo '<script>window.lobrandion.href = "'.URL.'dashboard/brands";</script>';
	
}elseif(isset($_POST['brand_name_new'])){
	
	$brand_name_new = $_POST['brand_name_new'];
	
	$insertSQL = "INSERT INTO `brands_tbl`(`id`, `brand_name`) VALUES ('$post_distric_new','$brand_name_new')";
	mysqli_query($conn, $insertSQL);

	echo '<script>window.lobrandion.href = "'.URL.'dashboard/brands";</script>';
	  
}elseif(isset($_POST['post_brand_delete'],$_POST['brandId']) && $_POST['post_brand_delete'] == 'deleteBrand'){
    $brandDeleteId = $_POST['brandId'];
    $deleteSQL = "DELETE FROM `brands_tbl` WHERE `id` = $brandDeleteId";
	mysqli_query($conn, $deleteSQL);    

	echo '<script>window.lobrandion.href = "'.URL.'dashboard/brands";</script>';    
}

?>
  
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <span id=""></span>
    <!-- Content Row -->
    <div class="row">
         <div class="col-lg-12 mb-4">
             <div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					  <h6 class="m-0 font-weight-bold text-primary">Brands</h6>
					</a>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
					  <div class="card-body">
             <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary"></h6>
							</div>
                                <div class="container ">    
 							        <div class="row justify-content-center">
									<div class="col-md-11 col-11 border border-danger rounded p-3 m-3">
										<form action="" method="POST">
											<div class="row">
												<div class="col-md-12">
												  <div class="form-group mb-0">
													<label class="text-primary"><b><u>Add New Brand</u></b></label>
												  </div>
												</div> 		
												<div class="col-md-8">
												  <div class="form-group mt-2">
													<input type="text" class="form-control" name="brand_name_new" placeholder="Type your Brand Name">
												  </div>
												</div>
												<div class="col-md-4">
												  <div class="form-group mt-2">	
													<button type="submit" class="btn btn-primary">Submit</button>
												  </div>
												</div>
											</div>	
										</form>	

									</div>	
								
							<div class="col-md-12 border-danger rounded p-3 m-3">	
							  <div class="table-responsive">
								<table class="table table-bordered table-hover table-sm" id="example" width="100%" cellspacing="0">
								  <thead id="thead-dark" class="text-center thead-dark1">
									<tr>
									  <th>Brands Id</th>
									  <th>Brands name</th>									  
									  <th>Action</th>
									</tr>
								  </thead>
								  <tfoot class="text-center">
									<tr>
									  <th>Brands Id</th>
									  <th>Brands name</th>									  
									  <th>Action</th>
									</tr>
								  </tfoot>
								  <tbody>
<?php
							$query = "SELECT * FROM brands_tbl  ORDER BY brand_name ASC";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
?>	
									<tr>
									<form action="" method="POST">
									  <td class="text-center"><input class="form-control" type="hidden" value="<?php echo $row['id'];?>" name="brandId"/><?php echo $row['id'];?></td>
									  <td class="text-center"><input class="form-control" type="text" value="<?php echo substr($row['brand_name'],0,20);?>" name="brand_name"/></td>
									  <td class="text-center"><button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i></button></form> <form action="" method="POST"><input type="hidden" name="post_brand_delete" value="deleteBrand"/><input type="hidden" name="brandId" value="<?php echo $row['id'];?>"/><button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button></form></td>
									</tr>	
<?php		
							}									
?>								  

								  </tbody>
								</table>
							  </div>  
							  </div> 
							  
							 </div> 
						</div>	 
              
              
      </div>
    </div>
  </div>
 </div> 