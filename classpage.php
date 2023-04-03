<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Classes</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <!--PHP command to fetch teacher data-->
    <?php   
      include "dbcon.php"; // Using database connection file here
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from teacher_data where teacher_id = '".$_SESSION['userid']."'"); // fetch data from database
      while($data = mysqli_fetch_array($userData)){
    ?>

    <!--Navbar-->
    <nav>
      <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="#">AralinBaybayin</a></div>
        <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name"></span>
            <i class='bx bx-x' ></i>
          </div>
          <ul class="links">
            <li><a href="homepageTeacher.php">HOME</a></li>
            <li><a href="classpage.php">CLASSES</a></li>
            <li><a href="lessonTeacher.php">LESSON</a></li>
            <li>
              <a href="#"><?php echo $data['teacher_name']; ?></a>
              <i class='bx bxs-chevron-down js-arrow arrow'></i>
              <ul class="js-sub-menu sub-menu">
                <li><a href="profileTeacher.php">Profile</a></li>
                <li><a href="settingTeacher.php">Settings</a></li>
                <li><a href="login.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
  }
  ?>
    <?php mysqli_close($db); // Close connection ?>

    
    <!--Class numbers on a container-->
    <table class="boxed">
      <thead>
        <tr>
          <th>CLASS</th>
        </tr>
      </thead>
      
      <!--Fetch class numbers-->
      <?php
        include "dbcon.php"; // Using database connection file here
        @session_start();
        $userID = $_SESSION['userid'];
        $userData = mysqli_query($db,"SELECT DISTINCT class_table.* FROM class_table WHERE class_table.teacher_id = '".$_SESSION['userid']."'"); // fetch data from database
        while($data = mysqli_fetch_array($userData)){
      ?>
      <tr>
        <td><?php echo $data['class_section']; ?></td>
        <td><a href="classpage.php?class=<?php echo $data['class_no']; ?>"><?php echo $data['class_no']; ?></a></td>
      </tr>
      <?php
    }
    ?>
    </table>
    
    <!--Grades of students for every class number on a table-->
    <div>
    <?php
        include "dbcon.php"; // Using database connection file here
        @session_start();
        $userID = $_SESSION['userid'];
        $userData = mysqli_query($db,"SELECT DISTINCT class_table.* FROM class_table WHERE class_table.teacher_id = '".$_SESSION['userid']."'"); // fetch data from database
        $data = mysqli_fetch_array($userData);
      ?>
      <table class="teacherTable"> 
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Student Progress</th>
            <th>Quiz 1</th>
            <th>Quiz 2</th>
            <th>Quiz 3</th>
            <th>Final Exam</th>
            <th>Total Score</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <?php
    ?>
        <?php
          include "dbcon.php"; // Using database connection file here
          @session_start();
          if (isset($_GET['class'])) {
	          $class_num = $_GET['class'];
	          $classdata= mysqli_query($db, "SELECT DISTINCT student_data.*, student_progress.* 
            FROM student_data
            INNER JOIN student_progress
            ON student_data.student_id=student_progress.student_id
            WHERE student_data.class_no=$class_num");
            while($data = mysqli_fetch_array($classdata)){
            $totalgrade = ($data['q1_grade'] + $data['q2_grade'] + $data['q3_grade'] + $data['finalexam_grade'])/45 * 100;
            if($data['student_status'] =="100"){
              if($totalgrade >= "75"){
                $remarks = "Passed";
              } else{
                $remarks = "Failed";
              }
            }else{
              $remarks = "Incomplete";
            }
        ?>
        <tr>
          <td><a href="removeStudent.php?remove=<?php echo $data['student_id']; ?>" onclick="return confirm('Are you sure?');">Remove</a></td>
          <td><?php echo $data['student_name']; ?></td>
          <td><?php echo $data['student_status']; ?>%</td>
          <td><?php echo $data['q1_grade']; ?>/10</td>
          <td><?php echo $data['q2_grade']; ?>/10</td>
          <td><?php echo $data['q3_grade']; ?>/10</td>
          <td><?php echo $data['finalexam_grade']; ?>/15</td>
          <td><?php echo (int)$totalgrade;?>/100</td>
          <td><?php echo $remarks;?></td>
        </tr>
        <?php
        }
        ?>
        <?php
      }
      ?>
      </table>
    </div>


    <?php mysqli_close($db); // Close connection ?>
  </body>
</html>
