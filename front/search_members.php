<?php
require('parts/header.php');
require('parts/navigation.php');
require('inc/database/db_connect.php');
?>
<div class="main-right">
    <?php
    $sql = "SELECT id, first_name, last_name, gender, birth_date, telephone_no FROM member";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        ?>
        <h1>Search Member</h1>
        <div class="main-box">
            <table class="member-table">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone No.</th>
                    <th colspan="2">Options</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['birth_date'] ?></td>
                        <td><?php echo $row['telephone_no'] ?></td>
                        <td class="buttons"><a class="edit-member" href="#">Edit</a></td>
                        <td class="buttons">
                            <a class="remove-member" href='inc/database/remove_member.php?id=<?php echo $row['id'] ?> ' name="remove-member"/>Delete</a>
                        </td>    
                    </tr>

                <?php } ?>
            </table>
            <button class="generate-pdf">Export to PDF</button>
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

