<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete User</title>
</head>

<body>
<?php

session_start();
if (true) {
include ("../Model/mydb.php");
    $myDB = new myDB();
    $conn = $myDB->openCon();
    
    if (isset($_POST['deleteUser'])) {
        $email=$_POST["email"];
        $result=$myDB->deleteUser($conn,"users", $email);
    }

if($result==TRUE)
{       
        echo '<h1> Remaining users: </h1><br>';
        $result=$myDB->getAllUsers($conn,"users");
        if($result->num_rows > 0)
        {while($row=$result->fetch_assoc()){

            echo $row["name"].'<br>';
            echo $row["email"].'<br>';
            echo $row["username"].'<br>';
            echo '<br>';
        }
        $myDB->closeCon($conn);  
        echo '<p><a href="../view/customer_dash.php">Back to Dashboard</a></p>';
}else
    {
    echo "no data available";
    }
}
else
{
    echo "can't delete";
}
}else {
    echo 'Access denied.';
}

?>
</body>

</html>