<?php
require ('parts/header.php');
include ('inc/database/db_connect.php');
include('inc/database/login.php');

if (isset($_SESSION['logged_in'])) {
    header('refresh: 0; url=dashboard');
}

if (isset($_REQUEST['submit_login'])) {
    extract($_REQUEST);
    if ($obj->Login("account", $username, $password)) {
        header('location: dashboard');
    } else {
        echo"<script type='text/javascript'> window.alert('Invalid username or password!');</script>";
    }
}
?>
<div class="table-display">
    <div class="login-container">
        <div class="center-login">
            <div class="form-container">
                <h1>LOGIN</h1>
                <form id="login-form" action="" method="POST">
                    <span class="login-username">
                        <input type="text" name="username" placeholder="Username" required> 
                    </span>
                    <span class="login-password">
                        <input type="password" name="password" placeholder="Password" required> 
                    </span>
                    <input type="submit" class="submit-login" value="Login" name="submit_login"/>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require ('parts/footer.php');
