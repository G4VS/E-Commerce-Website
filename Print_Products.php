<?php
	if(!isset($_SESSION["cart"]) || session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	
	$productsCode = "";
	for($i = 0; $i < $_SESSION["count"]; $i++)
	{
		$productsCode = $productsCode."
			<form action=\"Add_To_Cart.php\" method=\"POST\">
				<div class=\"Category\">
					<img class=\"category_image\" src=\"".$_SESSION["Img"][$i]."\"/><br/>
					".$_SESSION["cart"][$i]."<br/>
					R".$_SESSION["price"][$i]."<br/>
					<input type=\"hidden\" name=\"ProductName\" value=\"".$_SESSION["cart"][$i]."\" />
					<input type=\"number\" name=\"QtyScroller\" min=\"1\" value=\"1\" />
					<input type=\"submit\" value=\"Add to Cart\" name=\"AddToCartBtn\"/>
				</div>
			</form>";
			
	}
	echo $productsCode;
?>
