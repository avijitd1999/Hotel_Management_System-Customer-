<?php

class myDB
{
    function openCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "customer";
        $conn = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
        return $conn;
    }

    function insertUser($conn,$tablename, $name, $email, $username, $password, $address, $dob, $phonumber)
    {
        $sql = "INSERT INTO $tablename (name, email, username, password, address, dob, phonumber) VALUES ('$name', '$email', '$username', '$password', '$address', '$dob', '$phonumber')";
        $result = $conn->query($sql);
        return $result;
    }

    function checkUser($conn,$tablename, $username, $password)
    {
        $sql = "SELECT * FROM $tablename WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        return $result;
    }

    function getUserInfo($conn,$tablename, $email)
    {
        $sql = "SELECT * FROM $tablename WHERE email='$email'";
        $result = $conn->query($sql);
        return $result;
    }


    function updateUser($conn,$tablename, $name, $email, $username,$address, $phonumber)
    {
        $sql = "UPDATE $tablename SET name='$name' WHERE email = '$email'";
        $result = $conn->query($sql);
        "UPDATE $tablename SET username='$username' WHERE email = '$email'";
        $result = $conn->query($sql);
        "UPDATE $tablename SET address='$address' WHERE email = '$email'";
        $result = $conn->query($sql);
        "UPDATE $tablename SET phonumber='$phonumber' WHERE email = '$email'";
        $result = $conn->query($sql);
        return $result;
    }

    ////profile
    ///profile
function getUserInfoForProfile($conn, $tablename, $email)
{
    $sql = "SELECT name, email, username, address, dob, phonumber FROM $tablename WHERE email='$email'";
    $result = $conn->query($sql);
    return $result;
} 


    function updatePass($conn,$tablename, $email, $password)
    {
        $sql = "UPDATE $tablename SET password='$password' WHERE email = '$email'";
        $result = $conn->query($sql);
        return $result;
    }

    function deleteUser($conn,$tablename, $email)
    {
        $sql = "DELETE FROM $tablename WHERE email = '$email'";
        $result = $conn->query($sql);
        return $result;
    }

        // Your existing code...
    
        function searchRoom($conn, $tablename, $category)
        {
            $category = $conn->real_escape_string($category);
    
            $sql = "SELECT * FROM $tablename WHERE category = '$category'";
            $result = $conn->query($sql);
    
            // Check for errors or empty result
            if ($result === false || $result->num_rows === 0) {
                return false;
            }
    
            // Fetch and return all matching results as an associative array
            $rooms = array();
            while ($row = $result->fetch_assoc()) {
                $rooms[] = $row;
            }
    
            return $rooms;
        }

        // mydb.php

// Existing code...

        function getAllRooms($conn, $tablename) {
        $sql = "SELECT * FROM $tablename";
       $result = $conn->query($sql);
     return $result;
}

    
        public function bookRoom($conn, $tablename, $id) {
            $id = $conn->real_escape_string($id);
        
            // Check if the room is available (not booked)
            $checkAvailabilitySql = "SELECT * FROM $tablename WHERE id = '$id' AND booked = 0";
            $availabilityResult = $conn->query($checkAvailabilitySql);
        
            if ($availabilityResult === false) {
                die("Error checking room availability: " . $conn->error);
            }
        
            if ($availabilityResult->num_rows === 0) {
                return false; // Room is not available for booking
            }
        
            // Perform the booking
            $bookingSql = "UPDATE $tablename SET booked = 1 WHERE id = '$id'";
            $bookingResult = $conn->query($bookingSql);
        
            if ($bookingResult === false) {
                die("Error booking the room: " . $conn->error);
            }
        
            return true;
        }

        public function getCarDetails($conn, $table, $id)
        {
            $id = $conn->real_escape_string($id);
            // Adjust the column name in the WHERE clause as per your actual database schema
            $query = "SELECT make, model FROM $table WHERE id = '$id'"; 
            $result = $conn->query($query);
        
            if ($result !== false && $result->num_rows > 0) {
                $carDetails = $result->fetch_assoc();
                return $carDetails;
            } else {
                return false;
            }
        }

        public function getAllBookedCars($conn) {
        $sql = "SELECT * FROM bookedcars";
        $result = $conn->query($sql);
        return $result;
    }
        

        public function bookCar($conn, $tablename, $id) {
            $id = $conn->real_escape_string($id);
            
            // Check if the car is available (not booked)
           // $checkAvailabilitySql = "SELECT * FROM $tablename WHERE id = '$id' AND book = 0";
           $checkAvailabilitySql = "SELECT * FROM $tablename WHERE id = '$id' AND book = 0";

            $availabilityResult = $conn->query($checkAvailabilitySql);

            var_dump($availabilityResult);
            
            if ($availabilityResult === false) {
                return ['success' => false, 'message' => "Error checking car availability: " . $conn->error];
            }
            
            if ($availabilityResult->num_rows === 0) {
                return ['success' => false, 'message' => 'Car is not available for booking'];
            }
            
            // Perform the booking
            $bookingSql = "UPDATE $tablename SET book = 1 WHERE id = '$id'";
            $bookingResult = $conn->query($bookingSql);
            
            if ($bookingResult === false) {
                return ['success' => false, 'message' => "Error booking the car: " . $conn->error];
            }
            
            return ['success' => true, 'message' => 'Car booked successfully'];
        }
        
        
        
        
    function checkUserExist($conn, $tablename, $email, $username)
    {
        $sql = "SELECT * FROM $tablename WHERE email = '$email' OR username = '$username'";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getAllTasks($conn, $tablename)
    {
        $sql = "SELECT * FROM $tablename";
        $result = $conn->query($sql);
        return $result;
    }

    function closeCon($conn){
        return $conn->close();
    }
}

?>
