<?php
session_start();

if (!isset($_SESSION['submitted']) || !$_SESSION['submitted']) {
    header("Location: attendance_management.php");
    exit();
}

$selected_class = $_SESSION['selected_class'];
$num_lectures = $_SESSION['num_lectures'];
$attendance = $_SESSION['attendance'] ?? [];
$students_by_class = $_SESSION['students_by_class'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Summary</title>
</head>
<body>
    <h3>Absent Students</h3>
    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Number of Absences</th>
            <th>Absent in Lectures</th>
        </tr>
        <?php 
        foreach ($students_by_class[$selected_class] as $student) {
            $student_id = $student['id'];
            $absent_lectures = [];
            $absence_count = 0;

            for ($j = 1; $j <= $num_lectures; $j++) {
                if (!isset($attendance[$student_id][$j])) {
                    $absent_lectures[] = "Lecture $j";
                    $absence_count++;
                }
            }

            if ($absence_count > 0) {
                echo "<tr><td>$student_id</td><td>{$student['name']}</td><td>$absence_count</td><td>" . implode(', ', $absent_lectures) . "</td></tr>";
            }
        }
        ?>
    </table>
</body>
</html>
