<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_class'])) {
    $class_id = $_POST['class_id'];

    // Class Details Fetch Karna
    $query = "SELECT * FROM class WHERE Class_ID = $class_id";
    $result = mysqli_query($conn, $query);
    $class_data = mysqli_fetch_array($result);

    if (!$class_data) {
        echo "Class not found!";
        exit;
    }
} else {
    echo "Invalid Request!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_changes'])) {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $faculty_id = $_POST['faculty_id'];

    // Update Query
    $update_query = "UPDATE class SET Class_Name = '$class_name', Faculty_ID = $faculty_id WHERE Class_ID = $class_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Class Updated Successfully!'); window.location.href='class_details.php';</script>";
    } else {
        echo "Error updating class: " . mysqli_error($conn);
    }
}

// Faculty List Fetch Karna
$faculty_query = "SELECT * FROM faculty";
$faculty_result = mysqli_query($conn, $faculty_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Class</title>
    <link rel="stylesheet" href="../css/m-class.css">
</head>
<body>
    <div id="update-form">
        <h2>Update Class Details</h2>
        <form method="post">
            <input type="hidden" name="class_id" value="<?php echo $class_data['Class_ID']; ?>">
            
            <label>Class Name:</label>
            <input type="text" name="class_name" value="<?php echo $class_data['Class_Name']; ?>" required>
            
            <label>Faculty:</label>
            <select name="faculty_id">
                <?php
                while ($faculty = mysqli_fetch_array($faculty_result)) {
                    $selected = ($faculty['Faculty_ID'] == $class_data['Faculty_ID']) ? 'selected' : '';
                    echo "<option value='{$faculty['Faculty_ID']}' $selected>{$faculty['name']}</option>";
                }
                ?>
            </select>
            
            <input type="submit" name="save_changes" value="Save Changes">
        </form>
        <a href="class_details.php">Cancel</a>
    </div>
</body>
</html>
