<?php

require('db_connect.php');

if (isset($_POST['add_membership_submit'])) {
    $membershiptype = $_POST['membershiptype_settings'];

    $sql = "INSERT INTO membership (membership_type, status)
    VALUES ('$membershiptype', '0')";

    $retval1 = mysqli_query($conn, $sql);


    if (!$retval1) {
        die('Could not enter data to membership table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Membership successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../other_settings");
}

