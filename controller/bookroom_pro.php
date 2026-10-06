<?php
session_start();

if (true) {
    include("../Model/mydb.php");

    $myDB = new myDB();
    $conn = $myDB->openCon();

    // Validate and sanitize user input using mysqli_real_escape_string
    $roomNumber = isset($_POST['roomNumber']) ? mysqli_real_escape_string($conn, $_POST['roomNumber']) : '';

    // Perform the booking logic
    $bookingResult = $myDB->bookRoom($conn, "searchroom", $roomNumber);

    if ($bookingResult !== false) {
        // Fetch room details
        $roomDetails = $myDB->bookRoom($conn, "searchroom", $roomNumber);

        if ($roomDetails !== false) {
            $roomName = $roomDetails[0]['roomName']; // Adjust the column name as per your database schema
            $price = $roomDetails[0]['price']; // Adjust the column name as per your database schema

            echo "Room booked successfully. Room Name: $roomName, Price: $price";
    } else {
        echo "Failed to book the room. Please try again.";
    }

    $myDB->closeCon($conn);
}
}
?>
