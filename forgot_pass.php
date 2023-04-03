<!--PHP to retrieve account-->
<?php
include "dbcon.php";
if(isset($_POST['changepass'])){

  //To know that type of user
  $typeofPeople = mysqli_real_escape_string($db,$_POST['People']);

  //If user is a student
  if ($typeofPeople == "S"){
    $classnum = mysqli_real_escape_string($db,$_POST['classnumber']);
    $uname = mysqli_real_escape_string($db,$_POST['user-name']);
    $password = mysqli_real_escape_string($db,$_POST['newpassword']);
    $edit= mysqli_query($db, "UPDATE student_data  SET student_password='$password' WHERE student_username='$uname'");
    if($edit){
      header('Location: login.php');
    }
    else{
      echo '<script>alert("Invalid input! Please try again")</script>';
    }
  }

  //If user is a teacher
  elseif ($typeofPeople == "T"){
    $uname = mysqli_real_escape_string($db,$_POST['user-name']);
    $password = mysqli_real_escape_string($db,$_POST['newpassword']);
    $edit= mysqli_query($db, "UPDATE teacher_data  SET teacher_password='$password' WHERE teacher_username='$uname'");
    if($edit){
      header('Location: login.php');
    }
    else{
    echo '<script>alert("Invalid input! Please try again")</script>';
    }
  }

  //If user is a learner
  else{
    $uname = mysqli_real_escape_string($db,$_POST['user-name']);
    $password = mysqli_real_escape_string($db,$_POST['newpassword']);
    $edit= mysqli_query($db, "UPDATE learner_data  SET learner_password='$password' WHERE learner_username='$uname'");
    if($edit){
      header('Location: login.php');
    }
    else{
      echo '<script>alert("Invalid input! Please try again")</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="script2.js"></script>
  </head>
  <body>

    <!--Navbar to be filled with logo -->
    <nav>
      <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="startingpage.php"><img src="images/logo_title.png" height="80"></a></div>
        <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name"></span>
            <i class='bx bx-x' ></i>
          </div>
        </div>
      </div>
    </nav>

    <!--Form to retrieve account-->
    <div id="logincontainer">
      <form method="post" action="">
        <p id="login-signup">Retrieve Account</p>
        <!-- Dropdown Student, Teacher , Learner -->
        <select name="People" onChange="changetextbox();" id="userType" class="info" style="width: 73.8%;">
          <option value="S">Student</option>
          <option value="T">Teacher</option>
          <option value="L">Learner</option>
        </select>
        <br />
        <!--Input Class No. -->
        <input
          class="info"
          id="classNo"
          type="text"
          name="classnumber"
          placeholder="Class no."
          size="39"
          value=""
          required
        />
        <!--Input Username -->
        <br />
        <input
          class="info"
          type="text"
          name="user-name"
          placeholder="Username"
          size="39"
          value=""
          required
        />
        <br />
        <!--Input Password -->
        <input
          class="info"
          type="password"
          name="newpassword"
          placeholder="New Password"
          size="39"
          value=""
          required
        />
        <br />
        <!--Submit Button Login Form-->
        <input class="button" type="submit" name="changepass" value="Change Password" id="changepass" />
      </form>
    </div>
  </body>
</html>
