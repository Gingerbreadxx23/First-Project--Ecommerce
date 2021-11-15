<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');
   require('./includes/scripts.php');


   if(isset($_POST['save-stock'])){
    $variation = $_POST['select-variation'];
    $stock = $_POST['stock-number'];
    $product_id = $_POST['hidden-pro-id'];

    // GET iNITIAL STOCK
    $querygetStock = "SELECT product_item_quantity FROM product_item WHERE product_id='$product_id' AND product_item_variation= '$variation'";
    $sqlgetStock =  mysqli_query($connection,$querygetStock);
    $rowgetStock = mysqli_fetch_array($sqlgetStock);
    $iStock = $rowgetStock['product_item_quantity'];
   
    $newStock = 0;
    $newStock = $iStock + $stock;

    // Update Stock
    $querynewStock = "UPDATE product_item SET product_item_quantity = '$newStock' WHERE product_id='$product_id' AND product_item_variation= '$variation'";
    $sqlnewStock = mysqli_query($connection, $querynewStock);

    if ($sqlnewStock){
        echo ' <script>   swal({
            title: "Stock Added ",
            text: "You have added an item stock.",
            icon: "success",
            button: false,  
            timer :1700,
          }).then(function() {
            window.location = "inventory.php";
        });
          </script> ';
    }
    $newStock=0;
   }
 ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                          <div class="row"> <!-- row begin -->
                              <div class="col-lg-12"> <!-- col begin-->
                                  <h1 class="page-header">Add stock</h1>

                              </div><!-- col begin-->
                          </div><!-- row finish -->

                          <div class="container border ">
                          <button class = "btn btn-secondary mt-5"onclick="goBack()">&#8592;Go Back</button>    
                            <div class="container-fluid">
                            <div class = "container border mb-5 mt-5 shadow p-3 mb-5 bg-white rounded"  >
                               <div class="container-fluid">
                                   
                                    <div class="input-field">
                                     <table class="table table-borderless" >
                                      <tr>
                                         <td  > <b> ADD STOCK TO : </b></td>
                                         <td ><h5><b>
                                            <?php 
                                                if(isset($_POST['add-stock'])){
                                                    $productid = $_POST['add-proid'];

                                                    $queryProductname = "SELECT product_name FROM products WHERE product_id ='$productid'";
                                                    $sqlProductname = mysqli_query($connection,$queryProductname);
                                                    $rowProductname = mysqli_fetch_array($sqlProductname);

                                                    echo $rowProductname['product_name'];
                                                }
                                            ?>
                                            </h5></b>
                                         </td>
                                      </tr>
                                      <tr class="alert-secondary">
            
                                          <th >VARIATION</th>
                                          <th style="text-align:center;">STOCK</th>
                                      </tr>
                                      <form  method="post" action="">
                                      <tr>
                                      <td><select class="form-control" name="select-variation">
                                      
                                          <?php 
                                            $queryProductItem = "SELECT * FROM product_item WHERE product_id = '$productid'";
                                            $sqlProductItem = mysqli_query($connection,$queryProductItem);
                                            while($rowProductItem = mysqli_fetch_array($sqlProductItem)){
                                             ?> 
                                            
                                               <?php  echo $rowProductItem['product_item_variation']?>
                                                <option  value="<?php echo $rowProductItem['product_item_variation']?>"><?php echo $rowProductItem['product_item_variation']?></option>
                                         
                                       <?php    }
                                          ?>
                                          </select>
                                          </td> 
                                          <td><input type="number" class="form-control" min="0" name="stock-number"  placeholder ="Input stock number" required></td>
                                        </tr>
                                        </table>
                                         <center>
                                             <input type="hidden" name= "hidden-pro-id" value ="<?php echo $productid; ?>">
                                             <input type="submit" class="btn btn-success" name="save-stock" value="Add Stock">
                                         </center>
                                         </form>
                                     </div>
                                    </div>
                                </div>
                            </div>

<?php 
 echo ' <script>
 function goBack() {
   window.location.href = "inventory.php";
}
</script> ';
 

 require('./includes/session.php');
   
 if($_SESSION['user'] !== 'admin'){
  echo "<script>window.location.href ='../login.php'</script>";
  }
?>