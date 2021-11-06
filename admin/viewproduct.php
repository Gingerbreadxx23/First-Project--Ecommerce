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
                    <h1 class="page-header">View Products</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Products
                        </li>
                    </ol> <!-- brd fin -->

                </div><!-- col fin-->
            </div><!-- row finish -->

            
                <div class="container-fluid"><!-- col 3 beg -->
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Products
                </div>
                <div class="card-body">
                <table class="table table-hover table-bordered table-responsive" id="datatablesSimple">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        </tr>
                    </thead>
                     <tbody>
                       <?php 
                             $viewpctr =1;
                             $queryviewProduct= "SELECT * FROM products";
                             $sqlviewProduct = mysqli_query($connection,$queryviewProduct);
                             while($rowviewProduct =mysqli_fetch_array($sqlviewProduct)){
                                 $cat_id = $rowviewProduct['product_category_id'];
                             ?>
                                <tr>
                                  <td><?php echo $viewpctr;?></td>
                                  <td><?php echo $rowviewProduct['product_id'];?></td>
                                <td><?php echo $rowviewProduct['product_name'];?></td>
                             <?php   $queryCategory = "SELECT * FROM product_categories WHERE product_category_id = '$cat_id'";
                                     $sqlCategory = mysqli_query($connection, $queryCategory);
                                     $rowviewCategory =mysqli_fetch_array($sqlCategory);
                               ?>
                                 <td><?php echo $rowviewCategory['product_category_title'];?></td>
                                 <!-- OUT OF STOCK SETTINGS   -->
                                 <td><?php 
                                    $badgecolor;
                                       $coloravail= $rowviewProduct['product_availability'];
                                       if($coloravail == "Available") {
                                           $badgecolor = "success";
                                       }else{
                                           $badgecolor= "danger";
                                       }
                                 ?>
                                 <span class="badge alert-<?php echo $badgecolor; ?>"><?php echo $rowviewProduct['product_availability']; ?></span>
                                </td>

                                 <!-- OUT OF STOCK END-->
                                 <td><?php echo $rowviewProduct['product_date'];?></td>
                                 <td><img src="product_images/<?php echo $rowviewProduct['product_img1'];?>" width="80" height="80"></td>
                                 </div>
                                 <td><?php echo $rowviewProduct['product_price'];?></td>
                                 <td><?php echo $rowviewProduct['product_desc'];?></td>
                                 <td>
                                     <form action="editproduct.php" method="post">
                                         <button class= "btn btn-success px-4" type="submit" name="editproduct"> Edit</button>
                                         <input type="hidden" name="editproduct-id" value="<?php echo $rowviewProduct['product_id'];?>">
                                         <input type="hidden" name="editproduct-cat" value="<?php echo $rowviewCategory['product_category_title'];?>">
                                         <input type="hidden" name="editproduct-cat-id" value="<?php echo $rowviewCategory['product_category_id'];?>">
                                         <input type="hidden" name="editproduct-name" value="<?php echo $rowviewProduct['product_name'];?>">
                                         <input type="hidden" name="editproduct-image1" value="<?php echo $rowviewProduct['product_img1'];?>">
                                         <input type="hidden" name="editproduct-image2" value="<?php echo $rowviewProduct['product_img2'];?>">
                                         <input type="hidden" name="editproduct-image3" value="<?php echo $rowviewProduct['product_img3'];?>">
                                         <input type="hidden" name="editproduct-price" value="<?php echo $rowviewProduct['product_price'];?>">
                                         <input type="hidden" name="editproduct-desc" value="<?php echo $rowviewProduct ['product_desc'];?>">
                                        
                                     </form>
                                </td>
                                 <!-- DELETE -->
                                 <td><form action="deleteproduct.php" method="post">
                                    <input class=" btn btn-danger px-3" type="submit" name="delete-product" value="Delete">
                                    <input type="hidden" name="delete-ID" value="<?php echo $rowviewProduct['product_id']?>">
                                </form> 
                                 </td> 
                                </tr>

                         <?php $viewpctr++;   } ?>
                            </tbody> 
                    </table>
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