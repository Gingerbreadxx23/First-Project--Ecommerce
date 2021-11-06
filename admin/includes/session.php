<?php 

 if ($_SESSION['status'] =='invalid' || empty($_SESSION['status']))  {
  $_SESSION['status'] = 'invalid';
    unset($_SESSION['user']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_firstName']);
    unset($_SESSION['admin_lastName']);

 echo "<script>window.location.href ='../login.php'</script>";
 }

?>