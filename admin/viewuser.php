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
                    <h1 class="page-header">View Admin Users</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>View Admin Users
                        </li>
                    </ol> <!-- brd fin -->

                </div><!-- col fin-->
            </div><!-- row finish -->

            <div class="container border"><!-- row 2 begin -->
                <div class="container-fluid"><!-- col 3 beg -->
                <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Admin Users
                </div>
                <div class="card-body">
                <table class="table table-hover table-bordered table-responsive" id="datatablesSimple">
                    <thead>
                        <tr>
                        <th scope="col">Admin ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>

                        </tr>
                    </thead>
                     <tbody>
                       <?php 
                             $viewpctr =1;
                             $queryviewUser= "SELECT * FROM admin_info";
                             $sqlviewUser = mysqli_query($connection,$queryviewUser);
                             while($rowviewUser =mysqli_fetch_array($sqlviewUser)){
                                 $roleid = $rowviewUser['role_id'];
                             ?>
                                <tr>
                                  <td><?php echo $viewpctr;?></td>
                                <td><?php echo $rowviewUser['admin_firstName'];?></td>
                                 <td><?php echo $rowviewUser['admin_lastName'];?></td>
                                 <td><?php echo $rowviewUser['admin_email'];?></td>
                                <td>
                                    <?php 
                                        $queryuserRole = "SELECT * FROM admin_roles WHERE role_id = $roleid ";
                                        $sqluserRole = mysqli_query($connection,$queryuserRole);
                                        $rowuserRole =mysqli_fetch_array($sqluserRole);

                                        echo $rowuserRole['admin_role'];
                                    ?>
                                </td>
                                 <td><button class= "btn btn-danger px-3"> Delete</button></td> 
                             </tr>
                         <?php $viewpctr++;   } ?>
                            </tbody> 
                    </table>
                    
                            </div><!-- col 3 fin -->
                        </div><!-- row 2 fin -->
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