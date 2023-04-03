<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <!--Script for translation-->
    <script src="scriptbaybay.js"></script>
    <script src="popupform.js"></script>
  </head>
  <body>
  
    <!--PHP to fetch data-->
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

    <!--Greetings Header Name-->
    <div class="title" id="title">Hello <?php echo $data['teacher_name']; ?>!</div>

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
    
    <!-- Graphics Right-->
    <div class="graphics-container">
      <p><img src="images/flag.png" alt="Aralin Baybayin" height="700px" style="margin-top: -90%" /></p>
    </div>

    <!--Classes Codes-->
    <div class="boxed">
      <h3>CLASSES</h4>
      
      <!--PHP fetch class codes-->
      <?php
        include "dbcon.php"; // Using database connection file here
        @session_start();
        $userID = $_SESSION['userid'];
        $user = mysqli_query($db,"SELECT class_no from class_table where teacher_id = '".$_SESSION['userid']."'"); // fetch data from database
        while($data = mysqli_fetch_array($user)){
      ?>
      <?php echo $data['class_no']; ?><br>
      <?php
        }
      ?>
      <button class="button" type="submit" onclick="openForm()" >Add A Class</button>
    </div>  
    <?php
    }
    ?>

  <div class="form-popup" id="myForm">
  <form action="addClass.php" method="get" class="form-container">
    <label for="sec"><b>Section:</b></label>
    <input type="text" placeholder="Section Name" name="sec" required><br>
    <button type="submit" class="button">Add</button><br>
    <button type="button" class="button" onclick="closeForm()">Close</button>
  </form>
</div>
  
  </body>
</html>
