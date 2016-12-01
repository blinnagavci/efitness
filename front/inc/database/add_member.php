<?php

if (isset($_POST['add'])) {
    $firstname = $_POST['member_firstname'];
//    $lastname = addslashes($_POST['lastname']);
//    $email = addslashes($_POST['email']);
//    $phoneno = addslashes($_POST['phoneno']);
//    $gender = addslashes($_POST['gender']);
//    $tabs = implode(', ', $_POST['tabs']);
//    $referrer = addslashes($_POST['referrer']);
//    $comment = addslashes($_POST['comment']);


    $sql = "INSERT INTO member (firstname) 
    VALUES ('$firstname')";

    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not enter data...' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'> window.alert('Member added successfully!.'); </script>";
    }
    mysqli_close($conn);
    header("refresh:0; url=../index.php");
}
?>
