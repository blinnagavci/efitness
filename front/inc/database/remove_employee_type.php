<?php

require('db_connect.php');

if (isset($_POST['remove_employee_type_submit'])) {
    $employeetype = $_POST['remove_employee_type_select'];

    $sql = "UPDATE employee_type SET status='1' WHERE employee_type = '$employeetype'";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not remove data from employee type table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Employee type successfully removed')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../other_settings");
}

