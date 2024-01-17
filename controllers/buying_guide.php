<?php

class Buying_guide extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('buying_guide/index');
	}

}