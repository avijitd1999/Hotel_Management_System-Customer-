<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Page</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>
    <?php
    session_start();

    if (true) {
        echo '<h1>Welcome to the Customer Page</h1>
        <h3>Hello, ' . $_SESSION['name'] . '!</h3>
        <a href="./viewprofile.php">View Profile</a><br>
        <a href="./customer_Editprof.php">Update Profile</a><br>
        <a href="./customer_Editpass.php">Change Password</a><br>
        <a href="./searchroom.php">Search Room</a><br>
        <a href="./bookroom.php">Book Room</a><br>
        <a href="./showcar.php">Show All Car</a><br>
        <a href="./bookcar.php">Hire Car</a><br>
        <a href="./customer_Userdeal.php">Delete Account</a><br>';

        echo '<form method="POST" action="../controller/customer_dashpro.php">        
              <input type="submit" name="logout" value="Log Out">      
              </form>';
    } else {
        echo 'Access denied. Please try again.';
    }
    ?>
</body>

</html>
