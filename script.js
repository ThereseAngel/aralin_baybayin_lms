//JS SCRIPT FOR SETTINGS

//To change name
document.getElementById("changeName").onclick = function() {
  document.getElementById("changeNameContent").style.display = "block";
  document.getElementById("changeUsernameContent").style.display = "none";
  document.getElementById("changePasswordContent").style.display = "none";
}

//To change username
document.getElementById("changeUsername").onclick = function(){
  document.getElementById("changeNameContent").style.display = "none";
  document.getElementById("changeUsernameContent").style.display = "block";
  document.getElementById("changePasswordContent").style.display = "none";
}

//To change password
document.getElementById("changePassword").onclick = function() {
  document.getElementById("changeNameContent").style.display = "none";
  document.getElementById("changeUsernameContent").style.display = "none";
  document.getElementById("changePasswordContent").style.display = "block";
}
