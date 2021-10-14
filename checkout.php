<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles\style.css">
<link rel="stylesheet" href="styles\checkout.css">

 <?php 
    require('./includes\header.php');
 ?>
 <body>

<h2>Order Summary</h2>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" action="/action_page.php">
                <div class="row">
                    <div class="col-50">
                         <h5> <i class="fa fa-calendar"></i>&nbsp; Checkout Date:July 23,2000</h5>
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="fullname"  required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email"  required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address"  required>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
            <p><a href="#">IPHONE 12 Pro Mac</a> <span class="price">Php 1,500.00</span></p>
            <p><a href="#">SAMSUNG S21</a> <span class="price">Php 1,500.00</span></p>
            <p><a href="#">OPPO F14</a> <span class="price">Php 1,400.00</span></p>
            <p><a href="#">HUAWEI 20 Mac</a> <span class="price">Php 1,200.00</span></p>
            <div class="col-50">
                <h3>Payment</h3>
                <p>Cash on Delivery</p>
                <hr>
                <p>Subtotal<span class="price" style="color:black"><span class="price">Php 12,600.00</span>
                    <p>Shipping Fee<span class="price">Php 100.00</span>
                        <hr>
                        <p>Total to Pay<span class="price" style="color:black"><b>Php 12, 700.00</b></span></p>
                        <label>
                          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                      </label>
                      <input type="submit" value="Place order" class="btn">
                  </div>
              </div>
          </div>

      </body>
      <?php 
  require ('./includes\footer.php');
  require ('./includes\scripts.php');
?>