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
                <h1 class="text-center">About Us</h1>
                <!-- Breadcrumbs of the Page -->
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="<?php echo URL;?>">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="">About us <i class="fa fa-angle-right"></i></a></li>
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
                    <div class="container">
                      <h3 align="center">Live Email Availability using Parsley.js Custom Validator with PHP</h3>
                      <br />
                      <br />
                      <br />
                      <div class="row">
                        <div class="col-md-3">
                
                        </div>
                        <div class="col-md-6">
                          <input type="text" id="email" class="form-control input-lg testEmail" required placeholder="Enter Email ID" data-parsley-type="email" data-parsley-trigger="focusout" data-parsley-checkemail data-parsley-checkemail-message="Email Address already Exists" />
                        </div>
                        <div class="col-md-3">
                
                        </div>
                      </div>
                    </div>
              </div>
              
          </div>
          
      </div>
      
