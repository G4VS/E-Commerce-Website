<?php
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	require_once('Connect.php');
	
	$result = mysqli_query($conn,"SELECT * FROM `message`");
	$row_count = mysqli_num_rows($result);
	
	if(!$result)
	{
		echo "<script>alert('unable to retreive data');</script>";
	}else
	{
		$table = "<table><tr><th>Message Id</th><th>Subject</th><th>Name</th><th>Email</th><th>Cell Number</th><th>Message</th></tr>";
		
		if($row_count < 1)
		{
				$table = $table."<tr><td>No records in table</td></tr>";
		}else
		{
			
			for($i =0; $i < $row_count; $i++)
			{
				$row = mysqli_fetch_array($result);
				$table = $table."<tr><td>".$row['Message_ID']."</td><td>".$row['Subject']."</td><td>".$row['Name']."</td><td>".$row['Email']."</td><td>".$row['Cell']."</td><td>".$row['Message_Text']."</td></tr>";
				
			}
		}
		$table = $table."</table>";
		echo $table;
	}
	?>