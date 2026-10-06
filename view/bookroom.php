<!DOCTYPE html>
<html lang="en">

<head>
    <title>Room Booking</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>
<h1>All Rooms</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Room Name</th>
        <th>Category</th>
        <th>Description</th>
        <th>Price</th>
        <th>Availability</th>
        <th>Booked</th>
     
    </tr>

    <?php
    session_start();
    include("../Model/mydb.php");

    {
        $myDB = new myDB();
        $conn = $myDB->openCon();
    
        $roomsResult = $myDB->getAllRooms($conn, "searchroom");
    
        if ($roomsResult && $roomsResult->num_rows > 0) {
            while ($row = $roomsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['room_name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['availability'] . "</td>";
                echo "<td>" . ($row['booked'] ? 'Yes' : 'No') . "</td>";
    

            }
        } else {
            echo "<tr><td colspan='8'>No rooms available.</td></tr>";
        }
    
        $myDB->closeCon($conn);
    }
    ?>
</table>



    <script src="../js/myscript.js"></script>
    <?php
  
    if (true) {
        ?>
        <h1> Book A Room :</h1><br>
        <p id="printResult"></p>
        <form id="bookingForm" onsubmit="return bookRoom()">
            <label for="roomNumber">Room Number:</label>
            <input type="text" id="roomNumber" required />
            <button type="submit">Book Room</button>
        </form>

        <p id="print"></p>

        <p><a href="../view/customer_dash.php">Back to  Dashboard</a></p>
        <?php
    } else {
        echo 'Access denied.';
    }
    ?>
</body>

</html>
