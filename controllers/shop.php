<?php

class Shop extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index(){
		$this->view->render('listview/index');
	}
	
	function single()
	{
		$this->view->render('singleview/index');
	}
}