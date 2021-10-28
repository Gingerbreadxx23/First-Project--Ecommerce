	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="styles\style.css">

	 <?php 

	 	
		require('./includes\header.php');
		require('./includes\database.php');

		session_start ();
		if(empty($_SESSION['status']) || $_SESSION['status'] == 'invalid'){
			
			require('./includes\emptystate.php');

		 }elseif ($_SESSION['status'] == 'valid') {
			 ?>
			 <!DOCTYPE html>   
			   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
			   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
			   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
		  <body>  
			   <br />  
			   <div class="container" style="width:1000px;">  

					<div style="clear:both"></div>  
					<br />  
					<h3>Cart Details</h3>  
					<div class="table-responsive">  
						 <table class="table table-bordered">  
							  <tr>  
								   <th width="10%">Product</th>  
								   <th width="20%">Item Name</th>  
								   <th width="10%">Quantity</th>  
								   <th width="10%">Variation</th>  
								   <th width="20%">Price</th>  
								   <th width="20%" >Item total</th>  
								   <th width="5%"></th>  
							  </tr>  	 	 
							<!-- CLICKED CART -->
							<?php   
									 	$cart_custid = $_SESSION['cust_id'];

								 ?>  
	 
							  <?php 
									$queryCart = "SELECT * FROM cart WHERE cust_id = '$cart_custid' ";
									$sqlCart = mysqli_query($connection, $queryCart);
									
									 if (empty(mysqli_fetch_array($sqlCart))){
										?>
											<tr>
									<td colspan = "7" rowspan="7">
										<img src=".\img\emptycart.png" class="img-fluid ml-5" alt="Sleeping fox" style="float:left;">
										<h1 style= "text-align:center;">Oops, Your Shopping Cart is Empty</h1>
										<h5 style= "text-align:center;">Browse our awesome gadgets now!</h5>
									</td>
								</tr>
							  <?php }else{ 

								 		$queryFetchcart = "SELECT * FROM cart WHERE cust_id = '$cart_custid' ";
										 $sqlFetchcart = mysqli_query($connection, $queryFetchcart);
										 while($rowFetchcart = mysqli_fetch_array($sqlFetchcart)){ 
											$cart_pro_id = $rowFetchcart['product_id'];
											$cart_pro_item_id =$rowFetchcart['product_item_id'];
									 
								  ?>
									 <tr>  
								   <td>
									   <?php 
									 		// PRODUCTS DATABASE QUERY
											 $querycartProduct = "SELECT * FROM products WHERE product_id= $cart_pro_id ";
											 $sqlcartProduct= mysqli_query($connection, $querycartProduct);
											 $rowcartProduct =mysqli_fetch_array($sqlcartProduct);
									   ?>
									   <img src ="admin\product_images\<?php echo $rowcartProduct['product_img1']; ?>">
								   </td>  
								   <td><?php  echo $rowcartProduct['product_name']; ?></td>  
								   <td><?php  echo $rowFetchcart['cart_item_quantity']; ?></td>
								   <td>
									   <?php 
									   		//PRODUCT_ITEM DATABASE
											$querycartVariation ="SELECT * FROM product_item WHERE product_item_id= $cart_pro_item_id";
											$sqlcartVariation = mysqli_query($connection,$querycartVariation);
											$rowcartVariation = mysqli_fetch_array($sqlcartVariation);

											echo $rowcartVariation["product_item_variation"];
									   ?>
									</td>  
								   <td>Php <?php  echo number_format( $rowcartProduct['product_price']); ?> </td>  
								   <td >Php
									    <?php 
											$total =0;
											 $total = $total + ($rowFetchcart['cart_item_quantity'] * $rowcartProduct['product_price'] );;
											echo number_format($total);
								   		 ?>
									</td>  
								   <td><button type ="submit" style="border:none; background:none;"><span class="text-danger">Remove</span></button></td>
							  </tr>  
							  <?php 
									} 
								
								
							  ?>
							  <tr >  
								   <td colspan="5" align="right" style="font-size:35;">Subtotal</td>  
								   <td align="center" style =" font-size: 1.5em;">Php 
										<?php 
											$subtotal =0;
											$querySubtotal = "SELECT * FROM cart WHERE cust_id = '$cart_custid' ";
											$sqlSubtotal = mysqli_query($connection,$querySubtotal);
											while($rowSubtotal = mysqli_fetch_array($sqlSubtotal)){

												$subtotal = $subtotal + $rowSubtotal["cart_total"];
											}
											echo number_format($subtotal);
										?>	   
								</td>  
								   <td></td>  
							  </tr>  
							
						<?php	 
								}	  
								  ?>  

						 </table> 	
					</div>  
			   </div>  
			   <br />  
			   <?php 
			   			$queryButtonCart = "SELECT * FROM cart WHERE cust_id = '$cart_custid' ";
					    $sqlButtonCart = mysqli_query($connection, $queryButtonCart);

						if(!empty(mysqli_fetch_array($sqlButtonCart))){
			  ?>
			   			 <div>
						<a class= cart-btns href="checkout.php">Proceed to Checkout &#8594</a>
						</div>
				<?php } ?>
		  </body> 
	 </html>
	<?php
		 }
	 ?>

	 <?php 
		require('./includes\footer.php');
	?>