<?php 
session_start();

?>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <li class="active"><a class="nav-link"  href="index.php" > 
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a></li>
                            <input type="hidden" name="clickdash" value="clicked">
                             <div class="sb-sidenav-menu-heading">Products</div> 
                             <!-- PRODUCTS -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <form action="#" method="get">
                                    <li class="active"><a class="nav-link" href="insertproduct.php" name="insertproduct">Insert Products</a></li>
                                    <li class="active"><a class="nav-link" href="viewproduct.php" name="insertproduct">View Products</a></li>
                                    </form>
                                </nav>
                            </div> 
                             <!-- PRODUCT CATEGORIES-->
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProductCategories" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                Product Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProductCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="insertcategory.php">Insert Categories</a>
                                    <a class="nav-link" href="viewcategory.php">View Categories</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="inventory.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Inventory Master
                            </a>
                            <div class="sb-sidenav-menu-heading">SHOP</div> 
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <a class="nav-link" href="viewcustomer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Customers
                            </a>
                            <a class="nav-link" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Order Master
                            </a>
                            <a class="nav-link" href="sales.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                                Sales
                            </a>
                            <!-- Interface
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInterface" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                                Interface
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseInterface" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <form action="#" method="get">
                                    <li class="active"><a class="nav-link" href="insertproduct.php" name="insertproduct">Advertisement</a></li>
                                    <li class="active"><a class="nav-link" href="viewproduct.php" name="insertproduct">Landing Page Picture</a></li>
                                    </form>
                                </nav>
                            </div>  -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="insertuser.php">Insert User</a>
                                    <a class="nav-link" href="viewuser.php">View Users</a>
                                    <a class="nav-link" href="edituser.php">Edit User Profile</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 
                            $admin_fname =$_SESSION['admin_firstName'];
                            $admin_lname =$_SESSION['admin_lastName'];
                            echo $admin_fname .' ' . $admin_lname;
                           
                        ?>
                    </div>
                </nav>
            </div>