<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');

    if(isset($_POST['editproduct'])){
        $editproduct_id = $_POST['editproduct-id'];
        $editproduct_cat = $_POST['editproduct-cat'];
        $editproduct_cat_id = $_POST['editproduct-cat-id'];
        $editproduct_name = $_POST['editproduct-name'];
        $editproduct_image1 =$_POST['editproduct-image1'];
        $editproduct_image2 =$_POST['editproduct-image2'];
        $editproduct_image3 =$_POST['editproduct-image3'];
        $editproduct_price =$_POST['editproduct-price'];
        $editproduct_desc = $_POST['editproduct-desc'];
    }
    
 ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                          <div class="row"> <!-- row begin -->
                              <div class="col-lg-12"> <!-- col begin-->
                                  <h1 class="page-header">Edit Product Details</h1>

                                  <ol class="breadcrumb"> <!-- brd begin -->
                                      <li class="active">
                                          <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Product/ Edit Product Details
                                      </li>
                                  </ol> <!-- brd fin -->

                              </div><!-- col begin-->
                          </div><!-- row finish -->

                          <div class="container border ">
                            <div class="container-fluid">

                              <form action ="editproduct.php" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="product-id" value="<?php echo $editproduct_id; ?>">
                            <div class="form-group m-3">
                              <label for="producttitle">Product Title:</label>
                              <input class="form-control " name="editproduct-title" type="text" placeholder="Insert product title..." value="<?php echo $editproduct_name; ?>" id="producttitle"  required>
                              <div class="invalid-feedback">
                                    Please input a product name.
                              </div>
                            </div>
                            <div class="form-group m-3">
                              <label for="selectcategory">Select Category:</label>
                              <select class="form-control" id="selectcategory" name="editselect-category"  required>
                              <option value="<?php echo $editproduct_cat_id;?>" selected><?php echo $editproduct_cat; ?></option>
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
                              <img width="70" height="70" src ="./product_images/<?php echo $editproduct_image1; ?>" alt= "<?php echo $editproduct_image1; ?>"/>
                              <input class="form-control" name="product-image1" type="file"   id="product-img1" required>
                              <div class="invalid-feedback">
                                    Please upload a product Image.
                              </div>
 
                            </div>
                            <div class="form-group m-3">
                              <label for="product-img2">Product Image 2:</label>
                              <img width="70" height="70" src ="./product_images/<?php echo $editproduct_image2; ?>" alt= "<?php echo $editproduct_image2; ?>"/>
                              <input class="form-control" name="product-image2" type="file"   id="product-img2"  required>
                              <div class="invalid-feedback">
                                    Please upload a product Image.
                              </div>
                            </div>
                            <div class="form-group m-3">
                             <label for="product-img3">Product Image 3:</label>
                             <img width="70" height="70" src ="./product_images/<?php echo $editproduct_image3; ?>" alt= "<?php echo $editproduct_image3; ?>"/>
                             <input class="form-control"name="product-image3" type="file"   id="product-img3" required >
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
                            <input type="text" class="form-control" name="product-price" aria-label="Amount" value="<?php echo $editproduct_price; ?>" id="product-price" required>
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
                            <textarea class="form-control" name="product-desc" id="product-desc"  rows="3" required><?php echo $editproduct_desc; ?></textarea>
                            <div class="invalid-feedback">
                                    Please input a product description.
                              </div>
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary m-3 p-3" name="edit-product"><i class="fas fa-plus"></i> Save Changes</button>
                            </div>
                            </div>
                            </div>
                                </form>
                            </div>
                          </div>
            <?php 
                if(isset($_POST['edit-product'])){
                  $newproduct_id = $_POST['product-id'];
                  $newproduct_title = $_POST['editproduct-title'];
                  $newproduct_cat =$_POST['editselect-category'];
                  $newproduct_price =$_POST['product-price'];
                  $newproduct_desc = $_POST['product-desc'];
                  $newproduct_keyword = $_POST['product-keyword'];
          
                  $product_img1= $_FILES['product-image1']['name'];
                  $product_img2= $_FILES['product-image2']['name'];
                  $product_img3= $_FILES['product-image3']['name'];
          
                  $temp_name1 = $_FILES['product-image1']['tmp_name'];
                  $temp_name2 = $_FILES['product-image2']['tmp_name'];
                  $temp_name3 = $_FILES['product-image3']['tmp_name'];
          
                  move_uploaded_file($temp_name1,"product_images/$product_img1");
                  move_uploaded_file($temp_name2,"product_images/$product_img2");
                  move_uploaded_file($temp_name3,"product_images/$product_img3");
          
                  $queryupdateProduct = "UPDATE products SET  product_name= '$newproduct_title', product_category_id ='$newproduct_cat', product_date= NOW(), product_img1 = '$product_img1', product_img2 = '$product_img2', product_img3 = '$product_img3', product_price ='$newproduct_price', product_desc='$newproduct_desc' WHERE product_id= '$newproduct_id'";
                  $sqlupdateProduct = mysqli_query($connection,$queryupdateProduct);
          
                  if($sqlupdateProduct){
                      echo "<script>alert('Successfully Updated')</script>";
                      echo "<script>window.location.href ='./viewproduct.php'</script>";
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