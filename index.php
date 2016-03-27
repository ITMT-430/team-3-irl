<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iRL</title>
  <link rel="stylesheet" href="screen.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>

<div id="appwrapper">
    Available<input id="availability" type="radio" name="availablility" value="available">
    Invisible<input id="availability" type="radio" name="availablility" value="invisible">
<h1>People available:</h1>
<?php 
  
//include passwords stored out of web root
include '../passwords.php';  
  
$mysqli = new mysqli("localhost", $dbusername, $dbpassword, "irl");
$sql = "SELECT * FROM user_table where available=1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='user-entry'>id: " . $row["id"]. " - Name: " . $row["name"] . "</div>";
    }
} else {
    echo "0 results";
}

if ($result = $mysqli->query("SELECT * FROM test")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();
?>
    
  </div>
  
</body>
</html>
