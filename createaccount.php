<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
  require ('./includes\header.php');
  require ('./includes\database.php');
  require ('./includes\scripts.php');


 if(isset($_POST['register'])){ 
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirmpass=$_POST['confirmpass'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $barangay = $_POST['barangay'];
   $postalcode = $_POST['postalcode'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   
   //VALIDATE INPUTS'
   if(empty($firstname) || empty($lastname) || empty( $email)|| empty($password)|| empty( $phone)|| empty($address)|| empty($postalcode)|| empty($city)|| empty($country) ){
    echo ' <script>   swal({
      title: "Empty Field!",
      text: "Please fill out all fields.",
      icon: "error",
      button: "Okay",
    });  </script> ';
   }else if ($password!== $confirmpass){
    echo ' <script>   swal({
      title: "Password does not match",
      text: "Make sure you confirm the same password.",
      icon: "error",
      button: "Okay",
    });  </script> ';
   }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ' <script>   swal({
      title: "Invalid Email format",
      text: "Please input a valid email",
      icon: "error",
      button: "Okay",
    });  </script> ';
   } else{
    $queryCreate = "INSERT INTO customers VALUES (null,'$firstname',' $lastname','$email',md5('$password'),'$phone','$address', '$barangay','$postalcode','$country','$city')";
    $sqlCreate =mysqli_query($connection,$queryCreate);

    echo ' <script>   swal({
      title: "Registration Successful! ",
      text: "You have created an account successfully.",
      icon: "success",
      button: false,  
      timer :2000,
    }).then(function() {
      window.location = "login.php";
  });
    </script> ';

   }
  
 }

?>
  <body>
      
     
      <section class="create-account-section">
        <form action="createaccount.php" method="POST">
            <div class="create-account-container">
             <div class="create-account-small-contain" style = "height:95%;">
                 <h1>Create Account</h1>
                  <div class="register-account-txtbox">
                       <input class="two-lines" type="text" placeholder="First Name" name="firstname" >
                       <input class="two-lines" type="text" placeholder="Last Name" name="lastname" >
                       <input class="full-width" type="text" placeholder="Email" name="email" >
                       <input class="full-width" type="password" placeholder="Password" name="password" >
                       <input class="full-width" type="password" placeholder="Confirm password" name="confirmpass" >
                       <input class="full-width"  type="number" placeholder="Phone Number" name="phone" >
                       <input class="full-width" type="text" placeholder="Address" name="address" >
                       <input class="full-width" type="text" placeholder="Barangay" name="barangay" >
                       <input class="two-lines" type="text" placeholder="City" name="city" >
                       <input class="two-lines" type="number" placeholder="Postal Code" name="postalcode" >
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