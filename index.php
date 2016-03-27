<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iRL</title>
  <link rel="stylesheet" href="screen.css">
</head>
<body>

<div id="appwrapper">

<?php
$mysqli = new mysqli("localhost", "root", "Rey@120133", "irl");
$sql = "SELECT * FROM test";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}

if ($result = $mysqli->query("SELECT * FROM test")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();
?>


	
    Available<input id="availability" type="radio" name="availablility" value="available">
    Invisible<input id="availability" type="radio" name="availablility" value="invisible">
    
    <h1>People available:</h1>	    
    
    <h2>Hello World</h2>
    
    
    
  </div>
  
</body>
</html>
