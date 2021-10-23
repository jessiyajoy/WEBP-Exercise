<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/homepage.css">
    <!-- Including jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Including our scripting file. -->
    <script type="text/javascript" src="./search_script.js"></script>
    <title>Home Page</title>
</head>
<body>

    <!-- nav b -->
    <header>
        <a id="logo" href="homepage.html#">LMS</a>
        <nav>
            <ul class="nav__links-left">
                <li><a href="homepage.html#">Home</a></li>
                <li><a href="aboutus.html#">About</a></li>
                <li><a href="contactus.html#">Contact</a></li>
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button>Logout</button></a>
    </header>

    <section class="header-section">
        <!-- <div class="search-bar"> -->
        <div class="search-box">
            <button id="search-button" class="btn-search" onclick="searchHandler()"><i class="fas fa-search"></i></button>
            <form>
                <input type="text" id="query" class="input-search" placeholder="Search for courses, users etc...">
            </form>
        </div>
        <div id="search_result">
        </div>
        <h4 id="s_results">Search Results : </h4> <br>
        <div id="search_static">
        </div>

        <a class="btn btn-primary" href="user_list.php"> View registered users </a>
        <p id="courses-title">COURSES OFFERED</p>

            <!-- <p class="search-title">Search for courses</p> -->
        <!-- </div> -->
        <p class="courses-subtitle">COURSE CATEGORIES</p>
    </section>

    <!--  -->
    <input type="radio" id="All" name="categories" value="All" checked>
    <input type="radio" id="ProgrammingLanguages" name="categories" value="ProgrammingLanguages">
    <input type="radio" id="Backend" name="categories" value="Backend">
    <input type="radio" id="DataAnalysis" name="categories" value="DataAnalysis">
    <input type="radio" id="Frontend" name="categories" value="Frontend">

    <ol class="filters">
        <li>
            <label for="All">All</label>
        </li>
        <li>
            <label for="Frontend">Frontend</label>
        </li>
        <li>
            <label for="Backend">Backend</label>
        </li>
        <li>
            <label for="ProgrammingLanguages">Programming Languages</label>
        </li>
        <li>
            <label for="DataAnalysis">Data Analysis</label>
        </li>
    </ol>

    <ul class="posts">

        <!-- HTML card -->
        <li class="post" data-category="Frontend">
            <figure class="course-card">
                <div class="card-left">
                    <h3 class="course-card__title">
                        HTML
                    </h3>
                    <p class="course-card__content">
                        Learn about the skeleton for all websites!
                    </p>
                    <h4 class="course-card__subtitle">Course Instructor</h4>
                    <p class="course-card__content">
                        Jane Doe
                    </p>
                    <h4 class="course-card__subtitle">Tags</h4>
                    <div class="course-category">
                        <button id="Frontend">
                            Frontend
                        </button>
                    </div>
                </div>
                <figcaption class="scroll-bar">
                    <h4 class="course-card__title">
                        About
                    </h4>
                    <p class="course-card__content">
                        You will learn all the common HTML tags used to structure HTML pages, the skeleton of all websites. Learn about all common html tags.
                    </p>
                    <a href="./coursepage-html.php" class="goto-button">
                        Go to course
                    </a>
                </figcaption>
                <img src="resources/html.jpeg" alt="">
            </figure>
        </li>

        <!-- CSS card -->
        <li class="post" data-category="Frontend">
            <figure class="course-card">
                <div class="card-left">
                    <h3 class="course-card__title">
                        CSS
                    </h3>
                    <p class="course-card__content">
                        Give some colour and style to your HTML pages
                    </p>
                    <h4 class="course-card__subtitle">Course Instructor</h4>
                    <p class="course-card__content">
                        John Doe
                    </p>
                    <h4 class="course-card__subtitle">Tags</h4>
                    <div class="course-category">
                        <button id="Frontend">
                            Frontend
                        </button>
                    </div>
                </div>
                <figcaption class="scroll-bar">
                    <h4 class="course-card__title">
                        About
                    </h4>
                    <p class="course-card__content">
                        You will learn many aspects of styling web pages! You’ll be able to set up the correct file
                        structure, edit text and colors, and create attractive layouts.
                    </p>
                    <a href="./coursepage-css.php" class="goto-button">
                            Go to course
                    </a>
                </figcaption>
                <img src="resources/css.png" alt="">
            </figure>
        </li>

        <!-- Javascript -->
        <li class="post" data-category="ProgrammingLanguages Frontend Backend">
            <figure class="course-card">
                <div class="card-left">
                    <h3 class="course-card__title">
                        Javascript
                    </h3>
                    <p class="course-card__content">
                        Make you websites dynamic and interactive
                    </p>
                    <h4 class="course-card__subtitle">Course Instructor</h4>
                    <p class="course-card__content">
                        Jane Doe
                    </p>
                    <h4 class="course-card__subtitle">Tags</h4>
                    <div class="course-category">
                        <button>
                            Backend
                        </button>
                        <button>
                            Frontend
                        </button>
                        <button>
                            Programming Language
                        </button>
                    </div>
                </div>
                <figcaption class="scroll-bar">
                    <h4 class="course-card__title">
                        About
                    </h4>
                    <p class="course-card__content">
                        You will learn programming
                        fundamentals and basic object-oriented concepts using latest, most powerful and flexible JavaScript
                    </p>
                    <a href="./coursepage-javascript.php" class="goto-button">
                        Go to course
                    </a>
                </figcaption>
                <img src="resources/javascript.png" alt="">
            </figure>
        </li>

        <!-- AJAX -->
        <li class="post" data-category="Backend">
            <figure class="course-card">
                <div class="card-left">
                    <h3 class="course-card__title">
                        AJAX
                    </h3>
                    <p class="course-card__content">
                        Make async calls to Web servers
                    </p>
                    <h4 class="course-card__subtitle">Course Instructor</h4>
                    <p class="course-card__content">
                        Jane Doe
                    </p>
                    <h4 class="course-card__subtitle">Tags</h4>
                    <div class="course-category">
                        <button id="Frontend">
                            Backend
                        </button>
                    </div>
                </div>
                <figcaption class="scroll-bar">
                    <h4 class="course-card__title">
                        About
                    </h4>
                    <p class="course-card__content">
                        In this Intro Course, you will learn to make async requests with JS, 
                        and to use data APIs to take advantage of freely accessible data in your app
                    </p>
                    <a href="./coursepage-ajax.php" class="goto-button">
                        Go to course
                    </a>
                </figcaption>
                <img src="resources/ajax.jpeg" alt="">
            </figure>
        </li>
        <!-- JAVA -->
        <li class="post" data-category="ProgrammingLanguages Backend">
            <figure class="course-card">
                <div class="card-left">
                    <h3 class="course-card__title">
                        JAVA
                    </h3>
                    <p class="course-card__content">
                        A high-level object-oriented programming language.
                    </p>
                    <h4 class="course-card__subtitle">Course Instructor</h4>
                    <p class="course-card__content">
                        John Doe
                    </p>
                    <h4 class="course-card__subtitle">Tags</h4>
                    <div class="course-category">
                        <button>
                            Programming Language
                        </button>
                        <button>
                            Backend
                        </button>
                    </div>
                </div>
                <figcaption class="scroll-bar">
                    <h4 class="course-card__title">
                        About
                    </h4>
                    <p class="course-card__content">
                        An advanced level course whhere you will also learn to build advanced industry grade Java applications employing various core JAVA concepts.
                    </p>
                    <a href="./coursepage-java.php" class="goto-button">
                        Go to course
                    </a>
                </figcaption>
                <img src="resources/java.png" alt="">
            </figure>
        </li>

        <!-- Python -->
        <li class="post" data-category="ProgrammingLanguages DataAnalysis Backend">
            <figure class="course-card">
                <div class="card-left">
                    <h3 class="course-card__title">
                        PYTHON
                    </h3>
                    <p class="course-card__content">
                        A readable, versatile, general purpose language
                    </p>
                    <h4 class="course-card__subtitle">Course Instructor</h4>
                    <p class="course-card__content">
                        Jane Doe
                    </p>
                    <h4 class="course-card__subtitle">Tags</h4>
                    <div class="course-category">
                        <button id="Frontend">
                            Backend
                        </button>
                        <button>
                            Data Analysis
                        </button>
                        <button>
                            ProgrammingLanguages
                        </button>
                    </div>
                </div>
                <figcaption class="scroll-bar">
                    <h4 class="course-card__title">
                        About
                    </h4>
                    <p class="course-card__content">
                        This course and will introduce
                        fundamental programming concepts including data
                        structures and developing networked apps using the python
                    </p>
                    <a href="./coursepage-python.php" class="goto-button">
                        Go to course
                    </a>
                </figcaption>
                <img src="resources/python.png" alt="">
            </figure>
        </li>
    </ul>
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