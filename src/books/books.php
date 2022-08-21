<?php
session_start();
include_once '../../config.php';

// echo '<pre>' . var_export($_SERVER, true) . '</pre>';
// die();

// if user is not logged in, redirect to login page
if (isset($_SESSION['is_logged_in']) === false) {
    header("location:../auth/login.php");
}

// query to get all members
$membersAll = mysqli_query($conn, "SELECT * FROM books");

// pagination
$limit = 10;
$page = $_GET['page'] ??  1;
$page = ($page < 1) ? 1 : $page;
$start = ($page - 1) * $limit;
$prev = $page - 1 == 0 ? 1 : $page - 1;
$next = $page + 1;

$total_data = mysqli_num_rows($membersAll);
$total_page = ceil($total_data / $limit);

$books = mysqli_query($conn, "SELECT * FROM books LIMIT $start , $limit");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title><?= APP_NAME ?></title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow pt-2">
                <div class="logo pl-3">
                    <a href="dashboard.php">
                        <img src="../../assets/img/logo2.png" width="150" alt="">
                    </a>
                </div>
                <div class="sidebar-sticky pt-3">
                    <!-- Dashboard -->
                    <ul class="nav flex-column">
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item ">
                                <a class="nav-link d-flex " href="../dashboard.php">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <!-- End Dashboard -->

                    <!-- Master Data -->
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Master Data</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <!-- Members -->
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="../members/members.php">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-microsoft-teams" viewBox="0 0 16 16">
                                            <path d="M9.186 4.797a2.42 2.42 0 1 0-2.86-2.448h1.178c.929 0 1.682.753 1.682 1.682v.766Zm-4.295 7.738h2.613c.929 0 1.682-.753 1.682-1.682V5.58h2.783a.7.7 0 0 1 .682.716v4.294a4.197 4.197 0 0 1-4.093 4.293c-1.618-.04-3-.99-3.667-2.35Zm10.737-9.372a1.674 1.674 0 1 1-3.349 0 1.674 1.674 0 0 1 3.349 0Zm-2.238 9.488c-.04 0-.08 0-.12-.002a5.19 5.19 0 0 0 .381-2.07V6.306a1.692 1.692 0 0 0-.15-.725h1.792c.39 0 .707.317.707.707v3.765a2.598 2.598 0 0 1-2.598 2.598h-.013Z" />
                                            <path d="M.682 3.349h6.822c.377 0 .682.305.682.682v6.822a.682.682 0 0 1-.682.682H.682A.682.682 0 0 1 0 10.853V4.03c0-.377.305-.682.682-.682Zm5.206 2.596v-.72h-3.59v.72h1.357V9.66h.87V5.945h1.363Z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Members</span>
                                    </div>
                                </a>
                            </li>
                        </div>

                        <!-- Books -->
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item">
                                <a class="nav-link active d-flex" href="books.php">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Books</span>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <!-- End Books -->

                    </ul>
                    <!-- End Master Data -->

                    <!-- Transaction -->
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Transaction</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2 ">

                        <!-- Borrow Transaction -->
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="#">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Borrow Transaction</span>
                                    </div>
                                </a>
                            </li>
                        </div>

                        <!-- Return Transaction -->
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="#">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Return Transaction</span>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <!-- End Return Transaction -->
                    </ul>

                    <!-- Report Transaction -->
                    <ul class="nav flex-column">
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="#">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Report Transaction</span>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <!-- End Report Transaction -->

                    <!-- Transaction -->

                </div>
            </nav>

            <!--  Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-2">
                <!-- Header -->
                <div class="d-flex justify-content-between">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search & enter" aria-label="Search">
                    </form>
                    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <li class="nav-item dropdown list-unstyled pr-0 pl-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img width="35" src="../../assets/img/default.png" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" href="auth/logout.php">Logout</a>
                        </div>
                    </li>
                </div>
                <!-- End Header -->

                <!-- Toast -->
                <!-- create -->
                <?php if (isset($_GET['success']) == 'create') : ?>
                    <div aria-live="polite" aria-atomic="true" style="position: relative;">
                        <div class="toast border border-success" data-delay="3000" style="position: absolute; top: 0; right: 0;">
                            <div class="toast-header ">
                                <strong class="mr-auto text-success">Success</strong>
                                <small>recently</small>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                <?php if ($_GET['success'] == 'create') : ?>
                                    <p class="">Data successfully <span class="text-success">Created</span> !</p>
                                <?php elseif ($_GET['success'] == 'update') : ?>
                                    <p class="">Data successfully <span class="text-warning">Updated</span> !</p>
                                <?php elseif ($_GET['success'] == 'delete') : ?>
                                    <p class="">Data successfully <span class="text-danger">Deleted</span> !</p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- EndToast -->

                <!-- Body -->
                <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3">
                    <div class="greetings">
                        <div class="nav bread-crumb">
                            <ol class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <a href="../dashboard.php" class="text-decoration-none text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door mr-1" viewBox="0 0 16 16">
                                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="mr-1">/</li>
                                <li class="mr-1 align-bottom">
                                    <a href="members.php" class="text-decoration-none">Books</a>
                                </li>
                            </ol>
                        </div>
                        <h3 class="font-weight-bolder">Books</h3>
                    </div>
                </div>

                <!-- table -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card rounded-lg">
                            <div class="card-body">
                                <!-- title -->
                                <div>
                                    <div class="mb-4">
                                        <div class="header-table d-flex justify-content-between">
                                            <h4 class="card-title">Information Books</h4>
                                            <div class="btn-toolbar mb-2 mb-md-0">
                                                <li class="nav-item dropdown list-unstyled pr-0 pl-0">
                                                    <button type="button" class="nav-link dropdown-toggle border border-secondary bg-white text-muted" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span data-feather="calendar"></span>
                                                        This week
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="#">Share</a>
                                                        <a class="dropdown-item" href="auth/logout.php">Export</a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                        <p class="text-muted">Overview of detail information of Books</p>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                            Create
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createModalLabel">Form Books</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- Form Create Modal -->
                                                    <form action="book_crud.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="form-group">
                                                                            <label for="title">Title</label>
                                                                            <input type="text" class="form-control submit" id="title" name="title" placeholder="Title" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea id="description" name="description" placeholder="Description or synopsis of the book" class="form-control" rows="3" required></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="author">Author</label>
                                                                            <input type="author" class="form-control" id="author" name="author" placeholder="Author" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="publisher">publisher</label>
                                                                            <input type="text" class="form-control" id="publisher" name="publisher" placeholder="publisher" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="year">Year Rilis</label>
                                                                            <input type="text" class="form-control" id="year" name="year" placeholder="Year Rilis" required>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="submit" value='create'>
                                                                        Create
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!--  End Form Create Modal -->

                                                </div>
                                            </div>
                                        </div>

                                        <!-- title -->
                                        <div class="table-responsive mb-2">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Book Code</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Author</th>
                                                        <th>publisher</th>
                                                        <th>Publish Year</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($books as $book) : ?>
                                                        <tr class="text-nowrap">
                                                            <td><?= $book['book_code'] ?></td>
                                                            <td><?= $book['title'] ?></td>
                                                            <td><?= strlen($book['description']) > 70 ? substr($book['description'], 0, 70) . "..." : $book['description']; ?></td>
                                                            <td><?= $book['author'] ?></td>
                                                            <td><?= $book['publisher'] ?></td>
                                                            <td><?= $book['year'] ?></td>
                                                            <td>
                                                                <div class="d-flex flex-row">
                                                                    <button type="button" class="btn btn-primary btn-sm mr-1">
                                                                        <a href="?card=<?= $book['book_id'] ?>" class="text-white">Card</a>
                                                                    </button>
                                                                    <button type="button" class="btn btn-warning btn-sm mr-1">
                                                                        <a href="book_edit.php?id=<?= $book['book_id'] ?>" class="text-white">Edit</a>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#deleteModal<?= $book['book_id'] ?>">
                                                                        <a class="text-white">Delete</a>
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <form action="book_crud.php" method="post">
                                                                        <input type="hidden" name="id" value="<?= $book['book_id'] ?>" />
                                                                        <div class=" modal fade" id="deleteModal<?= $book['book_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Data <?= $book['book_code'] ?></h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Are you sure you want to delete this Book?
                                                                                    </div>
                                                                                    <div class=" modal-footer">
                                                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" name="submit" value="delete" class="btn btn-danger">Delete</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Pagination -->
                                        <nav aria-label="">
                                            <ul class="pagination">
                                                <!-- Previous -->
                                                <?php if ($page == 1) : ?>
                                                    <li class="page-item disabled">
                                                        <a class="page-link">Previous</a>
                                                    </li>
                                                <?php else : ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="members.php?page=<?= $page - 1 ?>">Previous</a>
                                                    </li>
                                                <?php endif; ?>

                                                <!-- Number -->
                                                <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                                                    <?php if ($i == $page) : ?>
                                                        <li class="page-item active" aria-current="page">
                                                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                        </li>
                                                    <?php else : ?>
                                                        <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                                                    <?php endif; ?>
                                                <?php endfor; ?>

                                                <!-- Next -->
                                                <?php if ($page == $total_page) : ?>
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                <?php else : ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                        <!-- End Pagination -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>

            </main>
            <!-- End Content -->
        </div>
        <!-- End Page Content -->
        <!-- End Page Container -->
    </div>

    <!-- Bootstrap CDN JS & Jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="../../assets/js/app.js"></script>

    <!-- toast  -->
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
</body>

</html>