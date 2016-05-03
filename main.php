<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iRL</title>
  <link rel="stylesheet" href="css/screen.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, scale-to-fit=no">
</head>

<body class="citybackground">
<?php
  //Call login.php to test out the authintizcation.
  include 'login.php';
  //$username="scarpen3";
  include 'nav.php';
  include 'connect.php';
  $stmt = $mysqli->prepare("SELECT * FROM user_table WHERE username='?'");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  if($num == '0'){
      header("Location: signup.php");
  } else {
  }
?>

<div id="appwrapper">
   <div class="header">
    <img src="images/logo.png" />
 	 </div>
   
    <form action="main.php" method="post">
    	<fieldset>
    	<legend></legend>
      <label>What would you like to do?</label>
      <select name="activity" id="activity">
        <option>Go to the BOG</option>
        <option>Eat at the Commons</option>
        <option>Study Session</option>
        <option>Adventure into the city</option>
        <option>Go to bar</option>
      </select>
      
      <label>Minutes you're available (max 120)</label>
      <input id="availability" type="number" name="availablefor" step="5" min="0" max="120" value="0">
      <input type="submit" value="Update Status" name="submitbutton">
      </fieldset>
    </form>
    
<div id="peopleholder"></div>

<script>
	$(document).ready(function(){
	$("#availability").change(function(){
			if($("#availability").val() > 120){
			alert("Invalid Input!");
		};
	
		})
	
	})
</script>


<?php
if (isset($_POST['submitbutton'])){

//**********************************************
//
// UPDATE DATABASE WHEN BUTTON IS PUSHED
//
//**********************************************
 	$valid=true; 
	
  //TO-DO: ESCAPE SINGLE QUOTE IN MESSAGE, THEY MESS UP THE DATABASE UPDATE
  $availablefor = $_POST['availablefor'];
		if ($availablefor > 120 || $availablefor < 0)	{
			$valid = false;
		}
  //find the time when available should expire
  date_default_timezone_set('CST6CDT');
  
  //calculate time that user goes dark
  if ($availablefor > 0){
    $expiration = ((time()/60)+$availablefor);
  }
  else {
    $expiration = 0;
  }
  
  //Take in activity that user wants
  $activity =  $_POST['activity'];
  
 $stmt = $mysqli->prepare("UPDATE user_table SET
      available=?,
      activity=?
      WHERE username=?");
  $stmt->bind_param("dss", $expiration, $activity, $username);
  $stmt->execute();

if ($valid) {
	  $result = $mysqli->query($sql);


  if ($mysqli->error) {
      echo $mysqli->error;
  }
}

}
  

 
/* close connection */
$mysqli->close();

?>
   
<script>
//Update database via ajax on interval
  
$(document).ready(function(){
  
  $.ajax({
      url: "displaydatabase.php",
      })
    .done(function(data){
      $('#peopleholder').html(data);
    })
  
  
//load every 5 seconds
  setInterval( function(){
    
    $.ajax({
      url: "displaydatabase.php",
      })
    .done(function(data){
      $('#peopleholder').html(data);
    })
    
  }, 5000);

})

</script>
    
</div>
  
</body>
</html>