<?php 
//include passwords stored out of web root
include '../passwords.php';  

//connect to database  
$mysqli = new mysqli("localhost", $dbusername, $dbpassword, "irl");
?>
