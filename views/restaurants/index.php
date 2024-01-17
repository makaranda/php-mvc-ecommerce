  <?php
    include('libs/connection.php');
  ?>
  
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
 <!--   <div class="d-sm-flex align-items-center justify-content-between mb-4 d-none">
        <h1 class="h5 mb-0 text-gray-800 text-uppercase d-noe"><b>hotels</b></h1>
    </div>
-->
    <!-- Content Row -->
    <div class="row">
         <div class="col-lg-12 mb-4">
             <div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					  <h6 class="m-0 font-weight-bold text-primary">Restaurants</h6>
					</a>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
					  <div class="card-body">
                         <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary"></h6>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm" id="example" width="100%" cellspacing="0">
                                        <thead id="thead-dark" class="text-center thead-dark1">
                                        <tr>
                                            <th>Id</th>
                                            <th>Restaurant Name</th>
                                            <th>Phone</th>
                                            <th>Published Date</th>									  
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Restaurant Name</th>
                                            <th>Phone</th>
                                            <th>Published Date</th>									  
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                    <?php
                                
                                        $sql = "SELECT * FROM pages_tbl WHERE page_type = 'restaurants'";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {                        
                                            while($row = mysqli_fetch_assoc($result)) {
                                        
                                        //, `title`, `description`, `duration`, `start_date`, `expire_date`, `feature_image`, 
                                        //`feature_on_home`, `phone_number1`, `phone_number2`, `website`, `email_address`, `date_time`        

                                    ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row["page_id"]?></td>
                                                <td class="text-center"><?php echo substr($row["title"],0,20);?></td>
                                                <td class="text-center"><?php echo $row['phone_number1'];?></td>
                                                <td class="text-center"><?php echo substr($row['date_time'],0,10);?></td>
                                                <td class="text-center"><a href="<?php echo URL;?>dashboard/editrestaurant/<?php echo $row['page_id'];?>" class="btn btn-primary"><i class="fas fa-pen"></i></a> <a href="<?php echo URL;?>dashboard/deleterestaurant/<?php echo $row['page_id'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                    <?php           

                                            }
                                        } else {
                                        //echo "0 results";
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
 </div> 