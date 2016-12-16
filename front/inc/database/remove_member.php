<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $removesql = "DELETE FROM membership_payment WHERE id_member = '$id'";
    $removesql2 = "DELETE FROM member WHERE id = '$id'";
    if (!(mysqli_query($conn, $removesql))) {
        die("Could not remove member: " . mysqli_error($conn));
    }
    if (mysqli_query($conn, $removesql2)) {
        echo "<script type=text/javascript>window.alert('Member removed successfully.')</script>";
    } else {
        die("Could not remove member: " . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("refresh: 0; url = ../../search_members");
}

