<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Dashboard</h1>
    <div class="main-box">
        <div class="dashboard">
            <ul>
                <li>
                    <div class="total-members">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM member");
                        $numrows = mysqli_num_rows($result);
                        echo "<h2>$numrows</h2>";
                        ?>
                        <i class="fa today-members-icon"></i>
                        <h3>Total members registered</h3>
                    </div>
                </li>
                <li>
                    <div class="weekly-joinings">
                        <?php
                        $result2 = mysqli_query($conn, "SELECT count(*) as numRecords FROM member WHERE date_added >= NOW() - INTERVAL 1 WEEK");
                        if (($result2->num_rows > 0)) {
                            while ($row = $result2->fetch_assoc()) {
                                echo '<h2>' . $row["numRecords"] . '</h2>';
                                
                            }
                        } else {
                            echo '<h2>0</h2>';
                        }
                        ?>
                        <i class="fa weekly-joinings-icon"></i>
                        <h3>Joined this week</h3>
                    </div>
                </li>
                <li>
                    <div class="total-employees">
                        <?php
                        $result3 = mysqli_query($conn, "SELECT * FROM employee");
                        $numrows3 = mysqli_num_rows($result3);
                        echo "<h2>$numrows3</h2>";
                        ?>
                        <i class="fa total-employees-icon"></i>
                        <h3>Total employees registered</h3>
                    </div>
                </li>
                <li>
                    <?php
                    $querymembership = "SELECT id_membership, COUNT(*) AS membership FROM membership_payment GROUP BY id_membership ORDER BY membership DESC LIMIT 1";
                    $queryyy = "SELECT id_membership FROM membership_payment GROUP BY id_membership HAVING COUNT(*) FROM membership_payment GROUP BY id_membership ORDER BY count(*) DESC LIMIT 1";

                    $resultmembership = mysqli_query($conn, $querymembership);
                    if (($resultmembership->num_rows > 0)) {
                        $result6 = mysqli_fetch_assoc($resultmembership);
                        $result7 = $result6['id_membership'];
                        $querymembershiptype = "SELECT membership_type from membership WHERE id = $result7";
                        $result8 = mysqli_query($conn, $querymembershiptype);
                        while ($row = $result8->fetch_assoc()) {
                            $result9 = $row['membership_type'];
                        }
                    } else {
                        $result9 = 'None';
                    }
                    ?>
                    <div class="most-popular-membership">
                        <h2 class="not-increased"><?php echo $result9; ?></h2>
                        <i class="fa popular-membership-icon"></i>
                        <h3>Most popular membership</h3>
                    </div>
                </li>
                <li>
                    <div class="total-payments">
                        <?php
                        $result4 = mysqli_query($conn, "SELECT * FROM membership_payment");
                        $numrows4 = mysqli_num_rows($result4);
                        echo "<h2>$numrows4</h2>";
                        ?>
                        <i class="fa total-payments-icon"></i>
                        <h3>Total payments received</h3>
                    </div>
                </li>
                <li>
                    <div class="total-accounts">
                        <?php
                        $result5 = mysqli_query($conn, "SELECT * FROM account WHERE status=0");
                        $numrows5 = mysqli_num_rows($result5);
                        echo "<h2>$numrows5</h2>";
                        ?>
                        <i class="fa total-accounts-icon"></i>
                        <h3>Total accounts registered</h3>
                    </div>
                </li>
            </ul>
            <div class="last-members">
                <div class="wrap-latest">
                    <i class="fa members-icon"></i>
                    <h3>Latest Members</h3>
                    <a class="add-member" href="members" title="Add Member">
                        <i class="fa add-member-icon"></i>
                        Add
                    </a>
                </div>
                <?php
                $sql = "SELECT * FROM member order by id desc limit 5";
                $query = mysqli_query($conn, $sql);
                ?>
                <ul>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <li>
                            <div class="split-list">
                                <?php $imgsrc = 'repository/member_photos/' . $row["photo"]; ?>
                                <img src="<?php echo $imgsrc; ?>" alt="Member Photo"/>
                            </div>
                            <div class="split-list">
                                <span><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></span>
                            </div>
                            <div class="split-list-full">
                                <span><?php echo $row['gender']; ?></span>
                            </div>
                            <div class="split-list-full">
                                <span><?php echo $row['city']; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="last-members-2">
                <div class="wrap-latest">
                    <i class="fa total-payments-icon dashboard-icon"></i>
                    <h3>Latest Payments</h3>
                    <a class="add-member" href="search_members" title="Add Member">
                        <i class="fa add-member-icon"></i>
                        Add
                    </a>
                </div>
                <?php
                $sql = "SELECT * FROM membership_payment order by id desc limit 5";
                $query = mysqli_query($conn, $sql);
                ?>
                <ul>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <li>
                            <?php
                            $temporaryID = $row['id_membership'];
                            $mysql = mysqli_query($conn, "SELECT membership_type FROM membership WHERE id='$temporaryID'");
                            $membershiprow = mysqli_fetch_row($mysql);
                            $membershipID = $membershiprow[0];
                            ?>
                            <div class="split-list">
                                <span><?php echo $membershipID; ?></span>
                            </div>
                            <div class="split-list">
                                <span><?php echo $row['amount_of_payment'] . '€' ?></span>
                            </div>
                            <div class="split-list-full">
                                <span><?php echo $row['start_date']; ?></span>
                            </div>
                            <div class="split-list-full">
                                <span><?php echo $row['end_date']; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="result"></div>
</div>
<?php
require('parts/footer.php');

