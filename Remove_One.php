<?php
	session_start();
	require_once('Connect.php');
	$removeItem = mysqli_real_escape_string($conn, $_POST['OneCartItem']);
	
	for($i = 0; $i < $_SESSION["count"]; $i++)
	{
		
		if($_SESSION["cart"][$i] == $removeItem)
		{
			$_SESSION["total"] -= ($_SESSION["Qty"][$i] *$_SESSION["price"][$i]);
			$_SESSION["Qty"][$i] = 0;
			break;
		}
	}
	header("Location: New_Products.php");
?>