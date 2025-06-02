<?php
include "conn.php";
// include 'loading.php';

if (!isset($_GET['ids']) || empty($_GET['ids'])) {
    echo "<script>alert('No faculty selected.'); window.location.href='studentlist.php';</script>";
    exit();
}

$ids = explode(",", $_GET['ids']);
$ids = array_map('intval', $ids); // Sanitize IDs
$idString = implode(",", $ids);

$sql = "DELETE FROM students WHERE student_ID IN ($idString)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>window.location.href='studentlist.php';</script>";
} else {
    echo "<script>alert('Failed to remove selected faculty members.'); window.location.href='studentlist.php';</script>";
}
?>