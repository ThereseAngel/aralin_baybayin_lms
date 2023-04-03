<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!--PHP to fetch teacher data-->
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

    <!--Header-->
    <div class="classno"></div>
    <hr>

    <!--Default Picture-->
    <div class="profilePic">
      <div class="outr">
        <div class="innr">
        </div>
      </div>
    </div>

    <!--Profile details-->
    <div class="icons-names">
      <img class="iconProfile" src="images/name-logo.png" alt=""/>
      <span class="nameLearner"><?php echo $data['teacher_name']; ?></span>
      <br />
      <img class="iconProfile" src="images/gender-logo.png" alt=""/>
      <span class="genderLearner"><?php echo $data['teacher_sex']; ?></span>
      <br />
      <?php
      }
      ?>
      <?php mysqli_close($db); // Close connection ?>
    </div>
    
  </body>
</html>
