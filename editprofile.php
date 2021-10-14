<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
session_start();
  require ('./includes\header.php');
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

   <section class="create-account-section">
     <form>
         <div class="create-account-container">
          <div class="create-account-small-contain">
              <h1>Personal Information</h1>
               <div class="register-account-txtbox">
                    <input class="two-lines" type="text"placeholder="First Name" value="<?php echo $firstname;?>" name="firstname" >
                    <input class="two-lines" type="text"placeholder="Last Name" value="<?php echo $lastname;?>" name="lastname" >
                    <input class="full-width" type="text"placeholder="E-mail" value="<?php echo $email;?>" name="email" >
                    <input class="full-width" type="password"placeholder="Password" value="<?php echo $password;?>" name="password" >
                    <input class="full-width" type="password" placeholder="Confirm password" name="confirmpass" >
                    <input class="full-width"  type="text"placeholder="Phone Number" value="<?php echo $phone;?>" name="phonenum" >
                    <input class="full-width" type="text"placeholder="Address" value="<?php echo $address;?>" name="address" >
                    <input class="two-lines" type="number" placeholder="Postal Code" value="<?php echo $postalcode;?>" name="postalcode" >
                    <input class="two-lines" type="text" placeholder="City"value="<?php echo $city;?>" name="city" >
                    <select class="full-width" name="dropdown" id="country">
                     <option value="<?php echo $country;?>">Philippines</option>
                   </select>
                  <div class="register-account-btn">
                     <input  class="btns" type="button" value="Save">
                  </div>
                 </div>
             </div>
             <div class="register-img">
                 <img src="img/edit-pic.png" alt="ad">
             </div>
         </div>

      </form>
     </section>
</body>
<?php
  require ('./includes\footer.php');
  require ('./includes\session.php');
?>