<?php 
 require('./includes/database.php');

 if(isset($_POST['delete-product'])){
    $deleteID = $_POST['delete-ID'];
    
    $queryDeleteProduct = "DELETE FROM products WHERE product_id = '$deleteID'";
    $sqlDeleteProduct =mysqli_query($connection,$queryDeleteProduct);

    if($sqlDeleteProduct){
    echo '<script>alert("Successfully Deleted!")</script>';
    echo '<script>window.location.href = "./viewproduct.php"</script>';
    }
}
    
if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>