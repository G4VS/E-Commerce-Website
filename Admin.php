<?php
	session_start();
	if($_SESSION["LoginADM"] != true || !isset($_SESSION["LoginADM"]))
	{
		if(isset($_SESSION["CurentPage"]))
		{
			header("Location: ".$_SESSION["CurentPage"]."");
		}else
		{
			header("Location: New_home.php");
		}
		EXIT();
	}
	
	if(isset($_SESSION["err_msg"]) && $_SESSION['err_msg'] != "")
	{
		echo "<script>alert('".$_SESSION["err_msg"]."');</script>";
		$_SESSION["err_msg"] = "";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			th, td
			{
				width:200px;
			}
		</style>
	</head>
	<body class="noBack"> 	
	
		<?php require_once('Customer_Table.php'); ?><br/><br/>
		<?php require_once('Product_Table.php'); ?><br/><br/>
		<?php require_once('Message_Table.php'); ?><br/><br/>
		<h2>Remove record</h2>
		<form method="POST" action="Admin_Remove.php">
			ID <input type="number" id="RemoveQtyScroller" name="RemoveQtyScroller" min="1" value="1"/><br/>
			Table: <select name="RemoveTableDrop" id="RemoveTableDrop">
					<option value="customer">customer</option>
					<option value="products">products</option>
					<option value="message">message</option>
					<option value="order">order</option>
					<option value="admin">admin</option>
				</select>
				<input type="submit" name="RemoveSubBtn" value="Remove" onclick="return confirm('Are you sure you want to delete ID:'+document.getElementById('RemoveQtyScroller').value+' from the '+document.getElementById('RemoveTableDrop').value+' table?');"/>
				
		</form><br/><br/>
		<h2>Insert record</h2>
		<form method="POST" action="Admin_Add.php">
			Table: <select name="AddTableDrop" id="AddTableDrop">
					<option value="customer">customer</option>
					<option value="products">products</option>
					<option value="message">message</option>
					<option value="order">order</option>
					<option value="admin">admin</option>
				</select><br/><br/>
				
				<input id="Add1" type="text"  class="" placeholder="Column1 value" name="Add1"/>
				<input id="Add2" type="text"  class="" placeholder="Column2 value" name="Add2"/>
				<input id="Add3" type="text"  class="" placeholder="Column3 value" name="Add3"/>
				<input id="Add4" type="text"  class="" placeholder="Column4 value" name="Add4"/>
				<input id="Add5" type="text"  class="" placeholder="Column5 value" name="Add5"/><br/><br/>
				<input type="submit" name="AddSubBtn" value="ADD" onclick="return confirm('Are you sure you want to add '+document.getElementById('Add1').value+' | '+document.getElementById('Add2').value+' | '+document.getElementById('Add3').value+' | '+document.getElementById('Add4').value+' | '+document.getElementById('Add5').value+' | into the '+document.getElementById('AddTableDrop').value+' table?');"/><br/>
				
		</form>
	</body>
	<footer>
	
	</footer>
</html>