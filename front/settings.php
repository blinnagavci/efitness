<?php
require('parts/header.php');
require('parts/navigation.php');
require('inc/database/db_connect.php');
?>
<div class="main-right">
    <h1>Settings</h1>
    <div class="main-box">
        <div class="left-membership">
            <form id="new-membership" method="POST">
                <div class="add-membership">            
                    <label class="settings-label">Membership Type</label>
                    <input type="text" class="settings-input" name="membershiptype_settings" id="membershiptype_settings" placeholder="Enter Membership Type" required/>
                    <input type="submit" value="Add" name='add_membership'class="settings-add-ms">
                    <?php
                    require ('./inc/database/db_connect.php');
                    if (isset($_POST['add_membership'])) {
                        $newmembership = $_POST['membershiptype_settings'];
                        $addmembershipsql = "INSERT INTO membership(membership_type, status) VALUES ('$newmembership',
                            '0')";
                        if (mysqli_query($conn, $addmembershipsql)) {
                            echo "<script type=text/javascript>window.alert('Membership successfully added');</script>";
                        } else {
                            echo "Membership could not be added" . mysqli_error();
                        }
                    }
                    ?>
                </div>
            </form>
            <form id='remove-membership-form' name='remove-membership-form' method='POST'>
                <div class="remove-membership">
                    <select name="settings-membership-select" class="settings-membership-select" required>
                        <option value="select" disabled selected>Select</option>
                        <?php
                        $sql = 'SELECT membership_type FROM membership WHERE status= "0"';
                        $retval = mysqli_query($conn, $sql);
                        if (!$retval) {
                            echo ("Could not retrieve data" . mysql_error());
                        }
                        while ($row = $retval->fetch_assoc()) {
                            $membership = $row['membership_type'];
                            echo "<option value = '$membership'>$membership</option>";
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                    <input type="submit" value="Remove" name='remove_membership' class="settings-add-ms">
                </div>
            </form>
            <?php
            if (isset($_POST['remove_membership'])) {
                $removemembership = $_POST['settings-membership-select'];
                $removemembershipsql = "UPDATE membership SET status='1' WHERE membership_type = '$removemembership'";
                require ('inc/database/db_connect.php');
                if (mysqli_query($conn, $removemembershipsql)) {
                    echo "<script type=text/javascript>window.alert('Membership successfully removed');</script>";
                } else {
                    echo "Membership could not be added: " . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
            ?>


        </div>
    </div>
</div>
</div>
</div>
<?php
require('parts/footer.php');

