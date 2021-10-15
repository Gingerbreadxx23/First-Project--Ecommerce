<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
  require ('./includes\header.php');
  require ('./includes\database.php');

 if(isset($_POST['register'])){ // GET VALUES OF INPUT
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmpass=$_POST['confirmpass'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $postalcode = $_POST['postalcode'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   
   //VALIDATE INPUTS'
   if(empty($firstname) || empty($lastname) || empty( $email)|| empty($password)|| empty( $phone)|| empty($address)|| empty($postalcode)|| empty($city)|| empty($country) ){
     echo 'Please fill out all fields';
   }else if ($password!== $confirmpass){
     echo 'Password do not match!';
   }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
   } else{
    $queryCreate = "INSERT INTO customers VALUES (null,'$firstname',' $lastname','$email',md5('$password'),'$phone','$address','$postalcode','$country','$city')";
    $sqlCreate =mysqli_query($connection,$queryCreate);

    echo '<script>alert("Successfully Created!")</script>';
    echo '<script>window.location.href = "account.php"</script>';

   }
  
 }

?>
  <body>
      <!--------- CREATE ACCOUNT ---------->
     
      <section class="create-account-section">
        <form action="createaccount.php" method="POST">
            <div class="create-account-container">
             <div class="create-account-small-contain">
                 <h1>Create Account</h1>
                  <div class="register-account-txtbox">
                       <input class="two-lines" type="text" placeholder="First Name" name="firstname" >
                       <input class="two-lines" type="text" placeholder="Last Name" name="lastname" >
                       <input class="full-width" type="text" placeholder="Email" name="email" >
                       <input class="full-width" type="password" placeholder="Password" name="password" >
                       <input class="full-width" type="password" placeholder="Confirm password" name="confirmpass" >
                       <input class="full-width"  type="number" placeholder="Phone Number" name="phone" >
                       <input class="full-width" type="text" placeholder="Address(Street & Barangay)" name="address" >
                       <input class="two-lines" type="number" placeholder="Postal Code" name="postalcode" >
                       <input class="two-lines" type="text" placeholder="City" name="city" >
                       <select class="full-width" name="country" id="country">
                        <option value="Philippines">Philippines</option>
                      </select>
                       <p>Note: You can edit your information anytime</p>
                     <div class="register-account-btn">
                        <input  class="btns" type="submit" name="register" value="Register">
                     </div>
                    </div>    
                </div>
                <div class="register-img">
                    <img src="https://www.freepngimg.com/thumb/technology/41392-4-gadgets-free-download-png-hd.png" alt="ad">
                </div>
            </div> 
         </form>
        </section>
</body>
<?php 
  require ('./includes\footer.php');
?>