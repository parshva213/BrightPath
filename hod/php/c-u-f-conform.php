<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $cid = intval($_POST['cid']); // Ensure it's an integer
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $credits = intval($_POST['credits']); // Ensure it's an integer
    if(empty($cid) || empty($cname) || empty($credits)){
        ?>
        <form method="post" action="c-u-form.php">
        <input type="number" value="<?php echo $cid ?>" name='orderlist' hidden> 
        ANY VALUE IS NULL 
        <input type="submit" value="check">
        </form>
        <?php
    }else{
        // Properly formatted SQL queries
        $sql1 = "
            UPDATE course 
            SET Course_Name = '$cname', Credits = $credits 
            WHERE course_id = $cid;
            
            UPDATE history_course 
            SET Course_Name = '$cname', Credits = $credits 
            WHERE course_id = $cid;
        ";
        // Execute the multi-query
        if (mysqli_multi_query($conn, $sql1)) {
            header("Location: ../php/c-update.php");
            exit();
        } else {
            echo "Error occurred: " . mysqli_error($conn);
        }
    }
}
?>
