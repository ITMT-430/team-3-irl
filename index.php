<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>iRL Login</title>
    <link rel="stylesheet" type="text/css" href="css/screen.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, scale-to-fit=no">
  </head>

  <body class="citybackground">
  
    
		
		<div class="login">
			<div class="header">
				<p class="iit">Welcome to Illinois Tech</p>
				iRL
			</div>
			
			<a href="main.php"><input type="button" value="Login with Hawk Credentials"></a>
		</div>    
    <a href="http://gph.is/26m6Sdh" target="_blank"><img src="images/googleplus.png" alt="" width="10" height="13" /></a>

   <?php
   include 'connect.php';

   //Display Number of users available
   $sql = "SELECT * FROM user_table WHERE available > " .(time()/60);
   $result = $mysqli->query($sql);

    if ($result->num_rows > 0){
    	//output the data
    	while($row = $result->fetch_assoc()){
    		echo"There are: " .$row ["available"]. "<br>";
    	}
    }

  else{
  	echo "No one is Available";
  }

  $mysqli->close();
	
   ?>
  
  </body>
</html>
