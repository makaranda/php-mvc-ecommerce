<?php
global $conn;
/*
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','eazycabs_richwingrp97816146');
define('DB_USER','eazycabs_richwingrpuse979615');
define('DB_PASS','Laf111a41SF07agr1');


$servername = "localhost";
$username = "eazycabs_richwingrpuse979615";
$password = "Laf111a41SF07agr1";
$dbname = "eazycabs_richwingrp97816146";
*/

define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','mvcdb');
define('DB_USER','root');
define('DB_PASS','');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mvcdb";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

