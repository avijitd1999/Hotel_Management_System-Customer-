<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer User Dealing</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>
<script src="../js/myscript.js"></script>
<?php
session_start();
if (true) {
echo'<h1>Delete Account</h1>
<form method="POST" action="../controller/customer_Deleteuserpro.php">
User Email: <input type="text" name="email" required><br>
<input type="submit" name="deleteUser" value="Delete">';

echo '<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
    }else {
    echo 'Access denied.';
}
?>

</body>
</html>
