<?php
require('parts/header.php');
require('parts/navigation.php');
require('inc/database/db_connect.php');
?>

<div class="main-right">
    <?php
    $sql = "SELECT id, first_name, last_name, gender, birth_date, telephone_no FROM employee";
    $result = $conn->query($sql);


    // output data of each row
    ?>
    <h1>Search Employee</h1>
    <div class="main-box">
        <?php if ($result->num_rows > 0) { ?>
            <form id="searchform" method="post" action="search_employees_field.php?go"> 
                <input type="text" name="name" class="search-box" placeholder="Search Employee..." required> 
                <input type="submit" name="submit" value="Search" class="search-button"> 
            </form>
            <div class="table-div">
                <table class="employee-table">
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
                                <a class="edit-employee" href="employee_edit.php?id=<?php echo $row["id"] ?>" name="edit-employee">Edit</a>
                            </td>
                            <td class="buttons">
                                <a class="remove-employee" onclick="return confirm('Are you sure you want to delete this employee?');" href='inc/database/remove_employee.php?id=<?php echo $row['id'] ?>' name="remove-employee"/>Delete</a>
                            </td>  
                            <td class="buttons">
                                <a class="details-employee" href='employee_details.php?id=<?php echo $row["id"] ?>' name="details-employee"/>Details</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <?php
        } else {
            echo "No results";
        }
        ?>
    </div>
    <?php
    $conn->close();
    ?>
</div>
<?php
require('parts/footer.php');

