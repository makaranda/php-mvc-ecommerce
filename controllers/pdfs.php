<?php

class Pdfs extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		//$this->view->render('pdf/index');
		header('Location: ../assets/genaratepdf/index.php');
	}



}