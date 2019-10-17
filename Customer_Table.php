<?php
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	require_once('Connect.php');
	
	$result = mysqli_query($conn,"SELECT * FROM `customer`");
	$row_count = mysqli_num_rows($result);
	
	if(!$result)
	{
		echo "<script>alert('unable to retreive data');</script>";
	}else
	{
		$table = "<table>";
		
		if($row_count < 1)
		{
				$table = $table."<tr><td>No records in table</td></tr>";
		}else
		{
			$table = $table."<tr><th>Customer Id</th><th>Email</th><th>First Name</th><th>Surname</th><th>Cell Number</th></tr>";
			for($i =0; $i < $row_count; $i++)
			{
				$row = mysqli_fetch_array($result);
				$table = $table."<tr><td>".$row['Customer_ID']."</td><td>".$row['Email']."</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td><td>".$row['Cell_Number']."</td></tr>";
				
			}
		}
		$table = $table."</table>";
		echo $table;
	}
	?>