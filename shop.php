<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\shop.css">
<link rel="stylesheet" href="styles\style.css">


<?php
  require ('./includes\header.php');
  require ('./includes\database.php');
 
?>
<body>

    <!---- SHOP-->

<div class="container0">
    <div class="container1">
        <h1>Products</h1>
        <div class="container2">
            <h4>Shop:</h4>
        <select>
            <option>All products</option>
            <option>Headphone</option>
            <option>Smartphone</option>
            <option>Laptop</option>
            <option>Smartwatch</option>
        </select>
        <form class="example" >
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div class="container4">
        <?php  
                $query = "SELECT * FROM products ORDER BY product_id ASC";  
                $result = mysqli_query($connection, $query);  
                $rowctr =0;
                     while($row = mysqli_fetch_array($result))  
                     {  
         ?>  
                <form method ="post" action= "productdetails.php" id="shopform">
                <button  class="container5"  >
                    <!-- <form method="post" action="cart.php?action=add&id=<?php //echo $row["product_id"]; ?> ">   -->
                    <img src="admin\product_images\<?php echo $row['product_img1']; ?>" alt="product image">
                    <h3><?php echo $row['product_name']; ?></h3>
                    <p>Php <?php echo $row['product_price']; ?></p>
                    <input type ="hidden" name="product-id" value="<?php echo $row["product_id"]; ?>">
                    <!-- <input type="text" name="quantity" class="form-control" value="1" />   -->
					<!-- <input type="hidden" name="hidden_image" value="<?php //echo $row["product_img1"]; ?>" />   -->
                    <!-- <input type="hidden" name="hidden_name" value="<?php //echo $row["product_name"]; ?>" />   -->
                    <!-- <input type="hidden" name="hidden_price" value="<?php// echo $row["product_price"]; ?>" />   -->
                    <!-- <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"  />   -->
                     </a>   
                     </button>
                </form>
          <?php } 
       ?>
        </div>
        </div>
    </div>
</body>

<?php 
  require ('./includes\footer.php');
?>

