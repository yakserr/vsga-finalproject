<?php
session_start();

// include config.php
include_once 'config.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_NAME ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Hero bar -->
    <div class="hero">
        <!-- Header  -->
        <nav class="navbar navbar-expand-lg navbar-light shadow-lg justify-content-between p-2">
            <a class="text-light" href="index.php">Perpus</a>
            <div class="navbar-nav">
                <?php if (isset($_SESSION['is_logged_in']) === true) : ?>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img width="30" src="assets/img/default.png" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="src/dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="src/auth/logout.php">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <a class="nav-link text-light" href="src/auth/login.php">Login</a>
                <?php endif; ?>
            </div>
        </nav>
        <!-- End Header  -->

        <!-- Section introduction and search bar  -->
        <div class="introduction ml-5 p-1 text-left text-white rounded-lg">
            <h1>Welcome to Perpus!</h1>
            <p>a website that provides borrowing, booking and reading books online</p>
            <div class="search-box">
                <form class="form-inline ">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search Book" aria-label="Search">
                    <button class="btn btn-outline-success text-white my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- End Section introduction and search bar  -->
    </div>
    <!-- End Hero bar -->


    <!--jQuery and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>