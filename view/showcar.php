<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booked Cars</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>

<body>
    <h1>All Booked Cars</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Price</th>
            <th>Booked</th>
        </tr>

        <?php
        session_start();
        include("../Model/mydb.php");

        $myDB = new myDB();
        $conn = $myDB->openCon();

        $carsResult = $myDB->getAllBookedCars($conn);

        if ($carsResult && $carsResult->num_rows > 0) {
            while ($row = $carsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . ($row['book'] ? 'Yes' : 'No') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No booked cars available.</td></tr>";
        }

        $myDB->closeCon($conn);
        ?>
    </table>
<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
</body>

</html>
