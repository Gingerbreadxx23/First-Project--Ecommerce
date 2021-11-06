<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles/account.css">
<link rel="stylesheet" href="styles/app.css">
<link rel="stylesheet" href="styles/grid.css">
<link rel="stylesheet" href="styles/style.css">
<?php
  require ('./includes\header.php');
  require ('./includes\session.php');//Avoid access after logging out

  $firstname = $_SESSION['cust_firstName'];
 $lastname =  $_SESSION['cust_lastName'];
 $email    =  $_SESSION['cust_email'];
 $password  =  $_SESSION['cust_password'];
 $phone  =  $_SESSION['cust_phone'];
 $address   =  $_SESSION['cust_address'];
 $postalcode  =  $_SESSION['cust_postalcode'];
 $country  =  $_SESSION['cust_country'];
 $city   =  $_SESSION['cust_city'];
 
?>
<body>
 <!-- products content -->
 <div class="bg-main">
        <div class="container">
            <div class="box">

            </div>
            <div class="box">
                <div class="row">
                    <div class="col-3 filter-col" id="filter-col">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-close">close</button>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                My Account
                            </span>
                            <ul class="filter-list">
                                <li id="bill"><a href="#">Billing Information</a></li>
                                <li id="status"><a href="#">Order Status</a></li>
                                <li id="history"><a href="#">Order History</a></li>
                                <li id="cancelrefunded"><a href="#">Cancelled/Refunded Order</a></li>
                                <form method= "post" action="logout.php">
                                <li><input type= submit value = "Logout" style = "border:none; float:left; background:none; font-size:1.1em"></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9 col-md-12">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                        </div>
                        <!-- display Information -->
                        <div class="box">
                          <div class="billinginfo" id="billinginfo">
                            <div class="row">
                              <div class="column">
                                <h2>Personal Information</h2><br/>
                                <input type="text" value="Cristina Deleon" readonly/>
                                <input type="text" value="56 C. Santos st. Ugong Pasig City" readonly/>
                                <input type="email" value="tintin.deleon26@gmail.com" readonly/>
                                <input type="number" value="09206770630" readonly/>
                                <input type="submit" value="Edit Information" readonly/>
                              </div>
                          </div>
                        </div>

                          <!-- display orderstatus -->
                        <div class="orderstatus" id="orderstatus">
                          <div class="row">
                            <div class="column">
                              <h2>Order Status</h2><br/>
                              <table>
                               <th align="left"> Product </th>
                               <th> Total </th>
                               <th> Status </th>
                               <th> Action </th>

                               <tr>
                                 <td><small>AERO 1pc/s</small></td>
                                 <td align="center"><small> 10,000 </small></td>
                                 <td align="center"><small> Pending </small></td>
                                 <td align="center" style="color: red;"><small><a href ="#"> Cancel </a></small></td>
                               </tr>
                             </table>
                            </div>
                        </div>
                      </div>

                        <!-- display orderhistory -->
                      <div class="orderhistory" id="orderhistory">
                        <div class="row">
                          <div class="column">
                            <h2>Order Status</h2><br/>
                            <table>
                             <th align="left"> Product </th>
                             <th> Total </th>
                             <th> Status </th>

                             <tr>
                               <td><small>AERO 1pc/s</small></td>
                               <td align="center"><small> 10,000 </small></td>
                               <td align="center"><small> Delivered </small></td>
                             </tr>
                           </table>
                          </div>
                      </div>
                    </div>

                    <!-- display canncelled/refunded -->
                  <div class="orderhistory" id="cancelledrefundedorder">
                    <div class="row">
                      <div class="column">
                        <h2>Order Status</h2><br/>
                        <table>
                         <th align="left"> Product </th>
                         <th> Total </th>
                         <th> Status </th>

                         <tr>
                           <td><small>AERO 1pc/s</small></td>
                           <td align="center"><small> 10,000 </small></td>
                           <td align="center"><small> Cancelled </small></td>
                         </tr>
                       </table>
                      </div>
                  </div>
                </div>

                      </div>
                    <!-- end display Information -->
                </div>
            </div>
        </div>
    </div>
    <br/><br/><br/>
    <!-- end products content -->

    <!-- app js -->

<script>
var billing = document.getElementById("bill");
var menubill = document.getElementById("billinginfo");
billing.onclick = function() {
  menubill.style.display = "block";
  orderstatus.style.display="none";
  orderhistory.style.display = "none";
  cancelrefundedhistory.style.display = "none";
}

var order = document.getElementById("status");
var orderstatus = document.getElementById("orderstatus");
order.onclick = function() {
  orderstatus.style.display = "block";
  menubill.style.display="none";
  orderhistory.style.display = "none";
  cancelrefundedhistory.style.display = "none";
}

var Ohistory = document.getElementById("history");
var orderhistory = document.getElementById("orderhistory");
Ohistory.onclick = function() {
  orderhistory.style.display = "block";
  menubill.style.display="none";
  orderstatus.style.display="none";
  cancelrefundedhistory.style.display = "none";
}

var cancelled = document.getElementById("cancelrefunded");
var cancelrefundedhistory = document.getElementById("cancelledrefundedorder");
cancelled.onclick = function() {
  cancelrefundedhistory.style.display = "block";
  menubill.style.display="none";
  orderstatus.style.display="none";
  orderhistory.style.display = "none";
}



</script>
</body>
<?php 
  require ('./includes\footer.php');
  // AVOID ACCESS FROM admin
  if($_SESSION['user'] !== 'customer'){
   echo "<script>window.location.href ='login.php'</script>";
  }
  
?>
