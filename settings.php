<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>iRL Login</title>
    <link rel="stylesheet" type="text/css" href="css/screen.css">
  </head>
  <body class="citybackground">
  <?php 

  include "login.php";
  include "connect.php";
  include "nav.php";
  $username=phpCAS::getUser();

  $sql = "SELECT * FROM user_table WHERE username='$username'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
	?>

  <div class="login">
			<div class="header">
				<p class="iit">Illinois Tech</p>
				iRL
			</div>
		<form method="post">
		<label for="firstname">NAme</label>
		<input id="firstname" type="text" name="name" value='<?php echo $row['name']?>'>

		
		    <label for="phone">Phone</label>
		    <input id="phone" type="text" name="phone" value='<?php echo $row['phone']?>'> 
		    <label for="facebook">Facebook</label>
				<input id="facebook" type="text" name="facebook" value='<?php echo $row['name']?>'> 
				<label for="twitter">Twitter</label>
				<input id="twitter" type="text" name="twitter" value='<?php echo $row['name']?>'>
				<label for="email">Email</label>
				<input id="email" type="text" name="email" value='<?php echo $row['name']?>'>
	
				<input type="submit" value="submit" name="submitbutton">
		</form>
		</div> 
		<?php
		if (isset($_POST['submitbutton'])){
			$name = $_POST['name'];
  			$phone = $_POST['phone'];
  			$facebook = $_POST['facebook'];
  			$twitter = $_POST['twitter'];
  			$email = $_POST['email'];

  			$sql = "INSERT INTO user_table (`username`, `name`, `phone`, `facebook`, `email`, `twitter`) VALUES ('$username','$name','$phone','$facebook','$email','$twitter')";

		      $result = $mysqli->query($sql);

			  if ($mysqli->error) {
			      echo $mysqli->error;
			      $message="Unable to update!";		      
			echo "<script type='text/javascript'>alert('$message');</script>";
			  } else {
			  	$message="Update Succesful!";
			    echo "<script type='text/javascript'>alert('$message');</script>";
			  	header("Refresh:0; url=main.php");
			  }
			$mysqli->close();
			
    	}?>

  </body>