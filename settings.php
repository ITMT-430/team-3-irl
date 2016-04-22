<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>iRL Login</title>
    <link rel="stylesheet" type="text/css" href="css/screen.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, scale-to-fit=no">
  </head>
  <body class="citybackground">
  <?php 

    include "login.php";"
    //$username="scarpen3";
    include "connect.php";
    include "nav.php";

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
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="<?php echo $row['name']?>">
        <label for="phone">Phone</label>
        <input id="phone" type="text" name="phone" value="<?php echo $row['phone']?>"> 
        <label for="facebook">Facebook</label>
        <input id="facebook" type="text" name="facebook" value="<?php echo $row['facebook']?>"> 
        <label for="twitter">Twitter</label>
        <input id="twitter" type="text" name="twitter" value="<?php echo $row['twitter']?>">
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="<?php echo $row['email']?>">
        <input type="submit" value="Save Settings" name="submitbutton">
        <?php
         $sql = "SELECT * FROM admins WHERE username='$username'";
        $result = $mysqli->query($sql);
        $num = $result->num_rows;
               
        if($num == '0'){
          echo "DIDNT WORK";
        } 
        else {
          $sql = "SELECT username FROM user_table";
          $result = $mysqli->query($sql);
          echo "<select id='adminselect'>";
          
          while($row = $result->fetch_assoc()) {
            echo "<option>" . $row["username"] . "</option>";
          }
          
          echo "<input type='submit' value='Make Admin' name='adminsubmitbutton'>";
        }
         
               
          if (isset($_POST['adminsubmitbutton'])){
            $adminselected = $_POST['adminselect'];
          
             $sql = "INSERT INTO admins user_table SET
                name='$name',
                username='$username'
                WHERE username='$username'";

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
              }
        
        ?>
      </form>
      </div> 
      
        <?php
               
       
               
      if (isset($_POST['submitbutton'])){
          $name = $_POST['name'];
          $phone = $_POST['phone'];
          $facebook = $_POST['facebook'];
          $twitter = $_POST['twitter'];
          $email = $_POST['email'];

          $sql = "UPDATE user_table SET
                  name='$name',
                  phone='$phone',
                  facebook='$facebook',
                  twitter='$twitter',
                  email='$email'
                  WHERE username='$username'
          ";

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
</html>