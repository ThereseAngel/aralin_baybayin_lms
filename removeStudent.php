<?php
include "dbcon.php";
session_start();

if (isset($_GET['remove'])) {
	$student = $_GET['remove'];
    mysqli_query($db, "DELETE FROM student_progress WHERE student_id=$student");
    mysqli_query($db, "DELETE FROM student_data WHERE student_id=$student");
	header('location: classpage.php');
}
?>