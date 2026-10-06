<!DOCTYPE html>
<script src="../js/myscript.js"></script>
<html lang="en">

<head>
    <title>Customer Update Password</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>
    <?php
    session_start();

    if (true) {
        include '../Model/mydb.php';

        $myDB = new myDB();
        $conn = $myDB->openCon();
        $email = $_SESSION['email'];
        $result = $myDB->getUserInfo($conn, 'users', $email);

        if ($result && $result->num_rows > 0) {
            echo '<h1> IF YOU COME UPDATING YOUR PROFILE THEN YOU MUST SET PASSWORD </h1>
                <form method="POST" action="../controller/customer_Editpasspro.php" onsubmit="return getpassform();">
                    <table>
                        <tr>
                            <td>
                                New Password: <input type="password" name="newPassword" id="newPassword" onkeyup="getPassword();"><br>
                            </td>
                            <td id="passwordError"></td>
                        </tr>
                        <tr>
                            <td>
                                Confirm Password: <input type="password" name="confirmPassword" id="confirmPassword" onkeyup="getPassword();"><br>
                            </td>
                            <td id="passwordError"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Update Password">
                            </td>
                        </tr>
                    </table>
                </form>';
        } else {
            echo 'Error fetching customer profile.';
        }
        $myDB->closeCon($conn);

        echo '<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
    } else {
        echo 'Access denied.';
    }
    ?>
</body>

</html>
