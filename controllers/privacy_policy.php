<?php

class Privacy_policy extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('privacy_policy/index');
	}

}