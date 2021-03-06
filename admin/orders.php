<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');
   require('./includes/scripts.php'); 

    $Pendingctr;
    $Approvedctr;
    $Processingctr;
    $Ongoingctr;
    $Completedctr;
    $Cancelledctr;
 ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <div class="row"> <!-- row begin -->
                <div class="col-lg-12"> <!-- col begin-->
                    <h1 class="page-header">View Orders</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Orders
                        </li>
                    </ol> <!-- brd fin -->

                </div><!-- col fin-->
            </div><!-- row finish -->

    <div class="container"><!-- row 2 begin -->
                <div class="container-fluid"><!-- col 3 beg -->
                <!-- ORDER COUNTER -->
                <?php
                    $queryPendingctr = "SELECT * FROM orders WHERE order_status= 'pending'";
                    $sqlPendingctr =mysqli_query($connection, $queryPendingctr);
                    $Pendingctr = mysqli_num_rows($sqlPendingctr);

                    $queryApprovedctr = "SELECT * FROM orders WHERE order_status= 'approved'";
                    $sqlApprovedctr =mysqli_query($connection, $queryApprovedctr);
                    $Approvedctr = mysqli_num_rows($sqlApprovedctr);

                    $queryProcessingctr = "SELECT * FROM orders WHERE order_status= 'processing'";
                    $sqlProcessingctr =mysqli_query($connection, $queryProcessingctr);
                    $Processingctr = mysqli_num_rows($sqlProcessingctr);

                    $queryOngoingctr = "SELECT * FROM orders WHERE order_status= 'shipped'";
                    $sqlOngoingctr =mysqli_query($connection, $queryOngoingctr);
                    $Ongoingctr = mysqli_num_rows($sqlOngoingctr);

                    $queryCompletedctr = "SELECT * FROM orders WHERE order_status= 'completed'";
                    $sqlCompletedctr =mysqli_query($connection, $queryCompletedctr);
                    $Completedctr = mysqli_num_rows($sqlCompletedctr);

                    $queryCancelledctr = "SELECT * FROM orders WHERE order_status= 'cancelled'";
                    $sqlCancelledctr =mysqli_query($connection, $queryCancelledctr);
                    $Cancelledctr = mysqli_num_rows($sqlCancelledctr);

                ?>
                <form action="orders.php" method= "post">
                    <input type="submit" style="width: 170px;" name="pending-orders" class="btn btn-secondary" value="Pending Orders (<?php echo  $Pendingctr; ?>)">
                    <input type="submit" style="width: 170px;" name="approved-orders" class="btn btn-primary" value="Approved Orders (<?php echo  $Approvedctr; ?>)"/>
                    <input type="submit" style="width: 170px;" name="processing-orders" class="btn btn-primary" value="Processing Orders (<?php echo  $Processingctr; ?>)"/>
                    <input type="submit" style="width: 170px;" name="ongoing-orders" class="btn btn-primary" value="Ongoing Orders (<?php echo  $Ongoingctr; ?>)"/>
                    <input type="submit" style="width: 170px;" name="completed-orders" class="btn btn-success" value="Completed Orders (<?php echo  $Completedctr; ?>)"/>
                    <input type="submit" style="width: 170px;" name="cancelled-orders"class="btn btn-danger" value="Cancelled Orders (<?php echo  $Cancelledctr; ?>)"/>
                </form>
                </div>
                <div class="container-fluid ">
                    <?php 
                     
                        if(isset($_POST['pending-orders'])){
                            require ('./pendingorders.php');
                            
                        }
                        elseif(isset($_POST['approved-orders'])){
                            require ('./approvedorders.php');
                        }
                        elseif(isset($_POST['processing-orders'])){
                            require ('./processingorders.php');
                        }
                        elseif(isset($_POST['ongoing-orders'])){
                            require ('./ongoingorders.php');
                        }
                        elseif(isset($_POST['completed-orders'])){
                            require ('./completedorders.php');
                        }
                        elseif(isset($_POST['cancelled-orders'])){
                            require ('./cancelledorders.php');
                        }
                        else{
                            require ('./pendingorders.php');
                        }

                    ?>
                </div>

                
    </div>
     
<?php 
// PENDING APPROVE BUTTON
    if(isset($_POST['approve'])){
        $ordercode=  $_POST['approve-id'];
        $queryApprove = "UPDATE orders SET order_status= 'approved' WHERE order_id= $ordercode";
        $sqlApprove = mysqli_query($connection, $queryApprove);
    
        if($sqlApprove){
         echo ' <script>   swal({
                            title: "Order Approved! ",
                            text: "You have approved an order successfully",
                            icon: "success",
                            button: false,  
                            timer :2000,
                          }).then(function() {
                            window.location = "orders.php";
                        });
                          </script> ';
        }
      } 
// PENDING CANCEL BUTTON
      if(isset($_POST['cancel'])){
        $ordercode=  $_POST['cancel-id'];
        $queryCancel = "UPDATE orders SET order_status= 'cancelled' WHERE order_id = $ordercode";
        $sqlCancel = mysqli_query($connection, $queryCancel);
    
        if($sqlCancel){
            echo   ' <script>   swal({
                title: "Order Cancelled! ",
                text: "You have cancelled an order successfully",
                icon: "success",
                button: false,  
                timer :2000,
              }).then(function() {
                window.location = "orders.php";
            });
              </script> ';
        }
      } 
//APPROVED PROCESS BUTTON
       if(isset($_POST['process'])){
        $ordercode=  $_POST['process-id'];
        $queryProcess = "UPDATE orders SET order_status= 'processing' WHERE order_id = $ordercode";
        $sqlProcess = mysqli_query($connection, $queryProcess);
    
        if($sqlProcess){
            echo   ' <script>   swal({
                title: "Order Proccessed! ",
                text: "Order is being processed",
                icon: "success",
                button: false,  
                timer :2000,
              }).then(function() {
                window.location = "orders.php";
            });
              </script> ';

        //   FOR INVENTORY 
        $newquantity =0;
        $oldquantity = 0;
        $querygetorderQ = "SELECT * FROM order_items WHERE order_id = '$ordercode'";
        $sqlgetorderQ = mysqli_query($connection,$querygetorderQ);
        while ($rowgetorderQ = mysqli_fetch_array($sqlgetorderQ)){
                $prodid = $rowgetorderQ['product_id'];
                $orderQ = $rowgetorderQ['order_item_quantity'];
                $orderV = $rowgetorderQ['order_item_variation'];

            $querygetItem = "SELECT * FROM product_item WHERE product_id='$prodid' AND product_item_variation ='$orderV'";
            $sqlgetItem = mysqli_query($connection,$querygetItem);
            $rowgetItem =mysqli_fetch_array($sqlgetItem);
            $oldquantity  = $rowgetItem['product_item_quantity'];

             $newquantity = $oldquantity-$orderQ;
              $querynewQ = "UPDATE product_item SET product_item_quantity=' $newquantity' WHERE product_id='$prodid' AND product_item_variation ='$orderV'";
              $sqlnewQ = mysqli_query($connection,$querynewQ);
        }
        }
      } 
//PROCESSING SHIPPED BUTTON
if(isset($_POST['shipped'])){
    $ordercode=  $_POST['shipped-id'];
    $queryShipped = "UPDATE orders SET order_status= 'shipped' WHERE order_id = $ordercode";
    $sqlShipped = mysqli_query($connection, $queryShipped);

    if($sqlShipped){
      echo  ' <script>   swal({
            title: "Order Shipped! ",
            text: "You have shipped an order successfully",
            icon: "success",
            button: false,  
            timer :2000,
          }).then(function() {
            window.location = "orders.php";
        });
          </script> ';
    }
  } 
//ONGOING COMPLETE BUTTON
if(isset($_POST['complete'])){
    $ordercode=  $_POST['complete-id'];
    $queryComplete = "UPDATE orders SET order_status= 'completed' WHERE order_id = $ordercode";
    $sqlComplete = mysqli_query($connection, $queryComplete);

    if($sqlComplete){
        echo   ' <script>   swal({
            title: "Order Completed! ",
            text: "You have completed an order successfully",
            icon: "success",
            button: false,  
            timer :2000,
          }).then(function() {
            window.location = "orders.php";
        });
          </script> ';
    }
  } 
 require('./includes/session.php');
 // AVOID ACCESS FROM ACCOUNTS
if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>