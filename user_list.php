<?php
  require_once "./connection.php";
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Users List Page</title>
        <!-- Favicon -->
    <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans:wght@400;600&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style/navBarFooter.css" />
        <link rel="stylesheet" href="style/user_list.css">

    </head>
    <style>
        header{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 1px 5%; 

        background-color: rgba(41, 128, 185,0.8); 
        /* background: linear-gradient(87deg, #172b4d 0, #1a174d 80%) */
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
        <a class="cta" href="logout.php"><button>Logout</button></a>
        <!-- <a class="cta" href="registerPage.php"><button>Register</button></a>
        <a class="cta" href="signIn.php"><button>Login</button></a> -->
    </header>
        <div id="courses-title"> Registered Users </div> 
        <div id="list">
        <?php
 
 $query1 = "SELECT user_name, email, user_id FROM Users";
 $result1 = mysqli_query($con, $query1);

 if (mysqli_num_rows($result1) > 0) {
     while ($row = $result1->fetch_assoc()) {
?>
     <div id="list-div">
     <a href="#" class="avatar rounded-circle">
         <img id="user" alt="Image placeholder" src="./resources/user.png">
     </a>
     <div class="col ml--2">
         <h4 class="mb-0">
<?php
             echo "<a href=\"user.php?user_name=", $row['user_name'], "&email=", $row['email'], "&user_id=", $row['user_id'],"\">", $row['user_name'], "</a>";
?>
         </h4>
         <span class="text-success">●</span>
         <small>Online</small>
     </div>
     <div class="col ml--2">
         <h5>
             Contact details
         </h5>
         <h6 style="color:grey">
<?php
                 echo $row['email'];
?>
         </h6>
     </div>
<?php
     echo "<a href=\"user.php?user_name=", $row['user_name'], "&email=", $row['email'], "&user_id=", $row['user_id'],"\" class=\"goto\">View User</a>";
?>
     </div>
<?php
     }
 }
?>
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