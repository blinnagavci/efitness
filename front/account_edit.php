<?php
require('parts/header.php');
require('inc/database/db_connect.php');
if (isset($_POST['account_edit_submit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $getAccount = mysqli_query($conn, "SELECT admin_status FROM account WHERE id = '$id'");
    $accountType = mysqli_fetch_row($getAccount);

    if ($accountType[0] == 0) {
        $getAll = "SELECT username FROM account WHERE admin_status='0' AND status='0'";
        $result = $conn->query($getAll);

        if ($result->num_rows <= 1) {
            echo "<script type=text/javascript>window.alert('You must have at least one Admin account')</script>";
            header("refresh: 0; url = manage_accounts");
            exit();
        }
    }

    $username = $_POST['account_username'];
    $temporary_password = ($_POST['account_password']);
    $email = ($_POST['account_email']);
    $accounttype = $_POST['account_type'];

    $password = sha1($temporary_password);

    $sql = "UPDATE account SET username='$username', password='$password', email='$email', admin_status='$accounttype' WHERE id = $id";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to account table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Account successfully edited')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = manage_accounts");
}
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Account</h1>
    <div class="main-box">
        <form action='' name='submit' id="account-edit-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <?php
                require('inc/database/db_connect.php');
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $sql = "SELECT username, password, email, admin_status FROM account WHERE id = '$id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <label>Username</label>
                <input type="text" name="account_username" id="account_username" placeholder="Username" value='<?php echo $row['username']; ?>' required> 
                <label>Password</label>
                <input type="password" name="account_password" id="account_password" placeholder="New password" value='<?php echo $row['password']; ?>' readonly="true" ondblclick="this.readOnly = ''; value = '';" required>
                <p class="double-click">Double click change password</p>

                <label>E-mail</label>
                <span class="email">
                    <input type="email" name="account_email" id="account_email" placeholder="Enter Email" value='<?php echo $row['email']; ?>' required/>
                </span>
                <label>Type</label>
                <select name="account_type" required>
                    <?php
                    $status = $row['admin_status'];
                    if ($status == 0) {
                        echo '<option value="0" selected>Admin</option>';
                    } else {
                        echo '<option value="1" selected>User</option>';
                    }
                    ?>                    
                    <?php
                    switch ($row['admin_status']) {
                        case '0':
                            echo '<option value="1">User</option>';
                            break;
                        case '1':
                            echo '<option value="0">Admin</option>';
                            break;
                        default:
                            echo 'Something went wrong';
                    }
                    ?>
                </select>
                <input type="submit" value="Submit" name="account_edit_submit" id="account_edit_submit"/>
            </div>
            <div class="right-form-content">
            </div>
            <?php mysqli_close($conn); ?>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
