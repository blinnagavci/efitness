<?php
require('parts/header.php');
require('inc/database/db_connect.php');
//require('inc/database/db_connect.php');
if (isset($_POST['add-membership-payment'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $membershiptype = $_POST['member_subscription'];
    $membershipamount = $_POST['membership_amount'];
    $membershipstart = $_POST['membership_start'];
    $membershipend = $_POST['membership_end'];
    $membershipid = mysqli_query($conn, "SELECT id from membership WHERE membership_type = '$membershiptype'");
    $membershiprow = mysqli_fetch_row($membershipid);

    $sql = "INSERT INTO membership_payment (amount_of_payment, start_date, end_date, id_member, id_membership)
    VALUES ('$membershipamount', '$membershipstart', '$membershipend', '$id', '$membershiprow[0]')";

    $retval1 = mysqli_query($conn, $sql);
    header("refresh: 0;");
    if (!$retval1) {
        die('Could not enter data to membership payment table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Membership payment successfully added')</script>";
    }

    mysqli_close($conn);
}


require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Membership Payment</h1>
    <div class="main-box">
        <div class = "right-form-content">
            <label>Membership Type</label>
            <form method="POST" name="add-membership-payment" id="add-membership" action="">
                <select name = "member_subscription" required>
                    <option value = "select" disabled selected>Select</option>
                    <?php
                    //include('inc/database/db_connect.php');

                    $sql = 'SELECT membership_type FROM membership WHERE status= "0"';
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        echo ("Could not retrieve data" . mysql_error());
                    }
                    while ($row = $retval->fetch_assoc()) {
                        $membership = $row['membership_type'];
                        echo "<option value='$membership'>$membership</option>";
                    }
                    //mysqli_close($conn);
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
                <input type="submit" value="Add Membership" name="add-membership-payment" id="add-membership-submit"/>


            </form>
        </div>
        <div class="left-form-content">
            <?php
            require('inc/database/db_connect.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT id, start_date, end_date, amount_of_payment FROM membership_payment WHERE id_member = '$id' ORDER BY id DESC";
                $result = $conn->query($sql);
            }
            if ($result->num_rows > 0) {
                ?>
                <div class="table-div">
                    <table class="membership-table">
                        <tr>
                            <th>ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                                <td><?php echo $row['amount_of_payment'] . '€'; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "No results";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require('parts/footer.php');

