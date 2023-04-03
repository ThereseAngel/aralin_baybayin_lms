<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <!--Script for progress bar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js" charset="utf-8"></script>
    <script>
      $(function() {
        $('.chart').easyPieChart({
          size: 160, barColor: "#9b4922", scaleLength: 0, lineWidth: 15, trackColor: "#525151", lineCap: "circle", animate: 2000,
        });
      });
    </script>
    <!--Script for translation-->
    <script src="scriptbaybay.js"></script>
  </head>
  <body>

    <!--PHP fetch data-->
    <?php
      require "dbcon.php"; // Using database connection file here
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from student_data where student_id = '".$_SESSION['userid']."'"); // fetch data from database
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
            <li><a href="homepageStudent.php">HOME</a></li>
            <li><a href="gradesStudent.php">GRADES</a></li>
            <li><a href="#"><?php echo $data['student_name']; ?></a>
              <i class='bx bxs-chevron-down js-arrow arrow'></i>
              <ul class="js-sub-menu sub-menu">
                <li><a href="profileStudent.php">Profile</a></li>
                <li><a href="settingStudent.php">Settings</a></li>
                <li><a href="login.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!--Greetings Header Name-->
    <div class="title" id="title">Hello <?php echo $data['student_name']; ?>!</div>
    <?php
    }
    ?>

    <!-- Graphics Right-->
    <div class="graphics-container">
      <p> <img src="images/flag.png" alt="Aralin Baybayin" height="700px" style="margin-top: -150%" /></p>
    </div>

    <!--PHP fetch data-->
    <?php
      require "dbcon.php"; // Using database connection file here
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from student_progress where student_id = '".$_SESSION['userid']."'"); // fetch data from database
      while($data = mysqli_fetch_array($userData)){
    ?>
    
    <!-- Progress bar Circle and Percent-->
    <div class="progbar">
      <div class="chart" data-percent="<?php echo $data['student_status']; ?>">
      <div class="stats"><?php echo $data['student_status']; ?>%</div></div><br>
      <button class="button" id="startLesson" onclick="window.location.href='startlessonStudent.php'">Start Lesson</button>
    </div>

    <?php
    }
    ?>

    <!--Modernong Baybay-->
    <div class="modern">
      <textarea class="modernWord" placeholder="Baybayin" id="modernSpelling" oninput="modernToBaybayin()"></textarea>
      <!--Alert if letter is not recognized-->
      <div class="alert alert-secondary" id="unsupportedDiv" style="display: none">
        <p align="center">There are few letters that are not supported.</p>
      </div>
      <!-- Baybayin Translate-->
      <div class="translation">
        <textarea class="baybayin-display" placeholder="ᜊᜌ᜔ᜊᜌᜒᜈ᜔" id="baybay" oninput="baybayinToModern()"></textarea>
        <!--Button to copy-->
        <button class="button" id="copyBtn" onclick="copyToClp('baybay')">Copy</button>
      </div>
    </div>

    <?php mysqli_close($db); // Close connection ?>  
  </body>
</html>
