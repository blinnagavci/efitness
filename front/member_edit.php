<?php
require('parts/header.php');
require('inc/database/db_connect.php');
if (isset($_POST['edit_member_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    
    $firstname = $_POST['member_firstname'];
    $lastname = ($_POST['member_surname']);
    $address = ($_POST['member_address']);
    $gender = ($_POST['member_gender']);
    $city = ($_POST['member_city']);
    $email = ($_POST['member_email']);
    $telephoneno = ($_POST['member_telephone']);
    $alternativeno = ($_POST['member_alternative']);
    $birthdate = ($_POST['member_date']);
    
    $sql = "UPDATE member SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
            . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate' WHERE id = $id";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not edit data.' . mysqli_connect_error());
    } else {
        echo "<script type = 'text/javascript' > window . alert('Membership successfully edited')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url= search_members.php");
}
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Edit Member</h1>
    <div class="main-box">
        <form action='' name='member-edit-form' id="member-edit-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <?php
                require('inc/database/db_connect.php');
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $sql = "SELECT first_name, last_name, gender, residential_address, city, birth_date, alternative_no, telephone_no, email FROM member WHERE id = '$id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <label>First Name</label>
                <input type="text" name="member_firstname" id="member_firstname" placeholder="First Name" value='<?php echo $row['first_name']; ?>' required> 
                <label>Last Name</label>
                <input type="text" name="member_surname" id="member_surname" placeholder="Last Name" value='<?php echo $row['last_name']; ?>' required> 
                <label>Gender</label>
                <select name="member_gender" required>
                    <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <label>Birth Date</label>
                <span class="date">
                    <input class="date-picker readonly" type="text" name="member_date" id="member_date" value='<?php echo $row['birth_date']; ?>' placeholder="Enter Birth Date" required/>
                </span>
                <label>Residential Address</label>
                <input type="text" name="member_address" id="member_address" placeholder="Enter Residential Address" value='<?php echo $row['residential_address']; ?>' required> 
                <label>City</label>
                <input type="text" name="member_city" id="member_city" placeholder="Enter City" value='<?php echo $row['city']; ?>' required/> 
                <label>Phone No.</label>
                <span class="telephone">
                    <input type="text" name="member_telephone" id="member_telephone" placeholder="Enter Phone Number" value='<?php echo $row['telephone_no']; ?>' required/>
                </span>
                <label>Alternative No.</label>
                <span class="mobile">
                    <input type="text" name="member_alternative" id="member_alternative" placeholder="Enter Phone Number"  value='<?php echo $row['alternative_no']; ?>'/>
                </span>
                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="member_email" id="member_email" placeholder="Enter Email" value='<?php echo $row['email']; ?>' required/>
                </span>

            </div>
            <div class="right-form-content">
                <label>Member Photo</label>
                <img id="member-photo" src="repository/no_image.png" alt="Photo"/>
                <label>Upload from Computer</label>
                <input type="file" name="member_upload" id="member-upload" required/>
                <input type="button" name="hide_button" id="remove" value="remove" class="hide"/>
                <input type="submit" value="Submit" name="edit_member_submit" id="member_submit"/>
            </div>
            <?php mysqli_close($conn); ?>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
