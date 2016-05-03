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
			
			<a href="main.php"><input type="button" value="Login with Hawk Credentials"></a>
			
			<?php
   include 'connect.php';

   //Display Number of users available
   $sql = "SELECT * FROM user_table WHERE available > " . (time()/60);
   $result = $mysqli->query($sql);
   $num = $result->num_rows;

    if ($result->num_rows > 0){
    	//output the data
    		printf("<h2>There are %d people free on iRL</h2>", $num);
    }

  $mysqli->close();
	
   ?>
		</div>    
    <a href="http://gph.is/26m6Sdh" target="_blank"><img src="images/googleplus.png" alt="" width="10" height="13" /></a>
    
    <script>
      //Google Analytics
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-42027902-3', 'auto');
      ga('send', 'pageview');
    </script>
   
  </body>
</html>
