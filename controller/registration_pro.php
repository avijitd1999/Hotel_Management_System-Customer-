<!DOCTYPE html>

<script src="../js/myscript.js"></script>
<?php include '../Model/mydb.php'; ?>
<html lang="en">
<head>
    <title>Registration_pro</title>
</head>
<body>
<?php 
	$nameErr = $emailErr = $userNameErr = $termErr = $dobErr = $addressErr  = $phnErr  = $passErr = $userExist = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errorFlag = false;

        if (!isset($_POST['sname']) || empty($_POST['sname'])) {
            $nameErr = " *Name is required";
            $errorFlag = true;
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['sname'])) {
                $nameErr = " *Only letters, whitespaces, - and ' are acceptable";
                $errorFlag = true;
            }
        }

        if (empty($_POST['emailAddress'])) {
            $emailErr = " *Email is required";
            $errorFlag = true;
        } else {
            $email = $_POST['emailAddress'];
            $email_pattern = "/@email\.com/";
            $email_matching_result = preg_match($email_pattern, $email);
            if ($email_matching_result == 0) {
                $emailErr = " *Email format is not valid";
                $errorFlag = true;
            }
        }

        if (!isset($_POST['uname']) || empty($_POST['uname'])) {
            $userNameErr = " *User Name is required";
            $errorFlag = true;
        } else {
            $userName = $_POST['uname'];
            if (!preg_match("/^[a-zA-z_0-9]*$/", $userName)) {
                $userNameErr = "Only characters, alphabetic numeric characters, dash, underscore can be used in username";
                $errorFlag = true;
            } else if (strlen($userName) < 2) {
                $userNameErr = "Username must contain at least 2 characters";
                $errorFlag = true;
            }
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $passErr = " *Password is required";
            $errorFlag = true;
        } else {
            $pass = $_POST['password'];

            if (strlen($pass) < 5) {
                $passErr = " *Password must contain at least 5 characters";
                $errorFlag = true;
            }

            $special_pass_check_1 = strpos($pass, "#");
            $special_pass_check_2 = strpos($pass, "%");
            $special_pass_check_3 = strpos($pass, "$");

            if ($special_pass_check_1 === false && $special_pass_check_2 === false && $special_pass_check_3 === false) {
                $passErr = "Password must contain at least one of  $, #, %";
                $errorFlag = true;
            }
        }

        if (empty($_POST['dOb'])) {
            $dobErr = " *Date of Birth is required";
            $errorFlag = true;
        }
        if (!isset($_POST['gender']) || empty($_POST['gender'])) {
            $genderErr = " *Gender field is required";
            $errorFlag = true;
        }

        if (empty($_POST['termscheck'])) {
            $termErr = " *Terms and Conditions must be accepted";
            $errorFlag = true;
        }

        if (empty($_POST['address'])) {
            $addressErr = " *Address field is required";
            $errorFlag = true;
        }

        if (empty($_POST['phnumber'])) {
            $phnErr = " *Phone number is required";
            $errorFlag = true;
        } else {
            $phn = $_POST['phnumber'];
            $phn_pattern = "/01[0-9]{9}/i";
            $phn_matching_result = preg_match($phn_pattern, $phn);
            if ($phn_matching_result == 0) {
                $phnErr = " *Phone format is not valid";
                $errorFlag = true;
            }
        }

        if (!$errorFlag) {
            $myDB = new myDB();
            
            $conobj = $myDB->openCon();
            
            $userExists = $myDB->checkUserExist($conobj,"users",$_POST['emailAddress'],$_POST['uname']);
            
            if (!$userExists) {
                $result = $myDB->insertUser($conobj, "users", $_POST['sname'], $_POST['emailAddress'], $_POST['uname'], $_POST['password'], $_POST['gender'], $_POST['address'], $_POST['dOb'], $_POST['phnumber']);
            if ($result == true) {
                    echo "User created successfully";
                    header("Location: ../view/login.php");
                } else {
                    echo "Failed to create user";
                }
                } 
            $myDB->closeCon($conobj);
            } else {
            echo "Error in form submission. Please check your inputs.";
            }
}
?>
</body>
</html>
