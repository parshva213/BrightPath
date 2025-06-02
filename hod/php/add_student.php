<?php 
include 'conn.php'; 
include 'navbar.php';
?>
<link rel="stylesheet" href="../css/add_student.css">
<script src="../js/add-student.js"></script>
<div class="main">
    <h2>Add New Student</h2>

    <form action="conform_student.php" method="POST">
        <div>
            <label>Name:</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>Department:</label>
            <select name="department_id">
                <option value="">--Select Department--</option>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM department");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Department_ID']}'>{$row['Name']}</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <input type="submit" value="Next">
        </div>
    </form>
</div>