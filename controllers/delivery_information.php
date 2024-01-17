<?php

class Delivery_information extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('delivery_information/index');
	}

}