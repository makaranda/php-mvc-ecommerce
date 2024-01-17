<?php

class Ordercomplete extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('ordercomplete/index');
	}
	//var_dump($_GET);

	/*function singlehotel()
	{
		$this->view->render('singleview/index');
	}*/
}