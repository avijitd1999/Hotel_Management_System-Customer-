<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
<?php

session_start();
$userName_Err = $pass_Err = "";
$matchError = false;
$errorFlag = false;

if (isset($_COOKIE['auth_cookie']) && $_COOKIE['auth_cookie'] == 'authenticated') {
    header("Location: ../controller/access.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$errorFlag) {
        include '../Model/mydb.php';

        $myDB = new myDB();
        $conn = $myDB->openCon();

        $username = $_POST['uname'];
        $password = $_POST['password'];

        $result = $myDB->checkUser($conn, "users", $username, $password);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                setcookie('auth_cookie', 'authenticated', time() + 279, '/');
            }
          //  $_SESSION['roles'] = $row['roles'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['phonumber'] = $row['phonumber'];

            header("Location: ../controller/access.php");
        } else {
            $matchError = "User not found or password does not match";
        }

        $myDB->closeCon($conn);
    }
}
?>
</body>
</html>
