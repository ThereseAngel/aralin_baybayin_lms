<!--PHP command to update the progress of learner-->
<?php
    include "dbcon.php"; // Using database connection file here
    @session_start();
    $userID = $_SESSION['userid'];
    $sql_query = "select * from learner_progress where learner_id='".$userID."'";
    $result = mysqli_query($db,$sql_query);
    $row = mysqli_fetch_array($result);
    if($row['learner_status'] == "90")  {
        $edit = mysqli_query($db, "UPDATE learner_progress SET learner_status=learner_status + 5 WHERE learner_id='".$_SESSION['userid']."'");
        header("location: lessonLearner.php"); // redirects to all records page
    }
    else{
        $edit = mysqli_query($db, "UPDATE learner_progress SET learner_status=learner_status + 10 WHERE learner_id='".$_SESSION['userid']."'");
        header("location: lessonLearner.php"); // redirects to all records page
    } 
    exit;
?>