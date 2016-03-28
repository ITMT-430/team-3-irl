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
		</form>
<h1>People available:</h1>

<?php 
//include passwords stored out of web root
include '../passwords.php';  

//connect to database  
$mysqli = new mysqli("localhost", $dbusername, $dbpassword, "irl");
$sql = "SELECT * FROM user_table WHERE available=1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='user-entry'>id: " . $row["id"]. " - Name: " . $row["name"] . "</div>";
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

//Determine who is logged in and store that in a variable?



/* close connection */
$mysqli->close();
?>


<?php
//Update database when button is pushed
	if (isset($_POST['submitbutton'])){
		$availabile = $_POST['available'];
		echo $available;
	} 
?>


    
  </div>
  
</body>
</html>
