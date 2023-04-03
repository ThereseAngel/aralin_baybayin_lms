<!--PHP command to add a new class-->
<?php
    include "dbcon.php"; // Using database connection file here
    @session_start();
    $userID = $_SESSION['userid'];
    $section=$_GET['sec'];
    $randomclass = rand(10000,99999);

	mysqli_query($db, "INSERT INTO class_table (teacher_id, class_no, class_section)
    VALUES ('$userID', '.$randomclass.', '$section')")
    or die (mysqli_error($db)); 
	$_SESSION['message'] = "New class added!"; 
    header('location: homepageTeacher.php');
?>