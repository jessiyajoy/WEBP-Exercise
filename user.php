<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> User Profile Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/user.css" />

</head>

<body>
  <div class="main-content">
    
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <?php
            echo "<h1 class=\"display-2 text-white\">Hi there! Meet ", $_GET['user_name'], "</h1>";
            ?>
            <p class="text-white mt-0 mb-5"> This page displays information made public by the user. 
              For more information about the user or for any queries, connect using the contact details given in the page.
            </p>
            <a href="homepage.php" class="btn btn-info">Back to Home Page</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="./resources/avatar.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Courses enrolled</span>
                    </div>
                    <div>
                      <span class="heading">4</span>
                      <span class="description">Courses completed</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <?php
                echo "<h3>", $_GET['user_name'], "</h3>";
                ?>
                <div class="h5 font-weight-300">
                <?php
                  echo "<i class=\"ni location_pin mr-2\"></i> user id : ", $_GET['user_id'];
                ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Computer Science and Engineering Student
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>National Institute of Technology, Calicut
                </div>
                <hr class="my-4">
                <p> </p>
                <?php
                echo "<a href=\"mailto: ", $_GET['email'], "\">", $_GET['email'], "</a>";
                ?>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</body>