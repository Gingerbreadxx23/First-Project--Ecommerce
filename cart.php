	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="styles\style.css">

	 <?php 
		require('./includes\header.php');
		require('./includes\database.php');
	 ?>
		<?php   
	 session_start();  

	 if(isset($_POST["add_to_cart"]))  
	 {  
		  if(isset($_SESSION["shopping_cart"]))  
		  {  
			   $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
			   if(!in_array($_GET["id"], $item_array_id))  
			   {  
					$count = count($_SESSION["shopping_cart"]);  
					$item_array = array(  
						 'item_id'               =>     $_GET["id"],  
						 'item_image'               =>     $_POST["hidden_image"], 
						 'item_name'               =>     $_POST["hidden_name"],  
						 'item_price'          =>     $_POST["hidden_price"],  
						 'item_quantity'          =>     $_POST["quantity"]  
					);  
					$_SESSION["shopping_cart"][$count] = $item_array;  
							   echo '<script>alert("Item Added")</script>';  
					echo '<script>window.location="shop.php"</script>';  
			   }  
			   else  
			   {  
					echo '<script>alert("Item Already Added")</script>';  
					echo '<script>window.location="shop.php"</script>';  
			   }  
		  }  
		  else  
		  {  
			   $item_array = array(  
					'item_id'               =>     $_GET["id"],  
					'item_image'               =>     $_POST["hidden_image"],
					'item_name'               =>     $_POST["hidden_name"],  
					'item_price'          =>     $_POST["hidden_price"],  
					'item_quantity'          =>     $_POST["quantity"]  
			   );  
			   $_SESSION["shopping_cart"][0] = $item_array;  
		  }  
	 }  
	 if(isset($_GET["action"]))  
	 {  
		  if($_GET["action"] == "delete")  
		  {  
			   foreach($_SESSION["shopping_cart"] as $keys => $values)  
			   {  
					if($values["item_id"] == $_GET["id"])  
					{  
						 unset($_SESSION["shopping_cart"][$keys]);  
						 echo '<script>alert("Item Removed")</script>';  
						 echo '<script>window.location="cart.php"</script>';  
					}  
			   }  
		  }  
	 }  
	 ?>  
	 <!DOCTYPE html>  
	 <html>  
		  <head>  
			   <title>Ecommerce System | Cart</title>  
			   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
			   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
			   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		  </head>  
		  <body>  
			   <br />  
			   <div class="container" style="width:700px;">  
					<?php  
					$query = "SELECT * FROM products ORDER BY product_id ASC";  
					$result = mysqli_query($connection, $query);  
					if(mysqli_num_rows($result) > 0)  
					{  
						 while($row = mysqli_fetch_array($result))  
						 {  
					?>  
					<?php  
						 }  
					}  
					?>  
					<div style="clear:both"></div>  
					<br />  
					<h3>Order Details</h3>  
					<div class="table-responsive">  
						 <table class="table table-bordered">  
							  <tr>  
								<th width="40%">Product</th>  
								   <th width="40%">Item Name</th>  
								   <th width="10%">Quantity</th>  
								   <th width="20%">Price</th>  
								   <th width="40%" >Subtotal</th>  
								   <th width="5%">Action</th>  
							  </tr>  
							  <?php   
							  if(!empty($_SESSION["shopping_cart"]))  
							  {  
								   $total = 0;  
								   foreach($_SESSION["shopping_cart"] as $keys => $values)  
								   {  
							  ?>  
							  <tr>  
								   <td><img src="<?php echo $values["item_image"]; ?>" class="img-responsive" /></td>  
								   <td><?php echo $values["item_name"]; ?></td>  
								   <td><?php echo $values["item_quantity"]; ?></td>  
								   <td>Php <?php echo $values["item_price"]; ?></td>  
								   <td >Php <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
								   <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
							  </tr>  
							  <?php  
										$total = $total + ($values["item_quantity"] * $values["item_price"]);  
								   }  
							  ?>  
							  <tr >  
								   <td colspan="4" align="right" style="font-family:Verdana; font-size:35;">Total</td>  
								   <td align="left">Php <?php echo number_format($total, 2); ?></td>  
								   <td></td>  
							  </tr>  
							  <?php  
							  }  
							  ?>

						 </table>  

						 
						
					</div>  
			   </div>  
			   <br />  
			    <div>
						<a class= cart-btns href="checkout.php">Proceed to Checkout &#8594</a>
						</div>
		  </body>  
	 </html>
	 <?php 
		require('./includes\footer.php');
	?>