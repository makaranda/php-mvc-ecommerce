<?php

class View2{

	function __construct(){
		//echo 'This is a View </br>';
	}
	
	public function render($name){
		require 'views/header_dashboard.php';
		require 'views/'.$name.'.php';
		require 'views/footer_dashboard.php';
	}	
	
}	
