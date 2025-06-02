<?php 
include 'navbar.php';
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Courses</title>
    <link rel="stylesheet" href="../css/cc-view.css">
</head>
<body>
<div class="main">
    <?php
    $select = "SELECT * FROM course WHERE course_id NOT IN (SELECT course_id FROM cvallow WHERE status = 'not-allow') AND department_id = " . $_SESSION['did'];
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $courseId = $row['Course_ID'];
            $fetch_image_address = "SELECT * FROM ipath WHERE course_ID = '$courseId'";
            $imagePath = mysqli_query($conn, $fetch_image_address);
            $imageRow = mysqli_fetch_array($imagePath);
            $ipath="../images/courseimages/".$imageRow['path'];
    ?>
    <div class="card" onclick="window.location.href='course_details.php?cid=<?php echo $courseId; ?>'">
        <div class="img">
            <img src="<?php echo $ipath; ?>" alt="Subject Image">
        </div>
        <div class="name">
            <p><?php echo $row['Course_ID'] . " - " . $row['Course_Name']; ?></p>
        </div>
    </div>
    <?php
        }
    } else {
        echo "<p>No courses available.</p>";
    }
    ?>
</div>
</body>
</html>
