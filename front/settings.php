<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Settings</h1>
    <div class="main-box">
        <div class="left-membership">
            <div class="add-membership">  
                <form class="add-membership-form" method="POST" action="inc/database/add_membership.php">
                    <label class="settings-label">Membership Type</label>
                    <input type="text" class="settings-input" name="membershiptype_settings" id="membershiptype_settings" placeholder="Enter Membership Type" />
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
    </div>
</div>
<?php
require('parts/footer.php');

