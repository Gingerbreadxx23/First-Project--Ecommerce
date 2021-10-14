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
                                  <h1 class="page-header">Insert Product Category</h1>

                                  <ol class="breadcrumb"> <!-- brd begin -->
                                      <li class="active">
                                          <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>Insert Product Category
                                      </li>
                                  </ol> <!-- brd fin -->

                              </div><!-- col begin-->
                          </div><!-- row finish -->

                          <div class="container border ">
                            <div class="container-fluid">

                              <form action ="insertcategory.php" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                            <div class="form-group m-3">
                              <label for="categorytitle">Product  Category Name:</label>
                              <input class="form-control " name="category-title" type="text" placeholder="Insert category title..." id="categorytitle" required>
                              <div class="invalid-feedback">
                                    Please input a product category name.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="product-img2">Product Category Image :</label>
                              <input class="form-control" name="category-image" type="file"  id="category-image" required >
                              <div class="invalid-feedback">
                                    Please upload a product Image.
                              </div>
                            </div>
                            <div class="form-group m-3">
                            <label for="category-desc">Product Category Description:</label>
                            <textarea class="form-control" name="category-desc" id="category-desc" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                    Please input a product category description.
                              </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary m-3 p-3" name="add-category"><i class="fas fa-plus"></i> Add Product category</button>
                            </div>
                            </div>
                            </div>
                                </form>
                            </div>
                        </main>
                          </div>
                         <?php  if(isset($_POST['add-category'])){ 
                             
                             $category_title = $_POST['category-title'] ;
                             $category_desc = $_POST['category-desc']  ; 

                              $category_image =$_FILES['category-image']['name'];

                              $temp_name =$_FILES['category-image']['tmp_name'];  

                              move_uploaded_file($temp_name,"category_images/$category_image");
                             

                             $queryaddCategory ="INSERT INTO product_categories VALUES (null,'$category_title','$category_image','$category_desc')";
                             $sqladdCategory = mysqli_query($connection, $queryaddCategory);
                            
                             if($sqladdCategory){
                              echo "<script>alert('Successfully Added!')</script>";
                              echo "<script>window.location.href ='./insertcategory.php'</script>";
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