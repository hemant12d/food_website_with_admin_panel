<?php
//Here we will make an connection to database 
$servername = "localhost";
$username = "root";
$password = "";
$databse = "food_project";

$connection = mysqli_connect($servername, $username, $password, $databse);
if (!$connection) {
  echo "SERVER NOT RESPONDING 405";
}
else
{
    session_start();
}
?>