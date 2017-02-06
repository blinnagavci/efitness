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
            <div class="today-members">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM member WHERE `date_added` >= CURDATE()");
                $numrows = mysqli_num_rows($result);
                echo "<h2>500</h2>";
                ?>
                <i class="fa today-members-icon"></i>
                <h3>Total members</h3>
            </div>
            <div class=""
        </div>
    </div>
    <div id="result"></div>
</div>
<?php
require('parts/footer.php');

