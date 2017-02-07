<?php

require('db_connect.php');

if (isset($_POST['add_employe_type_submit'])) {
    $employeetype = $_POST['employeetype_settings'];

    $sql = "INSERT INTO employee_type (employee_type, status)
    VALUES ('$employeetype', '0')";

    $retval1 = mysqli_query($conn, $sql);


    if (!$retval1) {
        die('Could not enter data to employee type table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Employee type successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../other_settings");
}

