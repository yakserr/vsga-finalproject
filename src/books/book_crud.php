<?php
session_start();
include_once '../../config.php';

if (isset($_SESSION['is_logged_in']) === false) {
    header("location:../auth/login.php");
}

// var_dumps the data in the array
// echo '<pre>' . var_export($_POST, true) . '</pre>';
// die();

// if the form is submitted

if (isset($_POST['submit'])) {

    // if the form submit is create 
    if ($_POST['submit'] === 'create') {

        // take the data from the form and put it into variables
        $judul = $_POST['judul'];
        $keterangan = $_POST['keterangan'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];

        // Book Code
        $sql = mysqli_query($conn, "SELECT id_buku as id FROM buku ORDER BY id_buku DESC LIMIT 1");
        $row = mysqli_fetch_assoc($sql);
        $id = $row['id'] + 1;
        $kode_buku = 'M-' . $id;

        // save the data into the database
        $sql = mysqli_query($conn, "INSERT INTO buku (kode_buku, judul, keterangan, pengarang, penerbit, tahun) VALUES ( '$kode_buku' ,'$judul', '$keterangan', '$pengarang', '$penerbit', '$tahun')");

        // if the data is saved into the database
        if ($sql) {
            header("location: books.php?success=create");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    // if the form submit is update
    else if ($_POST['submit'] === 'update') {

        // take the data from the form and put it into variables
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $keterangan = $_POST['keterangan'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];

        // save the data into the database
        $sql = mysqli_query($conn, "UPDATE buku SET judul = '$judul', keterangan = '$keterangan', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun' WHERE id_buku = '$id'");

        // if the data is saved into the database
        if ($sql) {
            header("location: books.php?success=update");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else if ($_POST['submit'] === 'delete') {

        // take the data from the form and put it into variables
        $id = $_POST['id'];
        // save the data into the database
        $sql = mysqli_query($conn, "DELETE FROM buku WHERE id_buku = '$id'");

        // if the data is saved into the database
        if ($sql) {
            header("location: books.php?success=delete");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {

    // redirect to members page if thre
    header('location: members.php');
}
