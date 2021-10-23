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


// Creating tables for Each Course to track enrollment
// HTML
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

// CSS
$sql = "CREATE TABLE IF NOT EXISTS EnrolledStudentsCSS (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  user_id BIGINT,
  user_name VARCHAR(100) NOT NULL,
  enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  completed INT
  )";

if ($con->query($sql) === TRUE) {
  echo "Table EnrolledStudentsCSS created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

// AJAX
$sql = "CREATE TABLE IF NOT EXISTS EnrolledStudentsAJAX (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  user_id BIGINT,
  user_name VARCHAR(100) NOT NULL,
  enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  completed INT
  )";

if ($con->query($sql) === TRUE) {
  echo "Table EnrolledStudentsAJAX created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

// JAVA
$sql = "CREATE TABLE IF NOT EXISTS EnrolledStudentsJAVA (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  user_id BIGINT,
  user_name VARCHAR(100) NOT NULL,
  enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  completed INT
  )";

if ($con->query($sql) === TRUE) {
  echo "Table EnrolledStudentsJAVA created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

// JS
$sql = "CREATE TABLE IF NOT EXISTS EnrolledStudentsJS (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  user_id BIGINT,
  user_name VARCHAR(100) NOT NULL,
  enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  completed INT
  )";

if ($con->query($sql) === TRUE) {
  echo "Table EnrolledStudentsJS created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

// PYTHON
$sql = "CREATE TABLE IF NOT EXISTS EnrolledStudentsPYTHON (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  user_id BIGINT,
  user_name VARCHAR(100) NOT NULL,
  enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  completed INT
  )";

if ($con->query($sql) === TRUE) {
  echo "Table EnrolledStudentsPYTHON created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

// Creating the table Courses
$sql = "CREATE TABLE IF NOT EXISTS Courses (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  course_name VARCHAR(100) NOT NULL,
  description VARCHAR(300) NOT NULL
  )";

if ($con->query($sql) === TRUE) {
  echo "Table Courses created successfully<br>";
} else {
  echo "Error creating table: " . $con->error;
}

$sql = "INSERT INTO Courses VALUES(1,'HTML', 'Learn about the skeleton for all websites!');";
mysqli_query($con, $sql);
$sql = "INSERT INTO Courses VALUES(2,'CSS', 'Give some colour and style to your HTML pages');";
mysqli_query($con, $sql);
$sql = "INSERT INTO Courses VALUES(3,'Javascript', 'Make you websites dynamic and interactive');";
mysqli_query($con, $sql);
$sql = "INSERT INTO Courses VALUES(4,'AJAX', 'Make async calls to Web servers');";
mysqli_query($con, $sql);
$sql = "INSERT INTO Courses VALUES(5,'JAVA', 'A high-level object-oriented programming language.');";
mysqli_query($con, $sql);
$sql = "INSERT INTO Courses VALUES(6,'Python', 'A readable, versatile, general purpose language');";
mysqli_query($con, $sql);

// $sql = "CREATE TABLE IF NOT EXISTS CoursesCategories (
//   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//   course_category VARCHAR(100) NOT NULL
//   )";

// if ($con->query($sql) === TRUE) {
//   echo "Table Courses created successfully<br>";
// } else {
//   echo "Error creating table: " . $con->error;
// }

// $sql = "INSERT INTO CoursesCategories VALUES(1,'Programming Languages');";
// mysqli_query($con, $sql);
// $sql = "INSERT INTO CoursesCategories VALUES(2,'Backend');";
// mysqli_query($con, $sql);
// $sql = "INSERT INTO CoursesCategories VALUES(3,'Data Analysis');";
// mysqli_query($con, $sql);
// $sql = "INSERT INTO CoursesCategories VALUES(4,'Frontend');";
// mysqli_query($con, $sql);

?>