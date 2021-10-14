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
                <h1 class="page-header">View Product Categories</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Product Categories
                        </li>
                    </ol> <!-- brd fin -->
                   
                </div><!-- col fin-->
            </div><!-- row finish -->
                    <div class="row">
                    <?php 
                        $queryviewCategory = "SELECT * FROM product_categories";
                        $sqlviewCategory = mysqli_query($connection,$queryviewCategory);
                        while($rowviewCategory = mysqli_fetch_array($sqlviewCategory)){
                            ?>
                        <div class="col-sm-4">
                        <div class="card shadow-lg bg-white rounded "  style = "width: 100%; height:100%; margin-bottom: 3; " >
                            <div class= "d-flex justify-content-center">
                            <img src="category_images/<?php echo $rowviewCategory['product_category_image'];?> "  alt="" width="60%" height="300">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <form action = "editcategory.php"  method="post" >
                            <button class="btn btn-success px-3" type="submit" name="editcategory" ><i class="fas fa-pencil-alt"></i> Edit</button>
                            <input type="hidden" name="editcategory-id" value="<?php echo $rowviewCategory['product_category_id'];?>">
                            <input type="hidden" name="editcategory-title" value="<?php echo $rowviewCategory['product_category_title'];?>">
                            <input type="hidden" name="editcategory-image" value="<?php echo $rowviewCategory['product_category_image'];?>">
                            <input type="hidden" name="editcategory-desc" value="<?php echo $rowviewCategory['product_category_desc'];?>">
                           </form>
                           <h6 class="card-title"><?php echo $rowviewCategory['product_category_title'];?></h6>
                            <form action="deletecategory.php" method="post">
                            <button type="submit" name="delete-cat"class="btn btn-danger mx-2"><i class="fas fa-trash-alt"></i> Delete</button>
                            <input type ="hidden" name="delete-c-id" value="<?php echo $rowviewCategory['product_category_id'];?>">
                        </form>
                        </div>
                        <div class="container border">
                        <h6>Description: </h6> 
                            <p class="card-text text-justify"><?php echo $rowviewCategory['product_category_desc'];?></p>
                        </div>
                        </div>
                        </div>
                    </div>
                    <?php }?>      
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