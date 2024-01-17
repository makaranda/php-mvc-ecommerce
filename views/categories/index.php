<?php
    include('libs/connection.php');
    $date_time = date('Y-m-d H:i:s');

    //$deleteTable = "TRUNbrandE TABLE gallery_temp_tbl";
    //mysqli_query($conn, $deleteTable);
if(isset($_POST['catId']) && isset($_POST['category_name'])){
	//$updateDistrict = "UPDATE `categories_tbl` SET `id`='',`category_name`='' WHERE `id` = ";
	$catId = $_POST['catId'];
	$category_name = $_POST['category_name'];
	$inches = $_POST['inches'];
	
	$updateDistrict = "UPDATE `categories_tbl` SET `category_name`='$category_name',`inches` = '$inches' WHERE `id`= $catId";
	mysqli_query($conn, $updateDistrict);
	
	echo '<script>window.lobrandion.href = "'.URL.'dashboard/categories";</script>';
	
}elseif(isset($_POST['category_name_new'])){
	
	$category_name_new = $_POST['category_name_new'];
	
	$insertSQL = "INSERT INTO `categories_tbl`(`id`, `category_name`) VALUES ('$post_distric_new','$category_name_new')";
	mysqli_query($conn, $insertSQL);

	echo '<script>window.lobrandion.href = "'.URL.'dashboard/categories";</script>';
	  
}elseif(isset($_POST['post_brand_delete'],$_POST['catId']) && $_POST['post_brand_delete'] == 'deleteBrand'){
    $brandDeleteId = $_POST['catId'];
    $deleteSQL = "DELETE FROM `categories_tbl` WHERE `id` = $brandDeleteId";
	mysqli_query($conn, $deleteSQL);    

	echo '<script>window.lobrandion.href = "'.URL.'dashboard/categories";</script>';    
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
					  <h6 class="m-0 font-weight-bold text-primary">categories</h6>
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
													<label class="text-primary"><b><u>Add New Category</u></b></label>
												  </div>
												</div> 		
												<div class="col-md-8">
												  <div class="form-group mt-2">
													<input type="text" class="form-control" name="category_name_new" placeholder="Type your Category Name">
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
									  <th>Category Id</th>
									  <th>Category name</th>									  
									  <th>Action</th>
									</tr>
								  </thead>
								  <tfoot class="text-center">
									<tr>
									  <th>Category Id</th>
									  <th>Category name</th>									  
									  <th>Action</th>
									</tr>
								  </tfoot>
								  <tbody>
<?php
							$query = "SELECT * FROM categories_tbl  ORDER BY category_name ASC";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
?>	
									<tr>
									<form action="" method="POST">
									  <td class="text-center"><input class="form-control" type="hidden" value="<?php echo $row['id'];?>" name="catId"/><?php echo $row['id'];?></td>
									  <td class="text-center"><input class="form-control" type="text" value="<?php echo substr($row['category_name'],0,20);?>" name="category_name" placeholder="product name"/><br><input class="form-control" type="text" value="<?php echo $row['inches'];?>" name="inches" placeholder="product inches - example 16,17,18"/></td>
									  <td class="text-center"><button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i></button></form> <form action="" method="POST"><input type="hidden" name="post_brand_delete" value="deleteBrand"/><input type="hidden" name="catId" value="<?php echo $row['id'];?>"/><button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button></form></td>
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