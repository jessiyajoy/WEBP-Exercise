<?php

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // echo $_POST['name'];
    // echo $_POST['password'];
    // echo $_POST['email'];
    //name, email, password, confirm-password
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conf_pass = $_POST['confirm-password'];
    $user_name = $_POST['name'];

    if (!preg_match("/^[a-zA-Z-' ]*$/",$user_name)) {
    //    echo "Name must contain only alphabets";
       $nameErr = "Name must contain only alphabets";
       exit;
    }

   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        // echo "Invalid email address";
        $emailErr = "Invalid email address";
        exit;
   }

    if($conf_pass != $pass){
        // echo "The passwords do not match. Try again";
        $passErr = "The passwords do not match. Try again";
        exit;  
    }

    if(strlen($pass) <= 8){
        // echo "The password must have be atleast 8 characters long";
        $passErr = "The password must have be atleast 8 characters long";
        exit;
    }

    preg_match('/[0-9]+/',$pass,$matches);
    if(sizeof($matches) == 0){
        // echo "The password must have atleast one number";
        $passErr = "The password must have be atleast 8 characters long";
        exit;
    }

    preg_match('/[!@#$%^&*()]+/',$pass,$matches);
    if(sizeof($matches) == 0){
        // echo "The password must have atleast one special character";
        $passErr = "The password must have atleast one special character";
        exit;
    }


    if(!empty($email) && !empty($pass) && !empty($user_name) && !is_numeric($user_name))
    {

        $query_check = "SELECT * FROM Users WHERE email='$email'";
        $result = mysqli_query($con,$query_check);
        if($result){
            if($result && mysqli_num_rows($result) > 0)
            {
                 $existsErr = "The email ID " . $email . " is already registered";
                 //echo "The email ID " . $email . " is already registered";
                 exit;

            }

        }
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $user_id = random_num(20);
        //echo $user_id;
        $query = "INSERT INTO Users (user_id,email,pass,user_name) VALUES ('$user_id','$email','$hashed_pass','$user_name')";

        mysqli_query($con, $query);

        // if ($con->query($query) === TRUE) {
        //     //echo "Table Users created successfully";
        // } else {
        //     echo "Error entering row: " . $con->error;
        // }
        

        header("Location: signIn.php");
        die;

    }
    else
    {
        //echo "Please enter some valid information";
        $genErr = "Please enter some valid information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/registerStyle.css" />
   
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
    
    <header>
        <a id="logo" href="mainPage.html#">LMS</a>
        <!-- <img class="logo" src="logo.png" alt="logo"> -->
        <nav>
            <ul class="nav__links-left">
                <!-- <li><a href="mainPage.html#">Home</a></li> -->
                <li><a href="aboutus.html#">About</a></li>
                <li><a href="contactus.html#">Contact</a></li>
            </ul>
        </nav>
        <a class="cta" href="signIn.html#"><button>Login</button></a>
        <!-- <a class="cta" href="#"><button>Login</button></a> -->
    </header>
    
    <div class="container">
		<div class="text">
			<h1>Sign Up</h1>
			<p>Gain access to new content everyday!</p>
		</div>
        <form method="post">
            <div class="user-input">
                <div class="input">
                    
                    <input type="text" name="name" id="name" required />
                    <label for="name">Name</label>
                    
                </div>
                <div class="input">
                    <input type="text" name="email" id="email" required />
                    <label for="email">Email</label>
                    
                </div>
                <div class="input">
                    <input type="password" name="password" id="password" required />
                    <label for="password">Password</label>
                </div>
                <div class="input">
                    <input type="password" name="confirm-password" id="confirm-password" required />
                    <label for="confirm-password">Confirm Password</label>
                    
                </div>
            </div>
        
            <p class="terms"> 
                By registering you agree to our <a href="privacy.html#" class="privacy-policy">Privacy Policy</a>.
            </p>
            
            <input id="button" type="submit" value="Register">
          <!-- <button> -->
                <!-- <a style="text-decoration: none; color: aliceblue;" href="signIn.php">
                    Register
                </a> -->
            <!-- </button> -->
            <br>
            
            <p class="join-link"> 
                Already registered? <a href="signIn.php" class="join-now">Sign In</a>
            </p>
        </form>
	</div>
    <div class="footer-needed-div"></div>
    <footer>
        <!-- Footer legal -->
        <section class="ft-legal">
          <ul class="ft-legal-list">
            <li><a href="terms.html#">Terms &amp; Conditions</a></li>
            <li><a href="privacy.html#">Privacy Policy</a></li>
            <li><a href="aboutus.html#">About Us</a></li>
            <li><a href="contactus.html#">Help Support</a></li>
            <li><a href="contactus.html#">Contact</a></li>
            <li>&copy; 2021 Learning Management System</li>
          </ul>
        </section>
      </footer>
    
</body>
</html>