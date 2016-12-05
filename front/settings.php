<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Settings</h1>
    <div class="main-box">
        <div class="left-membership">
            <div class="add-membership">            
                <label class="settings-label">Membership Type</label>
                <input type="text" class="settings-input" name="membershiptype_settings" id="membershiptype_settings" placeholder="Enter Membership Type" />
                <button class="settings-add-ms">Add</button>
            </div>
            <div class="remove-membership">
                <select name="settings-membership-select" class="settings-membership-select" required>
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
                <button class="settings-remove-ms">Remove</button>
            </div>
        </div>
    </div>
</div>
<?php
require('parts/footer.php');

