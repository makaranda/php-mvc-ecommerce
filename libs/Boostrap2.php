<?php

class Boostrap{

	function __construct(){
		$url = isset($_GET['url'])? $_GET['url']:null;
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		
		if(empty($url[0])){
			require 'controllers/index.php';
			$controller = new Index();
			$controller->Index();
			return false;
		}
		
		$file = 'controllers/'.$url[0].'.php';
		
		if(file_exists($file)){
			require $file;
		}else{
			require 'controllers/error.php';
			$controller = new Errors();
			$controller->Index();
			return false;
		}
		
		$controller = new $url[0];
		
		$controller->loadModel($url[0]);

		if(isset($url[2])){
			if(method_exists($controller,$url[1])){
				$controller->{$url[1]}($url[2]);
			}else{
				//echo 'Error';
				$this->error();
			}
				
			//return false;
		}else{
			if(isset($url[1])){	
				//return false;
				if(method_exists($controller,$url[1])){
					$controller->{$url[1]}();
				}else{
					//echo 'Error';
					$this->error();
				}				
			}else{
				$controller->Index();	
			}
		}
		
	}

	function error(){
		require 'controllers/error.php';
		$controller = new Errors();
		$controller->Index();
		return false;
	}

	
}	