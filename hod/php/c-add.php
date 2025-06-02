<?php
include 'conn.php';
include 'navbar.php';
?>
<link rel="stylesheet" href="../css/c-add.css">
<div class="main">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['courseinsert'])) {
        // Sanitize inputs
        $cid = mysqli_real_escape_string($conn, $_POST['cid']);
        $cname = mysqli_real_escape_string($conn, $_POST['cname']);
        $credits = mysqli_real_escape_string($conn, $_POST['credits']);
        $did = mysqli_real_escape_string($conn, $_SESSION['did']);
        $hid = mysqli_real_escape_string($conn, $_SESSION['hid']);

        // Corrected SQL query with quotes for strings
        $ins = "INSERT INTO course (course_id, course_name, credits, department_id, hod_id) 
                VALUES ('$cid', '$cname', '$credits', '$did', '$hid')";

        $res = mysqli_query($conn, $ins);
        
        if (!$res) {
            echo "Error: " . mysqli_error($conn); // Debugging error
        } else {
            echo "<h3>Course Added Successfully!</h3>";
        }
    } else {
        echo "<h3>No data submitted.</h3>";
    }
} else {
    echo "No data found.";
}
?>

<button onclick="window.location.href='c-view.php'"> Course Page</button>
</div>