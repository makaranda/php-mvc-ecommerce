<?php

class Help extends Controller{

	function __construct(){
		parent::__construct();		
	}
	
	function index(){
		$this->view->render('help/index');
	}

/*	public function other($arg = false){
		//echo 'We are inside Others';
		//echo 'Optional: '.$arg;
		
		require 'models/help_model.php';
		$model = new Help_model();

		$this->view->blah = $model->blah();
	}	
*/
}