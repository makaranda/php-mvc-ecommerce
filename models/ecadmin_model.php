<?php

class Ecadmin_Model extends Model{

	public function __construct(){
		//echo 'Login Model ';
		parent::__construct();
	}
	
	public function run(){
		$sth = $this->db->prepare("SELECT * FROM admin_tbl WHERE user_name = :username AND password = MD5(:password)");
		$sth->execute(array(
			':username' => $_POST['username'],
			':password' => $_POST['password']
		));

		//$data = $sth->fetchAll();
		$count = $sth->rowCount();

		$row = $sth->fetch();
		$userId = $row['id'];
		$userType = 'admin';
		//print_r($data);

		if($count == 1){
			Session::init();
			Session::set('loggedIn',true);
			Session::set('username',$_POST['username']);
			Session::set('password',$_POST['password']);
			Session::set('userId',$userId);
			Session::set('userType',$userType);
			header('location: ../dashboard');
		}else {
			header('location: ../ecadmin');
		}
	}
	
}	