<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Member</h1>
    <div class="main-box">
        <form action='inc/database/add_account.php' name='submit' id="account-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <label>Username</label>
                <input type="text" name="account_username" id="account_username" placeholder="Username" required> 
                <label>Password</label>
                <input type="password" name="account_password" id="account_password" placeholder="Password" required> 
                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="account_email" id="account_email" placeholder="Enter Email" required/>
                </span>
                <label>Type</label>
                <select name="account_type" required>
                    <option value="disabled" disabled selected>Select</option>
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                </select>
                <input type="submit" value="Submit" name="submit" id="account_submit"/>
            </div>
            <div class="right-form-content">
            </div>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
