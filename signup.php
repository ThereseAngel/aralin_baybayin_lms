<!--PHP for signup-->
<?php
include "dbcon.php";
if(isset($_POST['SignupSubmit'])){
  //To know that type of user
  $typeofPeople = mysqli_real_escape_string($db,$_POST['People']);

  //If student type--insert values to student data
  if ($typeofPeople == "S"){
		$classnum = $_REQUEST['classnumber'];
		$fullname = $_REQUEST['fullname'];
		$gender = $_REQUEST['Gender'];
		$username = $_REQUEST['user-name'];
		$password = $_REQUEST['password'];
    //If class number exists
    $sql_query = "select count(*) as cntUser from class_table where class_no='".$classnum."'";
    $result = mysqli_query($db,$sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];
    if($count > 0){
      //If username already exists
      $sql_query = "select count(*) as existUser from student_data where student_username='".$username."'";
      $result = mysqli_query($db,$sql_query);
      $row = mysqli_fetch_array($result);
      $count = $row['existUser'];
      if($count > 0){
        echo '<script>alert("Existing username!")</script>';
      }else{
        // Performing insert query execution
		    $sql1 = "INSERT INTO student_data VALUES ('','$classnum', '$fullname', '$username','$password', '$gender')";
        $sql2=  "INSERT INTO student_progress  VALUES (LAST_INSERT_ID(), '$classnum','0','0','0','0','0')";
		    if(mysqli_query($db, $sql1)){
          mysqli_query($db,$sql2);
			    header("Location: login.php");
		    } else{
			    die("Error in connection" . mysqli_connect_error()) ;
        }
      }
    }else{
      echo '<script>alert("Class does not exist!")</script>';
    }
  }
  //If teacher type--insert values to teacher data
  elseif ($typeofPeople == "T"){
    // Taking all 5 values from the form data(input)
		$fullname = $_REQUEST['fullname'];
		$gender = $_REQUEST['Gender'];
		$username = $_REQUEST['user-name'];
		$password = $_REQUEST['password'];
    //If username already exists
    $sql_query = "select count(*) as existUser from teacher_data where teacher_username='".$username."'";
    $result = mysqli_query($db,$sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['existUser'];
    if($count > 0){
      echo '<script>alert("Existing username!")</script>';
    }else{
      // Performing insert query execution
		  $sql = "INSERT INTO teacher_data VALUES ('', '$fullname','$username','$password','$gender')";
		  if(mysqli_query($db, $sql)){
			  header("Location: login.php");
		  } else{
			  echo '<script>alert("Error! Please try again!")</script>';
		  }
    }
  }
  //If learner type--insert values to learner data
  else{
    // Taking all 5 values from the form data(input)
		$fullname = $_REQUEST['fullname'];
		$gender = $_REQUEST['Gender'];
		$username = $_REQUEST['user-name'];
		$password = $_REQUEST['password'];	
    //If username already exists
		$sql_query = "select count(*) as existUser from learner_data where learner_username='".$username."'";
    $result = mysqli_query($db,$sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['existUser'];
    if($count > 0){
      echo '<script>alert("Existing username!")</script>';
    }else{
      // Performing insert query execution
		  $sql = "INSERT INTO learner_data VALUES ('', '$fullname', '$username','$password', '$gender')";
      $sql2=  "INSERT INTO learner_progress  VALUES (LAST_INSERT_ID(), '0','0','0','0','0') ";
		  if(mysqli_query($db, $sql)){
        mysqli_query($db,$sql2);
			  header("Location: login.php");
		  } else{
			  echo '<script>alert("Error! Please try again!")</script>';
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
    <title>SIGNUP</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="script2.js"></script>
    <script type="text/javascript" src="script3.js"></script>
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

    <!--Start of Sign Up Form -->
    <!-- SignUp container-->
    <div id="logincontainer">
    <form method="post" action="">
        <p id="login-signup">Sign-up</p>
        <!-- Dropdown Student, Teacher , Learner -->
        <select name="People" onChange="changetextbox();" id="userType" class="info" style="width: 73.8%;">
          <option value="S">Student</option>
          <option value="T">Teacher</option>
          <option value="L">Learner</option>
        </select>
        <br />

        <!--Input Class No. -->
        <input
          type="text"
          name="classnumber"
          id="classNo"
          placeholder="Class no."
          value=""
          size="39"
          required
        />
        <br />
        <!--Full Name-->
        <input
          type="text"
          name="fullname"
          placeholder="First Name, Last Name"
          value=""
          size="39"
          required
        />
        <br />
        <!--Dropdown Gender-->
        <select name="Gender" id="GenderDropdown" style="width: 73.8%;" required>
          <option value="0" selected disabled>Male or Female</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <br />
        <!--Input Username -->
        <input
          type="text"
          name="user-name"
          placeholder="Username"
          value=""
          size="39"
          required
        />
        <br />
        <!--Input Password -->
        <input
          type="password"
          name="password"
          placeholder="Password"
          id="password"
          value=""
          size="39"
          required
          onChange="check();"
        />
        <br />
        <!--Confirm Password-->
        <input
          type="password"
          name="repeatPassword"
          placeholder="Repeat Password"
          id="confirm_password"
          value=""
          size="39"
          required
          onChange="check();"
        />
        <p id="message"></p>
        <br />
        <!--Submit Button Sign Up Form-->
        <input class="button" type="submit" name="SignupSubmit" value="Sign Up" />
      </form>
    </div>
  </body>
</html>