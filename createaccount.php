<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">
<!-- <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
*{
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}

 body{
  min-height: 100%;
}
 /*----BUTTONS--*/ 
 .btns{
  background-color: rgb(82, 80, 79);
  color:rgb(255, 255, 255);
  margin: 30px 0;
  padding: 8px 30px;
  transition: 0.4s;
  text-decoration: none;
  display: inline-block;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  
}
.btns:hover{
  background-color: rgb(218, 218, 218);
  color: rgb(34, 33, 33); ;
  
}
/*------------CREATE ACCOUNT---------*/
.create-account-section{
    padding: 40px;
}

.create-account-section .create-account-container{
    height: 580px;
    width: 100%;
    padding:15px;
    display: flex;
    margin-left: -1%;
}
.create-account-section .create-account-container .register-img{
    width: 50%;
    height:80%;
}
.create-account-section .create-account-container .register-img img{
    width: 100%;
    height:100%;
}
.small-contain{
    display: flex;
    justify-content: center;
    flex-direction: column;
    height:86% ;
    width: 40%;
    margin-right: 100px;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    padding-left: 30px;
}
.small-contain h1{
  padding-bottom: 20px;
  font-size: 2em;;
}
.register-account-txtbox input,select,p{
  margin: 5px;
  padding-bottom: 8px;
  outline: none;
}
.register-account-txtbox .full-width{
  width: 90%;
}
.register-account-txtbox .two-lines{
  width:43.5%;
  padding-right: 0px;
}
.register-account-txtbox p{
  color:red;
  font-size: 0.7em;
}
.small-contain .register-account-btn{
  margin-left: 32%;
}

</style> -->
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