  <?php
    include('libs/connection.php');
    include("assets/php_image_magician.php");
    include("assets/classPhpPsdReader.php");
    
    global $banner_image;    
    global $provinceList;        
    $pageName = explode('/',$_GET['url']);
    $pageName = $pageName[2];
    
    $date_time = date('Y-m-d H:i:s');
    
    if(isset($pageName) && $pageName != ''){
        $PageType =  ''.$pageName.'';
    }else{
        echo '<script>window.location.href = "'.URL.'dashboard";</script>';
        $PageType = '';
    }

    $selectSQL = "SELECT * FROM `pages_tbl` WHERE `page_type` = '$PageType'";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);	
    
    //echo $selectSQL;
    
    $pages_id = $row['id'];
    $pageType = $row['page_type'];
    $page_title = $row['page_title'];
    $banner_image = $row['banner_image'];
    $description = $row['page_description'];
    $date_time = $row['date_time'];
    $extra_description = $row['extra_description'];
    $page_gallery_id = $row['page_gallery_id'];

    if(isset($row['page_lati'],$row['page_long']) && ($row['page_lati'] && $row['page_long'])){
        $page_lati = $row['page_lati'];
        $page_long = $row['page_long'];        
    }else{
        $page_lati = '6.9271';
        $page_long = '79.8612';        
    }
 

    
  

    if(isset($_POST['pageId'],$_POST['pageType'],$_POST['page_title'],$_POST['page_description'])){  


        $pageType = $_POST['pageType'];
        $pageId = $_POST['pageId'];
        $title = $_POST['page_title'];
        $pageDescription = $_POST['page_description'];  
        $pageLong = $_POST['longatude'];  
        $pageLati = $_POST['latitude'];
        

        $query = "UPDATE `pages_tbl` SET `page_title` = '".$title."', `page_description` = '".$pageDescription."', `page_long` = '".$pageLong."', `page_lati` = '".$pageLati."' WHERE `id` = $pageId AND `page_type` = '$pageType'";
        mysqli_query($conn, $query);

        //echo $query;

        echo '<script>window.location.href = "'.URL.'dashboard/pages/'.$pageType.'";</script>';
    }

  ?>
  
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Content Row -->
<div class="row">
     <div class="col-lg-12 mb-4">
         <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 text-capitalize font-weight-bold text-primary"><?php echo $PageType;?></h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
         <div class="card shadow pb-4 mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
          </div>
          <form method="POST" action="">
          <input type="hidden" class="form-control" name="pageId" value="<?php echo $pages_id;?>">
          <input type="hidden" class="form-control" name="pageType" value="<?php echo $PageType;?>" id="pageType">
          
                       <div class="col-md-12 mt-3">
                        <div class="form-group">
                          <label class="font-weight-bold">Page Title</label>
                          <input class="form-control" type="text" value="<?php echo $page_title;?>" name="page_title" id="" required/>
                        </div>                     
                      </div>         
                      
                      <div class="col-md-12 mt-3">
                        <div class="form-group">
                          <label class="font-weight-bold">Description</label>
                          <textarea rows="5" class="form-control page_description" value="<?php echo $description;?>" name="page_description" required><?php echo $description;?></textarea>
                        </div>                     
                      </div>

                      <div class="col-md-12 mt-3 <?php if(isset($pageName) && $pageName == 'contact'){echo '';}else{echo 'd-none';}?>">
                       <input type="hidden" id="changePointer" name="changePointer"/>
                       <div class="row">
                         <div class="col-12 col-md-8">
                          <div class="row mt-3">
                            <input type="hidden" class="form-control" name="longatude" id="longatude" value="<?php echo $page_lati;?>">
                            <input type="hidden" class="form-control" name="latitude" id="latitude" value="<?php echo $page_long;?>">
                            <div class="col-12 form-group">
                              <label class="font-weight-bold">Select Your Working Place (Using this Location Icon)</label>
                            </div>
                            <div class="col-12 form-group">
                              <div style="width: 50vw; height: 100vh" id="issMap"></div>
                            </div>
                          </div>
                          </div>
                          <div class="col-12 col-md-4 mt-3">
                            <div class="row mt-3">
                              <div class="col-12 form-group">
                                <label class="font-weight-bold">Latitude</label>
                                <input type="text" class="form-control" name="long" id="long" readonly>
                              </div>
                              <div class="col-12 form-group">
                                <label class="font-weight-bold">Longitude</label>
                                <input type="text" class="form-control" name="lati" id="lati" readonly>
                              </div>
                            </div>
                          </div>                  
                        </div>
                       </div>                     
                      <div class="col-12 col-md-12 mt-4">
                          <button type="submit" class="btn btn-warning btn-icon-split float-right">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                            </span>
                          <span class="text">Save</span></button>
                          <a href="<?php echo URL;?>dashboard/" class="btn btn-danger btn-icon-split float-right mr-2">
                          <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                            </span>
                          <span class="text">Close</span></a>										
                      </div>	
        </div>
    </div>
    </form>
  </div>
</div>
</div>
</div> 


