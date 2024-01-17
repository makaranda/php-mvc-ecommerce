<?php

class Hotels extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('listview/index');
	}

	function singlehotel()
	{
		$this->view->render('singleview/index');
	}
}