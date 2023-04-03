<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baybayin Quiz 3</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>  
    <center>
    
    <!--PHP to fetch learner data-->
    <?php
      require "dbcon.php"; 
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from learner_data where learner_id = '".$_SESSION['userid']."'"); 
      while($data = mysqli_fetch_array($userData)){
    ?>

	  <!--Navbar-->
	  <nav>
      <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="homepageLearner.php">AralinBaybayin</a></div>
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
    <br />
    <?php
    }
    ?>

    <!--PHP command for clicking button and updating in the database userans-->
    <?php 															
	    if (isset($_POST['click']) || isset($_GET['start'])) {
	      @$_SESSION['clicks'] += 1 ;
	      $c = $_SESSION['clicks'];
	      if(isset($_POST['userans'])) { 
          $userselected = $_POST['userans'];
	        $fetchqry2 = "UPDATE `quiz3` SET `userans`='$userselected' WHERE `id`=$c-1"; 
	        $result2 = mysqli_query($db,$fetchqry2);
	      }																	
 	    } 
      else {
		  $_SESSION['clicks'] = 0;
	    }												
    ?>

    <!-- Starting the Quiz interface-->
    <div class="bump">
      <br>
      <form>
        <div class="title">Baybayin Quiz 1</div>
        <?php if($_SESSION['clicks']==0){ ?> 
          <button class="button" name="start" float="left" onclick="return confirm('Are you sure? Quizzes cannot be retaken!');"><span>START QUIZ</span></button> 
        <?php 
        } 
        ?>
      </form>
    </div>

    <!--Baybayin Questions fetched from database-->
    <div class="baybayinquestion"  style= "text-align:center">
      <form action="" method="post">  
   				
        <table>
          <?php if(isset($c)) {   
            $fetchqry = "SELECT * FROM `quiz3` where id='$c'"; 
				    $result=mysqli_query($db,$fetchqry);
				    $num=mysqli_num_rows($result);
				    $row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
		      ?>

          <tr><td><div class="baybayinquestion" ><br><?php echo @$row['que'];?></div>  </td></tr> <br> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 11){ ?>
          <tr><td><div class="baybayinquestion"> <input required type="radio" name="userans" value="<?php echo $row['option1'];?>"> <?php echo $row['option1']; ?> </div> </td></tr>
          <tr><td><div class="baybayinquestion"> <input required type="radio" name="userans" value="<?php echo $row['option2'];?>"> <?php echo $row['option2'];?>  </div> </td></tr>
          <tr><td><div class="baybayinquestion"> <input required type="radio" name="userans" value="<?php echo $row['option3'];?>"> <?php echo $row['option3']; ?> </div> </td></tr>
          <tr><td><div class="baybayinquestion"> <input required type="radio" name="userans" value="<?php echo $row['option4'];?>"> <?php echo $row['option4']; ?> </div> <br><br><br></td></tr>
          <tr><td> <button class="button" name="click" >Next</button></td></tr> 
          <?php 
          }
          ?>
        </table> 
      </form>
    </div>

    <!--Store quiz 3 grade of learner in database-->
    <form action="" method="post">  
      <?php if($_SESSION['clicks']>10){ 
	      $qry3 = "SELECT `ans`, `userans` FROM `quiz3`;";
	      $result3 = mysqli_query($db,$qry3);
	      $storeArray = Array();
        $score= 0;
	      while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
          if($row3['ans']==$row3['userans']){
		        $score = $score + 1 ;
	      }
        }
        require "dbcon.php"; // Using database connection file here
        @session_start();
        $userID = $_SESSION['userid'];
        $edit = mysqli_query($db, "UPDATE learner_progress SET q3_grade='$score' WHERE learner_id='".$_SESSION['userid']."'");
      ?> 
      <h2>Result</h2>
      <span>Your score:&nbsp;<?php echo $score;?>/10</span><br>
      <br><span></span>
    </form><br><br>

    <!--Add progress and go back to lesson page-->
    <input class="button" type="button" onClick="location.href='learnerReview3.php'" value="Review Answers"/>
    <?php 
    } 
    ?>
    <?php  ?>
 
    </center>
  </body>
</html>