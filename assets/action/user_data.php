<?php
session_start();
$user_data = array(); 
//name name2 address province district zipcode email mobile otheraddress addressnew
if(isset($_POST['action'],$_POST['name'],$_POST['name2'],$_POST['address'],$_POST['province'],$_POST['district'],$_POST['zipcode'],$_POST['email'],$_POST['mobile']) && $_POST['action'] == 'checkout_user_details'){  
    
    $name = $_POST['name'];
    $name2 = $_POST['name2'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $otheraddress = $_POST['otheraddress'];
    $addressnew = $_POST['addressnew'];
    $shipCharge = $_POST['shipCharge'];
    
    $user_data['user_details'] = array( 
        "name" => "$name",  
        "name2" => "$name2",  
        "address" => "$address", 
        "province" => "$province",
        "district" => "$district",
        "zipcode" => "$zipcode",
        "email" => "$email",
        "mobile" => "$mobile",
        "otheraddress" => "$otheraddress",
        "addressnew" => "$addressnew",
        "shipCharge" => "$shipCharge"
    ); 
    $_SESSION['orderedDate'] = date('Y-m-d H:i:s');
    $_SESSION['user_details'] = $user_data['user_details'];
}    