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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $year = $_POST['year'];

        // Book Code
        $sql = mysqli_query($conn, "SELECT book_id as id FROM books ORDER BY book_id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($sql);
        $id = $row['id'] + 1;
        $book_code = 'M-' . $id;

        // save the data into the database
        $sql = mysqli_query($conn, "INSERT INTO books (book_code, title, description, author, publisher, year) VALUES ( '$book_code' ,'$title', '$description', '$author', '$publisher', '$year')");

        // if the data is saved into the database
        if ($sql) {
            header("location:../books/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        header('location: books.php?success=create');
    }
    // if the form submit is update
    else if ($_POST['submit'] === 'update') {

        // take the data from the form and put it into variables
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $year = $_POST['year'];

        // save the data into the database
        $sql = mysqli_query($conn, "UPDATE books SET title = '$title', description = '$description', author = '$author', publisher = '$publisher', year = '$year' WHERE book_id = '$id'");

        // if the data is saved into the database
        if ($sql) {
            header("location:../books/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        header('location: books.php?success=update');
    }
    // if the form submit is delete
    else if ($_POST['submit'] === 'delete') {

        // take the data from the form and put it into variables
        $id = $_POST['id'];
        // save the data into the database
        $sql = mysqli_query($conn, "DELETE FROM books WHERE book_id = '$id'");

        // if the data is saved into the database
        if ($sql) {
            header("location:../books/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        header('location: books.php?success=delete');
    }
} else {

    // redirect to members page if thre
    header('location: members.php');
}
