<?php
session_start();
include_once '../../config.php';

if (isset($_SESSION['is_logged_in']) === false) {
    header("location:auth/login.php");
}

$admin = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '$_SESSION[id]'");
$admin = mysqli_fetch_assoc($admin);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Final Project -VSGA</title>

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
                    <!-- Master Data -->
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Profile</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <div class="menu-sidebar p-2 ">
                            <li class="nav-item">
                                <a class="nav-link active d-flex" href="account.php">
                                    <div class="icon align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                    <div class=" ml-2 text">
                                        <span>Profile</span>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <!-- End Master Data -->
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-2">
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
                            <a class="dropdown-item" href="account.php">My Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </div>

                <!-- if there is success message -->
                <?php if (isset($_GET['success'])) : ?>
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
                                <?php if ($_GET['success'] == 'update') : ?>
                                    <p class="">Data berhasil <span class="text-success">diupdate</span> !</p>
                                <?php elseif ($_GET['success'] == 'change_password') : ?>
                                    <p class="">Password berhasil <span class="text-success">diubah</span> !</p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <!-- if there is error message -->
                <?php elseif (isset($_GET['error'])) : ?>
                    <div aria-live="polite" aria-atomic="true" style="position: relative;">
                        <div class="toast border border-danger" data-delay="3000" style="position: absolute; top: 0; right: 0;">
                            <div class="toast-header ">
                                <strong class="mr-auto text-danger">Error</strong>
                                <small>recently</small>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                <?php if ($_GET['error'] == 'image_size') : ?>
                                    <p class="text-danger"> Ukuran Foto/Gambar terlalu besar !</p>
                                <?php elseif ($_GET['error'] == 'image_type') : ?>
                                    <p class="text-danger"> Tipe Foto/Gambar tidak cocok !</p>
                                <?php elseif ($_GET['error'] == 'upload') : ?>
                                    <p class="text-danger"> Error saat upload data !</p>
                                <?php elseif ($_GET['error'] == 'password') : ?>
                                    <p class="text-danger"> cek kembali password baru !</p>
                                <?php elseif ($_GET['error'] == 'change_password') : ?>
                                    <p class="text-danger"> error merubah password !</p>
                                <?php elseif ($_GET['error'] == 'confirm_password') : ?>
                                    <p class="text-danger"> current password tidak cocok !</p>

                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <!-- EndToast -->

                <!-- Body -->
                <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3">
                    <div class="greetings">
                        <h3 class="font-weight-bolder">Anggota Edit Form</h3>
                    </div>
                </div>

                <!-- Table -->
                <div class="row mt-4">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card rounded-lg">
                            <div class="card-body">
                                <!-- title -->
                                <div>
                                    <div class="mb-4">
                                        <div class="header-table d-flex justify-content-between">
                                            <h4 class="card-title">Anggota Edit</h4>
                                            <div class="btn-toolbar mb-2 mb-md-0">
                                            </div>
                                        </div>
                                        <!-- Form Create Modal -->
                                        <form action="account_update.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="container">
                                                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" class="form-control submit" id="nama" name="nama" value="<?= $admin['nama'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="<?= $admin['email'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telp">No. Telp</label>
                                                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $admin['telp'] ?>" required>
                                                            </div>
                                                            <div class="form-group mt-5">
                                                                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
                                                                    Ganti Password
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mr-auto justify-content-center align-items-center">
                                                            <div class="img">
                                                                <label for="images">Foto</label>
                                                                <?php if ($admin['foto']) : ?>
                                                                    <img class="img-preview img-fluid" src="../../assets/img/profile_admin/<?= $admin['foto'] ?>" alt="" width="100%">
                                                                <?php else : ?>
                                                                    <img class="img-preview img-fluid">
                                                                <?php endif ?>
                                                            </div>
                                                            <div class="form-group input-group mt-2">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="image" onchange="previewImage()">
                                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary" name="submit" value='update'>
                                                            Simpan dan Ubah
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--  End Form Create Modal -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createModalLabel">Form Anggota</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- Form Create Modal -->
                                                    <form action="account_update.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                                                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                                                <div class="form-group">
                                                                    <label for="password">Current Password</label>
                                                                    <input type="password" class="form-control submit" id="password" name="password" placeholder="Current password" required>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="form-group">
                                                                        <label for="new_password">New Password</label>
                                                                        <input type="password" class="form-control submit" id="new_password" name="new_password" placeholder="new_password" required>
                                                                    </div>
                                                                    <div class="form-group ml-5">
                                                                        <label for="confirm_password">Confirm Your Password</label>
                                                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm_password" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="submit" value='change_password'>
                                                                        Ganti
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!--  End Form Create Modal -->

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Body -->
        </div>
        <!-- End Body -->
    </div>
    <!-- End Table -->

    <!-- End Body -->

    </main>
    </div>
    </div>

    <!-- Bootstrap CDN JS & Jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="../../assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>

    <script>
        let form = document.forms[0];
        console.log(form);
        form.addEventListener('submit', function() {
            let a = document.getElementsByName('password')[0];
            if (a.value === '') {
                a.disabled = true;
                a.removeAttribute("name");
            }
        });
    </script>
</body>

</html>