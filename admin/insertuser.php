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
                                  <h1 class="page-header">Insert Admin Users</h1>

                                  <ol class="breadcrumb"> <!-- brd begin -->
                                      <li class="active">
                                          <i class="fas fa-tachometer-alt"></i>Dashboard/<i class="fas fa-box-open"></i>Insert Admin Users
                                      </li>
                                  </ol> <!-- brd fin -->

                              </div><!-- col begin-->
                          </div><!-- row finish -->

                          <div class="container border mt-4 pt-3 ">
                            <div class="container-fluid">
                                 <form action ="insertuser.php" method="post"  class="needs-validation" novalidate>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" type="text" name="adminfirstName" placeholder="Enter your first name"  required/>
                                                <label for="inputFirstName">First name</label>
                                                <div class="invalid-feedback">
                                                 Please input your first name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="inputLastName" type="text" name="adminlastName" placeholder="Enter your last name"required />
                                                <label for="inputLastName">Last name</label>
                                                <div class="invalid-feedback">
                                                 Please input your last name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="email" name="adminEmail" placeholder="name@example.com"required />
                                        <label for="inputEmail">Email address</label>
                                        <div class="invalid-feedback">
                                                 Please input your valid E-mail.
                                                </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                            <select class="form-control" name="select-role" required>
                                            <option value="" disabled selected>Select Role</option>
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
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPassword" type="password" name="adminPassword" placeholder="Create a password"required />
                                                <label for="inputPassword">Password</label>
                                                <div class="invalid-feedback">
                                                 Please create your password.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPasswordConfirm" name="adminconfirmPassword" type="password" placeholder="Confirm password" required/>
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                                <div class="invalid-feedback">
                                                 Please confirm your password.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                   
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-secondary btn-block" type="submit" name="insert-user">Create Account</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="logout.php">Have an account? Go to login</a></div>
                            </div>
                            </div>
                        </main>
                          </div>
                          
                         <?php  if(isset($_POST['insert-user'])){ 
                             
                             $admin_firstName =$_POST['adminfirstName'];
                             $admin_lastName =$_POST['adminlastName'] ;
                             $admin_Email =$_POST['adminEmail'] ;
                             $admin_Role = $_POST['select-role'];
                             $adminPassword =$_POST['adminPassword'] ;
                             $adminconfirmPassword = $_POST['adminconfirmPassword'] ;

                             if($adminPassword !== $adminconfirmPassword){
                              echo "<script>alert('Password does not match!')</script>";
                             }else{
                               $queryinsertUser ="INSERT INTO admin_info VALUES (null,'$admin_firstName','$admin_lastName','$admin_Email',md5('$adminPassword'), '$admin_Role')"; 
                               $sqlinsertUser =mysqli_query($connection,$queryinsertUser);

                                if($sqlinsertUser){
                                         echo "<script>alert('Successfully Added!')</script>";
                                        echo "<script>window.location.href ='./insertuser.php'</script>"; 
                                }
                               
                             }
                           }
                         

                         ?>

<?php 
 require('./includes/scripts.php'); 
 require('./includes/session.php');

 if($_SESSION['user'] !== 'admin'){
    echo "<script>window.location.href ='../login.php'</script>";
    }
?>