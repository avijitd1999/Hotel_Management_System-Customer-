<script src="../js/myscript.js"></script>
<?php

session_start();

if (true) {
    if (isset($_POST['submit'])) {
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($newPassword === $confirmPassword) {
            include '../Model/mydb.php';

            $myDB = new myDB();
            $conn = $myDB->openCon();

            $email = $_SESSION['email'];
            $result = $myDB->updatePass($conn,'users', $email, $newPassword);

            if ($result) {
                echo 'Password updated successfully.';
            } else {
                echo 'Error updating profile.';
            }

            $myDB->closeCon($conn);

            header("Location: ../view/customer_dash.php");
        } else {
            echo 'Password and confirm password do not match.';
        }
    }
} else {
    echo 'Access denied.';
}
?>
