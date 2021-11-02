<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles\productdetails.css">
<link rel="stylesheet" href="styles\style.css">




<?php
  require ('./includes\header.php');
  require ('./includes\database.php');
  session_start();
  
  if (empty($_SESSION['status']) || $_SESSION['status'] == 'invalid' ){
        
    unset( $_SESSION['cust_id']);
}else{
    $cart_cust_id = $_SESSION['cust_id'];
}

    if (isset($_POST['shop_container'])){
    $_SESSION['product_id'] = $_POST['product-id'];
   

    }   
   
  
   

?>

<body>
     <button onclick="goBack()">&#8592;Go Back</button>

        
  <div class="hero">
    <div class="row">
        <div class="col">
                <?php 
                    $product_id = $_SESSION['product_id'];
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
                <p class="Price">Price: Php <?php echo number_format($rowProductdetails['product_price']); ?></p>
              <!-- FORM FOR CART SUBMISSION -->
                <form method="post" action ="">   
                <p>Variation: <select name="variation">
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
                <p style ="color:red; font-size:0.7em"> (Once the item is added to your cart, the quantity & variation cannot be changed)</p>
                <input type= "hidden" name="hidden_image" value= "<?php echo $rowProductdetails['product_img1']; ?>">
                <input type= "hidden" name="hidden_name" value= "<?php echo $rowProductdetails['product_name']; ?>">
                <input type= "hidden" name="hidden_price" value= "<?php echo $rowProductdetails['product_price']; ?>">
                <input type= "hidden" name="hidden_pro_id" value= "<?php echo $product_id; ?>">
                <input type= "hidden" name="hidden_cust_id" value= "<?php echo  $cart_cust_id; ?>">
                <input type ="hidden" name= "hidden_pro_price" value ="<?php echo $rowProductdetails['product_price']; ?>">  
                <button type="submit" name="add_to_cart">
                    <i class="fa fa-shopping-cart"></i>
                Add to cart</button>
                <!-- <button type="button"><i class="fas fa-money-bill-wave"> </i>
                     Buy Now
                
                </button> -->
                   </form>
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

                                                   <p>PHP <?php echo number_format($rowRelated['product_price']); ?></p>
                                                   </div>
            </div>

                    </div>
               <?php         }
                    ?>
                   
            
        </div>
    </div>



</div>
<?php 
  
  require ('./includes\scripts.php');

            echo ' <script>
             function goBack() {
               window.location.href = "shop.php";
            }
            </script> ';

  if(isset($_POST['add_to_cart'])){
       
        $checkPro = $_POST['hidden_pro_id'];
        $queryCheckcart ="SELECT * FROM cart WHERE product_id = $checkPro";
        $sqlCheckcart = mysqli_query($connection, $queryCheckcart);
        $rowCheckcart = mysqli_fetch_array($sqlCheckcart);
        if(!empty($rowCheckcart)){
            echo ' <script>   swal({
                title: "Item not added!",
                text: "This item is already on your cart. ",
                icon: "error",
                button: "Okay",  
              }); 
              </script> ';
        }elseif(empty($_SESSION['status']) || $_SESSION['status'] == 'invalid'){  
        
         echo ' <script>   swal({
            title: "Item not added!",
            text: "Please log-in first.",
            icon: "error",
            button: "Okay",  
          }); 
          </script> ';
    
    }else{
        $cart_cust_id = $_POST ['hidden_cust_id'];
        $cart_product_id = $_POST['hidden_pro_id'];
        $cart_product_item_id = $_POST['variation'];
        $cart_item_quantity = $_POST['pro_quantity'];
        $cart_pro_price = $_POST['hidden_pro_price'];

        $total= $total + ($cart_pro_price * $cart_item_quantity);

        $queryAddtocart = "INSERT INTO cart VALUES('null', '$cart_cust_id', '$cart_product_id', '$cart_product_item_id','$cart_item_quantity','$total')";
        $sqlAddtocart = mysqli_query($connection, $queryAddtocart);

        if($sqlAddtocart){

            echo ' <script>   swal({
                title: "Added to cart!",
                text: "Successfully added to your shopping cart.",
                icon: "success",
                button: false,  
                timer: 2000,
              }); 
              </script> ';

        }
    }

    }

    require ('./includes\footer.php');
?>