
<?php
require ('./includes\scripts.php');
if(isset($_POST['add_to_cart'])){

if(empty($_SESSION['status']) || $_SESSION['status'] == 'invalid'){  
    
echo ' <script>   swal({
        title: "Item not added",
        text: "Please log-in first",
        icon: "error",
        button: "Okay",
      });  </script> ';

}
}
?>