<?php
	$localhost ="Localhost";
	$userName ="root";
	$password ="";
	$Database ="a-z_doors";
			
	$conn = mysqli_connect($localhost, $userName, $password, $Database);
	
	if($conn->connect_error)
	{
		die("connection failed: ".$conn->connect_error);
		
	}
?>