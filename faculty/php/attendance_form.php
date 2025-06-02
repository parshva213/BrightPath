<?php
session_start();

if (!isset($_SESSION['selected_class']) || !isset($_SESSION['num_lectures'])) {
    header("Location: attendance_management.php");
    exit();
}

// ✅ Fetch the correct students from session
$selected_class = $_SESSION['selected_class'];
$num_lectures = $_SESSION['num_lectures'];
$students_by_class = $_SESSION['students_by_class']; // ✅ Fetch class data

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_attendance'])) {
    $_SESSION['attendance'] = $_POST['attendance'] ?? [];
    $_SESSION['submitted'] = true;

    header("Location: attendance_summary.php");  // Redirect to attendance summary page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Form</title>
</head>
<body>
    <h3>Enter Attendance for Class <?php echo $selected_class; ?> on <?php echo $_SESSION['attendance_date']; ?></h3>
    <form method="post">
        <table border="1">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <?php for ($j = 1; $j <= $num_lectures; $j++) echo "<th>Lecture $j</th>"; ?>
            </tr>
            <?php 
            // ✅ Fetch students dynamically
            foreach ($students_by_class[$selected_class] as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <?php for ($j = 1; $j <= $num_lectures; $j++): ?>
                        <td>
                            <input type="checkbox" name="attendance[<?php echo $student['id']; ?>][<?php echo $j; ?>]">
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit" name="submit_attendance">Submit Attendance</button>
    </form>
</body>
</html>
