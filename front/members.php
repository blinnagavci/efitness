<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Manage Member</h1>
    <div class="main-box">
        <form id="member-form" method="POST">
            <div class="left-form-content">
                <label>First Name</label>
                <input type="text" name="member_firstname" id="member_firstname" placeholder="First Name" required> 
                <label>Last Name</label>
                <input type="text" name="member_surname" id="member_surname" placeholder="Last Name" required> 
                <label>Residential Address</label>
                <input type="text" name="member_address" id="member_address" placeholder="Enter Residential Address" required> 
                <label>City</label>
                <input type="text" name="member_city" id="member_city" placeholder="Enter City" required/> 
                <label>Telephone No.</label>
                <span class="telephone">
                    <input type="text" name="member_telephone" id="member_telephone" placeholder="Enter Telephone Number"/>
                </span>
                <label>Mobile No.</label>
                <span class="mobile">
                    <input type="text" name="member_mobile" id="member_mobile" placeholder="Enter Mobile Number" required/>
                </span>
                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="member_email" id="member_email" placeholder="Enter Email" required/>
                </span>
                <label>Birth Date</label>
                <span class="birth-date">
                    <input class="date-picker readonly" type="text" name="member_date" id="member_date" placeholder="Enter Birth Date" required/>
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
                    <option value="" selected="">Select</option>
                    <option value="yearly">Yearly</option>
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                </select>
                <input type="submit" id="member_submit"/>
            </div>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
