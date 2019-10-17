<?php
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	
	require_once('Connect.php');
	
	$ProductName = mysqli_real_escape_string($conn, $_POST['ProductName']);
	$ProductQty = mysqli_real_escape_string($conn, $_POST['QtyScroller']);
	
			
	for($i =0; $i < $_SESSION["count"]; $i++)
	{
		
		if($_SESSION["cart"][$i] == $ProductName)
		{
			
			
			$_SESSION["Qty"][$i] += intval($ProductQty);
			
			$_SESSION["total"] += intval($ProductQty) * $_SESSION["price"][$i];
			
			break;
				
		}
	}
	
	header("Location: New_Products.php");

?>