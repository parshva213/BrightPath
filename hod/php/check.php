<?php
include 'conn.php';


?><div id="class">
<h2>Class Details</h2>
<?php
// SQL query to fetch the maximum Class_ID
$sql = 'SELECT MAX(Class_ID) AS cmax FROM class;';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$n = $row['cmax']; // Maximum Class_ID
// $updatedata="UPDATE Class c
// SET c.Total_Students = (
// SELECT COUNT(*) FROM ClassStudents cs 
// WHERE cs.Class_ID = c.Class_ID
// );";
// $result=mysqli_query($conn,$updatedata);
// if(!$result){
// echo "Error to update";
// }
?>
<table id="class-tab">
    <?php
    for ($i = 1; $i <= $n; $i++) { // Properly formatted for loop
        $cname='SELECT * FROM class WHERE Class_ID ='.$i.';';
        $row=mysqli_fetch_array(mysqli_query($conn,$cname));
    ?>
        <tr>
            <td>
                <table class="cd">
                    <tr>
                        <th>Class Name</th>
                        <td class="col">:</td>
                        <td>
                            <?php
                            echo $row['Class_Name'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Faculty Name</th>
                        <td class="col">:</td>
                        <td>
                            <?php
                            $fc='SELECT name FROM faculty WHERE Faculty_ID IN (SELECT Faculty_ID FROM class where class_ID = '.$i.');';
                            $frow=mysqli_fetch_array(mysqli_query($conn,$fc));
                            echo $frow['name'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Students</th>
                        <td class="col">:</td>
                        <td>
                            <?php
                            echo $row['Total_Students'];
                            $stp=$row['Total_Students']
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="sd">
                    <?php 
                        $student_query = "SELECT students.Student_ID, students.Name From students,class where class.class_ID = $i and students.student_ID = class.student_ID";
                    
                    $sresult = mysqli_query($conn, $student_query);
                    if ($sresult && mysqli_num_rows($sresult) > 0) {
                        while ($srow = mysqli_fetch_array($sresult)) {
                    ?>
                    <tr>
                        <th><?php echo $srow['Student_ID']; ?></th>
                        <td class="col">:</td>
                        <td><?php echo $srow['Name']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </td>
        </tr>
    <?php  
    }}
    ?>
</table>
</div>