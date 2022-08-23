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
        $book = $_POST['book'];
        $member = $_POST['member'];
        $borrow_date = $_POST['borrow'];
        $return_date = $_POST['return'];

        // transaction code
        $sql = mysqli_query($conn, "SELECT transaction_id as id FROM transactions ORDER BY transaction_id DESC LIMIT 1");
        $transaction = mysqli_fetch_assoc($sql);
        $id = $transaction['id'] + 1;
        $transaction_code = 'T-' . $id;
        $status = 'close';

        // save the data into the database
        $sql = mysqli_query($conn, "INSERT INTO transactions (transaction_code, book_id, member_id, borrow_date, return_date) VALUES ( '$transaction_code' ,'$book', '$member', '$borrow_date', '$return_date')");

        $sql = mysqli_query($conn, "UPDATE books SET status = '$status' WHERE book_id = '$book'");

        header('location: borrows.php?success=create');
    }

    // if the form submit is update
    if ($_POST['submit'] === 'update') {

        $id = $_POST['id'];
        $book = $_POST['book'];
        $borrow_date = $_POST['borrow'];
        $return_date = $_POST['return'];

        $sql = mysqli_query($conn, "UPDATE transactions SET book_id = '$book', borrow_date = '$borrow_date', return_date = '$return_date' WHERE transaction_id = '$id'");

        header('location: borrows.php?success=update');
    }

    // if the form submit is delete
    if ($_POST['submit'] === 'delete') {

        $id = $_POST['id'];
        $status = 'open';

        $sql = mysqli_query($conn, "DELETE FROM transactions WHERE transaction_id = '$id'");

        $sql = mysqli_query($conn, "UPDATE books SET status = '$status' WHERE book_id = '$book'");

        header('location: borrows.php?success=delete');
    }
} else {
    header('location: borrows.php');
}
