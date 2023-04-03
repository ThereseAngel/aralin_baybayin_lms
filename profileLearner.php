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
  
    <!--PHP to fetch learner data-->
    <?php
      include "dbcon.php"; // Using database connection file here
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from learner_data where learner_id = '".$_SESSION['userid']."'"); // fetch data from database
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
            <li><a href="gradesLearner.php">GRADES</a></li>
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

    <!--Profile Details-->
    <div class="icons-names">
      <img class="iconProfile" src="images/name-logo.png" alt=""/>
      <span class="nameLearner"><?php echo $data['learner_name']; ?></span>
      <br />
      <img class="iconProfile" src="images/gender-logo.png" alt=""/>
      <span class="genderLearner"><?php echo $data['learner_sex']; ?></span>
      <br />
      <?php
        }
      ?>
      <?php mysqli_close($db); // Close connection ?>
    </div>
    
  </body>
</html>
