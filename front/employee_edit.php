<?php
require('parts/header.php');
require('inc/database/db_connect.php');
if (isset($_POST['edit_employee_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $firstname = $_POST['employee_firstname'];
    $lastname = ($_POST['employee_surname']);
    $address = ($_POST['employee_address']);
    $gender = ($_POST['employee_gender']);
    $city = ($_POST['employee_city']);
    $email = ($_POST['employee_email']);
    $telephoneno = ($_POST['employee_telephone']);
    $alternativeno = ($_POST['employee_alternative']);
    $birthdate = ($_POST['employee_date']);

    if ($_FILES['employee_upload']['name'] != '') {
        $uploadedFileName = $_FILES['employee_upload']['name'];
        $temp_name = $_FILES['employee_upload']['tmp_name'];
        $temp = explode(".", $_FILES["employee_upload"]["name"]);
        $getID = mysqli_query($conn, "SELECT id FROM employee ORDER BY id DESC");
        $idRow = mysqli_fetch_row($getID);
        $newfilename = $idRow[0] . "_" . $firstname . "_" . $lastname . '.' . end($temp);
        if ($uploadedFileName != '') {
            $upload_directory = "repository/employee_photos/";
            move_uploaded_file($temp_name, $upload_directory . $newfilename);
        }
        $sql = "UPDATE employee SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
                . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate', photo='$newfilename' WHERE id = $id";
    } else {
        $sql = "UPDATE employee SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
                . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate' WHERE id = $id";
    }
    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not edit data.' . mysqli_connect_error());
    } else {
        echo "<script type = 'text/javascript' > window . alert('Employee successfully edited')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url=search_employees");
}
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Edit Employee</h1>
    <div class="main-box">
        <form action='' name='employee-edit-form' id="employee-edit-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <?php
                require('inc/database/db_connect.php');
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $sql = "SELECT first_name, last_name, gender, residential_address, city, birth_date, alternative_no, telephone_no, email, photo FROM employee WHERE id = '$id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <label>First Name</label>
                <input type="text" name="employee_firstname" id="employee_firstname" placeholder="First Name" value='<?php echo $row['first_name']; ?>' required> 
                <label>Last Name</label>
                <input type="text" name="employee_surname" id="employee_surname" placeholder="Last Name" value='<?php echo $row['last_name']; ?>' required> 
                <label>Gender</label>
                <select name="employee_gender" required>
                    <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                    <?php
                    switch ($row['gender']) {
                        case "Male":
                            echo '<option value="Female">Female</option>';
                            echo '<option value="Other">Other</option>';
                            break;
                        case "Female":
                            echo '<option value="Male">Male</option>';
                            echo '<option value="Other">Other</option>';
                            break;
                        case "Other":
                            echo '<option value="Male">Male</option>';
                            echo '<option value="Female">Female</option>';
                            break;
                        default:
                            echo 'Something went wrong';
                    }
                    ?>
                </select>
                <label>Birth Date</label>
                <span class="date">
                    <input class="date-picker readonly" type="text" name="employee_date" id="employee_date" value='<?php echo $row['birth_date']; ?>' placeholder="Enter Birth Date" required/>
                </span>
                <label>Residential Address</label>
                <input type="text" name="employee_address" id="employee_address" placeholder="Enter Residential Address" value='<?php echo $row['residential_address']; ?>' required> 
                <label>City</label>
                <input type="text" name="employee_city" id="employee_city" placeholder="Enter City" value='<?php echo $row['city']; ?>' required/> 
                <label>Phone No.</label>
                <span class="telephone">
                    <input type="text" name="employee_telephone" id="employee_telephone" placeholder="Enter Phone Number" value='<?php echo $row['telephone_no']; ?>' required/>
                </span>
                <label>Alternative No.</label>
                <span class="mobile">
                    <input type="text" name="employee_alternative" id="employee_alternative" placeholder="Enter Phone Number"  value='<?php echo $row['alternative_no']; ?>'/>
                </span>
                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="employee_email" id="employee_email" placeholder="Enter Email" value='<?php echo $row['email']; ?>' required/>
                </span>

            </div>
            <div class="right-form-content">
                <label>Employee Photo</label>
                <img id="employee-photo" src="repository/employee_photos/<?php echo $row['photo']; ?>" alt="Photo"/>
                <label>Upload from Computer</label>
                <input type="file" name="employee_upload" id="employee-upload"/>
                <input type="button" name="hide_button" id="remove" value="remove" class="hide"/>
                <input type="submit" value="Submit" name="edit_employee_submit" id="employee_submit"/>
            </div>
            <?php mysqli_close($conn); ?>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
