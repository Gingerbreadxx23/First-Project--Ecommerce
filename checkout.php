<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles\style.css">
<link rel="stylesheet" href="styles\checkout.css">

 <?php 
    require('./includes\header.php');
 ?>
 <body>

 <div class="row">
  <div class="column">
    <div class="deliveryaddress">
      <i class="fa fa-map-marker icon" ></i><span class="title">Delivery</span><br/>
      <small class="customerinfo"><b>Name:</b> Cristina Deleon </small><br/>
      <small class="customerinfo"><b>Contact:</b> 09206770630 </small><br/>
      <small class="customerinfo"><b>Address</b> 56 C. Santos St. Ugong, Pasig </small><br/>
    </div>
  </div>
</div>
<br/>
<div class="row">
  <div class="column">
   <table>
    <th align="left"> Product </th>
    <th> Quantity </th>
    <th> Subtotal </th>

    <tr>
      <td><img src="laptop.jpg" width="100"><small><b>Name:</b> Laptop</small><br/><small><b>Price:</b> 10,000</small></td>
      <td align="center">1</td>
      <td align="center">10,000</td>
    </tr>
     <tr>
      <td><img src="laptop.jpg" width="100"><small><b>Name:</b> Laptop</small><br/><small><b>Price:</b> 10,000</small></td>
      <td align="center">1</td>
      <td align="center">10,000</td>
    </tr>
     <tr>
      <td><img src="laptop.jpg" width="100"><small><b>Name:</b> Laptop</small><br/><small><b>Price:</b> 10,000</small></td>
      <td align="center">1</td>
      <td align="center">10,000</td>
    </tr>
    <tr>
      <td> </td>
      <td colspan="2"> <hr/> </td>
    </tr>
    <tr>
      <td> </td>
      <td  align="center"> Subtotal </td>
      <td  align="center"> 30,000 </td>
    </tr>
    <tr>
      <td> </td>
      <td  align="center"> Shipping Fee </td>
      <td  align="center"> 120.00 </td>
    </tr>
    <tr>
      <td> </td>
      <td  align="center"> Total </td>
      <td  align="center"> 30,120 </td>
    </tr>
      <tr>
      <td> </td>
      <td colspan="2"> <input type="Submit" class="button" value="Place Order" /></td>
    </tr>
   </table>
    
  </div>
</div>
      </body>
      <?php 
  require ('./includes\footer.php');
  require ('./includes\scripts.php');
?>