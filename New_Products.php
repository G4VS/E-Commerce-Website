<?php
		session_start();
		
		if(isset($_SESSION["err_msg"]) && $_SESSION['err_msg'] != "")
		{
			echo "<script>alert('".$_SESSION["err_msg"]."');</script>";
			$_SESSION["err_msg"] = "";
		}
		
		if(!isset($_SESSION["cart"]) )
		{
			require_once('Connect.php');
			
			
			$result = mysqli_query($conn,"SELECT Name, Price, Image FROM `products`");
			$row_count = mysqli_num_rows($result);
			
			if($row_count>0)
			{
					$_SESSION["count"] = 0;
				
				$_SESSION["total"] = 0;
				for($i =0; $i < $row_count; $i++)
				{
					$row = mysqli_fetch_array($result);
					$_SESSION["cart"][$i] = $row['Name'];
					$_SESSION["Qty"][$i] = 0;
					$_SESSION["price"][$i] = $row['Price'];
					$_SESSION["Img"][$i] = $row['Image'];
					$_SESSION["count"]++;
					
				}
			}else
			{
				$_SESSION["count"] = 0;
			}
			
		}
		if(isset($_SESSION["err_msg"]) && $_SESSION['err_msg'] != "")
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
		<title>A-Z Doors Home Page</title>
		<link rel="stylesheet" type="text/css" href="Dev2_CSS.css">
		
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
			<form action="Order.php" method="POST"><input type="submit" id="checkOut_btn" value="Check Out" class="Cart_Buttons"/></form>
			<form action="Remove_All.php" method="POST"><input type="submit" id="removeAll_btn" value="Remove All" class="Cart_Buttons"/></form>
		</div>
	</head>
	<body > 
		
		<div class="content">
			<?php require_once('Print_Products.php');?>

			
			

		
		</div>
	</body>
	<footer>
	
	</footer>
</html>