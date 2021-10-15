<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles/account.css">
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

<br/><br/><br/>
<div class="row">
  <div class="column">
    <center><i class="fa fa-edit"> <a href="editprofile.php"> Edit </a> </i><form action="logout.php" method="post">
            <i class="fas fa-power-off icon">
            <input type="submit" value="LOGOUT"></i>
            </form> </center><br/>
    <center>
      <input type="text" value="<?php echo $firstname.' '. $lastname;  ?>" readonly>
      <input type="email" value="<?php echo $email;  ?>" readonly>
      <input type="number" value="<?php echo $phone;  ?>" readonly>
      <input type="text" value="<?php echo $address.' '. $city.' '. $country.' '.$postalcode;  ?>" readonly>
    </center>
  </div>
</div>

<div class="row">
  <div class="column">
    <center class="order"><a href="#"> Order </a> &nbsp;&nbsp;<a href="#"> Order History </a> &nbsp;&nbsp; <a href="#"> Review Order </a> </center>
  </div>
</div>




 <br><br><br><br><br><br/><br/><br/><br/>
  

</body>
<?php 
  require ('./includes\footer.php');
  // AVOID ACCESS FROM admin
  if($_SESSION['user'] !== 'customer'){
   echo "<script>window.location.href ='login.php'</script>";
  }
  
?>
