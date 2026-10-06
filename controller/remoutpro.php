<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rem OUT pro</title>
</head>
<body>
    <?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['option'])) {
            $selectedOption = $_POST['option'];
    
            
            if ($selectedOption == 'delete') {
                
                unset($_SESSION['roles']);
                unset($_SESSION['username']);
                unset($_SESSION['name']);
                session_destroy();
    
                
                setcookie('auth_cookie', 'authenticated', time() - 1, '/');
                setcookie('session_cookie', $_SESSION['roles'], time() -1, '/');
                setcookie('usname_cookie', $_SESSION['username'], time() -1, '/');
                setcookie('name_cookie', $_SESSION['name'], time() -1, '/');
                        
            }
    
            
            header("Location: ../Welcome.php");
            exit();
        }
    }

    ?>
</body>
</html>