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
                    <h1 class="page-header">Inventory Master</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>Inventory
                        </li>
                    </ol> <!-- brd fin -->

                </div><!-- col fin-->
            </div><!-- row finish -->
           

                <div class="container-fluid"><!-- col 3 beg -->
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Stocks
                </div>
                <div class="card-body">
                <table class="table table-hover table-bordered table-responsive" id="datatablesSimple">
                    <thead> 
                        <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Product Availability</th>
                        <th scope="col">Category</th>
                        <th scope="col">Variation & Stock</th>

                        
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //products database
                            $viewpctr =1;
                            $querypInventory = "SELECT * FROM products";
                            $sqlpInventory = mysqli_query($connection, $querypInventory);
                            while($rowpInventory = mysqli_fetch_array($sqlpInventory)){
                                $cat_id = $rowpInventory['product_category_id'];
                                $pro_id = $rowpInventory['product_id'];

                            ?>
                                <tr>
                                <td><?php echo $viewpctr; ?></td>
                                <td><img src="product_images/<?php echo $rowpInventory['product_img1'];?>" width="80" height="80"></td>
                                <td><?php echo $rowpInventory['product_name'];?></td>
                             <?php   $badgecolor1;
                                       $coloravail1= $rowpInventory['product_availability'];
                                       if($coloravail1 == "Available") {
                                           $badgecolor1 = "success";
                                       }else{
                                           $badgecolor1= "danger";
                                       }
                            ?>
                                <td><span  class="badge alert-<?php echo $badgecolor1; ?>"><?php echo $rowpInventory['product_availability'];?></span></td>

                               
                                <?php 
                                //product_category database
                                $queryCategory = "SELECT * FROM product_categories WHERE product_category_id = '$cat_id'";
                                     $sqlCategory = mysqli_query($connection, $queryCategory);
                                     $rowviewCategory =mysqli_fetch_array($sqlCategory);
                               ?>
                                <td><?php echo $rowviewCategory['product_category_title']?></td>

                                <td>
                                          <?php
                                          //product_item database
                                          $querypItemVariation ="SELECT * FROM product_item WHERE product_ID= '$pro_id'";
                                                 $sqlpItemVariation = mysqli_query($connection,$querypItemVariation);
                                               while( $rowpItemVariation = mysqli_fetch_array($sqlpItemVariation)){
                                                $productVariation = $rowpItemVariation['product_item_variation'];
                                                    
                                                
                                                echo $rowpItemVariation['product_item_variation'] . ":" ;      
                                          ?> 
                                           
                                         <?php 
                                         //product_item_quantity database
                                                $querypItemQuantity ="SELECT * FROM product_item WHERE product_ID= '$pro_id'AND product_item_variation = '$productVariation'";
                                                $sqlpItemQuantity = mysqli_query($connection,$querypItemQuantity);
                                                $rowpItemQuantity =mysqli_fetch_array($sqlpItemQuantity);
                                              
                                            

                                             //Variation Low-stock notif
                                             $notif;
                                             $stockcolor;
                                             if ( $rowpItemQuantity ['product_item_quantity'] <= 3){
                                                 $notif = "Low stocks";
                                                 $stockcolor= "warning";
                                             }else if ($rowpItemQuantity ['product_item_quantity'] == 0 ) {
                                                $notif = "No stock available";
                                                $stockcolor ="danger";
                                             }else{
                                                 $notif = "In-stock";
                                                 $stockcolor ="success";
                                             }

                                             

                                             echo $rowpItemQuantity ['product_item_quantity'] ." " ;
                                            
                                            ?>
                                            <span class= "badge alert-<?php echo $stockcolor;?>"><?php  echo $notif  ?></span> <br>
                                                
                                           <?php  } ?>
                                      </td>  
                                         
                                     <td>
                                           <div class="btn-group">
                                               <button class="btn btn-secondary btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                               </button>
                                               <div class="dropdown-menu">
                                                 <form>
                                                     <input class="dropdown-item" type="submit" value="Add stock">
                                                     <input class="dropdown-item" type="submit" value="Make product unavailable">
                                                 </form>
                                               </div>
                                          </div>
                                    </td>
                                     </tr>  
                                     <?php   
                            $viewpctr++;  
                           }
                        ?>    
                       
                </div><!-- col 3 fin -->
               

                    </div><!-- panel header fin-->
                    
                </div>
        </main>
        
</div>                
<?php 
 require('./includes/scripts.php'); 
 require('./includes/session.php');

 if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>
