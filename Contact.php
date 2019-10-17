<?php
session_start();


require_once('Connect.php');


	$Subject = mysqli_real_escape_string($conn, $_POST['Subject']);
	$Name =mysqli_real_escape_string($conn, $_POST['Name']);
	$Email = mysqli_real_escape_string($conn, $_POST['Email']);
	$Cell = mysqli_real_escape_string($conn, $_POST['Cell']);
	$Message = mysqli_real_escape_string($conn, $_POST['Message']);
	
	if(empty($_POST['Subject']))
	{
		
		missingFields();
	}
	
	if(empty($_POST['Name']))
	{
		missingFields();
	}
	if(empty($_POST['Email']))
	{
		missingFields();
	}
	if(empty($_POST['Cell']))
	{
		missingFields();
	}
	if(empty($_POST['Message']))
	{
		missingFields();
	}
	
	if(!preg_match("/[a-zA-Z\s]$/i",$Name))
	{
		incorrectFields('Name can only contain letters');
	}
	if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
	{
		incorrectFields('Please enter a vailid email address');
	}
	if(!preg_match("/^\+27[0-9]{9}$/",$Cell))
	{
		incorrectFields('Please enter a vailid cellphone number');
	}

	$result = mysqli_query($conn,"INSERT INTO message(Subject, Name, Email, Cell, Message_Text) VALUES('".$Subject."', '".$Name."', '".$Email."', '".$Cell."', '".$Message."')");
	//$result = mysqli_query($conn,"INSERT INTO message(Subject, Name, Email, Cell, Message_Text) VALUES('$Subject', '$Name', '$Email', '$Cell', '$Message'");
	if(!$result)
	{
		incorrectFields('Failed to send Message');
	}else
	{
		incorrectFields('Message has been sent');
		
	}
/*if(isset($_POST['MessageSubmitbtn'])) //check if button was pressed
{
}*/

function missingFields()
{
	
	$_SESSION["err_msg"] = 'Please fill in all the fields.';
		header("Location: New_Contact_Us.php");
		EXIT();
}

function incorrectFields($errMsg)
{
	
	$_SESSION["err_msg"] = $errMsg;
		header("Location: New_Contact_Us.php");
		EXIT();
}
?>