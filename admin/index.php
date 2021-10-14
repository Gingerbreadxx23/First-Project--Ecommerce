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
                            <h1 class="page-header">Dashboard</h1>

                            <ol class="breadcrumb"> <!-- brd begin -->
                                <li class="active">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
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
                                            <div class="card-body"><i class="fas fa-cubes"></i> Products <div> 
                                                <?php
                                                $queryctProduct ="SELECT * FROM products" ;
                                                $sqlctProduct = mysqli_query($connection, $queryctProduct);
                                                $productctr =mysqli_num_rows($sqlctProduct);

                                                echo $productctr;

                                                ?></div></div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="index.php?view_products">View Details</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
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
                                        <div class="card bg-warning text-white mb-4"> <!-- card beg-->
                                        <div class="card-body"><i class="fas fa-users"></i> Customers <div> 
                                        <?php
                                                $queryctCustomers ="SELECT * FROM customers" ;
                                                $sqlctCustomers = mysqli_query($connection, $queryctCustomers);
                                                $Customerctr =mysqli_num_rows($sqlctCustomers);

                                                echo $Customerctr;

                                                ?>
                                        </div></div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="index.php?view_customers">View Details</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                        </div>  
                                    </div><!-- col 3 fin -->

                                    
                                </div><!-- row 2 fin -->
                            </div><!-- panel header fin-->
                            </div> <!-- panel primary fin -->

                            <!-- THIRD CARD ---->
                            </div><!-- col 2 fin -->
                        <div class="col-lg-3 col-md-6"><!-- col 2 beg -->
                            <div class="panel panel-primary"><!-- panel primary beg-->
                            
                            <div class="panel-header"><!-- panel header beg-->

                                <div class="row"><!-- row 3 begin -->

                                    <div class="col-xs-3"><!-- col 3 beg -->
                                        <div class="card bg-success text-white mb-4"> <!-- card beg-->
                                        <div class="card-body"><i class="fas fa-tags"></i> Product Categories <div class="huge">
                                        <?php
                                                $queryctProductcat ="SELECT * FROM product_categories" ;
                                                $sqlctProductcat = mysqli_query($connection, $queryctProductcat);
                                                $productcatctr =mysqli_num_rows($sqlctProductcat);

                                                echo $productcatctr;

                                                ?>
                                        </div></div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="index.php?view_productcategories">View Details</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                        </div>  
                                    </div><!-- col 3 fin -->

                                    
                                </div><!-- row 2 fin -->
                            </div><!-- panel header fin-->
                            </div> <!-- panel primary fin -->

                            <!-- FOURTH CARD -->
                            </div><!-- col 2 fin -->
                        <div class="col-lg-3 col-md-6"><!-- col 2 beg -->
                            <div class="panel panel-primary"><!-- panel primary beg-->
                            
                            <div class="panel-header"><!-- panel header beg-->

                                <div class="row"><!-- row 3 begin -->

                                    <div class="col-xs-3"><!-- col 3 beg -->
                                        <div class="card bg-danger text-white mb-4"> <!-- card beg-->
                                        <div class="card-body"><i class="fas fa-clipboard-list"></i> Orders <div> 25</div></div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="index.php?view_orders">View Details</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                        </div>  
                                    </div><!-- col 3 fin -->

                                    
                                </div><!-- row 2 fin -->
                            </div><!-- panel header fin-->
                            </div> <!-- panel primary fin -->

                        </div><!-- col 2 fin -->
                    </div><!-- row 2 fin -->
                                <div class="row">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Details
                                                </div>
                                                <div class="card-body">
                                                    <table id="datatablesSimple">
                                                        <?php 
                                                            if(isset($_GET['view_products'])){
                                                                $viewpctr =1;
                                                                $queryviewProduct= "SELECT * FROM products";
                                                                $sqlviewProduct = mysqli_query($connection,$queryviewProduct); ?>
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product ID</th>
                                                                        <th>Name</th>
                                                                        <th>Category</th>
                                                                        <th>Date</th>
                                                                        <th>Image</th>
                                                                        <th>Description</th>
                                                                        <th>Keyword</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> <?php
                                                                while($rowviewProduct =mysqli_fetch_array($sqlviewProduct)){
                                                                    $cat_id = $rowviewProduct['product_category_id'];
                                                                ?>
                                                                    <tr>
                                                                    <td><?php echo $viewpctr;?></td>
                                                                    <td><?php echo $rowviewProduct['product_name'];?></td>
                                                                    <?php   $queryCategory = "SELECT * FROM product_categories WHERE product_category_id = '$cat_id'";
                                                                            $sqlCategory = mysqli_query($connection, $queryCategory);
                                                                            $rowviewCategory =mysqli_fetch_array($sqlCategory);
                                                                    ?>
                                                                    <td><?php echo $rowviewCategory['product_category_title'];?></td>
                                                                    <td><?php echo $rowviewProduct['product_date'];?></td>
                                                                    <td><img src="product_images/<?php echo $rowviewProduct['product_img1'];?>" width="80" height="80"></td>
                                                                    </div>
                                                                    <td><?php echo $rowviewProduct['product_desc'];?></td>
                                                                    <td><?php echo $rowviewProduct['product_keyword'];?></td>
                                                                    </tr>

                                                            <?php $viewpctr++;   }
                                                            } else if(isset($_GET['view_customers'])){  
                                                                $viewpctr =1;
                                                                $queryviewCustomer= "SELECT * FROM customers";
                                                                $sqlviewCustomer = mysqli_query($connection,$queryviewCustomer);
                                                                ?>
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Customer ID</th>
                                                                        <th>First Name</th>
                                                                        <th>Last Name</th>
                                                                        <th>Email</th>
                                                                        <th>Phone Number</th>
                                                                        <th>Address</th>
                                                                        <th>City</th>
                                                                        <th>Country</th>
                                                                        <th>Postal Code</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> <?php
                                                                while($rowviewCustomer =mysqli_fetch_array($sqlviewCustomer)){
                                                                    ?>
                                                                    <tr>
                                                                      <td><?php echo $viewpctr;?></td>
                                                                    <td><?php echo $rowviewCustomer['cust_firstName'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_lastName'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_email'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_phone'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_address'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_city'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_country'];?></td>
                                                                     <td><?php echo $rowviewCustomer['cust_postalcode'];?></td>
                                                                    </tr>
                                    
                                                             <?php $viewpctr++;   } 
                                                             }else if(isset($_GET['view_productcategories'])){
                                                                $viewpctr =1;
                                                                $queryviewCategory = "SELECT * FROM product_categories";
                                                                $sqlviewCategory = mysqli_query($connection,$queryviewCategory);
                                                                ?>
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Category ID</th>
                                                                        <th>Title</th>
                                                                        <th>Description</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> <?php
                                                                while($rowviewCategory = mysqli_fetch_array($sqlviewCategory)){
                                                                    ?>
                                                                    <tr>
                                                                      <td><?php echo $viewpctr;?></td>
                                                                    <td><?php echo $rowviewCategory['product_category_title'];?></td>
                                                                     <td><?php echo $rowviewCategory['product_category_desc'];?></td>
                                                                </tr>
                                                                <?php $viewpctr++;   } 
                                                             }
                                                             
                                                             ?>
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