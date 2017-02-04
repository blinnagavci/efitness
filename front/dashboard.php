<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Dashboard</h1>
    <div class="welcome-container">
        <?php
        if (isset($_SESSION['logged_in'])) {
//            $username = $_SESSION['username'];
//            echo "<h4>Howdy, " . $username . "</h4>";
        }
        ?>
    </div>
    <div class="main-box">

    </div>
    <div id="result"></div>
</div>
<?php
require('parts/footer.php');

