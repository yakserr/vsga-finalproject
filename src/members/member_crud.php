<?php
session_start();
include_once '../../config.php';

if (isset($_SESSION['is_logged_in']) === false) {
    header("location:../auth/login.php");
}

// var_dumps the data in the array
// echo '<pre>' . var_export($_POST, true) . '</pre>';
// echo '<pre>' . var_export($image_type, true) . '</pre>';
// die();

// if the form is submitted
if (isset($_POST['submit'])) {

    // if the form submit is create 
    if ($_POST['submit'] === 'create') {

        // take the data from the form and put it into variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Member Code
        $sql = mysqli_query($conn, "SELECT member_id as id FROM members ORDER BY member_id DESC LIMIT 1");
        $member = mysqli_fetch_assoc($sql);
        $id = $member['id'] + 1;
        $member_code = 'M-' . $id;

        // image process
        // check if the image is uploaded
        $image_file = $_FILES['image'];

        if ($image_file) {

            $image_name = $image_file['name'];
            $image_size = $image_file['size'];
            $image_type = exif_imagetype($image_file["tmp_name"]);
            $numRand = rand(1, 99);
            $uniqueNameImage = $numRand . $image_name;

            // Exit if image file is zero bytes or greater than

            if ($image_size >= 2000000) {
                header('location: members.php?error=image_size');
            } else {
                // Exit if is not a valid image file
                if (!$image_type) {
                    header('location: members.php?error=image_type');
                } else {
                    // Move the temp image file to the images/ directory
                    move_uploaded_file($image_file["tmp_name"], "../../assets/img/profile_user/" . $uniqueNameImage);

                    // save the data into the database
                    $sql = mysqli_query($conn, "INSERT INTO members (member_code, name, email, phone, photo, address) VALUES ( '$member_code' ,'$name', '$email', '$phone', '$uniqueNameImage', '$address')");

                    header('location: members.php?success=create');
                }
            }
        } else {

            // save the data into the database
            $sql = mysqli_query($conn, "INSERT INTO members (member_code, name, email, phone, address) VALUES ( '$member_code' ,'$name', '$email', '$phone', '$address')");

            header('location: members.php?success=create');
        }
    }
    // if the form submit is update
    else if ($_POST['submit'] === 'update') {
        // take the data from the form and put it into variables
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // image process
        // check if the image is uploaded
        $image_file = $_FILES['image'];

        if ($image_file) {

            $image_name = $image_file['name'];
            $image_size = $image_file['size'];
            $image_type = exif_imagetype($image_file["tmp_name"]);
            $numRand = rand(1, 99);
            $uniqueNameImage = $numRand . $image_name;

            $sql = mysqli_query($conn, "SELECT photo FROM members WHERE member_id = '$id'");
            $member = mysqli_fetch_assoc($sql);
            $image_old = $member['photo'];
            $image_path_old = "../../assets/img/profile_user/" . $image_old;


            // Exit if image file is zero bytes or greater than
            if ($image_size >= 2000000) {

                header('location: members.php?error=image_size');
            } else {
                // Exit if is not a valid image file
                if (!$image_type) {

                    header('location: members.php?error=image_type');
                } else {

                    // Move the temp image file to the images/ directory
                    move_uploaded_file($image_file["tmp_name"], "../../assets/img/profile_user/" . $uniqueNameImage);
                    // delete the old image
                    unlink($image_path_old);
                    // save the data into the database
                    $sql = mysqli_query($conn, "UPDATE members SET name = '$name', email = '$email', phone = '$phone', photo = '$uniqueNameImage', address = '$address' WHERE member_id = '$id'");
                    header('location: members.php?success=update');
                }
            }
        } else {
            // save the data into the database
            $sql = mysqli_query($conn, "UPDATE members SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE member_id = '$id'");
            header('location: members.php?success=update');
        }

        // save the data into the database
        // $sql = mysqli_query($conn, "UPDATE members SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE member_id = '$id'");
        // header('location: members.php?success=update');
    }
    // if the form submit is delete
    else if ($_POST['submit'] === 'delete') {
        // take the data from the form and put it into variables
        $id = $_POST['id'];

        // check if user have image
        $sql = mysqli_query($conn, "SELECT photo FROM members WHERE member_id = '$id'");
        $image = mysqli_fetch_assoc($sql);
        $image_file = "../../assets/img/profile_user/" . $image['photo'];

        if (file_exists($image_file)) {

            // delete the image file
            unlink($image_file);

            // delete data from database
            $sql = mysqli_query($conn, "DELETE FROM members WHERE member_id = '$id'");
            header('location: members.php?success=delete');
        } else {

            // delete data from database
            $sql = mysqli_query($conn, "DELETE FROM members WHERE member_id = '$id'");
            header('location: members.php?success=delete');
        }
    }
}
// if the form is not submitted and some errror occurs
else {

    // redirect to members page if thre
    header('location: members.php');
}
