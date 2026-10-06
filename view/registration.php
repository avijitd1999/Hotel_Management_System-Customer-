<!DOCTYPE html>
<script src="../js/myscript.js"></script>
<?php include '../controller/registration_pro.php'; ?>
<html lang="en">
<head>
    <title>Registration</title>
</head>

<body>
<center>
<h1>Unlock the Possibilities - Register Now!</h1>
<form action="../controller/registration_pro.php" method="POST" onsubmit="return validation()">
<table>
<tr>
                <td>
                    Name:<input type="text" name="sname" id="sname">
                </td>
                <td>
                    <?php echo $nameErr;?>
                </td>
                <td
                    id="snameerror">
                </td>
</tr>
<tr>
                <td>
                    Email Address:<input type="text" name="emailAddress" id="emailAddress">
                </td>
                <td>
                    <?php echo $emailErr;?>
                </td>
                <td
                    id="emailerror">
                </td>
</tr>
<tr>
                <td>
                    username:<input type="text" name="uname" id="uname">
                </td>
                <td>
                    <?php echo $userNameErr;?>
                </td>
                <td
                    id="unameerror">
                </td>
</tr>
<tr>
                <td>
                    Password:<input type="password" name="password" id="password">
                </td>
                <td>
                    <?php echo $passErr;?>
                </td>
                <td
                    id="passworderror">
                </td>
</tr>
<tr>
                <td>
                    Date of Birth :<input type="date" name="dOb" id="dOb">
                </td>
                <td>
                    <?php echo $dobErr;?>
                </td>
                <td
                    id="doberror">
                </td>
</tr>

<tr>
    <td>
        Gender:
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </td>
    <td>
    
    </td>
    <td id="gendererror"></td>
</tr>

<tr>
                <td>
                    Phone Number:<input type="text" name="phnumber" id="phnumber">
                </td>
                <td>
                    <?php echo $phnErr;?>
                </td>
                <td
                    id="phnumbererror">
                </td>
</tr>
<tr>
                <td>
                    Address:<input type="text" name="address" id="address">
                </td>
                <td>
                    <?php echo $addressErr;?>
                </td>
                <td
                    id="addresserror">
                </td>
</tr>
<tr>
                <td>
                    Terms and Conditions:
                    <input type="checkbox" name="termscheck" id="termscheck"> I Agree 
                </td>
                <td>
                    <?php echo $termErr;?>
                </td>
                <td
                    id="termerror">
                </td>
</tr>
<tr>
                <td>
                    <input type="submit" name="submit">
                </td>
</tr>
<tr>
                <td>
                    <input type="reset" name="reset">
                </td>
</tr>
<p>Already have a account?<a href="login.php">Sign In</a> </p>
</center>
</body>
</html>