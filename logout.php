<?php 
    session_start();

    $_SESSION['status'] = 'invalid';
    unset($_SESSION['user']);
    unset($_SESSION['cust_firstName']);
    unset($_SESSION['cust_lastName']);
   unset( $_SESSION['cust_email']);
   unset(  $_SESSION['cust_password']);
   unset( $_SESSION['cust_phone']);
   unset( $_SESSION['cust_address']);
   unset( $_SESSION['cust_postalcode']);
   unset( $_SESSION['cust_country']);
   unset( $_SESSION['cust_city']);

    echo "<script>window.location.href ='login.php'</script>";

?>