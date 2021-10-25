<?php
session_start();

include("connection.php");
include("functions.php");

$genErr ="";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //name, email, password, confirm-password
    $email = $_POST['email'];
    $pass = $_POST['password'];

    //echo $_POST['password'];
    //echo $_POST['email'];

    if(!empty($email) && !empty($pass))
    {
        $query = "SELECT * FROM Users WHERE email = '$email' limit 1";

        $result = mysqli_query($con,$query);

        if($result){
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                // if($user_data['pass'] === $pass)
                if(password_verify($pass,$user_data['pass']))
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: homePage.php");
                    die;
                }
            }
        } 
        //echo "Please enter valid username or password 1";
        $genErr = "*Enter valid username or password!";
    }
    else
    {
        $genErr = "*Enter valid username or password!";
        //echo "Please enter valid username or password 2";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/signStyle.css" />
   
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
    
    <header>
        <a id="logo" href="mainPage.php">LMS</a>
        <!-- <img class="logo" src="logo.png" alt="logo"> -->
        <nav>
            <ul class="nav__links-left">
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
            </ul>
        </nav>
        <a class="cta" href="registerPage.php"><button>Register</button></a>
        <!-- <a class="cta" href="#"><button>Login</button></a> -->
    </header>
    
    <div class="container">
        <div class="text">
            <h1>Sign in</h1>
            <p>Stay updated on all your courses</p>
            
        </div>
        <form method="post">
            <div class="user-input">
            <div class="error"> <?php echo $genErr;?> </div>
                <div class="input">
                    <input type="text" name="email" id="email" value = "<?php echo $email;?>" required />
                    <label for="email">Email</label>
                </div>
                <div class="input">
                    <input type="password" name="password" id="password" value = "<?php echo $pass;?>" required />
                    <label for="password">
                        Password
                    </label>
                </div>
            </div>
            <div class="forgot-password">
                <a href="#" class="forgot-password-link">
                    Forgot password?
                </a>
            </div>
            
            <input id="button" type="submit" value="Sign In">
            <!-- <button>
                <a style="text-decoration: none; color: aliceblue;" href="homepage.html">
                    Login
                </a>
            </button> -->
            
            <br>
            
            <p class="join-link"> 
                New here? <a href="registerPage.php" class="join-now">Join now</a>
            </p>
        </form>
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