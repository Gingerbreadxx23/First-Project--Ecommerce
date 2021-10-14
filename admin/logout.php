<?php 
    session_start();

    $_SESSION['status'] = 'invalid';
    unset($_SESSION['user']);
    unset($_SESSION['admin_firstName']);
    unset($_SESSION['admin_lastName']);

    echo "<script>window.location.href ='../login.php'</script>";

?>