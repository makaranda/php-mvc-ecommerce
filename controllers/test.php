<?php

class Test extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('test/index');
	}

}