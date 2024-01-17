<?php
    include('libs/connection.php');
    $date_time = date('Y-m-d H:i:s');

    //$deleteTable = "TRUNCATE TABLE gallery_temp_tbl";
    //mysqli_query($conn, $deleteTable);
if(isset($_POST['citytId']) && isset($_POST['city_name'])){
	//$updateDistrict = "UPDATE `post_districs_city` SET `post_districs_id`='',`post_city_name`='' WHERE `id` = ";
	$citytId = $_POST['citytId'];
	$city_name = $_POST['city_name'];
	
	$updateDistrict = "UPDATE `post_districs_city` SET `post_city_name`='$city_name' WHERE `id`= $citytId";
	mysqli_query($conn, $updateDistrict);
	
	echo '<script>window.location.href = "'.URL.'dashboard/cities";</script>';
	
}elseif(isset($_POST['post_distric_new']) && isset($_POST['city_name_new'])){
	
	$post_distric_new	= $_POST['post_distric_new'];	
	$city_name_new = $_POST['city_name_new'];
	
	$insertSQL = "INSERT INTO `post_districs_city`(`post_districs_id`, `post_city_name`) VALUES ('$post_distric_new','$city_name_new')";
	mysqli_query($conn, $insertSQL);

	echo '<script>window.location.href = "'.URL.'dashboard/cities";</script>';
	
}elseif(isset($_POST['post_distric_delete'],$_POST['citytId']) && $_POST['post_distric_delete'] == 'deleteCity' && $_POST['citytId'] != ''){
	
	$citytId	= $_POST['citytId'];	
	
	$deleteSQL = "DELETE FROM `post_districs_city` WHERE `id` = $citytId";
	mysqli_query($conn, $deleteSQL);

	echo '<script>window.location.href = "'.URL.'dashboard/cities";</script>';
	
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
					  <h6 class="m-0 font-weight-bold text-primary">Cities</h6>
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
													<label class="text-primary"><b><u>Add New City</u></b></label>
												  </div>
												</div> 		
												<div class="col-md-4">
												  <div class="form-group">
													<label for="exampleInputEmail1">District Name</label>
													<select class="form-control js-example-basic-single" id="user_Ids" name="post_distric_new">
													<?php
														$sql001 = "SELECT * FROM `post_districs` ORDER BY `district_name` ASC";
														$result001 = mysqli_query($conn, $sql001);
														while($row001 = mysqli_fetch_assoc($result001)){
													?>														
														<option value="<?php echo $row001['id'];?>"><?php echo $row001['district_name'];?></option>	
													<?php
														}
													?>
													</select>					
												  </div>
												</div>  
												<div class="col-md-4">
												  <div class="form-group">
													<label for="exampleInputPassword1">City Name</label>
													<input type="text" class="form-control" name="city_name_new" placeholder="Type your City Name">
												  </div>
												</div>
												<div class="col-md-4">
												  <div class="form-group mt-2">	
													<button type="submit" class="btn btn-primary mt-4">Submit</button>
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
									  <th>City Id</th>
									  <th>District name</th>
									  <th>City name</th>									  
									  <th>Action</th>
									</tr>
								  </thead>
								  <tfoot class="text-center">
									<tr>
									  <th>City Id</th>
									  <th>District name</th>
									  <th>City name</th>									  
									  <th>Action</th>
									</tr>
								  </tfoot>
								  <tbody>
<?php
							$query = "SELECT post_districs.district_name,post_districs_city.post_city_name,post_districs_city.id FROM post_districs_city INNER JOIN post_districs ON post_districs.id = post_districs_city.post_districs_id ORDER BY post_city_name ASC";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
?>	
									<tr>
									<form action="" method="POST">
									  <td class="text-center"><input class="form-control" type="hidden" value="<?php echo $row['id'];?>" name="citytId"/><?php echo $row['id'];?></td>
									  <td class="text-center"><?php echo $row['district_name'];?></td>							  
									  <td class="text-center"><input class="form-control" type="text" value="<?php echo substr($row['post_city_name'],0,20);?>" name="city_name"/></td>
									  <td class="text-center"><button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i></button></form> <form action="" method="POST"><input type="hidden" name="post_distric_delete" value="deleteCity"/><input type="hidden" name="citytId" value="<?php echo $row['id'];?>"/><button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button></form></td>
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