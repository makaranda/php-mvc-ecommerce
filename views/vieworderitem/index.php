  <?php
    include('libs/connection.php');
    
 		$allId = explode('/',$_GET['url']);
		$orderId = $allId[2];
		$customerID = $allId[3];
		
		//var_dump($orderId);
		
		if(isset($orderId,$customerID) && $orderId != '' && $customerID != ''){
			$oID =  ''.$orderId.'';
			$cId = ''.$customerID.'';
		}else{
			$oID = '';
			$cId = '';
			
			
		}   
    
  ?>
  
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
 <!--   <div class="d-sm-flex align-items-center justify-content-between mb-4 d-none">
        <h1 class="h5 mb-0 text-gray-800 text-uppercase d-noe"><b>Orders</b></h1>
    </div>
-->
    <!-- Content Row -->

    <div class="row">
         <div class="col-lg-12 mb-4">
             <div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					  <h6 class="m-0 font-weight-bold text-primary">View Orders</h6>
					</a>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
					  <div class="card-body">
                         <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary"></h6>
							  
							</div>
							<div class="card-body">
                              <div class="form-row">
                                <div class="col">
                                  <label>Order ID</label>    
                                  <input type="text" class="form-control" placeholder="Order ID" value="<?php echo $oID;?>" readonly>
                                </div>
                                <div class="col">
                                  <label>Customer ID</label>  
                                  <input type="text" class="form-control" placeholder="Customer ID" value="<?php echo $cId;?>" readonly>
                                </div>
                              </div>							    
                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered table-hover table-sm" id="listView" width="100%" cellspacing="0">
                                        <thead id="thead-dark" class="text-center thead-dark1">
                                        <tr>
                                            <th>#</th>
                                            <th>Pro Code</th>
                                            <th>Pro price</th>
                                            <th>Pro Qty</th>
                                            <th>Total</th>
                                            <th>ordered date</th>									  
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Pro Code</th>
                                            <th>Pro price</th>
                                            <th>Pro Qty</th>
                                            <th>Total</th>
                                            <th>ordered date</th>									  
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                    <?php
                                
                                        $sql = "SELECT * FROM sales_items_tbl WHERE order_id = '$oID' AND user_id = '$cId'";
                                        $result = mysqli_query($conn, $sql);
                                         $x = 0; 
                                        if (mysqli_num_rows($result) > 0) {                        
                                            while($row = mysqli_fetch_assoc($result)) {
                                        $x++;
                                        //, `title`, `description`, `duration`, `start_date`, `expire_date`, `feature_image`, 
                                        //`feature_on_home`, `phone_number1`, `phone_number2`, `website`, `email_address`, `date_time`        

                                    ?>
                                            <tr>
                                                <td class="text-center"><?php echo $x?></td>
                                                <td class="text-center"><?php echo $row['product_code'];?></td>
                                                <td class="text-center"><?php echo $row['product_price'];?></td>
                                                <td class="text-center"><?php echo $row['product_qty'];?></td>
                                                <td class="text-center"><?php echo $row['product_total'];?></td>
                                                <td class="text-center"><?php echo $row['date_time'];?></td>
                                                <td class="text-center"><a href="<?php echo URL;?>dashboard/vieworderitem/<?php echo $row['order_id'];?>/<?php echo $row['product_code'];?>" class="btn btn-warning"><i class="fas fa-eye"></i></a> <!--<a href="<?php echo URL;?>dashboard/editorderitem/<?php //echo $row['order_id'];?>/<?php //echo $row['product_code'];?>" class="btn btn-primary"><i class="fas fa-pen"></i></a> <a href="<?php //echo URL;?>dashboard/deleteorderitem/<?php //echo $row['order_id'];?>/<?php //echo $row['product_code'];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>--></td>
                                            </tr>
                                    <?php           

                                            }
                                        } else {
									?>		
                                            <tr>
                                                <td class="text-center" colspan="7">There are no any data</td>
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
 </div> 