<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login_noSignIn($con);

if($user_data == -1){
    header("Location: privacy.html");
    die;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/termsstyle.css" />
    
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
        <!-- <a class="cta" href="registerPage.html#"><button>Register</button></a>
        <a class="cta" href="signIn.html#"><button>Login</button></a> -->
        <a class="cta" href="logout.php"><button>Logout</button></a>
    </header>

    
    <div class="container">
        <h2>Privacy Policy</h2>
        
        <p class="first-para">
            LMS and each Member that provides courses through the 
            LMS Site care about the confidentiality and security of 
            your information. This Privacy Policy applies to information 
            that LMS collects through the LMS Site when you interact with 
            LMS, with Members, with other users, and generally with the LMS Site.
        </p>
        <br>

        <p>
            Your information is received and controlled by LMS according to 
            this Privacy Policy when you sign up for an LMS account or otherwise 
            use the LMS Site.
        </p>
        <br>

        <h3>Data Retention</h3>
        <p>
            LMS will retain your Personal Information for as long as your account 
            is active or as needed to provide you with services; to maintain a record of 
            your transactions for financial reporting, audit, and compliance purposes; and 
            to comply with LMS’s legal obligations, resolve disputes, enforce its agreements, 
            and as otherwise permitted by applicable law. If you enroll in a Member’s course, 
            such Member will also retain your Personal Information for as long as needed to 
            provide you with services; to maintain a record of your transactions for financial 
            reporting, audit, and compliance purposes; and to comply with its legal obligations, 
            resolve disputes, enforce its agreements, and as otherwise permitted by applicable law. 
            Upon your request that LMS deactivate your account and delete your information, LMS will 
            follow the process described above, including without limitation archiving your course data 
            (in a manner and to the extent permitted under applicable law) to serve its mission to enable 
            scientific research on cognitive science and education. These archives will be used to produce 
            encrypted research data packages for Members, and each such Member may also keep and use course 
            data for scientific research.
        </p>
        <br>
        <h3>Storage and Security</h3>
        <p>
            LMS controls its own copy of information collected through the LMS Site and has an 
            information security program designed to protect information in its possession or control. 
            This is done through a variety of privacy and security policies, processes, and procedures. 
            LMS uses administrative, physical, and technical safeguards that reasonably and appropriately protect
            the confidentiality, integrity, and availability of the information that it collects, receives, stores, or transmits. 
            Nonetheless, no method of transmission over the Internet, or method of electronic storage, is 100% secure; 
            and therefore, LMS cannot guarantee its absolute security. While LMS works hard to ensure the integrity and 
            security of its network and systems, LMS cannot guarantee that its security measures will prevent "hackers" 
            or other unauthorized persons from illegally accessing or obtaining information.
        </p>
        <br>
        <p>

            If a Member learns of a security breach involving that Member’s copy of your Personal Information, 
            the Member may attempt to notify you electronically so that you may take appropriate protective steps. 
            By enrolling in a Member’s course on the LMS Site or providing Personal Information to the Member, you agree 
            that the Member can communicate with you electronically regarding security, privacy, and administrative issues 
            relating to your course enrollment and participation. If a security systems breach occurs, the affected Member 
            may post a notice on the LMS site and/or send an email to you at the email address associated with your enrollment 
            in the Member’s course on the LMS Site. Depending on where you are located, you may have a legal right to receive 
            notice of a security breach, involving your Personal Information, in writing.
        </p>
        <br>
        <h3>Privacy Policy Updates</h3>
        <p>
            This Privacy Policy will be reviewed and updated from time to time. 
            When changes are made, the Privacy Policy will be labeled as "Revised (date)," 
            indicating that you should review the new terms, which will be effective immediately 
            upon posting on this page, with an updated effective date. By accessing the LMS 
            Site after any changes have been made, you accept the modified Privacy Policy and 
            any changes contained therein. In case you miss the notification referenced above, 
            be sure to return to this page periodically to ensure familiarity with the most current 
            version of this Privacy Policy.

        </p>
        <br>

        <p>
            Our goal is to provide current and future visitors to the LMS Site with the best possible 
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







