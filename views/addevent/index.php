<?php
    include('libs/connection.php');
    $date_time = date('Y-m-d H:i:s');

    global $adsid;    
    global $provinceList;

    $query = "SELECT id,post_province_name FROM post_province GROUP BY post_province_name ORDER BY post_province_name ASC";	
    $result = mysqli_query($conn, $query);
    
    
    while($row = mysqli_fetch_array($result))
    {
        $provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	   
         
       //$provinceList .= '<option value="'.$row["id"].'">'.$row["post_province_name"].'</option>';	
    }

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    
    $time_start = microtime_float();
    $adsid = ''.substr(round(microtime_float()),8).''.date('is');
    //var_dump($_FILES);
    if(isset($_POST['pageType'],$_POST['pages_max'],$_POST['title'],$_FILES['upload_image']["name"],$_POST['events_details'],$_POST['start_date'],$_POST['close_date'],$_POST['phone_no1'],$_POST['phone_no2'],$_POST['website'],$_POST['email'],$_POST['eventLocation'],$_POST['long'],$_POST['lati'])){  
  
      
      global $feature_image;
        $pageType = $_POST['pageType'];
        $pages_max = $_POST['pages_max'];
        $title = $_POST['title'];
        //$upload_image = $_POST['upload_image'];
        $events_details = $_POST['events_details'];
        $start_date = $_POST['start_date'];
        $close_date = $_POST['close_date'];
        $phone_no1 = $_POST['phone_no1'];
        $phone_no2 = $_POST['phone_no2'];
        $website = $_POST['website']; 
        $email = $_POST['email'];
        $eventLocation = $_POST['eventLocation'];
        //$long = $_POST['long'];
        //$lati = $_POST['lati'];
        
        $country = $_POST['country'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        
        $changePointer = str_replace('LatLng(','',$_POST['changePointer']);
        $changePointer2 = str_replace(')','',$changePointer);
        $changePointer3 = str_replace(' ','',$changePointer2);
        $allchangePointer = explode(',',$changePointer3);
   
        
        if(isset($changePointer) && $changePointer != ''){
          $long = $allchangePointer[0];
          $lati = $allchangePointer[1];
        }else{
          $long = '79.8612';
          $lati = '6.9271';
        }

        include('assets/action/uploadfeature.php');  

        if($feature_image != ''){
          $feature_image = $feature_image;
        }else{
          $feature_image = 'sample.png';
        }       

        $query = "INSERT INTO pages_tbl (`page_id`,`page_type`,`gallery_id`,`title`,`country`,`province`,`district`,`city`, `description`, `duration`, `start_date`, `expire_date`, `feature_image`, `feature_on_home`, `phone_number1`, `phone_number2`, `website`, `email_address`, `longitude`, `latitude`, `location_address`,`date_time`) 
        VALUES ('".$pages_max."','".$pageType."','".$pages_max."','".$title."','".$country."','".$province."','".$district."','".$city."','".$events_details."','0','".$start_date."','".$close_date."','".$feature_image."','on','".$phone_no1."','".$phone_no2."','".$website."','".$email."','".$long."','".$lati."','".$eventLocation."','".$date_time."')";
        mysqli_query($conn, $query);

        $query2 = "SELECT * FROM gallery_temp_tbl WHERE page_type = '$pageType'";
        $result2 = mysqli_query($conn, $query2);

/* 
        $query1 = "SELECT MAX(id) AS pages_max FROM pages_tbl WHERE page_type = '$pageType'";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_assoc($result1); */
    
        //$pages_max = ($row1['pages_max']);

 		if(!empty($_SESSION["arrayImages"])){
				$count = 0;
				//$pages_max = 1545;
				//$values = '';
			foreach($_SESSION["arrayImages"] as $keys => $values){
				$count ++; 
				if($count <= 10){
					
				$pageType = $values["pageType"];
				$image_name = $values["image_name"];
				$image_extension = $values["image_extension"];
				$image = ''.$image_name.'.'.$image_extension.'';
					
				//echo ''.$values["pageType"].'/'.$values["image_name"].'.'.$values["image_extension"].'/'.$values["image_name"].'';
				//echo '<br>';
				
				$value[] = "('$pages_max','$pageType','$image','$date_time')";
				
				}
			}
				$insertSQL = "INSERT INTO `gallery_tbl`(`page_id`, `page_type`, `image_name`, `date_time`) VALUES ";
				$insertSQL .= implode(',',$value);
				mysqli_query($conn, $insertSQL);
					
				//unset($_SESSION['feature_image']);
				unset($_SESSION['arrayImages']);	
		}
       // echo $query;

        echo '<script>window.location.href = "'.URL.'dashboard/'.$pageType.'";</script>';
    }else{
        $deleteTable = "TRUNCATE TABLE gallery_temp_tbl";
        mysqli_query($conn, $deleteTable);        
    }

?>
  
  <!-- Begin Page Content -->
  <div class="container-fluid">
  <span id="testing"></span>
    <!-- Content Row -->
    <div class="row">
         <div class="col-lg-12 mb-4">
             <div class="card shadow mb-4">
					<!-- Card Header - Accordion -->
					<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
					  <h6 class="m-0 font-weight-bold text-primary">Add Events</h6>
					</a>
					<!-- Card Content - Collapse -->
					<div class="collapse show" id="collapseCardExample">
					  <div class="card-body">
             <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary"></h6>
							</div>
              <form method="POST" action="" enctype="multipart/form-data">
              <input type="hidden" class="form-control capitalize" name="pageType" value="events" id="pageType">
              <input type="hidden" class="form-control capitalize" name="pages_max" value="<?php echo $adsid;?>" id="pages_max">
              <input class="form-control" type="hidden" name="country" value="Sri Lanka"/> 
              <input class="form-control" type="hidden" id="hiddentown" name="hiddentown" value=""/>
              <input class="form-control" type="hidden" id="neatest_town_past" value=""/>
              <input class="form-control" type="hidden" id="hiddendistrictName" name="hiddendistrictName" value=""/>
              <input class="form-control" type="hidden" id="hiddenprovince" name="hiddenprovince" value=""/>
              <input class="form-control" type="hidden" id="hiddendistrict" name="hiddendistrict" value=""/>
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="font-weight-bold">Title</label>
                        <input type="text" class="form-control capitalize" name="title" placeholder="" required>
                      </div>                     
                    </div>

                    <div class="col-md-12">
                      <div class="form-group text-left">
                         <label class="font-weight-bold w-100 float-left uploadingIMG d-none">Feature Image Preview (upload file size is 600px X 300px)</label>
                         <img id="blah" src="" alt="your image" class="w-100 uploadingIMG shadow d-none" width="600" height="300" align="center"/>
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
                      <input type="file" accept="image/*" name="upload_image" class="dropify" id="upload_image" aria-describedby="fileHelp" required>
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
                              <textarea rows="5" class="form-control events_details" name="events_details"></textarea>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Start Date</label>
                              <input class="form-control formdatepicker" type="date" name="start_date" id=""/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Close Date</label>
                              <input class="form-control formdatepicker" type="date" name="close_date" id=""/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Phone Number 01</label>
                              <input class="form-control contact_number0000" type="text" name="phone_no1" id=""/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">Phone Number 02</label>
                              <input class="form-control contact_number0000" type="text" name="phone_no2" id=""/>
                            </div>                     
                          </div>   

                          <div class="col-md-6 mt-3">	
					<div class="form-group row">
						<label class="col-md-12 font-weight-bold">Province</label>	
						<div class="col-md-12">	
							<select class="form-control proDisCity proDisCityList" id="province" name="province">
								<!--<option value="">Select Province</option>-->
								<?php						
										
										echo '<option value="">Select Province</option>';
									
								?>					
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
                              <input class="form-control" type="text" name="website" id=""/>
                            </div>                     
                          </div>

                          <div class="col-md-6 mt-3">
                            <div class="form-group">
                              <label class="font-weight-bold">General Email</label>
                              <input class="form-control" type="email" name="email" id=""/>
                            </div>                     
                          </div>  

                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Type Your Address</label>
                                <input type="text" class="form-control" name="eventLocation" id="eventLocation">
                            </div>                        
                          </div>                        

                          <div class="col-md-12 mt-3">
                           <input type="hidden" id="changePointer" name="changePointer"/>
                           <div class="row">
                             <div class="col-12 col-md-8">
                              <div class="row mt-3">
                                <input type="hidden" class="form-control" name="latitude" id="latitude" value="6.9271">
                                <input type="hidden" class="form-control" name="longatude" id="longatude" value="79.8612">
                                <div class="col-12 form-group">
                                  <label class="font-weight-bold">Select Your Place (Using this Location Icon)</label>
                                </div>
                                <div class="col-12 form-group">
                                  <div style="width: 100%; height: 100vh" id="issMap"></div>
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
                                        <input type="file"  name="multiple_files" id="multiple_files" multiple accept=".jpg, .png, .gif" class="dropify" aria-describedby="fileHelp">
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
                            <div id="images_list"></div>
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