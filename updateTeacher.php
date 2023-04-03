<!--PHP COMMAND FOR TEACHER SETTINGS-->
<?php
include "dbcon.php";
@session_start();
$userID = $_SESSION['userid'];

//When update username button is clicked
if(isset($_POST['updateUsername'])) {
    $newUn = $_POST['newUsername'];
    $edit = mysqli_query($db, "UPDATE teacher_data SET teacher_username='$newUn' WHERE teacher_id = '".$_SESSION['userid']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingTeacher.php"); 
        exit;
    }else{
        echo mysqli_error();
    } 
}
//When update name button is clicked
elseif (isset($_POST['updateName'])) { // when click on Update button
	$newName = $_POST['newName'];
    $edit = mysqli_query($db, "UPDATE teacher_data SET teacher_name='$newName' WHERE teacher_id = '".$_SESSION['userid']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingTeacher.php"); 
        exit;
    }else{
        echo mysqli_error();
    } 
}
//When update password button is clicked
elseif (isset($_POST['updatePassword'])){
	$newPassword = $_POST['newPassword'];
    $edit = mysqli_query($db, "UPDATE teacher_data SET teacher_password='$newPassword' WHERE teacher_id = '".$_SESSION['userid']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingTeacher.php"); 
        exit;
    }else{
        echo mysqli_error();
    } 
}
?>