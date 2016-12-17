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
            <form id="searchform" method="post" action="search_members_field.php?go"> 
                <input type="text" name="name" class="search-box" placeholder="Search Member..." required> 
                <input type="submit" name="submit" value="Search" class="search-button"> 
            </form>

            <table class="member-table">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone No.</th>
                    <th colspan="3">Options</th>
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
                        <td class="buttons">
                            <a class="edit-member" href="">Edit</a>
                        </td>
                        <td class="buttons">
                            <a class="remove-member" href='inc/database/remove_member.php?id=<?php echo $row['id'] ?> ' name="remove-member"/>Delete</a>
                        </td>  
                        <td class="buttons">
                            <script type="text/javascript">
                                function popupwindow(url, title, win, w, h) {
                                    var y = window.top.outerHeight / 2 + window.top.screenY - (h / 2);
                                    var x = window.top.outerWidth / 2 + window.top.screenX - (w / 2);
                                    return window.open('member_details.php', 'Member Details', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
                                }
                            </script>
                            <a class="details-member" href='member_details.php?id=<?php echo $row["id"] ?>' name="details-member"/>Details</a>
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

