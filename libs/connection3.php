<?php
global $conn;
/*
$servername = "localhost";
$username = "etakemel_grand";
$password = "882553477v";
$dbname = "etakemel_M784QL35";
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grandtoursdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  
