<?php
require('parts/header.php');
require('parts/navigation.php');
if (!($_SESSION['username'] == 'admin')) {
    header('refresh: 0; url=./');
}
?>
<div class="main-right">
    <h1>Settings</h1>
    <div class="main-box">
        <div class="left-membership">
            <h2>Membership Settings</h2>
            <div class="add-membership">  
                <form class="add-membership-form" method="POST" action="inc/database/add_membership.php">
                    <label class="settings-label">Membership Type</label>
                    <input type="text" class="settings-input" name="membershiptype_settings" id="membershiptype_settings" placeholder="Enter Membership Type" required/>
                    <input type="submit" class="settings-add-ms" value="Add" name="add_membership_submit" id="add_membership_submit"/>
                </form>
            </div>
            <div class="remove-membership">
                <form class="remove-membership-form" action="inc/database/remove_membership.php" method="POST">
                    <select name="remove_membership_select" class="settings-membership-select" required>
                        <option value="select" disabled selected>Select</option> 
                        <?php
                        include('inc/database/db_connect.php');
                        $sql = 'SELECT membership_type FROM membership WHERE status= "0"';
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
                    <input type="submit" class="settings-remove-ms" value="Remove" name="remove_membership_submit" id="remove_membership_submit"/>
                </form>  
            </div>
        </div>
        <div class="right-employee-type">
            <h2>Employee Type Settings</h2>
            <div class="add-employee-type">  
                <form class="add-employee-type-form" method="POST" action="inc/database/add_employee_type.php">
                    <label class="settings-label">Employee Type</label>
                    <input type="text" class="settings-input" name="employeetype_settings" id="employeetype_settings" placeholder="Enter Employee Type" required/>
                    <input type="submit" class="settings-add-et" value="Add" name="add_employe_type_submit" id="add_employee_type_submit"/>
                </form>
            </div>
            <div class="remove-employee-type">
                <form class="remove-employee-type-form" action="inc/database/remove_employee_type.php" method="POST">
                    <select name="remove_employee_type_select" class="settings-employee-type-select" required>
                        <option value="select" disabled selected>Select</option> 
                        <?php
                        include('inc/database/db_connect.php');
                        $sql = 'SELECT employee_type FROM employee_type WHERE status= "0"';
                        $retval = mysqli_query($conn, $sql);
                        if (!$retval) {
                            echo ("Could not retrieve data" . mysql_error());
                        }
                        while ($row = $retval->fetch_assoc()) {
                            $employeetype = $row['employee_type'];
                            echo "<option value='$employeetype'>$employeetype</option>";
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                    <input type="submit" class="settings-remove-et" value="Remove" name="remove_employee_type_submit" id="remove_employee_type_submit"/>
                </form>  
            </div>
        </div>
        <div class="left-add-account">
            
        </div>
    </div>
</div>
<?php
require('parts/footer.php');

