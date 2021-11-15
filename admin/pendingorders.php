<h3 class = "my-3">Pending Orders</h3>
<?php 
      require('./includes/scripts.php'); 
       require('./includes/database.php');
      $queryviewPendingOrders ="SELECT * FROM `orders` WHERE `order_status` = 'pending';";
      $sqlviewPendingOrders = mysqli_query($connection, $queryviewPendingOrders);
      $lengthPending = mysqli_num_rows($sqlviewPendingOrders);

      if($lengthPending ==0){
        require('./includes/emptystate.php');
      }else{
       while ($rowviewPendingOrders = mysqli_fetch_array($sqlviewPendingOrders)){
            $custInfo = $rowviewPendingOrders['cust_id'];
            $orderID = $rowviewPendingOrders['order_id'];
            $orderStatus = $rowviewPendingOrders['order_status'];
            

           
        ?>
         <!-- ORDER_ITEM DATABASE  -->     
          

           <!-- LOOP  -->
          <div class=" shadow mt-2 container border  ">
          <div class="d-flex  mb-3">
              <div class="p-1 ">
              <?php     

                    $queryviewOrderItem = "SELECT * FROM order_items WHERE order_id= $orderID";
                    $sqlviewOrderItem = mysqli_query($connection,$queryviewOrderItem);
                   while($rowviewOrderItem = mysqli_fetch_array ($sqlviewOrderItem)){
                    $productID = $rowviewOrderItem['product_id'];   
                    ?>
                <!-- PRODUCT DATABASE  -->
                <?php 
                    $queryProductInfo = "SELECT * FROM products WHERE product_id= $productID";
                    $sqlProductInfo =mysqli_query($connection,$queryProductInfo);
                    $rowProductInfo = mysqli_fetch_array($sqlProductInfo);
                ?>
                 <img src="product_images/<?php echo $rowProductInfo['product_img1'];?>" style = "width : 100px; height :100px;"> <br>
                 <?php }?>
              </div>
              <div class=" p-2 flex-grow-1">
              <?php     

                    $queryviewOrderItem = "SELECT * FROM order_items WHERE order_id= $orderID";
                    $sqlviewOrderItem = mysqli_query($connection,$queryviewOrderItem);
                    while($rowviewOrderItem = mysqli_fetch_array ($sqlviewOrderItem)){
                    $productID = $rowviewOrderItem['product_id'];   
                    ?>  
                    
                    <?php 
                    $queryProductInfo = "SELECT * FROM products WHERE product_id= $productID";
                    $sqlProductInfo =mysqli_query($connection,$queryProductInfo);
                    $rowProductInfo = mysqli_fetch_array($sqlProductInfo);
                ?>
                <p class=" text-uppercase" style="font-size : 1.3em;"><b><?php echo $rowProductInfo['product_name'];?> <br>
              </b> <span  class=" " style="font-size : 0.6em;">Quantity : <b><?php echo $rowviewOrderItem ['order_item_quantity']; ?> </b></span>
                <span class=" ms-5 " style="font-size : 0.6em;"> Variation :<b> <?php echo $rowviewOrderItem ['order_item_variation']; ?> </b></span></p> <hr>
              </hr>
              <?php }?>
                <p style="font-size : 0.8em;"><span class="text-muted">Order Code: </span> <b><?php echo str_pad($orderID, 8 ,0, STR_PAD_LEFT);  ?> </b> <span class="ms-4 text-muted "> Status:</span> <b class= "badge alert-secondary text-uppercase"><?php echo $orderStatus;  ?> </b><span class=" ms-4 text-muted">Date&Time:</span> <b><?php echo $rowviewPendingOrders['order_date']; ?></b></p> <hr>
                <!-- Customer Info  -->
                  <?php 
                      $queryviewCustInfo = "SELECT * FROM customers WHERE cust_id = $custInfo";
                      $sqlviewCustInfo = mysqli_query($connection,$queryviewCustInfo);
                      $rowviewCustInfo = mysqli_fetch_array($sqlviewCustInfo);
                  ?>
                
                <p class="px-0" style="font-size : 0.8em;"><?php echo $rowviewCustInfo['cust_firstName'] . $rowviewCustInfo['cust_lastName']; ?> <br>
                                                         <?php echo $rowviewCustInfo['cust_address'] . " " . $rowviewCustInfo['cust_city'] . " " . $rowviewCustInfo['cust_country'] . " " . $rowviewCustInfo['cust_postalcode']; ?> <br>
                                                           <?php echo $rowviewCustInfo['cust_phone']; ?></p>
              </div>
              <div class="p-4 mt-5 ">
                  <p class="text-muted text-center">TOTAL AMOUNT: </p>
                  <p  class="text-center">  PHP <b> <?php echo $rowviewPendingOrders['order_total']; ?></b> </p> 
              </div>
          </div>
          <div class="d-flex justify-content-end mb-2  ">
              <form action="orders.php" method ="post">
              <input type= "hidden" name="approve-id" value = <?php echo  $orderID;?>>
              <input type="submit" style="width:150px; height:40px;"  name="approve" class="btn btn-success  mx-1" value="Approve"/> <br>
              
              </form>
              <form action="orders.php" method ="post">
              <input type= "hidden" name="cancel-id" value = <?php echo  $orderID;?>>  
              <input type="submit" style="width:150px; height:40px;" name="cancel" class="btn btn-danger mx-1 " value="Cancel"/><br>
              </form>

              <form action="receipt.php" target="_blank" method ="post">
              <input type="hidden" name="hidden-custid" value="<?php echo $custInfo;?>">
              <input type="hidden" name="hidden-orderid" value="<?php echo $orderID;?>">
              <input type="submit" style="width:150px; height:40px;" name="order-receipt" class="btn btn-warning mx-1 " value="Order Receipt"/><br>
              </form>
            </div>
          </div> 

   <?php 
               }
              }
  
              if($_SESSION['user'] !== 'admin'){
                echo "<script>window.location.href ='../login.php'</script>";
                }

?>


