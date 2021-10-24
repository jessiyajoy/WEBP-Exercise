<?php

session_start();

include("connection.php");
include("functions.php");

$nameErr = $emailErr = $confpassErr = $passErr = $pass_formatErr = $existsErr = $genErr = "";
$email = $pass = $conf_pass = $user_name = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conf_pass = $_POST['confirm-password'];
    $user_name = $_POST['name'];

    if(empty($user_name)){
        $nameErr = "* Name is required";
    } else {
       // $user_name = clean_data($user_name);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$user_name)) {
            //    echo "Name must contain only alphabets";
               $nameErr = "* Name must contain only alphabets";
               //exit;
            }
    }

    if(empty($email)){
        $emailErr = "* Email is required";
    } else {
        //$email = clean_data($email);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            //echo "Invalid email address";
            $emailErr = "* Invalid email address";
            //exit;
       }
    }

    if(empty($pass)){
        $passErr = "* Password is required";
    } else {
        if($conf_pass != $pass){
            //echo "The passwords do not match. Try again";
            $confpassErr = "* The passwords do not match. Try again";
            //exit;  
        } 
    }
    
    if(!empty($pass) && $conf_pass == $pass) {
        preg_match('/[0-9]+/',$pass,$matches1);
        preg_match('/[!@#$%^&*()]+/',$pass,$matches2);

        if(strlen($pass) <= 8){
            //echo "The password must have be atleast 8 characters long";
            $pass_formatErr = "* The password must be atleast 8 characters long";
            //exit;
        }
        
        else if(sizeof($matches1) == 0){
            //echo "The password must have atleast one number";
            $pass_formatErr = "* The password must have be atleast 8 characters long";
            //exit;
        }
        
        else if(sizeof($matches2) == 0){
            //echo "The password must have atleast one special character";
            $pass_formatErr = "* The password must have atleast one special character";
            //exit;
        }
    }

    if(empty($nameErr) && empty($emailErr) && empty($confpassErr) && empty($passErr) && empty($pass_formatErr)){

        //Check if user with the same email exists 
        $query_check = "SELECT * FROM Users WHERE email='$email'";
        $result = mysqli_query($con,$query_check);
        if($result){
            if($result && mysqli_num_rows($result) > 0)
            {
                 $existsErr = "* The email ID " . $email . " is already registered";
                 //echo "The email ID " . $email . " is already registered";
                 //exit;

            }

        }

        if(empty($existsErr)){
            //Hashing the password
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            //Creating a user_id
            $user_id = random_num(20);
            //echo $user_id;

            $query = "INSERT INTO Users (user_id,email,pass,user_name) VALUES ('$user_id','$email','$hashed_pass','$user_name')";

            mysqli_query($con, $query);

            // if ($con->query($query) === TRUE) {
            //     //echo "Table Users created successfully";
            // } else {
            //     echo "Error entering row: " . $con->error;
            // }
            // echo '<script type="text/javascript">
            //     $(function(){
            //         Swal.fire({
            //             "title": "Success",
            //             "text": "You have been successfully registered!",
            //             "type": "success"
            //         }).then(function(){
            //             window.location = "signIn.php"
            //         })

            //     });

            // </script>';


            header("Location: success.php");
            die;

        }

    }

    // echo $nameErr;
    // echo $passErr;
    // echo $emailErr

    // if($nameErr = "" || $emailErr = "" ||$confpassErr = ""|| $passErr = ""||$existsErr = ""| $genErr = ""){
    //     //$genErr = "Please enter some valid information";

    // }else{

        // $query_check = "SELECT * FROM Users WHERE email='$email'";
        // $result = mysqli_query($con,$query_check);
        // if($result){
        //     if($result && mysqli_num_rows($result) > 0)
        //     {
        //          $existsErr = "The email ID " . $email . " is already registered";
        //          //echo "The email ID " . $email . " is already registered";
        //          //exit;

        //     }

        // }
        // $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        // $user_id = random_num(20);
        // //echo $user_id;
        // $query = "INSERT INTO Users (user_id,email,pass,user_name) VALUES ('$user_id','$email','$hashed_pass','$user_name')";

        // mysqli_query($con, $query);

        // // if ($con->query($query) === TRUE) {
        // //     //echo "Table Users created successfully";
        // // } else {
        // //     echo "Error entering row: " . $con->error;
        // // }
        

        // header("Location: signIn.php");
        // die;

    // } 
        
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
    <link rel="stylesheet" href="style/regStyle.css" />
   
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- <style>
        
    </style>   -->
</head>
<body>
    
    <header>
        <a id="logo" href="mainPage.php">LMS</a>
        <!-- <img class="logo" src="logo.png" alt="logo"> -->
        <nav>
            <ul class="nav__links-left">
                <!-- <li><a href="mainPage.php">Home</a></li> -->
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contactus.php">Contact</a></li>
            </ul>
        </nav>
        <a class="cta" href="signIn.php"><button>Login</button></a>
        <!-- <a class="cta" href="#"><button>Login</button></a> -->
    </header>
    
    <div class="container">
		<div class="text">
			<h1>Sign Up</h1>
			<p>Gain access to new content everyday!</p>
            <br>
            <div class="error"> <?php echo $existsErr;?> </div>
		</div>
        
        

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div class="user-input">
                <div class="input" data-error="<?php echo $nameErr?>">
                    <input type="text" name="name" id="name" required value="<?php echo $user_name;?>" />
                    <label for="name">Name</label>
                    <br>
                    <!-- <div class = "error"><?php echo $nameErr;?> </div> -->
                    
                </div>
                <div class="input" data-error="<?php echo $emailErr;?>">
                    <input type="text" name="email" id="email" required value="<?php echo $email;?>"/>
                    <label for="email">Email</label>
                    <br>
                    <!-- <div class = "error"><?php echo $emailErr;?></div> -->
                </div>
                <div class="input" data-error="<?php echo $pass_formatErr;?>"> 
                    <input type="password" name="password" id="password" required value="<?php echo $pass;?>"/>
                    <label for="password">Password</label>
                    <br>
                    <!-- <div class = "error"><?php echo $passErr;?> </div> -->
                </div>
                <div class="input" data-error="<?php echo $confpassErr;?>">
                    <input type="password" name="confirm-password" id="confirm-password" required value="<?php echo $conf_pass;?>"/>
                    <label for="confirm-password">Confirm Password</label>
                    <!-- <br> -->
                    <!-- <div class = "error"><?php echo $confpassErr;?></div> -->
                    <!-- <br><br> -->
                    <!-- <div class = "error"><?php echo $pass_formatErr;?></div> -->
                    
                </div>
            </div>
        
            <p class="terms"> 
                By registering you agree to our <a href="privacy.php" class="privacy-policy">Privacy Policy</a>.
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