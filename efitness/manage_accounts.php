<?php
require('parts/header.php');
require('parts/navigation.php');
require('inc/database/db_connect.php');
?>

<div class="main-right">

    <?php
    $sql = "SELECT id, username, password, email, admin_status FROM account WHERE status='0'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        ?>
        <h1>Manage Accounts</h1>
        <div class="main-box">
            <div class="table-div">
                <table class="employee-table">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th colspan="2">Options</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo '*******' ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php
                                $status = $row['admin_status'];
                                if ($status == 0) {
                                    echo 'Admin';
                                } else {
                                    echo 'User';
                                }
                                ?>
                            </td>
                            <td class="buttons">
                                <a class="edit-account" href="account_edit.php?id=<?php echo $row["id"] ?>" name="edit-account">Edit</a>
                            </td>
                            <td class="buttons">
                                <a class="remove-account" onclick="return confirm('Are you sure you want to delete this account?');" href='inc/database/remove_account.php?id=<?php echo $row['id'] ?>' name="remove-account"/>Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <a class="add-account-button" href="add_account" name="add-account-button">Add Account</a>
        </div>
        <?php
    } else {
        echo "No results";
    }
    $conn->close();
    ?>
</div>
<?php
require('parts/footer.php');

