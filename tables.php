<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "lms";

$con = new mysqli('localhost', $dbuser, $dbpass, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
echo nl2br("Connected successfully\r\n");

//query creating the database
$sql = "CREATE DATABASE IF NOT EXISTS lms";
if ($con->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $con->error;
}

//query creating the table Users
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    user_id BIGINT,
    email VARCHAR(100),
    pass VARCHAR(100) NOT NULL,
    user_name VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
if ($con->query($sql) === TRUE) {
    echo "Table Users created successfully<br>";
} else {
    echo "Error creating table: " . $con->error;
}

$sql = "CREATE TABLE IF NOT EXISTS EnrolledStudentsHTML (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  user_id BIGINT,
  user_name VARCHAR(100) NOT NULL,
  enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  completed INT
  )";

if ($con->query($sql) === TRUE) {
  echo "Table EnrolledStudentsHTML created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

?>