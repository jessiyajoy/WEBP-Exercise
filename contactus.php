<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login_noSignIn($con);

if($user_data == -1){
    header("Location: contactus.html");
    die;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/contactstyle.css" />
    
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
        <!-- <a class="cta" href="registerPage.php"><button>Register</button></a>
        <a class="cta" href="signIn.php"><button>Login</button></a> -->
        <a class="cta" href="logout.php"><button>Logout</button></a>
    </header>

    
    
    <div class="container">
        <div class="contact">
          <h2>CONTACT US</h2>
          <p>Have some questions or suggestions? Drop us a message, we would love to hear from you!</p>
        </div>
        <!-- <div class="row"> -->
          <!-- <div class="column-left">-->
              <!-- <p>hello</p> -->
             
            <!-- <img src="resources/code.jpg" style="width:100%"> -->
          <!-- </div> --> 
          <div class="column">
            <form action="/action_page.php">
              <label for="fname">FIRST NAME</label><br>
              <input type="text" id="fname" name="firstname" placeholder="Your name..."><br>
              <label for="lname">LAST NAME</label><br>
              <input type="text" id="lname" name="lastname" placeholder="Your last name..."><br>
              <label for="subject">SUBJECT</label><br>
              <textarea id="subject" name="subject" placeholder="Let us know..." style="height:170px"></textarea><br>
              <input type="submit" value="Submit"><br>
            </form>
          </div>
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