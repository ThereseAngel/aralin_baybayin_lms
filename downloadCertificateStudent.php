<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baybayin Final Exam</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>  
    <center>

    <!--PHP fetch teacher data-->
    <?php
      require "dbcon.php"; 
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from student_data where student_id = '".$_SESSION['userid']."'"); 
      while($data = mysqli_fetch_array($userData)){
    ?>

    <!--Navbar-->
    <nav>
      <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="homepageStudent.php">AralinBaybayin</a></div>
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
    <br />
    <?php
    }
    ?>

<?php 
     require "dbcon.php"; // Using database connection file here
     @session_start();
     $userID = $_SESSION['userid'];
     $userData = mysqli_query($db,"SELECT * from student_data where student_id = '".$_SESSION['userid']."'"); // fetch data from database
     $data = mysqli_fetch_array($userData);
     $font_size_date = 10;
     $name = strtoupper( $data['student_name']);
    $name_len = strlen( $data['student_name']);
       
          //designed certificate picture
          $image = "images/cert.png";

          $createimage = imagecreatefrompng($image);

          //this is going to be created once the generate button is clicked
          $output = "images/certificate.png";

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);

          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 200;
          $origin_y=260;

          //we then set the x and y axis to fix the position of our text occupation
          $origin1_x = 480;
          $origin1_y=360;

          //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
          if($name_len<=7){
            $font_size = 25;
            $origin_x = 190;
          }
          elseif($name_len<=12){
            $font_size = 30;
          }
          elseif($name_len<=15){
            $font_size = 26;
          }
          elseif($name_len<=20){
             $font_size = 18;
          }
          elseif($name_len<=22){
            $font_size = 15;
          }
          elseif($name_len<=33){
            $font_size=11;
          }
          else {
            $font_size =10;
          }

          $certificate_text = $name;
          $date= date('d F, Y');//current date

          //font directory for name
          $drFont = dirname(__FILE__)."/Viga-Regular.ttf";

         

          //function to display name on certificate picture
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $white,$drFont, $certificate_text);
          $text2 = imagettftext($createimage, $font_size_date, $rotation, $origin1_x+2, $origin1_y, $white, $drFont, $date);
          imagepng($createimage,$output,3);

 ?>

        <h1 style="margin-top: 10%" >Congratulations! You finished the course!</h1>
        <!-- this displays the image below -->
        <img style="margin-top: 5%" src="<?php echo $output; ?>">
        <br> 
        <br>

         <!--Go back to lesson page-->
    <input class="button" type="button" onClick="location.href='lessonStudent.php'" value="Go back"/>

    </body>
</html>