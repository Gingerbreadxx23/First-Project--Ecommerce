<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">


<?php
  require ('./includes\scripts.php');
  require ('./includes\header.php');
  require('./includes\database.php');
  
session_start();
  //  $_SESSION ['status'];
  if ( empty($_SESSION['status']) || $_SESSION['status'] =='invalid' )  {
    //SET INVALID AS DEFAULT
  $_SESSION['status'] = 'invalid';
}
if ($_SESSION['status']=='valid' && $_SESSION['user']=='admin'){
     //TO PREVENT LOGGING IN AGAIN
  echo "<script>window.location.href = 'admin/index.php'</script>";
}
if ($_SESSION['status']=='valid' && $_SESSION['user']=='customer'){
  echo "<script>window.location.href = 'account.php'</script>";
}
  
     if (isset($_POST['login'])){ //get values in login form
      $email = trim($_POST['email']);
     $password = trim($_POST['password']);
       
      if (empty($email) || empty($password)){ //checking of credentials
        echo '<script>   swal({
          title: "Empty Field!",
          text: "Please fill-up all out fields. ",
          icon: "error",
          button: "Okay",  
        }); 
        </script> ';
          }else{
            $queryValidate = "SELECT * FROM admin_info WHERE admin_email= '$email' AND admin_password = md5('$password')"; //SEARCH ON ADMINS
            $sqlValidate = mysqli_query($connection, $queryValidate);
            $rowValidate = mysqli_fetch_array($sqlValidate); //fetch data from database
            
             if(mysqli_num_rows($sqlValidate) > 0){//validate credential
               $_SESSION['status'] = 'valid';
               $_SESSION['user'] = 'admin';
               $_SESSION['admin_id'] = $rowValidate['admin_id'];
               $_SESSION['admin_firstName']= $rowValidate['admin_firstName'];
               $_SESSION['admin_lastName']= $rowValidate['admin_lastName'];
               
              echo "<script> window.location.href = 'admin/index.php'</script>";
             }
             else{
              $querycustValidate = "SELECT * FROM customers WHERE cust_email= '$email' AND cust_password = md5('$password')"; //SEARCH ON CUSTOMERS
              $sqlcustValidate = mysqli_query($connection, $querycustValidate);
              $rowcustValidate = mysqli_fetch_array($sqlcustValidate); //fetch data from cust database
               if(mysqli_num_rows($sqlcustValidate) > 0){
                   $_SESSION['status'] = 'valid';
                   $_SESSION['user'] = 'customer';
                  //GET ALL DATA FROM CUST
                    $_SESSION['cust_id'] = $rowcustValidate['cust_id'];
                    $_SESSION['cust_firstName']= $rowcustValidate['cust_firstName'];
                    $_SESSION['cust_lastName']= $rowcustValidate['cust_lastName'];
                    $_SESSION['cust_email']= $rowcustValidate['cust_email'];
                    $_SESSION['cust_password']= $rowcustValidate['cust_password'];
                    $_SESSION['cust_phone']= $rowcustValidate['cust_phone'];
                    $_SESSION['cust_address']= $rowcustValidate['cust_address'];
                    $_SESSION['barangay']= $rowcustValidate['cust_barangay'];
                    $_SESSION['cust_postalcode']= $rowcustValidate['cust_postalcode'];
                    $_SESSION['cust_country']= $rowcustValidate['cust_country'];
                    $_SESSION['cust_city']= $rowcustValidate['cust_city'];

                  echo "<script> window.location.href = 'account.php'</script>";
              }else{
                $_SESSION['status'] = 'Invalid';
                echo '<script>   swal({
                  title: "Invalid Credentials",
                  text: "Please input a valid username or password. ",
                  icon: "error",
                  button: "Okay",  
                }); 
                </script> ';
              }
             }
         }
      }
     
?>
<body>
      <!--------- LOGIN ----------> 
      <section class="login-section">
        <form action="login.php" method="post">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <input type="text" placeholder="Email" name="email" >
            </div>
            <div class="textbox">
                <input type="password" placeholder="Password" name="password" >
            </div>
            <input class="login-btn" type="submit" name ="login" value="Sign in">
            <div class="create-acc">
                <p>No account yet?</p>
                <a href="createaccount.php">Create Account</a>
            </div>
        </section>
        </form>
        </div>
</body>
<?php 
  require ('./includes\footer.php');
?>