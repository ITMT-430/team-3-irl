<?php
 include 'connect.php';
//**********************************************
//
// DISPLAY ROWS FROM DATABASE
//
//**********************************************
    date_default_timezone_set('CST6CDT');
  
    $sql = "SELECT * FROM user_table WHERE available > " .(time()/60);
    $result = $mysqli->query($sql);
				$num = $result->num_rows;

				echo "<h1>People available (";
					printf("%d", $num);
				echo ")</h1>";
				
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $expiration = $row["available"];
          echo "<div class='user-entry'> 
            <div class='user-name'>" 
            . $row["name"] .
           "</div><div class='time'> Available for: " 
            . round(($expiration - (time()/60)), 2) . 
            " minutes</div>  <div class='activity'>Wants to: " 
            . $row["activity"]. 
            "</div></div>
            <div class='contactinfo hidden'><div class='contactinfoitem'>
            <img src='images/phone.png'> " . $row["phone"] .
            "</div><div class='contactinfoitem'><a href='" . $row["facebook"] .
            "'><img src='images/facebook.png'></a>
            </div><div class='contactinfoitem'><a href='" . $row["twitter"] .
            "'><img src='images/twitter.png'></a>
            </div></div>";
        }
    }
  else {
    echo "0 results";
  }
  
  $mysqli->close();
?>