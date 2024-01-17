<?php

class User_password_reset extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		$this->view->render('user_password_reset/index');
	}

}