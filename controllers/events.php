<?php

class Events extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('listview/index');
	}

	function singleevent()
	{
		$this->view->render('singleview/index');
	}
}