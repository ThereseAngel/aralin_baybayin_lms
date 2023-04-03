<!--LOGIN-->

<!--PHP command to fetch data inputted in the database-->
<?php
include "dbcon.php";
if(isset($_POST['login'])){ 

  //To know what type of user logs in the site
  $typeofPeople = mysqli_real_escape_string($db,$_POST['People']); 

  //If student type of user
  if ($typeofPeople == "S"){ 
    $classnum = mysqli_real_escape_string($db,$_POST['classnumber']);
    $uname = mysqli_real_escape_string($db,$_POST['user-name']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    //To know if the student exists on the database
    if ($uname != "" && $password != "" && $classnum != ""){
      $sql_query = "select * from student_data where class_no='".$classnum."' and student_username='".$uname."' and student_password='".$password."'";
      $result = mysqli_query($db,$sql_query);
      $row = mysqli_fetch_array($result);
      $num = mysqli_num_rows($result);
      if($num==1){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION["userid"] = trim($row["student_id"]);
        header('Location: homepageStudent.php');
      }
      else{
        echo '<script>alert("Invalid input! Please try again")</script>';
      }
    }
  }

  //If teacher type of user
  elseif ($typeofPeople == "T"){
    $uname = mysqli_real_escape_string($db,$_POST['user-name']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    //To know if the teacher exists on the database
    if ($uname != "" && $password != ""){
      $sql_query = "select * from teacher_data where teacher_username='".$uname."' and teacher_password='".$password."'";
      $result = mysqli_query($db,$sql_query);
      $row = mysqli_fetch_array($result);
      $num = mysqli_num_rows($result);
      if($num==1){
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['login'] = true;
        $_SESSION["userid"] = trim($row["teacher_id"]);
        header('Location: homepageTeacher.php');
      }
      else{
        echo '<script>alert("Invalid input! Please try again")</script>';
      }
    }
  }

  //If learner type of user
  else{
    $uname = mysqli_real_escape_string($db,$_POST['user-name']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    //To know if learner exists in the database
    if ($uname != "" && $password != ""){
      $sql_query = "select * from learner_data where learner_username='".$uname."' and learner_password='".$password."'";
      $result = mysqli_query($db,$sql_query);
      $row = mysqli_fetch_array($result);
      $num = mysqli_num_rows($result);
      if($num==1){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION["userid"] = trim($row["learner_id"]);
        header('Location: homepageLearner.php');
      }
      else{
        echo '<script>alert("Invalid input! Please try again")</script>';
      }
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
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="script2.js"></script>
  </head>
  <body>

    <!--Navbar-->
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

    <!--Start of Login Form -->
    <div id="logincontainer">
      <form method="post" action="">
        <!--Login container-->
        <p id="login-signup">Login</p>
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
          name="password"
          placeholder="Password"
          size="39"
          value=""
          required
        />
        <br />
        <!--Submit Button Login Form-->
        <input class="button" type="submit" name="login" value="Login" id="login" />
        <br>
        <!--Forgot Password-->
        <a class="add-info" href="forgot_pass.php" title="ForgotPassword">Forgot Password?</a>
        <hr />
        <!--Doesn't have an account SignUP -->
        <div style="font-size: small; color: #9b4922;">Does not have an account?</div>
        <a class="add-info" href="signup.php" title="signup">Sign up.</a>
      </form>
    </div>   
  </body>
</html>
