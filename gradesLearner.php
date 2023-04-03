<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grades</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <!--PHP to fetch data from learner_data and learner_progress-->
    <?php     
      include "dbcon.php"; // Using database connection file here
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT learner_data.*, learner_progress.* from learner_data inner join learner_progress 
      on learner_data.learner_id=learner_progress.learner_id where learner_data.learner_id = '".$_SESSION['userid']."'"); // fetch data from database
      while($data = mysqli_fetch_array($userData)){
    ?>

    <!--Navbar to be filled with logo -->
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
            <li><a href="homepageLearner.php">HOME</a></li>
            <li><a href="#">GRADES</a></li>
            <li>
              <a href="#"><?php echo $data['learner_name']; ?></a>
              <i class='bx bxs-chevron-down js-arrow arrow'></i>
              <ul class="js-sub-menu sub-menu">
                <li><a href="profileLearner.php">Profile</a></li>
                <li><a href="settingLearner.php">Settings</a></li>
                <li><a href="login.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Table of grades-->
    <table class="learnerStudentsTable"> 
      <thead>
      <tr>
        <th>Quiz 1</th>
        <th>Quiz 2</th>
        <th>Quiz 3</th>
        <th>Final Exam</th>
        <th>Total Score</th>
        <th>Remarks</th>
      </tr>
      </thead>
    
      <!--PHP to fetch grades-->
      <?php  
        include "dbcon.php"; // Using database connection file here
        @session_start();
        $userID = $_SESSION['userid'];
        $userData = mysqli_query($db,"SELECT learner_data.*, learner_progress.* from learner_data inner join learner_progress 
        on learner_data.learner_id=learner_progress.learner_id where learner_data.learner_id = '".$_SESSION['userid']."'"); // fetch data from database
        while($data = mysqli_fetch_array($userData)){
        $totalgrade = ($data['q1_grade'] + $data['q2_grade'] + $data['q3_grade'] + $data['finalexam_grade'])/45 * 100;
        if($data['learner_status'] =="100"){
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
    </table>

    <?php
      } 
    ?>
    <?php mysqli_close($db); // Close connection ?>
  </body>
</html>
