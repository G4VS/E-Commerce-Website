<?php
	session_start();
	if(!isset($_SESSION["Login"]) || !$_SESSION["Login"])
	{
		$_SESSION["err_msg"] = "Please login before you check out";
		header("Location: Login_Register.php");
		EXIT();
	}else
	{
		require_once('Connect.php');
		$result = mysqli_query($conn, "INSERT INTO `order` (`Order_ID`, `Date`, `Total_Amount`, `Customer_FK`) VALUES (NULL, '".date("Y-m-d H:i:s")."', ".$_SESSION['total'].", ".$_SESSION['UserID'].");");//"INSERT INTO `order`(Date, Total_Amount, Customer_FK) VALUES('".date("Y-m-d H:i:s")."', ".$_SESSION['total'].", ".$_SESSION['UserID']."");
	}
	
	if(!$result)
	{
		
		incorrectFields('Failed to send Order');
	}else
	{
		$_SESSION["total"] = 0;
		for($i = 0; $i < $_SESSION['count']; $i++)
		{
			$_SESSION["Qty"][$i] = 0;
		}
		incorrectFields('Your order has been sent. The Order will be processed as soon as your payment is made.');
	}
	
	
	
	function incorrectFields($errMsg)
	{
		$_SESSION["err_msg"] = $errMsg;
		header("Location: New_Products.php");
		EXIT();
	}
?>