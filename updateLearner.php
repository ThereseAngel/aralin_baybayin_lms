<!--PHP COMMAND FOR LEARNER SETTINGS-->
<?php
include "dbcon.php";
@session_start();
$userID = $_SESSION['userid'];
//If update username button is clicked
if(isset($_POST['updateUsername'])) {
	$newUn = $_POST['newUsername'];
    $edit = mysqli_query($db, "UPDATE learner_data SET learner_username='$newUn' WHERE learner_id = '".$_SESSION['userid']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingLearner.php"); // redirects to all records page
        exit;
    }else{
        echo mysqli_error();
    } 
}
//If update name button is clicked
elseif (isset($_POST['updateName'])) {
	$newName = $_POST['newName'];
    $edit = mysqli_query($db, "UPDATE learner_data SET learner_name='$newName' WHERE learner_id = '".$_SESSION['userid']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingLearner.php"); // redirects to all records page
        exit;
    }else{
        echo mysqli_error();
    } 
}
//If update password button is clicked
elseif (isset($_POST['updatePassword'])){
	$newPassword = $_POST['newPassword'];
    $edit = mysqli_query($db, "UPDATE learner_data SET learner_password='$newPassword' WHERE learner_id = '".$_SESSION['userid']."'");
    if($edit){
        mysqli_close($db); // Close connection
        header("location: settingLearner.php"); // redirects to all records page
        exit;
    }
    else{
        echo mysqli_error();
    } 
}
?>