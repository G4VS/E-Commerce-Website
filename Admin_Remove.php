<?php
	session_start();
	require_once('Connect.php');
	
	$Remove_ID = mysqli_real_escape_string($conn, $_POST['RemoveQtyScroller']);
	$Remove_Table = mysqli_real_escape_string($conn, $_POST['RemoveTableDrop']);
	
	$sql ="";
	
	if($Remove_Table == "message")
	{
		
		executeSQL("DELETE FROM `message` WHERE Message_ID = ".$Remove_ID."", $conn, true);
	}else if($Remove_Table == "admin")
	{ 
		executeSQL("DELETE FROM `admin` WHERE Admin_ID = ".$Remove_ID."", $conn, true);
	}else if($Remove_Table == "products")
	{
		executeSQL("DELETE FROM `order_items` WHERE Products_FK = ".$Remove_ID."", $conn, false);
		
		
		executeSQL("DELETE FROM `products` WHERE Product_ID = ".$Remove_ID."", $conn, true);
		
		/* $sql = "DELETE FROM `order_items`, `order`, `customer` WHERE `order_items`.`Products_FK` = ".$Remove_ID." AND `products`.`Product_ID` = ".$Remove_ID."";
		executeSQL(); */
		
	}else if($Remove_Table == "order")
	{
		executeSQL("DELETE FROM `order_items` WHERE Order_FK = ".$Remove_ID."", $conn, false);
		
		
		executeSQL("DELETE FROM `order` WHERE Order_ID = ".$Remove_ID."", $conn, true);
		
	}else if($Remove_Table == "customer")
	{
		
		$ResultC = mysqli_query($conn,"SELECT Order_ID FROM `order` WHERE Customer_FK = ".$Remove_ID."");
	
		if(!$ResultC)
		{
			incorrectFields('Failed to Delete row');
			
			
		}else
		{
			
			$sqlC = "DELETE FROM `order_items` WHERE ";
			$C = 0;
			while($rowR = mysqli_fetch_array($ResultC))
			{
				if($C == 0)
				{
					$sqlC .= "Order_FK = ".$rowR['Order_ID'];
				}else
				{
					$sqlC .= " OR Order_FK = ".$rowR['Order_ID'];
				}
				$C++;
			}
			
			executeSQL($sqlC, $conn, false);
			executeSQL("DELETE FROM `order` WHERE Customer_FK = ".$Remove_ID."", $conn, false);
			executeSQL("DELETE FROM `customer` WHERE Customer_ID = ".$Remove_ID."", $conn, true);
		}
		
	}

	function executeSQL($sql, $conn, $OnlyOnce)
	{
		
		
		$ResulrR = mysqli_query($conn,$sql);
	
		if(!$ResulrR)
		{
			incorrectFields('Failed to Delete row');
			
		}else if($ResulrR && $OnlyOnce)
		{
			incorrectFields('Row(s) deleted');
		}
	}
	
	
	
	function incorrectFields($errMsg)
	{
	
		$_SESSION["err_msg"] = $errMsg;
		header("Location: Admin.php");
		EXIT();
	}
?>