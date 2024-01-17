<?php

class Index extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index(){
		$this->view->render('index/index');
	}

	function details(){
		$this->view->render('index/index');
	}

	/*function events()
	{
		$this->view2->render('listview/index');
	}

	function singleevent()
	{
		$this->view2->render('singleview/index');
	}*/
}