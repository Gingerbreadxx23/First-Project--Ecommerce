<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles\productdetails.css">
<link rel="stylesheet" href="styles\style.css">




<?php
  require ('./includes\header.php');
  require ('./includes\database.php');

    $product_id = $_POST['product-id'];
?>

<body>
     <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
          window.history.back();
      }
  </script> 
        
  <div class="hero">
    <div class="row">
        <div class="col">
                <?php 
                        $queryProductdetails = "SELECT * FROM products WHERE product_id =$product_id";
                        $sqlProductdetails = mysqli_query($connection, $queryProductdetails);
                        $rowProductdetails =mysqli_fetch_array($sqlProductdetails);
                            $prod_cat_id = $rowProductdetails['product_category_id'];
                ?>
            <div class="slider">
                <div class="product">

                <img src="admin/product_images/<?php echo $rowProductdetails['product_img1']; ?> " alt="" onclick="clickme(this)">
                <img src="admin/product_images/<?php echo $rowProductdetails['product_img2']; ?> " alt="" onclick="clickme(this)">
                <img src="admin/product_images/<?php echo $rowProductdetails['product_img3']; ?> " alt="" onclick="clickme(this)">

                </div>
                <div class="preview">
                <img src="admin/product_images/<?php echo $rowProductdetails['product_img1']; ?>" id="imagebox" alt="">
                </div>
            </div>

        </div>
        <div class="col">

            <div class="content">
                <?php 
                    $queryProductCategory = "SELECT * FROM product_categories WHERE product_category_id = $prod_cat_id";
                    $sqlProductCategory = mysqli_query($connection,$queryProductCategory);
                    $rowProductCategory = mysqli_fetch_array($sqlProductCategory);

                ?>
                <p class="brand"><?php echo $rowProductCategory['product_category_title']; ?></p>
                <h2><?php echo $rowProductdetails['product_name']; ?></h2>
                <p class="Price">Price: Php <?php echo $rowProductdetails['product_price']; ?></p>
                <p>Variation: <select name="var">
                <?php 
                //PRODUCT VARIATION
                    $queryProductVariation = "SELECT * FROM product_item WHERE product_id = $product_id AND product_item_availability= 'Available'" ;
                    $sqlProductVariation = mysqli_query($connection,$queryProductVariation);
                   while( $rowProductVariation = mysqli_fetch_array($sqlProductVariation)){

                    ?>
                    <option value="<?php echo $rowProductVariation['product_item_id'];?>" ><?php echo $rowProductVariation['product_item_variation'];?></option>
                 <?php  }
                ?>

                </select></p>

                <p>Quantity: <input type="number" name="pro_quantity" value="1" min="1"></p>

                <button type="button">
                    <i class="fa fa-shopping-cart"></i>
                Add to cart</button>
                <button type="button"><i class="fas fa-money-bill-wave"> </i>
                     Buy Now
                
                </button>
            </div>

        </div>
    </div>

<!-- RELATED ITEMS -->
    <div class="related">
        <h2>Related Items</h2>
        <div class="row">
            
                    <?php 
                        $queryRelated= "SELECT * FROM products WHERE product_category_id = $prod_cat_id";
                        $sqlRelated = mysqli_query($connection,$queryRelated);
                        while($rowRelated = mysqli_fetch_array($sqlRelated)){
                            ?>
                            <div class="columns">
                                 <div class="items">
                            <img src="admin/product_images/<?php echo $rowRelated['product_img1']; ?>" alt="">
                                               <div class="details">
                                                   <p><?php echo $rowRelated['product_name']; ?></p>

                                                   <p>PHP <?php echo $rowRelated['product_price']; ?></p>
                                                   </div>
            </div>

                    </div>
               <?php         }
                    ?>
                   
            
        </div>
    </div>



</div>
<?php 
  require ('./includes\footer.php');
  require ('./includes\scripts.php');
?>