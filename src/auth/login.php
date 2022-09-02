<?php
session_start();

// include config.php
include_once '../../config.php';

// if user is logged in, redirect to dashboard
if (isset($_SESSION['is_logged_in']) === true) {
    header("location:../dashboard.php");
}

// check if there is a post submit
if (isset($_POST['submit'])) {

    // get the email and password from the form
    $email = $_POST['email'];
    $password = ($_POST['password']);

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // password verify
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
    $data = mysqli_fetch_assoc($sql);
    $hash_password_db = $data['password'];


    // validate the email
    if (!$data['email']) {

        header("location: login.php?error=login");
    } else {

        // validate the password
        if (password_verify($password, $hash_password_db)) {

            // set session
            // session data
            $_SESSION['id'] = $data['id_admin'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['is_logged_in'] = true;


            // redirect to dashboard
            header("location:../dashboard.php");
        } else {
            header("location: login.php?error=login");
        }
    }
}
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

    <link href="../../assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="hero">
        <nav class="navbar navbar-expand-lg navbar-light shadow-lg justify-content-between">
            <a class="text-light" href="../../index.php">Perpus</a>

        </nav>

        <div class="login-card ml-5 p-3 text-left rounded-lg">
            <?php if (isset($_GET['error']) && $_GET['error'] == 'login') { ?>
                <div class="error-message text-white bg-danger p-3 mb-3 rounded-lg" id='error-message'>
                    your email or password is incorrect, please try again !
                </div>
            <?php } ?>
            <div class="card mx-auto">
                <div class="card-header text-center">Login</div>
                <div class="card-body">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" name="submit" value='submit' class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    <!--jQuery and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- script -->
    <script>
        const elm_error = document.getElementById('error-message');
        const session_msg = "<?= $_SESSION['messages'] ?>";

        if (session_msg) {
            setTimeout(() => {
                elm_error.remove();
            }, 8000);
        }
    </script>
</body>

</html>