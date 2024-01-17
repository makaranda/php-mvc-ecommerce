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

      <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(<?php echo URL;?>assets/images/img-76.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">Privacy Policy</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="">Privacy Policy <i class="fa fa-angle-right"></i></a></li>
                  </ul>
                </nav>
                <!-- Breadcrumbs of the Page end -->
              </div>
            </div>
          </div>
        </section>

        <!-- Mt Detail Section of the Page end -->
      </main><!-- Main of the Page end here -->
      
      
      <div class="container shadow-lg">
          <div class="row justify-content-center">
              <div class="col-10 col-md-10">
                  
                  <p><?php echo $page_description;?></p>
              </div>
              
          </div>
          
      </div>
      
