<?php

$userId = explode('/',$_GET['url']);
$userId = $userId[2];



if(isset($userId) && $userId != ''){
    $user =  'User ID'.$userId.'';
}else{
    $user = '';
}

?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800 text-uppercase"><b>Admin Profile</b></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
            </div>
                <div class="card-body">
                    <?php echo $user;?>
                </div>
            </div>

        </div>
    </div>  
 </div> 