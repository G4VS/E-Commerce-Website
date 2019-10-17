<?php
	session_start();
	if(isset($_SESSION["err_msg"]) && $_SESSION['err_msg'] != "")
	{
		echo "<script>alert('".$_SESSION["err_msg"]."');</script>";
		$_SESSION["err_msg"] = "";
	}
	$_SESSION["CurentPage"] = basename($_SERVER['PHP_SELF']);
?>

<?php
	/*session_start();
	unset($_SESSION['Cart']);
	unset($_SESSION['Quantity']);
	$_SESSION['counter'] = 0;
	$_SESSION['total'] = 0;
	
	function AddToCart($Item, $Qty, $Price)
	{
		$_SESSION['Cart'][$_SESSION['counter']] = $Item;
		$_SESSION['Quantity'][$_SESSION['counter']] = $Qty;
		$_SESSION['total'] = $_SESSION['total'] + ($Price * $Qty);
		
	}*/
	
	/* $host = "localhost";
	$userName = "root";
	$password = "";
	$DBName = "A-Z_Doors";

	$conn = new mysqli($host, $userName, $password, $DBName);

	$result=mysqli_query($conn,"SELECT * FROM 'Products'");
	$row_count=mysqli_num_rows($results);
	$row_users = mysqli_fetch_array($results);
	if($count==1)
	{
		for ($i=0; $i<$row_count; $i++)
		{
			echo $row_users['Name'];
		}

		}
		else
		{
			echo "please fill proper details";
			header("refresh:2;url=index.php");// it takes 2 sec to go index page
		} */
?>
<!DOCTYPE html>
<html style="height:100%;">

	<head>
		<meta charset="utf-8" lang="en"> <!--input keywords in meta tag and copyright-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>A-Z Doors Home Page</title>
		<link rel="stylesheet" type="text/css" href="./Dev2_CSS.css">
		
		<script src="./Dev2_Script.js"></script>

		<div class="header">
			<div><img class="logo_Image" src="logo4Heading.png"/></div>
			<div class="NameContainer">
				<div class="CompanyName">A-Z Doors</div>
				<div class="navBar">
					<a href="./New_home.php">Home</a>
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
				
			<div class="SliderFrame">
				<div class="SlideImages">
					<div class="ImageContainer">
						<img src="Slide3.jpg"/>
					</div>
					<div class="ImageContainer">
						<img src="Slide2.jpg"/>
						<div class="HomeIMG1"><div>
					</div>
					<div class="ImageContainer">
						<img src="Slide1.jpg"/>
					</div>
				</div>
			</div> 
			<h1>Welcome To A-Z Doors</h1>
			<div class="Category">
					<img class="category_image" src="./category1.png"/><br/>
					Transformer Door<br/>
					<a href="./New_Products.php">Go to Products</a>
				</div>
				<div class="Category">
					<img class="category_image" src="./Pic1.jpg"/><br/>
					Sliding Door<br/>
					<a href="./New_Products.php">Go to Products</a>
				</div>
				<div class="Category">
					<img class="category_image" src="./5pic.png"/><br/>
					Fire Door<br/>
					<a href="./New_Products.php">Go to Products</a>
				</div>
		</div>
			
		
	
	</body>
	<footer>
	
	</footer>
</html>