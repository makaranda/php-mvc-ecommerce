<?php
session_start();

if(isset($_POST['action'])){
	
	if($_POST['action'] == 'remove'){
		
		foreach($_SESSION["arrayImages"] as $keys => $values){
			if($values['image_name'] == $_POST['image_id']){
				unset($_SESSION["arrayImages"][$keys]);
			}
		}
		
	}

	if($_POST['action'] == 'emptyTable'){	
		
		unset($_SESSION["arrayImages"]);				
		
	}	




	
}

