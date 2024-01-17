<?php
ini_set('session.gc_maxlifetime', 3600);
session_start();
$data = unserialize($_COOKIE['fanz_shopping_cart'], ["allowed_classes" => false]);
echo 'cart cookies ';
var_dump($data); 

echo '<br>';
echo '<br>';
echo '<br>';

echo 'cart session ';
var_dump($_SESSION['shopping_cart']);

if (isset($_COOKIE['fanz_shopping_cart'])) {
    unset($_COOKIE['fanz_shopping_cart']); 
    setcookie('fanz_shopping_cart', null, time()-3600); 
    return true;
    $_SESSION['cart_message'] = 'updated';
} else {
    $_SESSION['cart_message'] = 'not_updated';
    return false;
}

echo '<br>';
var_dump($_SESSION['cart_message']);
