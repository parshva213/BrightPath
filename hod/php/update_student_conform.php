<?php
include 'conn.php';

// Ensure the page is accessed via form POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dbid = intval($_POST['ID'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $dept = isset($_POST['dept']) ? intval($_POST['dept']) : 0;
    $cdept = isset($_POST['cdept']) ? intval($_POST['cdept']) : 0;

    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if ($dept <= 0) $errors[] = "Department must be selected.";

    if (count($errors) > 0) {
        echo "<script>alert('" . implode("\\n", $errors) . "'); window.history.back();</script>";
        exit;
    }

    // Check if the department has changed
    if ($dept !== $cdept) {
        $dquery = "SELECT Name FROM department WHERE Department_ID = $dept LIMIT 1";
        $dresult = mysqli_query($conn, $dquery);
        $dname = ($drow = mysqli_fetch_assoc($dresult)) ? $drow['Name'] : 'Unknown';

        // Get max Student_ID from the new department
        $query = "SELECT MAX(Student_ID) AS max_id FROM students WHERE Department_ID = $dept";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        $new_id = $data['max_id'] ? $data['max_id'] + 1 : (23000 + $dept) * 100 + 1; // Optional fallback logic
    } else {
        $dquery = "SELECT Name FROM department WHERE Department_ID = $dept";
        $dresult = mysqli_query($conn, $dquery);
        $dname = ($drow = mysqli_fetch_assoc($dresult)) ? $drow['Name'] : '';
        $new_id = $dbid; // Keep the same ID if the department hasn't changed
    }
} else {
    header("Location: update_student.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Student</title>
    <link rel="stylesheet" href="../css/conform_student.css">
</head>
<body>
    <div class="main">
        <h2>Confirm Student Details</h2>
        <form method="post" action="update_data.php">
            <input type="hidden" value="<?php echo $dbid; ?>" name="dbid">
            <label>Generated Student ID:</label>
            <input type="text" name="student_id" value="<?php echo $new_id; ?>" readonly>

            <label>Student Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>

            <label>Department:</label>
            <input type="text" value="<?php echo $dname; ?>" readonly>
            <input type="hidden" name="department_id" value="<?php echo $dept; ?>">

            <div class="buttons">
                <button type="button" onclick="history.back()">Modify</button>
                <button type="submit">Confirm</button>
            </div>
        </form>
    </div>
</body>
<script src="../js/conform-student.js"></script>
</html>
