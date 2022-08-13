<?php
session_start();
include_once '../config.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title> <?= APP_NAME ?> </title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Custom CSS -->
    <link href="../vendor/admin/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader-->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main wrapper - -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <!-- Top bar header -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">

                    <!-- Logo -->
                    <a class="navbar-brand" href="<?= $_SERVER['PHP_SELF'] ?>">
                        <span class="logo-text">
                            <img src="../assets/img/logo2.png" width="150" height="50" alt="homepage" />
                        </span>
                    </a>
                    <!-- End Logo -->

                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                </div>
                <!-- End Logo -->

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav float-start me-auto">

                        <!-- Search -->
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li> -->
                    </ul>

                    <!-- Right side toggle and nav items -->
                    <ul class="navbar-nav float-end">

                        <!-- User profile and search -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../vendor/admin/assets/images/users/profile.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="auth/logout.php"><i class="ti-email m-r-5 m-l-5"></i>
                                    Logout</a>
                            </ul>
                        </li>

                        <!-- User profile and search -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= $_SERVER['PHP_SELF'] ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard">
                                </i>
                                <span class="hide-menu">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-account-network">
                                </i><span class="hide-menu">
                                    Data Master
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-account-network">
                                </i><span class="hide-menu">
                                    Data Transaksi
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-account-network">
                                </i><span class="hide-menu">
                                    Laporan Transaksi
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->

            </div>
            <!-- End Sidebar scroll-->

        </aside>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item">
                                    <a href="index.html" class="link">
                                        <i class="mdi mdi-home-outline fs-4">
                                        </i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->

            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- Sales chart -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Sales Summary</h4>
                                        <h6 class="card-subtitle">Ample admin Vs Pixel admin</h6>
                                    </div>
                                    <div class="ms-auto d-flex no-block align-items-center">
                                        <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                            <li class="list-inline-item d-flex align-items-center text-info"><i class="fa fa-circle font-10 me-1"></i> Ample
                                            </li>
                                            <li class="list-inline-item d-flex align-items-center text-primary"><i class="fa fa-circle font-10 me-1"></i> Pixel
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="amp-pxl mt-4" style="height: 350px;">
                                    <div class="chartist-tooltip"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Weekly Stats</h4>
                                <h6 class="card-subtitle">Average sales</h6>
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                    <span class="btn btn-primary btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-cart-outline fs-4"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Top Sales</h5>
                                        <span class="text-muted fs-6">Johnathan Doe</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-warning btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-star-circle fs-4"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Best Seller</h5>
                                        <span class="text-muted fs-6">MaterialPro Admin</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-success btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-comment-multiple-outline text-white fs-4"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Most Commented</h5>
                                        <span class="text-muted fs-6">Ample Admin</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+68%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-info btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-diamond fs-4 text-white"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Top Budgets</h5>
                                        <span class="text-muted fs-6">Sunil Joshi</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+15%</span>
                                    </div>
                                </div>

                                <div class="pt-3 d-flex align-items-center">
                                    <span class="btn btn-danger btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-content-duplicate fs-4 text-white"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Best Designer</h5>
                                        <span class="text-muted fs-6">Nirav Joshi</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales chart -->


                <!-- Table -->

                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Top Selling Products</h4>
                                        <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                <option value="0" selected>Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Products</th>
                                                <th class="border-top-0">License</th>
                                                <th class="border-top-0">Support Agent</th>
                                                <th class="border-top-0">Technology</th>
                                                <th class="border-top-0">Tickets</th>
                                                <th class="border-top-0">Sales</th>
                                                <th class="border-top-0">Earnings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-info text-white">EA</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Single Use</td>
                                                <td>John Doe</td>
                                                <td>
                                                    <label class="badge bg-danger">Angular</label>
                                                </td>
                                                <td>46</td>
                                                <td>356</td>
                                                <td>
                                                    <h5 class="m-b-0">$2850.06</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-orange text-white">MA</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Monster Admin</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Single Use</td>
                                                <td>Venessa Fern</td>
                                                <td>
                                                    <label class="badge bg-info">Vue Js</label>
                                                </td>
                                                <td>46</td>
                                                <td>356</td>
                                                <td>
                                                    <h5 class="m-b-0">$2850.06</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-success text-white">MP</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Single Use</td>
                                                <td>John Doe</td>
                                                <td>
                                                    <label class="badge bg-success">Bootstrap</label>
                                                </td>
                                                <td>46</td>
                                                <td>356</td>
                                                <td>
                                                    <h5 class="m-b-0">$2850.06</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-purple text-white">AA</a>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Ample Admin</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Single Use</td>
                                                <td>John Doe</td>
                                                <td>
                                                    <label class="badge bg-purple">React</label>
                                                </td>
                                                <td>46</td>
                                                <td>356</td>
                                                <td>
                                                    <h5 class="m-b-0">$2850.06</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Container fluid  -->


            <!-- footer -->

            <footer class="footer text-center">
                All Rights Reserved by Flexy Admin. Designed and Developed by <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>

            <!-- End footer -->

        </div>

        <!-- End Page wrapper  -->

    </div>
    <!-- All Jquery -->
    <script src="../vendor/admin/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../vendor/admin/js/bootstrap.bundle.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../vendor/admin/js/custom.js"></script>
</body>

</html>