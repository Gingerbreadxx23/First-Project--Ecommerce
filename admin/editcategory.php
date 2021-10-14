<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');

    if(isset($_POST['editcategory'])){
        $editcategory_id = $_POST['editcategory-id'];
        $editcategory_title = $_POST['editcategory-title'];
        $editcategory_image = $_POST['editcategory-image'];
        $editcategory_desc = $_POST['editcategory-desc'];
    }

   ?>   

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                          <div class="row"> <!-- row begin -->
                              <div class="col-lg-12"> <!-- col begin-->
                                  <h1 class="page-header">Edit Product Category Details</h1>

                                  <ol class="breadcrumb"> <!-- brd begin -->
                                      <li class="active">
                                          <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Category/ Edit Product Category
                                      </li>
                                  </ol> <!-- brd fin -->

                              </div><!-- col begin-->
                          </div><!-- row finish -->
                          <div class="container border ">
                            <div class="container-fluid">

                              <form action ="editcategory.php" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="product-category-id" value="<?php echo $editcategory_id; ?>">
                            <div class="form-group m-3">
                              <label for="categorytitle">Product Category Title:</label>
                              <input class="form-control " name="editproduct-title" type="text" placeholder="Insert category title..." value="<?php echo $editcategory_title; ?>" id="categorytitle"  required>
                              <div class="invalid-feedback">
                                    Please input a product category name.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="category-img">Category Image :</label>
                              <img width="70" height="70" src ="./category_images/<?php echo $editcategory_image; ?>" alt= "<?php echo $editcategory_image; ?>"/>
                              <input class="form-control" name="category-image" type="file"   id="category-img" required>
                              <div class="invalid-feedback">
                                    Please upload a product category Image.
                              </div>
 
                            </div>
                            </div>
                            <div class="form-group m-3">
                            <label for="editcategory-desc">Category  Description:</label>
                            <textarea class="form-control" name="editcategory-desc" id="editcategory-desc"  rows="3" required><?php echo $editcategory_desc; ?></textarea>
                            <div class="invalid-feedback">
                                    Please input a product category description.
                              </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary m-3 p-3" name="edit-category"><i class="fas fa-plus"></i> Save Changes</button>
                            </div>
                            </div>
                            </div>
                                </form>
                            </div>
                          </div>
   
   
    <?php   
    
                if(isset($_POST['edit-category'])){ 
                             $newcategory_id = $_POST['category-id'];
                             $newcategory_title = $_POST['editproduct-title'] ;
                             $newcategory_desc = $_POST['editcategory-desc']  ; 

                              $category_image =$_FILES['category-image']['name'];

                              $temp_name =$_FILES['category-image']['tmp_name'];  

                              move_uploaded_file($temp_name,"category_images/$category_image");

                              $queryupdateCategory = "UPDATE products SET  product_category_title = '$newproduct_category_title', product_category_image = '$category_image', product_category_desc = '$newcategory_desc' WHERE product_id= '$newcategory_id'";
                              $sqlupdateCategory = mysqli_query($connection,$queryupdateCategory);
                if($sqlupdateProduct){
                    echo "<script>alert('Successfully Updated')</script>";
                    echo "<script>window.location.href ='./viewcategpry.php'</script>";
                }      
            }         
    ?> 
<?php 
    require('./includes/scripts.php'); 
    require('./includes/session.php');

    if($_SESSION['user'] !== 'admin'){
        echo "<script>window.location.href ='../login.php'</script>";
        }
   ?>