<?php 
 require('./includes/database.php');

 if(isset($_POST['delete-customer'])){
    $deleteID = $_POST['delete-id'];
    
    $queryDeleteCustomer = "DELETE FROM customers WHERE cust_id = '$deleteID'";
    $sqlDeleteCustomer =mysqli_query($connection,$queryDeleteCustomer);

    if($sqlDeleteCustomer){
    echo '<script>alert("Successfully Deleted!")</script>';
    echo '<script>window.location.href = "./viewcustomer.php"</script>';
    }
}
    
if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>