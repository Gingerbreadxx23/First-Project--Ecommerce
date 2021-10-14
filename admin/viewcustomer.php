<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');

 ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <div class="row"> <!-- row begin -->
                <div class="col-lg-12"> <!-- col begin-->
                    <h1 class="page-header">View Customers</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Customers
                        </li>
                    </ol> <!-- brd fin -->

                </div><!-- col fin-->
            </div><!-- row finish -->
                <div class="container-fluid"><!-- col 3 beg -->
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Customers
                </div>
                <div class="card-body">
                <table class="table table-hover table-bordered table-responsive" id="datatablesSimple">
                    <thead>
                        <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">Postal Code</th>
                        </tr>
                    </thead>
                     <tbody>
                       <?php 
                             $viewpctr =1;
                             $queryviewCustomer= "SELECT * FROM customers";
                             $sqlviewCustomer = mysqli_query($connection,$queryviewCustomer);
                             while($rowviewCustomer =mysqli_fetch_array($sqlviewCustomer)){
                             ?>
                                <tr>
                                  <td><?php echo $viewpctr;?></td>
                                <td><?php echo $rowviewCustomer['cust_firstName'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_lastName'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_email'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_phone'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_address'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_city'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_country'];?></td>
                                 <td><?php echo $rowviewCustomer['cust_postalcode'];?></td>
                                 <!-- DELETE -->
                                 <td><form action="deletecustomer.php" method="post">
                                    <input class=" btn btn-danger px-3" type="submit" name="delete-customer" value="Delete">
                                    <input type="hidden" name="delete-id" value="<?php echo $rowviewCustomer['cust_id']?>">
                                </form> 
                                 </td> 
                                </tr>

                         <?php $viewpctr++;   } ?>
                            </tbody> 
                    </table>
                    
                            </div><!-- col 3 fin -->
                    </div><!-- panel header fin-->
                </div>
        </main>
</div>


    

<?php 
 require('./includes/scripts.php'); 
 require('./includes/session.php');

 if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>