<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "LMS";   #was "lms" before

$con = new mysqli('localhost', $dbuser, $dbpass, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

?>