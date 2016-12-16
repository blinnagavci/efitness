<?php

require('db_connect.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['member_firstname'];
    $lastname = ($_POST['member_surname']);
    $address = addslashes($_POST['member_address']);
    $gender = addslashes($_POST['member_gender']);
    $city = ($_POST['member_city']);
    $email = ($_POST['member_email']);
    $telephoneno = ($_POST['member_telephone']);
    $alternativeno = ($_POST['member_alternative']);
    $birthdate = ($_POST['member_date']);
    $membershiptype = $_POST['member_subscription'];
    $membershipamount = $_POST['membership_amount'];
    $membershipstart = $_POST['membership_start'];
    $membershipend = $_POST['membership_end'];

    $uploadedFileName = $_FILES['member_upload']['name'];
    $temp_name = $_FILES['member_upload']['tmp_name'];
    $temp = explode(".", $_FILES["member_upload"]["name"]);
    $getID = mysqli_query($conn, "SELECT id FROM member ORDER BY id DESC");
    $idRow = mysqli_fetch_row($getID);
    $newfilename = $idRow[0] + 1 . "_" . $firstname . "_" . $lastname . '.' . end($temp);
    if ($uploadedFileName != '') {
        $upload_directory = "../../repository/member_photos/";
        move_uploaded_file($temp_name, $upload_directory . $newfilename);
    }
    $sql_member = "INSERT INTO member (first_name, last_name, gender, residential_address, city, telephone_no,
alternative_no, email, birth_date, photo)
VALUES ('$firstname', '$lastname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate', '$newfilename')";
    $retval1 = mysqli_query($conn, $sql_member);
//    $imageId = strstr($newfilename, '_', true);
//    if ($imageId) {
//        var_dump($imageId);
//    }
    if (!$retval1) {
        die('Could not enter data to member table' . mysqli_connect_error());
    }

    $memberid = mysqli_query($conn, "SELECT id from member ORDER BY id DESC");
    $membershipid = mysqli_query($conn, "SELECT id from membership WHERE membership_type = '$membershiptype'");
    $memberrow = mysqli_fetch_row($memberid);
    $membershiprow = mysqli_fetch_row($membershipid);

    $sql_membershippayment = "INSERT INTO membership_payment(amount_of_payment, start_date, end_date, id_member, id_membership)
    VALUES ('$membershipamount','$membershipstart','$membershipend', '$memberrow[0]', '$membershiprow[0]')";

    $retval3 = mysqli_query($conn, $sql_membershippayment);
    if (!$retval3) {
        die('Could not enter data to membership payment table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Member successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../members");
}

