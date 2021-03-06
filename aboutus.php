<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login_noSignIn($con);

//echo $user_data;
if($user_data == -1){
    header("Location: aboutus.html");
    die;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/aboutstyle.css" />
    
</head>
<body>
    <header>
        <a id="logo" href="homepage.php">LMS</a>
        <nav>
            <ul class="nav__links-left">
               <li><a href="homepage.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
            </ul>
        </nav>
        <!-- <a class="cta" href="registerPage.html#"><button>Register</button></a>
        <a class="cta" href="signIn.html#"><button>Login</button></a> -->
        <a class="cta" href="logout.php"><button>Logout</button></a>
    </header>

    <div class="container">
        <div class="about-text">
          <h2>ABOUT US</h2>
          <p>We are a group of undergraduate students from National Institute of Technology Calicut. We aim to provide a comprehensive learning site with all the necessary resources for a complete web programming course.</p>
        </div>
        <div class="row">
            <div class="column">
              <div class="card">
                  <p class="name"> Gokul Sreekumar</p>
                  <p> Contact: +91 8547058985</p>
                  <p> Email: gokul_b180xxxcs@nitc.ac.in</p>
              </div>
            </div>
            <div class="column">
              <div class="card">
                <p class="name"> Jessiya Joy</p>
                <p> Contact: +91 8078216582</p>
                <p> Email: jessiya_b180xxxcs@nitc.ac.in</p>

              </div>
            </div>
            <div class="column">
              <div class="card">
                <p class="name"> Anna Susan Cherian</p>
                <p> Contact: +91 9400193641</p>
                <p> Email: anna_b180xxxcs@nitc.ac.in</p>

              </div>
            </div>
            
        </div>
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