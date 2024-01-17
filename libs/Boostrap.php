<?php

class Boostrap{

	function __construct(){
		$url = isset($_GET['url'])? $_GET['url']:'';
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		
		if(empty($url[0])){
			require 'controllers/index.php';
			$controller = new Index();
			$controller->Index();
			return false;
		}
		
		$file = 'controllers/'.$url[0].'.php';
		
		if(file_exists($file) && $file != 'contact-us.php'){
			require $file;
			//echo 'Not';
		}else{
			/*if(isset($url[1])){
				require $file;
			}else if(isset($url[2])){
				require $file;
			}else{
			*/	require 'controllers/error.php';
				$controller = new Errors();
				$controller->Index();
				return false;
			//}
		}
		//echo $url[0];
		$controller = new $url[0];
		
		$controller->loadModel($url[0]);

		if(isset($url[2])){
			if(method_exists($controller,$url[1])){
				$controller->{$url[1]}($url[2]);
			}else{
				//echo 'Error';
				//var_dump($url[3]);
					if(isset($url[2]) && $url[0] == 'shop'){
						$controller->Index();
					}elseif(isset($url[3]) && $url[3] != ''){
						$this->error();
					}elseif(isset($url[2]) && $url[0] == 'viewuserorder'){
						$controller->Index();
					}elseif(isset($url[3]) && $url[3] != ''){
						$this->error();
					}else{	
						$this->error();
					}
			}
				
			//return false;
		}else{
			if(isset($url[1])){	
				//return false;
				if(method_exists($controller,$url[1])){
					$controller->{$url[1]}();
				}else{
					//echo 'Error';
					//var_dump($url[3]);
					
					if(isset($url[1]) && $url[0] == 'shop'){
						$controller->Index();
					}elseif(isset($url[2]) && $url[2] != ''){
						$controller->Index();
					}elseif(isset($url[3]) && $url[3] != ''){
						$controller->Index();
					}elseif(isset($url[4]) && $url[4] != ''){
						$controller->Index();
					}elseif(isset($url[1]) && $url[0] == 'viewuserorder'){
						$controller->Index();
					}elseif(isset($url[3]) && $url[3] != ''){
						$this->error();
					}else{	
						$this->error();
					}					
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