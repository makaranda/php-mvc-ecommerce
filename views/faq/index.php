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
    

?>


 <div class="col-sm-12 col-md-12 pl-0 pr-0">
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>FAQ</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo URL;?>">Home</a>
                            <span>FAQ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </div> 

<div class="col-12 col-sm-10 col-md-10 mt-5">
	<div class="row justify-content-center">

		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12 mb-4">
					<h2>FAQ</h2>
				</div>

				<div class="col-12 col-sm-12 col-md-12">
					<div id="accordion">
					  <div class="card">
						<div class="card-header" id="headingOne">
						  <h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  Collapsible Group Item #1
							</button>
						  </h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						  <div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						  </div>
						</div>
					  </div>
					  <div class="card">
						<div class="card-header" id="headingTwo">
						  <h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							  Collapsible Group Item #2
							</button>
						  </h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						  <div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						  </div>
						</div>
					  </div>
					  <div class="card">
						<div class="card-header" id="headingThree">
						  <h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Collapsible Group Item #3
							</button>
						  </h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						  <div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						  </div>
						</div>
					  </div>
					</div>					
				</div>
			</div>
							
		</div>
	</div>		
</div>
      
