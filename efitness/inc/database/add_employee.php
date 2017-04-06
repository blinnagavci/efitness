<?php

require('db_connect.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['employee_firstname'];
    $lastname = ($_POST['employee_surname']);
    $address = addslashes($_POST['employee_address']);
    $gender = addslashes($_POST['employee_gender']);
    $city = ($_POST['employee_city']);
    $email = ($_POST['employee_email']);
    $telephoneno = ($_POST['employee_telephone']);
    $alternativeno = ($_POST['employee_alternative']);
    $birthdate = ($_POST['employee_date']);
    $employeetype = $_POST['employee_subscription'];
    $salaryamount = $_POST['salary_amount'];
    $contractstart = $_POST['employee_start'];
    $contractend = $_POST['employee_end'];

    $uploadedFileName = $_FILES['employee_upload']['name'];
    $temp_name = $_FILES['employee_upload']['tmp_name'];
    $temp = explode(".", $_FILES["employee_upload"]["name"]);
    $getID = mysqli_query($conn, "SELECT id FROM employee ORDER BY id DESC");
    $idRow = mysqli_fetch_row($getID);
    $newfilename = $idRow[0] + 1 . "_" . $firstname . "_" . $lastname . '.' . end($temp);
    if ($uploadedFileName != '') {
        $upload_directory = "../../repository/employee_photos/";
        move_uploaded_file($temp_name, $upload_directory . $newfilename);
    }
    $sql_employee = "INSERT INTO employee (first_name, last_name, gender, residential_address, city, telephone_no,
alternative_no, email, birth_date, photo)
VALUES ('$firstname', '$lastname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate', '$newfilename')";
    $retval1 = mysqli_query($conn, $sql_employee);
//    $imageId = strstr($newfilename, '_', true);
//    if ($imageId) {
//        var_dump($imageId);
//    }
    if (!$retval1) {
        die('Could not enter data to employee table' . mysqli_connect_error());
    }

    $employeeid = mysqli_query($conn, "SELECT id from employee ORDER BY id DESC");
    $employee_typeid = mysqli_query($conn, "SELECT id from employee_type WHERE employee_type = '$employeetype'");
    $employeerow = mysqli_fetch_row($employeeid);
    $employee_typeidrow = mysqli_fetch_row($employee_typeid);

    $sql_salary = "INSERT INTO employee_contract (amount_of_salary, start_date, end_date, employee_id, employee_type_id)
    VALUES ('$salaryamount','$contractstart','$contractend', '$employeerow[0]', '$employee_typeidrow[0]')";

    $retval3 = mysqli_query($conn, $sql_salary);
    if (!$retval3) {
        die('Could not enter data to employee contract table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Employee successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../../employees");
}

