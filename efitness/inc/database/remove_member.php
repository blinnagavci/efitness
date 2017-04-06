<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $removesql = "DELETE FROM membership_payment WHERE id_member = '$id'";
    $removesql2 = "DELETE FROM member WHERE id = '$id'";
    $photosql = "SELECT photo FROM member WHERE id = '$id'";
    $photo = mysqli_query($conn, $photosql);
    $row = mysqli_fetch_assoc($photo);
    $photopath = $row['photo'];
    if (!(unlink("../../repository/member_photos/" . $photopath))) {
        die("<script type=text/javascript>window.alert('Photo could not be removed. Please check the member photos directory.')</script>");
    }
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

