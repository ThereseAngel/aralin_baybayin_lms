<!--PHP command to update the progress of student-->
<?php
    include "dbcon.php"; // Using database connection file here
    @session_start();
    $userID = $_SESSION['userid'];
    $sql_query = "select * from student_progress where student_id='".$userID."'";
    $result = mysqli_query($db,$sql_query);
    $row = mysqli_fetch_array($result);
    if($row['student_status'] == "90")  {
        $edit = mysqli_query($db, "UPDATE student_progress SET student_status=student_status + 5 WHERE student_id='".$_SESSION['userid']."'");
        header("location: lessonStudent.php"); // redirects to all records page
    }
    else{
        $edit = mysqli_query($db, "UPDATE student_progress SET student_status=student_status + 10 WHERE student_id='".$_SESSION['userid']."'");
        header("location: lessonStudent.php"); // redirects to all records page
    } 
    exit;
?>