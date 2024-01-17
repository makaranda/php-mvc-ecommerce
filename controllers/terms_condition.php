<?php

class Terms_condition extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('terms_condition/index');
	}

}