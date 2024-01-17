<?php

class Event extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index(){
		//require 'models/login_model.php';
		//$model = new Login_model();	
		
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			$this->view->render('addevent/index');
			//exit;
		}else{
			header('Location: '.URL.'dashboard');	
		}		
		
	}	

	function run(){
		//require 'models/login_model.php';
		//$model = new Login_model();		
		$this->model->run();
	}
}