<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');
   require('./includes/scripts.php');

 ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                          <div class="row"> <!-- row begin -->
                              <div class="col-lg-12"> <!-- col begin-->
                                  <h1 class="page-header">Insert Product</h1>

                                  <ol class="breadcrumb"> <!-- brd begin -->
                                      <li class="active">
                                          <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>Insert Product
                                      </li>
                                  </ol> <!-- brd fin -->

                              </div><!-- col begin-->
                          </div><!-- row finish -->

                          <div class="container border ">
                            <div class="container-fluid">

                              <form action ="insertproduct.php" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                            <div class="form-group m-3">
                              <label for="producttitle">Product Title:</label>
                              <input class="form-control " name="product-title" type="text" placeholder="Insert product title..." id="producttitle" required>
                              <div class="invalid-feedback">
                                    Please input a product name.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="select category">Select Category:</label>
                              <select class="form-control" id="selectcategory" name="select-category" placeholder ="Select Category" required>
                              <option value="" disabled selected>Select Category</option>
                              <?php 
                              $queryCategory = "SELECT * FROM product_categories;";
                              $sqlCategory = mysqli_query($connection, $queryCategory);

                              while($rowCategory=mysqli_fetch_array($sqlCategory)){
                                    $product_cat_id = $rowCategory['product_category_id'];
                                ?>
                                <option value= "<?php echo $product_cat_id;?>"><?php echo $rowCategory['product_category_title']; ?></option>
                            <?php   }  ?>
                              </select>
                              <div class="invalid-feedback">
                                    Please select a product category.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="product-img1">Product Image 1:</label>
                              <input class="form-control" name="product-image1" type="file"  id="product-img1" required>
                              <div class="invalid-feedback">
                                    Please upload a product Image.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="product-img2">Product Image 2:</label>
                              <input class="form-control" name="product-image2" type="file"  id="product-img2" >
                              <div class="invalid-feedback">
                                    Please upload a product Image.
                              </div>
                            </div>
                            <div class="form-group m-3">
                             <label for="product-img3">Product Image 3:</label>
                             <input class="form-control"name="product-image3" type="file"  id="product-img3"   >
                             <div class="invalid-feedback">
                                    Please upload a product Image.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="product-price">Product Price:</label>
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                            </div>
                            <input type="text" class="form-control" name="product-price" aria-label="Amount "id="product-price" required>
                            <div class="input-group-append">
                              <span class="input-group-text">.00</span>
                            </div>
                            <div class="invalid-feedback">
                                    Please input a product price.
                              </div>
                          </div>
                              </div>
                            <div class="form-group m-3">
                            <label for="product-desc">Product Description:</label>
                            <textarea class="form-control" name="product-desc" id="product-desc" rows="3" required></textarea>
                            <div class="invalid-feedback">
                                    Please input a product description.
                              </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary m-3 p-3" name="add-product"><i class="fas fa-plus"></i> Add Product</button>
                            </div>
                            </div>
                            </div>
                                </form>
                            </div>
                          </div>
                          <?php 
                            
                            if(isset($_POST['add-product'])){
                              $p_cat_id = $_POST['select-category'];
                              $product_name=$_POST['product-title'];
                              $product_availability = "Available";
                              $product_price = $_POST['product-price'];
                              $product_desc = $_POST['product-desc'];
                              $product_img1= $_FILES['product-image1']['name'];
                              $product_img2= $_FILES['product-image2']['name'];
                              $product_img3= $_FILES['product-image3']['name'];
                            

                              $temp_name1 = $_FILES['product-image1']['tmp_name'];
                              $temp_name2 = $_FILES['product-image2']['tmp_name'];
                              $temp_name3 = $_FILES['product-image3']['tmp_name'];

                              move_uploaded_file($temp_name1,"product_images/$product_img1");
                              move_uploaded_file($temp_name2,"product_images/$product_img2");
                              move_uploaded_file($temp_name3,"product_images/$product_img3");

                               $queryaddProduct = "INSERT INTO products VALUES (null, '$p_cat_id','$product_name','$product_availability', CURRENT_TIMESTAMP,'$product_img1','$product_img2','$product_img3','$product_price','$product_desc')";
                              $sqladdProduct =mysqli_query($connection,$queryaddProduct);
                            
                              if($sqladdProduct){
                                echo ' <script>   swal({
                                  title: "Successfully Added! ",
                                  text: "You have addded a product successfully",
                                  icon: "success",
                                  button: false,  
                                  timer :2000,
                                }).then(function() {
                                  window.location = "viewproduct.php";
                              });
                                </script> ';
                            }
                             }
                           ?>


<?php 
 
 require('./includes/session.php');
   
 if($_SESSION['user'] !== 'admin'){
  echo "<script>window.location.href ='../login.php'</script>";
  }
?>