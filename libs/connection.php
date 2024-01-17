<?php
global $conn;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mvcdb";

/*
$servername = "localhost";
$username = "eazycabs_richwingrpuse979615";
$password = "Laf111a41SF07agr1";
$dbname = "eazycabs_richwingrp97816146";
*/
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  
