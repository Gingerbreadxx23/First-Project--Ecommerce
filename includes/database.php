<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ecommercesystem';

    $connection = mysqli_connect($host,$user,$password,$database);

    if (mysqli_connect_error()){
        echo 'not connected';
    }
?>