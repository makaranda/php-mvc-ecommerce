<?php

class Sitemap extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('sitemap/index');
	}

}