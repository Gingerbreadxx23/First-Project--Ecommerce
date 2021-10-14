<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
  require ('./includes\header.php');
 
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
        <div class="container3">
            <div class="container4">
                <div class="container5"><a href="productdetails.php">
                    <img src="img\Laptop1.jpg" alt="">
                    <h3>Laptop</h3>
                    <p>Php 46,000</p>
                    <a  class="add-cart cart1">Add to Cart</a>
                </a>
                </div>
                <div class="container5"><a href="#">
                    <img src="img\webcam1.jpg" alt="">
                    <h3>Webcam</h3>
                    <p>Php 5,000</p>
                    <a  class="add-cart cart2">View Product</a>
                </a>
                </div>
                <div class="container5"><a href="#">
                    <img src="img\Smartwatch1.jpg" alt="">
                    <h3>Smartwatch</h3>
                    <p>Php 8,000</p>
                    <a class="add-cart cart3">Add to Cart</a>
                </a>
                </div>
            </div>
            <div class="container4">
                <div class="container5"><a href="#">
                    <img src="img\product 4.jpg" alt="">
                    <h3>iPhone</h3>
                    <p>Php 15,999</p>
                    <a  class="add-cart cart4">Add to Cart</a>
                </a>
                </div>
                <div class="container5"><a href="#">
                    <img src="img\product 5.jpg" alt="">
                    <h3>Oppo</h3>
                    <p>Php 7,999</p>
                    <a  class="add-cart cart5">Add to Cart</a>
                </a>
                </div>
                <div class="container5"><a href="#"></a>
                    <img src="img\product 6.jpg" alt="">
                    <h3>Beats Headphone</h3>
                    <p>Php 5,999</p>
                    <a class="add-cart cart6">Add to Cart</a>
                </a>
                </div>
            </div>
            <div class="container4">
              <div class="container5"><a href="#">
                  <img src="img\product 7.jpg" alt="">
                  <h3>Oppo</h3>
                  <p>Php 15,999</p>
                  <a  class="add-cart cart7">Add to Cart</a>
              </a>
              </div>
              <div class="container5"><a href="#">
                  <img src="img\product 8.jpg" alt="">
                  <h3>Asus</h3>
                  <p>Php 7,999</p>
                  <a  class="add-cart cart8">Add to Cart</a>
              </a>
              </div>
              <div class="container5"><a href="#"></a>
                  <img src="img\product 9.jpg" alt="">
                  <h3>Smart Watch</h3>
                  <p>Php 5,999</p>
                  <a  class="add-cart cart9">Add to Cart</a>
              </a>
              </div>
          </div>
          </div>  
        </div>
    </div>
</div>
</div>
</div>
</body>
<?php 
  require ('./includes\footer.php');
?>