<?php
session_start();

if (true) {
    include("../Model/mydb.php");

    $myDB = new myDB();
    $conn = $myDB->openCon();

    $carId = isset($_POST['carId']) ? mysqli_real_escape_string($conn, $_POST['carId']) : '';

    $bookingResult = $myDB->bookCar($conn, "bookedcars", $carId);

    if ($bookingResult['success']) {
        // Booking successful
        $carDetails = $myDB->getCarDetails($conn, "bookedcars", $carId);

        if ($carDetails !== false && isset($carDetails['make'])) {
            $make = $carDetails['make'];
            $model = $carDetails['model'];
            $_SESSION['booking_message'] = "Car booked successfully. Car Make: $make, Model: $model";
        } else {
            $_SESSION['booking_message'] = "Failed to fetch car details. Please try again.";
        }

        $myDB->closeCon($conn);
    } else {
        // Booking failed
        if ($bookingResult['message'] === 'Car is already booked.') {
            $_SESSION['booking_message'] = 'Car is already booked.';
        } else {
            $_SESSION['booking_message'] = "Booking failed. " . $bookingResult['message'];
        }
    }

    // Redirect back to bookcar.php
    header("Location: ../view/bookcar.php");
    exit();
} else {
    echo 'Access denied.';
}
?>
