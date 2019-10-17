<?php
	if(!isset($_SESSION["cart"]) || session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	
		$_SESSION["total"] = 0;
		for($i =0; $i < $_SESSION["count"]; $i++)
		{
			$_SESSION["Qty"][$i] = 0;
		}
		header("Location: New_Products.php");
?>