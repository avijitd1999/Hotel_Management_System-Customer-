<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car Booking</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>

    <?php
    session_start();
    if (true) {
        ?>
        <h1>Book A Car :</h1><br>
        <p id="printResult">
            <?php
            // Display the booking result if set in session
            if (isset($_SESSION['booking_message'])) {
                echo $_SESSION['booking_message'];
                unset($_SESSION['booking_message']); // Clear the session variable
            }
            ?>
        </p>
        <form id="bookingForm" action="../controller/bookcar_pro.php" method="post">
            <label for="carNumber">Car ID:</label>
            <input type="text" id="carId" name="carId" required />
            <button type="submit">Book Car</button>
        </form>

        <p id="print"></p>

        <p><a href="../view/customer_dash.php">Back to Dashboard</a></p>
        <?php
    } else {
        echo 'Access denied.';
    }
    ?>
</body>

</html>
