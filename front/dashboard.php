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
                        <h3>Total members</h3>
                    </div>
                </li>
                <li>
                    <div class="weekly-joinings">
                        <h2>200</h2>
                        <i class="fa weekly-joinings-icon"></i>
                        <h3>Joined this week</h3>
                    </div>
                </li>
                <li>
                    <div class="total-employees">
                        <h2>200</h2>
                        <i class="fa total-employees-icon"></i>
                        <h3>Total employees</h3>
                    </div>
                </li>
                <li>
                    <div class="most-popular-membership">
                        <h2 class="not-increased">Daily</h2>
                        <i class="fa popular-membership-icon"></i>
                        <h3>Most popular membership</h3>
                    </div>
                </li>
                <li>
                    <div class="total-payments">
                        <h2>9201</h2>
                        <i class="fa total-payments-icon"></i>
                        <h3>Total payments received</h3>
                    </div>
                </li>
                <li>
                    <div class="total-accounts">
                        <h2>24</h2>
                        <i class="fa total-accounts-icon"></i>
                        <h3>Total accounts</h3>
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
                $sql = "SELECT * FROM member order by id desc limit 4";
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
                            <div class="split-list">
                                <span><?php echo $row['gender']; ?></span>
                            </div>
                            <div class="split-list">
                                <span><?php echo $row['city']; ?></span>
                            </div>
                        </li>
<?php } ?>
                </ul>
            </div>
            <div class="last-members-2">
                <div class="wrap-latest">
                    <i class="fa members-icon"></i>
                    <h3>Latest Members</h3>
                    <a class="add-member" href="members" title="Add Member">
                    <i class="fa add-member-icon"></i>
                        Add
                    </a>
                 </div>
                <?php
                $sql = "SELECT * FROM member order by id desc limit 4";
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
                            <div class="split-list">
                                <span><?php echo $row['gender']; ?></span>
                            </div>
                            <div class="split-list">
                                <span><?php echo $row['city']; ?></span>
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

