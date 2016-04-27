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
    <img src="images/logo.png" />
 	 </div>
			
			<h1>See you soon!</h1>
			
		<?php
   include 'connect.php';
			include 'login.php';
			// Load the CAS lib
			require_once '../includes/CAS.php';
			
			
			$now = (time()/60);
			$sql = "UPDATE user_table SET
								available='$now'
								WHERE username='$username'
								";

				$result = $mysqli->query($sql);


				if ($mysqli->error) {
								echo $mysqli->error;
				}
			
				$mysqli->close();
   
   // If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	    );
	}
	// Finally, destroy the session.
	session_destroy();

	phpCAS::logout();
			?>

			
  </body>
</html>
