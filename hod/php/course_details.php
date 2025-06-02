<?php 
include 'navbar.php';
include 'conn.php';
$cid=$_GET['cid'];
?>

<link rel="stylesheet" href="../css/course_details.css">

<div class="main">
    <h2 class="title">Course Details</h2>
    <div class="course-container">
    <?php
        $select = "SELECT * FROM course WHERE Course_ID = " . $_GET['cid'] . ";";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="course-card">
            <div class="course-info">
                <h3><?php echo $row['Course_Name']; ?></h3>
                <p><strong>ID:</strong> <?php echo $row['Course_ID']; ?></p>
                <p><strong>Credits:</strong> <?php echo $row['Credits']; ?></p>
                <!-- <p><strong>Description:</strong> <?php echo $row['Description']; ?></p> -->
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p class='no-data'>No courses found for your department.</p>";
        }
        ?>
    </div>
</div>
