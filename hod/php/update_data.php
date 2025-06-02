<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = trim($_POST['student_id'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $department_id = intval($_POST['department_id'] ?? 0);
    $sid = intval($_POST['dbid'] ?? 0);

    // Update the student record
    $sql = "UPDATE students 
            SET Student_ID = '$student_id', 
                Name = '$name', 
                Email = '$email', 
                Department_ID = '$department_id', 
                password = '$student_id' 
            WHERE Student_ID = '$sid'";
    
    $res = mysqli_query($conn, $sql);

    if ($res) {
        header("Location: studentlist.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: update_student.php");
    exit();
}
