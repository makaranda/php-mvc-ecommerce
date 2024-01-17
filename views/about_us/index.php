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
                        <h2>About Us</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo URL;?>">Home</a>
                            <span>About Us</span>
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
					<h2>About Us</h2>
				</div>
				<div class="col-12 col-sm-12 col-md-12">	
					<em><strong>Welcome to the International Foodstuff Company.</strong></em><br>IFCO is an independent seafood company located in Homagama and Pepiliyana Sri Lanka. Our main business is producing and exporting the finest seafood, fresh fruits, and vegetable products to ( name of the countries).
					<p>&nbsp;</p>
					<p>We are proudly owning 1100 Acres of seven farms and expanding into 1200 Acres with 7 farms. IFCO is capable of providing logistics facilities catering to cold chain requirements.</p>
					<p>With a team that combines more than 40years of experience in the seafood business, we know the importance of supplying our customers with the right quality to the right price at the right time. We have a strict focus on the quality of both the products we offer and of our customer service.</p>
					<p>We have all the facilities to provide logistics facilities catering to end-to-end cold chain requirements, and therefore, we offer fast logistic solutions in order to supply our products to the world market with a minimum of delay and hassle for you as our customer.</p>
					<p>With expertise and close relationships we built over the years since (name of the founder) founded IFCO in 1971, our target markets have come to rely on us, knowing that they can get ocean finest quality from us.</p>
					<p>Our core values are quality, care, practice, customer focus, and responsibility.</p>
				</div>	
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12">
					<div class="row justify-content-center">
						<div class="col-12 col-sm-12 col-md-12 text-center">
							<img src="<?php echo URL;?>assets/images/hospital-freebies.jpg" class="img-fluid">
						</div>
					</div>
				</div>		
				
			</div>	
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-12">				
					<h4>Why Should&nbsp;<strong>IFCO</strong></h4>
					<p>IFCO is well established and family-owned business and recognized food distribution solution capable of meeting your business’s needs. With our wide logistical network, we provide our customers with a comprehensive product offering at a competitive price.<br>Delivering high quality fresh and frozen seafood to the trade, IFCO gives customers the confidence to run their business smoothly and efficiently. We have an experienced team who can provide our customers with any assistance that may be required. Our new online ordering system will allow customers to place their orders via computers or smartphones with few clicks. IFCO also provides special offerings and loyalty programs to our loyal customers.<br>With our rapid improvement over the years, IFCO continues to source the freshest seafood, along with our other products of fresh fruit and vegetables frozen and chilled.</p>
					<p>We do our best to improve our food service distribution that not only ensures but exceeds customer satisfaction.</p>
				</div>
			</div>

				
		</div>
	</div>		
</div>
      
