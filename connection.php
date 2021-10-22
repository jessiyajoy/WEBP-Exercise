<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "lms";

$con = new mysqli('localhost', $dbuser, $dbpass, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//echo nl2br("Connected successfully\r\n");
  
// if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
// {
//     die("Failed to connect!");
// }

?>