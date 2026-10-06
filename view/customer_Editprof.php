<!DOCTYPE html>
<script src="../js/myscript.js"></script>
<html lang="en">
<head>
    <title>Customer Edit profile</title>
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
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $username = $row['username'];
            $gender = $row['gender'];
            $address = $row['address'];
            $dob = $row['dob'];
            $phonumber = $row['phonumber'];

            echo 'Name: '.$name. "<br>";
            echo 'Email: '.$email."<br>";
            echo 'username: '.$username."<br>";
            echo 'Gender: '.$gender."<br>";
            echo 'Address: '.$address."<br>";
            echo 'Date of birth: '.$dob."<br>";
            echo 'phonumber: '.$phonumber."<br>";
            echo "<br>";
            echo '<form method="POST" action="../controller/customer_Editprofpro.php" onsubmit="return getproform();">
            <table>
            <tr>
                            <td>
                            New Name: <input type="text" name="newName" id="sname" onkeyup="checkName();"><br>
                            </td>
                            <td
                                id="snameerror">
                            </td>
            </tr>
            <tr>
                            <td>
                            New Username: <input type="text" name="newUsername" id="uname" onkeyup="checkUsername();"><br>
                            </td>
                            <td
                                id="unameerror">
                            </td>
            </tr>
            <tr>
                            <td>
                            New Address: <input type="text" name="newAddress" id="address" onkeyup="checkAddress();"><br>
                            </td>
                            <td
                                id="addresserror">
                            </td>
            </tr>
            <tr>
                            <td>
                            New Phonenumber: <input type="text" name="newPhonumber" id="phnumber" onkeyup="checkPhnumber();"><br>
                            </td>
                            <td
                                id="phnumbererror">
                            </td>
            </tr>
            <tr>
                            <td>
                            <input type="submit" name="submit" value="Update Profile">
                            </td>
            </tr>
            </table>
            ';
            $myDB->closeCon($conn);
        } else {
            echo 'Error fetching  profile.';
        }
        

        echo '<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
    } else {
        echo 'Access denied.';
    }
    ?>
    
</body>
</html>