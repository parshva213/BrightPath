<?php
include 'conn.php';
include 'navbar.php';

echo "<script>
  window.addEventListener('pageshow', function(event) {
    if (event.persisted || performance.navigation.type === 2) {
      // This means the page was loaded via browser back/forward
      window.location.reload();
    }
  });
</script>";

// Ensure the page is accessed via form POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$dept = isset($_POST['department_id']) ? intval($_POST['department_id']) : 0;

$errors = [];
if (empty($name)) $errors[] = "Name is required.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
if ($dept <= 0) $errors[] = "Department must be selected.";

    if (count($errors) > 0) {
        echo "<script>alert('" . implode("\\n", $errors) . "'); window.history.back();</script>";
        exit;
    }

    // Get department name
    $dquery = "SELECT Name FROM department WHERE Department_ID = $dept LIMIT 1";
    $dresult = mysqli_query($conn, $dquery);
    $dname = ($drow = mysqli_fetch_assoc($dresult)) ? $drow['Name'] : 'Unknown';

    // Get max Student_ID from that department
    $query = "SELECT MAX(Student_ID) AS max_id FROM students WHERE Department_ID = $dept";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $new_id = $data['max_id'] ? $data['max_id'] + 1 : $dept * 100 + 1; // Optional fallback logic
} else {
    header("Location: add_student.php");
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
        <form method="post" action="insert_data.php">
            <label>Generated Student ID:</label>
            <input type="text" name="student_id" value="<?= $new_id ?>" readonly>

            <label>Student Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" readonly>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" readonly>

            <label>Department:</label>
            <input type="text" value="<?= $dname ?>" readonly>
            <input type="hidden" name="department_id" value="<?= $dept ?>">

            <div class="buttons">
                <button type="button" onclick="history.back()">Modify</button>
                <button type="submit">Confirm</button>
            </div>
        </form>
    </div>
</body>
<script src="../js/conform-student.js"></script>
</html>
