<!DOCTYPE html>
<html lang="en">
   <?php 
   require('./includes/header.php'); 
   require('./includes/navbar.php'); 
   require('./includes/sidebar.php'); 
   require('./includes/database.php');
   require('./includes/scripts.php'); 

    
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <div class="row"> <!-- row begin -->
                <div class="col-lg-12"> <!-- col begin-->
                    <h1 class="page-header">Edit User Profile</h1>

                    <ol class="breadcrumb"> <!-- brd begin -->
                        <li class="active">
                            <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>Edit User Profile
                        </li>
                    </ol> <!-- brd fin -->

                </div><!-- col fin-->
            </div><!-- row finish -->
            <?php    
                $admin_id = $_SESSION['admin_id'];
                $queryadminInfo = "SELECT * FROM admin_info WHERE admin_id = '$admin_id'";
                $sqladminInfo = mysqli_query($connection, $queryadminInfo);
                $rowadminInfo = mysqli_fetch_array($sqladminInfo);
            ?>
            <div class="container border mt-4 pt-3 ">
                            <div class="container-fluid">
                                 <form action ="edituser.php" method="post"  class="needs-validation" novalidate>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" type="text" name="adminfirstName" placeholder="Enter your first name" value = "<?php echo $rowadminInfo['admin_firstName']; ?>"   required/>
                                                <label for="inputFirstName">First name</label>
                                                <div class="invalid-feedback">
                                                 Please input your first name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="inputLastName" type="text" name="adminlastName" placeholder="Enter your last name" value = "<?php echo $rowadminInfo['admin_lastName']; ?>"required />
                                                <label for="inputLastName">Last name</label>
                                                <div class="invalid-feedback">
                                                 Please input your last name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="email" name="adminEmail" placeholder="name@example.com" value = "<?php echo $rowadminInfo['admin_email']; ?>"required />
                                        <label for="inputEmail">Email address</label>
                                        <div class="invalid-feedback">
                                                 Please input your valid E-mail.
                                                </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                            <select class="form-control" name="select-role"  required>
                                            <option value="<?php echo $rowadminInfo['role_id']; ?>" selected>
                                            <?php 
                                                    $roleid = $rowadminInfo['role_id'];
                                                    $querygetRole = "SELECT * FROM admin_roles WHERE role_id = '$roleid'";
                                                    $sqlgetRole = mysqli_query($connection,$querygetRole);
                                                    $rowGetRole = mysqli_fetch_array($sqlgetRole);

                                                    echo $rowGetRole['admin_role'];
                                            ?>
                                        </option>
                                            <?php 
                                                $queryuserRole = "SELECT * FROM admin_roles";
                                                $sqluserRole = mysqli_query($connection,$queryuserRole);
                                               while( $rowuserRole =mysqli_fetch_array($sqluserRole)){
                                                    $roleid = $rowuserRole['role_id'];
                                                ?>
                                                <option value="<?php echo $roleid; ?>"><?php echo $rowuserRole['admin_role']; ?></option>
                                                <?php
                                               }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-secondary btn-block" type="submit" name="edit-user">Save Changes</button></div>
                                    </div>
                                </form>
                            </div>
            </div>
        </main>
</div>
    

<?php 
    
 if(isset($_POST['edit-user'])){
     $newadmin_firstname = $_POST['adminfirstName'];
     $newadmin_lastname = $_POST['adminlastName'];
     $newadmin_email = $_POST['adminEmail'];
     $newadmin_role = $_POST['select-role'];

     $queryeditadmin = "UPDATE admin_info SET admin_firstName = '$newadmin_firstname', admin_lastName = '$newadmin_lastname', admin_email ='$newadmin_email',role_id = '$newadmin_role'  WHERE  admin_id = '$admin_id'";
     $sqleditadmin = mysqli_query($connection, $queryeditadmin);
     
     if($sqleditadmin){
        echo ' <script>   swal({
            title: "Changes saved! ",
            text: "Changes have been saved successfully",
            icon: "success",
            button: false,  
            timer :2000,
          }).then(function() {
            window.location = "viewuser.php";
        });
          </script> ';
     }
 }
            
 require('./includes/session.php');
 
 if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }   
?>