<?php

class Errors extends Controller{

	function __construct(){
		parent::__construct();		
		//echo 'This is an Error';
	
	}	

	function index(){
		$this->view->msg = "This Page doesnt exist";
		$this->view->render('error/index');
	}

}