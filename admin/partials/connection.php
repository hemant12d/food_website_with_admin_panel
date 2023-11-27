<?php
//Here we will make an connection to database 
$servername = "localhost";
$username = "root";
$password = "";
$databse = "food_project";

$connection = mysqli_connect($servername, $username, $password, $databse);
if (!$connection) {
  echo "Sorry but currently we are unable to connect from the database";
}
else
{
    session_start();
    // echo "Connection is not successful";
    // echo "<br>";

    // All are here for experiment.
    // print_r($connection);
    // $sql = "SELECT * FROM `user_info` WHERE `uname` = 'Bisla'";
    // $result = mysqli_query($connection, $sql);
    // print_r($result);
}
?>