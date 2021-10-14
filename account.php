<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
  

 <br/>
<!-- <div class= "account-wrapper"> -->
    <div class="flex-container">
        <div class="menu">
            <i class="fas fa-edit icon"><a href="editprofile.php" style="text-decoration: none;"> Edit Profile </a></i>
            <form action="logout.php" method="post">
            <i class="fas fa-power-off icon">
            <input type="submit" value="LOGOUT"></i>
            </form> 
        </div>
        <div class="center">
            <span> Name: </span><br/>
            <input class=account-input type="text" name="" value="<?php echo $firstname.' '. $lastname;  ?> " disabled /><br/>
            <span> Address: </span><br/>
            <input class=account-input type="text" name="" value="<?php echo $address.' '. $city.' '. $country.' '.$postalcode;  ?>" disabled/><br/>
            <span> Contact Number: </span><br/>
            <input class=account-input type="number" name="" value="<?php echo $phone;  ?>" disabled />
        </div>
    </div>
<br/>
<br/>

    <div class="flex-container">
        <table>
            <th class= "account-th"> Orders </th>
            <th class= "account-th"> Product Name </th>
            <th class= "account-th"> Product Quantity </th>
            <th class= "account-th"> Price </th>
            <th class= "account-th"> Amount </th>
        <tr>
	        <td><img src="img/Laptop1.jpg" width="100"></td>
	        <td>Laptop</td>
	        <td>10</td>
	        <td>&#8369;150.00</td>
	        <td>&#8369;1,500.00</td>
        </tr>
        <tr>
	        <td><img src="img/Laptop1.jpg" width="100"></td>
        	<td>Laptop</td>
        	<td>10</td>
        	<td>&#8369;150.00</td>
        	<td>&#8369;1,500.00</td>
        </tr>
        <tr>
	        <td><img src="img/Laptop1.jpg" width="100"></td>
	        <td>Laptop</td>
	        <td>10</td>
        	<td>&#8369;150.00</td>
	        <td>&#8369;1,500.00</td>
        </tr>

        <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td>Total Amount</td>
	        <td>&#8369;4,500.00</td>
        </tr>
        <td>
        </table>
     </div>
    </div>
<!-- </div> -->
</body>
<?php 
  require ('./includes\footer.php');
  // AVOID ACCESS FROM admin
  if($_SESSION['user'] !== 'customer'){
   echo "<script>window.location.href ='login.php'</script>";
  }
  
?>