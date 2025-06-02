<?php
include "conn.php";
// include 'loading.php';

if (!isset($_GET['ids']) || empty($_GET['ids'])) {
    echo "<script>alert('No faculty selected.'); window.location.href='facultiavability.php';</script>";
    exit();
}

$ids = explode(",", $_GET['ids']);
$ids = array_map('intval', $ids); // Sanitize IDs
$idString = implode(",", $ids);

$sql = "DELETE FROM faculty WHERE Faculty_ID IN ($idString)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>window.location.href='facultyavability.php';</script>";
} else {
    echo "<script>alert('Failed to remove selected faculty members.'); window.location.href='facultiavability.php';</script>";
}
?>