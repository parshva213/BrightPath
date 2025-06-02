<?php
include 'conn.php';
include 'navbar.php';
?>
<link rel="stylesheet" href="../css/m-student.css">
<div id="student">
    <div class="header">
    <div class="line1">
        <h2>Student Details</h2>
    </div>

</div>


    <?php
    $sql = 'SELECT * FROM `students` WHERE Student_ID IN(SELECT Student_ID FROM class where faculty_id='.$_SESSION['fid'].');';
        $result = mysqli_query($conn, $sql);
        ?>
        <!-- <form method="post"> -->
            <table id="stu-tab">
                <tr>
                     <th>Select</th> 
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                         echo '<td><input type="checkbox" name="stu[]" value="' . $row['Student_ID'] . '"></td>';
                        echo '<td>' . $row['Student_ID'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['Email'] . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stu-action'])) {
    $action = $_POST['action'];
    if ($action == 0) {
        echo '<script>alert("Choose an action")</script>';
    } else {
        $stu = $_POST['stu'];
        if ($action == 1) {
            $sql = 'DELETE FROM students WHERE Student_ID IN (' . implode(',', $stu) . ');';
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Deleted Successfully")</script>';
            } else {
                echo '<script>alert("Error")</script>';
            }
        }
    }
}
?>