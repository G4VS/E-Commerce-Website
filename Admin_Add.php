<?php  
	session_start();
	require_once('Connect.php');
	
	$Add = array( mysqli_real_escape_string($conn, $_POST['Add1']), mysqli_real_escape_string($conn, $_POST['Add2']), mysqli_real_escape_string($conn, $_POST['Add3']), mysqli_real_escape_string($conn, $_POST['Add4']), mysqli_real_escape_string($conn, $_POST['Add5']));
	$Add_Table = mysqli_real_escape_string($conn, $_POST['AddTableDrop']);
	
	if($Add_Table == "customer")
	{
		checkInput($Add, 5);
		executeSQL("INSERT INTO `customer` (`Email`, `Password`, `First_Name`, `Last_Name`, `Cell_number`) VALUES('".$Add[0]."', '".$Add[1]."', '".$Add[2]."', '".$Add[3]."', '".$Add[4]."')", $conn);
	
	}else if($Add_Table == "message")
	{
		checkInput($Add, 5);
		executeSQL("INSERT INTO `message` (`Subject`, `Name`, `Email`, `Cell`, `Message_Text`) VALUES('".$Add[0]."', '".$Add[1]."', '".$Add[2]."', '".$Add[3]."', '".$Add[4]."')", $conn);
	}else if($Add_Table == "admin")
	{
		checkInput($Add, 2);
		executeSQL("INSERT INTO `admin` (`Username`, `Password`) VALUES('".$Add[0]."', '".$Add[1]."')", $conn);
	
	}else if($Add_Table == "order")
	{
		checkInput($Add, 3);
		executeSQL("INSERT INTO `order` (`Date`, `Total_Amount`, `Customer_FK`) VALUES('".$Add[0]."', ".$Add[1]." ".$Add[2].")", $conn);
	}else if($Add_Table == "products")
	{
		checkInput($Add, 4);
		executeSQL("INSERT INTO `products` (`Name`, `Description`, `Image`, `Price`) VALUES('".$Add[0]."', '".$Add[1]."', '".$Add[2]."', ".$Add[3].")", $conn);
	}else if($Add_Table == "order_items")
	{
		checkInput($Add, 3);
		executeSQL("INSERT INTO `order_items` (`Order_FK`, `Products_FK`, `Quantity`) VALUES(".$Add[0].", ".$Add[1].", ".$Add[2].")", $conn);
	}

	function executeSQL($sql, $conn)
	{
		
		
		$ResulrR = mysqli_query($conn,$sql);
	
		if(!$ResulrR)
		{
			incorrectFields('Failed to Add row. Please make sure about the Foreign Keys that you enter');
			
		}else if($ResulrR)
		{
			incorrectFields('Row Added');
		}
	}
	
	function checkInput($AddArr, $num) //check if all required fields are set
	{
		for($i = 0; $i < $num; $i++)
		{
			if(!isset($AddArr[$i]) || $AddArr[$i] == "" || $AddArr[$i] == null || empty($AddArr[$i]))
			{
				incorrectFields("Please enter all required fields for the ".$AddTableDrop." table");
			}
		}
	}
	
	
	
	function incorrectFields($errMsg) //save error message to be displayed on the admin page
	{
	
		$_SESSION["err_msg"] = $errMsg;
		header("Location: Admin.php");
		EXIT();
	}
?>