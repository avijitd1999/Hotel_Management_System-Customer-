<?php
session_start();

if (true) {
    include("../Model/mydb.php");

    $myDB = new myDB();
    $conn = $myDB->openCon();

    // Validate and sanitize user input using mysqli_real_escape_string
    $category = isset($_POST['category']) ? mysqli_real_escape_string($conn, $_POST['category']) : '';

    $result = $myDB->searchRoom($conn, "searchroom", $category);

    if ($result !== false) {
        if (is_array($result) && isset($result['error'])) {
            // Handle the case where $result is an array with an error message
            echo "Error: " . $result['error'];
        } elseif (is_array($result) && count($result) > 0) {
            // Valid result set
            $row = $result[0]; // Take the first element of the array
    
            $roomName = $row["room_name"];
            $categoryFromDB = $row["category"];
            $description = $row["description"];
            $price = $row["price"];
            $availability = $row["availability"];
    
            echo "Room Name: " . $roomName . ", Category: " . $categoryFromDB . ", Description: " . $description . ", Price: $" . $price . ", Availability: " . $availability . "<br>";
        } else {
            // Print or log the error message
            echo "Error: Unexpected result type.";
            var_dump($result);
        }
    } else {
        // Print or log the error message
        echo "Room not found!";
    }
}
    
?>
