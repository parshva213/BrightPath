<?php
include "conn.php";
include "navbar.php";
include "loading.php";
?>
<link rel="stylesheet" href="../css/m-faculty.css">

<div id="faculty">
    <div class="header">
        <div class="line1">
            <h2>Faculty Details</h2>
        </div>

        <div class="line2">
            <form method="post">
                Department:
                <select name="dept" style="width: 10vw;">
                    <option value="<?php echo ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list'])) ? $_POST['dept'] : ''; ?>" 
                        selected <?php if (!($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list']))) echo 'hidden'; ?>>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list'])) {
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
                    <option value="1" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list']) && $_POST['dept'] == 1) echo 'hidden'; if (!($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list']))) echo 'selected'; ?>>All</option>
                    <?php
                    $sql = 'SELECT * FROM department;';
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list']) && $row['Department_ID'] == $_POST['dept'])
                            continue;
                        echo '<option value="' . $row['Department_ID'] . '">' . $row['Name'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name='fac-list' class="filter-btn" value="Filter">
            </form>

            <div class="redirect">
                Move:
                <div class="card" onclick="window.location.href='studentlist.php'">Student</div>
                <div class="card" onclick="window.location.href='classcheck.php'">Class</div>
            </div>
        </div>
    </div>

    <?php
    $fsql = "SELECT faculty.*, department.Name AS Department_Name 
             FROM faculty 
             LEFT JOIN department ON faculty.Department_ID = department.Department_ID";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fac-list'])) {
        $dept = $_POST['dept'];
        if ($dept != 1) {
            $fsql .= " WHERE faculty.Department_ID = " . $dept;
        }
    }

    $fresult = mysqli_query($conn, $fsql);
    ?>

    <form method="post" id="facultyForm">
        <table id="fac-tab">
            <tr class="theader">
                <th><input type="checkbox" id="select-all"> Select all</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <?php if (!isset($_POST['fac-list']) || (isset($_POST['fac-list']) && $_POST['dept'] == 1)) echo '<th>Department Name</th>'; ?>
            </tr>

            <?php
            while ($frow = mysqli_fetch_array($fresult)) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="fac[]" value="' . $frow['Faculty_ID'] . '"></td>';
                echo '<td>' . $frow['Faculty_ID'] . '</td>';
                echo '<td>' . $frow['Name'] . '</td>';
                echo '<td>' . $frow['Email'] . '</td>';
                if (!isset($_POST['fac-list']) || (isset($_POST['fac-list']) && $_POST['dept'] == 1)) {
                    echo '<td>' . $frow['Department_Name'] . '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>

        <div id="buttons-container">
            <div>
                <button type="button" class="filter-btn" onclick="updateFaculty()">Update</button>
                <button type="button" class="filter-btn" onclick="removeFaculty()">Remove</button>
            </div>
            <button type="button" class="filter-btn" onclick="window.location.href='add_faculty.php'">+ Add Faculty</button>
        </div>
        <!-- <input type="hidden" name="fac-action" value="delete"> -->
    </form>
</div>

<script>
document.getElementById('select-all').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('input[name="fac[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
});

function updateFaculty() {
    let selected = document.querySelectorAll('input[name="fac[]"]:checked');
    if (selected.length === 1) {
        window.location.href = 'update_faculty.php?id=' + selected[0].value;
    } else {
        alert("Please select exactly one faculty member to update!");
    }
}

function removeFaculty() {
    let selected = document.querySelectorAll('input[name="fac[]"]:checked');
    if (selected.length > 0) {
        let ids = Array.from(selected).map(cb => cb.value).join(',');
        if (confirm("Are you sure you want to remove the selected faculty?")) {
            document.getElementById('facultyForm').action = 'remove_faculty.php?ids=' + ids;
            document.getElementById('facultyForm').submit();
        }
    } else {
        alert("Please select at least one faculty member to remove!");
    }
}
</script>