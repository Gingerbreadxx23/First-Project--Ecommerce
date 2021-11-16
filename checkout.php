<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles\style.css">
<style>
  * {
    box-sizing: border-box;
  }
  
  
  /* Create two equal columns that floats next to each other */
  .column {
    float: left;
    width: 100%;
    padding: 10px;
    
  }
  .column1 {
    float: left;
    width: 55%;
    padding: 10px;
    margin-left: 5%;
    margin-top: 3%;
    height: 30%;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }
  .column-right{
    float: right;
    width: 30%;
    padding: 10px;
    margin-right: 5%;
    height:30%; 
    margin-top: 3%;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  .icon {
    padding: 10px;
    color: black;
    min-width: 50px;
    text-align: center;
    margin-left: 10px;
    font-size: 30px;
  }
  
  .order {
    font-size: 20px;
    letter-spacing: 3px;
  }
  
  .deliveryaddress{
    width: 100%;
    height: auto;
    border: none;
  }
  .title {
    font-size: 25px;
    font-weight: 600;
  }
  
  .customerinfo {
    padding: 10px 60px;
    margin-left: 0px;
    font-size:  18px;
  }
  
  th{
      border: 1px solid black;
      padding: 10px 10px;
  }
  table {
    width: 90%;
    border-collapse: collapse;
    margin-right: auto;
    margin-left: auto;
    
  }
  img {
    float: left;
  }
  td {
    padding: 10px 5px;
    
   }

  .hr {
    float: right;
    width: 300px;
   }
  
   .total {
     float: right;
     margin-top: 10px;
   }
  
  .button {
    width: 100%;
  
    border:  1px solid black;
    cursor: pointer;
    background: none;
    padding: 5px 20px;
  }
  
  .popup .overlay{
    position:fixed;
    top: 0px;
    left:0px;
    width:100vw;
    height:100vh;
    background:rgba(0,0,0,0.9);
    z-index:1;
    display:none;
  }
  .popup .content {
    position: absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%) scale(0);
    background: #fff;
    width:450px;
    height:220px;
    z-index:2;
    text-align:center;
    padding:20px;
    box-sizing: border-box;
  }
   .active .overlay{
    display:block;
  }
   .active .content{
    transition:all 300ms ease-in-out;
    transform:translate(-50%,-50%) scale(1);
  }
  


</style>
 <?php 
    require('./includes\header.php');
    require('./includes\database.php');
    require ('./includes\session.php');
    require ('./includes\scripts.php');

      $checkout_cust_id = $_SESSION['cust_id'];
 ?>
 <body>
   
   <script src = "js/paypal.js"></script>
  <div class= "popup" id= "oti">
     <div class="overlay" onClick="togglePopup()"></div>
     <div class="content">
          <h1>Pay Online</h1>
          <div id="paypal-button-container"></div>
     </div>
</div>
<script>paypal.Buttons().render('#paypal-button-container');</script>
    <?php 
        $queryShipinfo = "SELECT * FROM customers WHERE cust_id ='$checkout_cust_id'";
        $sqlShipinfo = mysqli_query($connection, $queryShipinfo);
        $rowShipinfo = mysqli_fetch_array($sqlShipinfo);
    ?>
  <form method ="post">
 <div class="row">
  <div class="column1">
    <div class="deliveryaddress">
      <i class="fa fa-map-marker icon" ></i><span class="title">Shipping Information</span><br/>
      <small class="customerinfo"><b>Name: </b><?php echo $rowShipinfo['cust_firstName'] . " " . $rowShipinfo['cust_lastName']  ?></small><br/>
      <small class="customerinfo"><b>Contact: </b> <?php echo $rowShipinfo['cust_phone']?> </small><br/>
      <small class="customerinfo"><b>E-mail: </b> <?php echo $rowShipinfo['cust_email']?> </small><br/>
      <small class="customerinfo"><b>Address: </b> <?php echo $rowShipinfo['cust_address'] . " " . $rowShipinfo['cust_city'] . " " . $rowShipinfo['cust_country'] . " " . $rowShipinfo['cust_postalcode']; ?> </small><br/>
    </div>
  </div>
  <div class="column-right">
    <div class="">
      <i class="fas fa-cash-register icon"></i><span class="title">Payment Method</span><br/> 
      <input type= "radio" value ="Cash on Delivery" name= "payment" id ="COD" required>
      <label for="COD" style ="margin-right: 20px;"> <i class="fas fa-truck icon"></i> Cash on Delivery</label> <br/>
      <input type= "radio" value ="Paypal" name= "payment" id ="paypal">
      <label for="paypal"> <i class="fab fa-cc-paypal icon"></i> PayPal</label> <br/>
    </div>
  </div>
</div>
<br/>


<div class="row">
  <div class="column">
   <table>
    <th align="left"> Product </th>
    <th> Quantity </th>
    <th> Variation </th>
    <th> Subtotal </th>
      <?php 
          $subtotal = 0;
          $total = 0;
          $shipping = 120;
          $querygetCart = "SELECT * FROM cart WHERE cust_id = '$checkout_cust_id'";
          $sqlgetCart = mysqli_query($connection, $querygetCart);
          while($rowgetCart = mysqli_fetch_array($sqlgetCart)){
                $checkout_pro_id = $rowgetCart['product_id'];
                $checkout_item_id = $rowgetCart['product_item_id'];

                $queryCOproduct = "SELECT * FROM products WHERE product_id = '$checkout_pro_id' ";
                $sqlCOproduct = mysqli_query($connection, $queryCOproduct);
                $rowCOproduct = mysqli_fetch_array($sqlCOproduct);

                $queryCOitem = "SELECT product_item_variation FROM product_item WHERE product_item_id = $checkout_item_id ";
                $sqlCOitem = mysqli_query($connection, $queryCOitem);
                $rowCOitem =mysqli_fetch_array($sqlCOitem);
                
        ?>
      <tr>
           
      <td><img src="admin\product_images\<?php echo $rowCOproduct['product_img1']; ?>" width="100"><small><b>Name:</b> <?php echo $rowCOproduct['product_name']; ?></small><br/><small><b>Price:</b> <?php echo $rowCOproduct['product_price']; ?></small></td>
      <td align="center"><?php echo $rowgetCart['cart_item_quantity']; ?></td>
      <td align="center"><?php
        $queryCOvariation = "SELECT * FROM product_item WHERE product_item_id= $checkout_item_id";
        $sqlCOvariation = mysqli_query($connection, $queryCOvariation);
        $rowCOvariation = mysqli_fetch_array($sqlCOvariation);

        echo $rowCOvariation['product_item_variation'];
      ?></td>
      <td align="center"> Php <?php $subtotal = $subtotal + $rowgetCart['cart_total']; echo number_format ($rowgetCart['cart_total']); ?></td>
      </tr>
        
        
      <?php
          }
      ?>    
      
    
    <tr>
     <td> </td>
      <td> </td>
      <td colspan="2"> <hr/> </td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td  align="center"> Subtotal </td>
      <td  align="center">Php <?php echo number_format($subtotal); ?></td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td  align="center"> Shipping Fee </td>
      <td  align="center">Php <?php echo number_format($shipping); ?></td>
    </tr>
    <tr>
      <td> </td>
      <td> </td>
      <td  align="center"> Total </td>
      <td  align="center">Php <?php echo number_format($total = $subtotal + $shipping);?> </td>
    </tr>
      <tr>
      <td> </td>
      <td> </td>
     
      
      <input type="hidden" name="customerid" value ="<?php echo  $checkout_cust_id; ?>"> 
      <input type="hidden" name="ordertotal" value ="<?php echo  $total; ?>"> 
      <input type="hidden" name="orderstatus" value ="pending"> 
      <input type="hidden" name="orderproduct"value ="<?php echo  $checkout_pro_id; ?>"> 
      <input type="hidden" name="orderitem" value ="<?php echo  $checkout_item_id; ?>"> 
      <td colspan="2"> <input type="Submit" name= "place_order" class="btns" value="Place Order" /></td>
    </tr>
    </form>
    
   </table>
    
  </div>
</div>
      </body>
      <?php 

          if(isset($_POST["place_order"])){
            $POpayment = $_POST['payment'];
              if($POpayment == "Paypal"){
                 echo "<script>togglePopup();</script>";
              }else{
              $POcust_id = $_POST['customerid'];
              $POordertotal = $_POST['ordertotal'];
             
              $POorderstatus = $_POST['orderstatus'];
              $POorderitem = $_POST['orderitem'];
              $POproduct_id = $_POST['orderproduct'];

              $queryCart_order = "SELECT * FROM cart WHERE cust_id = '$POcust_id'";
              $sqlCart_order = mysqli_query($connection, $queryCart_order);
              $rowCart_order = mysqli_fetch_array($sqlCart_order);

                $Ordercust_id = $rowCart_order['cust_id'];
                $Orderitemquantity = $rowCart_order['cart_item_quantity'];  

               
                $queryPlaceorder = "INSERT INTO orders VALUES (null,' $Ordercust_id', CURRENT_TIMESTAMP, '$POordertotal', '$POpayment', '$POorderstatus' )";
                $sqlPlaceorder = mysqli_query($connection,$queryPlaceorder);

                if($sqlPlaceorder){
                   
                    $queryGetOrder = "SELECT * FROM orders WHERE cust_id =  '$Ordercust_id' AND  order_total ='$POordertotal' ";
                    $sqlGetOrder = mysqli_query($connection, $queryGetOrder);
                    $rowGetorder = mysqli_fetch_array($sqlGetOrder);
                      
                      $OIorder_id = $rowGetorder['order_id'];

                      $queryOIcart ="SELECT * FROM cart WHERE cust_id =  '$Ordercust_id'";
                      $sqlOIcart =mysqli_query($connection,$queryOIcart);
                      while($rowOIcart = mysqli_fetch_array($sqlOIcart)){

                        $OIpro_id = $rowOIcart['product_id'];
                        $OIpro_item_id = $rowOIcart['product_item_id'];
                        $OIquantity = $rowOIcart['cart_item_quantity'];

                        $queryOIvariation = "SELECT * FROM product_item WHERE product_item_id =' $OIpro_item_id'";
                        $sqlOIvariation = mysqli_query($connection, $queryOIvariation);
                        $rowOIvariation =mysqli_fetch_array($sqlOIvariation);

                        $OIvariation = $rowOIvariation['product_item_variation'];

                        $queryOrderitem = "INSERT INTO order_items VALUES(null,'$OIorder_id','$OIpro_id','$OIquantity','$OIvariation' )";
                        $sqlOrderitem =mysqli_query($connection, $queryOrderitem);
 

                      }
                        
                        $queryDeletecartItems = "DELETE FROM cart WHERE cust_id ='$POcust_id' ";
                        $sqlDeletecartItems = mysqli_query($connection,$queryDeletecartItems);

                        if ($sqlDeletecartItems){
                          echo ' <script>   swal({
                            title: "Successfully Ordered! ",
                            text: "You have placed an order successfully",
                            icon: "success",
                            button: false,  
                            timer :2000,
                          }).then(function() {
                            window.location = "cart.php";
                        });
                          </script> ';
                          
                      }
                }
              }
                
          }
         
  require ('./includes\footer.php'); 

?>