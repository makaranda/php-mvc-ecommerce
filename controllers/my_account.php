<?php
session_start();
class My_account extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function index()
	{
		//echo $_SESSION['test'];
		//var_dump($_SESSION);
		if(isset($_SESSION['loggedInUser'],$_SESSION['user_name'],$_SESSION['user_password'],$_SESSION['user_id']) && $_SESSION['loggedInUser'] == true){
			$this->view->render('my_account_user/index');
		}else{
			$this->view->render('my_account_login/index');
		}
		
	}

}