<?php
session_start();
include_once '../../../config.php';

if (isset($_SESSION['is_logged_in']) === false) {
    header("location:../../auth/login.php");
}

// var_dumps the data in the array
// echo '<pre>' . var_export($_POST, true) . '</pre>';
// die();

// if the form is submitted
if (isset($_POST['submit'])) {

    // if the form submit is create 
    if ($_POST['submit'] === 'create') {

        // take the data from the form and put it into variables
        $tgl_kembali_asli = $_POST['tgl_kembali_asli'];
        $idTrx_buku = $_POST['idTrx_buku'];

        // update status buku
        $sql_transaksi = mysqli_query($conn, "SELECT id_buku FROM transaksi WHERE id_transaksi = '$idTrx_buku'");
        $row_transaksi = mysqli_fetch_assoc($sql_transaksi);
        $id_buku = $row_transaksi['id_buku'];
        $sql_buku = mysqli_query($conn, "UPDATE buku SET status = 'Available' WHERE id_buku = '$id_buku'");


        // update tgl_kembali_asli into database
        $sql = mysqli_query($conn, "UPDATE transaksi SET tgl_kembali_asli = '$tgl_kembali_asli' WHERE id_transaksi = '$idTrx_buku'");


        // if the data is saved into the database, show the success message
        if ($sql && $sql_buku) {
            header('location: returns.php?success=create');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // if the form submit is update
    else if ($_POST['submit'] === 'update') {

        $id = $_POST['id'];
        $tgl_kembali_asli = $_POST['tgl_kembali_asli'];


        $sql = mysqli_query($conn, "UPDATE transaksi SET tgl_kembali_asli = '$tgl_kembali_asli' WHERE id_transaksi = '$id'");

        // if the data is saved into the database, show the success message

        if ($sql) {
            header('location: returns.php?success=update');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    // if the form submit is delete
    else if ($_POST['submit'] === 'delete') {
        $id = $_POST['id'];

        // update status buku
        $sql_transaksi = mysqli_query($conn, "SELECT id_buku FROM transaksi WHERE id_transaksi = '$id)'");
        $row_transaksi = mysqli_fetch_assoc($sql_transaksi);
        $id_buku = $row_transaksi['id_buku'];
        $sql_buku = mysqli_query($conn, "UPDATE buku SET status = 'Booked' WHERE id_buku = '$id_buku'");

        $sql = mysqli_query($conn, "UPDATE transaksi SET tgl_kembali_asli = null WHERE id_transaksi = '$id'");


        if ($sql && $sql_buku) {
            header('location: returns.php?success=delete');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    header("location:returns.php");
}
