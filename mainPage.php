<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login_noSignIn($con);

if($user_data == -1){
    header("Location: mainPage.html");
    die;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/welcomePagestyle.css" />
    
</head>

<body>
    <header>
        <a id="logo" href="mainPage.php">LMS</a>
        <nav>
            <ul class="nav__links-left">
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
            </ul>
        </nav>
        <a class="cta" href="registerPage.php"><button>Register</button></a>
        <a class="cta" href="signIn.php"><button>Login</button></a>
    </header>
    
    <div class="container">
        <!-- <div class="frontimage">
            <img src="styles/img3.jpg", alt="image">
        </div> -->
        <!-- <div class="content"> -->
            <h1 class="welcomeText"> Welcome to your e-Learning platform</h1>
            <h3 class="subText">Everything you need to know in one place!</h3>
        <!-- </div> -->
        
    </div> 
    <div class="footer-needed-div"></div>
    <footer>
        <!-- Footer legal -->
        <section class="ft-legal">
          <ul class="ft-legal-list">
            <li><a href="terms.php">Terms &amp; Conditions</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Help Support</a></li>
            <li><a href="contactus.php">Contact</a></li>
            <li>&copy; 2021 Learning Management System</li>
          </ul>
        </section>
      </footer>
</body>
</html>