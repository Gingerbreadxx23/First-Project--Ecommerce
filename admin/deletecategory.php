<?php 
 require('./includes/database.php');

 if(isset($_POST['delete-cat'])){
    $deleteID = $_POST['delete-c-id'];
    
    $queryDeleteCat = "DELETE FROM product_categories WHERE product_category_id = '$deleteID'";
    $sqlDeleteCat =mysqli_query($connection,$queryDeleteCat);

    if($sqlDeleteCat){
    echo '<script>alert("Successfully Deleted!")</script>';
    echo '<script>window.location.href = "./viewcategory.php"</script>';
    }
}
    
if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>