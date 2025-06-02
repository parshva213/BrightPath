<h2>Attendance Management System</h2>
    <form method="post">
        <label>Select Faculty:</label>
        <select name="faculty" required>
        
        </select>

        <label>Select Class:</label>
        <select name="class" required>
        Class Name:
            <select name="class" style="width: 10vw;">
                <option value="<?php "
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
        </select>

        <label>Number of Lectures Conducted:</label>
        <select name="lectures" required>
            <option value="">-- Select Lectures --</option>
            <?php for ($i = 1; $i <= 6; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select>
    </form>
