<?php

require('db_connect.php');
if (isset($_POST['add'])) {
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


//    define('DIRECTORY', 'repository/member_photos');
//
//    $content = file_get_contents('http://anothersite/images/goods.jpg');
//    file_put_contents(DIRECTORY . '/image.jpg', $content);
    $sql_member = "INSERT INTO member (first_name, last_name, gender, residential_address, city, telephone_no,
        alternative_no, email, birth_date)
    VALUES ('$firstname', '$lastname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate')";

    $retval1 = mysqli_query($conn, $sql_member);


    if (!$retval1) {
        die('Could not enter data to member table' . mysqli_connect_error());
    }

    $sql_membership = "INSERT into membership (membership_type) VALUES ('$membershiptype')";

    $retval2 = mysqli_query($conn, $sql_membership);

    if (!$retval2) {
        die('Could not enter data to membership table' . mysqli_connect_error());
    }
    $memberid = mysqli_query($conn, "SELECT id from member ORDER BY id DESC");
    $membershipid = mysqli_query($conn, "SELECT id from membership ORDER BY id DESC");
    $memberrow = mysqli_fetch_row($memberid);
    $membershiprow = mysqli_fetch_row($membershipid);
    $sql_membershippayment = "INSERT INTO membership_payment(amount_of_payment, start_date, end_date, id_member, id_membership)
           VALUES ('$membershipamount','$membershipstart','$membershipend', '$memberrow[0]', '$membershiprow[0]')";
    $retval3 = mysqli_query($conn, $sql_membershippayment);
    if (!$retval3) {
        die('Could not enter data to membership payment table' . mysqli_connect_error());
    }else{
        echo "<script type='text/javascript'>window.alert('Member successfully added')</script>"; 
    }
    
    mysqli_close($conn);
    header("refresh: 0; url=../../members");
}

