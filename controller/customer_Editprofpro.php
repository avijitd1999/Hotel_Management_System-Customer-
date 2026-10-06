<script src="../js/myscript.js"></script>
<?php

session_start();

if (true) {
    if (isset($_POST['submit'])) {

        $newName = $_POST['newName'];
        $newUsername = $_POST['newUsername'];
        $newAddress = $_POST['newAddress'];
        $newPhonumber = $_POST['newPhonumber'];

            include '../Model/mydb.php';

            $myDB = new myDB();
            $conn = $myDB->openCon();

            $email = $_SESSION['email'];
            $result = $myDB->updateUser($conn,'users',$newName, $email,$newUsername,$newAddress,$newPhonumber);
            
            if ($result) {
                echo 'Profile updated successfully.';
            } else {
                echo 'Error updating profile.';
            }

            $myDB->closeCon($conn);
            header("Location: ../view/customer_Editpass.php");
        } else {
            echo 'Profile Update Failed';
    }
} else {
    echo 'Access denied.';
}
?>
