<?php
include 'conn.php';
include 'navbar.php';
include 'loading.php';
?>
<link rel="stylesheet" href="../css/m-class.css">
<div id="class">
    <div class="header">
        <div class="line1">
            <h2>Class Details</h2>
        </div>
        <div class="line2">
        <form method="post">
            Class Name:
            <select name="class" style="width: 10vw;">
                <option value="<?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list']))
                    echo $_POST['class'];
                ?>" selected <?php 
                if (!($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list'])))
                    echo 'hidden';
                ?>>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list'])) {
                    $class = $_POST['class'];
                    if ($class == 0)
                        echo 'All';
                    else {
                        $sql = 'SELECT Class_Name FROM class WHERE Class_ID=' . $class . ';';
                        $result = mysqli_query($conn, $sql);
                        $drow = mysqli_fetch_array($result);
                        echo $drow['Class_Name'];
                    }
                }
                ?>
                </option>
                <option value="0" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list']) && $_POST['class'] == 0) echo 'hidden'; if (!($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list']))) echo 'selected'; ?>>All</option>
                <?php
                $uniqueClasses = array();
                $sql = 'SELECT class_ID, Class_Name FROM class;';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($drow = mysqli_fetch_array($result)) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list']) && $drow['class_ID'] == $_POST['class'])
                            continue;
                        else{
                            if (in_array($drow['class_ID'], $uniqueClasses)) {
                                continue; // Skip duplicate Class_ID
                            } else {
                            $uniqueClasses[] = $drow['class_ID'];
                            echo '<option value="' . $drow['class_ID'] . '">' . $drow['Class_Name'] . '</option>';
                            }
                        }
                    }
                }
            ?>
            </select>
            <input type="submit" name='class-list' value="Filter">
        </form>
        <div class="redirect">
            Move :
            <div class="card" onclick="window.location.href='facultyavability.php'">Faculty</div>    
            <div class="card" onclick="window.location.href='studentlist.php'">Student</div>
        </div>
    </div>
    </div>
    <?php
    // SQL query to fetch the maximum Class_ID
    $usql='UPDATE class c JOIN (SELECT c.Class_ID, COUNT(s.Student_ID) AS student_count FROM class c LEFT JOIN students s ON s.Student_ID = c.Student_ID GROUP BY c.Class_ID) AS subquery ON c.Class_ID = subquery.Class_ID SET c.Total_Students = subquery.student_count;;';
    $uresult=mysqli_query($conn,$usql);
    $sql = 'SELECT MAX(Class_ID) AS cmax FROM class;';
    $result = mysqli_query($conn, $sql);
    $crow = mysqli_fetch_array($result);
    $n = $crow['cmax']; // Maximum Class_ID
    $s=1;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class-list']) && $class!=0){
        $scd = "SELECT Class_ID FROM class WHERE Class_ID =". $class ." ;";
        $sresult=mysqli_query($conn,$scd);
        $srow=mysqli_fetch_array($sresult);
        $n = $srow['Class_ID']; // Maximum Class_ID
        $s= $srow['Class_ID'];
    }
    ?>
    <table id="class-tab">
        <?php
        for ($i = $s; $i <= $n; $i++) { // Properly formatted for loop
            $cname='SELECT * FROM class WHERE Class_ID ='.$i.';';
            $row=mysqli_fetch_array(mysqli_query($conn,$cname));
        ?>
            <tr>
                <td>
                    <table class="cd">
                        <tr>
                            <td>
                                <table class="sd">
                                    <tr>
                                        <th>Class Name</th>
                                        <td class="col" style="border: none;">:</td>
                                        <td style="border: none;">
                                            <?php
                                            echo $row['Class_Name'];
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="sd">
                                    <tr>
                                        <th>Faculty Name</th>
                                        <td class="col" style="border: none;">:</td>
                                        <td style="border: none;">
                                            <?php
                                            $fc='SELECT name FROM faculty WHERE Faculty_ID IN (SELECT Faculty_ID FROM class where class_ID = '.$i.');';
                                            $frow=mysqli_fetch_array(mysqli_query($conn,$fc));
                                            echo $frow['name'];
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="sd">
                                    <tr>
                                        <th>Total Student</th>
                                        <td class="col" style="border: none;">:</td>
                                        <td style="border: none;">
                                            <?php
                                            echo $row['Total_Students'];
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="ssd">
                                    <?php 
                                        $student_query = "SELECT students.Student_ID, students.Name From students,class where class.class_ID = $i and students.student_ID = class.student_ID";
                                    
                                    $sresult = mysqli_query($conn, $student_query);
                                    if ($sresult && mysqli_num_rows($sresult) > 0) {
                                        while ($srow = mysqli_fetch_array($sresult)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $srow['Student_ID']; ?></th>
                                        <td class="col" style="border: none;">:</td>
                                        <td style="border: none;"><?php echo $srow['Name']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php  
        }}
        ?>
    </table>
</div>