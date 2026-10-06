<!DOCTYPE html>
<?php include '../controller/login_process.php';?>
<html lang="en">
	<head>
		<title>Sign Up</title>
    </head>
<body>
	
 	<form method="post" action="">
			
			<h2>Log In</h2><br>
                <?php echo $matchError;?>	
						
				<table>
					<tr>
						<td>User Name: <input type="text" name="uname"></td>
						<td> <?php echo $userName_Err?> </td>
					</tr>

					<tr>
						<td>Password: <input type="password" name="password"></td>
						<td> <?php echo $pass_Err?> </td>
					</tr>
                    <tr>
                        <p>Registration a acoount?<a href="registration.php">Sign Up!</a></p><br>
                    </tr>
				</table><br>
				
				<input type="checkbox" name="remember_me"> Remember me<br><br>

				<input type="submit" name="submission" value="Log In">
               
                
			
		</form>
	

</body>
</html>

		