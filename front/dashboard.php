<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Dashboard</h1>
    <div class="welcome-container">
        <?php
        $username = $_SESSION['username'];
        echo "<h4>Howdy, " . $username . "</h4>";
        ?>
    </div>
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
                        <h2>Daily</h2>
                        <i class="fa total-employees-icon"></i>
                        <h3>Weekly membership</h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div id="result"></div>
</div>
<?php
require('parts/footer.php');

