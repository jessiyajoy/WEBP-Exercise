<?php
    session_start();

    include_once("connection.php");
    include_once("functions.php");

    $course_name = "JAVA";
    $user_data = check_login($con);
    $curr_course_table = 'EnrolledStudentsJAVA';
    $curr_course_page = 'coursepage-java.php';
    $is_enrolled = check_enrolledincourse($con, $curr_course_table, $user_data['user_id']);
    $is_completed = check_completion($con, $curr_course_table, $user_data['user_id']);

?>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php echo $course_name ?> Course Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/43f9be8744.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/coursepage.css" />
    <link rel="stylesheet" href="style/cards-container.css" />
    <link rel="stylesheet" href="style/card.css" />
</head>

<body style="background: url(./style/images/keys.jpg);
  backdrop-filter: blur(15px);background-blend-mode: lighten">
    <header>
        <a id="logo" href="homepage.html#">LMS</a>
        <nav>
            <ul class="nav__links-left">
                <li><a href="homepage.html#">Home</a></li>
                <li><a href="aboutus.html#">About</a></li>
                <li><a href="contactus.html#">Contact</a></li>
            </ul>
        </nav>
        <a class="cta" href="mainPage.html#"><button>Logout</button></a>
        <!-- <a class="cta" href="registerPage.html#"><button>Register</button></a>
        <a class="cta" href="signIn.html#"><button>Login</button></a> -->
    </header>
    <div class="course-contents-container">
        <article class="course-intro">
            <section class="course-intro">
                <div class="card card-3">
                    <div class="card__icon"><i class="fas fa-bolt"></i></div>
                    <h2 class="card__title"><?php echo $course_name ?></h2>
                    <div style="display:flex;">
                        <div style="flex:3">
                            <p class="card__item-title">
                                About
                            </p>
                            <p class="card__description">
                                HTML is the foundation of all web pages. Without HTML, you wouldn’t be able to organize text or
                                add images or videos to your web pages. HTML is the beginning of everything you need to know to
                                create engaging web pages!
                                You will learn all the common HTML tags used to structure HTML pages, the skeleton of all
                                websites. You will also be able to create HTML tables to present tabular data efficiently.
                            </p>
                            <p class="card__item-title">
                                Instructor
                            </p>
                            <p class="card__description">
                                John Doe
                            </p>
                        </div>
                        <div style="flex:2; margin-left:30px">
                            <p class="card__item-title">
                                Stats
                            </p>
                            <p class="card__description" style="font-size: 1.3rem;">
                                <?php 
                                    $res_num = findTotalNumberOfEnrolledStudents($con, $curr_course_table);
                                    if ($res_num == 1) {
                                        echo '<span style="font-size: 1.8rem; font-weight: 700;">' . 
                                        $res_num .
                                        '</span>' . 
                                        " Student Currently Enrolled";
                                    } else {
                                        echo '<span style="font-size: 1.8rem; font-weight: 700;">' . 
                                        $res_num .
                                        '</span>' . 
                                        " Students Currently Enrolled";
                                    }
                                ?>
                            </p>
                            <p class="card__description" style="font-size: 1.3rem">
                                <span style="font-size: 1.8rem; font-weight: 700;">
                                    32+
                                </span>  
                                    Recorded Sessions
                            </p>
                            <p class="card__description" style="font-size: 1.3rem">
                                <span style="font-size: 1.8rem; font-weight: 700;">
                                    10+
                                </span>  
                                    References Materials
                            </p>
                            <p class="card__description" style="font-size: 1.3rem">
                                <span style="font-size: 1.8rem; font-weight: 700;">
                                    15+
                                </span>  
                                    Planned Live Sessions for doubt clearing
                            </p>
                        </div>
                    </div>
                    
                    <p class="card__apply card__link" href="#">
                    <?php
                        if($is_enrolled) {
                            $user_name = $user_data['user_name'];
                            if ($is_completed) {
                                echo showCompletedMessage($user_name);
                            } else {
                                echo helloMessage($user_name);
                            }
                            
                        } else {
                            if(isset($_POST['EnrollNow'])) {
                                $res = doEnrolling($con, $user_data, $curr_course_table, $curr_course_page);
                                echo $res['out'];
                                if ($res['status']) {
                                    $is_enrolled = TRUE;
                                    echo '<script type="text/javascript">location.href = "./' . $curr_course_page . '";</script>';
                                }
                                
                            } else {
                                echo '<center>' . showEnrollButton() . '</center>';
                            }
                        }
                    ?>
                    </p>
                </div>
            </section>
        </article>
        <div <?php
            if(!$is_enrolled) {
                echo 'style="display:none"';
            }
        ?>>
            <section class="card-container">
                <h1 class="card-container-title">Course Reference Materials</h1>
                <ul>
                    <li>
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    Ref-1 : Design and Build Websites
                                </h3>
                                <time class="basic-card-header__time">
                                    23 <br>
                                    Jun
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content__synopsis">
                                    <h3 class="basic-card-content__heading">
                                        Synopsis
                                    </h3>
                                    <p>
                                        HTML & CSS
                                        Design and Build Websites
                                        by Jon Ducket <br>
                                    </p>
                                </section>
                                <section class="basic-card-content__due-date">
                                    <h3 class="basic-card-content__heading"> Due Date</h3>
                                    <time class="basic-card-content__info">
                                        No Due Date
                                    </time>
                                </section>
                                <section class="collapse" class="basic-card-content__collapsible-part"
                                    id="basic-card-content__collapsible-part0">
                                    <br>
                                    <section class="basic-card-content__description">
                                        <h3 class="basic-card-content__heading">
                                            Description
                                        </h3>
                                        <p>
                                            ● Those who want to learn how to design and build websites from scratch <br>
                                            ● Anyone who has a website (that may be built using a content management system,
                                            blogging software, or an e-commerce platform) and wants more control over the appearance
                                            of their pages
                                        </p>
                                    </section>
                                    <section class="basic-card-content__articles">
                                        <h3 class="basic-card-content__heading">Articles</h3>
                                        <article>
                                            <a href="resources/Python for Everybody.pdf">Download HTML & CSS by Duckett here</a>
                                        </article>
                                    </section>
                                </section>
                                <center>
                                    <a class="basic-card-collapse-button collapsed" data-toggle="collapse"
                                        href="#basic-card-content__collapsible-part0">
                                        <span class="if-collapsed"><i class="fas fa-chevron-down"></i></span>
                                        <span class="if-not-collapsed"><i class="fas fa-chevron-up"></i></span>
                                    </a>
                                </center>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    HTML Assigment 1
                                </h3>
                                <time class="basic-card-header__time">
                                    26 <br>
                                    Oct
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content__synopsis">
                                    <h3 class="basic-card-content__heading">
                                        Synopsis
                                    </h3>
                                    <p>
                                        Introductory Assigment for HTML <br>
                                    </p>
                                </section>
                                <section class="basic-card-content__due-date">
                                    <h3 class="basic-card-content__heading"> Due Date</h3>
                                    <time class="basic-card-content__warning">
                                        31 Nov
                                    </time>
                                </section>
                                <section class="collapse" class="basic-card-content__collapsible-part"
                                    id="basic-card-content__collapsible-part1">
                                    <br>
                                    <section class="basic-card-content__description">
                                        <h3 class="basic-card-content__heading">
                                            Description
                                        </h3>
                                        <p>
                                            HTML introductory assigment, Introduction, History, ARPANET, XHTML, HTTP connection, TCP
                                            and Handshakes, Types of HTTP
                                        </p>
                                    </section>
                                    <section class="basic-card-content__articles">
                                        <h3 class="basic-card-content__heading">Articles</h3>
                                        <article>
                                            <a
                                                href="https://drive.google.com/file/d/1T6TpZ8z_Pjq-fv2yyIepXjUUmrfN2IYJ/view?usp=sharing">Assignment
                                                1</a>
                                        </article>
                                    </section>
                                </section>
                                <center>
                                    <a class="basic-card-collapse-button collapsed" data-toggle="collapse"
                                        href="#basic-card-content__collapsible-part1">
                                        <span class="if-collapsed"><i class="fas fa-chevron-down"></i></span>
                                        <span class="if-not-collapsed"><i class="fas fa-chevron-up"></i></span>
                                    </a>
                                </center>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    HTML Assigment 2
                                </h3>
                                <time class="basic-card-header__time">
                                    29<br>
                                    Oct
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content__synopsis">
                                    <h3 class="basic-card-content__heading">
                                        Synopsis
                                    </h3>
                                    <p>
                                        Assigment 2 - HTML Tables and Forms <br>
                                    </p>
                                </section>
                                <section class="basic-card-content__due-date">
                                    <h3 class="basic-card-content__heading"> Due Date</h3>
                                    <time class="basic-card-content__warning">
                                        1 Dec
                                    </time>
                                </section>
                                <section class="collapse" class="basic-card-content__collapsible-part"
                                    id="basic-card-content__collapsible-part2">
                                    <br>
                                    <section class="basic-card-content__description">
                                        <h3 class="basic-card-content__heading">
                                            Description
                                        </h3>
                                        <p>
            
                                            Learn all the syntax you need to create tables in your HTML documents. Learn about the
                                            inner workings of an HTML form! Learn how to create your own form and integrate HTML5
                                            validations.
                                        </p>
                                    </section>
                                    <section class="basic-card-content__articles">
                                        <h3 class="basic-card-content__heading">Articles</h3>
                                        <article>
                                            <a
                                                href="https://drive.google.com/file/d/1T6TpZ8z_Pjq-fv2yyIepXjUUmrfN2IYJ/view?usp=sharing">Assignment
                                                2</a>
                                        </article>
                                        <article>
                                            <a href="https://www.w3schools.com/html/">HTML refs available here</a>
                                        </article>
                                    </section>
                                </section>
                                <center>
                                    <a class="basic-card-collapse-button collapsed" data-toggle="collapse"
                                        href="#basic-card-content__collapsible-part2">
                                        <span class="if-collapsed"><i class="fas fa-chevron-down"></i></span>
                                        <span class="if-not-collapsed"><i class="fas fa-chevron-up"></i></span>
                                    </a>
                                </center>
                            </div>
                        </article>
                    </li>
                </ul>
            </section>
            <section class="card-container">
                <h1 class="card-container-title">Recorded Sessions</h1>
                <p class="btn course-sort-by-button">Categorize by Duration</p>

                <!-- MENU FOR CATEGORIZING -->
                <input type="radio" id="All" name="duration" value="All" checked>
                <input type="radio" id="0-0.5hrs" name="duration" value="0-0.5hrs">
                <input type="radio" id="0.5-1hrs" name="duration" value="0.5-1hrs">
                <input type="radio" id="1-1.5hrs" name="duration" value="1-1.5hrs">
                <input type="radio" id="1.5-plus-hrs" name="duration" value="1.5-plus-hrs">

                <ol class="duration-filters">
                    <li>
                        <label for="All">All</label>
                    </li>
                    <li>
                        <label for="0-0.5hrs">0 - 0.5 hrs</label>
                    </li>
                    <li>
                        <label for="0.5-1hrs">0.5 - 1 hrs</label>
                    </li>
                    <li>
                        <label for="1-1.5hrs">1 - 1.5 hrs</label>
                    </li>
                    <li>
                        <label for="1.5-plus-hrs">1.5+ hrs</label>
                    </li>
                </ol>


                <ul class="recorded-sessions-list">
                    <li data-duration="1-1.5hrs">
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    1. Introduction and IDE
                                </h3>
                                <time class="basic-card-header__time">
                                    15<br>
                                    Aug
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content-section">
                                    <section class="basic-card-content__info-section">
                                        <section class="basic-card-content__synopsis">
                                            <h3 class="basic-card-content__heading">
                                                Synopsis
                                            </h3>
                                            <p>
                                                Introductory Session for HTML, Basics and IDE Setup <br>
                                            </p>
                                        </section>
                                        <section class="basic-card-content__due-date">
                                            <h3 class="basic-card-content__heading"> Duration </h3>
                                            <time class="basic-card-content__info">
                                                1 hour 30 minutes
                                            </time>
                                        </section>
                                    </section>
                                    <section class="basic-card-content__video-control-section">
                                        <p style="margin-bottom: 0.2rem;">
                                            Watch
                                        </p>
                                        <a href="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4"
                                            class="basic-card-video-button-container">
                                            <i class="basic-card-video-button fas fa-play"></i>
                                        </a>
                                    </section>
                                </section>
                            </div>
                        </article>
                    </li>
                    <li data-duration="1-1.5hrs">
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    2. Tags and History of HTML
                                </h3>
                                <time class="basic-card-header__time">
                                    17<br>
                                    Aug
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content-section">
                                    <section class="basic-card-content__info-section">
                                        <section class="basic-card-content__synopsis">
                                            <h3 class="basic-card-content__heading">
                                                Synopsis
                                            </h3>
                                            <p>
                                                History, ARPANET, XHTML, HTTP connection, TCP
                                                and Handshakes, Types of HTTP, HTML Tags and Design <br>
                                            </p>
                                        </section>
                                        <section class="basic-card-content__due-date">
                                            <h3 class="basic-card-content__heading"> Duration </h3>
                                            <time class="basic-card-content__info">
                                                1 hour 05 minutes
                                            </time>
                                        </section>
                                    </section>
                                    <section class="basic-card-content__video-control-section">
                                        <p style="margin-bottom: 0.2rem;">
                                            Watch
                                        </p>
                                        <a href="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4"
                                            class="basic-card-video-button-container">
                                            <i class="basic-card-video-button fas fa-play"></i>
                                        </a>
                                    </section>
                                </section>
                            </div>
                        </article>
                    </li>
                    <li data-duration="0.5-1hrs">
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    3. HTML Tables and Forms
                                </h3>
                                <time class="basic-card-header__time">
                                    25<br>
                                    Aug
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content-section">
                                    <section class="basic-card-content__info-section">
                                        <section class="basic-card-content__synopsis">
                                            <h3 class="basic-card-content__heading">
                                                Synopsis
                                            </h3>
                                            <p>
                                                HTML Tables, Forms, table data, table row, syntax, forms, form groups, validations etc. <br>
                                            </p>
                                        </section>
                                        <section class="basic-card-content__due-date">
                                            <h3 class="basic-card-content__heading"> Duration </h3>
                                            <time class="basic-card-content__info">
                                                50 minutes
                                            </time>
                                        </section>
                                    </section>
                                    <section class="basic-card-content__video-control-section">
                                        <p style="margin-bottom: 0.2rem;">
                                            Watch
                                        </p>
                                        <a href="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4"
                                            class="basic-card-video-button-container">
                                            <i class="basic-card-video-button fas fa-play"></i>
                                        </a>
                                    </section>
                                </section>
                            </div>
                        </article>
                    </li>
                    <li data-duration="0-0.5hrs">
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    4. Using the Console
                                </h3>
                                <time class="basic-card-header__time">
                                    28<br>
                                    Aug
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content-section">
                                    <section class="basic-card-content__info-section">
                                        <section class="basic-card-content__synopsis">
                                            <h3 class="basic-card-content__heading">
                                                Synopsis
                                            </h3>
                                            <p>
                                                Using the console for alerts, exploring various available commands, testing console available in chromium <br>
                                            </p>
                                        </section>
                                        <section class="basic-card-content__due-date">
                                            <h3 class="basic-card-content__heading"> Duration </h3>
                                            <time class="basic-card-content__info">
                                                20 minutes
                                            </time>
                                        </section>
                                    </section>
                                    <section class="basic-card-content__video-control-section">
                                        <p style="margin-bottom: 0.2rem;">
                                            Watch
                                        </p>
                                        <a href="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4"
                                            class="basic-card-video-button-container">
                                            <i class="basic-card-video-button fas fa-play"></i>
                                        </a>
                                    </section>
                                </section>
                            </div>
                        </article>
                    </li>
                    <li data-duration="1.5-plus-hrs">
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    5. Designing a card markup in html
                                </h3>
                                <time class="basic-card-header__time">
                                    29<br>
                                    Aug
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content-section">
                                    <section class="basic-card-content__info-section">
                                        <section class="basic-card-content__synopsis">
                                            <h3 class="basic-card-content__heading">
                                                Synopsis
                                            </h3>
                                            <p>
                                                Markup for a card demonstrated, flexibility, re-usability, design choices and arrangement studied in depth <br>
                                            </p>
                                        </section>
                                        <section class="basic-card-content__due-date">
                                            <h3 class="basic-card-content__heading"> Duration </h3>
                                            <time class="basic-card-content__info">
                                                1 hour 50 minutes
                                            </time>
                                        </section>
                                    </section>
                                    <section class="basic-card-content__video-control-section">
                                        <p style="margin-bottom: 0.2rem;">
                                            Watch
                                        </p>
                                        <a href="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4"
                                            class="basic-card-video-button-container">
                                            <i class="basic-card-video-button fas fa-play"></i>
                                        </a>
                                    </section>
                                </section>
                            </div>
                        </article>
                    </li>
                    <li data-duration="0.5-1hrs">
                        <article class="basic-card">
                            <header class="basic-card-header">
                                <h3 class="basic-card-header__title">
                                    6. HTML Semantic Elements
                                </h3>
                                <time class="basic-card-header__time">
                                    02<br>
                                    Sep
                                </time>
                            </header>
                            <div class="basic-card-content">
                                <section class="basic-card-content-section">
                                    <section class="basic-card-content__info-section">
                                        <section class="basic-card-content__synopsis">
                                            <h3 class="basic-card-content__heading">
                                                Synopsis
                                            </h3>
                                            <p>
                                                Semantic HTML and their effective utilization <br>
                                            </p>
                                        </section>
                                        <section class="basic-card-content__due-date">
                                            <h3 class="basic-card-content__heading"> Duration </h3>
                                            <time class="basic-card-content__info">
                                                55 minutes
                                            </time>
                                        </section>
                                    </section>
                                    <section class="basic-card-content__video-control-section">
                                        <p style="margin-bottom: 0.2rem;">
                                            Watch
                                        </p>
                                        <a href="https://file-examples-com.github.io/uploads/2017/04/file_example_MP4_1920_18MG.mp4"
                                            class="basic-card-video-button-container">
                                            <i class="basic-card-video-button fas fa-play"></i>
                                        </a>
                                    </section>
                                </section>
                            </div>
                        </article>
                    </li>
                </ul>
                <div style="display:flex;align-items: center; justify-content: space-evenly;">
                    <center>
                        <?php 
                            if ($is_enrolled) {
                                if(isset($_POST['Un-Enroll'])) {
                                    echo doUnEnrolling($con, $user_data, $curr_course_table, $curr_course_page);
                                } else {
                                echo showUnEnrollButton();
                                }
                            }
                        ?>
                    </center>
                    <center <?php 
                        if ($is_enrolled && $is_completed) {
                            echo 'style="display:none;"';
                        }
                    ?>>
                        <?php 
                            if(isset($_POST['Completion'])) {
                                echo doCompletion($con, $user_data, $curr_course_table, $curr_course_page);
                            } else {
                                echo completeCourseButton();
                            }
                        ?>
                    </center>
                </div>
            </section> 
        </div>
    </div>
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