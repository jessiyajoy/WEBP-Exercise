<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login_noSignIn($con);

if($user_data == -1){
    header("Location: terms.html");
    die;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/termsStyle.css" />
    
</head>

<style>
  header{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 1px 5%; 
    /* background-color: #2f3e60 */

    /* background-color: rgba(47,62,96,255); */

    background-color: rgba(41, 128, 185);
    /* background: linear-gradient(87deg, #172b4d 0, #1a174d 80%)*/
  } 
</style>

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
        <h2>Terms and Conditions</h2>
        
        <p class="first-para">
Welcome to LMS. Please read these Terms of Service ("TOS") and Honor Code prior to registering for an 
account on LMS or using any portion of the LMS website or mobile applications (collectively, the "LMS Site," which 
consists of all content and pages located within the LMS web domain and all LMSmobile 
applications), including accessing any course material, chat rooms, 
or other electronic services. These TOS and the Honor Code that 
follows are agreements (the "Agreements") between you and LMS Inc. 
By using the LMS Site, you accept and agree to be legally bound by 
the Agreements, whether or not you are a registered user. 
Please also read the <a href="privacy.php" class="privacy-link">Privacy Policy</a> for the LMS Site before you use 
any portion of the LMS Site. The Privacy Policy describes how your 
personal data is collected and processed when you use the LMS Site. 
If you do not understand or do not wish to be bound by the terms of 
the Agreements or Privacy Policy, you should not use the LMS Site.</p>
<br>

<p>LMS reserves the right to modify these TOS at any time without 
advance notice. Any changes to these TOS will be effective 
immediately upon posting on this page, with an updated effective 
date. By accessing the LMS Site after any changes have been made, 
you signify your agreement on a prospective basis to the modified 
TOS and all of the changes. Be sure to return to this page 
periodically to ensure familiarity with the most current version of 
these TOS.
</p>
<br>

<p>Any version of these TOS in a language other than English is 
provided for convenience and you understand and agree that the 
English language version will control if there is any conflict.
</p>
<br>
<h3>User Accounts</h3>
<p>
    In order to create a user account, you must provide your full name, an email address, 
    your country or region of residence, a public username, and a user password. You agree 
    that you will never divulge or share access or access information for your user account 
    with any third party for any reason. In setting up your user account, you may be prompted 
    to enter additional optional information (e.g., your year of birth). You represent that all 
    information provided by you is accurate and current. You agree to maintain and update your 
    information to keep it accurate and current.
</p>
<br>
<p>

    We care about the confidentiality and security of your personal information. Please see the 
    <a href="privacy.php" class="privacy-link">Privacy Policy</a>  for more information about the collection 
    and use of data on the LMS Site.
</p>
<br>
<h3>Right to Content in Site</h3>
<p>
    Unless otherwise expressly stated on the LMS Site, the texts, exams, video, images, and other 
    instructional materials provided with the courses and programs offered on the LMS Site are for 
    your personal use in connection with those courses and programs only. Certain reference documents, 
    digital textbooks, articles, and other information on the LMS Site are used with the permission of 
    third parties, and use of that information is subject to certain rules and conditions, which will 
    be posted along with the information. By using the LMS Site, you agree to abide by all such rules 
    and conditions. You agree to retain all copyright and other notices on any content you obtain from 
    the LMS Site. All rights in the LMS Site and its content, if not expressly granted, are reserved.

</p>
<br>

<p>
    Our goal is to provide current and future visitors to the edX Site with the best possible 
    educational experience. To further this goal, we sometimes present different users with different 
    versions of course materials and software. We do this to personalize the experience to the individual 
    learner (to assess the learner’s level of ability and learning style, and present materials best suited to the learner), 
    to improve our understanding of the learning process, and to evaluate and improve the effectiveness 
    of our course materials, payment models, platform features, and offerings.
</p>
<br>

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







