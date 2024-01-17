<?php

class Adminprofile extends Controller{

	function __construct(){
		parent::__construct();		
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'login');
			exit;
		}	
		$this->view2->js = array('dashboard/js/myscript.js');		
	}
	
	function index(){
		$userId = explode('/',$_GET['url']);
		$userId = $userId[2];
		
		
		
		if(isset($userId) && $userId != ''){
			$this->view2->render('adminprofile/index');
		}else{
			
			Session::destroy();			
			header('Location: ../login');
			exit;
		}	
		
	}

	public function other($arg = false){
		//echo 'We are inside Others';
		//echo 'Optional: '.$arg;
		
		//require 'models/dashboard_model.php';
		//$model = new Dashboard_Model();

		//$this->view2->blah = $model->blah();
	}
}