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
                        <h2>Buying Guide</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo URL;?>">Home</a>
                            <span>Buying Guide</span>
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
					<h2>Buying Guide</h2>
				</div>
				<div class="col-12 col-sm-12 col-md-12">
					<p>Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa. Nam convallis dui sed pulvinar bibendum. Donec tincidunt sed lorem in venenatis. Nam malesuada molestie ex eu faucibus.</p>
					<p>Vestibulum tortor diam, tempus sed dui id, maximus tristique metus. Proin et ligula eget neque tristique ullamcorper eget sed turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean a lobortis ante, vel tincidunt risus. In eget auctor orci. Donec tincidunt mauris ut tellus mollis, at mattis felis convallis.</p>
					<p>Cras efficitur fermentum velit sit amet vulputate. Aliquam vitae feugiat libero. Sed ut scelerisque lacus. Donec viverra tellus nunc, in porta tortor sodales id. Integer eget neque eu justo laoreet rhoncus.Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa.Donec ultricies, mi vel accumsan semper, ipsum lectus lacinia erat, et luctus orci eros sit amet orci. Vestibulum ut aliquam felis. Fusce non nisi at velit hendrerit elementum. Integer blandit gravida enim eu tempus. Aenean a risus massa.</p>
					<p>Sed rhoncus, metus non scelerisque feugiat, augue tellus consequat urna, et tincidunt magna est nec metus. Ut et consectetur augue. Maecenas dictum metus ac porttitor tincidunt. Fusce tortor enim, blandit porttitor scelerisque sit amet, malesuada nec enim. Maecenas ut odio et magna cursus congue. Fusce ut turpis nec mi congue convallis varius eu lorem.</p>
					<p>Aliquam maximus, nulla a tempus rhoncus, lorem mauris feugiat erat, eget dignissim sapien nulla maximus velit. Aliquam mollis, purus id dapibus commodo, lorem diam faucibus mi, non consectetur nunc odio sit amet ipsum. Quisque at arcu aliquet, congue tellus non, volutpat justo</p>
				</div>
			</div>
							
		</div>
	</div>		
</div>
      
