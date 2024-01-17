<?php
    include('libs/connection.php');
    $date_time = date('Y-m-d H:i:s');

    //$deleteTable = "TRUNincheE TABLE gallery_temp_tbl";
    //mysqli_query($conn, $deleteTable);
if(isset($_POST['incheId']) && isset($_POST['inches_name'])){
	//$updateDistrict = "UPDATE `product_inches_tbl` SET `id`='',`inches_name`='' WHERE `id` = ";
	$incheId = $_POST['incheId'];
	$inches_name = $_POST['inches_name'];
	
	$updateDistrict = "UPDATE `product_inches_tbl` SET `inches_name`='$inches_name' WHERE `id`= $incheId";
	mysqli_query($conn, $updateDistrict);
	
	echo '<script>window.loincheion.href = "'.URL.'dashboard/inches";</script>';
	
}elseif(isset($_POST['inches_name_new'])){
	
	$inches_name_new = $_POST['inches_name_new'];
	
	$insertSQL = "INSERT INTO `product_inches_tbl`(`id`, `inches_name`) VALUES ('$post_distric_new','$inches_name_new')";
	mysqli_query($conn, $insertSQL);

	echo '<script>window.loincheion.href = "'.URL.'dashboard/inches";</script>';
	  
}elseif(isset($_POST['post_inche_delete'],$_POST['incheId']) && $_POST['post_inche_delete'] == 'deleteinche'){
    $incheDeleteId = $_POST['incheId'];
    $deleteSQL = "DELETE FROM `product_inches_tbl` WHERE `id` = $incheDeleteId";
	mysqli_query($conn, $deleteSQL);    

	echo '<script>window.loincheion.href = "'.URL.'dashboard/inches";</script>';    
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
					  <h6 class="m-0 font-weight-bold text-primary">inches</h6>
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
													<label class="text-primary"><b><u>Add New inche</u></b></label>
												  </div>
												</div> 		
												<div class="col-md-8">
												  <div class="form-group mt-2">
													<input type="text" class="form-control" name="inches_name_new" placeholder="Type your inche Name">
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
									  <th>inches Id</th>
									  <th>inche</th>									  
									  <th>Action</th>
									</tr>
								  </thead>
								  <tfoot class="text-center">
									<tr>
									  <th>inches Id</th>
									  <th>inche</th>									  
									  <th>Action</th>
									</tr>
								  </tfoot>
								  <tbody>
<?php
							$query = "SELECT * FROM product_inches_tbl  ORDER BY inches_name ASC";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
?>	
									<tr>
									<form action="" method="POST">
									  <td class="text-center"><input class="form-control" type="hidden" value="<?php echo $row['id'];?>" name="incheId"/><?php echo $row['id'];?></td>
									  <td class="text-center"><input class="form-control" type="number" value="<?php echo substr($row['inches_name'],0,20);?>" name="inches_name"/></td>
									  <td class="text-center"><button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i></button></form> <form action="" method="POST"><input type="hidden" name="post_inche_delete" value="deleteinche"/><input type="hidden" name="incheId" value="<?php echo $row['id'];?>"/><button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button></form></td>
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