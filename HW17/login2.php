<?php

   error_reporting(E_ALL);
   ini_set("display_errors", "on");
   //echo
   $server = $_GET["server"];
   $user   = $_GET["user"];
   $pwd    = $_GET["pwd"];
   $dbName = $_GET["dbName"];

   // print just to confirm they got passed correctly
   //echo "Server: <code>".$server."</code><br>";
   //echo "User: <code>".$user."</code><br>";
   //echo "Database name: <code>".$dbName."</code><br><br>";
   
   // Connect to MySQL Server

   $mysqli = new mysqli($server, $user, $pwd, $dbName);

   if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
      //echo "<code>...Connection successful</code> <br>";
   }
  
   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);
   
   // Retrieve data from Query String
   $username = trim($_GET['username']);
   $password = trim($_GET['password']);
   
   // Escape User Input to help prevent SQL Injection
   $username = $mysqli->real_escape_string($username);
   $password = $mysqli->real_escape_string($password);

   //build query
   //echo "<code>...Building query</code><br>";
    $query = "SELECT username, password FROM passwords WHERE username = '$username' ";
   
   //Execute query
   //echo "<code>...Executing query</code><br><br>";
   $result = $mysqli->query($query) or die($mysqli->error);
      
   // Insert a new row in the table for each person returned
   $row = $result->fetch_array(MYSQLI_ASSOC);
   //$row_user = "$row[username]";
   //$row_pass = "$row[password]";

   if ("$row[username]" == "$username" AND "$row[password]" == "$password"){
       echo "User and password confirmed"."<br>";
   }
   else if ("$row[username]" == $username AND "$row[password]" != "$password"){
    $query = "UPDATE passwords SET password = '$password' WHERE username = '$username' ";
    $result = $mysqli->query($query) or die($mysqli->error);
    echo "Password changed."."<br>";
    }
   else{
    $query = "INSERT INTO passwords VALUES ('$username','$password'); ";
    $result = $mysqli->query($query) or die($mysqli->error);
    echo "New user registered"."<br>";
   }
      
?>