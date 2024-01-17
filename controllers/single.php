<?php

class Single extends Controller{

	function __construct(){
		parent::__construct();
		//echo 'We are in Index';

	}	

	function shop()
	{
		$this->view->render('singleview/index');
	}
	//var_dump($_GET);

	/*function singlehotel()
	{
		$this->view->render('singleview/index');
	}*/
}

// Beverages Grocery Household Fruits Vegetables Fresh Meat Ocean Foods