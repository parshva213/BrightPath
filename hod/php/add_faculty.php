<?php 
include 'navbar.php';
include 'conn.php';

// Generate next Faculty ID
$nextFacultyID = 1;
$result = mysqli_query($conn, "SELECT MAX(Faculty_ID) AS max_id FROM faculty");
if ($row = mysqli_fetch_assoc($result)) {
    $nextFacultyID = $row['max_id'] + 1;
}

// Get departments
$departments = mysqli_query($conn, "SELECT * FROM department");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Faculty</title>
    <link rel="stylesheet" href="../css/add_faculty.css">
</head>
<body>
<div class="main">
    <div class="form-container">
        <h2>Add New Faculty</h2>
        <form id="facultyForm" action="add_faculty_backend.php" method="POST">
            <span class="error" id="formError">Please fill all the fields!</span>
            
            <label for="faculty_id">Faculty ID</label>
            <input type="text" name="faculty_id" id="faculty_id" value="<?php echo $nextFacultyID; ?>" readonly>

            <label for="faculty_name">Faculty Name</label>
            <input type="text" name="faculty_name" id="faculty_name">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <!-- <label for="password">Password</label>
            <input type="password" name="password" id="password"> -->

            <label for="department_id">Department</label>
            <select name="department_id" id="department_id">
                <option value="">-- Select Department --</option>
                <?php while ($dept = mysqli_fetch_array($departments)) { ?>
                    <option value="<?php echo $dept['Department_ID']; ?>"><?php echo $dept['Name']; ?></option>
                <?php } ?>
            </select>

            <button type="submit">Add Faculty</button>
        </form>
    </div>
</div>
<script src="../js/add-faculty.js" ></script>

</body>
</html>
