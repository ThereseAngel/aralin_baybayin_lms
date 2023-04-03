<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <!--PHP TO FETCH USER DATA-->
    <?php  
      include "dbcon.php"; // Using database connection file here
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from student_data where student_id = '".$_SESSION['userid']."'"); // fetch data from database
      while($data = mysqli_fetch_array($userData)){
    ?>

    <!--NAVBAR-->
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
            <li>
              <a href="#"><?php echo $data['student_name']; ?></a>
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
    <?php
    }
    ?>

    <div class="title" id="title">
      How may I help you?
    </div>

    <div class="buttons-container">
      <!--Button for Change Name-->
        <button class="button" id="changeName">
          Change Name
        </button>

      <!--Button for Change Username-->
        <button class="button" id="changeUsername">
          Change Username
        </button>
    
      <!--Button for Change Password-->
        <button class="button" id="changePassword">
          Change Password
        </button>
    </div>
    <br>

    <!--CHANGE NAME-->
    <div id="changeNameContent">
      <form method="post" action="updateStudent.php">
        <!--Old Name-->
        <input type="text" name="oldName" placeholder="Old Name" value="" size="39" required/>
        <br />
        <!--New Name-->
        <input type="text" name="newName" placeholder="New Name" value="" size="39" required>
        <!--Submit Button-->
        <div id="changeButton">
          <button class="button" name="updateName">Submit</button>
        </div>
      </form>
    </div>

    <!--CHANGE USERNAME-->
    <div id="changeUsernameContent">
      <form method="post" action="updateStudent.php">
        <!--Old Username-->
        <input type="text" name="oldUsername" placeholder="Old Username" value="" size="39" required/>
        <br>
        <!--New Username-->
        <input type="text" name="newUsername" placeholder="New Username" value="" size="39" required>
        <!--Submit Button-->
        <div id="changeButton">
          <button class="button" name="updateUsername">Submit</button>
        </div>
      </form>
    </div>

    <!--CHANGE PASSWORD-->
    <div id="changePasswordContent">
      <form method="post" action="updateStudent.php">
        <!--Old Password-->
        <input type="password" name="oldPassword" placeholder="Old Password" value="" size="39" required>
        <br>
        <!--New Password-->
        <input type="password" name="newPassword" placeholder="New Password" value="" size="39" required>
        <!--Submit Button-->
        <div id="changeButton">
          <button class="button" name="updatePassword">Submit</button>
        </div>
      </form>
    </div>
    
    <!--JS FOR CHANGE FUNCTIONS-->
    <script src="script.js"></script>
  </body>
</html>
