<html>
<head>
</head>
<body>
	
	<?php
	
		//---------------------Check If session has started--------------------------------
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
			require_once('Connect.php');
			//---------------------Connect to database and check connection--------------------------------
			
			
			
			//---------------------Connect to database and check connection--------------------------------
			
			$result = mysqli_query($conn,"SELECT Name, Price FROM `products`");
			$row_count = mysqli_num_rows($result);
			if($row_count>0)
			{
				$_SESSION["total"] = 0;
				for($i =0; $i < $row_count; $i++)
				{
					/* $_SESSION["cart"][$i] = mysqli_fetch_array($result);
					print "<script>alert('".$_SESSION["cart"][$i]."');</script>"; */
					$row = mysqli_fetch_array($result);
					$_SESSION["cart"][$i] = $row['Name'];
					$_SESSION["Qty"][$i] = 0;
					$_SESSION["price"][$i] = $row['Price'];
					$count = $i;
				}
			}
			
		}
		//---------------------Check If session has started--------------------------------
		
		
		
				
				
		
		
		/*--------------------getting data example
		
		$result = mysqli_query($conn,"SELECT * FROM `products`");
		$row_count = mysqli_num_rows($result);
		if($row_count>0)
		{
			while($row_users = mysqli_fetch_array($result))
			{
				SESSION["cart"][] = $row_users['Name'];
			}
		}*/
		for($i =0; $i< sizeof($_SESSION["cart"])-1; $i++)
		{
			echo "
				<form action=\"Reciever.php\" method=\"post\">
				<input type=\"number\" name=\"QtyScroller\" min=\"1\" value=\"1\" />
				<input type=\"hidden\" name=\"ProductName\" value=\"".$_SESSION["cart"][$i]."\"/>
				<input type=\"submit\" name=\"AddToCartBtn\" value=\"".$_SESSION["cart"][$i]."\"/>
				</form>
			
			
			";
		}
		
	?>
	
</body>
</html>