//JS for login/signup class number input--disable if not student

function changetextbox()
{
    if (document.getElementById("userType").value == "S") {
        document.getElementById("classNo").disabled='false';
    } else {
        document.getElementById("classNo").disabled='true';
    }
}