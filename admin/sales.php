<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');



   ?>
    

             <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                    <div class="row"> <!-- row begin -->
                        <div class="col-lg-12"> <!-- col begin-->
                            <h1 class="page-header">Sales</h1>

                            <ol class="breadcrumb"> <!-- brd begin -->
                                <li class="active">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard/ <i class="fas fa-money-bill-wave"></i>Sales
                                </li>
                            </ol> <!-- brd fin -->

                        </div><!-- col begin-->
                    </div><!-- row finish -->
                    <div class="row"><!-- row 2 begin -->
                        <div class="col-lg-3 col-md-6"><!-- col 2 beg -->
                            <div class="panel panel-primary"><!-- panel primary beg-->
                            
                            <div class="panel-header"><!-- panel header beg-->

                                <div class="row"><!-- row 3 begin -->

                                    <div class="col-xs-3"><!-- col 3 beg -->
                                        <div class="card bg-primary text-white mb-4"> <!-- card beg-->
                                            <div class="card-body"><i class="fas fa-cubes"></i> Total Sales <div style= "font-size:3em;">
                                            
                                            <!-- TOTAL SALESSSS -->

                                            <?php 
                                                    $Totalsales =0;
                                                    $queryTotalsales = "SELECT order_total FROM orders WHERE order_status ='completed'" ;
                                                    $sqlTotalsales = mysqli_query($connection, $queryTotalsales);
                                                while($rowTotalsales = mysqli_fetch_array($sqlTotalsales)){

                                                    $Totalsales = $Totalsales + $rowTotalsales['order_total'];
                                                }
                                            ?>
                                            &#8369;  <?php echo number_format($Totalsales);?></div></div>
                                        </div>  
                                    </div><!-- col 3 fin -->

                                    
                                </div><!-- row 2 fin -->
                            </div><!-- panel header fin-->
                            </div> <!-- panel primary fin -->

                        <!-- SECOND CARD -->

                        </div><!-- col 2 fin -->
                        <div class="col-lg-3 col-md-6"><!-- col 2 beg -->
                            <div class="panel panel-primary"><!-- panel primary beg-->
                            
                            <div class="panel-header"><!-- panel header beg-->

                                <div class="row"><!-- row 3 begin -->

                                    <div class="col-xs-3"><!-- col 3 beg -->
                                        <div class="card bg-success text-white mb-4"> <!-- card beg-->
                                        <div class="card-body"><i class="fas fa-users"></i> Orders Received <div style= "font-size:3em;">
                                        
                                        <!-- ORDERS RECEIVED  -->
                                        <?php 
                                            $Ordersreceived = 0;
                                            $queryOrdersreceived = "SELECT * FROM orders WHERE order_status NOT IN ('cancelled')";
                                            $sqlOrdersreceived = mysqli_query($connection, $queryOrdersreceived);
                                            $Ordersreceived = mysqli_num_rows($sqlOrdersreceived);
                                        ?>
                                            <?php  echo number_format($Ordersreceived);?>
                                        </div></div>
                                        </div>  
                                    </div><!-- col 3 fin -->

                                    
                                </div><!-- row 2 fin -->
                            </div><!-- panel header fin-->
                            </div> <!-- panel primary fin -->

                            <!-- THIRD CARD ---->
                            </div><!-- col 2 fin -->

                                <div class="row">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Sales
                                                </div>
                                                <div class="card-body">
                                                    <table id="datatablesSimple">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Order Code</th>
                                                                            <th> Product Ordered </th>
                                                                            <th>Date</th>
                                                                            <th>Total Sales</th>
                                                                        </tr>
                                                                     </thead>
                                                                    <tbody>
                                                                    <!-- ORDERS DATABASE  -->
                                                                    <?php 
                                                                        $salesctr = 1;
                                                                        $querysalesOrder = "SELECT * FROM orders WHERE order_status = 'completed'";
                                                                        $sqlsalesOrder = mysqli_query($connection, $querysalesOrder);
                                                                        while($rowsalesOrder = mysqli_fetch_array($sqlsalesOrder)){
                                                                            $salesorderID = $rowsalesOrder['order_id'];
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php  echo $salesctr;?></td>
                                                                            <td><?php echo str_pad($salesorderID, 8 ,0, STR_PAD_LEFT);  ?></td>
                                                                            <!-- order item -->
                                                                            <td>
                                                                            <?php 
                                                                                $querysalesitem = "SELECT * FROM order_items WHERE order_id = '$salesorderID'";
                                                                                $sqlsalesitem = mysqli_query($connection,$querysalesitem);
                                                                                while($rowsalesitem = mysqli_fetch_array($sqlsalesitem)){
                                                                                   $productID = $rowsalesitem['product_id'];

                                                                                // ORDERED PRODUCT
                                                                                $queryproductitem = "SELECT product_name FROM products WHERE product_id ='$productID'";
                                                                                $sqlproductitem = mysqli_query($connection,$queryproductitem);
                                                                                $rowproductitem = mysqli_fetch_array($sqlproductitem);
                                                                            ?>
                                                                           <?php echo $rowproductitem['product_name']; ?> 
                                                                            <?php echo " - " . " (" .$rowsalesitem['order_item_quantity'] . " pc/s)"; ?> <br>
                                                                            <?php }?>
                                                                            </td>
                                                                            <td><?php echo $rowsalesOrder['order_date'];?></td>
                                                                            <td><?php echo number_format($rowsalesOrder['order_total']);?></td>
                                                                        </tr>
                                                                    <?php $salesctr++; } ?>
                                                                    </tbody> 
                                                
                                                </table>
                                            </div> 
                </main>
            </div>
        </div> 
    
        
<?php 
require('./includes/scripts.php'); 
require('./includes/session.php');

// AVOID ACCESS FROM ACCOUNTS
if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
}

?>