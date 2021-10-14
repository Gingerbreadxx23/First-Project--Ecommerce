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
                            <h1 class="page-header">Sales</h1>

                            <ol class="breadcrumb"> <!-- brd begin -->
                                <li class="active">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard/ <i class="fas fa-money-bill-wave"></i>Sales
                                </li>
                            </ol> <!-- brd fin -->

                        </div><!-- col begin-->
                    </div><!-- row finish -->
                    <div class="row">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <i class="fas fa-table me-1"></i>
                                                    Sales
                                                </div>
                                                <div class="card-body">
                                                    <table id="datatablesSimple">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Order Code</th>
                                                                            <th> Product Name</th>
                                                                            <th>Quantity</th>
                                                                            <th>Date</th>
                                                                            <th>Total Sales</th>
                                                                        </tr>
                                                                     </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>00003</td>
                                                                            <td>Oppo f1</td>
                                                                            <td>1</td>
                                                                            <td>2021-10-01 23:46:26</td>
                                                                            <td>4999</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>00005</td>
                                                                            <td>Laptop</td>
                                                                            <td>1</td>
                                                                            <td>2021-10-08 11:10:20</td>
                                                                            <td>3999</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>00004</td>
                                                                            <td>Miband4</td>
                                                                            <td>1</td>
                                                                            <td>2021-10-08 11:10:20</td>  
                                                                            <td>2000</td>
                                                                        </tr>
                                                                    </tbody> 
                                                
                                                </table>
                                            </div> 
                </main>
            </div>
        </div> 
    
        
<?php 
require('./includes/scripts.php'); 
require('./includes/session.php');

// AVOID ACCESS FROM ACCOUNTS
if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
}

?>