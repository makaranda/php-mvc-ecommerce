  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h5 mb-0 text-gray-800 text-uppercase"><b>Fanz.Lk</b></h1>
  <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-12 col-md-12 mb-4 d-none">
	<div class="card border-left-primary shadow h-100 py-2">
	  <div class="card-body">
		<div class="row no-gutters align-items-center">
		  <div class="col mr-2">
			<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earning (from orders)</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800">Rs <?php //echo number_format($earningOrder);?></div>
		  </div>
		  <div class="col-auto">
			 <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i>--> 
			 <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
		  </div>
		</div>
	  </div>
	</div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-12 col-md-12 mb-4 d-none">
	<div class="card border-left-success shadow h-100 py-2">
	  <div class="card-body">
		<div class="row no-gutters align-items-center">
		  <div class="col mr-2">
			<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expences (to suppliers)</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800">Rs <?php //echo number_format($expensesSupplirs);?></div>
		  </div>
		  <div class="col-auto">
			<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
		  </div>
		</div>
	  </div>
	</div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-12 col-md-12 mb-4 d-none">
	<div class="card border-left-info shadow h-100 py-2">
	  <div class="card-body">
		<div class="row no-gutters align-items-center">
		  <div class="col mr-2">
			<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cashbook Balance</div>
			<div class="row no-gutters align-items-center">
			  <div class="col-auto">
				<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rs <?php //if($cashbookBalance0 <= 0){echo '<span class="text-danger">('.number_format($cashbookBalance).')</span>';}else{ echo number_format($cashbookBalance);}?></div>
			  </div>

			</div>
		  </div>
		  <div class="col-auto">
			<!--<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>-->
			<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
		  </div>
		</div>
	  </div>
	</div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-12 col-md-12 mb-4 d-none">
	<div class="card border-left-warning shadow h-100 py-2">
	  <div class="card-body">
		<div class="row no-gutters align-items-center">
		  <div class="col mr-2">
			<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders</div>
			<div class="h5 mb-0 font-weight-bold text-gray-800"><?php //echo $countPro;?></div>
		  </div>
		  <div class="col-auto">
			<i class="fas fa-comments fa-2x text-gray-300"></i>
		  </div>
		</div>
	  </div>
	</div>
  </div>



  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-12 d-none">
	<div class="card shadow mb-4">
	  <!-- Card Header - Dropdown -->
	  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Earnings Overview (Profit Summery)</h6>

	  </div>
	  <!-- Card Body -->
	  <div class="card-body">
		<div class="chart-area">
		  <canvas id="myAreaChart"></canvas>
		</div>
	  </div>
	</div>
  </div>



<!-- Content Row -->




  <div class="col-lg-12 mb-4">

	<!-- Illustrations -->
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary d-none">About Fanz.Lk</h6>
	  </div>
	  <div class="card-body">
		<div class="text-center">
  		  <h2 class="text-white bg-primary">Fanz.Lk</h2>	
		  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo URL;?>assets/uploads/logo2.png" alt="">
		</div>
		<p class="d-none">Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
		<a class="d-none" target="_blank" rel="nofollow" href="#">staff terms and conditions &rarr;</a>
	  </div>
	</div>

	<!-- Approach -->
	<div class="card shadow mb-4 d-none">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
	  </div>
	  <div class="card-body">
		<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
		<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
	  </div>
	</div>

  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
