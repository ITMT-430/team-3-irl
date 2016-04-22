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

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $expiration = $row["available"];
          echo "<div class='user-entry'> 
            <div class='user-name'>" 
            .$row["name"] .
           "</div><div class='time'> Available for: " 
            . round(($expiration - (time()/60)), 2) . 
            " minutes</div>  <div class='activity'>Wants to: " 
            . $row["activity"]. 
            "</div></div>
            <div class='contactinfo hidden'><div class='contactinfoitem'>P: "
            . $row["phone"] .
            "</div><div class='contactinfoitem'>F: "
            . $row["facebook"] .
            "</div><div class='contactinfoitem'>T: "
            . $row["twitter"] .
            "</div></div>";
        }
    }
  else {
    echo "0 results";
  }
  
  $mysqli->close();
?>