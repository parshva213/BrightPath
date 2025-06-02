<?php
include 'navbar.php';
include 'conn.php';
?>
<link rel="stylesheet" href="../css/cc-manage.css">
<div class="main">
    <h4>Manage Course Access</h4>
    <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['allow'])) {
    $checkedCourses = isset($_POST['ccid']) ? $_POST['ccid'] : []; // Checked courses
    
    // Get all courses from the department
    $sql = "SELECT Course_ID FROM course WHERE Department_ID = " . $_SESSION["did"];
    $cresult = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($cresult)) {
        $courseId = $row['Course_ID'];
        $status = in_array($courseId, $checkedCourses) ? "Allow" : "Not-Allow";
        
        // Check if course exists in cvallow
        $checkQuery = "SELECT * FROM cvallow WHERE Course_ID = $courseId";
        $checkResult = mysqli_query($conn, $checkQuery);
        
        if (mysqli_num_rows($checkResult) > 0) {
            // Update existing status
            $updateQuery = "UPDATE cvallow SET Status = '$status' WHERE Course_ID = $courseId";
            mysqli_query($conn, $updateQuery);
        } else {
            // Insert new record
            $insertQuery = "INSERT INTO cvallow (Course_ID, Status) VALUES ($courseId, '$status')";
            mysqli_query($conn, $insertQuery);
        }
    }
    echo "<h3>Course access updated successfully!</h3>";
}
?>
    <form method="post">
        <table id="callow">
            <tr>
                <th>Select</th>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Cridets</th>
            </tr>
        <?php 
        $sql='SELECT * from course where Department_ID ='. $_SESSION["did"].';';
        $cresult=mysqli_query($conn,$sql);
        if(mysqli_num_rows($cresult)>0){
            while($row=mysqli_fetch_array($cresult)){
                $allow='SELECT Status From cvallow where Course_ID = '. $row['Course_ID'].';';
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['allow'])) {
                $allow='SELECT Status From cvallow where Course_ID = '. $row['Course_ID'].';';
                }
                $rallow=mysqli_query($conn,$allow);
                $rowallow=mysqli_fetch_array($rallow);
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="ccid[]" value="<?php echo $row['Course_ID']; ?>" <?php if($rowallow['Status'] == "Allow") echo "checked"; ?>>
                    </td>
                    <td>
                        <?php echo $row['Course_ID'];?>
                    </td>
                    <td>
                        <?php echo $row['Course_Name'];?>
                    </td>
                    <td>
                        <?php echo $row['Credits'];?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </table>
        <input type="submit" value="Apply Access" name="allow">
    </form>
</div>