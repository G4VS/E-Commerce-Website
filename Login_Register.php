<?php
	session_start();
	if(isset($_SESSION["err_msg"]) && $_SESSION['err_msg'] != "")
	{
		echo "<script>alert('".$_SESSION["err_msg"]."');</script>";
		$_SESSION["err_msg"] = "";
	}
	
	
?>

<!DOCTYPE html>
<html style="height:100%;">
	<head>
		<meta charset="utf-8" lang="en"> <!--input keywords in meta tag and copyright-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>A-Z Doors Home Page</title>
		<link rel="stylesheet" type="text/css" href="Dev2_CSS.css">
		<style></style>
		<script src="./Dev2_Script.js"></script>

	</head>
	<body > 
		
			<div class="LoginFrom">
				<h1>Login</h1>
				<form method="POST" action="Login.php">
					<input type="text" id="Email_txt" placeholder="Email" class="loginTxt" name="Username"><br/>
					<input type="password" id="password_txt" placeholder="Password" class="loginTxt" name="UserPass"><br/>
					<input type="submit" id="Login_btn" value="Login" class="Login_btn" ><br/>
				</form>	
				<form method="POST" action="register.php">
					<h1>Register</h1>
					<input type="text" id="Email_txt" placeholder="Email" class="loginTxt" name="Email"><br/>
					<input type="password" id="password_txt" placeholder="Password" class="loginTxt" name="Password"><br/>
					<input type="text" id="Contact_Number_txt" placeholder="Contact Number"class="loginTxt" name="Cell"><br/>
					<input type="text" id="First_txt" placeholder="First Name" class="loginTxt" name="First"><br/>
					<input type="text" id="Last_txt" placeholder="Surename" class="loginTxt" name="Last"><br/>
					<input type="submit" id="register_btn" value="Register Here" class="Login_btn" ><br/>
				</form>
			</div>
			
			
		
	
	</body>
	<footer>
	
	</footer>
</html>