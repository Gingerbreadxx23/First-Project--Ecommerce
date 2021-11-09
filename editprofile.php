<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
require ('./includes\session.php');
  require ('./includes\header.php');
  require ('./includes\scripts.php');
  require ('./includes\database.php');
  
  $custid = $_SESSION['cust_id'];
  $firstname = $_SESSION['cust_firstName'];
  $lastname =  $_SESSION['cust_lastName'];
  $email    =  $_SESSION['cust_email'];
  $password  =  $_SESSION['cust_password'];
  $phone  =  $_SESSION['cust_phone'];
  $address   =  $_SESSION['cust_address'];
  $barangay   =  $_SESSION['barangay'];
  $postalcode  =  $_SESSION['cust_postalcode'];
  $country  =  $_SESSION['cust_country'];
  $city   =  $_SESSION['cust_city'];


  if(isset($_POST['editprofile'])){

    $cust_id = $_POST['cust-id'];
    $new_firstname  =    $_POST['firstname'];
    $new_lastname  =    $_POST['lastname'];
    $new_email  =    $_POST['email'];
    $new_phone  =    $_POST['phonenum'];
    $new_address  =    $_POST['address'];
    $new_barangay  =    $_POST['Barangay'];
    $new_postalcode  =    $_POST['postalcode'];
    $new_city  =    $_POST['city'];
    $new_country =    $_POST['dropdown'];

    $queryeditProfile ="UPDATE customers SET cust_firstName = '$new_firstname', cust_lastName = '$new_lastname', cust_email = '$new_email', cust_phone = '$new_phone', cust_address = '$new_address', cust_barangay = '$new_barangay', cust_postalcode = '$new_postalcode',cust_country= '$new_country',cust_city = '$new_city' WHERE cust_id = '$cust_id'";
    $sqleditProfile = mysqli_query($connection , $queryeditProfile);

    if($sqleditProfile){

      echo ' <script>   swal({
        title: "Changes saved! ",
        text: "You have updated your profile successfully",
        icon: "success",
        button: false,  
        timer :2000,
      }).then(function() {
        window.location = "account.php";
    });
      </script> ';
    }     
    }
  
?>
<body>

   <section class="create-account-section">
         <div class="create-account-container">
          <div class="create-account-small-contain">
              <h1>Personal Information</h1>
               <div class="register-account-txtbox">
                 <form method="post" action= "editprofile.php">
                    <input class="two-lines" type="text"placeholder="First Name" value="<?php echo $firstname;?>" name="firstname" >
                    <input class="two-lines" type="text"placeholder="Last Name" value="<?php echo $lastname;?>" name="lastname" >
                    <input class="full-width" type="text"placeholder="E-mail" value="<?php echo $email;?>" name="email" >
                    <input class="full-width"  type="text"placeholder="Phone Number" value="<?php echo $phone;?>" name="phonenum" >
                    <input class="full-width" type="text"placeholder="Address" value="<?php echo $address;?>" name="address" >
                    <input class="full-width" type="text"placeholder="Barangay" value="<?php echo $barangay;?>" name="Barangay" >
                    <input class="two-lines" type="number" placeholder="Postal Code" value="<?php echo $postalcode;?>" name="postalcode" >
                    <input class="two-lines" type="text" placeholder="City"value="<?php echo $city;?>" name="city" >
                    <select class="full-width" name="dropdown" id="country">
                     <option value="<?php echo $country;?>">Philippines</option>
                   </select>
                  <div class="register-account-btn">
                      <input type = "hidden" value ="<?php echo $custid;?>" name= "cust-id">
                     <input  class="btns" type="submit" name="editprofile" value="Save Changes">
                    </form>
                  </div>
                 </div>
             </div>
             <div class="register-img">
                 <img src="img/edit-info.png" alt="ad">
             </div>
         </div>

      </form>
     </section>
</body>
<?php
   
  
  require ('./includes\footer.php');
  
?>