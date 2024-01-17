<?php

class Dashboard extends Controller{
	

	function __construct(){
		parent::__construct();
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->js = array('dashboard/js/myscript.js');
	}
	
	function index(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('dashboard/index');
	}

	function products(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$products = 'Products';
		$this->view2->render('products/index');
	}

	function orders(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$orders = 'Orders';
		$this->view2->render('orders/index');
	}

	function addproduct(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('addproduct/index');
	}


	function editproduct()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('editproduct/index');
	}	
	
	function routemaps(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$events = 'Doutemaps';
		$this->view2->render('routemaps/index');
	}
	
	
	function events(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$events = 'Events';
		$this->view2->render('events/index');
	}
	
	
	function hotels(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$events = 'Events';
		$this->view2->render('hotels/index');
	}
	
	function restaurants(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$events = 'Restaurants';
		$this->view2->render('restaurants/index');
	}

	function fetchevents()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$sth = $this->db->prepare("SELECT * FROM events_tbl");
		$sth->execute();

		$data = $sth->fetchAll();
		//$count = $sth->rowCount();
		//$row = $sth->fetch();	
		echo $data;	
	}

	function fetchhotels()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$sth = $this->db->prepare("SELECT * FROM hotels_tbl");
		$sth->execute();

		$data = $sth->fetchAll();
		//$count = $sth->rowCount();
		//$row = $sth->fetch();	
		echo $data;	
	}

	function addroutemap(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('addroutemap/index');
	}

	function addevent(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('addevent/index');
	}

	function addhotel(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('addhotel/index');
	}

	function addrestaurant(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('addrestaurant/index');
	}

	function vieworder()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}
		$orders = 'Orders';
		$this->view2->render('vieworder/index');
	}


	function vieworderitem()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}
		$orders = 'Orders';
		$this->view2->render('vieworderitem/index');
	}
	
	
	function editorders()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}
		$orders = 'Orders';
		$this->view2->render('editorders/index');
	}

	function editdestination()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('editdestination/index');
	}

	function editevents()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('editevent/index');
	}

	function edithotels()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('edithotels/index');
	}

	function editrestaurant()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('editrestaurant/index');
	}

	function deleteorder()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		
		$orderId = explode('/',$_GET['url']);
		$orderId = $eventId[2];
		$customerID = $eventId[2];
		
		if(isset($orderId,$customerID) && $orderId != '' && $customerID != ''){
			$oID =  ''.$orderId.'';
			$cId = ''.$customerID.'';
		}else{
			$oID = '';
			$cId = '';
		}
		//$this->view2->render('editevent/index');
		header('Location: '.URL.'assets/action/deleteorder.php?ordId='.$oID.'&cusId='.$cId.'&page_type=orders');
	}

	function deleteproduct()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		
		$eventId = explode('/',$_GET['url']);
		$eventId = $eventId[2];
		
		if(isset($eventId) && $eventId != ''){
			$eID =  ''.$eventId.'';
		}else{
			$eID = '';
		}
		//$this->view2->render('editevent/index');
		header('Location: '.URL.'assets/action/deleteproduct.php?proId='.$eID.'&page_type=products');
	}

	function deletehotels()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		
		$eventId = explode('/',$_GET['url']);
		$eventId = $eventId[2];
		
		if(isset($eventId) && $eventId != ''){
			$eID =  ''.$eventId.'';
		}else{
			$eID = '';
		}
		//$this->view2->render('editevent/index');
		header('Location: '.URL.'assets/action/deletehotels.php?hotelId='.$eID.'&page_type=hotels');
	}

	function deleterestaurant()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		
		$restaurantId = explode('/',$_GET['url']);
		$restaurantId = $restaurantID[2];
		
		if(isset($restaurantID) && $restaurantID != ''){
			$restID =  ''.$restaurantID.'';
		}else{
			$restID = '';
		}
		//$this->view2->render('editevent/index');
		header('Location: '.URL.'assets/action/deleterestaurant.php?restaurantId='.$restID.'&page_type=restaurants');
	}

	function adminprofile(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}

		$userId = explode('/',$_GET['url']);
		$userId = $userId[2];
		
		
		
		if(isset($userId) && $userId != ''){
			$this->view2->render('adminprofile/index');
		}else{
			
			Session::destroy();			
			header('Location: ../');
			exit;
		}
	}

	function cities()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('cities/index');
	}

	function pages()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('pages/index');
	}

	function theme()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('theme/index');
	}

	function header()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('header/index');
	}

	function footer()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('footer/index');
	}

	function slider()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('slider/index');
	}
	
	function inches(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('inches/index');	    
	}

	function brands()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('brands/index');
	}

	function categories()
	{
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}	
		$this->view2->render('categories/index');
	}

	function logout(){
		Session::destroy();			
		header('Location: ../');
		exit;
	}	
	
	function insert(){
		Session::init();	
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('Location: '.URL.'');
			exit;
		}

		$this->model->insert();
	}
}