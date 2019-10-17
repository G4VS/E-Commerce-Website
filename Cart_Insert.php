<?php

		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		require_once('Connect.php');
		$hasItems = false;
		
		$_SESSION["CartCode"] = "<table><tr><th>Name</th><th>Price</th><th>Quantity</th></tr>";
			
			
			for($i = 0; $i < $_SESSION["count"]; $i++)
			{
				
				if($_SESSION["Qty"][$i] > 0)
				{
					
					$_SESSION["CartCode"] = $_SESSION["CartCode"]."<tr><td>".$_SESSION['cart'][$i]."</td><td>R".$_SESSION['price'][$i]."</td><td>".$_SESSION['Qty'][$i]."</td><td><form action=\"Remove_One.php\" method=\"POST\"><input type=\"submit\" id=\"removeOne_btn\" value=\"Remove\" class=\"remove_Buttons\"><input type=\"hidden\" name=\"OneCartItem\" value=\"".$_SESSION['cart'][$i]."\" /></form></td></tr>";
					$hasItems = true;
				}
			}
				
			if($hasItems)
			{
				$_SESSION["CartCode"] = $_SESSION["CartCode"]."<tr></tr><tr></tr><tr><th>Total</th><td>".$_SESSION['total']."</td></tr>";
			}else
			{
				$_SESSION["CartCode"] = $_SESSION["CartCode"]."<tr><td>Cart is empty</td></tr>";
			}
			
		$_SESSION["CartCode"] = $_SESSION["CartCode"]."</table>";
		echo $_SESSION["CartCode"];




?>