<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer process</title>
</head>
<body>
<?php
session_start();
include '../Model/mydb.php';

if (true) {
    if (isset($_POST['logout'])) {
        
        if(isset($_COOKIE['auth_cookie'])){
        header('Location: ./remout.php'); 
        exit();
        }

        if(!isset($_COOKIE['auth_cookie'])){
        session_destroy();
        header('Location: ../view/login.php');
        exit();
        }
    }

    
    header('Location: ../view/taskManipulate.php');
} else {
    echo 'Access denied.';
}
?>
</body>
</html>
