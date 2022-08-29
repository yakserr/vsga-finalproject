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
        $buku = $_POST['buku'];
        $anggota = $_POST['anggota'];
        $pinjam = $_POST['pinjam'];
        $kembali = $_POST['kembali'];

        // save the data into the database
        $sql = mysqli_query($conn, "INSERT INTO transaksi (id_buku, id_anggota, tgl_pinjam, tgl_kembali) VALUES ('$buku', '$anggota', '$pinjam', '$kembali')");

        // udpate status buku by id
        $sql_buku = mysqli_query($conn, "UPDATE buku SET status = 'Booked' WHERE id_buku = '$buku'");

        // if the data is saved into the database, show the success message
        if ($sql && $sql_buku) {
            header('location: borrows.php?success=create');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // if the form submit is update
    else if ($_POST['submit'] === 'update') {

        $id = $_POST['id'];
        $buku = $_POST['buku'];
        $pinjam = $_POST['pinjam'];
        $kembali = $_POST['kembali'];

        // update status old buku by id_buku
        $get_old_buku = mysqli_query($conn, "SELECT id_buku FROM transaksi WHERE id_transaksi = '$id'");
        $old_buku = mysqli_fetch_assoc($get_old_buku);
        $sql_old_buku = mysqli_query($conn, "UPDATE buku SET status = 'Available' WHERE id_buku = '$old_buku[id_buku]'");

        $sql = mysqli_query($conn, "UPDATE transaksi SET id_buku = '$buku', tgl_pinjam = '$pinjam', tgl_kembali = '$kembali' WHERE id_transaksi = '$id'");

        // update status buku by id
        $sql_buku = mysqli_query($conn, "UPDATE buku SET status = 'Booked' WHERE id_buku = '$buku'");

        // if the data is saved into the database, show the success message

        if ($sql) {
            header('location: borrows.php?success=update');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // if the form submit is delete
    else if ($_POST['submit'] === 'delete') {

        $id = $_POST['id'];
        $id_buku = $_POST['id_buku'];

        // update buku by id_buku into ready
        $sql_buku = mysqli_query($conn, "UPDATE buku SET status = 'Available' WHERE id_buku = '$id_buku'");

        $sql = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id'");


        // if the sql has commit the query, show the success message

        if ($sql && $sql_buku) {
            header('location: borrows.php?success=delete');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    header('location: borrows.php');
}
