<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer View Profile</title>
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
        $result = $myDB->getUserInfoForProfile($conn, 'users', $email);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            echo '<h2>Customer Profile</h2>';
            echo 'Name: ' . $row['name'] . "<br>";
            echo 'Email: ' . $row['email'] . "<br>";
            echo 'Username: ' . $row['username'] . "<br>";
            echo 'Address: ' . $row['address'] . "<br>";
            echo 'Date of Birth: ' . $row['dob'] . "<br>";
            echo 'Phone Number: ' . $row['phonumber'] . "<br>";
            
            echo '<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
        } else {
            echo 'Error fetching customer profile.';
        }

        $myDB->closeCon($conn);
    } else {
        echo 'Access denied.';
    }
?>

</body>
</html>
