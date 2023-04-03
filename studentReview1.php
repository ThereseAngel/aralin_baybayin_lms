<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baybayin Quiz 1</title>
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

    <!--Show quiz 1 answer sheet-->
    <div class="allLessons" id="allLessonscontainer">
      <div class="title-on-quizzes">Baybayin Quiz 1 Answers</div>
        <!-- Quiz container-->
        <?php
          $tableName1="quiz1";
          $columns= ['id', 'que','option1','option2','option3', 'option4','ans','userans'];
          $fetchData = fetch_data($db, $tableName1, $columns);
          function fetch_data($db, $tableName1, $columns){
            if(empty($db)){
              $msg= "Database connection error";
            }
            elseif (empty($columns) || !is_array($columns)) {
              $msg="columns Name must be defined in an indexed array";
            }
            elseif(empty($tableName1)){
              $msg= "Table Name is empty";
            }
            else{
              $columnName = implode(", ", $columns);
              $query = "SELECT ".$columnName." FROM $tableName1"." ORDER BY id DESC";
              $result = $db->query($query);
              if($result== true){ 
                if ($result->num_rows > 0) {
                  $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                  $msg= $row;
                } 
                else {
                  $msg= "No Data Found"; 
                }
              }
              else{
                $msg= mysqli_error($db);
              }
            }
              return $msg;
            }
          ?>
          <div class="container">
            <div class="baybayinquestion">
              <div class="col-sm-8">
                <?php echo $deleteMsg??''; ?>
                  <div class="table-responsive">
                    <table class="tablequestionbaybay">
                      <thead>
                        <tr>
                          <th>Number</th>
                          <th style="font-family:noto">Question</th>
                          <th>Option 1</th>
                          <th>Option 2</th>
                          <th>Option 3</th>
                          <th>Option 4</th>
                          <th>Your answer</th>
                          <th>Correct Answer:</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if(is_array($fetchData)){      
                            $sn=1;
                            foreach($fetchData as $data){
                        ?>     
                        <tr>
                          <td><?php echo $data['id']??''; ?></td>
                          <td><?php echo $data['que']??''; ?></td>
                          <td><?php echo $data['option1']??''; ?></td>
                          <td><?php echo $data['option2']??''; ?></td>
                          <td><?php echo $data['option3']??''; ?></td>
                          <td><?php echo $data['option4']??''; ?></td>
                          <td><?php echo $data['userans']??''; ?></td>   
                          <td><?php echo $data['ans']??''; ?></td>   
                        </tr>
                        <?php $sn++;}}else{ ?>
                        <tr>
                          <td colspan="8"><?php echo $fetchData; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!--Go back to lesson page-->
    <input class="button" type="button"  onClick="location.href='addprogressStudent.php'" value="Go back to Lessons"/>
  
  </body>
</html>