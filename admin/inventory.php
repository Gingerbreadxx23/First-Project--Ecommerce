<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');
   require('./includes/scripts.php'); 


  
 ?>
 <script type = "text/javascript">
     $(document).ready(function(){

            var html = '<tr><td><input type="text" class="form-control" name="txtVariation[]" required= ""></td><td><input type="number"  class="form-control" name="txtStock[]" required= ""></td><td><input type="button"  class="btn btn-danger" name="remove" id="remove" value= "Remove"></td></tr>';


            var max= 5;
            var x=1;

            $("#add").click(function(){
                  if (x <= max) {
                    $("#table-field").append(html);
                    x++;    
                  }
            });
            $("#table-field").on('click', '#remove', function(){
                    $(this).closest('tr').remove();
                    x--;
            });
     });

 </script>          
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

            <div class = "container border mb-5 shadow p-3 mb-5 bg-white rounded"  >
            <div class="container-fluid">
                <form class="insert-form" id="insert-form" method="post" action="">
                <div class="input-field">
                    <table class="table" id="table-field">
                        <tr>
                            <td class = "" > <b> SELECT THE PRODUCT YOU WANT TO ADD A VARIATION & STOCK:</b></td>
                            <td colspan = "2"> <select class = "form-control" name="Inv_product" required>
                            <option value="" disabled selected>Select Product</option>
                                <?php 
                                    $querygetPro = "SELECT * FROM products";
                                    $sqlgetPro = mysqli_query($connection, $querygetPro);
                                    while($rowgetPro = mysqli_fetch_array($sqlgetPro)){
                                            $product_id = $rowgetPro['product_id'];
                                            $product_name = $rowgetPro['product_name'];
                                ?>
                                        <option value="<?php echo $product_id; ?>"><?php echo $product_name; ?></option>
                                <?php
                                    }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <th>Variation</th>
                            <th>Stock</th>
                            <th>Add or Remove</th>
                        </tr>
                      
                        <!-- ADD VARIATION STOCK SHITS -->
                        <?php 
                            if(isset($_POST['save'])){
                                $txtVariation = $_POST['txtVariation'];
                                $txtStock = $_POST['txtStock'];
                                $Inv_product = $_POST['Inv_product'];

                                foreach ($txtVariation as $key => $value) {
                                    $querySave ="INSERT INTO product_item(product_item_id,product_id,product_item_variation,product_item_quantity)VALUES(null, '$Inv_product', '".$value."', '".$txtStock[$key]."')";

                                    $sqlSave = mysqli_query($connection, $querySave);

                                    if($sqlSave){
                                        echo ' <script>   swal({
                                            title: "Data Saved! ",
                                            text: "The variation & stock is saved successfully.",
                                            icon: "success",
                                            button: false,  
                                            timer :1700,
                                          }); 
                                          </script> ';
                                    }
                                }
                            }
                        ?>
                      
                        <tr>
                            <td><input type="text" class="form-control" name="txtVariation[]" required= ""></td>
                            <td><input type="number"  class="form-control" name="txtStock[]" required= ""></td>
                            <td><input type="button" class="btn btn-primary px-4" id="add" name = "add" value= "Add"></td>
                        </tr>
                    </table>
                    <center>
                    <input type="submit"  class="btn btn-success mb-3" name="save" id="save" value= "Save Data">
                    </center>
                </div>
                                </form>
            </div>
            </div>
           

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
                                            <form action="addstock.php" method="post" >
                                                     <input class="btn btn-primary"  name = "add-stock" type="submit"  value="Add stock">
                                                     <input type="hidden" name="add-proid" value="<?php echo $pro_id ;?>">
                                            </form>
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
 require('./includes/session.php');

 if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>
