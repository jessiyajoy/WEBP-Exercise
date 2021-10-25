<?php
  require_once "./connection.php";
 
  if (isset($_POST['query'])) {

      $query1 = "SELECT user_name, email, user_id FROM Users WHERE user_name LIKE '{$_POST['query']}%' LIMIT 10";
      $result1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = $result1->fetch_assoc()) {
?>
    <li class="list-group-item course-item">
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
            <small>LMS User</small>
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
    </li>
<?php
      }
    }

    $query2 = "SELECT course_name, description FROM Courses WHERE course_name LIKE '{$_POST['query']}%' LIMIT 10";
    $result2 = mysqli_query($con, $query2);
    if (mysqli_num_rows($result2) > 0) {
      while ($row = $result2->fetch_assoc()) {
?>
<li class="list-group-item course-item"> 
            <a href="#" class="avatar rounded-circle">
                <img id="user" alt="Image placeholder" src="./resources/book.jpeg">
            </a>
            <div class="col ml--2">
                <h4 class="mb-0">
<?php
                    echo "<a href=\"#!\">", $row['course_name'],"</a>";
?>
                </h4>
            </div>
            <div class="col ml--2">
                <h5>
                    Description
                </h5>
                <h6 style="color:grey">
<?php
                    echo $row['description'];
?>
                </h6>
            </div>
<?php
            echo "<a href=\"./coursepage-", $row['course_name'], ".php\" class=\"goto\"> Go to course </a>";
?>
    </li>
<?php
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