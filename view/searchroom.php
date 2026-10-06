<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Room Search</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>
    <script src="../js/myscript.js"></script>
    <?php
    session_start();
    if (true) {
        echo "<h1>Search Room :</h1><br>";
        echo '<input type="text" id="category" onkeyup="getRooms()" />';
        echo '<p id="print"></p>';
        echo '<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
    } else {
        echo 'Access denied.';
    }
    ?>
</body>

</html>
