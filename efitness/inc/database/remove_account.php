<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $getAccount = mysqli_query($conn, "SELECT admin_status FROM account WHERE id = '$id'");
    $accountType = mysqli_fetch_row($getAccount);
    
    if ($accountType[0] == 0) {
        $getAll = "SELECT username FROM account WHERE admin_status='0' AND status='0'";
        $result = $conn->query($getAll);

        if ($result->num_rows <= 1) {
            echo "<script type=text/javascript>window.alert('You must have at least one Admin account')</script>";
            header("refresh: 0; url = ../../manage_accounts");
            exit();
        }
    }

    $removesql = "UPDATE account SET status='1' WHERE id = '$id'";

    if (mysqli_query($conn, $removesql)) {
        echo "<script type=text/javascript>window.alert('Account removed successfully.')</script>";
    } else {
        die("Could not remove account: " . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("refresh: 0; url = ../../manage_accounts");
}

