<?php
include "conn.php";
include "navbar.php";
if (!isset($_GET['id'])) {
    echo "<script>alert('Student ID is required.'); window.location.href='m-student.php';</script>";
    exit();
}
$student_id = $_GET['id'];
$sql = "SELECT * FROM students WHERE Student_ID = $student_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 1) {
    echo "<script>alert('Student not found.'); window.location.href='m-student.php';</script>";
    exit();
}
$student = mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="../css/update_student.css">
<div class="main">
    <div class="update-container">
        <div class="hea">
            <button onclick="window.history.back()" class="filter-btn">&larr;</button>
            <h2>Update Student</h2>
        </div>
        <form id="updateStudentForm" method="post" action="update_student_conform.php">
            <label for="ID">Student ID:</label>
            <input type="text" id="ID" value="<?php echo $student['Student_ID']; ?>" disabled>
            <input type="hidden" name="ID" id="ID" value="<?php echo $student['Student_ID']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $student['Name']; ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $student['Email']; ?>">
            <label for="dept">Department:</label>
            <select name="dept" id="dept">
                <?php
                $dept_sql = "SELECT * FROM department";
                $dept_result = mysqli_query($conn, $dept_sql);
                while ($dept = mysqli_fetch_assoc($dept_result)) {
                    $selected = ($dept['Department_ID'] == $student['Department_ID']) ? 'selected' : '';
                    echo "<option value='{$dept['Department_ID']}' $selected>{$dept['Name']}</option>";
                }
                ?>
            </select>
            <input type="hidden" value="<?php echo $student['Department_ID'] ?>" name="cdept" id="cdept">
            <button type="submit" name="update" onclick="vefy()">Update Student</button>
        </form>
    </div>
</div>
<script src="../js/update_student.js"></script>
