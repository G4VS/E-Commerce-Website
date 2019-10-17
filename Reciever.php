<?php
	session_start();
	require_once('Connect.php');

if(isset($_POST['AddToCartBtn'])) //check if button was pressed
{
	include 'testing.php';
	
	$ProductName = mysqli_real_escape_string($conn, $_POST['ProductName']);
	$ProductQty = mysqli_real_escape_string($conn, $_POST['QtyScroller']);
	if(!isset($ProductName))
	{
		
	}else
	{
		
		$Length = sizeof($_SESSION["cart"]);
		for($i =0; $i < $Length-1; $i++)
		{
			if($_SESSION["cart"][$i] == $ProductName)
			{
				$_SESSION["Qty"][$i] += intval($ProductQty);
				$_SESSION["total"] += intval($ProductQty) * $_SESSION["price"][$i];
				echo "<script>alert('".$_SESSION["price"][$i]."');</script>";
				echo "<script>alert('".$_SESSION["total"]."');</script>";
				echo "<script>alert('".$_SESSION["Qty"][$i]."');</script>";
				echo "<script>alert('".$ProductName."');</script>";

				break;
				
			}
		}
	}
}
//header("Location: testing.php?signup=empty"); send message back to other page
//if(preg_match("/^[a-zA-Z]*$",$var)) check if the strig has these characters
?>