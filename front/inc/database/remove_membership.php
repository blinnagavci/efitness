<?php

require('db_connect.php');

if (isset($_POST['remove_membership_submit'])) {
    $membershiptype = $_POST['remove_membership_select'];

    $sql = "UPDATE membership SET status='1' WHERE membership_type = '$membershiptype'";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not remove data to membership table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Membership successfully removed')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../other_settings");
}

