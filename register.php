<?php	
session_start();
require_once('Connect.php');

$Name = mysqli_real_escape_string($conn, $_POST['First']);
$Last = mysqli_real_escape_string($conn, $_POST['Last']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Cell = mysqli_real_escape_string($conn, $_POST['Cell']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);

	if(empty($_POST['Email']))
	{
		echo "<script>alert('here');</script>";
		IncorrectFields('Please fill in your email address.');
	}
	
	if(empty($_POST['Password']))
	{
		IncorrectFields('Please fill in your password.');
	}
	if(empty($_POST['Cell']))
	{
		IncorrectFields('Please fill in your contact number.');
	}
	if(empty($_POST['First']))
	{
		IncorrectFields('Please fill in your first name.');
	}
	if(empty($_POST['Last']))
	{
		IncorrectFields('Please fill in your surname.');
	}
	
	if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
	{
		incorrectFields('Please enter a vailid email address');
	}
	if(strlen($password) < 8)
	{
		incorrectFields('Password must be atleas 8 characters long.');
	}
	if(!preg_match("/^\+27[0-9]{9}$/",$Cell))
	{
		incorrectFields('Please enter a vailid cellphone number');
	}
	if(!preg_match("/[a-zA-Z\s]$/i",$Name))
	{
		incorrectFields('First Name can only contain letters');
	}
	if(!preg_match("/[a-zA-Z\s]$/i",$Last))
	{
		incorrectFields('Surename can only contain letters');
	}
	
	$result = mysqli_query($conn,"SELECT Email FROM customer WHERE Email = '".$Email."'");
	
	if(!$result)
	{
		incorrectFields('Failed to check database');
	}else
	{
		$row_count = mysqli_num_rows($result);
		if($row_count > 0)
		{
			incorrectFields('Email is already in use.');
		}
		
	}
	
	
	
	$result = mysqli_query($conn,"INSERT INTO customer(Email, Password, First_Name, Last_Name, Cell_Number) VALUES('".$Email."', '".$password."', '".$Name."', '".$Last."', '".$Cell."')");

	if(!$result)
	{
		incorrectFields('Failed to add new customer');
	}else
	{
		$_SESSION["err_msg"] = 'You have been registered.';
		$_SESSION["UserName"] = $Email;
		$_SESSION["Login"] = true;
		header("Location: New_home.php");
		EXIT();
		
	}




	function IncorrectFields($errMsg)
	{
	
		$_SESSION["err_msg"] = $errMsg;
		header("Location: Login_Register.php");
		EXIT();
	}

?>