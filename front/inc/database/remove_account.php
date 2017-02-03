<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $removesql = "DELETE FROM account WHERE id = '$id'";
    
    if (mysqli_query($conn, $removesql)) {
        echo "<script type=text/javascript>window.alert('Account removed successfully.')</script>";
    } else {
        die("Could not remove account: " . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("refresh: 0; url = ../../manage_accounts");
}

