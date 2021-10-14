<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles\productdetails.css">
<link rel="stylesheet" href="styles\style.css">


<?php
  require ('./includes\header.php');
  require ('./includes\database.php');
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

            <div class="slider">
                <div class="product">

                    <img src="img\Laptop1.jpg" alt="" onclick="clickme(this)">
                    <img src="img\Laptop1.jpg" alt="" onclick="clickme(this)">
                    <img src="img\Category1.jpg" alt="" onclick="clickme(this)">
                    <img src="img\Laptop1.jpg" alt="" onclick="clickme(this)">

                </div>
                <div class="preview">
                    <img src="img\Laptop1.jpg" id="imagebox" alt="">
                </div>
            </div>

        </div>
        <div class="col">

            <div class="content">
                <p class="brand">Laptop</p>
                <h2>MacBook Pro</h2>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p class="GadgetBrand">Brand: Mac</p>
                <p class="Price">Price: Php 71,990.00</p>
                <p>Variation: <select name="var">

                    <option value="variation">variation</option>
                    <option value="var1">variation1</option>
                    <option value="var2">variation2</option>
                    <option value="var3">variation3</option>

                </select></p>

                <p>Quantity: <input type="number" value="1" min="1"></p>

                <button type="button">
                    <i class="fa fa-shopping-cart"></i>
                Add to cart</button>
                <button type="button">
                    Buy Now
                </button>
            </div>

        </div>
    </div>


    <div class="related">
        <h2>Related Items</h2>
        <div class="row">
            <div class="columns">
                <div class="items">
                    <img src="img\product 6.jpg" alt="">
                    <div class="details">
                        <p>Alienware Area 51 M15X</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>

                        <p>PHP 12,000.00</p>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="items">
                    <img src="img\product 4.jpg" alt="">
                    <div class="details">
                        <p>Razer Blade 15 Studio Edition</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <p>PHP 8,000.00</p>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="items">
                    <img src="img\product 8.jpg" alt="">
                    <div class="details">
                        <p>Lenovo ThinkPad P1</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <p>PHP 11,000.00</p>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="items">
                    <img src="img\smartwatch1.jpg" alt="">
                    <div class="details">
                        <p>ACER Predator 21X </p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <p>PHP 10,000.00</p>

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<?php 
  require ('./includes\footer.php');
  require ('./includes\scripts.php');
?>