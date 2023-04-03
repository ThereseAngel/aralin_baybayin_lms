<?php 
	include('dbcon.php');
	
	$section=$_GET['sec'];
    $cnum =$_GET['section'];

	mysqli_query($db, "UPDATE class_table SET class_section='$section' WHERE class_no='$cnum'");
	if(!$db){
        echo mysqli_error($db);
    }
    else {
        header("classpage.php");
    }
?>