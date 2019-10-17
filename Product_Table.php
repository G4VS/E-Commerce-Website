<?php
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	require_once('Connect.php');
	
	$resultP = mysqli_query($conn,"SELECT * FROM `products`");
	$row_countP = mysqli_num_rows($resultP);
	
	if(!$resultP)
	{
		echo "<script>alert('unable to retreive data');</script>";
	}else
	{
		$tableP = "<table>";
		
		if($row_countP < 1)
		{
				$tableP = $tableP."<tr><td>No records in table</td></tr>";
		}else
		{
			$tableP = $tableP."<tr><th>Product Id</th><th>Name</th><th>Description</th><th>Image</th><th>Price</th></tr>";
			for($i =0; $i < $row_countP; $i++)
			{
				$rowP = mysqli_fetch_array($resultP);
				$tableP = $tableP."<tr><td>".$rowP['Product_ID']."</td><td>".$rowP['Name']."</td><td>".$rowP['Description']."</td><td>".$rowP['Image']."</td><td>".$rowP['Price']."</td></tr>";
				
			}
		}
		$tableP = $tableP."</table>";
		echo $tableP;
	}
?>