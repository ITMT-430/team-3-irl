<?php
  $servertoken = "";
  $clienttoken = "";
  //The function below should be run once we have authenticated the user via CAS.
  function generatetoken() {
    $raw = "";
    $servertoken = hash('sha256', $raw);
    $clienttoken = hash('ripemd160', $servertoken);
    $experation = (time()+3600); //expire in 1 hour
    setcookie("rltoken", $clienttoken, $experation);
    //Please store $servertoken in the database token field.
    //Please store $experation in the database experation field.
  }
  
  //Use the function below to see if user is already authenticated.  Will return true if they are or false if they aren't.
  function validatetoken() {
    //Please read the experation and servertoken fields into the vars below.
    $experation = "";
    $servertoken = "";
    
    //Don't touch below.
    $authed = false;
    if (!($experation < time())) {
      if(isset($_COOKIE["rltoken"])) {
        $clienttoken = $_COOKIE["rltoken"];
        if ($clienttoken == hash('ripemd160', $servertoken)) {
          $authed = true;
        }
      }
    }
    return authed;
  }