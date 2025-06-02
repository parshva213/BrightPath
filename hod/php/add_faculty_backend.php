<?php
include 'conn.php';
// --- HANDLE FORM SUBMISSION ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faculty_id = $_POST['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
    $email = $_POST['email'];
    // $password = trim($_POST['password']);
    $department_id = $_POST['department_id'];

    if ($faculty_name && $email && $department_id) {
        // Encrypt the password
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO faculty (Faculty_ID, Name, Email, Password, Department_ID) 
                VALUES ('$faculty_id', '$faculty_name', '$email', '$faculty_id', '$department_id')";

        if (mysqli_query($conn, $sql)) {
            header("Location: facultyavability.php"); // Change this to wherever you show all faculties
            exit();
        } else {
            echo "<script>alert('Error while inserting faculty: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill all fields.');</script>";
    }
}

?>