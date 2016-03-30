<?php 
//include passwords stored out of web root
include '../passwords.php';  

//connect to database  
$mysqli = new mysqli("localhost", $dbusername, $dbpassword, "irl");
$sql = "SELECT * FROM user_table WHERE available=1";
$result = $mysqli->query($sql);

?>
