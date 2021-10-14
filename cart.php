<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

 <?php 
    require('./includes\header.php');
 ?>
<body>
   <!--CART--------------> 
<div class="small-container cart-page">
<table>
	<tr>
		<th>Product</th>
		<th>Quantity</th>
		<th>Subtotal</th>
	</tr>
	<tr>
		<td>
			<div class="cart-info">
				<img src="img/Laptop1.jpg">
				<div>
					<p>Laptop</p>
					<small>Price: 10,000.00</small>
					<br><br>
					<a class="remove-cart" href="">Remove</a>
				</div>	
			</div>
		</td>
		<td><input type="number" value="1"></td>
		<td>P10,000.00</td>
	</tr>
	<tr>
		<td>
			<div class="cart-info">
				<img src="img/webcam1.jpg">
				<div>
					<p>Camera</p>
					<small>Price: 20,000.00</small>
					<br><br>
					<a class="remove-cart" href="">Remove</a>
				</div>	
			</div>
		</td>
		<td><input type="number" value="1"></td>
		<td>P20,000.00</td>
	</tr>
	<tr>
		<td>
			<div class="cart-info">
				<img src="img/smartwatch1.jpg">
				<div>
					<p>Smartwatch</p>
					<small>Price: 30,000.00</small>
					<br><br>
					<a class="remove-cart" href="">Remove</a>
				</div>	
			</div>
		</td>
		<td><input type="number" value="1"></td>
		<td>P30,000.00</td>
	</tr>
</table>

<div class="total-price">
	<table>
		
		<tr>
			<td>Total</td>
			<td>P61,100.00</td>

		</tr>
	</table>
</div>

<div>
<a class= cart-btns href="checkout.php">Proceed to Checkout &#8594</a>
</div>
</div>
<?php 
    require('./includes\footer.php');
?>