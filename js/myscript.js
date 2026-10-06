function validation() {
    var isValid = true;

    if (!checkName()) isValid = false;
    if (!checkEmail()) isValid = false;
    if (!checkUsername()) isValid = false;
    if (!checkPassword()) isValid = false;
    if (!checkDob()) isValid = false;
    if (!checkTerms()) isValid = false;
    if (!checkAddress()) isValid = false;
    if (!checkGender()) isValid = false;
    if (!checkPhnumber()) isValid = false;

    if (!isValid) {
        return false;
    }

    return true;
}

function checkName() {
    var sname = document.getElementById("sname").value;
    if (sname === "" || sname.length < 3) {
        document.getElementById("snameerror").innerHTML =
            " *Name must be mentioned";
        return false;
    } else {
        document.getElementById("snameerror").innerHTML = "";
        return true;
    }
}

function checkEmail() {
    var email = document.getElementById("emailAddress").value;
    if (email === "") {
        document.getElementById("emailerror").innerHTML =
            " *Email is required";
        return false;
    } else {
        var email_pattern = /@email\.com/;
        var email_matching_result = email_pattern.test(email);
        if (!email_matching_result) {
            document.getElementById("emailerror").innerHTML =
                " *Email format is not valid";
            return false;
        } else {
            document.getElementById("emailerror").innerHTML = "";
            return true;
        }
    }
}

function checkUsername() {
    var uname = document.getElementById("uname").value;
    if (uname === "") {
        document.getElementById("unameerror").innerHTML =
            " *Username is required";
        return false;
    } else {
        if (!/^[a-zA-z_0-9]*$/.test(uname)) {
            document.getElementById("unameerror").innerHTML =
                "Only characters, alphabetic numeric characters, dash, underscore can be used in username";
            return false;
        } else if (uname.length < 2) {
            document.getElementById("unameerror").innerHTML =
                "Username must contain at least 2 characters";
            return false;
        } else {
            document.getElementById("unameerror").innerHTML = "";
            return true;
        }
    }
}

function checkPassword() {
    var password = document.getElementById("password").value;
    if (password === "") {
        document.getElementById("passworderror").innerHTML =
            " *Password is required";
        return false;
    } else {
        if (password.length < 5) {
            document.getElementById("passworderror").innerHTML =
                " *Password must contain at least 5 characters";
            return false;
        } else {
            var special_pass_check_1 = /[#%$]/.test(password);
            if (!special_pass_check_1) {
                document.getElementById("passworderror").innerHTML =
                    "Password must contain at least one of  $, #, %";
                return false;
            } else {
                document.getElementById("passworderror").innerHTML = "";
                return true;
            }
        }
    }
}

function checkDob() {
    var dob = document.getElementById("dOb").value;
    if (dob === "") {
        document.getElementById("doberror").innerHTML =
            " *Date of Birth is required";
        return false;
    } else {
        document.getElementById("doberror").innerHTML = "";
        return true;
    }
}

function validation() {
    // Other validations ...

    var gender = document.getElementById("gender").value;
    if (gender == "") {
        document.getElementById("gendererror").innerHTML = "Gender is required";
        return false;
    } else {
        document.getElementById("gendererror").innerHTML = "";
    }

    // Other validations ...

    return true;
}


function checkTerms() {
    var terms = document.getElementById("termscheck").checked;
    if (!terms) {
        document.getElementById("termerror").innerHTML =
            " *Terms and Conditions must be accepted";
        return false;
    } else {
        document.getElementById("termerror").innerHTML = "";
        return true;
    }
}

function checkAddress() {
    var address = document.getElementById("address").value;
    if (address === "") {
        document.getElementById("addresserror").innerHTML =
            " *Address is required";
        return false;
    } else {
        document.getElementById("addresserror").innerHTML = "";
        return true;
    }
}

function checkGender() {
    var gender = document.getElementById("gender").value;
    if (gender === "") {
        document.getElementById("gendererror").innerHTML =
            " *Gender must be specified";
        return false;
    } else {
        document.getElementById("gendererror").innerHTML = "";
        return true;
    }
}

function checkPhnumber() {
    var phnumber = document.getElementById("phnumber").value;
    if (phnumber === "") {
        document.getElementById("phnumbererror").innerHTML =
            " *Phone number is required";
        return false;
    } else {
        var phn_pattern = /01[0-9]{9}/i;
        var phn_matching_result = phn_pattern.test(phnumber);
        if (!phn_matching_result) {
            document.getElementById("phnumbererror").innerHTML =
                " *Phone format is not valid";
            return false;
        } else {
            document.getElementById("phnumbererror").innerHTML = "";
            return true;
        }
    }
}

function getproform() {
    var isValid = true;

    if (!checkPhnumber()) isValid = false;
    if (!checkAddress()) isValid = false;
    if (!checkUsername()) isValid = false;
    if (!checkName()) isValid = false;

    if (!isValid) {
        return false;
    }

    return true;
}

function getpassform() {
    return getPassword();
}

function getPassword() {
    var password = document.getElementById("newPassword").value;
    var passwordError = document.getElementById("passwordError");

    if (password === "") {
        passwordError.innerHTML = " *Password is required";
        return false;
    } else {
        if (password.length < 5) {
            passwordError.innerHTML = " *Password must contain at least 5 characters";
            return false;
        } else {
            var special_pass_check_1 = /[#%$]/.test(password);
            if (!special_pass_check_1) {
                passwordError.innerHTML = "Password must contain at least one of  $, #, %";
                return false;
            } else {
                passwordError.innerHTML = "";
                return true;
            }
        }
    }
}


function fetchUsers() {
    var email = document.getElementById("email").value;

    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("print").innerHTML = this.responseText;
        }
    }

    xttp.open("POST", "http://localhost/staff/controller/manager_Searchuserpro.php", true);
    xttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp.send("email=" + email);
}
/////search

 
function getRooms() {
    var category = document.getElementById("category").value;

    var xttp2 = new XMLHttpRequest();
    xttp2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("print").innerHTML = this.responseText;
        }
    };

    // Adjust the URL based on the actual location of your searchroom_pro.php file
    xttp2.open("POST", "http://localhost/staff/controller/searchroom_pro.php", true);
    xttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp2.send("category=" + category);
}

//bookroom
// mysript.js
console.log("Script loaded");
function bookRoom() {
    var roomNumber = document.getElementById("roomNumber").value;

    var xttp3 = new XMLHttpRequest();
    xttp3.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           // document.getElementById("print").innerHTML = this.responseText;
           window.location.reload(); //reload page after update
        }
    };

    // Adjust the URL based on the actual location of your manager_bookroom_pro.php file
    xttp3.open("POST", "http://localhost/staff/controller/bookroom_pro.php", true);
    xttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp3.send("roomNumber=" + roomNumber);

    // Prevent form submission (optional, depending on your needs)
    return false;
}

//bookcar
function bookCar() {
    var carNumber = document.getElementById("book").value;

    var xttp3 = new XMLHttpRequest();
    xttp3.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("print").innerHTML = this.responseText;
        }
    };

    // Adjust the URL based on the actual location of your bookcar_pro.php file
    xttp3.open("POST", "http://localhost/staff/controller/bookcar_pro.php", true);
    xttp3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttp3.send("carNumber=" + carNumber);

    // Prevent form submission (optional, depending on your needs)
    return false;
}


