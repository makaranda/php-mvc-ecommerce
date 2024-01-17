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
<div class="col-12 col-sm-10 col-md-10 mt-5">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb bg-transparent">
				<li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Account</li>
			  </ol>
			</nav>
		</div>
		<div class="col-12 col-sm-12 col-md-12">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12">
					<h2>My Account</h2>
				</div>
				<div class="col-12 col-sm-12 col-md-12">
					<div class="row justify-content-center">
					  <div class="col-12 col-sm-4 col-md-4">				
						<ul class="nav flex-column nav-pills" id="pills-tab" role="tablist" aria-orientation="vertical">
						  <li class="nav-item">
							<a class="nav-link active" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard" role="tab" aria-controls="pills-dashboard" aria-selected="true">Dashboard</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="pills-orders-tab" data-toggle="pill" href="#pills-orders" role="tab" aria-controls="pills-orders" aria-selected="false">Orders</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="pills-downloads-tab" data-toggle="pill" href="#pills-downloads" role="tab" aria-controls="pills-downloads" aria-selected="false">Downloads</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="pills-addresss-tab" data-toggle="pill" href="#pills-addresss" role="tab" aria-controls="pills-addresss" aria-selected="false">Addresss</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">Account Details</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="<?php echo URL;?>assets/action/logout.php" role="tab" aria-controls="pills-logout" aria-selected="false">Logout</a>
						  </li>
						</ul>
					  </div>
					  <div class="col-12 col-sm-8 col-md-8">
						 <div class="tab-content" id="pills-tabContent">
						  <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa. Nam convallis dui sed pulvinar bibendum. Donec tincidunt sed lorem in venenatis. Nam malesuada molestie ex eu faucibus.</div>
						  <div class="tab-pane fade" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab">Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa. Nam convallis dui sed pulvinar bibendum. Donec tincidunt sed lorem in venenatis. Nam malesuada molestie ex eu faucibus.</div>
						  <div class="tab-pane fade" id="pills-downloads" role="tabpanel" aria-labelledby="pills-downloads-tab">Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa. Nam convallis dui sed pulvinar bibendum. Donec tincidunt sed lorem in venenatis. Nam malesuada molestie ex eu faucibus.</div>
						  <div class="tab-pane fade" id="pills-addresss" role="tabpanel" aria-labelledby="pills-addresss-tab">Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa. Nam convallis dui sed pulvinar bibendum. Donec tincidunt sed lorem in venenatis. Nam malesuada molestie ex eu faucibus.</div>
						  <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa. Nam convallis dui sed pulvinar bibendum. Donec tincidunt sed lorem in venenatis. Nam malesuada molestie ex eu faucibus.</div>
						 </div>  
					  </div>
					</div>	

					
				</div>				
			</div>
							
		</div>
	</div>		
</div>
      
