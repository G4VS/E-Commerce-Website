<?php
session_start();
$_SESSION["CurentPage"] = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html style="height:100%;">
	<head>
		<meta charset="utf-8" lang="en"> <!--input keywords in meta tag and copyright-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>A-Z Doors About Us Page</title>
		<link rel="stylesheet" type="text/css" href="Dev2_CSS.css">
		<style></style>
		<script src="./Dev2_Script.js"></script>

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
			
				<h2>Want To Know More About Us?</h2>
				<div class="About_part1">
					A-Z Doors c.c. is a well-established manufacturer of standard and purpose made products statsioned in Alberton North. 
					We supply country wide to the market place as well as to border countries like Botswana and Swaziland.<br/><br/> 
					
					
					
					<div class="product_list">
					Our Products include:<br/><br/>
					-Transformer Room Doors<br/>
					-Fire Doors<br/>
					-Internal Wooden Doors<br/>
					-External Wooden Doors<br/>
					-Sliding Doors<br/>
					-Staking/Folding Doors<br/>
					-Steel Frames<br/>
					-Louver Units<br/>
					-Wooden Windows<br/>
					-Internal Wooden Doors<br/>
					-Pivot Doors
					</div>
					<div class="images">
					<img src="About_Us2.png" class="image_type_1"/><img src="About_Us.PNG" class="image_type_1"/><img src="About_Us3.png" class="image_type_1"/>
					</div>
					</div><br/><br/>
					
					<div class="About_part2">
					We also Accept special request and non-standard sizes.<br/><br/>
					
					A-Z Doors was founded in 2005 specializing mainly in standard and non-standard Tinder Door Products.<br/>
					Over the next few years it grew into a well-known suplier in the market place.<br/><br/>
					
					A-Z Doors also introduced new ranges over the next couple of years.   
					</div>
				
				
				
				
				
			
		</div>
			
		
	
	</body>
	<footer>
	
	</footer>
</html>