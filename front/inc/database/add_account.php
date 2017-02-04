<?php

require('db_connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['account_username'];
    $temporary_password = ($_POST['account_password']);
    $email = ($_POST['account_email']);
    $accounttype = $_POST['account_type'];
    
    $password = sha1($temporary_password);
    
    $sql = "INSERT INTO account (username, password, email, admin_status, status)
    VALUES ('$username', '$password', '$email', '$accounttype', '0')";
    
    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to account table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Account successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../manage_accounts");
}

