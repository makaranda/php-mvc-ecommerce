  <?php
    include('libs/connection.php');
    include("assets/php_image_magician.php");
    include("assets/classPhpPsdReader.php"); 
            
    $eventId = explode('/',$_GET['url']);
    $eventId = $eventId[2];
    global $provinceList;

    
    $date_time = date('Y-m-d H:i:s');
    
    if(isset($eventId) && $eventId != ''){
        $eID =  ''.$eventId.'';
    }else{
        echo '<script>window.location.href = "'.URL.'dashboard/hotels";</script>';
        $eID = '';
    }

    $selectSQL = "SELECT * FROM `pages_tbl` WHERE `page_id` = $eID AND `page_type` = 'hotels'";
    $result = mysqli_query($conn, $selectSQL);
    $row = mysqli_fetch_assoc($result);	
	
	//echo $selectSQL;

    $pageType = $row['page_type'];
    $pages_id = $row['page_id'];
    $title = $row['title'];
    $feature_image = $row['feature_image'];
    $hotels_details = $row['description'];
    $phone_no1 = $row['phone_number1'];
    $phone_no2 = $row['phone_number2'];
    $website = $row['website']; 
    $email = $row['email_address'];
    $eventLocation = $row['location_address'];
    $long1 = $row['longitude'];
    $lati1 = $row['latitude'];

    
    $country = $row['country'];
    $province = $row['province'];
    $district = $row['district'];
    $city = $row['city'];

    
    $query = "SELECT id,post_province_name FROM post_province GROUP BY post_province_name ORDER BY post_province_name ASC";	
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT id,post_province_name FROM post_province WHERE id = $province";	
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);

    $query3 = "SELECT id,district_name FROM post_districs WHERE id = $district";	
    $result3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_array($result3);

    $district_name = $row3['district_name'];
    
        $provinceList .= '<option value="'.$province.'">'.$row2["post_province_name"].'</option>';
    while($row = mysqli_fetch_array($result))
    {
      if($province == $row["id"]){

      }else{
        $provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	   
      }   
       //$provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	
    }

//var_dump($_POST);

    if(isset($_POST['page_id'],$_POST['past_feature_image'],$_POST['pageType'],$_POST['title'],$_FILES['upload_image']["name"],$_POST['hotels_details'],$_POST['phone_no1'],$_POST['email'],$_POST['eventLocation'],$_POST['long'],$_POST['lati'])){  
  
      
        global $feature_image;

        $pageType = $_POST['pageType'];
        $page_id = $_POST['page_id'];
        $title = $_POST['title'];
        $past_feature_image = $_POST['past_feature_image'];
        $hotels_details = $_POST['hotels_details'];
        $start_date = '0000-00-00 00:00:00';
        $close_date = '0000-00-00 00:00:00';
        $phone_no1 = $_POST['phone_no1'];
        $phone_no2 = $_POST['phone_no2'];
        $website = $_POST['website']; 
        $email = $_POST['email'];
        $eventLocation = $_POST['eventLocation'];
        $changePointer = $_POST['changePointer'];
        
        $latitude = $_POST['latitude'];
        $longatude = $_POST['longatude'];
        
        $postcountry = $_POST['country'];     
        $postprovince = $_POST['province'];      
        $postdistrict = $_POST['district'];    
        $postcity = $_POST['city'];

        $changePointer = str_replace('LatLng(','',$changePointer);
        $changePointer2 = str_replace(')','',$changePointer);
        $changePointer3 = str_replace(' ','',$changePointer2);
        $allchangePointer = explode(',',$changePointer3);
        
      //var_dump($changePointer);
      if(isset($changePointer) && $changePointer != ''){
        $long = $allchangePointer[1];
        $lati = $allchangePointer[0];
      }else{
        $long = '';
        $lati = '';        
      }

        
        if(isset($long,$lati) && $long != '' && $lati != ''){
            $long = $long;
            $lati = $lati;
        }else{
           $long = $longatude;
           $lati = $latitude; 
        }


        //echo $changePointer;


            global $feature_image;
            //echo $websiteurl;
            //echo '<br>';
            //var_dump($_FILES);
            if(isset($_FILES["upload_image"]["name"]) && $_FILES["upload_image"]["name"] != ""){
            	
            date_default_timezone_set("Asia/Colombo");
            $target_dir = "assets/uploads/hotels/";
            $datetime = date('Ymdhis');
            
            
            $filepath1 = basename($_FILES["upload_image"]["name"]);
            $filepath2 = str_replace('.',"$datetime.",$filepath1);
            
            $target_file = $target_dir . $filepath2;
            
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["upload_image"]["tmp_name"]);
                if($check !== false) {
            
                    $uploadOk = 1;
                } else {
            
                    $uploadOk = 0;
                }
            }
            
            
            // Check if file already exists
            if (file_exists($target_file)) {
               // echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["upload_image"]["size"] > 5000000) {
               // echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            
            if ($uploadOk == 0) {
            
            } else {
                if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file)) {
                    //echo "The file ". basename( $_FILES["upload_image"]["name"]). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
            }
            
            $feature_image = str_replace('assets/uploads/hotels/','',$target_file);
            //$magicianObj = new imageLib("assets/uploads/hotels/$feature_image");
            
            // Resize to best fit then crop
            //$magicianObj -> resizeImage(600, 400, 'crop');
            
            //$magicianObj -> addWatermark('../../../images/watermark.png', 'br', 50);
            
            // Save resized image as a PNG
            //$magicianObj -> saveImage("assets/uploads/hotels/$feature_image");               
            }
        
        //include('assets/action/uploadfeature.php'); 
        
        
       // echo $feature_image;
        if($feature_image != ''){
          $feature_image = $feature_image;
        }else{
          $feature_image = $past_feature_image;
        }       

        $query = "
        UPDATE `pages_tbl` SET `page_type` = '".$pageType."',`title` = '".$title."', `description` = '".$hotels_details."', `duration` = '0', `start_date` = '".$start_date."', `expire_date` = '".$close_date."', `feature_image` = '".$feature_image."', `feature_on_home` = 'on', `phone_number1` = '".$phone_no1."', `phone_number2` = '".$phone_no2."', `website` = '".$website."', `email_address` = '".$email."', `longitude` = '".$long."', `latitude` = '".$lati."',`country` = '".$postcountry."',`province` = '".$postprovince."',`district` = '".$postdistrict."',`city` = '".$postcity."', `location_address` = '".$eventLocation."',`date_time` = '".$date_time."' 
         WHERE `page_id` = $page_id";
        mysqli_query($conn, $query);

        //echo $query;

        echo '<script>window.location.href = "'.URL.'dashboard/edithotels/'.$eID.'";</script>';
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
        <h6 class="m-0 font-weight-bold text-primary">Edit Event</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
         <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
          </div>
          <form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden" class="form-control capitalize" name="pageType" value="hotels" id="pageType">
          <input type="hidden" class="form-control capitalize" name="page_id" value="<?php echo $pages_id;?>" id="page_id">
          <input type="hidden" class="form-control capitalize" name="past_feature_image" value="<?php echo $feature_image;?>" id="past_feature_image">
          <input type="hidden" class="form-control capitalize" name="province" value="<?php echo $province;?>" id="hiddenprovince">
          <input type="hidden" class="form-control capitalize" name="country" value="<?php echo $country;?>">
          <input type="hidden" class="form-control capitalize" name="district" value="<?php echo $district;?>" id="hiddendistrict">
          <input type="hidden" class="form-control capitalize" name="districtname" value="<?php echo $district_name;?>" id="hiddendistrictName">
          <input type="hidden" class="form-control capitalize" name="city" value="<?php echo $city;?>" id="neatest_town_past">


             
              <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="font-weight-bold">Title</label>
                    <input type="text" class="form-control capitalize" name="title" value="<?php echo $title;?>" placeholder="" required>
                  </div>                     
                </div>

                <div class="col-md-12">
                  <div class="form-group text-left">
                     <label class="font-weight-bold w-100 float-left uploadingIMG">Feature Image Preview (upload file size is 600px X 300px)</label>
                     <img id="blah" src="<?php echo ''.URL.'assets/uploads/hotels/'.$feature_image;?>" alt="your image" class="w-100 uploadingIMG shadow" width="600" height="300" align="center"/>
                  </div>
                   
                </div>

                <div class="col-12 col-md-12" id="disblock2">
                <div class="form-group mb-0 text-left font-weight-bold">
                  <label class="w-100 mb-0">Feature Image</label>
                  <span class="btn text-danger" id="showImg01"><span/>
                </div>	
                <div class="dropify-wrapper border-primary rounded">
                  <div class="dropify-message">
                    <i class="fa fa-cloud-upload" style="font-size: 50px !important;width:100%;"></i> 
                    <span class="d-none d-sm-inline-block d-md-inline-block btn btn-success">Drag and drop here</span>	
                    <p class="text-primary">Drag and drop a file here or click | Remember .jpg and .png files only</p>
                  </div>
                  <div class="dropify-loader"></div>
                  <div class="dropify-errors-container">
                  <ul></ul>
                  </div>
                  <input type="file" accept="image/*" name="upload_image" class="dropify" id="upload_image" aria-describedby="fileHelp">
                  <button type="button" class="dropify-clear">Remove</button>
                    <div class="dropify-preview">
                    <span class="dropify-render"></span>
                    <div class="dropify-infos">
                    <div class="dropify-infos-inner">
                    <p class="dropify-filename">
                    <span class="file-icon"></span> 
                    <span class="dropify-filename-inner"></span></p>
                    <p class="dropify-infos-message">Drag and drop or click to replace</p>
                    </div>
                    </div>
                    </div>
                      </div>
                          <div class="form-group mb-1 text-center file-uploaded-txt">
                            <label id="showfilename1"></label>
                          </div>													
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="font-weight-bold">Description</label>
                          <textarea rows="5" class="form-control hotels_details" name="hotels_details" required><?php echo $hotels_details;?></textarea>
                        </div>                     
                      </div>

                      <div class="col-md-6 mt-3">
                        <div class="form-group">
                          <label class="font-weight-bold">Phone Number 01</label>
                          <input class="form-control contact_number0000" type="text" value="<?php echo $phone_no1;?>" name="phone_no1" id="" required/>
                        </div>                     
                      </div>

                      <div class="col-md-6 mt-3">
                        <div class="form-group">
                          <label class="font-weight-bold">Phone Number 02</label>
                          <input class="form-control contact_number0000" type="text" value="<?php echo $phone_no2;?>" name="phone_no2" id=""/>
                        </div>                     
                      </div>   



	
                      <div class="col-md-6 mt-3">	
                        <div class="form-group row">
                          <label class="col-md-12 font-weight-bold">Province</label>	
                          <div class="col-md-12">	
                            <select class="form-control proDisCity proDisCityList" id="province" name="province">					
                              <?php echo $provinceList; ?>
                            </select>
                          </div>
                        </div>	
                      </div>

                      <div class="col-md-6 mt-3"></div>

                      <div class="col-md-6 mt-3">
                        <div class="form-group row">
                          <label class="col-md-12 font-weight-bold">Distric</label>
                          <div class="col-md-12">
                            <select class="form-control proDisCity proDisCityList" id="district" name="district">
                                <option value="" class="hidewithprovince">Select District</option>
                            </select>
                          
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mt-3">
                        <div class="form-group row">
                          <label class="col-md-12 font-weight-bold">Town</label>	
                          <div class="col-md-12">
                            <select class="form-control proDisCityList" id="city" name="city">
                                <option value="" class="hidewithprovince">Select Town</option>
                            </select>
                          </div>	
                        </div>	
                      </div>	
                

                      <div class="col-md-6 mt-3">
                        <div class="form-group">
                          <label class="font-weight-bold">Website</label>
                          <input class="form-control" type="text" value="<?php echo $website;?>" name="website" id=""/>
                        </div>                     
                      </div>

                      <div class="col-md-6 mt-3">
                        <div class="form-group">
                          <label class="font-weight-bold">General Email</label>
                          <input class="form-control" type="email" value="<?php echo $email;?>" name="email" id="" required/>
                        </div>                     
                      </div>  

                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Type Your Address</label>
                            <input type="text" class="form-control" name="eventLocation" value="<?php echo $eventLocation;?>" id="eventLocation" required>
                        </div>                        
                      </div>                        

                      <div class="col-md-12 mt-3">
                       <input type="hidden" id="changePointer" name="changePointer"/>
                       <div class="row">
                         <div class="col-12 col-md-8">
                          <div class="row mt-3">
                          
                              <input type="hidden" class="form-control" name="latitude" id="latitude" value="<?php echo $lati1;?>">
                              <input type="hidden" class="form-control" name="longatude" id="longatude" value="<?php echo $long1;?>">
                            <div class="col-12 form-group">
                              <label class="font-weight-bold">Select Your Place (Using this Location Icon)</label>
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

                       <div class="col-md-12 mt-3">
                          <div align="center">  
                              <!--<button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-info btn-lg">Upload Images for Gallery</button>-->
                              <div class="col-12 col-md-12" id="disblock2">
                                  <div class="form-group mb-0 text-left font-weight-bold">
                                    <label class="w-100 mb-0">Gallery Images (You can upload only 10 images) - please wait here 1 minute for uploading images</label>
                                    <span class="btn text-danger" id="showImg01"><span/>
                                  </div>	
                                  <div class="dropify-wrapper border-primary rounded">
                                    <div class="dropify-message">
                                      <i class="fa fa-cloud-upload" style="font-size: 50px !important;width:100%;"></i> 
                                      <span class="d-none d-sm-inline-block d-md-inline-block btn btn-success">Drag and drop here</span>	
                                      <p class="text-primary">Drag and drop a file here or click | Remember .jpg and .png files only</p>
                                    </div>
                                    <div class="dropify-loader"></div>
                                    <div class="dropify-errors-container">
                                    <ul></ul>
                                    </div>
                                    <input type="file"  name="multiple_files2" id="multiple_files2" multiple accept=".jpg, .png, .gif" class="dropify" aria-describedby="fileHelp">
                                    <button type="button" class="dropify-clear">Remove</button>
                                      <div class="dropify-preview">
                                      <span class="dropify-render"></span>
                                      <div class="dropify-infos">
                                      <div class="dropify-infos-inner">
                                      <p class="dropify-filename">
                                      <span class="file-icon"></span> 
                                      <span class="dropify-filename-inner"></span></p>
                                      <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                      </div>
                                      </div>
                                      </div>
                                        </div>
                                            <div class="form-group mb-1 text-center file-uploaded-txt">
                                              <label id="showfilename1"></label>
                                            </div>													
                                </div>
                                        <div class="col-12">
                                          <span id="error_multiple_files"></span>
                                        </div>                                   
                          </div> 
                       </div>                           
                      <div class="col-md-12 mt-5">
                        <div id="images_list2"></div>
                      </div>
                     
                      <div class="col-12 col-md-12">
                          <button type="submit" class="btn btn-warning btn-icon-split float-right">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                            </span>
                          <span class="text">Publish</span></button>
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


