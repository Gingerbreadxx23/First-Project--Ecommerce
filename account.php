<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles/account.css">
<link rel="stylesheet" href="styles/app.css">
<link rel="stylesheet" href="styles/grid.css">
<link rel="stylesheet" href="styles/style.css">
<?php
  require ('./includes\header.php');
  require ('./includes\session.php');//Avoid access after logging out
  require ('./includes\database.php');
  require ('./includes\scripts.php');

 $custid = $_SESSION['cust_id'];
 $firstname = $_SESSION['cust_firstName'];
 $lastname =  $_SESSION['cust_lastName'];
 $email    =  $_SESSION['cust_email'];
 $password  =  $_SESSION['cust_password'];
 $phone  =  $_SESSION['cust_phone'];
 $address   =  $_SESSION['cust_address'];
 $postalcode  =  $_SESSION['cust_postalcode'];
 $country  =  $_SESSION['cust_country'];
 $city   =  $_SESSION['cust_city'];

 if(isset($_POST['cancel-order'])){

   $order_id = $_POST['hiddenorder-id'];

   $querycancelOrder = "UPDATE orders SET order_status = 'cancelled' WHERE order_id='$order_id'";
   $sqlcancelOrder = mysqli_query($connection, $querycancelOrder);

   if($sqlcancelOrder){
    echo ' <script>   swal({
      title: "Order has been cancelled! ",
      text: "The order is cancelled successfully",
      icon: "success",
      button: false,  
      timer :1700,
    }); 
    </script> ';
   }
 }
 
?>
<body>
 <!-- products content -->
 <div class="bg-main">
        <div class="container">
            <div class="box">

            </div>
            <div class="box">
                <div class="row">
                    <div class="col-3 filter-col" id="filter-col">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-close">close</button>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                My Account
                            </span>
                            <ul class="filter-list">
                                <li id="bill"><a href="#">Billing Information</a></li>
                                <li id="status"><a href="#">Order Status</a></li>
                                <li id="history"><a href="#">Order History</a></li>
                                <li id="cancelrefunded"><a href="#">Cancelled/Refunded Order</a></li>
                                <form method= "post" action="logout.php">
                                <li><input type= submit value = "Logout" style = "border:none; float:left; background:none; font-size:1.1em; color:red;"></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9 col-md-12">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                        </div>
                        <!-- display Information -->
                        <div class="box">
                          <div class="billinginfo" id="billinginfo">
                            <div class="row">
                              <div class="column">
                                <h2>Personal Information</h2><br/>
                                <input type="text" value="<?php echo $firstname . " " . $lastname; ?>" readonly/>
                                <input type="text" value="<?php echo $address . " " . $city . " " . $country . " " . $postalcode; ?>" readonly/>
                                <input type="email" value="<?php echo $email; ?>" readonly/>
                                <input type="number" value="0<?php echo $phone; ?>" readonly/>
                                <form action= "editprofile.php" method="post">
                                <input type="submit" value="Edit Information" readonly/>
                                </form>
                              </div>
                          </div>
                        </div>

                          <!-- display orderstatus -->
                        <div class="orderstatus" id="orderstatus">
                          <div class="row">
                            <div class="column">
                              <h2>Order Status</h2><br/>
                              <table>
                               <th align="left"> Product </th>
                               <th> Total </th>
                               <th> Status </th>
                               <th> Action </th>
                              <!-- ORDER DATABASE  -->
                              <?php 
                                    $queryorderStatus = "SELECT * FROM orders WHERE order_status NOT IN('cancelled','completed') AND cust_id= '$custid'";
                                    $sqlorderStatus = mysqli_query($connection, $queryorderStatus);
                                    while($roworderStatus = mysqli_fetch_array($sqlorderStatus)){
                                      $order_id = $roworderStatus['order_id'];

                                      $queryproductStatus = "SELECT * FROM order_items WHERE order_id = '$order_id'";
                                      $sqlproductStatus = mysqli_query($connection, $queryproductStatus);
                                      
                                ?>
                                <tr>
                                 <td>
                                 <?php 
                                     while($rowproductStatus = mysqli_fetch_array($sqlproductStatus)){
                                      $product_id  = $rowproductStatus['product_id'];
                                      $productquantity = $rowproductStatus['order_item_quantity'];
                                      $variant = $rowproductStatus['order_item_variation'];

                                      $querygetproduct = "SELECT * FROM products WHERE product_id='$product_id'";
                                      $sqlgetproduct = mysqli_query($connection, $querygetproduct);
                                      while($rowgetproduct = mysqli_fetch_array($sqlgetproduct)){
                                      
                                  ?>
                                   <small><?php echo $rowgetproduct['product_name'] . "- $variant -" . "(" . $productquantity; ?>pc/s) </small><br>
                                  
                                 <?php }} ?>
                                 </td>
                                 <?php 
                                  // CANCEL BUTTON
                                       $cancelstatus =$roworderStatus['order_status'];
                                 ?>
                                 <td align="center"><small>Php  <?php echo number_format($roworderStatus['order_total']);?></small></td>
                                 <td align="center"><small> <?php echo strtoupper($roworderStatus['order_status']);?> </small></td>
                                 <form method= "post">
                                 <td align="center" ><small><input  type = "submit" <?php if ($cancelstatus == 'processing' || $cancelstatus == 'shipped'){ ?> disabled <?php   } ?>style=" border:none; background:none; text-decoration: underline;" value="Cancel" name ="cancel-order" >
                                                            <input type = "hidden" name= "hiddenorder-id" value= "<?php echo $order_id; ?>">
                                </small></td>
                                 </form>
                               </tr>
                                <?php
                                    }
                              ?>
                               
                             </table>
                            </div>
                        </div>
                      </div>

                        <!-- display orderhistory -->
                      <div class="orderhistory" id="orderhistory">
                        <div class="row">
                          <div class="column">
                            <h2>Order History</h2><br/>
                            <table>
                             <th align="left"> Product </th>
                             <th> Total </th>
                             <th> Status </th>
                             <?php 
                                    $queryorderStatus = "SELECT * FROM orders WHERE cust_id= '$custid' AND order_status= 'completed'";
                                    $sqlorderStatus = mysqli_query($connection, $queryorderStatus);
                                    while($roworderStatus = mysqli_fetch_array($sqlorderStatus)){
                                      $order_id = $roworderStatus['order_id'];

                                      $queryproductStatus = "SELECT * FROM order_items WHERE order_id = '$order_id'";
                                      $sqlproductStatus = mysqli_query($connection, $queryproductStatus);
                                      
                                ?>
                                <tr>
                                 <td>
                                 <?php 
                                     while($rowproductStatus = mysqli_fetch_array($sqlproductStatus)){
                                      $product_id  = $rowproductStatus['product_id'];
                                      $productquantity = $rowproductStatus['order_item_quantity'];
                                      $variant = $rowproductStatus['order_item_variation'];

                                      $querygetproduct = "SELECT * FROM products WHERE product_id='$product_id'";
                                      $sqlgetproduct = mysqli_query($connection, $querygetproduct);
                                      while($rowgetproduct = mysqli_fetch_array($sqlgetproduct)){
                                      
                                  ?>
                                   <small><?php echo $rowgetproduct['product_name'] . "- $variant -" . "(" . $productquantity; ?>pc/s) </small><br>
                                  
                                 <?php }} ?>
                                 </td>
                                 <td align="center"><small>Php  <?php echo number_format($roworderStatus['order_total']);?></small></td>
                                 <td align="center"><small> <?php echo strtoupper($roworderStatus['order_status']);?> </small></td>
                               </tr>
                                <?php
                                    }
                              ?>
                               
                             </table>
                            </div>
                        </div>
                      </div>


                    <!-- display canncelled/refunded -->
                  <div class="orderhistory" id="cancelledrefundedorder">
                    <div class="row">
                      <div class="column">
                        <h2>Cancelled Orders</h2><br/>
                        <table>
                         <th align="left"> Product </th>
                         <th> Total </th>
                         <th> Status </th>

                         <?php 
                                    $queryorderStatus = "SELECT * FROM orders WHERE cust_id= '$custid' AND order_status= 'cancelled'";
                                    $sqlorderStatus = mysqli_query($connection, $queryorderStatus);
                                    while($roworderStatus = mysqli_fetch_array($sqlorderStatus)){
                                      $order_id = $roworderStatus['order_id'];

                                      $queryproductStatus = "SELECT * FROM order_items WHERE order_id = '$order_id'";
                                      $sqlproductStatus = mysqli_query($connection, $queryproductStatus);
                                      
                                ?>
                                <tr>
                                 <td>
                                 <?php 
                                     while($rowproductStatus = mysqli_fetch_array($sqlproductStatus)){
                                      $product_id  = $rowproductStatus['product_id'];
                                      $productquantity = $rowproductStatus['order_item_quantity'];
                                      $variant = $rowproductStatus['order_item_variation'];

                                      $querygetproduct = "SELECT * FROM products WHERE product_id='$product_id'";
                                      $sqlgetproduct = mysqli_query($connection, $querygetproduct);
                                      while($rowgetproduct = mysqli_fetch_array($sqlgetproduct)){
                                      
                                  ?>
                                   <small><?php echo $rowgetproduct['product_name'] . "- $variant -" . "(" . $productquantity; ?>pc/s) </small><br>
                                  
                                 <?php }} ?>
                                 </td>
                                 <td align="center"><small>Php  <?php echo number_format($roworderStatus['order_total']);?></small></td>
                                 <td align="center"><small> <?php echo strtoupper($roworderStatus['order_status']);?> </small></td>
                               </tr>
                                <?php
                                    }
                              ?>
                               
                             </table>
                            </div>
                        </div>
                      </div>

                      </div>
                    <!-- end display Information -->
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
    <!-- end products content -->

    <!-- app js -->

<script>
var billing = document.getElementById("bill");
var menubill = document.getElementById("billinginfo");
billing.onclick = function() {
  menubill.style.display = "block";
  orderstatus.style.display="none";
  orderhistory.style.display = "none";
  cancelrefundedhistory.style.display = "none";
}

var order = document.getElementById("status");
var orderstatus = document.getElementById("orderstatus");
order.onclick = function() {
  orderstatus.style.display = "block";
  menubill.style.display="none";
  orderhistory.style.display = "none";
  cancelrefundedhistory.style.display = "none";
}

var Ohistory = document.getElementById("history");
var orderhistory = document.getElementById("orderhistory");
Ohistory.onclick = function() {
  orderhistory.style.display = "block";
  menubill.style.display="none";
  orderstatus.style.display="none";
  cancelrefundedhistory.style.display = "none";
}

var cancelled = document.getElementById("cancelrefunded");
var cancelrefundedhistory = document.getElementById("cancelledrefundedorder");
cancelled.onclick = function() {
  cancelrefundedhistory.style.display = "block";
  menubill.style.display="none";
  orderstatus.style.display="none";
  orderhistory.style.display = "none";
}



</script>
</body>
<?php 
  require ('./includes\footer.php');
  // AVOID ACCESS FROM admin
  if($_SESSION['user'] !== 'customer'){
   echo "<script>window.location.href ='login.php'</script>";
  }
  
?>
