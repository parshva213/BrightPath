<?php
include 'conn.php';
include 'navbar.php';
include 'loading.php';
?>
<link rel="stylesheet" href="../css/m-student.css">

<div id="student">
    <div class="header">
        <div class="line1">
            <h2>Student Details</h2>
        </div>
        <div class="line2">
            <form method="post">
                Department:
                <select name="dept" style="width: 10vw;">
                    <option value="<?php echo ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list'])) ? $_POST['dept'] : ''; ?>" selected <?php if (!($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list']))) echo 'hidden'; ?>>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list'])) {
                            $dept = $_POST['dept'];
                            if ($dept == 1)
                                echo 'All';
                            else {
                                $sql = 'SELECT Name FROM department WHERE Department_ID=' . $dept . ';';
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                echo $row['Name'];
                            }
                        }
                        ?>
                    </option>
                    <option value="1" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list']) && $_POST['dept'] == 1) echo 'hidden'; if (!($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list']))) echo 'selected'; ?>>All</option>
                    <?php
                    $sql = 'SELECT * FROM department;';
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list']) && $row['Department_ID'] == $_POST['dept'])
                            continue;
                        echo '<option value="' . $row['Department_ID'] . '">' . $row['Name'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="stu-list" class="filter-btn" value="Filter">
            </form>
            <div class="redirect">
                Move:
                <div class="card" onclick="window.location.href='facultyavability.php'">Faculty</div>
                <div class="card" onclick="window.location.href='classcheck.php'">Class</div>
            </div>
        </div>
    </div>

    <?php
    $sql = "SELECT students.*, department.Name AS Department_Name FROM students LEFT JOIN department ON students.Department_ID = department.Department_ID";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-list'])) {
        $dept = $_POST['dept'];
        if ($dept != 1) {
            $sql .= ' WHERE students.Department_ID = ' . $dept;
        }
    }
    $result = mysqli_query($conn, $sql);
    ?>

    <form method="post" id="studentForm">
        <table id="stu-tab">
            <tr class="theader">
                <th><input type="checkbox" id="select-all"> Select all</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <?php if (!isset($_POST['stu-list']) || (isset($_POST['stu-list']) && $_POST['dept'] == 1)) echo '<th>Department Name</th>'; ?>
            </tr>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="stu[]" value="' . $row['Student_ID'] . '"></td>';
                echo '<td>' . $row['Student_ID'] . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Email'] . '</td>';
                if (!isset($_POST['stu-list']) || (isset($_POST['stu-list']) && $_POST['dept'] == 1)) {
                    echo '<td>' . $row['Department_Name'] . '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>

        <div id="buttons-container">
            <div>
                <button type="button" class="filter-btn" onclick="updateStudent()">Update</button>
                <button type="button" class="filter-btn" onclick="removeStudent()">Remove</button>
            </div>
            <button type="button" class="filter-btn" onclick="window.location.href='add_student.php'">+ Add Student</button>
        </div>
    </form>
</div>

<script>
document.getElementById('select-all').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('input[name="stu[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
});

function updateStudent() {
    let selected = document.querySelectorAll('input[name="stu[]"]:checked');
    if (selected.length === 1) {
        window.location.href = 'update_student.php?id=' + selected[0].value;
    } else {
        alert("Please select exactly one student to update!");
    }
}

function removeStudent() {
    let selected = document.querySelectorAll('input[name="stu[]"]:checked');
    if (selected.length > 0) {
        let ids = Array.from(selected).map(cb => cb.value).join(',');
        if (confirm("Are you sure you want to remove the selected students?")) {
            document.getElementById('studentForm').action = 'remove_student.php?ids=' + ids;
            document.getElementById('studentForm').submit();
        }
    } else {
        alert("Please select at least one student to remove!");
    }
}
</script>