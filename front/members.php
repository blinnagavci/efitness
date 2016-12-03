<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Member</h1>
    <div class="main-box">
        <form action='inc/database/add_member.php' name='submit' id="member-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <label>First Name</label>
                <input type="text" name="member_firstname" id="member_firstname" placeholder="First Name" required> 
                <label>Last Name</label>
                <input type="text" name="member_surname" id="member_surname" placeholder="Last Name" required> 
                <label>Gender</label>
                <select name="member_gender" required>
                    <option value="male" disabled selected>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <label>Birth Date</label>
                <span class="birth-date">
                    <input class="date-picker readonly" type="text" name="member_date" id="member_date" placeholder="Enter Birth Date" required/>
                </span>
                <label>Residential Address</label>
                <input type="text" name="member_address" id="member_address" placeholder="Enter Residential Address" required> 
                <label>City</label>
                <input type="text" name="member_city" id="member_city" placeholder="Enter City" required/> 
                <label>Phone No.</label>
                <span class="telephone">
                    <input type="text" name="member_telephone" id="member_telephone" placeholder="Enter Phone Number" required/>
                </span>
                <label>Alternative No.</label>
                <span class="mobile">
                    <input type="text" name="member_alternative" id="member_alternative" placeholder="Enter Phone Number" />
                </span>
                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="member_email" id="member_email" placeholder="Enter Email" required/>
                </span>

            </div>
            <div class="right-form-content">
                <label>Member Photo</label>
                <img id="member-photo" src="repository/no_image.png" alt="Photo"/>
                <label>Upload from Computer</label>
                <input type="file" name="member_upload" id="member-upload" required/>
                <input type="button" name="hide_button" id="remove" value="remove" class="hide"/>
                <label>Membership Type</label>
                <select name="member_subscription" required>
                    <option value="select" disabled selected>Select</option>
                    <?php
                    include('inc/database/db_connect.php');
                    $sql = 'SELECT membership_type FROM membership';
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        echo ("Could not retrieve data" . mysql_error());
                    }
                    while ($row = $retval->fetch_assoc()) {
                        $membership = $row['membership_type'];
                        echo "<option value='$membership'>$membership</option>";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
                <label>Amount</label>
                <input class="number" type='text' name='membership_amount' id='membership_amount' placeholder='Enter Payment Amount' required/>
                <label>Start Date</label>
                <span class="date">
                    <input class="membership-date-picker readonly" type="text" name="membership_start" id="membership_start" placeholder="Enter Start Date" required/>
                </span>
                <label>End Date</label>
                <span class="date">
                    <input class="membership-date-picker readonly" type="text" name="membership_end" id="membership_end" placeholder="Enter End Date" required/>
                </span>
                <input type="submit" value="submit" name="submit" id="member_submit"/>
            </div>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
