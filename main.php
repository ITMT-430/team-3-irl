<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iRL</title>
  <link rel="stylesheet" href="css/screen.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body class="citybackground">

<ul>
  <li><a href="main.php">Home</a></li>
  <li><a href="settings.php">Settings</a></li>
</ul>

<div id="appwrapper">
		<form action="main.php" method="post">
		    <label>User ID</label>
		    <input id="userid" type="text" name="userid" value="1">
		    
		    <label>What would you like to do?</label>
		    <select name="activity" id="activity">
			  <option>Go to the BOG</option>
			  <option>Eat at the Commons</option>
			  <option>Study Session</option>
			  <option>Adventure into the city</option>
			</select>
			
			<label>Available for (mintues)</label>
            <input id="availability" type="number" name="available" min="10" max="120" step="10">
		
			
		    <input type="submit" value="submit" name="submitbutton">
		</form>
<h1>People available:</h1>

<?php
if (isset($_POST['submitbutton'])){

//connect to database  
include "connect.php";

//**********************************************
//
// UPDATE DATABASE WHEN BUTTON IS PUSHED
//
//**********************************************
  
  
  //TO-DO: ESCAPE SINGLE QUOTE IN MESSAGE, THEY MESS UP THE DATABASE UPDATE
  $available = $_POST['available'];

  //find the date when available should expire
  date_default_timezone_set('CST6CDT');
  $datetime = date('Y-m-d h:i:sa', strtotime('+'.$available.' minutes'));

  //Take in activity that user wants
  $activity =  $_POST['activity'];

  //SET LOGGED ON USER
  $id= $_POST['userid'];


  $sql = "UPDATE user_table SET
      available='$datetime',
      activity='$activity'
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
$sql = "SELECT * FROM user_table";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='user-entry'>" 
          .$row["id"]. 
          "<div class='user-name'>" 
          .$row["name"] .
          "</div><div class='time'> Available Until: " 
          . $row["available"] . 
          "</div>  <div class='activity'>Wants to: " 
          . $row["activity"]. 
          "</div></div>";
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
