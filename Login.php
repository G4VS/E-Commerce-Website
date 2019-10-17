<?php

session_start();
require_once('Connect.php');

$Username = mysqli_real_escape_string($conn, $_POST['Username']);
$UserPass = mysqli_real_escape_string($conn, $_POST['UserPass']);

	if(empty($_POST['Username']))
	{
		IncorrectFields('Please fill in your email address.');
	}
	
	if(empty($_POST['UserPass']))
	{
		IncorrectFields('Please fill in your password.');
	}
	
	if(substr($Username, 0, 1) == '@')
	{
		$result = mysqli_query($conn,"SELECT * FROM admin WHERE Username = '".$Username."' AND Password = '".$UserPass."'");
		if(!$result)
		{
			incorrectFields('Failed to check database');
		}else
		{
			$row_count = mysqli_num_rows($result);
			if($row_count == 1)
			{
				$_SESSION["LoginADM"] = true;
				header("Location: Admin.php");
				EXIT();
			}else
			{
				incorrectFields('Please enter correct login details');
			}
		}
	}else
	{
	
		$result = mysqli_query($conn,"SELECT * FROM customer WHERE Email = '".$Username."' AND Password = '".$UserPass."'");
		if(!$result)
		{
			incorrectFields('Failed to check database');
		}else
		{
			$row_count = mysqli_num_rows($result);
			if($row_count == 1)
			{
				
				$_SESSION["UserName"] = $UserName;
				$_SESSION["Login"] = true;
				$row = mysqli_fetch_array($result);
				$_SESSION["UserID"] = $row['Customer_ID'];
				if(!isset($_SESSION["CurentPage"]))
				{
					$_SESSION["CurentPage"] = 'New_home.php';
				}
				header("Location: ".$_SESSION["CurentPage"]."");
				EXIT();
			}else
			{
				incorrectFields('Please enter correct login details');
			}
		}
	}
	
function incorrectFields($errMsg)
{
	
	$_SESSION["err_msg"] = $errMsg;
	header("Location: Login_Register.php");
	EXIT();
}
?>

