<?php

function check_login($con){
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM Users WHERE user_id = '$id' limit 1 ";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }
    }

    header("Location: signIn.php");
    die;
}


 # Utility functions for course management

function check_enrolledincourse($con, $curr_course, $user_id) {
    $sql = "SELECT * FROM $curr_course WHERE user_id = '$user_id' limit 1";
    $result = mysqli_query($con, $sql);
    if($result && mysqli_num_rows($result) > 0) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function check_completion($con, $curr_course, $user_id) {
    $sql = "SELECT * FROM $curr_course WHERE user_id = '$user_id' AND completed=1 limit 1";
    $result = mysqli_query($con, $sql);
    if($result && mysqli_num_rows($result) > 0) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

 function findTotalNumberOfEnrolledStudents ($con, $table) {
    $sql = "SELECT * FROM $table WHERE completed = 0";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}

function helloMessage($user_name) {
    $out =  '<div class="alert alert-primary" role="alert"> Hey ' . $user_name . ', See all updates below.</div>';
    return $out;
}

function showCompletedMessage($user_name) {
    $out =  '<div class="alert alert-primary" role="alert"> Hey ' .
    $user_name . 
    ', You Have Already Completed the course.</div>';
    return $out;
}

function doEnrolling($con, $user_data, $table, $curr_course_page) {
    $out = "";
    $user_id_submit = $user_data['user_id'];
    $user_name_submit = $user_data['user_name'];
    $sql = "INSERT INTO $table (user_id, user_name, completed)
            VALUES ('$user_id_submit', '$user_name_submit', 0);";
    if (mysqli_query($con, $sql)) {
        $out = $out . '<script>window.location.href = "successCourseEnroll.php?course=HTML&gotopage=' . $curr_course_page . '";</script>';
        $status = TRUE;
    } else {
        $STATUS = FALSE;
        $out = $out . "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    $status_and_out = array();
    $status_and_out['status'] = $status;
    $status_and_out['out'] = $out;
    return $status_and_out;
}

function doUnEnrolling($con, $user_data, $table, $curr_course_page) {
    $user_id_submit = $user_data['user_id'];
    $sql = "DELETE FROM $table WHERE user_id=$user_id_submit;";
    $out = "";
    if ($con->query($sql) === TRUE) {
        $out = $out . '<script type="text/javascript">location.href = "./' . $curr_course_page . '";</script>';
    } else {
        $out = $out . "Error deleting record: " . $con->error;
    }
    return $out;
}

function doReEnrolling($con, $user_data, $table, $curr_course_page) {
    doUnEnrolling($con, $user_data, $table, $curr_course_page);
    return doReEnrolling($con, $user_data, $table, $curr_course_page);
}

function doCompletion($con, $user_data, $table, $curr_course_page) {
    $user_id_submit = $user_data['user_id'];
    $user_id_submit = $user_data['user_id'];
    $sql = "UPDATE $table SET completed=1 WHERE user_id=$user_id_submit;";
    $out = "";
    if ($con->query($sql) === TRUE) {
        $out = $out . '<script type="text/javascript">location.href = "./' . $curr_course_page . '";</script>';
    } else {
        $out = $out . "Error updating record: " . $con->error;
    }
    return $out;
}

function showEnrollButton() {
    $out = '<form method="post">
                <input style = "font-size:1.4rem" class="btn btn-primary" type="submit" name="EnrollNow" value="Enroll Now"/>
            </form>';
    return $out;
}


function showReEnrollButton() {
    $out = '<form method="post">
                <input style = "font-size:1.4rem" class="btn btn-primary" type="submit" name="ReEnroll" value="Enroll Now"/>
            </form>';
    return $out;
}

function showUnEnrollButton() {
    $out =  '<form method="post">
                <input class="btn btn-danger" type="submit" name="Un-Enroll" value="Un-Enroll From This Course"/>
            </form>';
    return $out;
}

function completeCourseButton() {
    $out =  '<form method="post">
                <input class="btn btn-primary" type="submit" name="Completion" value="Complete this course"/>
            </form>';
    return $out;
}


function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for($i=0; $i < $len; $i++){
        $text .= rand(0,9);
    }

    return $text;
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>