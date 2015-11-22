function myFunction() {
    var password = document.getElementById("password").value;
    var conPassword = document.getElementById("conPassword").value;
    var ok = true;
    if (password != conPassword) {
        document.getElementById("password").style.backgroundColor = "#FD7471";
        document.getElementById("conPassword").style.backgroundColor = "#FD7471";
        alert("Wrong password");
        ok = false;
    }
    if(password.length < 6){
        document.getElementById("password").style.backgroundColor = "#FD7471";
        document.getElementById("conPassword").style.backgroundColor = "#FD7471";
        alert("Password is short");
        ok = false;
    }
    return ok;
}
