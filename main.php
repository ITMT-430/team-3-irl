<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iRL</title>
  <link rel="stylesheet" href="css/screen.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>

<div id="appwrapper">
		<form action="main.php" method="post">
			Available<input id="availability" type="radio" name="available" value="1">
			Invisible<input id="availability" type="radio" name="available" value="0" checked="checked">
			<input type="submit" value="submit" name="submitbutton">
			<input type="text" name="message" placeholder="Just chillin' . . .">
		</form>
<h1>People available:</h1>

<?php 
//SET LOGGED ON USER
$id=1;
?>




<?php
if (isset($_POST['submitbutton'])){
include "connect.php";

//**********************************************
//
// UPDATE DATABASE WHEN BUTTON IS PUSHED
//
//**********************************************

		$available = $_POST['available'];
		$message =  $_POST['message'];
		
		$sql = "UPDATE user_table SET
			available='$available',
			message='$message'
			WHERE id='$id'
			";
		
		$result = $mysqli->query($sql);
		
		if ($mysqli->error) {
			echo $mysqli->error;
		}
		

//**********************************************
//
// DISPLAY ROWS FROM DATABASE
//
//**********************************************
$sql = "SELECT * FROM user_table WHERE available=1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='user-entry'>id: " . $row["id"]. " - Name: " . $row["name"] . "  Available: " . $row["available"] . "  Message: " . $row["message"]. "</div>";
    }
} else {
    echo "0 results";
}

//calculate number of users that are available
if ($result = $mysqli->query("SELECT * FROM test WHERE available=1")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();
}
?>
    
  </div>
  
</body>
</html>
