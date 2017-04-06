<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Employee</h1>
    <div class="main-box">
        <form action='inc/database/add_employee.php' name='submit' id="employee-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <label>First Name</label>
                <input type="text" name="employee_firstname" id="employee_firstname" placeholder="First Name" required> 
                <label>Last Name</label>
                <input type="text" name="employee_surname" id="employee_surname" placeholder="Last Name" required> 
                <label>Gender</label>
                <select name="employee_gender" required>
                    <option value="disabled" disabled selected>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <label>Birth Date</label>
                <span class="date">
                    <input class="date-picker readonly" type="text" name="employee_date" id="employee_date" placeholder="Enter Birth Date" required/>
                </span>
                <label>Residential Address</label>
                <input type="text" name="employee_address" id="employee_address" placeholder="Enter Residential Address" required> 
                <label>City</label>
                <input type="text" name="employee_city" id="employee_city" placeholder="Enter City" required/> 
                <label>Phone No.</label>
                <span class="telephone">
                    <input type="text" name="employee_telephone" id="employee_telephone" placeholder="Enter Phone Number" required/>
                </span>
                <label>Alternative No.</label>
                <span class="mobile">
                    <input type="text" name="employee_alternative" id="employee_alternative" placeholder="Enter Phone Number" />
                </span>
                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="employee_email" id="employee_email" placeholder="Enter Email" required/>
                </span>

            </div>
            <div class="right-form-content">
                <label>Employee Photo</label>
                <img id="employee-photo" src="repository/no_image.png" alt="Photo"/>
                <label>Upload from Computer</label>
                <label for="employee-upload" class="add-photo" required>Upload Image</label>
                <input type="file" style="display:none;" name="employee_upload" id="employee-upload" required/>
                <input type="button" name="hide_button" id="remove" value="Remove" class="hide"/>
                <label class="no-padding-label">Employee Type</label>
                <select name="employee_subscription" required>
                    <option value="select" disabled selected>Select</option>
                    <?php
                    include('inc/database/db_connect.php');

                    $sql = 'SELECT employee_type FROM employee_type WHERE status= "0"';
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        echo ("Could not retrieve data" . mysql_error());
                    }
                    while ($row = $retval->fetch_assoc()) {
                        $employee_type = $row['employee_type'];
                        echo "<option value='$employee_type'>$employee_type</option>";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
                <label>Salary Amount</label>
                <input class="number" type='text' name='salary_amount' id='salary_amount' placeholder='Enter Salary Amount' required/>
                <label>Start Date</label>
                <span class="date">
                    <input class="employee-date-picker readonly" type="text" name="employee_start" id="employee_start" placeholder="Enter Start Date" required/>
                </span>
                <label>End Date</label>
                <span class="date">
                    <input class="employee-date-picker readonly" type="text" name="employee_end" id="employee_end" placeholder="Enter End Date" required/>
                </span>
                <input type="submit" value="Submit" name="submit" id="employee_submit"/>
            </div>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
