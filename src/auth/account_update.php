<?php
session_start();
require_once '../../config.php';

// var_dumps the data in the array
// echo '<pre>' . var_export($_POST, true) . '</pre>';
// die();

if (isset($_SESSION['is_logged_in']) === false) {
    header("Location:login.php");
}


// if there is button submit with value update
if (isset($_POST['submit'])) {

    // if the _POST[submit] is update
    if ($_POST['submit'] == 'update') {

        // store the value to variable
        $user_id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $image_file = $_FILES['image'];

        // if the image is not empty
        if ($image_file['name']) {

            $image_name = $image_file['name'];
            $image_size = $image_file['size'];
            $image_type = exif_imagetype($image_file["tmp_name"]);
            $numRand = rand(1, 99);
            $uniqueNameImage = $numRand . $image_name;

            // Exit if image file is zero bytes or greater than
            if ($image_size >= 2000000) {
                header('location: account.php?error=image_size');
            } else {
                // Exit if is not a valid image file
                if (!$image_type) {
                    header('location: account.php?error=image_type');
                } else {
                    // Move the temp image file to the images/ directory
                    move_uploaded_file($image_file["tmp_name"], "../../assets/img/profile_admin/" . $uniqueNameImage);

                    // update the data into the database
                    $sql = mysqli_query($conn, "UPDATE admin SET nama = '$nama', email = '$email', telp = '$telp', foto = '$uniqueNameImage' WHERE id_admin = '$user_id'");

                    // if the data is updated into the database
                    if ($sql) {
                        header('location: account.php?success=update');
                    } else {
                        header('location: account.php?error=update');
                    }
                }
            }
        } else {
            // update the data into the database
            $sql = mysqli_query($conn, "UPDATE admin SET nama = '$nama', email = '$email', telp = '$telp' WHERE id_admin = '$user_id'");

            // if the data is updated into the database
            if ($sql) {
                header('location: account.php?success=update');
            } else {
                header('location: account.php?error=update');
            }
        }
    } else if ($_POST['submit'] == 'change_password') {

        $user_id = $_POST['id'];
        $password = $_POST['password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '$user_id'");
        $data = mysqli_fetch_assoc($sql);
        $hash_password_db = $data['password'];


        if (password_verify($password, $hash_password_db)) {
            if ($new_password == $confirm_password) {
                $sql = mysqli_query($conn, "UPDATE admin SET password = '$hash_new_password' WHERE id_admin = '$user_id'");

                if ($sql) {
                    header('location: account.php?success=change_password');
                } else {
                    header('location: account.php?error=change_password');
                }
            } else {
                header('location: account.php?error=confirm_password');
            }
        } else {
            header('location: account.php?error=password');
        }
    }
} else {
    // redirect to account page
    header("Location:account.php");
}
