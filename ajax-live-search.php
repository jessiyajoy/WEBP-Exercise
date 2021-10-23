<?php
  require_once "./connection.php";
 
  if (isset($_POST['query'])) {

      $query1 = "SELECT user_name FROM Users WHERE user_name LIKE '{$_POST['query']}%' LIMIT 10";
      $result1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($result1) > 0) {
        while ($res = mysqli_fetch_array($result1)) {
          echo "<a href=\"user.html#\" class=\"list-group-item list-group-item-action\">", "USER : ", $res['user_name'] , "</a>";
      }
    }

    $query2 = "SELECT course_name FROM Courses WHERE course_name LIKE '{$_POST['query']}%' LIMIT 10";
    $result2 = mysqli_query($con, $query2);
    if (mysqli_num_rows($result2) > 0) {
      while ($res = mysqli_fetch_array($result2)) {
        echo "<a href=\"./coursepage-",$res['course_name'] ,".php\" class=\"list-group-item list-group-item-action\">", "COURSE : ",  $res['course_name'] , "</a>";
      }
    } 
  
    if (mysqli_num_rows($result1) === 0 and mysqli_num_rows($result2) === 0) {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          No matching results found
      </div>
      ";
    }
  }
?>