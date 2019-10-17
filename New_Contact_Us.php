<?php
	session_start();
	if(isset($_SESSION["err_msg"]) && $_SESSION['err_msg'] !="")
	{
		echo "<script>alert('".$_SESSION["err_msg"]."');</script>";
		$_SESSION["err_msg"] = "";
	}
	$_SESSION["CurentPage"] = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html style="height:100%;">
	<head>
		<meta charset="utf-8" lang="en"> <!--input keywords in meta tag and copyright-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>A-Z Doors Contact Us Page</title>
		<link rel="stylesheet" type="text/css" href="Dev2_CSS.css">
		<style></style>
		

		<div class="header">
		<div><img class="logo_Image" src="logo4Heading.png"/></div>
		<div class="NameContainer">
			<div class="CompanyName">A-Z Doors</div>
			<div class="navBar">
				<a href="./New_home.php" class="active">Home</a>
				<a href="./New_Products.php">Products</a>
				<a href="./New_Gallary.php">Gallery</a>
				<a href="./New_Services.php">Services</a>
				<a href="./New_About_Us.php">About Us</a>
				<a href="./New_Contact_Us.php">Contact Us</a>
				<?php if(isset($_SESSION["Login"]) && $_SESSION["Login"] = true)
						{
							echo "<a href=\"./Logout.php\">Logout</a>";
						}else
						{
							echo "<a href=\"./Login_Register.php\">Login</a>";
						}?>
					
					<select class="MenuDrop" onchange="location.href=this.value">
						<option style="display: none">Menu</option>
						<option value="New_home.php" class="MenuDropItem">Home</option>
						<option value="New_Products.php" class="MenuDropItem">Products</option>
						<option value="New_Gallary.php" class="MenuDropItem">Gallery</option>
						<option value="New_Services.php" class="MenuDropItem">Services</option>
						<option value="New_About_Us.php" class="MenuDropItem">About Us</option>
						<option value="New_Contact_Us.php" class="MenuDropItem">Contact Us</option>
						<?php if(isset($_SESSION["Login"]) && $_SESSION["Login"] = true)
							{
								echo "<option value=\"Logout.php\" class=\"MenuDropItem\">Logout</option>";
							}else
							{
								echo "<option value=\"Login_Register.php\" class=\"MenuDropItem\">Login</option>";
							}?>
						
					</select>
			
			</div>
		</div>	
		 <a><div class="cart" onclick="myMove()"></div></a>
		</div>
		<div id="Cart_List" >
			<h2>Cart</h2>
			<div class="Cart_Items">
			<?php require_once('Cart_Insert.php'); ?>
			
			</div>
			<input type="button" id="checkOut_btn" value="Check Out" class="Cart_Buttons" onclick="return CheckInfo();">
			<form action="Remove_All.php" method="POST"><input type="submit" id="removeAll_btn" value="Remove All" class="Cart_Buttons"></form>
		</div>
	</head>
	<body > 

		<div class="content">
			<div class="infoBlock_left">
				<form method="POST" action="Contact.php">
					<input type="text" id="subject_txt" placeholder="Subject" class="" name="Subject"><br/>
					<textarea id="message_txtarea" placeholder="Message..." col="300" name="Message"></textarea><br/>
					<input id="name_txt" type="text"  placeholder="Name" class="" name="Name"/><br/>
					<input type="text" id="email_txt" placeholder="Email Address" class="" name="Email"><br/>
					<input type="text" id="Contact_Number_txt" placeholder="Contact Number"class="" name="Cell"><br/>
					<input type="submit" id="submit_btn" value="SEND" class="submit_btn" name="MessageSubmitbtn" onclick="return CheckInfo();">
				</form>	
			</div>	
			<div class="infoBlock_right">
			
				<div class="Contact_types">
					<div class="Contact_types_heading">Address:</div>
					27 Chrislou Crescent,<br/>
					Alberton North,<br/>
					Alberton,<br/>
					1450
				</div>
				<div class="Contact_types">
					<div class="Contact_types_heading">Tel:</div>
					011 865 4200
				</div>
				<div class="Contact_types">
					<div class="Contact_types_heading">Email:</div>
					pieter@a-zdoors.co.za
				</div>
				<div class="Contact_types">
						<div class="Contact_types_heading">Trading Hours:</div>
						Monday - Thursday<br/>
						07:30 - 17:00<br/><br/>
				
						Friday<br/>
						07:30 - 15:00
				</div>
				<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.1374531778483!2d28.138594314806625!3d-26.257201983414333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9511c7b8507d8b%3A0xfc4fd02368de161f!2sA-Z+DOORS!5e0!3m2!1saf!2sza!4v1565277565327!5m2!1saf!2sza" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
			</div>
		</div>
			
		
	
	</body>
	<footer>
	
	</footer>
</html>