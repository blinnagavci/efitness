<?php
require('parts/header.php');
require('inc/database/db_connect.php');
//require('inc/database/db_connect.php');
if (isset($_POST['add-employee-payment'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $employeetype = $_POST['employee_subscription'];
    $salaryamount = $_POST['salary_amount'];
    $employeestart = $_POST['employee_start'];
    $employeeend = $_POST['employee_end'];
    $employeeid = mysqli_query($conn, "SELECT id from employee_type WHERE employee_type = '$employeetype'");
    $employeerow = mysqli_fetch_row($employeeid);

    $sql = "INSERT INTO employee_contract (amount_of_salary, start_date, end_date, employee_id, employee_type_id)
    VALUES ('$salaryamount', '$employeestart', '$employeeend', '$id', '$employeerow[0]')";

    $retval1 = mysqli_query($conn, $sql);
    header("refresh: 0;");
    if (!$retval1) {
        die('Could not enter data to employee contract table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Contract successfully added')</script>";
    }

    mysqli_close($conn);
}


require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Employee Contract</h1>
    <div class="main-box">
        <div class = "right-form-content">
            <label>Employee Type</label>
            <form method="POST" name="add-employee-contract" id="add-employee-contract" action="">
                <select name = "employee_subscription" required>
                    <option value = "select" disabled selected>Select</option>
                    <?php
                    //include('inc/database/db_connect.php');

                    $sql = 'SELECT employee_type FROM employee_type WHERE status= "0"';
                    $retval = mysqli_query($conn, $sql);
                    if (!$retval) {
                        echo ("Could not retrieve data" . mysql_error());
                    }
                    while ($row = $retval->fetch_assoc()) {
                        $employee_type = $row['employee_type'];
                        echo "<option value='$employee_type'>$employee_type</option>";
                    }
                    //mysqli_close($conn);
                    ?>
                </select>
                <label>Salary Amount</label>
                <input class="number" type='text' name='salary_amount' id='salary_amount' placeholder='Enter Salary Amount' required/>
                <label>Start Date</label>
                <span class="date">
                    <input class="employee-date-picker readonly" type="text" name="employee_start" id="employee_start" placeholder="Enter Start Date" required/>
                </span>
                <label>End Date</label>
                <span class="date">
                    <input class="employee-date-picker readonly" type="text" name="employee_end" id="employee_end" placeholder="Enter End Date" required/>
                </span>
                <input type="submit" value="Add Contract" name="add-employee-payment" id="add-employee-submit"/>


            </form>
        </div>
        <div class="left-form-content">
            <?php
            require('inc/database/db_connect.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT id, start_date, end_date, amount_of_salary FROM employee_contract WHERE employee_id = '$id' ORDER BY id DESC";
                $result = $conn->query($sql);
            }
            if ($result->num_rows > 0) {
                ?>
                <table class="employee-contract-table">
                    <tr>
                        <th>ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Salary</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td><?php echo $row['amount_of_salary'] . '€'; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "No results";
                }
                $conn->close();
                ?>
            </table>
        </div>
    </div>
</div>
<?php
require('parts/footer.php');

