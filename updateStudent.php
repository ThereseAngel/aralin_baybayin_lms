<!--PHP COMMAND FOR STUDENT SETTINGS-->
<?php
include "dbcon.php";
@session_start();
$userName = $_SESSION['uname'];

//If update username button is clicked
if(isset($_POST['updateUsername'])) {
	$newUn = $_POST['newUsername'];
    $edit = mysqli_query($db, "UPDATE student_data SET student_username='$newUn' WHERE student_username = '".$_SESSION['uname']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingStudent.php"); 
        exit;
    }else{
        echo mysqli_error();
    } 
}
//If update name button is clicked
elseif (isset($_POST['updateName'])){
	$newName = $_POST['newName'];
    $edit = mysqli_query($db, "UPDATE student_data SET student_name='$newName' WHERE student_username = '".$_SESSION['uname']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingStudent.php"); 
        exit;
    }else{
        echo mysqli_error();
    } 
}
//If update password button is clicked
elseif (isset($_POST['updatePassword'])){
	$newPassword = $_POST['newPassword'];
    $edit = mysqli_query($db, "UPDATE student_data SET student_password='$newPassword' WHERE student_username = '".$_SESSION['uname']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingStudent.php"); 
        exit;
    }else{
        echo mysqli_error();
    } 
}
?>